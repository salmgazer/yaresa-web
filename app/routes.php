<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//to see all queries executed.
/*
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
*/

Route::get('/test', function()
{
	return View::make('communities.test');
});


//authentication stuff

Route::get('/', function()
{
	return View::make('public.home');
});

	// route to show the login form
	Route::get('login', array('uses' => 'GeneralController@showLogin'));
	// route to process the form
	Route::post('login', array('uses' => 'GeneralController@doLogin'));
	
	

	//************all the following need authentication ***********
Route::group (array('before' => 'auth'), function(){
		//logout
		Route::get('logout', array('uses' => 'GeneralController@doLogout'));

		//use this to create additional users becasue of the BCrypp function used.
		Route::get('/fillup', function()
			{
				//$u= new User();
				$u= User::where('user_id','=','14')->first();//nathan		
				$u->username='nathan';
				$u->password=Hash::make('nana');
				$u->save();
				echo "done adding new user";
				//update Admin, Daniel etc
				$u2= User::where('user_id','=','2')->first();//aelaf
				$u2->password=Hash::make('adafla');
				$u2->save();
				$u2= User::where('user_id','=','3')->first(); //admin
				$u2->password=Hash::make('admin');
				$u2->save();
				$u2= User::where('user_id','=','9')->first();
				$u2->password=Hash::make('daniel.ankomah');
				$u2->save();
				echo "done updating three";
			});

	/*
	Route::get('login', function()
	{
		return View::make('public.login');
	});
	*/


	Route::get('maindashboard', 'GeneralController@showMainDashboardInfo');


	Route::resource('district', 'DistrictsController');

	Route::resource('vaccinedashboard', 'VaccineDashboardController');
	Route::get('community/search','CommunityController@search');  /* should occur b4 resource route */
	Route::resource('community', 'CommunityController');
	Route::resource('subdistricts', 'SubdistrictsController');
	
	Route::get('Chos/search','ChosController@search');  /* should occur b4 resource route */
	Route::resource('Chos', 'ChosController');
	Route::get('CommunityMembers/search','CommunityMembersController@search');  /* should occur b4 resource route */
	Route::get('CommunityMembers/gender','CommunityMembersController@communitiesByGender');  /* should occur b4 resource route */
	Route::resource('CommunityMembers', 'CommunityMembersController');
	
	Route::get('OPDEvents','OpdCasesController@OPDevents');
	Route::resource('OpdCases', 'OpdCasesController');
	Route::resource('OpdCaseCategories', 'OpdCaseCategoriesController');
	Route::resource('Vaccines', 'VaccinesController');
	Route::resource('VaccineRecords', 'VaccineRecordsController');

	/*
	Route::get('vaccinedashboard', function()
	{
	   //return "hello";
	    return View::make('vaccinereports.vaccinedashboard');
	});
	*/
	}); //clossing brace for route::group for authentication


	Route::get('test', 'OpdReportsController@showNotifiableDiseaseEvents');
//route filter to prevent caching:
/**
Route::filter('preventCache', function()

	{
	$headers = array();
	$headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
	$headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
	$headers['Pragma'] = 'no-cache';
	return Response::make(View::make('maindashboard'), 200, $headers);
	}
	*/