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
	 * Display a listing of the GDs.
	 * GET /admin
	 *
	 * @return Gds
	 */
	public function showTable(){
		 $id = Auth::user()->id;
		 if($id == 1)
		 {
		 	$gds = Gd::all();
		 	return View::make('admin.showGdSuperAdmin')
				->with('title','GD to review')
				->with('gds',$gds);
		 }
		 else if($id == 2){
		 	$gds = GdReply::with('gd')->where('admin_level',0)->get();
		 }else {
		 	$gds = GdReply::with('gd')->where('admin_level',($id-2))->get(); 
		 }
		return View::make('admin.showGd')
				->with('title','GD to review')
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
		foreach ($replys as $reply) {
			if($reply->admin_level == Auth::user()->id-1){
				return Redirect::back()->with('error','You have already replied in this GD.');
			}
		}
		$officers = Officer::lists('name','id');
		return View::make('admin.reply')
					->with('title','Admin reply')
					->with('officers',$officers)
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
		//Validation input
		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 

		//if admin is level 1
		$gdReply = null;	
		if(Auth::user()->id == 2){
			$gdReply = GdReply::where('Gd_id',$id)->first();
		}
		else {
			$gdReply = new GdReply;
		}

		$gdReply->Gd_id = $id;
		$gdReply->admin_level = Auth::user()->id-1;
		$gdReply->reply = $data['reply'];
		//if officer selection is occured
		if(Auth::user()->id == 4){
			$gd = Gd::findOrFail($id);
			$gd->officer_id = $data['officer_id'];
			$gd->save();
		}
		if($gdReply->save()){
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