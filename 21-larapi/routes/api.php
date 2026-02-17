<?php

use App\Models\Pet;
use App\Http\Controllers\API\PetController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

//Endpoint http://127.0.0.1:8000/api/pets/list
Route::get('pets/list', [PetController::class, 'index']);

//Endpoint http://127.0.0.1:8000/api/pets/show/{id}
Route::get('pets/show/{id}', [PetController::class, 'show']);

// Auth endpoints
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(\App\Http\Middleware\ApiTokenMiddleware::class)->group(function () {
    // Pet routes (protected)
    Route::get('pets/list', [PetController::class, 'index']);
    Route::get('pets/show/{id}', [PetController::class, 'show']);
    Route::post('pets/store', [PetController::class, 'store']);
    Route::put('pets/edit/{id}', [PetController::class, 'update']);
    Route::delete('pets/delete/{id}', [PetController::class, 'destroy']);

    // Auth endpoints that require token
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
});