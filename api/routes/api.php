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

//Authentication
Route::post('v1/auth', 'AuthenticateController@authJwt');

//Users
Route::post('v1/users', 'UserController@store');
Route::group(['prefix' => 'v1/users', 'middleware' => 'jwt.auth'], function () {
    Route::get('{id}', 'UserController@show')->where('id', '[a-z0-9\-]+');
    Route::put('{id}', 'UserController@update')->where('id', '[a-z0-9\-]+');
    Route::delete('{id}', 'UserController@delete')->where('id', '[a-z0-9\-]+');
});

//XML
Route::group(['prefix' => 'v1/xml', 'middleware' => 'jwt.auth'], function () {
    Route::post('/', 'XmlController@store');
    Route::get('/', 'XmlController@getAllData');
    Route::get('/{id}', 'XmlController@show')->where('id', '[a-z0-9\-]+');
});