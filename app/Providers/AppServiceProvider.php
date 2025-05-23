<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function boot()
    {
        // Share the $admin variable with all views
        View::composer('*', function ($view) {
            $admin = Auth::guard('admin')->user();
            $view->with('admin', $admin);
        });
    }
    
}
