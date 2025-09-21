<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ import this

class Property extends Model
{
    use HasFactory; // ✅ now it will work

    protected $fillable = [
        'landlord_id',
        'title',
        'description',
        'type',
        'address',
        'city',
        'rent_amount',
        'status',
    ];

    // Relationship: property belongs to a landlord (user)
    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }


    // Relationship: property has many leases
    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
}
