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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/product', 'Api\ProductApiController@index');
Route::post('/product', 'Api\ProductApiController@store');
Route::put('/product/{product}', 'Api\ProductApiController@update');
Route::delete('/product/{product}', 'Api\ProductApiController@destroy');

Route::get('/store', 'Api\StoreApiController@index');
Route::post('/store', 'Api\StoreApiController@store');
Route::put('/store/{store}', 'Api\StoreApiController@update');
Route::delete('/store/{store}', 'Api\StoreApiController@destroy');

Route::get('/all-user', 'Api\UserApiController@getAll');
Route::get('/user', 'Api\UserApiController@index');
Route::post('/user', 'Api\UserApiController@user');
Route::put('/user/{user}', 'Api\UserApiController@update');
Route::delete('/user/{user}', 'Api\UserApiController@destroy');
