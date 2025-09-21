@extends('layouts.master')

@section('title', 'New Maintenance Request')

@section('content')
<div class="container mt-4">
    <h2>Submit Maintenance Request</h2>

    <form action="{{ route('tenant.maintenance.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Request Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lease_id" class="form-label">Select Property</label>
            <select name="lease_id" id="lease_id" class="form-control" required>
                <option value="">-- Choose Property --</option>
                @foreach($leases as $lease)
                    <option value="{{ $lease->id }}">
                        {{ $lease->property->title }} (Lease #{{ $lease->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Issue Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>
@endsection
