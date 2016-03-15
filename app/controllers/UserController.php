<?php

class UserController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  none
	 * @return view profile page
	 */
	public function show()
	{
		return View::make('user.profile')->with('title','Profile');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		//$data=Auth::user();
		return View::make('edit.profile')
							->with('user',Auth::user())
							->with('title','Edit');

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$user= Auth::user();
		$user->fill(Input::all());

		if($user->save()){
			return Redirect::route('user.profile')->with('success','Profile Edited Successfully');
		}
		else{
			return Redirect::back()->with('error','Something went wrong.Try Again.')->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}