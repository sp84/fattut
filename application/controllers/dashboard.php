<?php 

class Dashboard_Controller extends Base_Controller {

	public function action_index() {
		$articles = Auth::user()->articles()->order_by('created_at', 'desc')->order_by('id', 'desc')->get();
		return View::make('dashboard.index', array('articles' => $articles));
	}
	
	public function action_insert_test_data()
	{
		$logged_in_user = Auth::user();
		for( $x = 0; $x < 10; $x++ ) {
			$email = rand().'@gmail.com';
			$user = new User();
			$user->email = $email;
			$user->password = Hash::make($email);
			$user->save();
			$logged_in_user->followers()->attach($user->id);
			if( $x > 5 ) {
				$logged_in_user->following()->attach($user->id);
			}
		}
		$articles = array(
			array(
				'user_id' => $logged_in_user->id,
				'title' => 'http://farm6.staticflickr.com/5044/5319042359_68fb1f91b4.jpg',
				'content' => 'Dusty Memories, The Girl in the Black Beret (http://www.flickr.com/photos/cloudy-day/)'
			),
			array(
				'user_id' => $logged_in_user->id,
				'title' => 'http://farm3.staticflickr.com/2354/2180198946_a7889e3d5c.jpg',
				'content' => 'Rascals, Tannenberg (http://www.flickr.com/photos/tannenberg/)'
			),
			array(
				'user_id' => $logged_in_user->id,
				'title' => 'http://farm7.staticflickr.com/6139/5922361568_85628771cd.jpg',
				'content' => 'Sunset, Funset, Nikko Bautista (http://www.flickr.com/photos/nikkobautista/)'
			)
		);
		$logged_in_user->photos()->save($photos);
	}

}