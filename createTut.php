<?php
require('lib/functions.php');
require('lib/db.php');


session_start();
if( isLoggedIn() == false ) {
	header('location: lib/login.php');
	die();
} else if ( isLoggedIn() == true ) {
	$uid = $_SESSION['uid'];
}
?>
<div>
	<form name="createTut" action="lib/add.php" method="post">
		<h2>Create New Tutorial</h2>
		Title: <input type="text" name="tutTitle" maxlength="140" />
		Body: <textarea rows="10" cols="50" name="tutBody"></textarea>
		<input type="submit" value="Submit" />
	</form>

</div>