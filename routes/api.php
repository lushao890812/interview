<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('booking', [BookingController::class, 'getBooking']);
Route::post('booking', [BookingController::class, 'addBooking']);
Route::get('flight_seat', [FlightController::class, 'getSeat']);
Route::get('flight', [FlightController::class, 'getFlight']);
Route::post('flight', [FlightController::class, 'addFlight']);