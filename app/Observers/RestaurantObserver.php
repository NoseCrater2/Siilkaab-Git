<?php

namespace App\Observers;

use App\Restaurant;
use App\Binnacle;

class RestaurantObserver
{
    /**
     * Handle the restaurant "created" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Restaurant';
        $binnacle->details = 'Restaurant from Hotel with id '.$restaurant->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the restaurant "updated" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Restaurant';
        $binnacle->details = 'Restaurant from Hotel with id '.$restaurant->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the restaurant "deleted" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Restaurant';
        $binnacle->details = 'Restaurant from Hotel with id '.$restaurant->hotel->id;
        $binnacle->save();
    }

   

    /**
     * Handle the restaurant "force deleted" event.
     *
     * @param  \App\Restaurant  $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Restaurant';
        $binnacle->details = 'Restaurant from Hotel with id '.$restaurant->hotel->id;
        $binnacle->save();
    }
}
