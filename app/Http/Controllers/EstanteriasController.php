<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookList;
use App\Models\BookOnList;

class EstanteriasController extends Controller
{
    // tu mismo
    public function index()
    {
        $usuario = auth()->user();

        $permisos = true;

        return view('mis-estanterias', compact('usuario', 'permisos'));
    }

    // Usuario que no eres tu
    public function usuario($name, $id)
    {
        $usuario = User::find($id);

        $permisos = false;

        return view('mis-estanterias', compact('usuario', 'permisos'));
    }

    /**
     * Almacena una nueva lista de libros en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string|max:200',
                'libros.*' => 'required|exists:books,id',
            ]);

            // Crear la lista de libros
            $lista = new BookList();
            $lista->user_id = auth()->user()->id;
            $lista->list_name = $request->nombre;
            $lista->description = $request->descripcion;
            $lista->save();

            // Añadir los libros a la lista
            foreach ($request->libros as $libroId) {
                $libroEnLista = new BookOnList();
                $libroEnLista->book_id = $libroId;
                $libroEnLista->list_id = $lista->id;
                $libroEnLista->save();
            }

            // Mensaje de éxito
            flash('¡Lista de libros creada con éxito!', 'bg-green-400 border border-green-400 text-white px-4 py-2 rounded-md mb-4');

            // Redirigir con un mensaje de éxito
            return redirect()->route('estanterias.index');
        } catch (\Exception $e) {
            // Mensaje de error
            flash($e->getMessage() . 'Hubo un problema al crear la lista de libros. Por favor, inténtelo de nuevo más tarde.', 'bg-red-400 border border-red-400 text-white px-4 py-2 rounded-md mb-4');

            // Redirigir con un mensaje de error
            return redirect()->route('estanterias.index');
        }
    }

    public function buscarLibros(Request $request)
    {
        $term = $request->input('q');

        // Realizar la búsqueda de libros en base al término
        $libros = Book::where(function ($query) use ($term) {
            $query->where('title', 'like', '%' . $term . '%')->orWhere('author', 'like', '%' . $term . '%');
        })
            ->take(10)
            ->get();

        // Preparar los resultados en el formato requerido por Select2
        $results = [];
        foreach ($libros as $libro) {
            $results[] = [
                'id' => $libro->id,
                'text' => $libro->title, // Mostrar el título como texto
            ];
        }

        // Devolver los resultados en formato JSON
        return response()->json(['items' => $results]);
    }
}
