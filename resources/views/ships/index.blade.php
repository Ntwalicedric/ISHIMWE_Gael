@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ships</h1>
    <a href="{{ route('ships.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">Add Ship</a>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-3">ID</th>
                <th class="py-2 px-3">Name</th>
                <th class="py-2 px-3">Type</th>
                <th class="py-2 px-3">Capacity</th>
                <th class="py-2 px-3">Created</th>
                <th class="py-2 px-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ships as $ship)
            <tr class="border-b">
                <td class="py-2 px-3">{{ $ship->id }}</td>
                <td class="py-2 px-3">{{ $ship->name }}</td>
                <td class="py-2 px-3">{{ $ship->type }}</td>
                <td class="py-2 px-3">{{ $ship->capacity }}</td>
                <td class="py-2 px-3">{{ $ship->created_at->format('Y-m-d') }}</td>
                <td class="py-2 px-3">
                    <a href="{{ route('ships.show', $ship) }}" class="text-green-500">View</a>
                    <a href="{{ route('ships.edit', $ship) }}" class="text-blue-500 ml-2">Edit</a>
                    <form action="{{ route('ships.destroy', $ship) }}" method="POST" class="inline">
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