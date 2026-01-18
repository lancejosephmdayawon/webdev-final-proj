<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function showBooks()
    {
        return view('iskolib.user.books');
    }

    public function showBorrowRequest()
    {
        return view('iskolib.user.borrowreq-form');
    }

    public function showBorrowedBook()
    {
        return view('iskolib.user.borrowed-form');
    }

    public function showOverdueBook()
    {
        return view('iskolib.user.overdue-form');
    }
}
