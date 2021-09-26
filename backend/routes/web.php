<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Gestion livre
Route::get('/livre', [App\Http\Controllers\livre\LivreController::class, 'index'])->name('livre.index');
Route::get('/livre/create', [App\Http\Controllers\livre\LivreController::class, 'create'])->name('livre.create');
Route::post('/livre/create', [App\Http\Controllers\livre\LivreController::class, 'register'])->name('livre.store');
Route::get('/livre/modifier/{id}', [App\Http\Controllers\livre\LivreController::class, 'edit'])->name('livre.edit');
Route::post('livre/modifier/{id}', [App\Http\Controllers\livre\LivreController::class, 'update'])->name('livre.update');
Route::get('/livre/supprimer/{id}', [App\Http\Controllers\livre\LivreController::class, 'delete'])->name('livre.delete');
// Gestion de membre
Route::get('/membre', [App\Http\Controllers\membre\MembreController::class, 'index'])->name('membre.index');
Route::get('/membre/modifier/{id}', [App\Http\Controllers\membre\MembreController::class, 'edit'])->name('membre.edit');
Route::post('membre/modifier/{id}', [App\Http\Controllers\membre\MembreController::class, 'update'])->name('membre.update');
Route::get('/membre/supprimer/{id}', [App\Http\Controllers\membre\MembreController::class, 'delete'])->name('membre.delete');
