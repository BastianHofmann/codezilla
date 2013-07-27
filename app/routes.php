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

Route::get('/', function()
{
	return Redirect::to('docs');
});

Route::resource('projects', 'ProjectsController');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	Route::get('/', 'Controllers\Admin\AdminController@index');

	Route::resource('projects', 'Controllers\Admin\ProjectsController');

	Route::resource('users', 'Controllers\Admin\UsersController');
});