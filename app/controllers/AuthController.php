<?php

class AuthController extends \BaseController {

	/**Register page call
	* @param none
	* response view register.blade.php page
	*/
	public function register(){
		return View::make('auth.register')->with('title',"Register");
	}


	/** Register function
	* @param none
	* response register a user
	*/
	public function doRegister(){
		$rules = [
					'n_id'	=> 'required|unique:users',
					'username'      => 'required',
					'phone' 	=>	'required',
					'email'       => 'required|email|unique:users',
					'password'       => 'required',
					'confirm_pass'	=> 'required|same:password'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 



			$user = new User;
			$user->n_id = $data['n_id'];
			$user->username = $data['username'];
			$user->address = $data['address'];
			$user->phone = $data['phone'];
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			
			if($user->save()){
				return Redirect::route('login')->with('success','Registration Successful. You can log in now.');
			}else {
				return Redirect::back()->with('error','Something went wrong.Try Again.');
			}
	}


	/**Login page call
	* @param 
	* response view login.blade.php page
	*/
	public function Login(){
		return View::make('auth.login')->with('title', 'Login');
	}

	/**Login 
	* @param none
	* response login and start a session
	*/
	public function doLogin()
	{
		$rules = array
		(
					'email'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		if ($validation->fails())
		{

			return Redirect::route('login')
						->withInput()
						->withErrors($validation);
		} else
		{
			$credentials = array
			(
						'email'    => Input::get('email'),
						'password' => Input::get('password')
			);

		/*Check if he is a admin*/
		switch($credentials['email']){

			case 'admin1@mail.com':
			case 'admin2@mail.com':
			case 'admin3@mail.com':
				if (Auth::attempt($credentials))
					{
						return Redirect::intended('admin/dashboard');
					} else {

						return Redirect::route('login')
									->withInput()
									->withErrors('Error in Email Address or Password.');
					}

				break;
			default :
				if (Auth::attempt($credentials))
					{
						return Redirect::intended('dashboard');
					} else {

						return Redirect::route('login')
									->withInput()
									->withErrors('Error in Email Address or Password.');
					}
		}

			
		}
	}

	/**Logout from the session
	* param none
	* response return to login page
	*/
	public function logout(){
		Auth::logout();
		return Redirect::route('login')
					->with('success',"You are successfully logged out.");

	}


	/** view password change form 
	* @param none
	* respone view changePassword.blade.php
	*/
	public function changePassword(){
		return View::make('auth.changePassword')
					->with('title',"Change Password");
	}


	/** Change password function
	* @param none
	* response change to new password and redirect back to login page
	*/
	public function doChangePassword(){
		$rules =[
			'password'              => 'required|confirmed',
			'password_confirmation' => 'required'
		];
		$data = Input::all();

		$validation = Validator::make($data,$rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}else{
			$user = Auth::user();
			$user->password = Hash::make($data['password']);

			if($user->save()){
				Auth::logout();
				return Redirect::route('login')
							->with('success','Your password changed successfully.');
			}else{
				return Redirect::route('dashboard')
							->with('error',"Something went wrong.Please Try again.");
			}
		}
	}


	public function dashboard(){
		return View::make('dashboard')
					->with('title','Dashboard');
	}


	/**
	* End of the controller
	*/

}