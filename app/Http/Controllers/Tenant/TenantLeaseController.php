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

    public function getCard()
    {
        // Fetch ALL properties (regardless of user)
        $properties = Property::latest()->paginate(10);

        return view('tenant.dashboard', compact('properties'));
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
}
