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
		return View::make('viewPages.profile')->with('title','Profile');
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
		$data=Auth::user()->all();
		return View::make('edit.profile')
							->with('title','Edit');
							/*->with('n-id',$data['n_id'])
							/*->with('username',$data['username'])
							->with('address',$data['address'])
							->with('phone',$data['phone'])
							->with('email',$data['email']);*/

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
		//
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