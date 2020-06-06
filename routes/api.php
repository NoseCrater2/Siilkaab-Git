<?php

use App\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'AuthController@login');

Route::middleware('auth:api')->post('/logout', 'AuthController@logout');




Route::apiResource('bookables','Api\BookableController')->only(['index','show']);