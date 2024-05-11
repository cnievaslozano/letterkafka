<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Review;

class LibrosController extends Controller
{
    /*
        Devuelve la vista de una review
        Por parametro se le pasará el id
        y devolvera $review
    */
    public function review()
    {
        //$review = Review::find($id); algo asi iguess
        return view('review');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(8);
        return view('libros', compact('books'));
    }

    /**
     * Display the specified resource.
     */
    public function show($titulo, $id)
    {
        
        $libro = Book::findOrFail($id);
        $ejReviews = Review::orderBy('createdAt', 'DESC')->take(4)->get();
        $ejRecomendaciones = Book::inRandomOrder()->take(4)->get();
        //$recomendaciones = where etc


        return view('ficha', compact('libro', 'ejReviews', 'ejRecomendaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
