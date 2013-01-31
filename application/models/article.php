<?php

class Article extends Eloquent {
	public static $timestamps = true;
	public function user() {
		return $this->belongs_to('User');
	}
	public function article_comments() {
		return $this->has_many('Article_Comment');
	}
	public function rating() {
		return $this->has_many('Rating');
	}
}