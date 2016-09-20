<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/toolbox', 'ToolboxController', ['only' => [
    'index', 'post'
]]);

Route::auth();

Route::get('/home', 'HomeController@index');

        Route::group(['middleware' => 'role'], function(){
            Route::resource('/beheer', 'RoleController');

			
			Route::get('/toolbox/editor', 'ToolboxController@editor');


			Route::resource('/chapter', 'ChapterController', ['only' => [
			    'show', 'post', 'update', 'edit', 'store'
			]]);
			Route::resource('/question', 'QuestionController', ['only' => [
			    'show', 'post', 'update', 'edit', 'store'
			]]);
        });
