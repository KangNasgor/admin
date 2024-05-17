<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user is an admin
            if (Auth::user()->is_admin) {
                return $next($request);
            } else {
                return redirect('/dashboard')->with('error', 'Access denied. You are not an admin.');
            }
        }
        return redirect('/');
    }
}
