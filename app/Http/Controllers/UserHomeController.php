<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function showHome()
    {
        return view('iskolib.user.home');
    }

    public function showBookDetails()
    {
        return view('iskolib.user.book-details');
    }

    public function showBorrowForm()
    {
        return view('iskolib.user.borrow');
    }
}
