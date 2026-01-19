<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class IskoLibAuthController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password_hash)) {
            Auth::login($user); // logs in user
            $request->session()->regenerate(); // protects session

            // Redirect based on role
            return redirect()->intended(
                $user->role === 'admin'
                    ? route('admin.dashboard')
                    : route('student.home')
            );
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
