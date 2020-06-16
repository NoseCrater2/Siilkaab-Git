<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegimeIndexResource;
use App\Regime;
use Illuminate\Http\Request;

class RegimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RegimeIndexResource::collection(
            Regime::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'priority' => 'required|in:normal,medium,high',
            'only_room' => 'boolean',
            'start_period' => 'date_format:Y-m-d H:i',
            'final_period' => 'date_format:Y-m-d H:i|after:start_period',
            'lodging_breakfast_children' => 'numeric',
            'lodging_breakfast_adult' => 'numeric',
            'half_pension_children' => 'numeric',
            'half_pension_adult' => 'numeric',
            'full_pension_children' => 'numeric',
            'full_pension_adult' => 'numeric',
            'all_included_children' => 'numeric',
            'all_included_adult' => 'numeric',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $data = $request->all();
        $regime = Regime::create($data);
        
        return new RegimeIndexResource(Regime::findOrFail($regime->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function show(Regime $regime)
    {
        return new RegimeIndexResource(Regime::findOrFail($regime->id));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regime $regime)
    {
         $data = $request->validate([
            'priority' => 'in:normal,medium,high',
            'only_room' => 'boolean',
            'start_period' => 'date_format:Y-m-d H:i',
            'final_period' => 'date_format:Y-m-d H:i|after:start_time',
            'lodging_breakfast_children' => 'numeric',
            'lodging_breakfast_adult' => 'numeric',
            'half_pension_children' => 'numeric',
            'half_pension_adult' => 'numeric',
            'full_pension_children' => 'numeric',
            'full_pension_adult' => 'numeric',
            'all_included_children' => 'numeric',
            'all_included_adult' => 'numeric',
            'hotel_id' => 'exists:hotels,id',
        ]);
                
        $data = $request->all();
        $regime->update($data);
        return new RegimeIndexResource(Regime::findOrFail($regime->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Regime  $regime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regime $regime)
    {
        //
    }
}
