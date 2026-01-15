<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IskoLibAuthController;

// ADMIN CONTROLLER
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInventoryController;
use App\Http\Controllers\AdminTransactionController;

// STUDENT CONTROLLER
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserBookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return "<h1>Successful!</h1>";
});

// ISKOLIB ROUTE
Route::prefix('isko-lib')->group(function () {
    // WELCOME
    Route::get('/welcome', [IskoLibAuthController::class, 'showWelcome'])->name('iskolib.welcome');

    // LOGIN
    Route::get('/login', [IskoLibAuthController::class, 'showLogin'])->name('iskolib.login');

    // ADMIN ROUTE
    Route::prefix('librarian')->group(function () {
        // DASHBOARD
        Route::get('/dashboard', [AdminDashboardController::class, 'showDashboard'])->name('iskolib.admin.dashboard');

        // INVENTORY
        Route::get('/inventory', [AdminInventoryController::class, 'showInventory'])->name('iskolib.admin.inventory');

        // ADD BOOKS
        Route::get('/add-book', [AdminInventoryController::class, 'showAddBook'])->name('iskolib.admin.add-book');

        // UPDATE BOOKS
        Route::get('/update-book', [AdminInventoryController::class, 'showUpdateBook'])->name('iskolib.admin.update-book');

        // TRANSACTION
        Route::get('/transaction', [AdminTransactionController::class, 'showTransaction'])->name('iskolib.admin.transaction');
    });

    // USER ROUTE
    Route::prefix('student')->group(function () {
        // HOME
        Route::get('/home', [UserHomeController::class, 'showHome'])->name('iskolib.user.home');

        // BOOK INFO
        Route::get('/book-details', [UserHomeController::class, 'showBookDetails'])->name('iskolib.user.book-details');

        // BOOK INFO
        Route::get('/borrow-book', [UserHomeController::class, 'showBorrowForm'])->name('iskolib.user.borrow-book');

        // BOOKS
        Route::get('/books', [UserBookController::class, 'showBooks'])->name('iskolib.user.books');
    });
});
