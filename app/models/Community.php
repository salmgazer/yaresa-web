<?php

class Community extends \Eloquent {
	//protected $fillable = [];
	protected $table="communities";
	protected $primaryKey="community_id";
	public $timestamps = false;


 	//protected $guarded = array('community_id');
 	protected $fillable = array('community_name', 'subdistrict_id','latitude','longitude','population','household');

 public static $rules = array(
    'community_name' => 'required|min:5',
    //'subdistrict_id' => 'required',
    'population' => 'numeric',
    'longitude' => 'numeric',
    'latitude' => 'numeric',
    'household' => 'numeric'
    
  );


	public function subdistrict(){
		return $this->belongsTo('SubDistrict', 'subdistrict_id', 'subdistrict_id');
	}

}