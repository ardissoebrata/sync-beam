<?php

use Illuminate\Database\Eloquent\Model;

class Sync extends Model {
	
	public function source() {
		return $this->belongsTo('Connection', 'source_id');
	}
	
	public function target() {
		return $this->belongsTo('Connection', 'target_id');
	}
	
}
