<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
        // Show landlord properties
   public function index()
    {
        // ✅ Fetch all properties instead of only user’s
          $tenant = auth()->user();

        $properties = Property::latest()->paginate(10);

        // Get the property_ids of leases for this tenant
        $leases = $tenant->leases()->pluck('property_id')->toArray();

        return view('tenant.properties.index', compact('properties', 'leases'));
    }

    public function show($id)
{
    // Find property by ID (404 if not found)
    $property = Property::findOrFail($id);

    return view('tenant.properties.show', compact('property'));
}

    


}
