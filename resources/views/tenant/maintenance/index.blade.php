@extends('layouts.master')

@section('title', 'My Maintenance Requests')

@section('content')
<h2>My Maintenance Requests</h2>

<a href="{{ route('tenant.maintenance.create') }}" class="btn btn-primary mb-3">Create Request</a>

@if($requests->isEmpty())
    <p>No maintenance requests yet.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Property</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $req)
            <tr>
                <td>{{ $req->title }}</td>
                <td>{{ $req->property->title ?? 'N/A' }}</td>
                <td>{{ $req->description }}</td>
                <td>{{ ucfirst($req->status ?? 'Pending') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
