<?php

class Rating extends Eloquent {
	public static $timestamps = true;
	public static $table = 'ratings';
	public function user (){
		return $this->belongs_to('User');
	}
	public function article(){
		return $this->belongs_to('Article');
	}
}