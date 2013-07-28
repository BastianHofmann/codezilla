<?php

class Navigation extends Eloquent {

	/**
	 * Guarded fields.
	 *
	 * @var array
	 */
	protected $guarded = array();

	/**
	 * Define the relation to Project.
	 *
	 * @var object
	 */
	public function project()
	{
		return $this->belongsTo('Project');
	}

}