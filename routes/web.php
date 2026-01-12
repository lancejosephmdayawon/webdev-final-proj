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
    // WELCOME
    Route::get('/welcome', [IskoLibAuthController::class, 'showWelcome'])->name('iskolib.welcome');

    // LOGIN
    Route::get('/login', [IskoLibAuthController::class, 'showLogin'])->name('iskolib.login');
});

