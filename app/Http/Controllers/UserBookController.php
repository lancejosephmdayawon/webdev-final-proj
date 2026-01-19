<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBookController extends Controller
{
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
}
