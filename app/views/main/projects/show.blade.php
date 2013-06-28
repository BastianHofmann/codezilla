@extends('layouts.main')

@section('main')
	<div class="content">
		<h1>Pensum</h1>
		<h2>Features</h2>
		<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. </p>
		<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
		<pre class="prettyprint php">
			<code>
if ( ! $content = Cache::get(str_replace('/', '_', $markdownFile)))
{
	if ( ! File::isFile(storage_path() . '/' . $markdownFile . '.md'))
	{
		App::abort(404, 'Page not found');
	}

	$markdownParser = new MarkdownParser();

	if ( ! $content = $markdownParser->transformMarkdown(File::get(storage_path() . '/' . $markdownFile . '.md')))
	{
		App::abort(500, 'Internal server error');
	}
}</code>
		</pre>
	</div>
@stop