<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }

        // Check if the user's status is active and role is either main_admin or super_admin
        $user = Auth::user();
        if ($user->active !== 1) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is deactivated. Please contact support.');
        }

        // Check if the user has the role of main_admin or super_admin
        if (Auth::user()->role !== 'admin'&& Auth::user()->role !== 'operator'){
            Auth::logout();
            return redirect()->route('login')->with('error', 'You do not have the required permissions to access this resource.');
        }

        return $next($request);
    }
}
