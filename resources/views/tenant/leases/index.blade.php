@extends('layouts.master')

@section('title', 'My Leases')

@section('content')
<div class="container mt-4">
    <h2>My Leases</h2>

    @if($leases->count())
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Rent</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leases as $lease)
                    <tr>
                        <td>{{ $lease->property->title }}</td>
                        <td>{{ $lease->start_date }}</td>
                        <td>{{ $lease->end_date ?? '-' }}</td>
                        <td>{{ number_format($lease->rent_amount, 2) }}</td>
                        <td>{{ ucfirst($lease->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No leases found.</p>
    @endif
</div>
@endsection
