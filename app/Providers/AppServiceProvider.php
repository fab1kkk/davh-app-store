<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $currentUser = ucwords(substr(Auth::user()->name, 0, strpos(Auth::user()->name, "@")));
            } else {
                $currentUser = null;
            }
            $viewData = [
                'currentUser' => $currentUser,
                'totalUsers' => count(User::all()),
                'totalProducts' => count(Product::all()),
            ];

            $view->with($viewData);
        });

    }
}
