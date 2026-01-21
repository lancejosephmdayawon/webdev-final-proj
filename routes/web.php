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

// WELCOME
Route::get('/welcome', [IskoLibAuthController::class, 'showWelcome'])->name('welcome');

// LOGIN
Route::get('/login', [IskoLibAuthController::class, 'showLogin'])->name('login');

// ADMIN ROUTE
Route::prefix('librarian')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'showDashboard'])->name('admin.dashboard');

    // INVENTORY
    Route::get('/inventory', [AdminInventoryController::class, 'showInventory'])->name('admin.inventory');

    // ADD BOOKS
    Route::get('/add-book', [AdminInventoryController::class, 'showAddBook'])->name('admin.add-book');

    // UPDATE BOOKS
    Route::get('/update-book', [AdminInventoryController::class, 'showUpdateBook'])->name('admin.update-book');

    // TRANSACTION
    Route::get('/transaction', [AdminTransactionController::class, 'showTransaction'])->name('admin.transaction');

    // BOOK BORROW REQUEST
    Route::get('/borrow-request', [AdminTransactionController::class, 'showBorrowRequest'])->name('admin.borrow-request');

    // BOOK BORROW DECLINE
    Route::get('/borrow-decline', [AdminTransactionController::class, 'showBorrowDecline'])->name('admin.borrow-decline');

    // BORROWED BOOK
    Route::get('/borrowed-book', [AdminTransactionController::class, 'showBorrowedBook'])->name('admin.borrowed-book');

    // OVERDUE BOOK
    Route::get('/overdue-book', [AdminTransactionController::class, 'showOverdueBook'])->name('admin.overdue-book');

    // RETURNED BOOK
    Route::get('/returned-book', [AdminTransactionController::class, 'showReturnedBook'])->name('admin.returned-book');
});

// USER ROUTE
Route::prefix('student')->group(function () {
    // HOME
    Route::get('/home', [UserHomeController::class, 'showHome'])->name('user.home');

    // BOOK INFO
    Route::get('/book-details', [UserHomeController::class, 'showBookDetails'])->name('user.book-details');

    // BOOK BORROW
    Route::get('/borrow-book', [UserHomeController::class, 'showBorrowForm'])->name('user.borrow-book');

    // BOOKS
    Route::get('/books', [UserBookController::class, 'showBooks'])->name('user.books');

    // BOOK BORROW REQUEST
    Route::get('/borrow-request', [UserBookController::class, 'showBorrowRequest'])->name('user.borrow-request');

    // BORROWED BOOK
    Route::get('/borrowed-book', [UserBookController::class, 'showBorrowedBook'])->name('user.borrowed-book');

    // OVERDUE BOOK
    Route::get('/overdue-book', [UserBookController::class, 'showOverdueBook'])->name('user.overdue-book');

    // BOOK BORROW FORM
    Route::get('/borrow-form', [UserBookController::class, 'showBorrowForm'])->name('user.borrow-form');

    // BOOK HISTORY DETAILS
    Route::get('/book-history', [UserBookController::class, 'showBookHistory'])->name('user.book-history');
});
