<?php

Route::group(['middleware' => 'web', 'prefix' => 'order', 'namespace' => 'Api\Order\Http\Controllers'], function() {
    // Route::get('/', 'OrderController@index');
});