<?php namespace Controllers\Admin;

use BaseController;
use Project;
use View;
use Input;
use Validator;
use Redirect;
use Str;

class AdminController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'admin area';
	}

}