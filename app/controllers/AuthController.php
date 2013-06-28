<?php

class AuthController extends BaseController {

    /**
     * Show the form for registering a new user.
     *
     * @return Response
     */
    public function register()
    {
        return View::make('auth.register');
    }

    /**
     * Store a new user in the database.
     *
     * @return Response
     */
    public function store()
    {
        $email = Input::get('email');

    	$password = Input::get('password');

    	$name = Input::get('name');

    	$rules = array(
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    		'name' => 'required'
    	);

    	$validator = Validator::make(Input::all(), $rules);

		if ( ! $validator->fails())
		{
			$user = new User;

			$user->name = $name;

            $user->slug = Str::slug($name);

			$user->email = $email;

			$user->password = Hash::make($password);

			$user->save();

			Auth::loginUsingId($user->id);

			return Redirect::intended('/');
		}

		return Redirect::to('login')->withErrors($validator);
    }

    /**
     * Show the form for attempting a login.
     *
     * @return Response
     */
    public function login()
    {
        return View::make('auth.login');
    }

    /**
     * Make an login attempt.
     *
     * @return Response
     */
    public function attempt()
    {
    	$email = Input::get('email');

    	$password = Input::get('password');

    	$rules = array(
    		'email' => 'required|email|exists:users',
    		'password' => 'required'
    	);

    	$validator = Validator::make(Input::all(), $rules);

		if ( ! $validator->fails())
		{
			if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{
				return Redirect::intended('/');
			}
		}

		Session::flash('error', 'Wrong Password specified.');

		return Redirect::to('login')->withErrors($validator);
    }

    /**
     * Log the user out.
     *
     * @return Response
     */
    public function logout()
    {
    	Auth::logout();

        return Redirect::to('login');
    }

    /**
     * Show the form for filing a forgotten password.
     *
     * @return Response
     */
    public function forgot()
    {
        return View::make('auth.forgot');
    }

    /**
     * Handle a forgotten password.
     *
     * @return Response
     */
    public function remind()
    {
		$credentials = array('email' => Input::get('email'));

        return Password::remind($credentials, function($message, $user)
        {
            $message->subject('Pensum - Password Reminder');
        });
    }

    /**
     * Show the form for reseting a password.
     *
     * @param  string $token
     * @return Response
     */
    public function reset($token)
    {
        return View::make('auth.reset', compact('token'));
    }

    /**
     * Store the new password.
     *
     * @return Response
     */
    public function change()
    {
        $credentials = array('email' => Input::get('email'));

		return Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();

			Auth::loginUsingId($user->id);

			return Redirect::to('/');
		});
    }

}