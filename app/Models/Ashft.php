<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ashft extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id', 'idt', 'st', 'ht', 'ft', 'idt1', 'st1', 'ht1', 'ft1', 'activity_id'
    ];

    // Relasi ke Activity
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    // Activity.php

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
