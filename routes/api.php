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






Route::apiResource('hotels','Api\HotelController')->only('index','show','store','update','destroy');

Route::apiResource('amenities','Api\AmenityController')->only('index','show','store','update','destroy');
Route::apiResource('conditions','Api\ConditionController')->only('index','show','store','update','destroy');
Route::apiResource('configurations','Api\ConfigurationController')->only('index','show','store','update','destroy');
Route::apiResource('countries','Api\CountryController')->only('index','show');
Route::apiResource('contacts','Api\ContactController')->only('index','show','store','update','destroy');
Route::apiResource('currencies','Api\CurrencyController')->only('index','show');
Route::apiResource('pools','Api\PoolController')->only('index','show','store','update','destroy');
Route::apiResource('regimes','Api\RegimeController')->only('index','show','store','update','destroy');
Route::apiResource('restaurants','Api\RestaurantController')->only('index','show','store','update','destroy');
Route::apiResource('schedules','Api\ScheduleController')->only('index','show','store','update','destroy');
Route::apiResource('securities','Api\SecurityController')->only('index','show','store','update','destroy');
Route::apiResource('users','Api\UserController')->only('index','show','store','update','destroy');
Route::apiResource('hotels_users/{user}','Api\HotelUserController')->only('index','store');
Route::apiResource('hotels_users/{user}/hotels','Api\HotelUserController')->only('destroy');
Route::get('timezones','Api\HotelController@getTimeZones');

Route::apiResource('binnacles','BinnacleController')->only('index','show','destroy');


Route::post('convert_currency','Api\HotelController@convert_currency');