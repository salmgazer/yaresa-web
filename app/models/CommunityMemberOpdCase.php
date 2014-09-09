<?php

class CommunityMemberOpdCase extends \Eloquent {
	protected $fillable = [];
	protected $primarykey='rec_no';
	protected $table='community_members_opd_cases';
	public $timestamps = false;


	public function  vaccineRecord(){
			return $this->hasMany('VaccineRecord', 'community_member_id', 'community_member_id'); //local b4 foreign
	}


	public function communityMember(){
		return $this->belongsTo('CommunityMember', 'community_member_id','community_member_id');
		//changed from 'communit_member', belongsToMany
	}


	public function opdCase(){
		return $this->belongsTo('OpdCase', 'opd_case_id','opd_case_id');
		//belongsToMany
	}
	
	public function cho(){
		return $this->belongsTo('Chos', 'cho_id','cho_id');		
			//changed from 'chos', belongsToMany
	}
}