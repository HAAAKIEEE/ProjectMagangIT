<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
