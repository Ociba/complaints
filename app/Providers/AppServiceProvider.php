<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        if (file_exists(base_path('routes/api.php'))) {
            Route::middleware('api')
                 ->prefix('api') // Adds /api prefix to routes
                 ->group(base_path('routes/api.php'));
        }
    }
}
