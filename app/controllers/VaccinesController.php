<?php

class VaccinesController extends \BaseController {

	/**
	 * Display a listing of vaccines
	 *
	 * @return Response
	 */
	public function index()
	{
		$vaccines = Vaccine::all();

		return View::make('vaccines.index', compact('vaccines'));
	}

	/**
	 * Show the form for creating a new vaccine
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vaccines.create');
	}

	/**
	 * Store a newly created vaccine in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Vaccine::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Vaccine::create($data);

		return Redirect::route('vaccines.index');
	}

	/**
	 * Display the specified vaccine.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vaccine = Vaccine::findOrFail($id);

		return View::make('vaccines.show', compact('vaccine'));
	}

	/**
	 * Show the form for editing the specified vaccine.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vaccine = Vaccine::find($id);

		return View::make('vaccines.edit', compact('vaccine'));
	}

	/**
	 * Update the specified vaccine in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vaccine = Vaccine::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Vaccine::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$vaccine->update($data);

		return Redirect::route('vaccines.index');
	}

	/**
	 * Remove the specified vaccine from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Vaccine::destroy($id);

		return Redirect::route('vaccines.index');
	}

}
