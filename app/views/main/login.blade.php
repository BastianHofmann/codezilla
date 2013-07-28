@extends('layouts.main')

@section('main')
	<div class="content full">

		@if(isset($message))
			<p>{{ $message }}</p>
		@endif

		{{ Form::open(array('url' => 'login')) }}
			<ul>
				<li>
					{{ Form::label('email', 'Email Address:') }}
					{{ Form::text('email') }}
				</li>

				<li>
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password') }}
				</li>

				<li>
					{{ Form::submit() }}
				</li>
			</ul>
		{{ Form::close() }}
	</div>
@stop