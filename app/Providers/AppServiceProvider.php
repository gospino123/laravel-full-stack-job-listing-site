<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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

        // is
        // Allows you to check if two models have same ID and belong to same table
        // Gate::define('edit-job', function(User $user, Job $job) {
        //     // Gate ALWAYS looks for currently authenticated user
        //     // Workarounds:
        //     // User $user = null or ?User $user 
        //     return $job->employer->user->is($user);
        // });
    }
}
