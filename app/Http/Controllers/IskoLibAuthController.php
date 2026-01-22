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

    public function showChangePass()
    {
        return view('iskolib.change-pass');
    }

    public function showUserProfile()
    {
        return view('iskolib.user.profile');
    }

    public function showAdminProfile()
    {
        return view('iskolib.admin.profile');
    }
}
