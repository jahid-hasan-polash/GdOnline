<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		$officers = Officer::all();
		return View::make('adminDashboard')
				->with('title','Admin Dashboard')
				->with('officers',$officers);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /test/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$admin_roles = AdminRole::lists('name','id');
		$ps = Ps::lists('ps_name','id');
		$short_range = DefaultRange::lists('short_range','id');
		$long_range = DefaultRange::lists('long_range','id');

		return View::make('admin.create')
				->with('title','create admin')
				->with('admin_roles',$admin_roles)
				->with('ps',$ps)
				->with('short_range',$short_range)
				->with('long_range',$long_range);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /test/create
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'n_id'	=> 'required',
					'username'      => 'required',
					'phone' 	=>	'required',
					'email'       => 'required',
					'password'       => 'required',

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

				$role = new Role;
				$role->user_id = $user->id;
				$role->role = $data['role'];
				$role->save();

				if($data['role']==1){

					$officer = new Officer;
					$officer->ps_id = $data['ps_id'];
					$officer->name = $data['username'];
					$officer->email = $data['email'];
					$officer->phone_number = $data['phone'];
					$officer->save();
				
				} else if($data['role']==2 ){
					//Save the territory of the admin
					//like south surma, Sylhet metropoliton police
					$rangeName = DefaultRange::findOrFail($data['short_range'])->short_range;

					$range = new Range;
					$range->admin_id = $user->id;
					$range->range = $rangeName; 
					$range->save();
				
				} else if($data['role']==3 ){
					$rangeName = DefaultRange::findOrFail($data['short_range'])->long_range;

					$range = new Range;
					$range->admin_id = $user->id;
					$range->range = $rangeName;
					$range->save();
				}

				return Redirect::route('admin.dashboard')->with('success','Admin Successfully Created');
			}else {
				return Redirect::back()->with('error','Something went wrong.Try Again.');
			}
	}

	/**
	 * Display a listing of the GDs.
	 * GET /admin
	 *
	 * @return Gds
	 */
	public function showTable(){
		//officer
		$officer_ps_id = null;
		$role = Role::where('user_id',Auth::user()->id)->first()->role;
		$gds = Gd::where('layer',$role-1)->get();
		if($role==1){
			$officer_ps_id = Officer::where('email',Auth::user()->email)->first()->ps_id;
		}
		return View::make('admin.showGd')
				->with('title','GD to review')
				->with('role',$role)
				->with('officer_ps_id',$officer_ps_id)
				->with('gds',$gds);
	}
	/**
	 * Display the specified resource.
	 * GET /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function reply($id)
	{
		$replys = GdReply::where('Gd_id',$id)->get();
		$role = Role::where('user_id',Auth::user()->id)->first()->role;
		foreach ($replys as $reply) {
			if($reply->admin_level == $role){
				return Redirect::back()->with('error','You have already replied in this GD.');
			}
		}
		$officers = Officer::lists('name','id');
		
		return View::make('admin.reply')
					->with('title','Admin reply')
					->with('officers',$officers)
					->with('role',$role)
					->with('gd_id',$id);		
	}

	/**
	 * Store the specified resource in storage.
	 * POST /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doReply($id)
	{
		$rules=[
		
		'reply' => 'required'

		];
		$data= Input::all();
		$role = Role::where('user_id',Auth::user()->id)->first()->role;
		//Validation input
		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 

		
		$gdReply = null;	
		//if admin is level 1
		if($role == 1){
			$gdReply = GdReply::where('Gd_id',$id)->first();
		}
		else {
			$gdReply = new GdReply;
		}

		$gdReply->Gd_id = $id;
		$gdReply->admin_level = $role;
		$gdReply->reply = $data['reply'];
		
		//if officer selection is occured
		if($role == 3){
			$gd = Gd::findOrFail($id);
			$officer = Officer::findOrFail($data['officer_id']);
			//check if the officer is from the same police station
			if($gd->thana_id == $officer->ps_id){
				$gd->officer_id = $data['officer_id'];
				$gd->save();	
			} else {
				return Redirect::back()->with('error','Please check the Officer Table and GD Details to assign an officer adjecent to that police station.')->withInput();
			}
			
		}
		if($gdReply->save()){
			//Set the gd layer
			$gd = Gd::findOrFail($id);
			$gd->layer = $role;
			$gd->save();
			return Redirect::route('admin.gdShow')->with('success','Successfully Replied.');
		}
		else {

			return Redirect::back()->with('error','Something went wrong.Try Again.')->withInput();
		}

	}


	/** view password change form 
	* @param none
	* respone view changePassword.blade.php
	*/
	public function changePassword(){
		return View::make('admin.changePassword')
					->with('title',"Change Password");
	}

	public function gdProfile($id){

		$gd = Gd::find($id);
		$replys = GdReply::where('Gd_id',$id)->get();
		$user = User::find($gd->user_id);
		if($gd->officer_id == null){
			$officer = 'Not assigned yet.';
		} else {
			$tempOfficer = Officer::find($gd->officer_id);
			$officer = $tempOfficer->name;
		}
		
		$police_station = Ps::findOrFail($gd->thana_id)->ps_name;
		return View::make('admin.gdProfile')
				->with('title','GD show')
				->with('police_station',$police_station)
				->with('user',$user)
				->with('gd',$gd)
				->with('officer',$officer)
				->with('replys',$replys);
	}


}