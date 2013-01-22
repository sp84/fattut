<?php
require('lib/functions.php');
require('lib/db.php');

session_start();
if( isLoggedIn() == false ) {
	header('location: lib/login.php');
	die();
} else if ( isLoggedIn() == true ) {
	// Do something?
}
?>
<h1>Hello!</h1>

<a href="lib/logout.php">Logout</a>


?>