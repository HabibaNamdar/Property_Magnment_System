@extends('layouts.master')

@section('content')
    <h1>Landlord Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }} (Landlord)</p>
@endsection
