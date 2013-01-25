<?php

class Article_Comment extends Eloquent {
	public static $timestamps = true;
	public static $table = 'article_comments';
	public function user (){
		return $this->belongs_to('User');
	}
	public function article(){
		return $this->belongs_to('Article');
	}
}