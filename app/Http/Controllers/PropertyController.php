<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Show landlord properties
    public function index()
    {
        $user = auth()->user();

      $properties = $user->role === 'admin'
    ? Property::latest()->paginate(10)
    : $user->properties()->latest()->paginate(10);


        return view('landlord.properties.index', compact('properties'));
    }
    public function getCard()
    {
        $user = auth()->user();

      $properties = $user->role === 'admin'
    ? Property::latest()->paginate(10)
    : $user->properties()->latest()->paginate(10);


        return view('landlord.dashboard', compact('properties'));
    }
    // Show form
    public function create()
    {
        return view('landlord.properties.create');
    }

    // Save new property
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'type'=>'required|in:apartment,house,office',
            'address'=>'required|string',
            'city'=>'nullable|string',
            'rent_amount'=>'required|numeric|min:0',
            'status'=>'required|in:available,occupied,maintenance',
        ]);

        $data['landlord_id'] = auth()->id();

        Property::create($data);

        return redirect()->route('landlord.properties.index')->with('success','Property created.');
    }

    // Edit form
    public function edit(Property $property)
    {
        return view('landlord.properties.edit', compact('property'));
    }

    // Update property
    public function update(Request $request, Property $property)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'type'=>'required|in:apartment,house,office',
            'address'=>'required|string',
            'city'=>'nullable|string',
            'rent_amount'=>'required|numeric|min:0',
            'status'=>'required|in:available,occupied,maintenance',
        ]);

        $property->update($data);

        return redirect()->route('landlord.properties.index')->with('success','Property updated.');
    }

    // Delete property
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('landlord.properties.index')->with('success','Property deleted.');
    }
}


