<?php

namespace App\Http\Controllers\Api;

use App\Configuration;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConfigurationIndexResource;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ConfigurationIndexResource::collection(
            Configuration::all()
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
            'notification_voucher' => 'required|email',
            'notification_details' => 'required|email',
            'notification_card' => 'required|email',
            'timezone' => 'required|timezone',
            'currency_id' => 'required|exists:currencies,id',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
                
         
        $data = $request->all();
        $configuration = Configuration::create($data);
        
        return new ConfigurationIndexResource(Configuration::findOrFail($configuration->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(Configuration $configuration)
    {
        return new ConfigurationIndexResource(Configuration::findOrFail($configuration->id));
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration)
    {
        $data = $request->validate([
            'notification_voucher' => 'email',
            'notification_details' => 'email',
            'notification_card' => 'email',
            'timezone' => 'timezone',
            'currency_id' => 'exists:currencies,id',
            'hotel_id' => 'exists:hotels,id'
        ]);
                
        $data = $request->all();
        $configuration->update($data);
        return new ConfigurationIndexResource(Configuration::findOrFail($configuration->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration)
    {
        $configuration->delete();
    }
}
