@extends('layouts.master')

@section('title', 'Create Maintenance Request')

@section('content')
<h2>Create Maintenance Request</h2>

<form action="{{ route('tenant.maintenance.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="property_id" class="form-label">Property</label>
        <select name="property_id" class="form-control" required>
            @foreach($properties as $property)
                <option value="{{ $property->id }}">{{ $property->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
