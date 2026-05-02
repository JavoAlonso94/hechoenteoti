<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


route::get('/',[PageController::class, 'index'])->name('page.index');