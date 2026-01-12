<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IskoLibAuthController extends Controller
{
    public function showWelcome()
    {
        return view('iskolib.welcome');
    }

    public function showLogin()
    {
        return view('iskolib.login');
    }
}
