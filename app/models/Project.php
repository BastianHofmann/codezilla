<?php

class Project extends Eloquent {

	/**
	 * Guarded fields.
	 *
	 * @var array
	 */
	protected $guarded = array();

	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	public static $rules = array(
		'title' => 'required|not_match:create|not_match:edit'
	);

	/**
	 * Define the relation to Navigation.
	 *
	 * @var object
	 */
	public function navigation()
	{
		return $this->hasOne('Navigation');
	}
}