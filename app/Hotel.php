<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    //use HotelObserver;
    protected $fillable = [
        'title',
        'url',
        'reference_code',
        'image',
        'large_text',
        'short_text'
    ];


    public function amenity(){
        return $this->hasOne(Amenity::class);
    }
    

    public function condition(){
        return $this->hasOne(Condition::class);
    }

    public function configuration(){
        return $this->hasOne(Configuration::class);
    }

    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function pools()
    {
        return $this->hasMany(Pool::class);
    }

    public function regimes()
    {
        return $this->hasMany(Regime::class);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function security(){
        return $this->hasOne(Security::class);
    }

}
