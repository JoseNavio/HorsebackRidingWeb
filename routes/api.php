<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\BookingController;

//USER

//Log in
Route::post('/login', [UserController::class, 'loginAPI']);

//BOOKING

//Create
Route::post('/create-booking', [BookingController::class, 'createBookingAPI'])->middleware('auth:sanctum');
//Get
Route::get('/get-booking/{booking}', [BookingController::class, 'showBookingAPI'])->middleware(
    'auth:sanctum',
    'can:view,booking'
);
//Get all bookings for the user
Route::get('/get-all-bookings', [BookingController::class, 'showAllBookingsAPI'])->middleware('auth:sanctum');
//Update
Route::put('/update-booking/{booking}', [BookingController::class, 'updateBookingAPI'])->middleware(
    'auth:sanctum',
    'can:update,booking'
);
//Delete (can:delete,booking -> 'delete' is the name of in the policy)
Route::delete('/delete-booking/{booking}', [BookingController::class, 'deleteBookingAPI'])->middleware(
    'auth:sanctum',
    'can:delete,booking'
);

//HORSE

//Get all bookings for the user
Route::get('/get-all-horses', [HorseController::class, 'showAllHorsesAPI'])->middleware('auth:sanctum');
//Delete
// Route::delete('/delete-horse/{horse}', [HorseController::class, 'deleteHorseAPI'])->middleware(
//     'auth:sanctum',
//     'can:delete,horse'
// );