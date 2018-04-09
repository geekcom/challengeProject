<?php

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'Auth\LoginController@index');
    Route::post('/', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');
});

Route::group(['prefix' => 'xml', 'middleware' => 'security'], function () {
    Route::get('/', 'ProcessController@index');
    Route::post('/process', 'ProcessController@process');
    Route::get('/list', 'ProcessController@getAllData');
    Route::get('/{id}', 'ProcessController@show');
});


Route::get('/home', 'HomeController@index')->middleware('security');