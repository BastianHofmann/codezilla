@extends('layouts.main')

@section('main')
	<div class="content full">
		{{ Form::open(array('url' => 'register')) }}
			<ul>
				<li>
					{{ Form::label('screen_name', 'Name:') }}
					{{ Form::text('screen_name') }}
				</li>

				<li>
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email') }}
				</li>

				<li>
					{{ Form::label('password', 'Passord:') }}
					{{ Form::password('password') }}
				</li>

				<li>
					{{ Form::submit() }}
				</li>
			</ul>
		{{ Form::close() }}
	</div>
@stop