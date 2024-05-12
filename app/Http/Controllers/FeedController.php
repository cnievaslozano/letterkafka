<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Follower;
use Carbon\Carbon;


class FeedController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        // Obtener la fecha actual hace 30 días
        $fecha_limite = Carbon::now()->subDays(30);

        // Obtener las revisiones más recientes de los últimos 30 días
        $reviews = Review::with('user', 'book', 'likes')
            ->whereDate('creation_date', '>=', $fecha_limite)
            ->orderByDesc('creation_date')
            ->take(20)
            ->get();

        // Calcular el número de likes para cada revisión
        $likesReview = $reviews->mapWithKeys(function ($review) {
            return [$review->id => $review->likesCount()];
        });

        $reviewsPopulares = Review::with('user', 'book', 'likes')
            ->whereDate('creation_date', '>=', $fecha_limite)
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->take(2)
            ->get();

        // Obtener el ID del usuario actual
        $userId = Auth::id();

        // Obtener los IDs de los amigos del usuario actual
        $friendIds = Follower::where('following_user_id', $userId)
            ->whereIn('followed_user_id', function ($query) use ($userId) {
                $query->select('following_user_id')
                    ->from('followers')
                    ->where('followed_user_id', $userId);
            })
            ->pluck('followed_user_id');

        // Obtener las revisiones de los amigos
        $reviewsAmigos = Review::with('user', 'book', 'likes')
            ->whereIn('user_id', $friendIds)
            ->withCount('likes')
            ->orderByDesc('creation_date')
            ->take(2)
            ->get();


        // Pasar los datos a la vista
        return view('feed', compact('reviews', 'likesReview', 'reviewsPopulares', 'reviewsAmigos'));
    }
}
