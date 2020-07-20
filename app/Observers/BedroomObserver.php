<?php

namespace App\Observers;

use App\Bedroom;

class BedroomObserver
{
    /**
     * Handle the bedroom "created" event.
     *
     * @param  \App\Bedroom  $bedroom
     * @return void
     */
    public function created(Bedroom $bedroom)
    {
        $user = auth('api')->user();
        $binnacle = new Bedroom;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Bedroom';
        $binnacle->details = 'Bedroom from Room with id '.$bedroom->room->id;
        $binnacle->save();
    }

    /**
     * Handle the bedroom "updated" event.
     *
     * @param  \App\Bedroom  $bedroom
     * @return void
     */
    public function updated(Bedroom $bedroom)
    {
        $user = auth('api')->user();
        $binnacle = new Bedroom;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Bedroom';
        $binnacle->details = 'Bedroom from Room with id '.$bedroom->room->id;
        $binnacle->save();
    }

    /**
     * Handle the bedroom "deleted" event.
     *
     * @param  \App\Bedroom  $bedroom
     * @return void
     */
    public function deleted(Bedroom $bedroom)
    {
        $user = auth('api')->user();
        $binnacle = new Bedroom;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Bedroom';
        $binnacle->details = 'Bedroom from Room with id '.$bedroom->room->id;
        $binnacle->save();
    }

    /**
     * Handle the bedroom "restored" event.
     *
     * @param  \App\Bedroom  $bedroom
     * @return void
     */
    public function restored(Bedroom $bedroom)
    {
        //
    }

    /**
     * Handle the bedroom "force deleted" event.
     *
     * @param  \App\Bedroom  $bedroom
     * @return void
     */
    public function forceDeleted(Bedroom $bedroom)
    {
        $user = auth('api')->user();
        $binnacle = new Bedroom;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Bedroom';
        $binnacle->details = 'Bedroom from Room with id '.$bedroom->room->id;
        $binnacle->save();
    }
}
