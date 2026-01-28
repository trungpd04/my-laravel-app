<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('age') || $request->is('access-denied')) {
            return $next($request);
        }

        $age = session()->get('age');

        if ($age && $age >= 18) {
            return $next($request);
        }

        return redirect()->route('access.denied');
    }
}
