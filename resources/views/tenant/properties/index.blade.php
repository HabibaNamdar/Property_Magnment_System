{{-- @extends('layouts.master')

@section('title', 'My Properties')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">My Properties</h2>

    <div class="row">
        @forelse($properties as $property)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text"><strong>Type:</strong> {{ ucfirst($property->type) }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $property->address }}</p>
                    <p class="card-text"><strong>Rent:</strong> Rs {{ number_format($property->rent_amount,2) }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ ucfirst($property->status) }}</p>

                    <!-- Optional: View Details button -->
                    <a href="{{ route('tenant.properties.show', $property->id) }}" class="btn btn-info btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <p>No properties found.</p>
        @endforelse
    </div>
</div>
@endsection --}}



@extends('layouts.master')

@section('title', 'My Properties')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">My Properties</h2>

        <div class="row">
            @forelse($properties as $property)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <p class="card-text"><strong>Type:</strong> {{ ucfirst($property->type) }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $property->address }}</p>
                            <p class="card-text"><strong>Rent:</strong> Rs {{ number_format($property->rent_amount, 2) }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ ucfirst($property->status) }}</p>

                            <!-- Buttons side by side -->
                            <div class="d-flex gap-2">
                                <a href="{{ route('tenant.properties.show', $property->id) }}" class="btn btn-info w-50">
                                    View Details
                                </a>

                                @if (in_array($property->id, $leases))
                                    <form action="{{ route('tenant.leases.destroy', $property->id) }}" method="POST"
                                        style="padding:0" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @else
                                    <form action="{{ route('tenant.leases.store') }}" method="POST"
                                        style="padding:0">
                                        @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        <button type="submit" class="btn btn-success w-100">Buy</button>
                                    </form>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <p>No properties found.</p>
            @endforelse
        </div>
    </div>
@endsection
