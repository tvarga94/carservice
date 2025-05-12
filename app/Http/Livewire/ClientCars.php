<?php

namespace App\Http\Livewire;

use App\Repositories\Interfaces\CarRepositoryInterface;
use Livewire\Component;

class ClientCars extends Component
{
    public int $clientId;
    public array $cars = [];
    public ?int $selectedCarId = null;

    protected CarRepositoryInterface $carRepo;

    public function boot(CarRepositoryInterface $carRepo)
    {
        $this->carRepo = $carRepo;
    }

    public function mount(int $clientId)
    {
        $this->clientId = $clientId;
        $this->cars = $this->carRepo->getWithLastServiceByClientId($clientId)->toArray();
    }

    public function selectCar(int $carId)
    {
        $this->selectedCarId = $carId;
    }

    public function render()
    {
        return view('livewire.client-cars');
    }
}
