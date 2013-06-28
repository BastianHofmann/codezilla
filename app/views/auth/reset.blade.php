@if (Session::has('error'))
    {{ Session::get('reason') }}
@endif
<form method="post" action="{{ URL::current() }}">
	<input type="hidden" name="token" value="{{ $token }}">
	<label for="email">Email: </label>
	<input type="email" name="email" id="email">
	<label for="password">New Password: </label>
	<input type="password" name="password" id="password">
	<label for="password_confirmation">Confirm Password: </label>
	<input type="password" name="password_confirmation" id="password_confirmation">
	<input type="submit" value="register">
</form>