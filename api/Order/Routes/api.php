<?php

Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'v1'], function() {
        Route::group(['middleware' => 'auth:api', 'prefix' => 'order', 'namespace' => 'Api\Order\Http\Controllers'], function() {
            Route::post('/', 'OrderController@order');
            Route::post('/history', 'OrderController@orderHistory');
        });
    });
});