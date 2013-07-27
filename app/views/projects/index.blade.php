@extends('layouts.main')

@section('main')

	<div class="content full">
		<h1>All Projects</h1>
		<ul class="projects">
		@foreach($projects as $project)
			<li>
				<a href="{{ URL::to('projects/' . $project->slug) }}">{{{ $project->title }}}</a>
			</li>
		@endforeach
		</ul>
	</div>

@stop