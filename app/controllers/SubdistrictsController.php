<?php

class SubdistrictsController extends \BaseController {

	/**
	 * Display a listing of subdistricts
	 *
	 * @return Response
	 */
	public function index()
	{
		$subdistricts = Subdistrict::all();

		return View::make('subdistricts.index', compact('subdistricts'));
	}

	/**
	 * Show the form for creating a new subdistrict
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subdistricts.create');
	}

	/**
	 * Store a newly created subdistrict in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Subdistrict::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Subdistrict::create($data);

		return Redirect::route('subdistricts.index');
	}

	/**
	 * Display the specified subdistrict.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subdistrict = Subdistrict::findOrFail($id);

		return View::make('subdistricts.show', compact('subdistrict'));
	}

	/**
	 * Show the form for editing the specified subdistrict.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subdistrict = Subdistrict::find($id);

		return View::make('subdistricts.edit', compact('subdistrict'));
	}

	/**
	 * Update the specified subdistrict in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subdistrict = Subdistrict::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Subdistrict::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$subdistrict->update($data);

		return Redirect::route('subdistricts.index');
	}

	/**
	 * Remove the specified subdistrict from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subdistrict::destroy($id);

		return Redirect::route('subdistricts.index');
	}

}
