<?php

class AuthController extends BaseController {

	/**
	 * Show the form for loging a user in.
	 *
	 * @return Response
	 */
	public function login()
	{
		$title = 'Login - Codezilla';

		if (Auth::guest())
		{
			return View::make('main.login', compact('title'));
		}
		else
		{
			return Redirect::back();
		}
	}

	/**
	 * Attempt to log a user in.
	 *
	 * @return Response
	 */
	public function attempt()
	{
		$title = 'Login - Codezilla';

		$email = Input::get('email');

		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password), Input::get('remember')))
		{
			return Redirect::intended('docs');
		}

		if (User::where('email', $email)->count() == 0)
		{
			$message = 'Email Address could not be found.';
		}
		else
		{
			$message = 'Password does not match.';
		}

		return View::make('main.login', compact('message', 'title'));
	}

	/**
	 * Show the form for registration.
	 *
	 * @return Response
	 */
	public function register()
	{
		$title = 'Register - Codezilla';

		if (Auth::guest())
		{
			return View::make('main.register', compact('title'));
		}
		else
		{
			return Redirect::back();
		}
	}

	/**
	 * Store a user in the database.
	 *
	 * @return Response
	 */
	public function store()
	{
		$screen_name = Input::get('screen_name');

		$email = Input::get('email');

		$password = Input::get('password');

		$name = Str::slug($screen_name);

		$status = 1;

		$input = compact('screen_name', 'email', 'password', 'name', 'status');

		$validator = Validator::make($input, User::$rules);

		if ($validator->passes())
		{
			$input['password'] = Hash::make($password);

			if (User::all()->count() == 1)
			{
				$input['status'] = 2;
			}

			$user = User::create($input);

			Auth::loginUsingId($user->id);

			return Redirect::intended('docs');
		}

		return Redirect::to('register')->withInput();
	}

}