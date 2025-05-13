<?php

namespace App\Repositories\Interfaces;

use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ClientRepositoryInterface
{
    /**
     * Get all clients.
     */
    public function all(): Collection;

    /**
     * Find a client by ID.
     */
    public function findById(int $id): ?Client;

    /**
     * Find a client by exact card number.
     */
    public function findByCardNumber(string $cardNumber): ?Client;

    /**
     * Search clients by partial name match.
     */
    public function searchByName(string $name): Collection;

    public function paginate(int $perPage = 10): LengthAwarePaginator;

}
