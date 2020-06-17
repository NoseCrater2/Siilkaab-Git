<?php

namespace App\Observers;

use App\HotelUser;
use App\Binnacle;

class HotelUserObserver
{
    /**
     * Handle the hotel user "created" event.
     *
     * @param  \App\HotelUser  $hotelUser
     * @return void
     */
    public function created(HotelUser $hotelUser)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Assign Hotel';
        $binnacle->details = "Hotel ".$hotelUser->hotel->title." has assigned to ".$hotelUser->user->name;
        $binnacle->save();
    }

    /**
     * Handle the hotel user "updated" event.
     *
     * @param  \App\HotelUser  $hotelUser
     * @return void
     */
    public function updated(HotelUser $hotelUser)
    {
        //
    }

    /**
     * Handle the hotel user "deleted" event.
     *
     * @param  \App\HotelUser  $hotelUser
     * @return void
     */
    public function deleted(HotelUser $hotelUser)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Revoke Hotel';
        $binnacle->details = "Hotel ".$hotelUser->hotel->title." has revoked to ".$hotelUser->user->name;
        $binnacle->save();
    }

    /**
     * Handle the hotel user "restored" event.
     *
     * @param  \App\HotelUser  $hotelUser
     * @return void
     */
    public function restored(HotelUser $hotelUser)
    {
        //
    }

    /**
     * Handle the hotel user "force deleted" event.
     *
     * @param  \App\HotelUser  $hotelUser
     * @return void
     */
    public function forceDeleted(HotelUser $hotelUser)
    {
        //
    }
}
