@extends('layouts.main')

@section('main')
	<div class="sidebar">
		<ul class="topic-navigation">
			<li>
				<span class="parent">Pensum</span>
				<ul class="children hidden">
					<li>
						<a href="{{ URL::to('docs/pensum#Application') }}">Application</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Server') }}">The Server Side</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Routes') }}">Routes</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Models') }}">Models</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Views') }}">Views</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Controllers') }}">Controllers</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Api') }}">Restful Api</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Client') }}">The Client Side</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Templates') }}">Templates</a>
					</li>
					<li>
						<a href="{{ URL::to('docs/pensum#Client') }}">Views</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="content">
		{{ $content }}
	</div>
@stop