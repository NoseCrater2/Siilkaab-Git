<?php

namespace App\Http\Controllers;

use App\Binnacle;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BinnacleIndexResource;
use App\Http\Resources\BinnacleShowResource;
use Illuminate\Http\Request;

class BinnacleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  BinnacleIndexResource::collection(
            Binnacle::latest()->get()->unique('user')
        );
            
        
    }

    

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Binnacle  $binnacle
     * @return \Illuminate\Http\Response
     */
    public function show(Binnacle $binnacle)
    {        
        return  BinnacleShowResource::collection(
            Binnacle::where('user', $binnacle->user)->get()
        );
    }

  


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Binnacle  $binnacle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Binnacle $binnacle)
    {
        $binnacle->delete();
    }
}
