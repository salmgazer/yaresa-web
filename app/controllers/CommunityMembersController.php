<?php

class CommunityMembersController extends \BaseController {

	/**
	 * Display a listing of communitymembers
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$communitymembers = Communitymember::all();

		return View::make('CommunityMembers.index', compact('communitymembers'));
		*/
		$allowed_columns = ['community_member_id','birthdate', 'community', 'gender'];
		$sort = in_array(Input::get('sort'), $allowed_columns) ? Input::get('sort') : 'community_member_id';
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc

		$communitymembers=Communitymember::with('community');
			//->join('subdistricts','subdistricts.subdistrict_id', '=','communities.subdistrict_id')
		if ( !in_array($sort, ['community'])) 
		{
		$order = Input::get('order') === 'desc' ? 'desc' : 'asc';  //chage last to asc
			$communitymembers=$communitymembers->orderBy($sort, $order);
		}	else
		{
			$communitymembers->with(array('community'=>function($q) use($sort, $order)
			{
				//$q->orderBy($sort,$order);
				$q->orderBy('community_name',$order);  //i have been very specific here
			}));
		}
			
		$communitymembers=$communitymembers->paginate(20);//->get(); //eager loading //->paginate(5);		
		return View::make('CommunityMembers.index', compact('communitymembers','sort','order'));
	}

	/**
	 * Show the form for creating a new communitymember
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('CommunityMembers.create');
	}

	/**
	 * Store a newly created communitymember in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Communitymember::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Communitymember::create($data);

		return Redirect::route('CommunityMembers.index');
	}

	/**
	 * Display the specified communitymember.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$communitymember = Communitymember::findOrFail($id);

		return View::make('CommunityMembers.show', compact('communitymember'));
	}

	/**
	 * Show the form for editing the specified communitymember.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$communitymember = Communitymember::find($id);

		return View::make('CommunityMembers.edit', compact('communitymember'));
	}

	/**
	 * Update the specified communitymember in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$communitymember = Communitymember::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Communitymember::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$communitymember->update($data);

		return Redirect::route('CommunityMembers.index');
	}

	/**
	 * Remove the specified communitymember from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Communitymember::destroy($id);

		return Redirect::route('CommunityMembers.index');
	}

	public function search()
	{
	}


	/**
	additional reports for communities

	*/
	public function communitiesByGender()
	{
		//$sql="SELECT COUNT( `community_members`.`community_member_id` ), `communities`.`community_name`, `community_members`.`gender` FROM `mhealth-ashesi`.`communities` AS `communities`, `mhealth-ashesi`.`community_members` AS `community_members` WHERE `communities`.`community_id` = `community_members`.`community_id` GROUP BY `communities`.`community_name`, `community_members`.`gender`";
		$sql="SELECT COUNT( community_members.community_member_id ) AS theCount, sum(if (gender='m',1,0)) as Males, sum(if(gender='f',1,0)) as Females,  communities.community_name FROM communities AS communities, community_members AS community_members WHERE communities.community_id = community_members.community_id GROUP BY communities.community_name  order by community_name ";
		$communitiesByGenders=DB::select($sql);
		return View::make('CommunityMembers.communitiesByGender', compact('communitiesByGenders'));
	}
}
