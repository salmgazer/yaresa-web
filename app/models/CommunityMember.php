<?php

class CommunityMember extends \Eloquent {
	protected $fillable = [];
	protected $primarykey='community_member_id';
	protected $table='community_members';
	public $timestamps = false;

	public function  vaccineRecord(){
		return $this->hasMany('VaccineRecord', 'community_member_id', 'community_member_id'); //local b4 foreign
	}


/*
	public function vaccine(){
		return $this->belongsTo('Vaccine', 'vaccine_record');
	}

	*/
	
	public function community(){
		return $this->belongsTo('Community', 'community_id', 'community_id');
	}
}