<?php

class GdModel extends \Eloquent {

	protected $fillable = [];
	protected $guarded = ['id','created_at','updated_at'];
	protected $table = 'gd_info';
	protected $hidden = array('created_at', 'updated_at', 'id');

	public function relationWithUserGd(){
		return $this->belongsTo('UserGdModel');
	}

}