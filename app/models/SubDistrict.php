<?php

class SubDistrict extends \Eloquent {
	protected $fillable = array('subdistrict');
	protected $guarded =array('subdistrict_id');
	protected $table="subdistricts";
	protected $primaryKey="subdistrict_id";

	public $timestamps = false;
	
}