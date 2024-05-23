<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('home');
Route::get('/', function(){
    return view('homepage');
});

// Route::get('/', function () {
//     return view('welcome');
// });
