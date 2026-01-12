<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function showTransaction()
    {
        return view('iskolib.admin.transaction');
    }
}
