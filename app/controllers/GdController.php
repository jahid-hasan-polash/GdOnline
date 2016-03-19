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
		return View::make('Gd.create')->with('title','New General Diary');
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
		'occured-at' => 'required',
		'description' => 'required'

		];
		$data= Input::all();
		//Validation input
		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 
		//Save data into gd_info table
		$gd= new Gd;
		$gd->user_id = Auth::user()->id;
		$gd->topic = $data['topic'];
		$gd->occured_at = $data['occured-at'];
		$gd->description = $data['description'];
		$gd->requirement = $data['requirement'];

		if($gd->save()){
			//return Redirect::route('dashboard')->with('success','GD created.');
			//save data into user_gd table while input is saved in
			// gd_info table
			$userGd= new UserGdModel;
        	$userGd->user_id = Auth::user()->id;
			$userGd->gd_id = $gd->id;

			if($userGd->save()){
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
		$user = Auth::user();
		return View::make('gd.profile')
				->with('title','Gd Profile')
				->with('user',$user)
				->with('gd',$gd);
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

		return View::make('edit.gd')
			->with('gd',$gd)
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
		$gd= Gd::findOrFail($id);
		$gd->fill(Input::all());
		
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