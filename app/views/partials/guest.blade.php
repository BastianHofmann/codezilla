<div class="master">
	<h2>Make lists for everything</h2>
	<div class="master-button">
		<a href="{{ URL::to('register') }}" class="btn btn">Register</a>
		<a href="{{ URL::to('login') }}" class="btn btn">Login</a>
	</div>
	<form method="post" url="{{ URL::to('register') }}" class="form-horizontal">
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