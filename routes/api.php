<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::fallback(function() {
    return '404 route not found';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients/list', [ClientController::class, 'list'])->name('listTasks');


Route::get('/clients/test', function() {
    return 'hello world';
});
