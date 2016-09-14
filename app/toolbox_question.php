<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toolbox_question extends Model
{
	public function toolbox_chapters(){
   		return $this->hasMany('App\toolbox_chapters');
	}
}
