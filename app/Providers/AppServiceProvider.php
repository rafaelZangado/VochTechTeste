<?php

namespace App\Providers;

use App\Services\AuditService;
use App\Services\AuthService;
use App\Services\DashboardService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Group\EconomicGroupRepositoryInterface;
use App\Repositories\Group\EconomicGroupRepository;
use App\Services\EconomicGroupService;
use App\Repositories\Flag\FlagRepositoryInterface;
use App\Repositories\Flag\FlagRepository;
use App\Services\FlagsService;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Services\EmployeeService;
use App\Repositories\Unit\UnitRepositoryInterface;
use App\Repositories\Unit\UnitRepository;
use App\Services\UnitService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         // Economic Group
         $this->app->bind(
            EconomicGroupRepositoryInterface::class,
            EconomicGroupRepository::class
        );
        $this->app->singleton(EconomicGroupService::class, function ($app) {
            return new EconomicGroupService($app->make(EconomicGroupRepositoryInterface::class));
        });

        // Flag
        $this->app->bind(
            FlagRepositoryInterface::class,
            FlagRepository::class
        );
        $this->app->singleton(FlagsService::class, function ($app) {
            return new FlagsService($app->make(FlagRepositoryInterface::class));
        });

        // Employee
        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );
        $this->app->singleton(EmployeeService::class, function ($app) {
            return new EmployeeService($app->make(EmployeeRepositoryInterface::class));
        });

        // Unit
        $this->app->bind(
            UnitRepositoryInterface::class,
            UnitRepository::class
        );
        $this->app->singleton(UnitService::class, function ($app) {
            return new UnitService($app->make(UnitRepositoryInterface::class));
        });

        //Audit
        $this->app->bind( AuditService::class);

        //Dashboard
        $this->app->bind( DashboardService::class);

         //Dashboard
         $this->app->bind( AuthService::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
