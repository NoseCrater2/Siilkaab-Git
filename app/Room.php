<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable =[
        'name',
        'type',
        'quantity',
        'rack_rate',
        'image',
        'large_text',
        'short_text',
        'smoking_policy',
        'pool_near',
        'floor_level',
        'size',
        'size_type',
        'max_adults',
        'max_children',
        'max_occpancy',
        'adult_extra',
        'child_extra',
        'baby_extra',
        'hotel_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function bedrooms()
    {
        return $this->hasMany(Bedroom::class);
    }

    public function roomAmenity(){
        return $this->hasOne(RoomAmenity::class);
    }

}
