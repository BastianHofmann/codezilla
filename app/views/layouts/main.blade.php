<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ $title }}</title>
		<meta name="description" content="Handcrafted PHP scripts. Made with love.">
		<meta name="viewport" content="width=device-width">
		{{ HTML::style('scss/styles.min.css') }}
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-38721672-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		@yield('head')
	</head>
	<body>
		<div class="top-nav">
			<div class="container">
				<ul class="navigation">
					<li>
						<a href="{{ URL::to('projects') }}" title="Overview for all projects" class="active">Projects</a>
					</li>
					<li>
						<a href="{{ URL::to('docs') }}" title="Overview for all documentations">Documentations</a>
					</li>
				</ul>
				<a href="{{ URL::to('/') }}" class="main-logo">Codezilla</a>
			</div>
		</div>
		<div class="container">
			@yield('main')
		</div>
		<div class="footer">
			<div class="container">
				<h3>Handcrafted PHP scripts. Made with love</h3>
				<ul class="socials">
					<li>
						<a href="https://twitter.com/HofmannBastian" class="social-twitter">Twitter</a>
					</li>
					<li>
						<a href="https://github.com/BastianHofmann" class="social-github">Github</a>
					</li>
				</ul>
			</div>
		</div>
		{{ HTML::script('js/scripts.min.js') }}
		{{ HTML::script('highlighter/prettify.js') }}
		<script>prettyPrint();</script>
	</body>
</html