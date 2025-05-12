<?php

namespace App\Http\Livewire;

use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Repositories\Interfaces\ClientRepositoryInterface;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use Livewire\Component;

class ClientSearch extends Component
{
    public ?string $name = null;
    public ?string $cardNumber = null;

    public ?array $result = null;
    public ?string $error = null;

    protected ClientRepositoryInterface $clientRepo;
    protected CarRepositoryInterface $carRepo;
    protected ServiceRepositoryInterface $serviceRepo;

    public function boot(
        ClientRepositoryInterface $clientRepo,
        CarRepositoryInterface $carRepo,
        ServiceRepositoryInterface $serviceRepo
    ) {
        $this->clientRepo = $clientRepo;
        $this->carRepo = $carRepo;
        $this->serviceRepo = $serviceRepo;
    }

    public function search()
    {
        $this->error = null;
        $this->result = null;

        // Validation rules
        if (!$this->name && !$this->cardNumber) {
            $this->error = 'Please enter either a name or a card number.';
            return;
        }

        if ($this->name && $this->cardNumber) {
            $this->error = 'Please fill only one field.';
            return;
        }

        if ($this->cardNumber && !preg_match('/^[a-zA-Z0-9]+$/', $this->cardNumber)) {
            $this->error = 'Card number must be alphanumeric.';
            return;
        }

        if ($this->cardNumber) {
            $client = $this->clientRepo->findByCardNumber($this->cardNumber);
            if (!$client) {
                $this->error = 'No client found with that card number.';
                return;
            }
        } else {
            $matches = $this->clientRepo->searchByName($this->name);
            if ($matches->count() === 0) {
                $this->error = 'No client found.';
                return;
            } elseif ($matches->count() > 1) {
                $this->error = 'More than one client matched. Please be more specific.';
                return;
            }
            $client = $matches->first();
        }

        $carCount = $this->carRepo->getByClientId($client->id)->count();
        $serviceCount = $this->serviceRepo->countByClient($client->id);

        $this->result = [
            'id' => $client->id,
            'name' => $client->name,
            'card_number' => $client->card_number,
            'car_count' => $carCount,
            'service_count' => $serviceCount,
        ];
    }

    public function render()
    {
        return view('livewire.client-search');
    }
}
