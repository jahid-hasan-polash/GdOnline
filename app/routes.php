<?php

Route::get('/',function(){
	return Redirect::route('dashboard');
	});
Route::get('/admin',function(){
	return Redirect::route('admin.dashboard');
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
	Route::get('admin/create',array('as'=>'admin.create','uses'=>'AdminController@create'));
	Route::post('admin/create',array('as'=>'admin.store','uses'=>'AdminController@store'));
	Route::get('admin/show/gd',array('as'=>'admin.gdShow', 'uses'=>'AdminController@showTable'));
	Route::get('admin/reply/{id}',array('as'=>'admin.reply', 'uses'=>'AdminController@reply'));
	Route::put('admin/{id}/reply',array('as'=>'admin.doReply', 'uses'=>'AdminController@doReply'));
	Route::get('admin/change-password',array('as'=>'admin.password.change', 'uses'=>'AdminController@changePassword'));
	Route::get('admin/gd/{id}/profile',array('as'=>'admin.gd.profile', 'uses'=>'AdminController@gdProfile'));
	Route::get('SuperAdmin/depricate/{id}',array('as'=>'superAdmin.depricate', 'uses'=>'GdController@depricate'));

	//Officer routes
	Route::get('admin/create/officer',array('as'=>'admin.createOfficer', 'uses'=>'OfficerController@create'));
	Route::post('admin/create/officer',array('as'=>'officer.store', 'uses'=>'OfficerController@store'));
	Route::get('officer/{id}',array('as'=>'officer.profile','uses'=>'OfficerController@show'));

});

