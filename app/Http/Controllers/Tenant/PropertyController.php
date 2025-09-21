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
        $properties = Property::latest()->paginate(10);

        return view('tenant.properties.index', compact('properties'));
    }

    
}
