<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorseController;

//User related routes
Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('home');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Booking related routes

//Horses related routes
Route::get('/horse-form', [HorseController::class, 'showHorseForm']);
Route::post('/horse-register', [HorseController::class, 'registerHorse']);


// Route::get('/', function(){
//     return view('horse-form');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
