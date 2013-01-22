<?php
require('lib/functions.php');

session_start();
if(!isLoggedIn()) {
	header('location: login.php');
	die();
}
?>
<h1>Hello!</h1>

<a href="login_form.php" onclick="logout();">Logout</a>