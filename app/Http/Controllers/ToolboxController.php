<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

Use App\Toolbox_chapter;

Use App\Toolbox_question;

Use App\Toolbox_setting;


class ToolboxController extends Controller
{
    Public function index(){
    	if (Auth::guest()){
    		$disable = "disabled";
    	}else{
    		$disable = "";
    	}
    	$side_chapters = Toolbox_chapter::where('active', '=', '1')->get();
    	$toolbox_chapters = Toolbox_chapter::where('active', '=', '1')->paginate(1);
    	$toolbox_questions = Toolbox_question::where('active', '=', '1')->get();
    	$toolbox_settings = Toolbox_setting::all();
        
    	return view('toolbox/toolbox')->with(compact('disable', 'toolbox_chapters', 'toolbox_questions', 'toolbox_settings', 'side_chapters'));
    }

    public function store(Request $request){
        echo "We zijn hier nog niet mee begonnen want er is nog geen trello punt voor.";
        echo "Zodra we er een trello punt voor hebben zullen we er hard mee aan de slag gaan";
        echo "<img src='http://img10.deviantart.net/5107/i/2006/250/2/8/code_monkey_by_gloriouskyle.jpg' />";

    }

    public function editor(){
        $questions = Toolbox_question::where('active', '=', '1')->get();
        $chapters = Toolbox_chapter::where('active', '=', '1')->get();
        $toolbox_settings = Toolbox_setting::all();

        return view('toolbox/toolboxEditor', compact('questions', 'chapters', 'toolbox_settings'));   
    }
}
