@extends('layouts.master')

@section('content')

	<div class="hero">
		<div class="container clearfix">
			<h1 class="title"><a href="{{ URL::to('lists/' . $list->id) }}">{{{ $list->title }}}</a></h1>
			<ul class="info">
				<li class="watch"><span>{{ $watchersCount }}</span></li>
				<li class="count"><span>{{ $tasksCount }}</span></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="content clearfix">
			<div class="list">
				<div class="list-top clearfix">
					<a href="@if($watching) {{ URL::to('lists/' . $list->id . '/forget') }} @else {{ URL::to('lists/' . $list->id . '/watch') }} @endif" class="list-watch button @if($watching) watching @endif">
						@if($watching)
							<span>watching</span>
						@else
							<span>watch</span>
						@endif
					</a>
					<ul class="filters" id="taskFilters">
						<li><a href="#all" class="filter-all">all</a></li>
						<li><a href="#completed" class="filter-completed">completed</a></li>
						<li><a href="#uncompleted" class="filter-uncompleted">uncompleted</a></li>
					</ul>
				</div>
				<div class="tasks">
					<ul class="tasks-list">
						<span class="loading"></span>
					</ul>
				</div>
			</div>
			<form method="post" id="createTask" class="create-task">
				<input type="text" id="taskContent" placeholder="Add a new task...">
				<input type="submit" value="Add Task" class="button">
			</form>
		</div>
		@include('partials.footer')
	</div>
	<script type="text/javascript">
		var list = {{ $list->id }};
	</script>
	{{ script() }}
	<script>
		(function() {
			// Kick things off!
			var App = new AppView();
		})();
	</script>

@stop