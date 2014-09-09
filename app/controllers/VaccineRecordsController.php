<?php

class VaccineRecordsController extends \BaseController {

	/**
	 * Display a listing of vaccinerecords
	 *
	 * @return Response
	 */
	public function index()
	{
		$vaccinerecords = Vaccinerecord::all();

		return View::make('vaccinerecords.index', compact('vaccinerecords'));
	}

	/**
	 * Show the form for creating a new vaccinerecord
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vaccinerecords.create');
	}

	/**
	 * Store a newly created vaccinerecord in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Vaccinerecord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Vaccinerecord::create($data);

		return Redirect::route('vaccinerecords.index');
	}

	/**
	 * Display the specified vaccinerecord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vaccinerecord = Vaccinerecord::findOrFail($id);

		return View::make('vaccinerecords.show', compact('vaccinerecord'));
	}

	/**
	 * Show the form for editing the specified vaccinerecord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vaccinerecord = Vaccinerecord::find($id);

		return View::make('vaccinerecords.edit', compact('vaccinerecord'));
	}

	/**
	 * Update the specified vaccinerecord in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vaccinerecord = Vaccinerecord::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Vaccinerecord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$vaccinerecord->update($data);

		return Redirect::route('vaccinerecords.index');
	}

	/**
	 * Remove the specified vaccinerecord from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Vaccinerecord::destroy($id);

		return Redirect::route('vaccinerecords.index');
	}

}
