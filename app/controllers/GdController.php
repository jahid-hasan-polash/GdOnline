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
		return View::make('Gd.create')->with('title','GdCreate');
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

		$validator = Validator::make($data,$rules);
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		} 

		$gd= new GdModel;
		$gd->topic = $data['topic'];
		$gd->occured_at = $data['occured-at'];
		$gd->description = $data['description'];
		$gd->requirement = $data['requirement'];

		//$userGd= new UserGd;


		if($gd->save()){
				return Redirect::route('dashboard')->with('success','GD created.');
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
		//
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
		$gd= GdModel::findOrFail($id);

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
		$gd= GdModel::findOrFail($id);
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
		//
	}

}