<?php

class OpdCaseCategoriesController extends \BaseController {

	/**
	 * Display a listing of opdcasecategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$opdcasecategories = Opdcasecategory::all();

		return View::make('opdcasecategories.index', compact('opdcasecategories'));
	}

	/**
	 * Show the form for creating a new opdcasecategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('opdcasecategories.create');
	}

	/**
	 * Store a newly created opdcasecategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Opdcasecategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Opdcasecategory::create($data);

		return Redirect::route('opdcasecategories.index');
	}

	/**
	 * Display the specified opdcasecategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$opdcasecategory = Opdcasecategory::findOrFail($id);

		return View::make('opdcasecategories.show', compact('opdcasecategory'));
	}

	/**
	 * Show the form for editing the specified opdcasecategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$opdcasecategory = Opdcasecategory::find($id);

		return View::make('opdcasecategories.edit', compact('opdcasecategory'));
	}

	/**
	 * Update the specified opdcasecategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$opdcasecategory = Opdcasecategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Opdcasecategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$opdcasecategory->update($data);

		return Redirect::route('opdcasecategories.index');
	}

	/**
	 * Remove the specified opdcasecategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Opdcasecategory::destroy($id);

		return Redirect::route('opdcasecategories.index');
	}

}
