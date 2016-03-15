<?php

class GdModel extends \Eloquent {

	protected $fillable = [];
	protected $guarded = ['id'];
	protected $table = 'gd_info';
	protected $hidden = array('created_at', 'updated_at', 'id');
	
}