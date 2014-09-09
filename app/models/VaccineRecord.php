<?php

class VaccineRecord extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey='vaccine_rec_id';
	protected $table='vaccine_records';
	public $timestamps = false;


	public function vaccine(){
		return $this->belongsTo('Vaccine', 'vaccine_id', 'vaccine_id');
	}

	public function communityMember(){
		return $this->belongsTo('CommunityMember', 'community_member_id', 'community_member_id');
	}

	
}