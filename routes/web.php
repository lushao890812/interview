<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/A321neo/{id}', function ($id) {
    return view('airplan_seat.A321neo',['id'=>$id]);
})->name('A321neo');
Route::get('/flight', function () {
    return view('flight');
})->name('flight');
Route::get('/flight_edite', function () {
    return view('flight_edite');
})->name('flight_edite');
Route::get('/booking', function () {
    return view('booking');
});
Route::get('/mytrip', function () {
    return view('myTrip');
})->name('myTrip');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
