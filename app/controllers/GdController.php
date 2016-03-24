<?php

class GdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /gd
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /gd/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$area = Area::lists('area_name','id');

		return View::make('Gd.create')
				->with('title','New General Diary')
				->with('area',$area);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /gd
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules=[
		'topic' => 'required',
		'ps_id' => 'required',
		'occured-at' => 'required',
		'description' => 'required'

		];
		$data= Input::all();
		//Validation input
		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 

		$thana_id = Area::findOrFail($data['ps_id'])->ps_id;

		//Save data into gd_info table
		$gd= new Gd;
		$gd->user_id = Auth::user()->id;
		$gd->topic = $data['topic'];
		$gd->thana_id = $thana_id;
		$gd->occured_at = $data['occured-at'];
		$gd->description = $data['description'];
		$gd->requirement = $data['requirement'];

		if($gd->save()){
			//return Redirect::route('dashboard')->with('success','GD created.');
			//save data into user_gd table while input is saved in
			// gd_info table

			$gdReply = new GdReply;
			$gdReply->Gd_id = $gd->id;
			$gdReply->admin_level = 0;
			$gdReply->reply = null;
			if($gdReply->save()){
				return Redirect::route('dashboard')->with('success','GD created.');	
			}
				
			else {
				//If saving into user_gd table fails delete the gd from gd_info table
				$item= Gd::findOrFail($gd->id); 
				$item->delete($gd->id);
				return Redirect::back()->with('error','Something went wrong.Try Again.')->withInput();
			}		
			}else {

				return Redirect::back()->with('error','Something went wrong.Try Again.')->withInput();
			}

	}

	/**
	 * Display the specified resource.
	 * GET /gd/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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
		return View::make('Gd.profile')
				->with('title','GD show')
				->with('police_station',$police_station)
				->with('user',$user)
				->with('gd',$gd)
				->with('officer',$officer)
				->with('replys',$replys);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /gd/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gd= Gd::findOrFail($id);
		$area = Area::lists('area_name','id');

		return View::make('edit.gd')
			->with('gd',$gd)
			->with('area',$area)
			->with('title','Edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /gd/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gd = Gd::findOrFail($id);
		$data = Input::all();
		$thana_id = Area::findOrFail($data['ps_id'])->ps_id;

		$gd->user_id = Auth::user()->id;
		$gd->topic = $data['topic'];
		$gd->thana_id = $thana_id;
		$gd->occured_at = $data['occured_at'];
		$gd->description = $data['description'];
		$gd->requirement = $data['requirement'];
		
		if($gd->save()){
			return Redirect::route('dashboard')->with('success','Successfully edited');
		}
		else {

			return Redirect::back()->with('error','Something went wrong.Try Again.')->withInput();
		}

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /gd/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		/*$item= Gd::findOrFail($gd->id); 
		if($item->delete($gd->id)){
			
		}
		return Redirect::route('dashboard')->with('success','Successfully Deleted.');*/
		
		try{
			Gd::destroy($id);
			return Redirect::route('dashboard')->with('success','Successfully Deleted.');
		}catch(Exception $e){
			return Redirect::back()->with('error','Something went wrong.Try Again.');
		}
	}

}