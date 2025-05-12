<?php

namespace App\Providers;

use CarRepositoryInterface;
use ClientRepositoryInterface;
use Eloquent\CarRepository;
use Eloquent\ClientRepository;
use Eloquent\ServiceRepository;
use Illuminate\Support\ServiceProvider;
use ServiceRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
