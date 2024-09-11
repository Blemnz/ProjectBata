<?php

namespace App\Providers;

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
        Paginator::useBootstrapFive();

        $schedule = app(\Illuminate\Console\Scheduling\Schedule::class);
        $schedule->command('queue:work --stop-when-empty')->everyMinute()->withoutOverlapping(3600);

    }
}
