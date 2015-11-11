<?php
/**
 * Created by PhpStorm.
 * User: michaelfavila
 * Date: 9/11/15
 * Time: 3:46 PM
 */

Route::group(['namespace' => 'Auth'], function()
{
    Route::get('auth', ['as' => 'getAuth', 'uses' => 'AuthController@getAuth']);
    Route::post('auth', ['as' => 'postAuth', 'uses' => 'AuthController@postAuth']);

});

Route::group(['namespace' => 'Customer'], function()
{
    Route::group(['middleware' => ['auth.customer']], function()
    {
        Route::get('welcome', ['as' => 'getWelcome', 'uses' => 'WelcomeController@index']);
    });
});
