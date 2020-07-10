<?php

namespace App\Observers;

use App\RoomAmenity;

class RoomAmenityObserver
{
    /**
     * Handle the room amenity "created" event.
     *
     * @param  \App\RoomAmenity  $roomAmenity
     * @return void
     */
    public function created(RoomAmenity $roomAmenity)
    {
        $user = auth('api')->user();
        $binnacle = new RoomAmenity;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Amenity of Room';
        $binnacle->details = 'Amenity from Room with id '.$roomAmenity->room->id;
        $binnacle->save();
    }

    /**
     * Handle the room amenity "updated" event.
     *
     * @param  \App\RoomAmenity  $roomAmenity
     * @return void
     */
    public function updated(RoomAmenity $roomAmenity)
    {
        $user = auth('api')->user();
        $binnacle = new RoomAmenity;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Amenity of Room';
        $binnacle->details = 'Amenity from Room with id '.$roomAmenity->room->id;
        $binnacle->save();
    }

    /**
     * Handle the room amenity "deleted" event.
     *
     * @param  \App\RoomAmenity  $roomAmenity
     * @return void
     */
    public function deleted(RoomAmenity $roomAmenity)
    {
        $user = auth('api')->user();
        $binnacle = new RoomAmenity;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Amenity of Room';
        $binnacle->details = 'Amenity from Room with id '.$roomAmenity->room->id;
        $binnacle->save();
    }

    /**
     * Handle the room amenity "restored" event.
     *
     * @param  \App\RoomAmenity  $roomAmenity
     * @return void
     */
    public function restored(RoomAmenity $roomAmenity)
    {
        //
    }

    /**
     * Handle the room amenity "force deleted" event.
     *
     * @param  \App\RoomAmenity  $roomAmenity
     * @return void
     */
    public function forceDeleted(RoomAmenity $roomAmenity)
    {
        $user = auth('api')->user();
        $binnacle = new RoomAmenity;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Amenity of Room';
        $binnacle->details = 'Amenity from Room with id '.$roomAmenity->room->id;
        $binnacle->save();
    }
}
