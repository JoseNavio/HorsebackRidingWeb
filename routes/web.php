<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//User related routes
Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('home');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout']);

// Route::get('/', function(){
//     return view('horse-form');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
