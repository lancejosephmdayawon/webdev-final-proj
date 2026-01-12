<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IskoLibAuthController extends Controller
{
    public function showWelcome()
    {
        return view('iskolib.lib-welcome');
    }
}
