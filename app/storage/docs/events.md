# Event Handler #

This package provides a subscripting mechanism to use in you application. Using the `Event` class you can listen to and fire events.

	Event::listen('user.create', function()
	{
		return SendMail('Registration');
	});

Set up an observer with the `Event::listen()` method. Use `.` to define child events.

<h2 id="fire-events">Fire an Event</h2>

	Event::fire('user.create');

The `Event::fire` method triggers an event and all of it's listeners. Set all parameters as an array for the secound argument.

<h2 id="catch-responses">Catch Repsonses</h2>

	$response = Event::fire('user.login');

Responses of listeners are return with `Event::fire()`. If there are more than one listeners subscribed to an event, an array will be returned.

<h2 id="forget-events">Forget an Event</h2>

	Event::forget('user.create');

Forget the event and remove all of it's listeners.

<h2 id="class-event-handler">Handle Events With a Class</h2>

	class UserDeleteEvent {

		public function handle()
		{
			$session = new Session();

			$session->clean();
		}

	}

	Event::listen('user.delete', 'EventHandler');

If you have to handle more complex events, you may use a class. By default the `handle()` method is called.

<h2 id="specify-method">Specify Method</h2>

	Event::listen('user.promote', 'EventHandler@handlePromote');

You can specify a method to be used in the class.

<h2 id="overseers">Set Overseers</h2>
	
	Event::listen('user.*', 'UserEvent@master');

Overseers can be fired directly or will trigger everytime a child event is called. Overseers can also be forgotten.

<h2 id="set-queue">Set Queues</h2>

	Event::queue('user.create');

Putting events in the queue will not fire them put will remember them in an array.

<h2 id="flush-queue">Flush Queues</h2>

	Event::flush();

`Event::flush()` will execute all listeners in the queue.

<h2 id="set-priority">Set Priority</h2>

	Event::listen('user.login', 'UserEvent@sendMail', 1);

	Event::listen('user.login', 'UserEvent@createLogin', 2);

When you want to subscribe more than one listener to an event, you have to specify a priority. Listeners with an higher priority will be execuded first.

<h2 id="execute-once">Execude Only Once</h2>

	Event::fire('user.login', $user, true);

If you set the third argument to true, only the event with the highest priority will be exectued.