@extends('layouts.master')

@section('content')
    <h2>{{ $property->title }}</h2>
    <p>{{ $property->address }}, {{ $property->city }}</p>
    <p>Rent: Rs {{ number_format($lease->rent_amount, 2) }}</p>
    <p>Lease: {{ $lease->start_date }} → {{ $lease->end_date }}</p>
@endsection
