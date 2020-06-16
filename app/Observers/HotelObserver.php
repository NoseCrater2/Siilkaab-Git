<?php

namespace App\Observers;

use App\Hotel;
use App\Binnacle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class HotelObserver
{

    /**
     * Handle the hotel "created" event.
     *
     * @param  \App\Hotel  $hotel
     * @return void
     */
    public function created(Hotel $hotel)
    {
    
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Hotel';
        $binnacle->details = $hotel->title;
        $binnacle->save();
    }

    /**
     * Handle the hotel "updated" event.
     *
     * @param  \App\Hotel  $hotel
     * @return void
     */
    public function updated(Hotel $hotel)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Hotel';
        $binnacle->details = $hotel->title;
        $binnacle->save();
    }

    /**
     * Handle the hotel "deleted" event.
     *
     * @param  \App\Hotel  $hotel
     * @return void
     */
    public function deleted(Hotel $hotel)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Hotel';
        $binnacle->details = $hotel->title;
        $binnacle->save();
    }

    /**
     * Handle the hotel "restored" event.
     *
     * @param  \App\Hotel  $hotel
     * @return void
     */
    public function restored(Hotel $hotel)
    {
        //
    }

    /**
     * Handle the hotel "force deleted" event.
     *
     * @param  \App\Hotel  $hotel
     * @return void
     */
    public function forceDeleted(Hotel $hotel)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force_deleted';
        $binnacle->model = 'Hotel';
        $binnacle->details = $hotel->title;
        $binnacle->save();
    }
}
