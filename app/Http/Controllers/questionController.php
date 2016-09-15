<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Toolbox_question;

use App\Toolbox_chapter;

class questionController extends Controller
{
    public function index(){
    	$questions = Toolbox_question::all();

    	$chapters = Toolbox_chapter::all();

    	return view('questions', compact('questions', 'chapters'));   
    }

    public function create(){
    	return view('questionscreate');
    }

    public function store(request $request){
    	$question = new Toolbox_question;

    	$question->question = $request->question;
    	$question->description = $request->description;
    	$question->toolbox_chapter_id = $request->chapter;

    	$question->save();

    	return redirect()->back();
    }
}
