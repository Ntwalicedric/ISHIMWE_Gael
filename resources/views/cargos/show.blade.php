@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cargo Details</h1>
    <div class="bg-white p-4 rounded shadow">
        <p><strong>Name:</strong> {{ $cargo->name }}</p>
        <p><strong>Description:</strong> {{ $cargo->description }}</p>
        <p><strong>Weight:</strong> {{ $cargo->weight }}</p>
        <p><strong>Ship:</strong> {{ $cargo->ship->name ?? 'N/A' }}</p>
        <p><strong>Created At:</strong> {{ $cargo->created_at }}</p>
    </div>
    <a href="{{ route('cargos.index') }}" class="text-blue-500 mt-4 inline-block">Back to Cargos</a>
</div>
@endsection 