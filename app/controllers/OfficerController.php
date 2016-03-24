<?php

class OfficerController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /officer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$ps = Ps::lists('ps_name','id');
		return View::make('officer.create')
				->with('ps',$ps)
				->with('title','Entry Officer');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /officer
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'ps_id'	=> 'required',
					'name' => 'required',
					'phone' =>	'required',
					'email' => 'required|email',
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 

		$officer = new Officer;
		$officer->ps_id = $data['ps_id'];
		$officer->name = $data['name'];
		$officer->email = $data['email'];
		$officer->phone_number = $data['phone'];

		if($officer->save()){
				return Redirect::route('admin.dashboard')->with('success','Officer entry successful');
			}else {
				return Redirect::back()->with('error','Something went wrong.Try Again.');
			}
	}

}