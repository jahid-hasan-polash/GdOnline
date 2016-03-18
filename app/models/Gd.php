<?php

class Gd extends \Eloquent {

	protected $guarded = ['id'];
	protected $table = 'gd_info';

	public function user(){
		return $this->belongsTo('User');
	}


	/*public function relationWithUserGd(){
		return $this->belongsTo('UserGdModel');
	}
*/
}