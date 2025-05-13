<div class="mt-2 mb-4 ml-8">
    <h5 class="font-semibold mb-1">Service Log for Car #{{ $carId }}</h5>

    <table class="table-auto w-full border border-gray-200">
        <thead class="bg-gray-100">
        <tr>
            <th class="border px-3 py-2">Log #</th>
            <th class="border px-3 py-2">Event</th>
            <th class="border px-3 py-2">Event Time</th>
            <th class="border px-3 py-2">Document ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($logs as $log)
            <tr>
                <td class="border px-3 py-2">{{ $log['lognumber'] }}</td>
                <td class="border px-3 py-2">{{ $log['event'] }}</td>
                <td class="border px-3 py-2">
                    {{ 'regisztralt' === $log['event']
                        ? \Carbon\Carbon::parse($log['registered'] ?? now())->toDateTimeString()
                        : \Carbon\Carbon::parse($log['eventtime'])->toDateTimeString() }}
                </td>
                <td class="border px-3 py-2">{{ $log['document_id'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
