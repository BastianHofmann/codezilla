<?php

class Project extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'title' => 'required|not_match:create|not_match:edit'
	);
}