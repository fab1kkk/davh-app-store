<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $currentUser = ucwords(substr(Auth::user()->name, 0, strpos(Auth::user()->name, "@")));
            }
            $viewData = [
                'currentUser' => $currentUser,
                'totalUsers' => count(User::all()),
                'totalProducts' => count(Product::all()),
                'totalBeds' => count(Product::all()->where('product_categories_id', 1)),
                'totalMattresses' => count(Product::all()->where('product_categories_id', 2)),
                'totalSofas' => count(Product::all()->where('product_categories_id', 3)),
                'totalArmChairs' => count(Product::all()->where('product_categories_id', 4)),
            ];

            $view->with($viewData);
        });

        // View::composer('*', function ($view){
        //     $total
        // })
    }
}
