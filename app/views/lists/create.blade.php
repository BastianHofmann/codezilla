@extends('layouts.master')

@section('content')
	
	<div class="container">
		<div class="content bordered clearfix">
			<form method="post" url="{{ URL::current() }}" class="form-horizontal">
				<h1>Create a list</h1>
				<div class="control-group">
					<label class="control-label" for="title">Title</label>
					<div class="controls">
						<input type="text" name="title" id="title" placeholder="Title">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn">Create List</button>
					</div>
				</div>
			</form>
		</div>
		@include('partials.footer')
	</div>

@stop