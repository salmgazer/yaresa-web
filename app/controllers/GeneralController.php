<?php

class GeneralController extends \BaseController {


	public function showLogin()
	{

		// show the form

			return View::make('public.login');
	}
	
	

	public function doLogin()
	{
		// process the form
				// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required', // make sure the email is an actual email
			'password' => 'required|min:3' // password  has to be greater than 3 characters//
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				 return Redirect::to('maindashboard');
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';

			} else {	 	

				// validation not successful, send back to form

				return Redirect::to('login')->withErrors(['username','Login failed']); //just using first slot for username to report error

			}

		}
	}

	public function doLogout()
	{
		Auth::logout(); // log the user out of our application
		return Redirect::to('login'); // redirect the user to the login screen
	}

	/** 
	*	Computes and returns data for dashboard.	
	*
	**/
	public function showMainDashboardInfo(){
		$results=array();

		$NoOfOpdCases30days=CommunityMemberOpdCase::where(DB::raw('datediff(now(),rec_date )'),'<', array(30))
			->count();
			$results['NoOfOpdCases30days']=$NoOfOpdCases30days;
		$NoOfOpdCases7days=CommunityMemberOpdCase::where(DB::raw('datediff(now(),rec_date )'),'<', array(7))
			->count();
			$results['NoOfOpdCases7days']=$NoOfOpdCases7days;
		return View::make('dashboards.maindashboard', compact('NoOfOpdCases7days','NoOfOpdCases30days', 'results'));
	}


	/**
	 * Display a listing of the resource.
	 * GET /general
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /general/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /general
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /general/{id}
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
	 * GET /general/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /general/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /general/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}