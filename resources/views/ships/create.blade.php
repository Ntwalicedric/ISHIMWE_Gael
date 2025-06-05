@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create Ship</h1>
    <form action="{{ route('ships.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name:</label>
            <input type="text" name="name" id="name" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="type" class="block">Type:</label>
            <input type="text" name="type" id="type" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="capacity" class="block">Capacity:</label>
            <input type="number" name="capacity" id="capacity" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create</button>
    </form>
</div>
@endsection 