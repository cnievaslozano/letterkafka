<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\EstanteriasController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ENDPOINTS ROUTES
Route::post('guardar-review', [LibrosController::class, 'guardarReview'])->name('guardar.review');
Route::post('/libro/{idBook}/like', [LibrosController::class, 'darLike'])->name('libro.like');
Route::post('/seguir/{idUserToFollow}', [UserController::class, 'seguir'])->name('user.seguir');
Route::post('/crearLista', [EstanteriasController::class, 'store'])->name('lista.crear');
Route::post('/buscar-libros', [EstanteriasController::class, 'buscarLibros'])->name('buscar-libros');


// MENU ROUTES
Route::get('/', function () {
    return view('home');
});
Route::get('libros', [LibrosController::class, 'index'])->name('libros.index');
Route::get('libros/{titulo}/{id}', [LibrosController::class, 'show'])->name('libros.show');
Route::get('review/{id}', [LibrosController::class, 'review'])->name('review.show');
Route::get('review/{id}', [LibrosController::class, 'review'])->name('review.show');
Route::get('feed', [FeedController::class, 'index'])->name('feed.index');
Route::post('feed', [FeedController::class, 'index'])->name('feed.index');
Route::post('feed/{idReview}/like', [LibrosController::class, 'darLikeReview'])->name('libro.like');
Route::post('/review/{idReview}/like', [LibrosController::class, 'darLikeReview'])->name('libro.like');
Route::get('mis-estanterias', [EstanteriasController::class, 'index'])->name('estanterias.index');
Route::get('estanteria/{username}/{id}', [EstanteriasController::class, 'usuario'])->name('estanterias.user');
Route::get('mi-perfil', [UserController::class, 'miPerfil'])->name('user.mi-perfil');
Route::get('/perfil/{username}/{id}', [UserController::class, 'perfil'])->name('user.perfil');
Route::get('/opcion-adicional', 'ContactMessageController@index')->name('opcion-adicional');

// ADMIN
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/insertar-libro', [LibrosController::class, 'store'])->name('admin.insertar-libro');

// CONTACT
Route::post('contacto', [AdminController::class, 'store'])->name('admin.store');

// FOOTER ROUTES
Route::get('sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre-nosotros');

Route::get('politica-privacidad', function () {
    return view('politica-privacidad');
})->name('politica-privacidad');

Route::get('contacto', function () {
    return view('contacto');
})->name('contacto');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});
