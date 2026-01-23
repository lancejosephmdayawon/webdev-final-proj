<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class IskoLibAuthController extends Controller
{
    public function showWelcome()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'student') {
                return redirect()->route('user.home');
            } elseif ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        // No user is logged in, show the welcome page
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
                    : route('user.home')
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

    public function showChangePass()
    {
        return view('change-pass');
    }

    public function updatePassword(Request $request)
    {
        // Validate input
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', // requires new_password_confirmation
        ]);

        $user = Auth::user();

        // Check if old password is correct
        if (!Hash::check($request->current_password, $user->password_hash)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }

        // Update password using query builder to avoid save() error
        User::where('id', $user->id)
            ->update(['password_hash' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password updated successfully! You can now go back.');
    }

    public function showUserProfile()
    {
        return view('user.profile');
    }

    public function showAdminProfile()
    {
        return view('admin.profile');
    }
}
