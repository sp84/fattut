<?php 

class Article_Controller extends Base_Controller {
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
		$article = new Article(array(
			'title' => $input['title'],
			'content' => $input['content']
		));
		Auth::user()->articles()->insert($article);
		Session::flash('status_success', 'Successfully posted');
		return Redirect::to('dashboard');
	}
}