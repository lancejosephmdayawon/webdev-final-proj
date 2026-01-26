<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    // Cards Data
    $totalBooks = Book::sum('stock_qty');

    // Available books = same as total if stock_qty is what’s left in the library
    $availableBooks = $totalBooks;

    // Borrowed books (count of transactions with 'borrowed' status)
    $borrowedBooks = BorrowTransaction::where('status', 'borrowed')->count();

    // Total books = available + borrowed
    $totalBooks = $availableBooks + $borrowedBooks;

    // Overdue books (borrowed past return date)
    $today = Carbon::today();
    
    $overdueBooks = BorrowTransaction::where('status', 'borrowed')
    ->whereHas('borrowRequest', function($query) use ($today) {
        $query->where('return_date', '<', $today);
    })
    ->count();

    // Dashboard Table Data
    $books = Book::with('category')->get();

    return view('admin.dashboard', compact(
        'totalBooks',
        'availableBooks',
        'borrowedBooks',
        'overdueBooks',
        'books'
    ));
    }
}
