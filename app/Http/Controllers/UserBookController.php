<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    public function showBorrowForm()
    {
        $books = Book::orderBy('title')->get();
        $user  = Auth::user();

        return view('user.borrow-form', compact('books', 'user'));
    }

    // This will let JS fetch author and description dynamically when the user picks a book from the <select> list.
    public function getBookInfo($id)
    {
        $book = Book::select('author', 'description')->findOrFail($id);
        return response()->json($book);
    }

    public function submitBorrowForm(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date|after_or_equal:today',
            'expected_return' => 'nullable|date|after_or_equal:borrow_date|before_or_equal:' . now()->addWeeks(4)->toDateString(),
        ]);

        BorrowRequest::create([
            'user_id'      => Auth::id(),
            'book_id'      => $validated['book_id'],
            'request_date' => now()->toDateString(),
            'borrow_date'  => $validated['borrow_date'],
            'return_date'  => $validated['expected_return'] ?? now()->addWeeks(4)->toDateString(),
            'status'       => 'pending',
        ]);

        return response()->json(['success' => true]);
    }


    public function showBooks()
    {
        return view('user.books');
    }

    public function showBorrowRequest()
    {
        return view('user.borrowreq-form');
    }

    public function showBorrowedBook()
    {
        return view('user.borrowed-form');
    }

    public function showOverdueBook()
    {
        return view('user.overdue-form');
    }

    public function showBookHistory()
    {
        return view('user.book-history');
    }
}
