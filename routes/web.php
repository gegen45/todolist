<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TodoController::class, 'index']);
Route::post('/todo/add', [TodoController::class, 'add']);
Route::get('/todo/update/{id}', [TodoController::class, 'update']);
Route::get('/todo/delete/{id}', [TodoController::class, 'delete']);