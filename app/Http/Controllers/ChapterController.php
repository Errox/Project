<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Toolbox_chapter;

class ChapterController extends Controller
{
    public function store(request $request){
      if(\Auth::user()->role >= '1'){
        $chapter = new Toolbox_chapter;

        $chapter->chapter = $request->chapter;
        $chapter->save();

      }
      return redirect()->back();
    }

    public function show($id){
      if(\Auth::user()->role >= '1'){
        $chapter = Toolbox_chapter::find($id);
        
        $chapter->active = '0';

        $chapter->save();
      }

      return redirect()->back();
    }

    public function edit($id){
      if(\Auth::user()->role >= '1'){
          $chapter = Toolbox_chapter::find($id);
          $chapters = Toolbox_chapter::where('active', '=', '1')->get();

          return view('toolbox/chapterEdit', compact('chapter', 'chapters'));
      }
    }

    public function update(request $request){
      if(\Auth::user()->role >= '1'){
          $chapter = Toolbox_chapter::find($request->id);

          $chapter->chapter = $request->chapter;

          $chapter->save();

          return redirect()->back();
      }
    }
}
