<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Group\EconomicGroupRepositoryInterface;
use App\Repositories\Group\EconomicGroupRepository;
use App\Services\EconomicGroupService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            EconomicGroupRepositoryInterface::class,
            EconomicGroupRepository::class
        );

        $this->app->singleton(EconomicGroupService::class, function ($app) {
            return new EconomicGroupService($app->make(EconomicGroupRepositoryInterface::class));
        });


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
