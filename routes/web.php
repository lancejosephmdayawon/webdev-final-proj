<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IskoLibAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return "<h1>Successful!<h1>";
});

// ISKOLIB ROUTE
Route::prefix('iskolib')->group(function () {
    // AUTH
    Route::get('/welcome', [IskoLibAuthController::class, 'showWelcome'])->name('iskolib.welcome');
});

