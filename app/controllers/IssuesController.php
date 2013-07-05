<?php

class IssuesController extends BaseController {

	/**
	 * Show the index page for filing issues
	 *
	 * @return View
	 */
	public function index()
	{
		return View::make('issues.index');
	}

}