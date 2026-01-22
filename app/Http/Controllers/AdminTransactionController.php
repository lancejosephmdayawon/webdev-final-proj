<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use App\Models\BorrowTransaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function showTransaction()
    {
        $borrowRequests = BorrowRequest::with('book.category')
            ->where('status', 'pending')
            ->orderBy('request_date') // Oldest First - First Come First Serve
            ->get();

        $declinedRequests = BorrowRequest::with('book.category')
            ->where('status', 'declined')
            ->orderBy('request_date', 'desc')
            ->get();

        $unborrowedTransactions = BorrowTransaction::with([
            'borrowRequest.book.category',
            'borrowRequest.user'
        ])
            ->where('status', 'unborrowed')
            ->orderBy('date_borrowed')
            ->get();

        return view('admin.transaction', compact('borrowRequests', 'declinedRequests', 'unborrowedTransactions'));
    }

    // Showing Barrow Requests
    public function showBorrowRequest($id)
    {
        $borrowRequest = BorrowRequest::with('book.category', 'user')->findOrFail($id);
        return view('admin.borrowreq-form', compact('borrowRequest'));
    }

    // Updating status to approved
    public function approveBorrowRequest($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);
        $borrowRequest->status = 'approved';
        $borrowRequest->save();

        return response()->json([
            'success' => true,
            'message' => 'Borrow request approved!'
        ]);
    }

    public function declineBorrowRequest($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);
        $borrowRequest->status = 'declined';
        $borrowRequest->save();

        return response()->json([
            'success' => true,
            'message' => 'Borrow request declined!'
        ]);
    }

    // Show details for a specific unborrowed book
    public function showUnborrowedBook($id)
    {
        $transaction = BorrowTransaction::with([
            'borrowRequest.book.category',
            'borrowRequest.user'
        ])->findOrFail($id);

        return view('admin.unborrowed-form', compact('transaction'));
    }

    // Confirm borrow: mark book as borrowed
    public function borrowBook($id)
    {
        $transaction = BorrowTransaction::findOrFail($id);
        $transaction->status = 'borrowed';
        $transaction->date_borrowed = now();
        $transaction->save();

        // Return JSON for your JS fetch
        return response()->json([
            'success' => true,
            'message' => 'Book marked as borrowed!',
        ]);
    }


    public function showBorrowedBook()
    {
        return view('admin.borrowed-form');
    }

    public function showBorrowDecline($id)
    {
        $req = BorrowRequest::with(['user', 'book'])
            ->where('status', 'declined')
            ->findOrFail($id);

        return view('admin.borrow-decline', compact('req'));
    }

    public function showOverdueBook()
    {
        return view('admin.overdue-form');
    }

    public function showReturnedBook()
    {
        return view('admin.returned-book');
    }
}
