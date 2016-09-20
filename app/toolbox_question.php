<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toolbox_question extends Model
{
	public function toolbox_chapter(){
   		return $this->belongsTo('App\toolbox_chapter');
	}

	public function toolbox_setting(){
		return $this->hasOne('App\toolbox_setting');
	}
}
