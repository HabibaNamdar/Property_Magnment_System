<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $lease = auth()->user()->leases()->with('property')->where('status','active')->first();

        if (!$lease) {
            return redirect()->route('dashboard')->with('info','No active lease assigned.');
        }

        return view('tenant.property.show', [
            'property' => $lease->property,
            'lease' => $lease,
        ]);
    }
}
