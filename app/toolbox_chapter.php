<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class toolbox_chapter extends Model
{
    public function toolbox_question(){
    	return $this->hasMany('App\toolbox_question');
    }
}
