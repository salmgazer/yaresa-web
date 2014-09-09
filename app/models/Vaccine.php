<?php

class Vaccine extends \Eloquent {
	protected $fillable = [];
	protected $primaryKey='vaccine_id';
	public $timestamps = false;

	
	public function vaccineRecord(){
		return $this->hasMany('VaccineRecord', 'vaccine_id','vaccine_id'); 
		
			
	}
}