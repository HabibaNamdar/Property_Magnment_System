@extends('../../layouts.master')

@section('title', 'Add Property')

@section('content')
    <h2>Add Property</h2>
    <form action="{{ route('landlord.properties.store') }}" method="POST">
      @csrf
      <input name="title" placeholder="Title" required>
      <textarea name="description" placeholder="Description"></textarea>
      <select name="type">
        <option value="apartment">Apartment</option>
        <option value="house">House</option>
        <option value="office">Office</option>
      </select>
      <input name="address" placeholder="Address" required>
      <input name="city" placeholder="City">
      <input name="rent_amount" placeholder="Rent" required>
      <select name="status">
        <option value="available">Available</option>
        <option value="occupied">Occupied</option>
        <option value="maintenance">Maintenance</option>
      </select>
      <button type="submit">Save</button>
    </form>
@endsection
