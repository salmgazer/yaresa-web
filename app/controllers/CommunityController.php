<?php

class CommunityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//to take into account the sorting of columns by col header
		//Controller
		/**
			note that as a result of the sorting code, there -> notation cannot be used to 
			refert to related classes. Verify why. Currently using array format in all this and related
			classes. IT May also be due to pagination rather than using get()
		*/

		$allowed_columns = ['community_id', 'subdistrict', 'population', 'community_name'];
		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'community_id';
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc

		$communities=Community::with('subdistrict');
			//->join('subdistricts','subdistricts.subdistrict_id', '=','communities.subdistrict_id')
		if ( !in_array($sort, ['subdistrict'])) 
		{
			$communities=$communities->orderBy($sort, $order);
		}	else
		{
			$communities->with(array('subdistrict'=>function($q) use($sort, $order)
			{
				$q->orderBy($sort,$order);
			}));
		}
			
		$communities=$communities->paginate(20);//->get(); //eager loading //->paginate(5);		
		return View::make('communities.index', compact('communities','sort','order'));
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$subdistricts=SubDistrict::lists('subdistrict', 'subdistrict_id');
		
		return View::make('communities.create', compact('subdistricts'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
        $validation = Validator::make($input, Community::$rules);

        if ($validation->passes())
        {
            Community::create($input);
            Session::flash('message','A new Community is saved!');
            Session::flash('alert-class','alert-success');

            return Redirect::route('community.index');
        }

        return Redirect::route('community.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$community = Community::with('subdistrict')->find($id);
		
        if (is_null($community))
        {
            return Redirect::route('community.index');
        }
        return View::make('communities.show', compact('community'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$community = Community::with('subdistrict')->find($id);
		$subdistricts=SubDistrict::lists('subdistrict', 'subdistrict_id');
        if (is_null($community))
        {
        	Session::flash('message','Community could not be found!');
            Session::flash('alert-class','alert-warning');
            return Redirect::route('community.index');
        }
        return View::make('communities.edit', compact('community', 'subdistricts'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	
        $input = Input::all();
        $validation = Validator::make($input, Community::$rules);
        if ($validation->passes())
        {
            $community = Community::find($id);
            $community->update($input);
            Session::flash('message','Community is updated!');
            Session::flash('alert-class','alert-success');
            return Redirect::route('community.show', $id);  //was community.show
        }
		return Redirect::route('community.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//need to put in a control to double check before deletion
		Community::findOrFail($id)->delete();  //find or fail used in 2 steps to obtain b4 deletion.
		Session::flash('message','Community deleted!');
            Session::flash('alert-class','alert-danger');
        return Redirect::route('community.index');

	}

	public function search()
	{    
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
	}

	public function populationMap(){
		$communities=Community::with('subdistrict')->get();			//test with limit ->take(5)
		return View::make('communities.populationMap', compact('communities'));
		


	}

}
