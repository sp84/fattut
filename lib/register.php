<?php 
require('functions.php');
require('db.php');

// Retrieve data from POST
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

//  If Password fields do not match or the username 
//	is larger than 30 characters, return to login.

if( $pass1 !== $pass2 ) {
	header('location: ../login_form.php?alert=regpass');
	die();
}
if(strlen($username) > 30) {
	header('location: ../login_form.php?alert=username');
	die();
}
if( $username == null || $username == '' ) {
	header('location: ../login_form.php?alert=username');
	die();
}
	

//	Create Hash.
$hash = hash('sha256', $pass1);

//  Create a 3 character sequence (Salt)
function createSalt() {
	$string = md5(uniqid(rand(), true));
	return substr($string, 0, 3);
}
$salt = createSalt();

//  Adds the salt to the hashed password &
//	hash again for security.
$hash = hash('sha256', $salt . $hash);

//  Sanitize username.
$username = mysql_real_escape_string($username);

$query = "INSERT INTO users ( username, password, salt ) VALUES ( '$username', '$hash', '$salt' );";
mysql_query($query);
mysql_close();

header('location: ../login_form.php?alert=success');


?>