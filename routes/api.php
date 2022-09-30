<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'vehicles'], function () {
    Route::get('/', 'RegisteredVehicleController@getAll')->name('vehicles');
    Route::get('/{id}', 'RegisteredVehicleController@getOne');
    Route::post('/', 'RegisteredVehicleController@create');
    Route::delete('/{id}', 'RegisteredVehicleController@delete');
});

Route::group(['prefix' => 'vehicle-types'], function () {
    Route::get('/', 'VehicleTypeController@getAll');
});

Route::group(['prefix' => 'discount-cards'], function () {
    Route::get('/', 'DiscountCardController@getAll');
});
