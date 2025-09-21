<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    protected $fillable = ['tenant_id','property_id','title','description','status'];

    public function tenant() {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }

    public function lease()
{
    return $this->belongsTo(Lease::class);
}

}

