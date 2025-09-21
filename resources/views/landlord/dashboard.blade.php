@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold">My Properties</h2>

    <div class="row">
        @forelse($properties as $property)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 rounded-3 hover-card" style="transition: transform 0.3s;">
                <div class="card-header bg-primary text-white text-center fw-bold">
                    {{ $property->title }}
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Type:</strong> <span class="badge bg-info text-dark">{{ ucfirst($property->type) }}</span></p>
                    <p class="card-text"><strong>Address:</strong> <i class="fas fa-map-marker-alt"></i> {{ $property->address }}</p>
                    <p class="card-text"><strong>Rent:</strong> <span class="text-success fw-bold">Rs {{ number_format($property->rent,2) }}</span></p>
                    <p class="card-text"><strong>Status:</strong> 
                        @if($property->status === 'available')
                            <span class="badge bg-success">Available</span>
                        @else
                            <span class="badge bg-danger">Occupied</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('landlord.properties.edit', $property->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('landlord.properties.destroy', $property->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted fw-bold mt-4">No properties added yet.</p>
        </div>
        @endforelse
    </div>
</div>

<style>
    /* Card hover effect */
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    /* Smooth transition for badges */
    .badge {
        font-size: 0.9rem;
        padding: 0.4em 0.6em;
    }

    /* Card footer buttons spacing */
    .card-footer button, .card-footer a {
        flex: 1;
        margin: 0 2px;
    }

    .card-footer {
        background-color: #f8f9fa;
    }

</style>
@endsection
