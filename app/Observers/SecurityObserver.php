<?php

namespace App\Observers;

use App\Security;
use App\Binnacle;

class SecurityObserver
{
    /**
     * Handle the security "created" event.
     *
     * @param  \App\Security  $security
     * @return void
     */
    public function created(Security $security)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Security';
        $binnacle->details = 'Security from Hotel with id '.$security->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the security "updated" event.
     *
     * @param  \App\Security  $security
     * @return void
     */
    public function updated(Security $security)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Security';
        $binnacle->details = 'Security from Hotel with id '.$security->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the security "deleted" event.
     *
     * @param  \App\Security  $security
     * @return void
     */
    public function deleted(Security $security)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Security';
        $binnacle->details = 'Security from Hotel with id '.$security->hotel->id;
        $binnacle->save();
    }

    

    /**
     * Handle the security "force deleted" event.
     *
     * @param  \App\Security  $security
     * @return void
     */
    public function forceDeleted(Security $security)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Security';
        $binnacle->details = 'Security from Hotel with id '.$security->hotel->id;
        $binnacle->save();
    }
}
