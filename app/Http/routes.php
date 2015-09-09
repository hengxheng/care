<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('care_givers','GiversController');
Route::resource('care_seekers','SeekersController');
Route::get('personal-detail/{uid}', ['as' => 'care_givers.personal-detail', 'uses' => 'GiversController@createstep2']);
Route::post('personal-store', ['as' => 'care_givers.storeDetails', 'uses' => 'GiversController@storeDetails']);
