<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\toolbox_question;

use App\toolbox_chapter;

class questionController extends Controller
{
    public function index(){
    	$questions = toolbox_question::all();
    	$chapters = toolbox_chapter::all();

    	return view('questions', compact('questions', 'chapters'));   
    }

    public function create(){
    	return view('questionscreate');
    }

    public function store(request $request){
    	$question = new toolbox_question;

    	$question->question = $request->question;
    	$question->description = $request->description;
    	$question->toolbox_chapter_id = $request->chapter;

    	$question->save;

    	return redirect()->back();
    }
}
