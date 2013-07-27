@extends('layouts.scaffold')

@section('main')

<h1>Create Project</h1>

{{ Form::open(array('route' => 'admin.projects.store')) }}
	<ul>
		<li>
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title') }}
		</li>

		<li>
			{{ Form::label('envato_id', 'Envato ID:') }}
			{{ Form::text('envato_id') }}
		</li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


