<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;

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

Route::get('/provincia', [ProvinciaController::class, 'getProvincia']);

// Ruta para visualizar todas las provincias registradas en la base de datos
Route::get('/provincias', [ProvinciaController::class, 'index']);

Route::post('/insert-provincias', [ProvinciaController::class, 'store']);
//ruta para el registro de una provincia en la base de datos

Route::put('/update-provincias', [ProvinciaController::class, 'update']);

Route::delete('/delete-provincias', [ProvinciaController::class, 'destroy']);