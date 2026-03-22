<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

/**
 * AuthCheck Middleware
 * 
 * This middleware handles authentication checks for the application.
 * It separates public customer-facing routes from protected admin routes.
 * 
 * Flow:
 * 1. Public routes (home, login, register, images) - Always accessible
 * 2. Public patterns (customer/*, shop/*, etc.) - Always accessible
 * 3. Admin routes (admin/*, product/*, category/*) - Require authentication
 * 4. Other routes - Accessible if authenticated, otherwise redirect to login
 */
class AuthCheck
{
    /**
     * Public routes that don't require authentication
     * These are customer-facing routes
     */
    protected $publicRoutes = [
        '/',
        'auth/login',
        'auth/register',
        'product/image/*',
        'category/image/*',
    ];

    /**
     * Public route patterns that don't require authentication
     */
    protected $publicPatterns = [
        'customer/*',
        'shop/*',
        'products/*',
        'categories/*',
    ];

    /**
     * Admin routes that require authentication
     */
    protected $adminRoutes = [
        'admin',
        'admin/*',
        'product',
        'product/*',
        'category',
        'category/*',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // Allow public routes
        foreach ($this->publicRoutes as $route) {
            if ($request->is($route)) {
                return $next($request);
            }
        }

        // Allow public patterns
        foreach ($this->publicPatterns as $pattern) {
            if ($request->is($pattern)) {
                return $next($request);
            }
        }

        // Check if it's an admin route
        $isAdminRoute = false;
        foreach ($this->adminRoutes as $route) {
            if ($request->is($route)) {
                $isAdminRoute = true;
                break;
            }
        }

        // If it's an admin route and user is not authenticated, redirect to login
        if ($isAdminRoute && !Auth::check()) {
            return redirect()->route('admin.auth.login');
        }

        // If authenticated or not an admin route, allow access
        if (Auth::check() || !$isAdminRoute) {
            return $next($request);
        }

        // Default: redirect to login
        return redirect()->route('admin.auth.login');
    }
}