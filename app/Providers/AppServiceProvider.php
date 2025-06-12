<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('firebase', \App\Services\FirebaseService::class);
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

        Schema::defaultStringLength(191);
    }
}
