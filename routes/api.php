<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/recipes', [RecipeController::class, 'all']);
Route::get('/recipe/{id}', [RecipeController::class, 'findById']);
Route::put('/recipe/add', [RecipeController::class, 'add']);
Route::post('/recipe/modify/{id}', [RecipeController::class, 'update']);
Route::delete('/recipe/delete/{id}', [RecipeController::class, 'deleteById']);
Route::delete('/recipes/delete/all', [RecipeController::class, 'deleteAll']);

