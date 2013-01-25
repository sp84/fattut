<?php
require('lib/functions.php');
session_start();
?>

<form name="login" action="lib/login.php" method="post">
	<h2>Login</h2>
	Username: <input type="text" name="username" />
	Password: <input type="password" name="password" />
	<input type="submit" value="Login" />
</form>

<form name="register" action="lib/register.php" method="post">
	<h2>Register</h2>
	Username: <input type="text" name="username" maxlength="30" />
	Password: <input type="password" name="register_password" />
	Password Again: <input type="password" name="register_password_confirm" />
	<input type="submit" value="Register" />
</form>
