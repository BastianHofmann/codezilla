<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('docs/{item?}', 'DocsController@index');

Route::get('projects', 'ProjectsController@index');

Route::get('projects/{item}', 'ProjectsController@show');

Route::get('/', function() {

	return Redirect::to('docs');

});