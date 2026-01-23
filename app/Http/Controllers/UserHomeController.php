<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function showHome()
    {
        $books = Book::with('category')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.home', compact('books'));
    }

    public function showBookDetails($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('user.book-details', compact('book', 'categories'));
    }

    public function showBorrowForm($id)
    {
        // Get the book and its category
        $book = Book::with('category')->findOrFail($id);

        return view('user.borrow', compact('book'));
    }

    // Handle borrow form submission
    public function submitBorrowForm(Request $request, $id)
    {
        // Validate
        $validated = $request->validate([
            'borrow_date' => 'required|date',
            'expected_return' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        BorrowRequest::create([
            'user_id' => Auth::id(),
            'book_id' => $id,
            'request_date' => now()->toDateString(),
            'borrow_date' => $validated['borrow_date'],
            'return_date' => $validated['expected_return'] ?? now()->addWeeks(4)->toDateString(),
            'status' => 'pending',
        ]);

        // If request expects JSON (AJAX)
        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        // Fallback for normal requests
        return redirect()->route('user.home')->with('success', 'Borrow request submitted successfully!');
    }
}
