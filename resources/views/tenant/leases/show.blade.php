@extends('layouts.master')

@section('title', 'Lease Details')

@section('content')
<div class="container mt-4">
    <h2>Lease Details</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $lease->property->title }}</h5>
            <p><strong>Address:</strong> {{ $lease->property->address }}</p>
            <p><strong>Type:</strong> {{ ucfirst($lease->property->type) }}</p>
            <p><strong>Rent:</strong> Rs {{ number_format($lease->rent_amount, 2) }}</p>
            <p><strong>Start Date:</strong> {{ $lease->start_date }}</p>
            <p><strong>End Date:</strong> {{ $lease->end_date ?? '-' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($lease->status) }}</p>
        </div>
    </div>

    <a href="{{ route('tenant.leases.index') }}" class="btn btn-secondary mt-3">Back to My Leases</a>
</div>
@endsection
