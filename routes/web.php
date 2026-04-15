<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/barbers', function () {
    return view('pages.barber');
})->name('barbers');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Booking Public
|--------------------------------------------------------------------------
*/

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('my.bookings');

/*
|--------------------------------------------------------------------------
| Admin Protected
|--------------------------------------------------------------------------
*/

Route::middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');
    Route::get('/bookings', [BookingController::class, 'list'])->name('bookings.list');
    Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});