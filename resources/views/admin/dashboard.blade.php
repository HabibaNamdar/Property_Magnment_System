@extends('layouts.master')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }} (Admin)</p>
@endsection
