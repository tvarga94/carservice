<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\Interface\ClientRepositoryInterface;
use Illuminate\Support\Collection;

class ClientRepository implements ClientRepositoryInterface
{
    public function all(): Collection
    {
        return Client::all();
    }

    public function findById(int $id): ?Client
    {
        return Client::find($id);
    }

    public function findByCardNumber(string $cardNumber): ?Client
    {
        return Client::where('card_number', $cardNumber)->first();
    }

    public function searchByName(string $name): Collection
    {
        return Client::where('name', 'like', "%{$name}%")->get();
    }
}
