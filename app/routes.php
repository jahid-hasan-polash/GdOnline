<?php

//Route::get('/', ['as'=>'home','uses'=>'HomeController@showWelcome']);
Route::get('/',function(){
	return Redirect::route('dashboard');
});

	//Before login
Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('register',['as'=>'register','uses'=>'AuthController@register']);
	Route::post('register',['uses'=>'AuthController@doRegister']);
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', ['as'=>'login', 'uses' => 'AuthController@doLogin']);
});

	//After login
Route::group(array('before' => 'auth'), function()
{
	//User routes
	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));
	Route::get('profile', array('as'=>'user.profile', 'uses'=>'UserController@show'));
	Route::get('profile/edit', array('as'=>'user.edit', 'uses'=>'UserController@edit'));
	Route::put('profile/update',  array('as'=>'user.update', 'uses'=>'UserController@update'));
	//GD routes
	Route::get('create-gd', array('as'=>'gd.create','uses'=>'GdController@create'));
	Route::post('create-gd', array('as'=>'gd.store','uses'=>'GdController@store'));
	Route::get('gd/{id}/edit', array('as'=>'gd.edit','uses'=>'GdController@edit'));
	Route::put('gd/{id}', array('as'=>'gd.update','uses'=>'GdController@update'));
	Route::get('gd/{id}', array('as'=>'gd.delete','uses'=>'GdController@destroy'));
	Route::get('gdProfile/{id}', array('as'=>'gd.profile', 'uses'=>'GdController@show'));

	//Admin routes
	Route::get('admin/dashboard',array('as'=>'admin.dashboard','uses'=>'AdminController@index'));

});

