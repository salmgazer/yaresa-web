<?php

class OpdCase extends \Eloquent {
	protected $fillable = [];
	protected $primarykey='opd_case_id';
	protected $table='opd_cases';
	public $timestamps = false;


	public function opdCase(){
		return $this->belongsTo('OpdCase', 'opd_case_id','opd_case_id');
			
	}
}