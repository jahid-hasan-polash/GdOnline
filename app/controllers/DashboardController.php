<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dashboard
	 *
	 * @return Response
	 */
	public function index()
	{
		$gds = Gd::where('user_id',Auth::user()->id)->get();
		return View::make('dashboard')
					->with('title','dashboard')
					->with('gds',$gds);
	}


}