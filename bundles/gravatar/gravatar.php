<?php

/*
 *
 *	Class to create Gravatar image elements
 *
 */
 
 class Gravatar {
 
	public static function make($email, $size = 32) {
		$email = md5($email);
		return '<img src="http://www.gravatar.com/avatar/' . $email . '?s=' . $size . '" />';
	}
 
 }