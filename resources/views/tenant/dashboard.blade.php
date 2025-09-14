@extends('layouts.master')

@section('content')
    <h1>Tenant Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }} (Tenant)</p>
@endsection
