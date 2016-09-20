<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\toolbox_setting;

use App\toolbox_question;


class ToolboxSettings extends Controller
{
    public function index(){
    	$questions = toolbox_question::all();

    	dd($questions['0']->toolbox_question);
    }
}
