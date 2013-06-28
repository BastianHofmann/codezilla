<?php

class Task extends Eloquent {

	/**
	 * Set the relation to the users resource.
	 *
	 * @return relation
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Set the relation to the collections resource.
	 *
	 * @return relation
	 */
	public function collection()
	{
		return $this->belongsTo('Collection');
	}
	
}