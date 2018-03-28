<?php

Route::group(['middleware' => 'web', 'prefix' => 'user', 'namespace' => 'Api\User\Http\Controllers'], function() {
    Route::get('/dummy-login', 'UserController@welcome')->name('login');
    Route::get('/dummy-register', 'UserController@welcome')->name('register');
});