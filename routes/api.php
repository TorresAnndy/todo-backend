<?php

use App\Http\Controllers\RolController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('5ti')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class);
    Route::resource('rols', RolController::class);
});

