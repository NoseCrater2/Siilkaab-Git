<?php

namespace App\Observers;

use App\Amenity;
use App\Binnacle;

class AmenityObserver
{
    /**
     * Handle the amenity "created" event.
     *
     * @param  \App\Amenity  $amenity
     * @return void
     */
    public function created(Amenity $amenity)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Amenity';
        $binnacle->details = 'Amenity from Hotel with id '.$amenity->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the amenity "updated" event.
     *
     * @param  \App\Amenity  $amenity
     * @return void
     */
    public function updated(Amenity $amenity)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Amenity';
        $binnacle->details = 'Amenity from Hotel with id '.$amenity->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the amenity "deleted" event.
     *
     * @param  \App\Amenity  $amenity
     * @return void
     */
    public function deleted(Amenity $amenity)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Amenity';
        $binnacle->details = 'Amenity from Hotel with id '.$amenity->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the amenity "restored" event.
     *
     * @param  \App\Amenity  $amenity
     * @return void
     */
    public function restored(Amenity $amenity)
    {
        //
    }

    /**
     * Handle the amenity "force deleted" event.
     *
     * @param  \App\Amenity  $amenity
     * @return void
     */
    public function forceDeleted(Amenity $amenity)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Amenity';
        $binnacle->details = 'Amenity from Hotel with id '.$amenity->hotel->id;
        $binnacle->save();
    }
}
