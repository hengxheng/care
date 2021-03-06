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

Route::get('/', ['uses' => 'HelloController@index']);

// Authentication routes...
Route::get('login',['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login',['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
// Registration routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

Route::post('getsuburbs', ['as'=>'getsuburbs', 'uses'=>'LocationController@getSuburbs']);
Route::post('getpostcode', ['as'=>'getpostcode','uses'=>'LocationController@getPostcode']);


Route::get('/seeker/register', ['as'=>'seeker_register', 'uses'=>'Auth\AuthController@seekerRegister']);
Route::get('/giver/register',['as'=>'giver_register','uses'=>'Auth\AuthController@giverRegister']);


//Route need to be auth

Route::group(['middleware' => 'auth'], function(){
	Route::get('home', function(){
		return view('welcome');
	});

	Route::get('account',['as'=>'account.settings', 'uses'=>'HelloController@changeSettings']);
	Route::post('change_pass',['as'=>'account.changepass', 'uses'=>'HelloController@changePassword']);

	Route::resource('care_givers','GiversController');
	Route::get('care_givers/{uid}',['as' => 'care_givers.show', 'uses' => 'GiversController@show']);
	Route::get('givers/list',['as' => 'care_givers.list', 'uses' => 'GiversController@listing']);
	Route::get('profile1', ['as' => 'care_givers.storeProfile1', 'uses' => 'GiversController@storeProfile1']);
	Route::get('profile2', ['as' => 'care_givers.storeProfile2', 'uses' => 'GiversController@storeProfile2' ]);
	Route::get('{id}/edit2', ['as' => 'care_givers.edit2', 'uses' => 'GiversController@edit2']);
	Route::get('{id}/edit3', ['as' => 'care_givers.edit3', 'uses' => 'GiversController@edit3']);

	//Ajax call
	Route::get('ajax', ['as' => 'care_givers.ajax', 'uses' => 'GiversController@ajaxCall']);

	Route::resource('care_seekers','SeekersController');
	Route::get('care_seekers/{uid}',['as' => 'care_seekers.show', 'users' => 'SeekersController@show']);
	Route::get('seeker/member-signup', ['as'=>'seeker.signup', 'uses' => 'SeekersController@signup']);
	Route::post('seeker/upgrade', ['as'=> 'seeker.upgrade', 'uses'=>'SeekersController@upgrade']);
	Route::get('seeker/payment', ['as'=>'seeker.payment', 'uses'=>'SeekersController@manageSubscription']);
	Route::post('seeker/cancel', ['as'=>'seeker.cancel', 'uses'=>'SeekersController@cancel']);


	Route::resource('job','JobsController');
	Route::get('job/create/{uid}', ['as'=>'job.create', 'uses'=>'JobsController@create']);
	Route::get('job/list/{poster_id}', ['as'=>'job.list', 'uses'=>'JobsController@listing']);
	Route::get('job/edit/{id}', ['as' => 'job.edit', 'uses'=>'JobsController@edit']);
	Route::get('job/delete/{id}', ['as' => 'job.delete', 'uses'=>'JobsController@delete']);
	Route::get('job/search/{id}', ['as' => 'job.search', 'uses'=>'JobsController@search']);
	Route::get('job/applied/{uid}', ['as' => 'job.applied', 'uses'=>'JobsController@applied']);
	Route::post('job/getjobsuburbs', ['as' => 'job.suburbs', 'uses'=>'JobsController@getJobSuburbs']);

	//Submission
	Route::get('submission/create/{jid}/{uid}', ['as'=>'submission.create', 'uses'=>'SubmissionsController@create']);
	Route::post('submission/store', ['as'=>'submission.store', 'uses'=>'SubmissionsController@store']);
	Route::post('submission/like', ['as'=>'submission.like', 'uses'=>'SubmissionsController@like']);

	//Messaging
	Route::get('message/create/{to_id}', ['as'=>'message.create', 'uses' => 'MessagesController@create'] );
	Route::get('message/inbox', ['as'=>'message.inbox', 'uses' => 'MessagesController@receivedmsg'] );
	Route::get('message/sent', ['as'=>'message.sent', 'uses' => 'MessagesController@sentmsg'] );
	Route::get('message/{type}/{id}/', ['as' => 'message.show', 'uses' => 'MessagesController@show']);
	Route::post('message/store', ['as'=> 'message.store', 'uses' => 'MessagesController@store'] );
	Route::get('message/delete/{id}',[ 'as' => 'message.delete', 'uses' => 'MessagesController@destroy']);


	//Service Type
	Route::post('service_type/add', [ 'as' => 'service.store', 'uses' => 'ServiceTypeController@store']);
	Route::post('myservices', ['as' => 'service.myservices' , 'uses' => 'ServiceTypeController@MyServices']);
	//Rating
	Route::resource('rating', 'RatingController');

	Route::post('user_status', [ 'as' => 'changeUserStatus', 'uses' => 'Admin\AdminController@changeUserStatus']);
	Route::post('user_verify', [ 'as' => 'changeUserVerify', 'uses' => 'Admin\AdminController@changeUserVerify']);

});

Route::group(['middleware' => 'admin.login'], function(){
	Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\AdminController@login']);
});

	
Route::group([ 'namespace' => 'Admin', 'middleware' => 'admin'], function(){
	Route::resource('admin', 'AdminController');

	Route::get('admin/givers/list', ['as' => 'admin.givers.list', 'uses' => 'GiversController@listing']);	
	Route::get('admin/giver/{id}', ['as' => 'admin.giver.show', 'uses' => 'GiversController@show']);
	Route::post('amdin/giver/searchbyname', ['as'=>'admin.giver.searchbyname', 'uses' => 'GiversController@searchByName']);

	Route::get('admin/seekers/list', ['as' => 'admin.seekers.list', 'uses' => 'SeekersController@listing']);
	Route::get('admin/seeker/{id}', ['as' => 'admin.seeker.show', 'uses' => 'SeekersController@show']);
	Route::post('amdin/seeker/searchbyname', ['as'=>'admin.seeker.searchbyname', 'uses' => 'SeekersController@searchByName']);
});

// Password reset link request routes...
Route::get('password/email', ['as'=>'password.getemail', 'uses'=>'Auth\PasswordController@getEmail']);
Route::post('password/email',['as'=>'passwrod.postmail', 'uses'=>'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', ['as'=>'password.getreset', 'uses'=>'Auth\PasswordController@getReset']);
Route::post('password/reset', ['as'=>'password.postreset', 'uses'=>'Auth\PasswordController@postReset']);