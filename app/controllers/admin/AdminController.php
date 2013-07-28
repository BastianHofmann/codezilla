<?php namespace Controllers\Admin;

use BaseController;
use Project;
use View;
use Input;
use Validator;
use Redirect;
use Str;
use Auth;

class AdminController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $prices = @file_get_contents('http://marketplace.envato.com/api/edge/BastianHofmann/l7t8ncb1owfvn61xyhkpi84hmb0rhm8k/vitals.json');

		// $prices = json_decode($prices);

		// $balance = $prices->vitals->balance;

		// $user = @file_get_contents('http://marketplace.envato.com/api/edge/user:BastianHofmann.json');

		// $user = json_decode($user);

		// $sales = $user->user->sales;

		// return 'admin area ' . $balance .  '$ ' . $sales;

		return 'admin area';
	}

}