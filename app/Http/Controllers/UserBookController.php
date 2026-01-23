<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $userId = Auth::id();

        // Get all borrow requests of the user that have been returned
        $history = BorrowRequest::with(['book.category', 'transaction.returnLog'])
            ->where('user_id', $userId)
            ->whereHas('transaction', function ($q) {
                $q->where('status', 'returned');
            })
            ->get()
            ->sortByDesc(fn($borrow) => $borrow->transaction?->returnLog?->date_returned); // sort in PHP

        $books = Book::with(['category'])->orderBy('title')->get();

        // BORROW REQUESTS
        $borrowRequests = BorrowRequest::with(['book.category', 'transaction.returnLog'])
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'approved', 'declined'])
            ->orderBy('request_date', 'desc')
            ->get();

        // UNBORROWED BOOKS
        $unborrowedBooks = BorrowRequest::with(['book.category', 'transaction.returnLog'])
            ->where('user_id', $userId)
            ->whereHas('transaction', function ($q) {
                $q->where('status', 'unborrowed');
            })
            ->orderBy('request_date', 'desc')
            ->get();

        // BORROWED BOOKS
        $borrowedBooks = BorrowRequest::with(['book.category', 'transaction.returnLog'])
            ->where('user_id', $userId)
            ->whereHas('transaction', function ($q) {
                $q->where('status', 'borrowed');
            })
            ->orderBy('request_date', 'desc')
            ->get();

        // OVERDUE BOOKS
        $today = Carbon::today();

        $overdueBooks = BorrowRequest::with(['book.category', 'transaction.returnLog'])
            ->where('user_id', $userId)
            ->whereHas('transaction', fn($q) => $q->where('status', 'borrowed')) // only borrowed books can be overdue
            ->whereDate('return_date', '<', $today) // BorrowRequest.return_date before today
            ->orderBy('return_date', 'asc')
            ->get();



        return view('user.books', compact('history', 'books', 'borrowRequests', 'unborrowedBooks', 'borrowedBooks', 'overdueBooks'));
    }

    public function showBookHistory($id)
    {
        $userId = Auth::id();

        $book = Book::with('category')->findOrFail($id);

        // Get borrow history of this book for this user, only returned
        $history = BorrowRequest::with('transaction')
            ->where('user_id', $userId)
            ->where('book_id', $id)
            ->whereHas('transaction', function ($query) {
                $query->where('status', 'returned');
            })
            ->orderBy('borrow_date', 'desc')
            ->get();

        return view('user.book-history', compact('book', 'history'));
    }




    public function showBorrowRequest($id)
    {
        $borrowRequest = BorrowRequest::with([
            'book.category',
            'transaction.returnLog',
            'user'
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.borrowreq-form', compact('borrowRequest'));
    }

    public function showUnborrowedBook($id)
    {
        $unborrowedBook = BorrowRequest::with([
            'book.category',
            'transaction.returnLog',
            'user'
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.unborrowed-form', compact('unborrowedBook'));
    }

    public function showBorrowedBook($id)
    {
        $borrowedBook = BorrowRequest::with([
            'book.category',
            'transaction.returnLog',
            'user'
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('user.borrowed-form', compact('borrowedBook'));
    }

    public function showOverdueBook($id)
    {
        $today = now()->toDateString();

        $overdueBook = BorrowRequest::with([
            'book.category',
            'transaction.returnLog',
            'user'
        ])
            ->where('user_id', Auth::id())
            ->whereDate('return_date', '<', $today) // only overdue
            ->findOrFail($id);

        return view('user.overdue-form', compact('overdueBook'));
    }
}
