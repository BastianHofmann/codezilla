@extends('layouts.scaffold')

@section('main')

<h1>All Projects</h1>

<p>{{ link_to_route('admin.projects.create', 'Add new project') }}</p>

@if ($projects->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Envato ID</th>
				<th>Price Regular</th>
				<th>Price Extended</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($projects as $project)
				<tr>
					<td>{{{ $project->title }}}</td>
					<td>{{{ $project->envato_id }}}</td>
					<td>{{{ $project->price_regular }}}</td>
					<td>{{{ $project->price_extended }}}</td>
					<td>{{ link_to_route('admin.projects.edit', 'Edit', array($project->id), array('class' => 'btn btn-info')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.projects.destroy', $project->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no projects
@endif

@stop