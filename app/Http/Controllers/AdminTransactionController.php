<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function showTransaction()
    {
        return view('iskolib.admin.transaction');
    }

    public function showBorrowRequest()
    {
        return view('iskolib.admin.borrowreq-form');
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
