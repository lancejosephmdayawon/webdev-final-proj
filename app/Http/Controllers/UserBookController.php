<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function showBooks()
    {
        return view('user.books');
    }
}
