<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Filament panel registration and auth configuration is handled
        // by the Filament package and its service providers.
        // See config/filament.php for panel configuration.
    }
}
