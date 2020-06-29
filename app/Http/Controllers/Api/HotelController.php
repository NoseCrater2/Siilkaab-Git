<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelIndexResource;
use App\Http\Resources\TimezoneResource;
use App\Http\Resources\HotelShowResource;
use DateTimeZone;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

use function GuzzleHttp\json_decode;

class HotelController extends Controller
{
    public function index()
    {
        return HotelIndexResource::collection(
            Hotel::all()
        );
    }

    public function show(Hotel $hotel)
    {
        return new HotelShowResource(Hotel::findOrFail($hotel->id));
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
            'title'=>'required|unique:hotels',
            'url'=>'required|url',
            'reference_code'=>'required',
            'image'=>'image',
            'short_text' => 'required',
            'large_text' => 'string'
        ]);
                
        $image = null;
        if($request->hasFile('image')){
            $image= $request->image->store('');
            $request['image']=$image;
        }    
            
        $data = $request->all();
        $hotel = Hotel::create($data);
        
        return new HotelShowResource(Hotel::findOrFail($hotel->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'title'=>'unique:hotels,id,'.'$hotel->id',
            'url'=>'url',
            'image'=>'image',
        ]);
        
        if($request->has('title'))
        $hotel->title = $request['title'];
        if($request->has('url'))
        $hotel->url = $request['url'];
        if($request->has('reference_code'))
        $hotel->reference_code = $request['reference_code'];
        if($request->has('short_text'))
        $hotel->short_text = $request['short_text'];
        if($request->has('large_text'))
        $hotel->large_text = $request['large_text'];
        if($request->hasFile('image')){
            Storage::delete($hotel->image);
            $hotel->image = $request->image->store('');
        }

        $hotel->save();
        return new HotelShowResource(Hotel::findOrFail($hotel->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete(); 
        //return new HotelShowResource(Hotel::findOrFail($hotel));

    }


    public function convert_currency(Request $request)
    {
        
        $data = $request->validate([
            'origin'=>'required|in:EUR,USD,MXN',
            'destiny'=>'required|in:EUR,USD,MXN',
            'amount'=>'required|numeric|min:0',
        ]);

        $origen = $request['origin'];
        $destino = $request['destiny'];
        $cantidad = $request['amount'];

        $client = new Client([
            'base_uri' => 'https://api.exchangeratesapi.io/',
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET',"latest?base=$origen&symbols=$destino");
        //$rate = $response->rates

        $res = json_decode( $response->getBody()->getContents() );


        $done = $res->rates;

        return $done;

    }

    public function getTimeZones()
    {
      
        return DateTimeZone::listIdentifiers(DateTimeZone::AMERICA); 
       
    }

    


}
