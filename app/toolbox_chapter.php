<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toolbox_chapter extends Model
{
    public function Toolbox_question(){
    	return $this->hasMany('App\Toolbox_question');
    }
}
