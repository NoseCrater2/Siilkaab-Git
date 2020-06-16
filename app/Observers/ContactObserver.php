<?php

namespace App\Observers;

use App\Contact;
use App\Binnacle;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function created(Contact $contact)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'CREATED';
        $binnacle->model = 'Contact';
        $binnacle->details = 'Contact from Hotel with id '.$contact->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the contact "updated" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function updated(Contact $contact)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'UPDATED';
        $binnacle->model = 'Contact';
        $binnacle->details = 'Contact from Hotel with id '.$contact->hotel->id;
        $binnacle->save();
    }

    /**
     * Handle the contact "deleted" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function deleted(Contact $contact)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'DELETED';
        $binnacle->model = 'Contact';
        $binnacle->details = 'Contact from Hotel with id '.$contact->hotel->id;
        $binnacle->save();
    }

   

    /**
     * Handle the contact "force deleted" event.
     *
     * @param  \App\Contact  $contact
     * @return void
     */
    public function forceDeleted(Contact $contact)
    {
        $user = auth('api')->user();
        $binnacle = new Binnacle;
        $binnacle->user =  isset($user->name)?$user->name.' '.$user->last_name:null;
        $binnacle->action = 'force deleted';
        $binnacle->model = 'Contact';
        $binnacle->details = 'Contact from Hotel with id '.$contact->hotel->id;
        $binnacle->save();
    }
}
