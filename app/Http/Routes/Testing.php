<?php
/**
 * Created by PhpStorm.
 * User: michaelfavila
 * Date: 9/11/15
 * Time: 3:43 PM
 */

Route::group(['namespace' => 'Customer'], function()
{
    Route::get('/', function () {
        return view('welcome');
    });
});