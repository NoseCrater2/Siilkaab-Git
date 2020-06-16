<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    protected $fillable= [
        'user',
        'action',
        'model',
        'details',
    ];
}
