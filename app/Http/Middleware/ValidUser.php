<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->user_type == 'customer') {
            return redirect('/');
        } else if (Auth::check() && Auth::user()->user_type == 'seller') {
            return redirect('/dashboard');
        }
        else if (Auth::check() && Auth::user()->user_type == 'admin'){
            return redirect('/admin-dashboard');
        } else {
            return $next($request);
        }
    }
}
