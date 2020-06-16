<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantIndexResource;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RestaurantIndexResource::collection(
            Restaurant::all()
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
            'name' => 'required',
            'menu_type' => 'required|in:a la carte,buffet,both',
            'hotel_id' => 'required|exists:hotels,id'
        ]);
                
         
        $data = $request->all();
        $restaurant = Restaurant::create($data);
        
        return new RestaurantIndexResource(Restaurant::findOrFail($restaurant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantIndexResource(Restaurant::findOrFail($restaurant->id));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            'name' => 'string',
            'menu_type' => 'in:a la carte,buffet,both',
            'hotel_id' => 'exists:hotels,id'
        ]);
                
        $data = $request->all();
        $restaurant->update($data);
        return new RestaurantIndexResource(Restaurant::findOrFail($restaurant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
    }
}
