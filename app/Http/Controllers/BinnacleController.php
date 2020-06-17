<?php

namespace App\Http\Controllers;

use App\Binnacle;
use App\Http\Resources\BinnacleIndexResource;
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
        return BinnacleIndexResource::collection(
            Binnacle::all()
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
        return new BinnacleIndexResource(Binnacle::findOrFail($binnacle->id));
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
