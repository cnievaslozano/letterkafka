<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\LikeBook;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    /*
        Crear una review
    */

    public function guardarReview(Request $request)
    {
        try {
            // Validar datos
            $request->validate([
                'book_id' => 'required|exists:books,id',
                'review' => 'required|string|max:5000',
                'rating' => 'required|integer|between:1,5',
            ]);

            // Obtener el usuario autenticado
            $user = auth()->user();

            // Crear y guardar la reseña
            $review = new Review();
            $review->content = $request->input('review');
            $review->rating = $request->input('rating');
            $review->book_id = $request->input('book_id');
            $review->creation_date = date('Y-m-d');
            $review->user_id = $user->id;
            $review->save();

            // Establecer un mensaje flash de éxito
            flash('¡Reseña guardada con éxito!', 'bg-green-400 border border-green-400 text-white px-4 py-2 rounded-md mb-4');

            // Sin redireccionar
            return response()->json(['success' => true]);
        } catch (ValidationException $e) {
            // Obtener los mensajes de error
            $errors = $e->validator->getMessageBag()->getMessages();

            // Establecer un mensaje flash de error
            flash('Error al guardar la reseña: ' . implode(', ', $errors['review'], 'bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-4'));

            // Sin redireccionar
            return response()->json(['success' => false, 'errors' => $errors]);
        }
    }

    /*
        Like
    */
    public function darLike($idBook)
    {
        $user = auth()->user();
        $likeBook = new LikeBook();

        $likeBook->book_id = $idBook;
        $likeBook->user_id = $user->id;
        $likeBook->like_date = date('Y-m-d');
    
        $likeBook->save();

        return response()->json(['success' => true]);
    }

    /**
     * LIBROS MOSTRAT TODOS.
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
     * FICHA DE UN LIBRO.
     */
    public function show($titulo, $id)
    {
        $libro = Book::findOrFail($id);

        // obtengo las ultimas 4 reviews

        $lastReviews = Review::where('book_id', $libro->id)
            ->latest()
            ->take(4)
            ->get();

        // Obtener recomendaciones basadas en el género del libro
        $recomendaciones = Book::where('genre', $libro->genre)
            ->where('id', '!=', $libro->id) // Excluir el libro actual
            ->take(4)
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
