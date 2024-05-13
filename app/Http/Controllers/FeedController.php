<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Follower;
use App\Models\LikeReview;
use App\Models\User;
use Carbon\Carbon;


class FeedController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index(Request $request)
    {
        // Inicializar la variable $noCoincidencias
        $noCoincidencias = false;
        $favPosts = false;
        $comunidad = false;

        // Obtener la fecha actual hace 30 días
        $fecha_limite = Carbon::now()->subDays(30);

        // Obtener las revisiones más recientes de los últimos 30 días
        $reviews = Review::with('user', 'book', 'likes')
            ->whereDate('creation_date', '>=', $fecha_limite)
            ->orderByDesc('creation_date')
            ->take(20)
            ->get();

        $reviewsPopulares = Review::with('user', 'book', 'likes')
        ->whereDate('creation_date', '>=', $fecha_limite)
        ->withCount('likes')
        ->orderByDesc('likes_count')
        ->orderBy('creation_date', 'desc')
        ->take(2)
        ->get();

        // Obtener el ID del usuario actual
        $userId = Auth::id();

        // Obtener los IDs de las personas que el usuario actual sigue y que también lo siguen a él
        $mutualFollowersIds = Follower::whereIn('following_user_id', function ($query) use ($userId) {
                $query->select('followed_user_id')
                    ->from('followers')
                    ->where('following_user_id', $userId);
            })
            ->where('followed_user_id', $userId)
            ->pluck('following_user_id');

        // Obtener las revisiones de las personas que el usuario actual sigue y que también lo siguen a él
        $reviewsAmigos = Review::with('user', 'book', 'likes')
            ->whereIn('user_id', $mutualFollowersIds)
            ->whereDate('creation_date', '>=', $fecha_limite)
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->take(2)
            ->get();

        // Si se envió un formulario de búsqueda
        if ($request->has('username')) {
            $username = $request->input('username');

            // Buscar usuarios cuyos usernames sean similares al texto introducido
            $usuarioBuscado = User::buscarPorUsername(User::query(), $username)->first();

            if ($usuarioBuscado) {
                // Obtener las revisiones del usuario buscado
                $reviews = $usuarioBuscado->reviews()
                    ->with('user', 'book', 'likes')
                    ->whereDate('creation_date', '>=', $fecha_limite)
                    ->orderByDesc('creation_date')
                    ->get();
            }else{
                $noCoincidencias = true;
            }
        }

        // Si se envió un formulario de búsqueda
        if ($request->has('reviews_fav')) {
            $favPosts = true;
        // Obtener el usuario actualmente autenticado
        $user = Auth::user();

        // Obtener los IDs de las revisiones que el usuario ha dado like
        $reviewIds = $user->likedReviews()->pluck('review_id');

        // Obtener las revisiones correspondientes a esos IDs, ordenadas por la fecha de creación y la cantidad de likes
        $reviews = Review::whereIn('id', $reviewIds)
                        ->orderByDesc('creation_date')
                        ->orderByDesc(function ($query) {
                            $query->selectRaw('COUNT(*)')
                                ->from('likes_reviews')
                                ->whereColumn('likes_reviews.review_id', 'reviews.id');
                        })
                        ->take(10)
                        ->get();

        }


        if ($request->has('comunidad')) {
            $comunidad = true;
            // Obtener el usuario actualmente autenticado
            $user = Auth::user();

            // Obtener los IDs de los usuarios que sigues
            $followingIds = Follower::where('following_user_id', $user->id)->pluck('followed_user_id');

            // Obtener las 20 revisiones más recientes creadas por los usuarios que sigues
            $reviews = Review::whereIn('user_id', $followingIds)
                ->orderByDesc('creation_date')
                ->orderByDesc(function ($query) {
                    $query->selectRaw('COUNT(*)')
                        ->from('likes_reviews')
                        ->whereColumn('likes_reviews.review_id', 'reviews.id');
                    })
                ->take(10)
                ->get();

            $reviews = [];
        }

        // Pasar los datos a la vista
        return view('feed', compact('reviews', 'noCoincidencias', 'reviewsPopulares', 'reviewsAmigos', "comunidad","favPosts"));
    }

}
