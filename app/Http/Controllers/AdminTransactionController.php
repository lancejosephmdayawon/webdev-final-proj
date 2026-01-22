<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function showTransaction()
    {
        $borrowRequests = BorrowRequest::with('book.category')
            ->where('status', 'pending')
            ->orderBy('request_date') // Oldest First - First Come First Serve
            ->get();

        return view('admin.transaction', compact('borrowRequests'));
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


    public function showBorrowedBook()
    {
        return view('iskolib.admin.borrowed-form');
    }

    public function showBorrowDecline()
    {
        return view('iskolib.admin.borrow-decline');
    }

    public function showOverdueBook()
    {
        return view('iskolib.admin.overdue-form');
    }

    public function showReturnedBook()
    {
        return view('iskolib.admin.returned-book');
    }
}
