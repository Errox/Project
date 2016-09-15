<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

Use App\Toolbox_chapter;

Use App\Toolbox_question;

class ToolboxController extends Controller
{
    Public function index(){


    	if (Auth::guest()){
    		$disable = "disabled";
    	}
    	else{
    		$disable = "";
    	}

    	$toolbox_chapters = Toolbox_chapter::all();
    	$toolbox_questions = Toolbox_question::all();

    	return view('/toolbox')->with(compact('disable', 'toolbox_chapters', 'toolbox_questions'));
    }

    public function store(Request $request){
    	dd($request);

    }
}
