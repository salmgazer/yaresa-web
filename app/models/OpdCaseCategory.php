<?php

class OpdCaseCategory extends \Eloquent {
	protected $fillable = [];
	protected $primarykey='opd_case_category_id';
	protected $table='opd_case_categories';
	public $timestamps = false;

	public function opdCase(){
		return $this->hasMany('OpdCase', 'opd_case_category','opd_case_category_id'); 
		//the foreign key has no _id at the end
			
	}
}