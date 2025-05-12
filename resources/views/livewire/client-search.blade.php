<div class="mb-6">
    <h2 class="text-lg font-bold mb-2">Search Client</h2>

    <div class="flex gap-4 items-center mb-2">
        <input wire:model.defer="name" type="text" placeholder="Client Name"
               class="border p-2 rounded w-64" />

        <input wire:model.defer="cardNumber" type="text" placeholder="Card Number"
               class="border p-2 rounded w-64" />

        <button wire:click="search" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Search
        </button>
    </div>

    @if ($error)
        <div class="text-red-600">{{ $error }}</div>
    @endif

    @if ($result)
        <div class="mt-3 border p-3 rounded bg-gray-50">
            <p><strong>ID:</strong> {{ $result['id'] }}</p>
            <p><strong>Name:</strong> {{ $result['name'] }}</p>
            <p><strong>Card Number:</strong> {{ $result['card_number'] }}</p>
            <p><strong>Number of Cars:</strong> {{ $result['car_count'] }}</p>
            <p><strong>Service Records Total:</strong> {{ $result['service_count'] }}</p>
        </div>
    @endif
</div>
