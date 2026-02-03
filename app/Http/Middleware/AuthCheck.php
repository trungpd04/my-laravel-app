<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('auth/login') || $request->is('auth/register')) {
            return $next($request);
        }

        if (Auth::check()) {
            return $next($request);
        }

        return redirect()->route('admin.auth.login');
    }
}