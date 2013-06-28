<?php namespace Api;

use BaseController;
use Auth;
use Response;
use Notification;

class ApiController extends BaseController {

	public function createNotifications($list, $type = '')
	{
		$notifications = array();

		foreach ($list->users()->get() as $user)
		{
			array_push($notifications, array('type' => $type, 'collection_id' => $list->id, 'user_id' => $user->id));
		}

		foreach ($notifications as $key => $notification)
		{
			if (isset($notification['user_id']) && $notification['user_id'] == Auth::user()->id)
			{
				unset($notifications[$key]);
			}
		}

		if ( ! empty($notifications))
		{
			return Notification::insert($notifications);
		}
	}

}