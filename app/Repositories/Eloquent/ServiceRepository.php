<?php

namespace App\Repositories\Eloquent;

use App\Models\Service;
use App\Repositories\Interface\ServiceRepositoryInterface;
use Illuminate\Support\Collection;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getByCar(int $clientId, int $carId): Collection
    {
        return Service::where('client_id', $clientId)
            ->where('car_id', $carId)
            ->orderBy('log_number', 'asc')
            ->get();
    }

    public function countByClient(int $clientId): int
    {
        return Service::where('client_id', $clientId)->count();
    }
}
