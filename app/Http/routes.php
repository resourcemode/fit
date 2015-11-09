<?php

/*
|--------------------------------------------------------------------------
| Application Routes Loader
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$files = File::allFiles(__DIR__ . '/Routes');
foreach ($files as $file) {
    require $file;
}
