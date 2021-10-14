<?php

use App\Http\Controllers\api\DemandeController;
use App\Http\Controllers\api\LivreController;
use App\Http\Controllers\api\LivresProposésController;
use App\Http\Controllers\api_member\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/livre', [LivreController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Get all livresProposés
Route::get('livresProposés',  [LivresProposésController::class, 'getLivresProposés']);

// Get Specic livresProposés detail
Route::get('livresProposés/{id}', [LivresProposésController::class, 'getLivresProposésById']);

// Add LivresProposés
Route::post('addLivresProposés', [LivresProposésController::class, 'addLivresProposés']);

// Update LivresProposés
Route::put('updateLivresProposés/{id}', [LivresProposésController::class, 'updateLivresProposés']);

// Delete LivresProposés
Route::delete('deleteLivresProposés/{id}', [LivresProposésController::class, 'deleteLivresProposés']);

//demande
Route::post('insertDemande', [DemandeController::class, 'insertDemande']);