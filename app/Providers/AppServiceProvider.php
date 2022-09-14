<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{
    Category,
    Plan,
    Product,
    Tenant
};
use App\Observers\{
    CategoryObserver,
    planObserver,
    ProductObserver,
    TenantObserver,
};
use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TenantRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::Observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
