<?php

Namespace App\Http\Lib;

Use App\Toolbox_question;

Class Formbuilder{

Toolbox_question::where('active', '=', '1')->get();


public function BuildField(){
	switch ($type){
		$type = "Textarea";
		case('Textarea'){
			//$field[] = '<Textarea name="'.$question->name.'"</textarea>';
			dd("derp");
		}
	}
}
}