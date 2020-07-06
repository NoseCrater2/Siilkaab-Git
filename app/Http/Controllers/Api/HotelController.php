<?php

namespace App\Http\Controllers\Api;

use App\Hotel;
use DateTimeZone;
use App\Messages;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HotelShowResource;
use App\Http\Resources\HotelIndexResource;


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
        $image = null;
        $data = $request->all();
        $rules = [
            'title'=>'required|unique:hotels',
            'url'=>'required|url',
            'reference_code'=>'required',
            'image'=>'image',
            'short_text' => 'required',
            'large_text' => 'string'
        ];
        $validator= Validator::make($data,$rules, Messages::getMessages());

        
           
        if($validator->fails()){
            return $validator->errors();
        }else{
            if($request->hasFile('image')){
                $image= $request->image->store('');
                $data['image']=$image;
            } 
            $hotel = Hotel::create($data);
            return new HotelShowResource(Hotel::findOrFail($hotel->id));
        }
        
       
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
        $data = $request->all();

        $rules = [
            'title'=>'unique:hotels,id,'.'$hotel->id',
            'url'=>'url',
            'image'=>'image',
        ];
        $validator= Validator::make($data,$rules, Messages::getMessages());

        

        if($validator->fails()){
            return response($validator->errors(),422);
        }else{
            if($request->hasFile('image')){
                Storage::delete($hotel->image);
                $data['image'] = $request->image->store('');
            }
            $hotel->update($data);
            return new HotelShowResource(Hotel::findOrFail($hotel->id));
        }
       
        
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
