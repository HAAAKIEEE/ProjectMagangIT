<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'gar',
        'type',
        'mv',
        'bg',
        'sp',
        'fv',
        'fd',
        'bf',
        'rc',
        'ss',
        'arrival_date',
        'departure_date',
        'Bl1',
        'Bl2',
        'Bl3',
        'Bl4',
        'Bl5',
        'pr1',
        'pr2',
        'pr3',
        'pr4',
        'pr5',
        'pr6',
        'pr7',
        'ttl',
        'ssn',
        'inc',
        'dt',
        'company_id',
        'tg',
        'sv',
        'activity_id'
    ];

    // Accessor to calculate duration
    public function getDurationAttribute()
    {
        $arrivalDate = Carbon::parse($this->arrival_date);
        $departureDate = Carbon::parse($this->departure_date);
        return $departureDate->diffInDays($arrivalDate);
    }

    // Relation with DomesticCompany or InternationalCompany based on type
    public function company()
    {
        if ($this->type === 'domestik') {
            return $this->belongsTo(DomesticCompany::class, 'company_id');
        } else {
            return $this->belongsTo(InternationalCompany::class, 'company_id');
        }
    }

    // Relationship with Activity
    public function activity()
    {
        return $this->belongsTo(Activity::class);
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
        return $this->hasMany(Ashft::class);
    }
    public function tems()
    {
        return $this->hasMany(Ashft::class);
    }
}
