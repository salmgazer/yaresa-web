<?php

class District extends \Eloquent {
	//protected $table="communities";

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];
	public $timestamps = false;

}