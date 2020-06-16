<?php

namespace App\Observers;

use App\User;
use App\Binnacle;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $logged_user = auth('api')->user();
        $logged_username = isset($logged_user->name)?$logged_user->name.' '.$$logged_user->last_name:null;
        $binnacle = new Binnacle;
        $binnacle->user =  $logged_username;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'User';
        $binnacle->details = 'User '.$logged_username.' has created to '.$user->name.' '.$user->last_name;
        $binnacle->save();
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $logged_user = auth('api')->user();
        $logged_username = isset($logged_user->name)?$logged_user->name.' '.$$logged_user->last_name:null;
        $binnacle = new Binnacle;
        $binnacle->user =  $logged_username;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'User';
        $binnacle->details = 'User '.$logged_username.' has updated to' .$user->name.' '.$user->last_name;
        $binnacle->save();
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $logged_user = auth('api')->user();
        $logged_username = isset($logged_user->name)?$logged_user->name.' '.$$logged_user->last_name:null;
        $binnacle = new Binnacle;
        $binnacle->user =  $logged_username;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'User';
        $binnacle->details = 'User '.$logged_username.' has deleted to' .$user->name.' '.$user->last_name;
        $binnacle->save();
    }

    

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        $logged_user = auth('api')->user();
        $logged_username = isset($logged_user->name)?$logged_user->name.' '.$$logged_user->last_name:null;
        $binnacle = new Binnacle;
        $binnacle->user =  $logged_username;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'User';
        $binnacle->details = 'User '.$logged_username.' has force deleted to' .$user->name.' '.$user->last_name;
        $binnacle->save();
    }
}
