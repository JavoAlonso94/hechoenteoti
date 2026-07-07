<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PagesController::class, 'index'])->name('page.index');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::post('/reservas/{reserva}/pasajeros', [ReservaController::class, 'storePasajeros'])->name('reservas.pasajeros');
