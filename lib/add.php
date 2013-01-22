<?php
session_start();
require('functions.php');
require('db.php');

// Retrieve data from POST
$tutTitle = $_POST['tutTitle'];
$tutBody = $_POST['tutBody'];
$uid = $_SESSION['uid'];

if ( $tutTitle == null || $tutTitle == '' || $tutBody == null || $tutBody == '' ) {
	header('location: ../createTut.php?alert=error');
	die();
}

$title = mysql_real_escape_string($tutTitle);
$body = mysql_real_escape_string($tutBody);

$query = "INSERT INTO posts ( uid, post_body, post_title, datetime)
		VALUES ( '$uid', '$body', '$title', '5oclock' );";
mysql_query($query);

header('location: ../account.php?alert=success');


?>