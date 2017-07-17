<?php

use Illuminate\Http\Request;

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

Route::post('login', 'Auth\LoginController@apiLogin');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('amazon_item', 'Api\PcAmazonItemController@getItems');
    Route::post('amazon_item', 'Api\PcAmazonItemController@addItem');
    Route::delete('amazon_item/{id}', 'Api\PcAmazonItemController@deleteItem');
});

Route::group(['middleware' => ['auth:api', 'membership']], function () {
    Route::get('pc_request', 'Api\PcRequestController@getSummary');
    Route::get('pc_request/{id}', 'Api\PcRequestController@getDetail');
    Route::get('pc_request_item/{id}', 'Api\PcRequestController@getItemDetail');
    Route::post('pc_request', 'Api\PcRequestController@create');
});