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
    public function review($id)
    {
        $resena = Review::find($id);
        return view('review', compact('resena'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(8);
        // Obtener todos los géneros de la tabla books
        $genres = Book::pluck('genre')
            ->unique()
            ->map(function ($genre) {
                return $genre ?: 'Sin Género';
            });

        return view('libros', compact('books', 'genres'));
    }

    /**
     * Display the specified resource.
     */
    public function show($titulo, $id)
    {
        $libro = Book::findOrFail($id);

        // obtengo las ultimas 4 reviews

        $lastReviews = Review::where('book_id', $libro->id)
            ->latest() // Ordenar por fecha de creación, de más reciente a más antigua
            ->take(4) // Obtener solo las últimas 4 reviews
            ->get();

        // Obtener recomendaciones basadas en el género del libro
        $recomendaciones = Book::where('genre', $libro->genre)
            ->where('id', '!=', $libro->id) // Excluir el libro actual
            ->take(4) // Tomar hasta 4 recomendaciones del mismo género
            ->get();

        // Si no hay suficientes recomendaciones en el mismo género, obtener recomendaciones aleatorias
        if ($recomendaciones->count() < 4) {
            $recomendacionesAleatorias = Book::where('id', '!=', $libro->id) // Excluir el libro actual
                ->whereNotIn('id', $recomendaciones->pluck('id')->toArray()) // Excluir libros ya obtenidos
                ->inRandomOrder() // Ordenar aleatoriamente
                ->take(4 - $recomendaciones->count()) // Tomar la cantidad restante de recomendaciones
                ->get();

            $recomendaciones = $recomendaciones->concat($recomendacionesAleatorias);
        }

        return view('ficha', compact('libro', 'lastReviews', 'recomendaciones'));
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
