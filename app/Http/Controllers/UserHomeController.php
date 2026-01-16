<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function showHome()
    {
        return view('user.home');
    }

    public function showBookDetails()
    {
        return view('user.book-details');
    }

    public function showBorrowForm()
    {
        return view('user.borrow');
    }
}
