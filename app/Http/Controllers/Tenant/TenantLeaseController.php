<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lease;
use App\Models\Property;

class TenantLeaseController extends Controller
{
    // Show all leases for the logged-in tenant
    public function index()
    {
        $tenant = auth()->user();

        // Get leases for the logged-in tenant
        $leases = Lease::with('property')
            ->where('tenant_id', $tenant->id)
            ->latest()
            ->get();

        return view('tenant.leases.index', compact('leases'));
    }


    // public function getCard()
    // {
    //     // Fetch ALL properties (regardless of user)
    //     $properties = Property::latest()->paginate(10);

    //     return view('tenant.dashboard', compact(var_name: 'properties'));
    // }

    // In TenantLeaseController
    public function getCard($tenant = null)
    {
        $tenant = auth()->user();

        $properties = Property::latest()->paginate(10);

        // Get the property_ids of leases for this tenant
        $leases = $tenant->leases()->pluck('property_id')->toArray();


        return view('tenant.properties.index', compact('properties', 'leases'));
    }


    // Sho

    public function show($id)
    {
        $tenant = auth()->user();

        // Ensure tenant can only view their own lease
        $lease = Lease::with('property')
            ->where('tenant_id', $tenant->id)
            ->findOrFail($id);

        return view('tenant.leases.show', compact('lease'));
    }



    public function store(Request $request)
    {
        $tenant = auth()->user();
        $propertyId = $request->input('property_id');

        $exists = Lease::where('property_id', $propertyId)
            ->where('status', 'active')
            ->exists();

        if ($exists) {
            return redirect()->route('tenant.leases.index')
                ->with('error', 'This house is already booked.');
        }

        Lease::create([
            'tenant_id' => $tenant->id,
            'property_id' => $propertyId,
            'start_date' => now(),
            'status' => 'active',
            'rent_amount' => Property::findOrFail($propertyId)->rent_amount,
        ]);

        return redirect()->route('tenant.leases.index')
            ->with('success', 'House booked successfully!');
    }
    
    public function destroy($propertyId)
{
    $tenant = auth()->user();

    // Find the lease of this tenant for this property
    $lease = Lease::where('tenant_id', $tenant->id)
                  ->where('property_id', $propertyId)
                  ->firstOrFail();

    $lease->delete();

    return redirect()->route('tenant.properties.index')
                     ->with('success', 'Lease deleted successfully!');
}






}
