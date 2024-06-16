<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        // Triggered after all app dependencies have been loaded
        Model::preventLazyLoading();

        // Paginator::defaultView('pagination::bootstrap-4');
        // Paginator::useTailwind();
        // Used if you want to change the default styles for the Paginator
    }
}
