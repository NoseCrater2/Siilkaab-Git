<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Resources\ContactIndexResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContactIndexResource::collection(
            Contact::all()
        );
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'url' => 'url|required',
            'email' => 'required|email',
            'phone' => 'required|alpha_num',
            'address' => 'required|string',
            'zipcode' => 'required|numeric',
            'city' => 'required|alpha_num',
            'state' => 'required|alpha_num',
            'manager_name' => 'required|string',
            'legal_rep' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
                
            
            
        $data = $request->all();
        $contact = Contact::create($data);
        
        return new ContactIndexResource(Contact::findOrFail($contact->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return new ContactIndexResource(Contact::findOrFail($contact->id));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'url' => 'url',
            'email' => 'email',
            'phone' => 'alpha_num',
            'address' => 'string',
            'zipcode' => 'numeric',
            'city' => 'alpha_num',
            'state' => 'alpha_num',
            'manager_name' => 'string',
            'legal_rep' => 'string',
            'country_id' => 'exists:countries,id',
            'hotel_id' => 'exists:hotels,id'
        ]);
                
        $data = $request->all();
        $contact->update($data);
        return new ContactIndexResource(Contact::findOrFail($contact->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
