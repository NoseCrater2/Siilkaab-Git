<?php

namespace App\Http\Controllers\Api;

use App\Condition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ConditionIndexResource;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ConditionIndexResource::collection(
            Condition::all()
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
            'adults' => 'required|boolean',
            'children_age' => 'required_if:adults,0|Integer|min:0',
            'adults_age' => 'Integer|min:0',
            'adults_regimen' => 'required_if:adults,0|Integer|min:0',
            'checkin_time' => 'required|date_format:H:i',
            'checkout_time' => 'required|date_format:H:i|after:checkin_time',
            'cancelation_text' => 'required',
            'hotel_id' => 'required|exists:hotels,id',
        ]);
                
         
        $data = $request->all();
        $condition = Condition::create($data);
        
        return new ConditionIndexResource(Condition::findOrFail($condition->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        return new ConditionIndexResource(Condition::findOrFail($condition));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condition $condition)
    {

        $data = $request->validate([
            'adults' => 'boolean',
            'children_age' => 'required_if:adults,0|Integer|min:0',
            'adults_age' => 'Integer|min:0',
            'adults_regimen' => 'required_if:adults,0|Integer|min:0',
            'checkin_time' => 'date_format:H:i',
            'checkout_time' => 'date_format:H:i|after:checkin_time',
            'hotel_id' => 'exists:hotels,id',
        ]);
                
        $data = $request->all();
        $condition->update($data);
        return new ConditionIndexResource(Condition::findOrFail($condition->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        //
    }
}
