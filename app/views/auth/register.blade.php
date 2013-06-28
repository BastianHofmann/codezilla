@extends('layouts.master')

@section('content')
	
	<div class="container">
		<div class="content bordered clearfix">
			<form method="post" url="{{ URL::current() }}" class="form-horizontal">
				@if (Session::has('error'))
					<p>{{ Session::get('error') }}</p>
				@endif
				<h1>Register</h1>
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" name="email" id="email">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name">Name</label>
					<div class="controls">
						<input type="text" name="name" id="name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" name="password" id="password" placeholder="Password">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Register</button>
					</div>
				</div>
			</form>
		</div>
		@include('partials.footer')
	</div>

@stop