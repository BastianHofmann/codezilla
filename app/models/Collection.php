<?php

class Collection extends Eloquent {

	/**
	 * Set the relation to the tasks resource.
	 *
	 * @return relation
	 */
	public function tasks()
	{
		return $this->hasMany('Task');
	}

	/**
	 * Set the relation to the notification resource.
	 *
	 * @return relation
	 */
	public function notifications()
	{
		return $this->hasMany('Notification');
	}

	/**
	 * Set the relation to the users resource.
	 *
	 * @return relation
	 */
	public function users()
	{
		return $this->belongsToMany('User');
	}

}