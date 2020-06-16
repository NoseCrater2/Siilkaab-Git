<?php

namespace App\Observers;

use App\Pool;
use App\Binnacle;

class PoolObserver
{
    /**
     * Handle the pool "created" event.
     *
     * @param  \App\Pool  $pool
     * @return void
     */
    public function created(Pool $pool)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Pool';
        $binnacle->details = 'Pool from Hotel with id '.$pool->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the pool "updated" event.
     *
     * @param  \App\Pool  $pool
     * @return void
     */
    public function updated(Pool $pool)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Pool';
        $binnacle->details = 'Pool from Hotel with id '.$pool->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the pool "deleted" event.
     *
     * @param  \App\Pool  $pool
     * @return void
     */
    public function deleted(Pool $pool)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Pool';
        $binnacle->details = 'Pool from Hotel with id '.$pool->hotel->id;
        $binnacle->save();
    }

    

    /**
     * Handle the pool "force deleted" event.
     *
     * @param  \App\Pool  $pool
     * @return void
     */
    public function forceDeleted(Pool $pool)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Pool';
        $binnacle->details = 'Pool from Hotel with id '.$pool->hotel->id;
        $binnacle->save();
    }
}
