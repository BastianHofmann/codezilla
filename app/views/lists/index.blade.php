@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="content clearfix">
			<div class="controls-top clearfix">
				<a href="{{ URL::to('lists/create') }}" class="btn btn-primary">New List</a>
				<form class="form-search" action="{{ URL::current() }}" method="get">
					<input type="text" class="input-medium search-query" name="q" value="{{ Input::get('q') }}">
					<button type="submit" class="btn">Search</button>
				</form>
			</div>
			<ul class="lists">
			@foreach($lists as $list)
				<li>
					<a href="{{ URL::to('lists/' . $list->id) }}">{{ $list->title }}</a>
				</li>
			@endforeach
			</ul>
			<?php echo $lists->links(); ?>
		</div>
		@include('partials.footer')
	</div>

@stop