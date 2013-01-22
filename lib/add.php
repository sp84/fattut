<?php

require('functions.php');
require('db.php');

// Retrieve data from POST
$tutTitle = $_POST['tutTitle'];
$tutBody = $_POST['tutBody'];
if ( $tutTitle == null || $tutTitle == '' || $tutBody == null || $tutBody == '' ) {
	header('location: ../createTut.php?alert=error');
	die();
}

$title = mysql_real_escape_string($tutTitle);
$body = mysql_real_escape_string($tutBody);

$query = "INSERT INTO posts ( post_author, post_date, post_content, post_title, post_keywords, post_status, fork_status)
		VALUES ( 'username', 'datetime', 'body', 'title', 'keywords', 'postStatus', 'forkStatus' );";
mysql_query($query);


header('location: ../account.php?alert=post_success');


?>