<?php

function validateUser($arg) {
	session_regenerate_id();
	$_SESSION['valid'] = 1;
	$_SESSION['uid'] = $arg;
}

function isLoggedIn() {
	if(isset($_SESSION['valid']) && $_SESSION['valid'] == 1) {
		return true;
	} else {
		return false;
	}
}

function logout() {
	$_SESSION['valid'] = 0;
	$_SESSION = array();
	session_destroy();
}

?>