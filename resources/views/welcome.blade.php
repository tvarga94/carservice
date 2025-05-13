<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Service App</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto p-6 space-y-6">
    <h1 class="text-3xl font-bold">Car Service Management</h1>

    <div class="bg-white p-4 shadow rounded">
        <livewire:client-search />
    </div>

    <div class="bg-white p-4 shadow rounded">
        <livewire:client-list />
    </div>
</div>

@livewireScripts
</body>
</html>
