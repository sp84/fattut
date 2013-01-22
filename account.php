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

<h1>Hello!</h1>
Member no <?php echo $uid; ?><br /><br />
<a href="createTut.php">Post a Tutorial</a><br />
<a href="lib/logout.php">Logout</a>
<br /><br />
<h2>Recent Posts</h2>
<table>
<?php 


$query = 	"SELECT *
			FROM posts";
$result = mysql_query($query);

while ( $row = mysql_fetch_assoc($result)) {
	$author = $row['uid'];
	$title = $row['post_title'];
	$body = $row['post_body'];
	$datetime = $row['datetime'];
	echo "<tr><td>" . $title . "</td><td>" . $body . "</td><td>" . $author . "</td><td>" . $datetime . "</td></tr>";
}

?>
</table>
<?php

//  User does not exist.
if(mysql_num_rows($result) < 1) { 
	header('location: ../login_form.php?alert=null');
	die;
}

?>