<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $noCoincidencias = false;
        $showForm = false;
        $generos = [];

        // Recuperar todos los mensajes de contacto con los datos de usuario relacionados
        $datos = ContactMessage::with('user')
        ->orderByDesc('contact_form_date')
        ->take(20)
        ->get();

        // Si se envió el formulario de soporte
        if ($request->filled('soporte')) {
            // Lógica para manejar la opción de soporte
            return $this->showContactMessages($request);
        }

        if ($request->has('username')) {
            $username = $request->input('username');

            // Buscar usuarios cuyos usernames sean similares al texto introducido
            $usuarioBuscado = User::buscarPorUsername(User::query(), $username)->first();

            if ($usuarioBuscado) {
                // Obtener las revisiones del usuario buscado
                $datos = $usuarioBuscado->contactMessages()
                    ->with('user')
                    ->orderByDesc('contact_form_date')
                    ->get();
            }else{
                $noCoincidencias = true;
            }
        }

        if ($request->has('show_book_form')) {
            $showForm = true;
            // Obtener la lista de géneros de la tabla books
            $generos = Book::distinct()->pluck('genre');
        }

        // Pasar los mensajes a la vista
        return view('admin', compact('datos','noCoincidencias', 'showForm', 'generos'));
    }

    public function showContactMessages()
    {
        // Recuperar todos los mensajes de contacto con los datos de usuario relacionados
        $datos = ContactMessage::with('user')->get();

        // Pasar los mensajes a la vista
        return $datos;
    }

    public function store(Request $request)
    {
        try {
            // Crear una nueva instancia del modelo ContactMessage
            $contactMessage = new ContactMessage();

            // Asignar los datos del formulario a los atributos del modelo
            $contactMessage->email = $request->input('email');
            $contactMessage->subject = $request->input('subject');
            $contactMessage->message = $request->input('message');
            $contactMessage->contact_form_date = now();

            // Obtener el ID del usuario actualmente autenticado, si existe
            $userId = auth()->id();
            if ($userId) {
                $contactMessage->user_id = $userId;
            }

            // Guardar el mensaje de contacto en la base de datos
            $contactMessage->save();

            // Redireccionar a la ruta principal después de enviar el mensaje
            return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente.');
        } catch (QueryException $e) {
            // Manejar cualquier excepción relacionada con la consulta aquí
            return redirect()->route('contacto')->with('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        } catch (Exception $e) {
            // Manejar cualquier otra excepción aquí
            return redirect()->route('contacto')->with('error', 'Error al enviar el mensaje: ' . $e->getMessage());
        }
    }
}
