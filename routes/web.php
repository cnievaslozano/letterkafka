<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\EstanteriasController;

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
Route::get('libros', [LibrosController::class,'index'])->name('libros.index');
Route::get('feed', [FeedController::class,'index'])->name('feed.index');
Route::get('mis-estanterias', [EstanteriasController::class,'index'])->name('estanterias.index');



Route::get('/info', function () {
    phpinfo();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});