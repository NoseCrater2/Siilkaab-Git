<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'adults',
        'children_age',
        'adults_age',
        'adults_regimen',
        'checkin_time',
        'checkout_time',
        'cancelation_text',
        'manager_name',
        'legal_rep',
        'hotel_id'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
   
}
