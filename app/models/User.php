<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The rules for adding a user.
	 *
	 * @var array
	 */
	public static $rules = array(
		'name' => 'required',
		'screen_name' => 'required',
		'email' => 'required',
		'password' => 'required'
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * The fields allowed to fill using mass assignment.
	 *
	 * @var array
	 */
	protected $fillable = array('screen_name', 'name', 'email', 'status', 'password', 'customer');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Check if the user is admin by checking the status.
	 *
	 * @return bool
	 */
	public function isAdmin()
	{
		return ($this->status == 2);
	}

}