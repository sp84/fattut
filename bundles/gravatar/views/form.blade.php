<form action="{{ URL::to_action('gravatar::preview@preview') }}" method="POST">
	<p><label for="name">Email Address:</label></p>
	<p><input type="text" name="email" /></p>
	<p><label for="name">Avatar Size:</label></p>
	<p><input type="text" name="size" /></p>
	<p><input type="submit" value="Preview!" /></p>
</form>