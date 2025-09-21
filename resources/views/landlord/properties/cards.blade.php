@extends('layouts.master')

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
                    <p class="card-text"><strong>Rent:</strong> Rs {{ number_format($property->rent,2) }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ ucfirst($property->status) }}</p>
                    <a href="{{ route('landlord.properties.edit', $property->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('landlord.properties.destroy', $property->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p>No properties added yet.</p>
        @endforelse
    </div>
</div>
@endsection
