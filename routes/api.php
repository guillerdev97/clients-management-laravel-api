<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback(function() {
    return '404 route not found';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ClientController
Route::get('/clients/list', [ClientController::class, 'list'])->name('listTasks');
Route::post('/clients/create', [ClientController::class, 'create'])->name('createTask');

// AuthController
Route::post('/clients/register', [AuthController::class, 'register'])->name('register');

