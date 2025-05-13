<?php

namespace App\Providers;

use App\Repositories\Eloquent\CarRepository;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Eloquent\ServiceRepository;
use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;


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
        if (
            DB::table('clients')->count() === 0 &&
            DB::table('cars')->count() === 0 &&
            DB::table('services')->count() === 0
        ) {
            Artisan::call('db:seed', ['--class' => 'InitialDataSeeder']);
        }
    }
}
