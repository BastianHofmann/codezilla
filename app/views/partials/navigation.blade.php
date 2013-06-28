<ul class="navigation">
	<li><a href="{{ URL::to('/') }}">Dashboard</a></li>
	<li><a href="{{ URL::to('lists') }}">Lists</a></li>
	<li class="notification">
		<a href="#">Notifications<span class="count">{{ $notificationCount }}</span></a>
		@if($notificationCount > 0)
			<ul>
				<?php $break = array(); ?>
				@foreach($notifications as $notification)
					@if( ! in_array($notification->collection->id, $break))
						<a href="{{ URL::to('lists/' .  $notification->collection->id) }}">
							<li class="collection">{{{ $notification->collection->title }}}</li>
						</a>
						<?php array_push($break, $notification->collection->id); ?>
					@endif
					@if($notification->type == 'add')
						<li>Task has been added</li>
					@elseif($notification->type == 'delete')
						<li>Task has been deleted</li>
					@elseif($notification->type == 'complete')
						<li>Task has been completed</li>
					@elseif($notification->type == 'open')
						<li>Task has been opened</li>
					@else
						<li>Task has been changed</li>
					@endif
				@endforeach
			</ul>
		@endif
	</li>
	<li><a href="{{ URL::to('logout') }}">Logout</a></li>
</ul>