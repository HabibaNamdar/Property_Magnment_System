@extends('layouts.master')

@section('title', 'Edit Property')

@section('content')
    <h2>Edit Property</h2>

    <form action="{{ route('landlord.properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input name="title" placeholder="Title" value="{{ old('title', $property->title) }}" required>
        
        <textarea name="description" placeholder="Description">{{ old('description', $property->description) }}</textarea>
        
        <select name="type" required>
            <option value="apartment" {{ old('type', $property->type) == 'apartment' ? 'selected' : '' }}>Apartment</option>
            <option value="house" {{ old('type', $property->type) == 'house' ? 'selected' : '' }}>House</option>
            <option value="office" {{ old('type', $property->type) == 'office' ? 'selected' : '' }}>Office</option>
        </select>

        <input name="address" placeholder="Address" value="{{ old('address', $property->address) }}" required>
        <input name="city" placeholder="City" value="{{ old('city', $property->city) }}">
        <input name="rent_amount" placeholder="Rent" value="{{ old('rent_amount', $property->rent_amount) }}" required>

        <select name="status" required>
            <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Available</option>
            <option value="occupied" {{ old('status', $property->status) == 'occupied' ? 'selected' : '' }}>Occupied</option>
            <option value="maintenance" {{ old('status', $property->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
