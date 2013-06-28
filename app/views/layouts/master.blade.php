<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>@if(isset($title)) {{ $title }} @else {{ 'Pensum' }} @endif</title>
		<meta name="description" content="@if(isset($title)) {{ $title }} @else {{ 'Create cool lists for your work, your buddies or just for you.' }} @endif">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('css/main.css') }}">
		@yield('head')
	</head>
	<body>
		<div class="header">
			<div class="container cf">
				<a href="{{ URL::to('') }}">
					<h1>Pensum</h1>
				</a>
				@if(Auth::check())
					@include('partials.navigation')
				@else
					@include('partials.guestnavigation')
				@endif
			</div>
		</div>
		@yield('content')
	</body>
</html>