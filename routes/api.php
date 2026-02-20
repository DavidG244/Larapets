<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PetController;
use Illuminate\Support\Facades\Route;

// CORS preflight
Route::options('/{any}', function () {
    return response()->json([], 200);
})->where('any', '.*');

// Auth endpoints (public)
Route::post('auth/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('api.token')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('auth/me', [AuthController::class, 'me']);
    
    // Pet routes
    Route::get('pets', [PetController::class, 'index']);
    Route::get('pets/{id}', [PetController::class, 'show']);
    Route::post('pets', [PetController::class, 'store']);
    Route::put('pets/{id}', [PetController::class, 'update']);
    Route::delete('pets/{id}', [PetController::class, 'destroy']);
});
