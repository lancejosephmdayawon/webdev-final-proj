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
        if (!Auth::check()) {
            // User not logged in
            return redirect('/login');
        }

        if (Auth::user()->role !== $role) {
            // Logged in but not the correct role
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
