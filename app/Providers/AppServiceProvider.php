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
        $this->app->singleton(\App\Services\SEOManager::class, function ($app) {
            return new \App\Services\SEOManager();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('seo', app(\App\Services\SEOManager::class));
    }
}
