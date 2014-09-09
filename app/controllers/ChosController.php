<?php

class ChosController extends \BaseController {

	/**
	 * Display a listing of chos
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$chos = Cho::all();

		return View::make('chos.index', compact('chos'));
		*/
		//to take into account the sorting of columns by col header
		//Controller

		$allowed_columns = ['cho_id','cho_name', 'subdistrict'];
		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'cho_id';
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc

		$chos=Cho::with('subdistrict');
			//->join('subdistricts','subdistricts.subdistrict_id', '=','communities.subdistrict_id')
		if ( !in_array($sort, ['subdistrict'])) 
		{
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc
			$chos=$chos->orderBy($sort, $order);
		}	else
		{
			$chos->with(array('subdistrict'=>function($q) use($sort, $order)
			{
				$q->orderBy($sort,$order);
			}));
		}
			
		$chos=$chos->paginate(20);//->get(); //eager loading //->paginate(5);		
		return View::make('chos.index', compact('chos','sort','order'));
	}

	/**
	 * Show the form for creating a new cho
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('chos.create');
	}

	/**
	 * Store a newly created cho in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Cho::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Cho::create($data);

		return Redirect::route('chos.index');
	}

	/**
	 * Display the specified cho.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cho = Cho::findOrFail($id);

		return View::make('chos.show', compact('cho'));
	}

	/**
	 * Show the form for editing the specified cho.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cho = Cho::find($id);

		return View::make('chos.edit', compact('cho'));
	}

	/**
	 * Update the specified cho in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cho = Cho::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Cho::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$cho->update($data);

		return Redirect::route('chos.index');
	}

	/**
	 * Remove the specified cho from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Cho::destroy($id);

		return Redirect::route('chos.index');
	}


	public function search()
	{    
		/**
		$allowed_columns = ['community_id', 'subdistrict', 'population', 'community_name'];
		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'community_id';
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc

		$searchStr =Input::get('str');    
		$searchResult =Community::with('subdistrict')
			->where('community_name','LIKE', "%$searchStr%")
			->orWhereHas('subdistrict',function($q) use ($searchStr)
			{
				//$searchStr =Input::get('str');    
				$q->where('subdistrict','LIKE', "%$searchStr%");
			})
			->paginate(10);
		return View::make('communities.index')
			->with('name', $searchStr)
			->with('communities', $searchResult)
			->with('order',$order)
			->with('sort',$sort);
			*/
	}

}
