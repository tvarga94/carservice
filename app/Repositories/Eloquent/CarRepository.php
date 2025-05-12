<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;

use App\Repositories\Interface\CarRepositoryInterface;
use Illuminate\Support\Collection;

class CarRepository implements CarRepositoryInterface
{
    public function all(): Collection
    {
        return Car::all();
    }

    public function getByClientId(int $clientId): Collection
    {
        return Car::where('client_id', $clientId)->get();
    }

    public function getWithLastServiceByClientId(int $clientId): Collection
    {
        return Car::where('client_id', $clientId)
            ->with(['latestService' => function ($query) {
                $query->orderByDesc('log_number')->limit(1);
            }])
            ->get();
    }
}
