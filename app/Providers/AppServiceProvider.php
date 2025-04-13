<?php

namespace App\Providers;

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
        // Serve static assets from public directory
        if ($this->app->environment('local')) {
            $this->app->bind('path.public', function() {
                return base_path('public');
            });
        }
    }
}
