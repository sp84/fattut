<?php

class User_Profile extends Eloquent {
	public static $table = 'user_profiles';
	public function user(){
		return $this->belongs_to('User');
	}
}