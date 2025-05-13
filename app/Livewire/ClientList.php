<?php

namespace App\Livewire;

use App\Repositories\Interfaces\ClientRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class ClientList extends Component
{
    use WithPagination;

    public ?int $selectedClientId = null;

    protected ClientRepositoryInterface $clientsRepo;

    public function boot(ClientRepositoryInterface $clientsRepo)
    {
        $this->clientsRepo = $clientsRepo;
    }

    public function selectClient(int $clientId)
    {
        $this->selectedClientId = $clientId;
    }

    public function render()
    {
        return view('livewire.client-list', [
            'clients' => $this->clientsRepo->paginate(10),
            'selectedClientId' => $this->selectedClientId,
        ]);
    }
}
