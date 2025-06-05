@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ship Details</h1>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Name:</strong> {{ $ship->name }}</p>
        <p><strong>Type:</strong> {{ $ship->type }}</p>
        <p><strong>Capacity:</strong> {{ $ship->capacity }}</p>
        <p><strong>Created At:</strong> {{ $ship->created_at }}</p>
    </div>
    <a href="{{ route('ships.index') }}" class="text-blue-500 mt-4 inline-block">Back to Ships</a>
</div>
@endsection 