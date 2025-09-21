@extends('layouts.master')

@section('title', 'Property Details')

@section('content')
<div class="container mt-4">
    <h2>{{ $property->title }}</h2>
    <p><strong>Type:</strong> {{ ucfirst($property->type) }}</p>
    <p><strong>Address:</strong> {{ $property->address }}</p>
    <p><strong>Rent:</strong> Rs {{ number_format($property->rent_amount, 2) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($property->status) }}</p>

    <!-- Buy button -->
    {{-- <form action="{{ route('tenant.leases.store', $property->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Buy</button>
    </form> --}}

    <a href="{{ route('tenant.properties.index') }}" class="btn btn-secondary mt-2">Back</a>
</div>
@endsection
