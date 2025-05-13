<div class="mt-4">
    <h4 class="font-semibold mb-2">Cars of Client #{{ $clientId }}</h4>

    <table class="table-auto w-full border border-gray-300">
        <thead>
        <tr class="bg-gray-200">
            <th class="border px-3 py-2">Car ID</th>
            <th class="border px-3 py-2">Type</th>
            <th class="border px-3 py-2">Registered</th>
            <th class="border px-3 py-2">Own Brand</th>
            <th class="border px-3 py-2">Accident</th>
            <th class="border px-3 py-2">Last Event</th>
            <th class="border px-3 py-2">Last Event Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cars as $car)
            <tr>
                <td class="border px-3 py-2">
                    <button wire:click="selectCar({{ $car['car_id'] }})"
                            class="text-blue-600 hover:underline">
                        {{ $car['car_id'] }}
                    </button>
                </td>
                <td class="border px-3 py-2">{{ $car['type'] }}</td>
                <td class="border px-3 py-2">{{ \Carbon\Carbon::parse($car['registered'])->toDateString() }}</td>
                <td class="border px-3 py-2">{{ $car['ownbrand'] ? 'Yes' : 'No' }}</td>
                <td class="border px-3 py-2">{{ $car['accident'] }}</td>
                <td class="border px-3 py-2">
                    {{ $car['latest_service']['event'] ?? '—' }}
                </td>
                <td class="border px-3 py-2">
                    @if (($car['latest_service']['event'] ?? null) === 'regisztralt')
                        {{ \Carbon\Carbon::parse($car['registered'])->toDateTimeString() }}
                    @else
                        {{ \Carbon\Carbon::parse($car['latest_service']['eventtime'] ?? null)->toDateTimeString() }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if ($selectedCarId)
        <livewire:service-log :clientId="$clientId" :carId="$selectedCarId" :key="$selectedCarId" />
    @endif
</div>

