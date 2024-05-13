<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra tu propio perfil.
     */
    public function miPerfil()
    {
        if (auth()->check()) {
            $usuario = auth()->user();

            // obtengo las últimas 4 reviews del usuario
            $lastReviews = $usuario->reviews()->take(4)->get();

            // obtengo reviews con mayor rating
            $reviewsMayorRating = $usuario->reviews()->orderByDesc('rating')->take(4)->get();

            // recorrer las reviews para obtener a que libro pertenecen
            $librosFavoritos = [];

            foreach ($reviewsMayorRating as $review) {
                $libroFavorito = $review->book()->first(); // Obtener el objeto del libro
                $librosFavoritos[] = $libroFavorito; // Agregar el libro a la lista de favoritos
            }

            return view('mi-perfil', compact('usuario', 'librosFavoritos', 'lastReviews'));
        }

        return view('mi-perfil');
    }

    /**
     * Muestra el perfil de los demas.
     */
    public function perfil($name, $id)
    {
        $usuario = User::find($id);

        // obtengo las últimas 4 reviews del usuario
        $lastReviews = $usuario->reviews()->take(4)->get();

        // obtengo reviews con mayor rating
        $reviewsMayorRating = $usuario->reviews()->orderByDesc('rating')->take(4)->get();

        // recorrer las reviews para obtener a que libro pertenecen
        $librosFavoritos = [];

        foreach ($reviewsMayorRating as $review) {
            $libroFavorito = $review->book()->first(); // Obtener el objeto del libro
            $librosFavoritos[] = $libroFavorito; // Agregar el libro a la lista de favoritos
        }

        if (auth()->check()) {
            $usuarioAuth = auth()->user();

            $sigueAlUsuario = Follower::where('following_user_id', $usuario->id)
                ->where('followed_user_id', $usuarioAuth->id)
                ->exists();
        }

        if ($usuario) {
            return view('perfil', compact('usuario', 'librosFavoritos', 'lastReviews', 'sigueAlUsuario'));
        } else {
            // Si no se encuentra el usuario, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'El usuario no existe');
        }
    }

    /*
        Seguir a otro usuario
    */
    public function seguir($idUserToFollow)
    {
        $user = auth()->user();

        // Verificar si la relación ya existe
        $existeRelacion = Follower::where('following_user_id', $idUserToFollow)
            ->where('followed_user_id', $user->id)
            ->exists();

        // Si la relación ya existe, devolver un error JSON
        if ($existeRelacion) {
            return response()->json(['error' => 'Ya sigues a este usuario'], 422);
        }

        // Si la relación no existe, crear una nueva relación de seguidor
        $follower = new Follower();
        $follower->following_user_id = $idUserToFollow;
        $follower->followed_user_id = $user->id;
        $follower->follow_date = now();
        $follower->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
