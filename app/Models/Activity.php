<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Menambahkan 'name' ke dalam fillable
        'activity_date',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function roas()
    {
        return $this->hasMany(ROA::class);
    }

    public function coas()
    {
        return $this->hasMany(Coa::class);
    }

    public function ashanls()
    {
        return $this->hasMany(Ashanls::class);
    }

    public function ashfts()
    {
        return $this->hasMany(Ashft::class); // atau relasi yang sesuai
    }
    public function tems()
    {
        return $this->hasMany(Tem::class); // atau relasi yang sesuai
    }
    public function afcships()
    {
        return $this->hasMany(Afcship::class); // atau relasi yang sesuai
    }
    public function uas()
    {
        return $this->hasMany(Ua::class); // atau relasi yang sesuai
    }
}
