<?php

class UserGdModel extends \Eloquent {
	protected $fillable = [];
	protected $table = 'user_gd';

	public function Users(){
		return $this->hasOne('User');
	}

	public function Gd(){
		return $this->hasMany('GdModel');
	}
}