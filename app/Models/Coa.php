<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coa extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'tm2',
        'im2',
        'ash1',
        'ash3',
        'vm2',
        'fc2',
        'ts3',
        'ts2',
        'adb',
        'arb',
        'daf',
        'activity_id',
        'shipment_id' 
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

}
