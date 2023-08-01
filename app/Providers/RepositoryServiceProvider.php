<?php

namespace App\Providers;

use App\Interface\DistrictInterface;
use App\Interface\VillageInterface;
use App\Repositories\DistrictRepository;
use App\Repositories\VillageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            VillageInterface::class,
            VillageRepository::class
        );
        $this->app->bind(
            DistrictInterface::class,
            DistrictRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
