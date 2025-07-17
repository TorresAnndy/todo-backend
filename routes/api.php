<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::prefix('5ti')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [UserController::class, 'store']);
});

//Rutas privadas 
Route::prefix('/5ti')->middleware('auth:api')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class);
    Route::resource('rols', RolController::class);

    Route::post('/logout', [LoginController::class, 'logout']);
});
