<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
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
        $brands = Brand::all();
        $categories = Category::all();
        if (Auth::check()) {
            $user_cart_count = auth()->user()->carts->count();
        } else {
            $user_cart_count = 0;
        }
        view()->share('user_cart_count', $user_cart_count);
        view()->share('categories', compact('categories'));
        view()->share('brands', compact('brands'));
    }
}
