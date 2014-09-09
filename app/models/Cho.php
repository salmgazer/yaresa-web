<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Cho extends Eloquent  {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'chos';
	protected $primaryKey="cho_id";
	public $timestamps = false;
	

	public function communityMemberOpdCase(){
		return $this->hasMany('communityMemberOpdCase', 'cho_id', 'cho_id');
	}
	public function subdistrict(){
		return $this->belongsTo('SubDistrict', 'subdistrict_id', 'subdistrict_id');
	}


}
