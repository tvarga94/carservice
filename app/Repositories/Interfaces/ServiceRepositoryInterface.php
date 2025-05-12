<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface ServiceRepositoryInterface
{
    /**
     * Get all service logs for a specific client and car.
     */
    public function getByCar(int $clientId, int $carId): Collection;

    /**
     * Count all service records for a specific client.
     */
    public function countByClient(int $clientId): int;
}
