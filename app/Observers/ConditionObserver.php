<?php

namespace App\Observers;

use App\Condition;
use App\Binnacle;

class ConditionObserver
{
    /**
     * Handle the condition "created" event.
     *
     * @param  \App\Condition  $condition
     * @return void
     */
    public function created(Condition $condition)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Conditions';
        $binnacle->details = 'Condition from Hotel with id '.$condition->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the condition "updated" event.
     *
     * @param  \App\Condition  $condition
     * @return void
     */
    public function updated(Condition $condition)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Conditions';
        $binnacle->details = 'Condition from Hotel with id '.$condition->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the condition "deleted" event.
     *
     * @param  \App\Condition  $condition
     * @return void
     */
    public function deleted(Condition $condition)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Conditions';
        $binnacle->details = 'Condition from Hotel with id '.$condition->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the condition "restored" event.
     *
     * @param  \App\Condition  $condition
     * @return void
     */
    public function restored(Condition $condition)
    {
        //
    }

    /**
     * Handle the condition "force deleted" event.
     *
     * @param  \App\Condition  $condition
     * @return void
     */
    public function forceDeleted(Condition $condition)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Conditions';
        $binnacle->details = 'Condition from Hotel with id '.$condition->hotel->id;
        $binnacle->save();
    }
}
