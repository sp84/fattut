<?php 

class User extends Eloquent {
	//  Set $timestamps and Eloquent will
	// 	automatically set created_at & 
	//	updated_at values.
	public static $timestamps = true;
	public function user_profile() {
		return $this->has_one('User_Profile');
	}
	public function followers() {
		return $this->has_many_and_belongs_to('User', 'relationships', 'followed_id', 'follower_id');
	}
	public function following() {
		return $this->has_many_and_belongs_to('User', 'relationships', 'followed_id', 'follower_id');
	}
	public function articles() {
		return $this->has_many('Article');
	}
	public function article_comment() {
		return $this->has_many('Article_Comment');
	}
	public function rating() {
		return $this->has_many('Rating');
	}
}