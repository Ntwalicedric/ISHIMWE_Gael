@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Reports</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg font-semibold mb-2">Summary</h2>
            <p>Total Cargos: {{ \App\Models\Cargo::count() }}</p>
            <p>Total Ships: {{ \App\Models\Ship::count() }}</p>
            <p>Total Cargo Weight: {{ \App\Models\Cargo::sum('weight') }}</p>
            @php
                $mostLoadedShip = \App\Models\Ship::withCount('cargos')->orderByDesc('cargos_count')->first();
            @endphp
            <p>Most Loaded Ship: {{ $mostLoadedShip ? $mostLoadedShip->name . ' (' . $mostLoadedShip->cargos_count . ' cargos)' : 'N/A' }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-lg font-semibold mb-2">Cargos Per Ship</h2>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-3">Ship</th>
                        <th class="py-2 px-3">Cargos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Ship::withCount('cargos')->get() as $ship)
                    <tr class="border-b">
                        <td class="py-2 px-3">{{ $ship->name }}</td>
                        <td class="py-2 px-3">{{ $ship->cargos_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 