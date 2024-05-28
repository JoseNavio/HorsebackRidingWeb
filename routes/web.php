<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\BookingController;

//User related routes
Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('home');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Horses related routes
Route::post('/horse-delete/{horse}', [HorseController::class, 'deleteHorse']);
Route::get('/horse-info/{horse}', [HorseController::class, 'showHorseInfo']);
Route::get('/horse-form', [HorseController::class, 'showHorseForm']);
Route::get('/horses-page', [HorseController::class, 'showHorses']);
Route::post('/horse-register', [HorseController::class, 'registerHorse']);

//Booking related routes
Route::get('/booking-form', [BookingController::class, 'showBookingForm']);
Route::post('/booking-register', [BookingController::class, 'registerBooking']);

// Route::get('/', function(){
//     return view('horse-form');
// });

// Route::get('/', function () {
//     return view('welcome');
// });
