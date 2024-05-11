<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\EstanteriasController;
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

// MENU ROUTES
Route::get('/', function () {
    return view('home');
});
Route::get('libros', [LibrosController::class, 'index'])->name('libros.index');
Route::get('libros/{titulo}/{id}', [LibrosController::class, 'show'])->name('libros.show');
Route::get('review/id', [LibrosController::class, 'review'])->name('review.show');
Route::get('feed', [FeedController::class, 'index'])->name('feed.index');
Route::get('mis-estanterias', [EstanteriasController::class, 'index'])->name('estanterias.index');
Route::get('mi-perfil', [UserController::class, 'perfil'])->name('user.perfil');

// FOOTER ROUTES
Route::get('sobre-nosotros', function () {
    return view('sobre-nosotros');
});
Route::get('politica-privacidad', function () {
    return view('politica-privacidad');
});
Route::get('contacto', function () {
    return view('contacto');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
