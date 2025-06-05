@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cargos</h1>
    <a href="{{ route('cargos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Cargo</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Name</th>
                <th class="py-2">Description</th>
                <th class="py-2">Weight</th>
                <th class="py-2">Ship</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                <td class="py-2">{{ $cargo->id }}</td>
                <td class="py-2">{{ $cargo->name }}</td>
                <td class="py-2">{{ $cargo->description }}</td>
                <td class="py-2">{{ $cargo->weight }}</td>
                <td class="py-2">{{ $cargo->ship->name ?? 'N/A' }}</td>
                <td class="py-2">
                    <a href="{{ route('cargos.show', $cargo) }}" class="text-green-500">View</a>
                    <a href="{{ route('cargos.edit', $cargo) }}" class="text-blue-500 ml-2">Edit</a>
                    <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 