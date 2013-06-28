@extends('layouts.main')

@section('head')
	{{ HTML::style('css/documentation.css') }}
@stop

@section('main')
	<div class="sidebar">
		<ul class="topic-navigation">
			<li>
				<span class="parent">Pensum</span>
				<ul class="children hidden">
					<li>
						<a href="http://codezilla.co/docs/pensum">Introduction</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Installation">Installation</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Structure">Structure</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Routes">Routes</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Resources">Resources</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Api">Api</a>
					</li>
					<li>
						<a href="http://codezilla.co/docs/pensum#Extending">Extending</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="content">
		{{ $content }}
	</div>
@stop