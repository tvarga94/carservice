<div class="container mt-5">
    <h2 class="text-xl font-bold mb-4">Clients</h2>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Card Number</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td class="border px-4 py-2">{{ $client['id'] }}</td>
                <td class="border px-4 py-2">
                    <button wire:click="selectClient({{ $client['id'] }})"
                            class="text-blue-600 hover:underline">
                        {{ $client['name'] }}
                    </button>
                </td>
                <td class="border px-4 py-2">{{ $client['idcard'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $clients->links() }}
    </div>
    @if ($selectedClientId)
        <livewire:client-cars :clientId="$selectedClientId" />
    @endif
</div>
