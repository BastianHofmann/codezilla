@extends('layouts.master')

@section('content')
	
	<div class="container">
		<div class="content bordered clearfix">
			<form method="post" url="{{ URL::current() }}" class="form-horizontal">
				@if (Session::has('error'))
					<p>Could not send reminder mail.</p>
				@endif
				<h1>Remind me</h1>
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" name="email" id="email" placeholder="Email">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Send</button>
					</div>
				</div>
			</form>
		</div>
		@include('partials.footer')
	</div>

@stop