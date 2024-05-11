<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\LikeReview;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        // últimos dos review amigos
        //$reviewsAmigos = Review::inRandomOrder()->take(2)->get();

        // las 2 reviews más popu
        //$reviewsPopulares = Review::withCount('likes') // Cuenta los likes de cada revisión
        //->orderBy('likes_count', 'desc') // Ordena las revisiones por cantidad de likes
        //->take(2) // Toma solo las dos revisiones superiores
        //->get(); // Obtén el resultado

        // Obtener los datos necesarios para la vista
        $reviews = Review::with('user', 'book')->latest()->take(10)->get();

        // Obtener el número de likes para cada revisión
        $reviewCounts = LikeReview::select('review_id', DB::raw('COUNT(*) as review_count'))
            ->groupBy('review_id')
            ->get()
            ->pluck('review_count', 'review_id');

        // Obtener los IDs de las revisiones
        $reviewIds = $reviews->pluck('id');

        // Inicializar el array de conteos con valor cero para todas las revisiones
        $reviewCounts = $reviewCounts->merge($reviewIds->flip()->map(function ($id) {
            return 0;
        }));

        // Pasar los datos a la vista
        return view('feed', compact('reviews', 'reviewCounts'));

        // , 'reviewsPopulares' => $reviewsPopulares, 'reviewsAmigos' => $reviewsAmigos
    }
}
