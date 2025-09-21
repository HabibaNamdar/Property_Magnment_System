
@extends('layouts.master')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/property-list.css') }}">
@endpush

@section('title', 'My Properties')

@section('content')
    <h2>My Properties</h2>
    <a href="{{ route('landlord.properties.create') }}" class="add-button">Add Property</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Rent (Rs)</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $p)
                <tr>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->rent_amount }}</td>
                    <td>{{ ucfirst($p->type) }}</td>
                    <td>{{ ucfirst($p->status) }}</td>
                    <td>
                        <a href="{{ route('landlord.properties.edit', $p->id) }}" class="edit-link">Edit</a>
                        <form action="{{ route('landlord.properties.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this property?');" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}
@endsection