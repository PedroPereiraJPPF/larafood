<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Plan;
use App\Observers\planObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::Observe(PlanObserver::class);
    }
}
