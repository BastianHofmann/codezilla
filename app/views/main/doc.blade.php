@extends('layouts.main')

@section('main')
	<div class="sidebar">
		<ul class="topic-navigation">
			{{ $navigation }}
		</ul>
	</div>
	<div class="content">
		{{ $content }}
	</div>
@stop