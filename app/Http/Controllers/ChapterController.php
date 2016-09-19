<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Toolbox_chapter;

class ChapterController extends Controller
{
    public function index(){
      $chapters = Toolbox_chapter::all();

      return view('chapters', compact('chapters'));
    }

    public function create(){
      return view('questionscreate');
    }

    public function store(request $request){
      $chapter = new Toolbox_chapter;

      $chapter->chapter = $request->chapter;
      $chapter->save();

      return redirect()->back();
    }
}
