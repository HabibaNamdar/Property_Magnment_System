<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaintenanceRequest; //
use Illuminate\Support\Facades\Auth; 

class MaintenanceRequestController extends Controller
{
    public function index() {
        $requests = MaintenanceRequest::with('property')
            ->where('tenant_id', Auth::id())
            ->get();

        return view('tenant.maintenance.index', compact('requests'));
    }

    // public function create() {
    //     // Get tenant's properties
    //     $properties = Auth::user()->properties;
    //     return view('tenant.maintenance.create', compact('properties'));
    // }
    // MaintenanceRequestController.php
  public function create()
  {
    // get all leases for the logged-in tenant, including property
    $leases = auth()->user()->leases()->with('property')->get();


    return view('tenant.maintenance.create', compact('leases'));
  }


public function store(Request $request) {
    $data = $request->validate([
        'title'=>'required|string|max:255',
        'description'=>'required|string',
        'lease_id'=>'required|exists:leases,id'
    ]);

    $lease = \App\Models\Lease::findOrFail($data['lease_id']);

    $data['tenant_id'] = Auth::id();
    $data['property_id'] = $lease->property_id; // get property from lease

    MaintenanceRequest::create($data);

    return redirect()->route('tenant.maintenance.index')->with('success','Request submitted.');
}

}
