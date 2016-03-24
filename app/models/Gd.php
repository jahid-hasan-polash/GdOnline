<?php

class Gd extends \Eloquent {

	protected $guarded = ['id'];
	protected $table = 'gd_info';

	public function user(){
		return $this->belongsTo('User');
	}

	public function gdReply(){
		return $this->hasMany('GdReply','Gd_id','id');
	}


	/*public function relationWithUserGd(){
		return $this->belongsTo('UserGdModel');
	}
*/
}