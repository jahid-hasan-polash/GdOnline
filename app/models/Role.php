<?php

class Role extends \Eloquent {
	protected $table = 'role';

	public function user(){
		return $this->belongsTo('User');
	}
}