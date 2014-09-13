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

	/**
		additional reports for OPD cases
	*/
		public function OPDevents(){
			//gives count of various opd events by community, by by lab confirmd.
			//use for  -wk15 report 
			
			
				//$sql=DB::select(DB::raw('SELECT opd_case_categories.opd_case_category, opd_cases.opd_case_name, communities.community_name, COUNT( community_members_opd_cases.community_member_id ), community_members_opd_cases.rec_date, community_members_opd_cases.lab FROM opd_cases AS opd_cases, community_members_opd_cases AS community_members_opd_cases, opd_case_categories AS opd_case_categories, communities AS communities, community_members AS community_members WHERE opd_cases.opd_case_id = community_members_opd_cases.opd_case_id AND opd_cases.opd_case_category = opd_case_categories.opd_case_category_id AND communities.community_name = communities.community_name AND community_members.community_member_id = community_members_opd_cases.community_member_id AND communities.community_id = community_members.community_id GROUP BY communities.community_name, community_members_opd_cases.lab'))
				//->get();
			$OPDEvents=DB::select('SELECT opd_case_categories.opd_case_category, opd_cases.opd_case_name, communities.community_name, COUNT( community_members_opd_cases.community_member_id ) as theCount, community_members_opd_cases.rec_date, community_members_opd_cases.lab FROM opd_cases AS opd_cases, community_members_opd_cases AS community_members_opd_cases, opd_case_categories AS opd_case_categories, communities AS communities, community_members AS community_members WHERE opd_cases.opd_case_id = community_members_opd_cases.opd_case_id AND opd_cases.opd_case_category = opd_case_categories.opd_case_category_id AND communities.community_name = communities.community_name AND community_members.community_member_id = community_members_opd_cases.community_member_id AND communities.community_id = community_members.community_id GROUP BY communities.community_name, community_members_opd_cases.lab');
			/*
			$OPDEvents=DB::table('community_members_opd_cases')
				->select('opd_case_category','opd_case_name','community_name', DB::raw('COUNT( community_members_opd_cases.community_member_id) as theCount'),'rec_date','lab' )
				->join('opd_cases', 'opd_case_id' )   //joins `community_members_opd_cases`
				->join('opd_case_categories','opd_case_category_id', 'opd_case_category' ) //opd_cases joins opd_case_categories
				->join('community_members', 'community_member_id' ,'community_member_id' )//join to `community_members_opd_cases`.`
				->join('communities', 'communities.community_id' , 'community_members.community_id')
				->groupBy('community_name')
				->groupBy('lab')
				->get();
				*/
				return View::make('opdcases.opdevents', compact('OPDEvents'));

				


			//example
			/**
			CommunityMemberOpdCase::with('opdCase','communityMember')
		->select('opd_case_id', DB::raw('count("community_member_id") as SuspectedCases'))
		->get();
		*/
		}
}
