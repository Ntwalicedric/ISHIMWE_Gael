@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-8 text-center">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-gradient-to-br from-blue-100 to-blue-300 p-6 rounded-xl shadow-lg flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-2">Cargos</h2>
            <p class="text-2xl font-bold mb-2">{{ \App\Models\Cargo::count() }}</p>
            <p class="mb-4">Total Cargo Weight: <span class="font-semibold">{{ $totalCargoWeight }}</span></p>
            <a href="{{ route('cargos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-2 transition">Add Cargo</a>
            <a href="{{ route('cargos.index') }}" class="text-blue-700 underline">Manage Cargos</a>
        </div>
        <div class="bg-gradient-to-br from-green-100 to-green-300 p-6 rounded-xl shadow-lg flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-2">Ships</h2>
            <p class="text-2xl font-bold mb-2">{{ \App\Models\Ship::count() }}</p>
            <p class="mb-4">Most Loaded Ship: <span class="font-semibold">{{ $mostLoadedShip ? $mostLoadedShip->name . ' (' . $mostLoadedShip->cargos_count . ' cargos)' : 'N/A' }}</span></p>
            <a href="{{ route('ships.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-2 transition">Add Ship</a>
            <a href="{{ route('ships.index') }}" class="text-green-700 underline">Manage Ships</a>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Recent Cargos</h2>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-3">Name</th>
                        <th class="py-2 px-3">Weight</th>
                        <th class="py-2 px-3">Ship</th>
                        <th class="py-2 px-3">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentCargos as $cargo)
                    <tr class="border-b">
                        <td class="py-2 px-3">{{ $cargo->name }}</td>
                        <td class="py-2 px-3">{{ $cargo->weight }}</td>
                        <td class="py-2 px-3">{{ $cargo->ship->name ?? 'N/A' }}</td>
                        <td class="py-2 px-3">{{ $cargo->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Recent Ships</h2>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-3">Name</th>
                        <th class="py-2 px-3">Type</th>
                        <th class="py-2 px-3">Capacity</th>
                        <th class="py-2 px-3">Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentShips as $ship)
                    <tr class="border-b">
                        <td class="py-2 px-3">{{ $ship->name }}</td>
                        <td class="py-2 px-3">{{ $ship->type }}</td>
                        <td class="py-2 px-3">{{ $ship->capacity }}</td>
                        <td class="py-2 px-3">{{ $ship->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
