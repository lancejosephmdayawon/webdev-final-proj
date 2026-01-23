<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IskoLibAuthController;

// ADMIN CONTROLLER
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInventoryController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\UserApiController;
// STUDENT CONTROLLER
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserBookController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Container\Attributes\Auth;

// TEST ROUTES
Route::get('/test', function () {
    return "<h1>Successful!</h1>";
});
Route::middleware('auth')->get('/me', [UserApiController::class, 'me']);

// PUBLIC ROUTES
// WELCOME
Route::get('/', [IskoLibAuthController::class, 'showWelcome'])->name('welcome');

// LOGIN
Route::get('/login', [IskoLibAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [IskoLibAuthController::class, 'processLogin'])->name('login.process');

// LOGOUT
Route::middleware(Authenticate::class)->post('/logout', [IskoLibAuthController::class, 'logout'])->name('logout');


// CHANGE PASSWORD
Route::get('/change-password', [IskoLibAuthController::class, 'showChangePass'])->name('change-pass');


// ADMIN ROUTE
Route::prefix('librarian')->middleware([Authenticate::class, RoleMiddleware::class . ':admin'])->group(function () {
    // PROFILE
    Route::get('/profile', [IskoLibAuthController::class, 'showAdminProfile'])->name('admin.profile');

    // DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'showDashboard'])->name('admin.dashboard');

    // INVENTORY
    Route::get('/inventory', [AdminInventoryController::class, 'showInventory'])->name('admin.inventory');

    // ADD BOOKS
    // Show add book page
    Route::get('/add-book', [AdminInventoryController::class, 'showAddBook'])->name('admin.add-book');
    // Submit new book
    Route::post('/add-book', [AdminInventoryController::class, 'storeBook'])->name('admin.add-book.submit');

    // UPDATE BOOKS
    // Show form
    Route::get('/update-book/{id}', [AdminInventoryController::class, 'showUpdateBook'])->name('admin.update-book');
    // Handle form submission
    Route::put('/update-book/{id}', [AdminInventoryController::class, 'updateBook'])->name('admin.update-book.submit');


    // Delete book (soft delete)
    Route::delete('/delete-book/{id}', [AdminInventoryController::class, 'deleteBook'])->name('admin.delete-book');

    // TRANSACTION
    Route::get('/transaction', [AdminTransactionController::class, 'showTransaction'])->name('admin.transaction');

    // BOOK BORROW REQUEST
    // Get details
    Route::get('/borrow-request/{id}', [AdminTransactionController::class, 'showBorrowRequest'])->name('admin.borrow-request');
    // Set status approved
    Route::post('/borrow-request/{id}/approve', [AdminTransactionController::class, 'approveBorrowRequest'])->name('admin.borrow-request.approve');
    // Set status declined
    Route::post('/borrow-request/{id}/decline', [AdminTransactionController::class, 'declineBorrowRequest'])->name('admin.borrow-request.decline');


    // BOOK BORROW DECLINE
    Route::get('/borrow-decline/{id}', [AdminTransactionController::class, 'showBorrowDecline'])->name('admin.borrow-decline');

    // UNBORROWED BOOK
    Route::get('unborrowed-book/{id}', [AdminTransactionController::class, 'showUnborrowedBook'])->name('admin.unborrowed-book');
    // Mark as borrowed
    Route::post('borrow-book/{id}', [AdminTransactionController::class, 'borrowBook'])->name('admin.borrow-book');

    // BORROWED BOOK
    Route::get('/borrowed-book/{id}', [AdminTransactionController::class, 'showBorrowedBook'])->name('admin.borrowed-book');
    Route::post('/return-book/{id}', [AdminTransactionController::class, 'returnBook'])->name('admin.return-book');

    // RETURNED BOOK
    Route::get('/returned-book/{id}', [AdminTransactionController::class, 'showReturnedBook'])->name('admin.returned-book');

    // OVERDUE BOOK
    Route::get('/overdue-book/{id}', [AdminTransactionController::class, 'showOverdueBook'])->name('admin.overdue-book');
    // Route::post('/return-book/{id}', [AdminTransactionController::class, 'returnBook'])->name('admin.return-book'); -- Same as Return Route in BORROWED BOOK
});


// USER ROUTE

Route::prefix('student')->middleware([Authenticate::class, RoleMiddleware::class . ':student'])->group(function () {

    // PROFILE
    Route::get('/profile', [IskoLibAuthController::class, 'showUserProfile'])->name('user.profile');

    // HOME
    Route::get('/home', [UserHomeController::class, 'showHome'])->name('user.home');

    // BOOKS
    Route::get('/books', [UserBookController::class, 'showBooks'])->name('user.books');

    // BOOK INFO
    // Route::get('/book-details', [UserHomeController::class, 'showBookDetails'])->name('user.book-details');
    Route::get('/book-details/{id}', [UserHomeController::class, 'showBookDetails'])->name('user.book-details');

    // BOOK BORROW
    Route::get('/borrow-book/{id}', [UserHomeController::class, 'showBorrowForm'])->name('user.borrow-book');
    // Submit borrow request
    Route::post('/borrow-book/{id}', [UserHomeController::class, 'submitBorrowForm'])->name('user.submit-borrow');

    // BOOK BORROW FORM (Manual input of book)
    // Show borrow form
    Route::get('/borrow-form', [UserBookController::class, 'showBorrowForm'])->name('user.borrow-form');
    // Submit borrow request
    Route::post('/borrow-form', [UserBookController::class, 'submitBorrowForm'])->name('user.submit-borrow-form');
    // AJAX route to fetch book info by ID
    Route::get('/book-info/{id}', [UserBookController::class, 'getBookInfo'])->name('student.book-info');

    // BOOK HISTORY DETAILS
    Route::get('/book-history/{id}', [UserBookController::class, 'showBookHistory'])->name('user.book-history');

    // BOOK BORROW REQUEST
    Route::get('/borrow-request/{id}', [UserBookController::class, 'showBorrowRequest'])->name('user.borrow-request');






    // UNBORROWED BOOK
    Route::get('/unborrowed-book/{id}', [UserBookController::class, 'showUnborrowedBook'])->name('user.unborrowed-book');

    // BORROWED BOOK
    Route::get('/borrowed-book/{id}', [UserBookController::class, 'showBorrowedBook'])->name('user.borrowed-book');

    // OVERDUE BOOK
    Route::get('/overdue-book/{id}', [UserBookController::class, 'showOverdueBook'])->name('user.overdue-book');


        // TESTERS
    // UNBORROWED BOOK
    // Route::get('/unborrowed-book', [UserBookController::class, 'showUnborrowedBook'])->name('user.unborrowed-book');

    // BORROWED BOOK
    // Route::get('/borrowed-book', [UserBookController::class, 'showBorrowedBook'])->name('user.borrowed-book');

    // OVERDUE BOOK
    // Route::get('/overdue-book', [UserBookController::class, 'showOverdueBook'])->name('user.overdue-book');
});
