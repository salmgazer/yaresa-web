<?php

class DistrictsController extends \BaseController {

	/**
	 * Display a listing of districts
	 *
	 * @return Response
	 */
	public function index()
	{
		$districts = District::all();

		return View::make('districts.index', compact('districts'));
	}

	/**
	 * Show the form for creating a new district
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('districts.create');
	}

	/**
	 * Store a newly created district in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), District::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		District::create($data);

		return Redirect::route('districts.index');
	}

	/**
	 * Display the specified district.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$district = District::findOrFail($id);

		return View::make('districts.show', compact('district'));
	}

	/**
	 * Show the form for editing the specified district.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$district = District::find($id);

		return View::make('districts.edit', compact('district'));
	}

	/**
	 * Update the specified district in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$district = District::findOrFail($id);

		$validator = Validator::make($data = Input::all(), District::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$district->update($data);

		return Redirect::route('districts.index');
	}

	/**
	 * Remove the specified district from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		District::destroy($id);

		return Redirect::route('districts.index');
	}

}
