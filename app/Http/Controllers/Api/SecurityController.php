<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Security;
use App\Http\Resources\SecurityIndexResource;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SecurityIndexResource::collection(
            Security::all()
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

            'alltime_security' => 'boolean',
            'security_alarm' => 'boolean',
            'smoke_alarm' => 'boolean',
            'cctv_indoor' => 'boolean',
            'cctv_outoor' => 'boolean',
            'fire_extinguishers' => 'boolean',
            'safe'  => 'in:free,paid,flag',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $data = $request->all();
        $security = Security::create($data);
        
        return new SecurityIndexResource(Security::findOrFail($security->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Security $security)
    {
        return new SecurityIndexResource(Security::findOrFail($security->id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Security $security)
    {
        $data = $request->validate([
            'alltime_security' => 'boolean',
            'security_alarm' => 'boolean',
            'smoke_alarm' => 'boolean',
            'cctv_indoor' => 'boolean',
            'cctv_outoor' => 'boolean',
            'fire_extinguishers' => 'boolean',
            'safe'  => 'in:free,paid,flag',
            'hotel_id' => 'exists:hotels,id',
        ]);
                
        $data = $request->all();
        $security->update($data);
        return new SecurityIndexResource(Security::findOrFail($security->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy(Security $security)
    {
        $security->delete();
        
    }
}
