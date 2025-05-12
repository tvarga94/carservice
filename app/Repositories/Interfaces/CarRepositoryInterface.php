<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CarRepositoryInterface
{
    /**
     * Get all cars.
     */
    public function all(): Collection;

    /**
     * Get cars for a specific client.
     */
    public function getByClientId(int $clientId): Collection;

    /**
     * Get cars with latest service info for a client.
     */
    public function getWithLastServiceByClientId(int $clientId): Collection;
}
