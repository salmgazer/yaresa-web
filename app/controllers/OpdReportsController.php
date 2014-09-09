<?php

class OpdReportsController extends \BaseController {
/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function showNotifiableDiseaseEvents()
	{
		

		$notifableDiseases=CommunityMemberOpdCase::with('opdCase','communityMember')
		->select('opd_case_id', DB::raw('count("community_member_id") as SuspectedCases'))
		->get();
/**
SELECT COUNT( `community_members_opd_cases`.`community_member_id` ), `opd_cases`.`opd_case_name`, `opd_case_categories`.`opd_case_category_id`, `opd_case_categories`.`opd_case_category`, `community_members_opd_cases`.`rec_date`, `community_members_opd_cases`.`lab` FROM `mhealth-ashesi`.`opd_case_categories` AS `opd_case_categories`, `mhealth-ashesi`.`opd_cases` AS `opd_cases`, `mhealth-ashesi`.`community_members` AS `community_members`, `mhealth-ashesi`.`community_members_opd_cases` AS `community_members_opd_cases` WHERE `opd_case_categories`.`opd_case_category_id` = `opd_cases`.`opd_case_category` AND `community_members`.`community_member_id` = `community_members_opd_cases`.`community_member_id` AND `opd_cases`.`opd_case_id` = `community_members_opd_cases`.`opd_case_id` GROUP BY `opd_cases`.`opd_case_name`
*/

		return View::make('opdcases.diseaseEvents', compact('notifableDiseases'));

	}

}



	/*
	$communities->with(array('subdistrict'=>function($q) use($sort, $order)
				{
					$q->orderBy($sort,$order);
				}));
	*/

	/*
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

			return View::make('vaccinereports.vaccinedashboard', compact('OneAndHalfYrOlds','UnvaccinatedKids','NoOfChildrenLateVaccines'));
	*/
	