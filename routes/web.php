<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\BookingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//User related routes (Named 'login' so middleware knows where to redirect)
Route::get('/', [UserController::class, 'showCorrectHomePage'])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('mustBeLoggedIn');
Route::get('/user-info/{user}', [UserController::class, 'showUserInfo'])->middleware('auth');

//Horses related routes
Route::delete('/horse/{horse}', [HorseController::class, 'deleteHorse'])->middleware('auth');
Route::get('/horse-info/{horse}', [HorseController::class, 'showHorseInfo']);
Route::get('/horses-page', [HorseController::class, 'showHorses']);
Route::get('/horse-form', [HorseController::class, 'showHorseForm'])->middleware('auth');
Route::post('/horse-register', [HorseController::class, 'registerHorse'])->middleware('auth');

//Booking related routes (If you only want guests to visit the page use 'guest' instead)
Route::get('/booking/{booking}/edit', [BookingController::class, 'showEditForm'])->middleware('auth');
Route::put('/booking/{booking}', [BookingController::class, 'updateBooking'])->middleware('auth');
Route::delete('/booking/{booking}', [BookingController::class, 'cancelBooking'])->middleware('auth');
Route::get('/booking-form', [BookingController::class, 'showBookingForm'])->middleware('mustBeLoggedIn');
Route::post('/booking-register', [BookingController::class, 'registerBooking'])->middleware('auth');

