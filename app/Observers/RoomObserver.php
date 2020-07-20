<?php

namespace App\Observers;

use App\Room;

class RoomObserver
{
    /**
     * Handle the = room "created" event.
     *
     * @param  \App\=Room  $=Room
     * @return void
     */
    public function created(Room $room)
    {
        $user = auth('api')->user();
        $binnacle = new Room;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Room';
        $binnacle->details = 'Room from Hotel with id '.$room->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the = room "updated" event.
     *
     * @param  \App\=Room  $=Room
     * @return void
     */
    public function updated(Room $room)
    {
        $user = auth('api')->user();
        $binnacle = new Room;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Room';
        $binnacle->details = 'Room from Hotel with id '.$room->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the = room "deleted" event.
     *
     * @param  \App\=Room  $=Room
     * @return void
     */
    public function deleted(Room $room)
    {
        $user = auth('api')->user();
        $binnacle = new Room;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Room';
        $binnacle->details = 'Room from Hotel with id '.$room->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the = room "restored" event.
     *
     * @param  \App\=Room  $=Room
     * @return void
     */
    public function restored(Room $room)
    {
        
    }

    /**
     * Handle the = room "force deleted" event.
     *
     * @param  \App\=Room  $=Room
     * @return void
     */
    public function forceDeleted(Room $room)
    {
        $user = auth('api')->user();
        $binnacle = new Room;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Room';
        $binnacle->details = 'Room from Hotel with id '.$room->hotel->id;
        $binnacle->save();
    }
}
