<?php

namespace App\Http\Livewire;

use App\Repositories\Interface\ClientRepositoryInterface;
use Livewire\Component;

class ClientList extends Component
{
    public array $clients = [];

    public ?int $selectedClientId = null;

    protected ClientRepositoryInterface $clientsRepo;

    public function boot(ClientRepositoryInterface $clientsRepo)
    {
        $this->clientsRepo = $clientsRepo;
    }

    public function mount()
    {
        $this->clients = $this->clientsRepo->all()->toArray();
    }

    public function selectClient(int $clientId)
    {
        $this->selectedClientId = $clientId;
    }

    public function render()
    {
        return view('livewire.client-list', [
            'selectedClientId' => $this->selectedClientId,
        ]);
    }
}
