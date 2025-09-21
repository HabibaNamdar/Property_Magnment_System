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

    public function create() {
        // Get tenant's properties
        $properties = Auth::user()->properties;
        return view('tenant.maintenance.create', compact('properties'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'property_id'=>'required|exists:properties,id'
        ]);

        $data['tenant_id'] = Auth::id();

        MaintenanceRequest::create($data);

        return redirect()->route('tenant.maintenance.index')->with('success','Request submitted.');
    }
}
