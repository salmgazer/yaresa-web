<?php

class OpdCasesController extends \BaseController {

	/**
	 * Display a listing of opdcases
	 *
	 * @return Response
	 */
	public function index()
	{
		$opdcases = Opdcase::all();

		return View::make('opdcases.index', compact('opdcases'));
	}

	/**
	 * Show the form for creating a new opdcase
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('opdcases.create');
	}

	/**
	 * Store a newly created opdcase in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Opdcase::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Opdcase::create($data);

		return Redirect::route('opdcases.index');
	}

	/**
	 * Display the specified opdcase.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$opdcase = Opdcase::findOrFail($id);

		return View::make('opdcases.show', compact('opdcase'));
	}

	/**
	 * Show the form for editing the specified opdcase.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$opdcase = Opdcase::find($id);

		return View::make('opdcases.edit', compact('opdcase'));
	}

	/**
	 * Update the specified opdcase in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$opdcase = Opdcase::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Opdcase::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$opdcase->update($data);

		return Redirect::route('opdcases.index');
	}

	/**
	 * Remove the specified opdcase from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Opdcase::destroy($id);

		return Redirect::route('opdcases.index');
	}

}
