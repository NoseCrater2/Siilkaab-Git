<?php

namespace App\Observers;

use App\Regime;
use App\Binnacle;

class RegimeObserver
{
    /**
     * Handle the regime "created" event.
     *
     * @param  \App\Regime  $regime
     * @return void
     */
    public function created(Regime $regime)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Regime';
        $binnacle->details = 'Regime from Hotel with id '.$regime->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the regime "updated" event.
     *
     * @param  \App\Regime  $regime
     * @return void
     */
    public function updated(Regime $regime)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Regime';
        $binnacle->details = 'Regime from Hotel with id '.$regime->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the regime "deleted" event.
     *
     * @param  \App\Regime  $regime
     * @return void
     */
    public function deleted(Regime $regime)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Regime';
        $binnacle->details = 'Regime from Hotel with id '.$regime->hotel->id;
        $binnacle->save();
    }

    

    /**
     * Handle the regime "force deleted" event.
     *
     * @param  \App\Regime  $regime
     * @return void
     */
    public function forceDeleted(Regime $regime)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Regime';
        $binnacle->details = 'Regime from Hotel with id '.$regime->hotel->id;
        $binnacle->save();
    }
}
