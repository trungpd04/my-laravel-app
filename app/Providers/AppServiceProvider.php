<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Facades\View::composer('layout.admin.layout', function (View $view) {
            $loggedInUser = Auth::user();
            $view->with('loggedInUser', $loggedInUser);
        });

        // Share recursive category tree with customer layout navbar.
        // with('allChildren') triggers the self-referencing relation chain,
        // loading all descendants in depth-first order without N+1 queries.
        Facades\View::composer('layout.customer.layout', function (View $view) {
            $navCategories = \App\Models\Category::whereNull('parent_id')
                ->where('is_active', 1)
                ->where('is_deleted', 0)
                ->with('allChildren')
                ->orderBy('name')
                ->get();
            $view->with('navCategories', $navCategories);
        });
    }
}
