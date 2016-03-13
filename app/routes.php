<?php

//Route::get('/', ['as'=>'home','uses'=>'HomeController@showWelcome']);
Route::get('/',function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');

	Route::get('register',['as'=>'register','uses'=>'AuthController@register']);
	Route::post('register',['uses'=>'AuthController@doRegister']);
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));
	Route::get('profile',array('as'=>'user.profile', 'uses'=>'UserController@show'));

	Route::get('editProfile',array('as'=>'user.edit','uses'=>'UserController@edit'));
	Route::post('editProfile',array('uses'=>'UserController@update'));

	Route::get('GdProfile',array('as'=>'gd.profile', 'uses'=>'GdController@show'));

});



//This route group is serious need to edit
/*Route::group(array('before' => 'auth'), function()
{

	Route::get('user/delete/{id}', 'UsersController@destroy');


	Route::get('user/{id}/create',['as'=>'user.edit','uses'=>'UsersController@edit']);
	Route::put('user/{id}',['as'=>'user.update','uses'=>'UsersController@update']);
	Route::get('users',['as'=>'user.index','uses'=>'UsersController@index']);
	Route::get('home',['as'=>'home','uses'=>'UsersController@home']);
	Route::get('logout',['as'=>'logout', 'uses'=>'UsersController@getLogout']);

	Route::resource('member','MembersController');


});*/