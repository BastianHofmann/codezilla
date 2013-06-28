<?php

class ProjectsController extends BaseController {

	/**
	 * Show the complete collection
	 *
	 * @return View
	 */
	public function index()
	{
		$title = 'Projects - Codezilla';

		return View::make('main.projects.index', compact('title'));
	}

	/**
	 * Show a specific project
	 *
	 * @param  string  $item
	 * @return View
	 */
	public function show($item)
	{
		$title = ucfirst($item) . ' - Codezilla';

		return View::make('main.projects.show', compact('title'));
	}

}