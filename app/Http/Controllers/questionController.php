<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Toolbox_question;

use App\Toolbox_chapter;

class QuestionController extends Controller
{
    public function store(request $request){
        if(\Auth::user()->role >= '1'){
        	$question = new Toolbox_question;

        	$question->question = $request->question;
        	$question->description = $request->description;
        	$question->toolbox_chapter_id = $request->chapter;

        	$question->save();
        }
    	return redirect()->back();
    }

    public function show($id){
      if(\Auth::user()->role >= '1'){
        $question = Toolbox_question::find($id);
        $question->delete();
      }
      return redirect()->back();
    }

    public function edit($id){
        if(\Auth::user()->role >= '1'){
            $question = Toolbox_question::find($id);
            $questions = Toolbox_question::where('active', '=', '1')->get();
            $chapters = Toolbox_chapter::where('active', '=', '1')->get();
            return view('toolbox/questionEdit', compact('question', 'questions', 'chapters'));
        }
    }

    public function update(request $request){
        if(\Auth::user()->role >= '1'){
            $question = Toolbox_question::find($id);

            $question->question = $request->question;
            $question->description = $request->description;
            $question->toolbox_chapter_id = $request->toolboc_chapter_id;

            $question->save();

            return redirect()->back();
        }
    }
}
