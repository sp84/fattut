<?php 
require('functions.php');
require('db.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysql_real_escape_string($username);
$query = 	"SELECT password, salt
			FROM users
			WHERE username = '$username';";
$result = mysql_query($query);

//  User does not exist.
if(mysql_num_rows($result) < 1) { 
	header('location: ../login_form.php?alert=null');
	die;
}

//  Apply hash/salt/hash combination to password.
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );

// Incorrect password.
if ( $hash !== $userData['password'] ) { 
	header('location: ../login_form.php?alert=invalid');
	die();
} else {
	// 	Set session data for user
	validateUser();  
}

//  Login successful, redirect now.
header('location: ../account.php');

?>