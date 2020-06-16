<?php

namespace App\Observers;

use App\Binnacle;
use App\Configuration;

class ConfigurationObserver
{
    /**
     * Handle the configuration "created" event.
     *
     * @param  \App\Configuration  $configuration
     * @return void
     */
    public function created(Configuration $configuration)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Configuration';
        $binnacle->details = 'Configuration from Hotel with id '.$configuration->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the configuration "updated" event.
     *
     * @param  \App\Configuration  $configuration
     * @return void
     */
    public function updated(Configuration $configuration)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Configuration';
        $binnacle->details = 'Configuration from Hotel with id '.$configuration->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the configuration "deleted" event.
     *
     * @param  \App\Configuration  $configuration
     * @return void
     */
    public function deleted(Configuration $configuration)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Configuration';
        $binnacle->details = 'Configuration from Hotel with id '.$configuration->hotel->id;
        $binnacle->save();
    }

    

    /**
     * Handle the configuration "force deleted" event.
     *
     * @param  \App\Configuration  $configuration
     * @return void
     */
    public function forceDeleted(Configuration $configuration)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Configuration';
        $binnacle->details = 'Configuration from Hotel with id '.$configuration->hotel->id;
        $binnacle->save();
    }
}
