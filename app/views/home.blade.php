@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="content clearfix">
			@if(Auth::check())
				@include('partials.dashboard')
			@else
				@include('partials.guest')
			@endif
		</div>
		@if(Auth::check())
			@include('partials.footer')
		@endif
	</div>

@stop