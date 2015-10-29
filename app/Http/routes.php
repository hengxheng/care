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

//Route need to be auth

// Route::filter('auth', function(){
// 	if(Auth::guest()){
// 		return Redirect::to("login");
// 	}
// });

Route::resource('care_givers','GiversController');
Route::get('profile/{uid}', ['as' => 'care_givers.create', 'uses' => 'GiversController@create']);
Route::get('care_givers/{uid}',['as' => 'care_givers.show', 'uses' => 'GiversController@show']);
Route::get('givers/list',['as' => 'care_givers.list', 'uses' => 'GiversController@listing']);
Route::get('profile1', ['as' => 'care_givers.storeProfile1', 'uses' => 'GiversController@storeProfile1']);
Route::get('profile2', ['as' => 'care_givers.storeProfile2', 'uses' => 'GiversController@storeProfile2' ]);
Route::get('{id}/edit2', ['as' => 'care_givers.edit2', 'uses' => 'GiversController@edit2']);
Route::get('{id}/edit3', ['as' => 'care_givers.edit3', 'uses' => 'GiversController@edit3']);

//Ajax call
Route::post('ajax', ['as' => 'care_givers.ajax', 'uses' => 'GiversController@ajaxCall']);


Route::resource('care_seekers','SeekersController');
Route::get('care_seekers/profile/{uid}', ['as' => 'care_seekers.create', 'uses' => 'SeekersController@create']);
Route::post('care_seekers/profile/{uid}', ['as' => 'care_seekers.create', 'uses' => 'SeekersController@create']);
Route::get('care_seekers/{uid}',['as' => 'care_seekers.show', 'users' => 'SeekersController@show']);


Route::resource('job','JobsController');
Route::get('job/create/{uid}', ['as'=>'job.create', 'uses'=>'JobsController@create']);
Route::get('job/list/{poster_id}', ['as'=>'job.list', 'uses'=>'JobsController@listing']);
Route::get('job/edit/{id}', ['as' => 'job.edit', 'uses'=>'JobsController@edit']);
Route::get('job/delete/{id}', ['as' => 'job.delete', 'uses'=>'JobsController@delete']);
Route::get('job/search/{uid}', ['as' => 'job.search', 'uses'=>'JobsController@search']);


Route::get('submission/create/{jid}/{uid}', ['as'=>'submission.create', 'uses'=>'SubmissionsController@create']);
Route::post('submission/store', ['as'=>'submission.store', 'uses'=>'SubmissionsController@store']);


//Messaging
Route::get('message/create/{to_id}', ['as'=>'message.create', 'uses' => 'MessagesController@create'] );
Route::get('message/inbox', ['as'=>'message.inbox', 'uses' => 'MessagesController@receivedmsg'] );
Route::get('message/sent', ['as'=>'message.sent', 'uses' => 'MessagesController@sentmsg'] );
Route::get('message/inbox/{id}', ['as' => 'message.showInbox', 'uses' => 'MessagesController@showInboxMsg']);
Route::get('message/sent/{id}', ['as' => 'message.showSent', 'uses' => 'MessagesController@showSentMsg']);
Route::post('message/store', ['as'=> 'message.store', 'uses' => 'MessagesController@store'] );
Route::get('message/delete/{id}',[ 'as' => 'message.delete', 'uses' => 'MessagesController@destroy']);


//Service Type
Route::post('service_type/add', [ 'as' => 'service.store', 'uses' => 'ServiceTypeController@store']);
Route::post('myservices', ['as' => 'service.myservices' , 'uses' => 'ServiceTypeController@MyServices']);



// Authentication routes...
Route::get('auth/login',['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

