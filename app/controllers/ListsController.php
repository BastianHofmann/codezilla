<?php

class ListsController extends BaseController {

	/**
	* Show all records of a resource.
	*
	* @return Response
	*/
	public function index()
	{
		$query = Input::get('q');

		if ( ! empty($query))
		{
			$lists = Collection::where('title', 'LIKE', $query)->paginate(10);
		}
		else
		{
			$lists = Collection::paginate(10);
		}

		return View::make('lists.index', compact('lists'));
	}

	/**
	* Show a specific list.
	*
	* @param  mixed $id
	* @return Response
	*/
	public function show($id)
	{
		$list = Collection::find($id);

		if (is_null($list))
		{
			App::abort(404, 'Page not found');
		}

		$watching = false;

		$watchersCount = $list->users()->count();

		$tasksCount = $list->tasks()->count();

		if ( Auth::check())
		{
			DB::table('notifications')->where('user_id', Auth::user()->id)->where('collection_id', $list->id)->delete();

			foreach (Auth::user()->collections()->get() as $collection)
			{
				if ($collection->id == $list->id)
				{
					$watching = true;
				}
			}
		}

		return View::make('lists.show', compact('list', 'watching', 'watchersCount', 'tasksCount'));
	}

	/**
	* Create a new list.
	*
	* @return Response
	*/
	public function create()
	{
		return View::make('lists.create');
	}

	/**
	* Store a list in the database.
	*
	* @return Response
	*/
	public function store()
	{
		$inputs = Input::all();

		$validator = Validator::make($inputs, array('title' => 'required'));

		if ($validator->fails())
		{
			return Redirect::to('lists/create')->withErrors($validator)->withInput();
		}

		$list = new Collection;

		$list->title = $inputs['title'];

		if (isset($inputs['private'])) {
			$list->private = $inputs['private'];
		}

		Auth::user()->collections()->save($list);

		return Redirect::to('lists/' .  $list->id);
	}

	/**
	* Watch a specific list.
	*
	* @param  mixed $id
	* @return Redirect
	*/
	public function watch($id)
	{
		$list = Collection::find($id);

		if (is_null($list))
		{
			App::abort(404, 'Page not found');
		}

		Auth::user()->collections()->save($list);

		return Redirect::to('lists/' . $id);
	}

	/**
	* Forget a specific list.
	*
	* @param  mixed $id
	* @return Redirect
	*/
	public function forget($id)
	{
		$list = Collection::find($id);

		if (is_null($list))
		{
			App::abort(404, 'Page not found');
		}

		DB::table('collection_user')->where('user_id', Auth::user()->id)->where('collection_id', $list->id)->delete();

		return Redirect::to('lists/' . $id);
	}

}