<?php

namespace App\Livewire;

use App\Repositories\Interfaces\ServiceRepositoryInterface;
use Livewire\Component;

class ServiceLog extends Component
{
    public int $clientId;
    public int $carId;
    public array $logs = [];

    protected ServiceRepositoryInterface $serviceRepo;

    public function boot(ServiceRepositoryInterface $serviceRepo)
    {
        $this->serviceRepo = $serviceRepo;
    }

    public function mount(int $clientId, int $carId)
    {
        $this->clientId = $clientId;
        $this->carId = $carId;
        $this->logs = $this->serviceRepo->getByCar($clientId, $carId)->toArray();
    }

    public function render()
    {
        return view('livewire.service-log');
    }
}
