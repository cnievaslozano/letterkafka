<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {

        $reviewsPopulares = Review::orderBy('likes', 'desc')->take(3)->get();

        $reviews = Review::latest()->take(50)->get();
        
        // Pasar las reviews a la vista
        return view('feed', ['reviews' => $reviews, 'reviewsPopulares' => $reviewsPopulares]);
    }
}
