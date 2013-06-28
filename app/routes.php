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

Route::get('/', function()
{
	$lists = null;

	if (Auth::check())
	{
		$lists = Auth::user()->collections()->take(5)->get();
	}

	return View::make('home', compact('lists'));
});

Route::get('lists', 'ListsController@index');

Route::get('lists/create', array('before' => 'auth', 'uses' => 'ListsController@create'));
Route::post('lists/create', array('before' => 'auth', 'uses' => 'ListsController@store'));

Route::get('lists/{id}', 'ListsController@show');

Route::get('lists/{id}/watch', array('before' => 'auth', 'uses' => 'ListsController@watch'));
Route::get('lists/{id}/forget', array('before' => 'auth', 'uses' => 'ListsController@forget'));

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@store');

Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@attempt');

Route::get('logout', 'AuthController@logout');

Route::get('forgot', 'AuthController@forgot');
Route::post('forgot', 'AuthController@remind');

Route::get('reset/{token}', 'AuthController@reset');
Route::post('reset/{token}', 'AuthController@change');

/*
|--------------------------------------------------------------------------
| RESTful API
|--------------------------------------------------------------------------
*/

/* Latest API verison */

Route::group(array('prefix' => 'api', 'before' => 'auth.api'), function()
{
	Route::resource('lists.tasks', 'Api\TasksController');
});

/* API version 1.x */

Route::group(array('prefix' => 'api/v1', 'before' => 'auth.api'), function()
{
	Route::resource('lists.tasks', 'Api\TasksController');
});

/*
|--------------------------------------------------------------------------
| View composer
|--------------------------------------------------------------------------
*/

View::composer('partials.navigation', function($view)
{
	$notifications = Auth::user()->notifications()->with('collection')->get();

	$notificationCount = 0;

	if ($notifications->count() > 0)
	{
		$notificationLists = array();

		foreach ($notifications as $notification)
		{
			$listId = $notification->collection_id;

			if ( ! in_array($listId, $notificationLists))
			{
				array_push($notificationLists, $listId);

				$notificationCount++;
			}
		}
	}

	$view->with(compact('notifications', 'notificationCount'));
});