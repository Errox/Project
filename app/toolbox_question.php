<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toolbox_question extends Model
{
	public function Toolbox_chapters(){
   		return $this->hasOne('App\Toolbox_chapters');
	}
}
