@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Cargo</h1>
    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block">Description:</label>
            <textarea name="description" id="description" class="border p-2 w-full"></textarea>
        </div>
        <div class="mb-4">
            <label for="weight" class="block">Weight:</label>
            <input type="number" step="0.01" name="weight" id="weight" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="ship_id" class="block">Ship:</label>
            <select name="ship_id" id="ship_id" class="border p-2 w-full" required>
                @foreach($ships as $ship)
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection 