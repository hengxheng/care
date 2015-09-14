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
Route::get('/home', function () {
    return view('welcome');
});

Route::resource('care_givers','GiversController');
Route::get('profile/{uid}', ['as' => 'care_givers.create', 'uses' => 'GiversController@create']);
Route::post('personal-store', ['as' => 'care_givers.storeDetails', 'uses' => 'GiversController@storeDetails']);
Route::get('care_givers/{uid}',['as' => 'care_givers.show', 'users' => 'GiversController@show']);

Route::resource('care_seekers','SeekersController');
Route::get('care_seekers/profile/{uid}', ['as' => 'care_seekers.create', 'uses' => 'SeekersController@create']);
Route::post('care_seekers/profile/{uid}', ['as' => 'care_seekers.create', 'uses' => 'SeekersController@create']);
Route::get('care_seekers/{uid}',['as' => 'care_seekers.show', 'users' => 'SeekersController@show']);


Route::resource('job','JobsController');
Route::get('job/create/{uid}', ['as'=>'job.create', 'uses'=>'JobsController@create']);
// Authentication routes...
Route::get('auth/login',['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);