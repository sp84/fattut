<?php

function validateUser() {
	session_regenerate_id();
	$_SESSION['valid'] = 1;
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