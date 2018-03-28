<?php

Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'v1'], function() {
        Route::group(['middleware' => 'auth:api', 'prefix' => 'user', 'namespace' => 'Api\User\Http\Controllers'], function() {
            //
        });
    });

    Route::group(['middleware' => 'api', 'prefix' => 'register', 'namespace' => 'Api\User\Http\Controllers'], function() {
        Route::post('/', 'UserController@register');
    });
    Route::group(['middleware' => 'api', 'prefix' => 'login', 'namespace' => 'Api\User\Http\Controllers\Auth'], function() {
        Route::post('/', 'LoginController@login');
        Route::post('/refresh', 'LoginController@refresh');
    });
    Route::group(['middleware' => 'auth:api', 'prefix' => '', 'namespace' => 'Api\User\Http\Controllers\Auth'], function() {
        Route::post('/logout', 'LoginController@logout');
    });
});