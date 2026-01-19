<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  // the role we want to check
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = Auth::user()->role;

        if ($userRole !== $role) {
            // User is logged in but trying to access the wrong role page
            if ($userRole === 'student') {
                return redirect()->route('user.home')->with('error', 'Unauthorized action.');
            } elseif ($userRole === 'admin') {
                return redirect()->route('admin.dashboard')->with('error', 'Unauthorized action.');
            } else {
                // Optional: fallback for any unexpected role
                return redirect('/login')->with('error', 'Unauthorized action.');
            }
        }


        return $next($request);
    }
}
