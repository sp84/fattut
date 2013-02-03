<?php 

class Dashboard_Controller extends Base_Controller {

	public function action_index() {
#		$articles = Auth::user()->articles()->order_by('created_at', 'desc')->order_by('id', 'desc')->get();
		$followers = DB::table('relationships')->join('users','relationships.followed_id', '=', 'users.id')->get();
		$following = DB::table('relationships')->join('users','relationships.follower_id', '=', 'users.id')->get();
		$articles = DB::table('articles')->join('users', 'articles.user_id', '=', 'users.id')->get();
		return View::make('dashboard.index', array('articles' => $articles, 'followers' => $followers, 'following' => $following, ));
	}

	public function action_profile(){
		return View::make('dashboard.profile');
	}
	
}
