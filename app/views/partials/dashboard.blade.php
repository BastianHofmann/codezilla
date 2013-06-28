<div class="master">
	<div class="master-button">
		<a href="{{ URL::to('lists/create') }}" class="btn btn">New List</a>
	</div>
	<h3>Your Lists</h3>
	<ul class="lists">
	@foreach($lists as $list)
		<li>
			<a href="{{ URL::to('lists/' . $list->id) }}">{{ $list->title }}</a>
		</li>
	@endforeach
	</ul>
</div>