<?php 

class Article_Controller extends Base_Controller {

	
	public function action_index($article) {
		$article = Article::find($article);
		$forks = DB::table('articles')->where('parent_id', '=', $article->id)->get();
		$comments = DB::table('article_comments')->where('article_id', '=', $article->id)->get();
		$ratings = DB::table('ratings')
					->where('article_id', '=', $article->id)
					->where('rating', '>', 0)
					->count();
		return View::make('articles.full')
			->with(array(
				'article' => $article,
				'forks' => $forks,
				'comments' => $comments,
				'ratings' => $ratings
			));
	}

	public function action_post() {
		$input = Input::all();
		if ( isset ( $input['content'] ) ) {
			$input['content'] = filter_var($input['content'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}
		$rules = array(
			'title' => 'required|max:140',
			'content' => 'required'
		);
		$validation = Validator::make($input,$rules);
		if ( $validation->fails() ) {
			return Redirect::to('dashboard')->with_errors($validation);
		}
		if ( isset($input['article']) ) {
			$article = new Article(array(
				'title' => $input['title'],
				'content' => $input['content'],
				'parent_id' => $input['article']
			));
		} else {
			$article = new Article(array(
				'title' => $input['title'],
				'content' => $input['content']		
			));
		}
		Auth::user()->articles()->insert($article);
		Session::flash('status_success', 'Successfully posted');
		return Redirect::to('dashboard');
	}
	

	
	public function action_fork($article){
		$article = Article::find($article);
		return View::make('articles.fork')
			->with('article', $article);
	}

	public function action_comment(){
		$input = Input::all();
		if ( isset ( $input['comment'] ) ) {
			$input['comment'] = filter_var($input['comment'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}
		$rules = array(
			'comment' => 'required',
			'article' => 'required'
		);
		$validation = Validator::make($input,$rules);
		if ( $validation->fails() ) {
			return Redirect::to('dashboard')->with_errors($validation);
		}

		$comment = new Article_Comment(array(
			'message' => $input['comment'],
			'article_id' => $input['article']
		));
		Auth::user()->article_comment()->insert($comment);
		Session::flash('status_success', 'Successfully commented');
		return Redirect::to('dashboard');
	}
	
	public function action_rateup(){
		$input = Input::all();
		$rating = new Rating(array(
			'rating' => 1,
			'article_id' => $input['article']
		));
		$query = DB::table('ratings')
			->where('article_id', '=', $input['article'])
			->where('user_id', '=', Auth::user()->id)
			->get();
		if ($query) {
			return Redirect::back();
		} else {
			Auth::user()->rating()->insert($rating);
			return Redirect::back();
		}
	}
	public function action_ratedown(){
		$input = Input::all();
		$rating = new Rating(array(
			'rating' => 0,
			'article_id' => $input['article']
		));
		$query = DB::table('ratings')
			->where('article_id', '=', $input['article'])
			->where('user_id', '=', Auth::user()->id)
			->get();
		if ($query) {
			return Redirect::back();
		} else {
			Auth::user()->rating()->insert($rating);
			return Redirect::back();
		}
	}
	
}

