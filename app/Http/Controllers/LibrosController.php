<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\LikeReview;

class LibrosController extends Controller
{
    /*
        Devuelve la vista de una review
        Por parametro se le pasará el id
        y devolvera $review
    */
    public function review($reviewId)
    {
        // Obtener los datos de la revisión y cargar la relación 'user'
        $review = Review::with('user')->findOrFail($reviewId);

        // Pasar los datos de la revisión y del usuario a la vista
        return view('review', compact('review'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(8);
        // Obtener todos los géneros de la tabla books
        $genres = Book::pluck('genre')->unique()->map(function ($genre) {
            return $genre ?: 'Sin Género';
        });

        return view('libros', compact('books','genres'));
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

    public function darLikeReview($idReview)
    {
        $user = auth()->user();
        $likeReview = new LikeReview();

        $likeReview->review_id = $idReview;
        $likeReview->user_id = $user->id;
        $likeReview->like_date = date('Y-m-d');

        $likeReview->save();

        // Obtén la revisión actualizada con los likes
        $review = Review::findOrFail($idReview);

        $likesCount = $review->likesCount(); // Obtén el conteo de likes

        return response()->json(['success' => true, 'likesCount' => $likesCount]);
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'nullable|string|max:255',
            'buy_links' => 'nullable|string',
            'pages' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'cover_url' => 'nullable|string', // Validación para una URL de portada
        ]);

        // Verificar si el libro ya existe en la base de datos
        $book = Book::firstOrCreate(
            ['title' => $validatedData['title'], 'author' => $validatedData['author']],
            $validatedData
        );

        // Redireccionar a alguna vista o ruta después de guardar el libro
        return redirect()->route('admin.index')->with('success', 'Libro insertado correctamente.');
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
