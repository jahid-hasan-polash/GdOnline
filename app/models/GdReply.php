<?php

class GdReply extends \Eloquent {
	protected $table = 'gd_reply';

	public function gd(){
		return $this->belongsTo('Gd','Gd_id','id');
	}
}