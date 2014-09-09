<?php

class VaccineDashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//will need to incprporate date and other filters into these queries
		//step 1: all childern in districts without vaccine data
            $OneAndHalfYrOlds=DB::table('community_members')
            ->select('community_name', 'subdistrict', 'birthdate', DB::raw('count(community_member_id) as NoOfChildren'))            
			->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            ->groupBy('subdistrict')           
            ->having(DB::raw('datediff(now(), birthdate)'),'<','546')
            ->orderBy('subdistrict','asc')
			->orderBy('community_name','asc')
            ->get();

            //step 2: count all <18month yr kids who have records but have no vaccination records
            $UnvaccinatedKids=DB::table('community_members')
            ->select('community_name', 'subdistrict', 'birthdate', DB::raw('count(community_members.community_member_id) as NoOfChildren'))            
			->leftJoin('vaccine_records','community_members.community_member_id','=','vaccine_records.community_member_id')
			->whereNull ('vaccine_rec_id')
			->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            ->groupBy('subdistrict')      
            ->having(DB::raw('datediff(now(), birthdate)'),'<','546')             
            ->get();

			//step 3: all kids with records but who have been vaccinated late.
			//thre raw query produced executes correctly directly in mysql, but returns incorrect count here.
			//**************************************incorrect********************************
/*
			$NoOfChildrenLateVaccines=DB::table('community_members')
            //->select('community_name', 'subdistrict', 'birthdate','vaccine_date', 'vaccine_schedule', DB::raw('count(community_members.community_member_id) as NoOfChildren'))            
			->select('community_name', 'subdistrict',  DB::raw('count(community_members.community_member_id) as NoOfChildren'))            
			->join('vaccine_records','community_members.community_member_id','=','vaccine_records.community_member_id')			
			->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->join('vaccines','vaccines.vaccine_id','=','vaccine_records.vaccine_id')			
            ->where(DB::raw('datediff(vaccine_date, birthdate)'),'>','vaccine_schedule') 
			->where(DB::raw('datediff(now(), birthdate)'),'<','546')
            //->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            //->groupBy('subdistrict') 
            ->get();
*/

            $NoOfChildrenLateVaccines= DB::select(DB::raw('select `community_name`, `subdistrict`, 
            	count(community_members.community_member_id) as NoOfChildren from `community_members` inner join
            	`vaccine_records` on `community_members`.`community_member_id` = `vaccine_records`.`community_member_id` 
            	inner join `communities` on `communities`.`community_id` = `community_members`.`community_id` inner 
            	join `subdistricts` on `communities`.`subdistrict_id` = `subdistricts`.`subdistrict_id` inner join 
            	`vaccines` on `vaccines`.`vaccine_id` = `vaccine_records`.`vaccine_id` where datediff(vaccine_date,
            	 birthdate) > vaccine_schedule and datediff(now(), birthdate) < :age group by `community_name`, 
            	`subdistrict`'), array('age'=>545));
		
		/* 
		how may days late for each child
        find list of ids of children under 18, find last vaccination, find next vacination and its date. late?

        */

        /*vaccinated on time */
        $VaccinatedOnTime=DB::table('vaccine_records')
        	->join('community_members','community_members.community_member_id','=','vaccine_records.community_member_id')
            ->join('vaccines','vaccines.vaccine_id','=','vaccine_records.vaccine_id')
            ->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            ->groupBy('subdistrict')                  
            ->where(DB::raw('vaccine_date-birthdate'),'=','vaccine_schedule')
            ->get();

		$VaccinatedLate=DB::table('vaccine_records')
        	->join('community_members','community_members.community_member_id','=','vaccine_records.community_member_id')
            ->join('vaccines','vaccines.vaccine_id','=','vaccine_records.vaccine_id')
            ->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            ->groupBy('subdistrict')                  
            ->where(DB::raw('vaccine_date-birthdate'),'>','vaccine_schedule')
            ->get();

         $VaccinatedBeforeTime=DB::table('vaccine_records')
        	->join('community_members','community_members.community_member_id','=','vaccine_records.community_member_id')
            ->join('vaccines','vaccines.vaccine_id','=','vaccine_records.vaccine_id')
            ->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
            ->groupBy('community_name')  //comment this out to get a tiny summary by subdistrict only
            ->groupBy('subdistrict')                  
            ->where(DB::raw('vaccine_date-birthdate'),'<','vaccine_schedule')
            ->get();
         

         /*do those who have missed their vaccinations */
         /* do list of members who were late, and by how many days. */
		$VaccinatedBeforeTime=DB::table('vaccine_records')
			->select('subdistrict', 'community_name', 'vaccine_records.community_member_id', DB::raw('vaccine_date-birthdate-vaccine_schedule as daysLate'))
        	->join('community_members','community_members.community_member_id','=','vaccine_records.community_member_id')
            ->join('vaccines','vaccines.vaccine_id','=','vaccine_records.vaccine_id')
            ->join('communities','communities.community_id','=', 'community_members.community_id') 
            ->join('subdistricts', 'communities.subdistrict_id', '=', 'subdistricts.subdistrict_id')
        
            ->where(DB::raw('vaccine_date-birthdate'),'>','vaccine_schedule')
            ->get();
         
	
		return View::make('vaccinereports.vaccinedashboard', compact('OneAndHalfYrOlds','UnvaccinatedKids','NoOfChildrenLateVaccines'));
		
		//->with('bears', Bear::all()->with('trees', 'picnics'));
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
