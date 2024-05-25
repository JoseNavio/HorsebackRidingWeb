<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//todo Testing

//User related routes
// Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('home');
Route::post('/register', [UserController::class, 'register']);

Route::get('/', function(){
    return view('horse-form');
});

// Route::get('/', function () {
//     return view('welcome');
// });
