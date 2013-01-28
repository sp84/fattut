<?php 

class User_Controller extends Base_Controller {

	public function action_authenticate() {
		$email = Input::get('email');
		$password = Input::get('password');
		$new_user = Input::get('new_user', 'off');
		if ( $new_user == 'on' ) {
			try {

				$user = new User();
				$user->email = $email;
				$user->password = Hash::make($password);
				$user->save;
				echo $user->email;
				echo $user->password;

			} catch ( Exception $e ) {
				echo "Failed to create new user.";
			}
		} else {
			$credentials = array(
				'username' => $email,
				'password' => $password
			);
			if ( Auth::attempt($credentials)) {
				return Redirect::to('dashboard/index');
			} else {
				echo "Failed to Login!";
			}
		}
	}
	
	public function action_logout() {
		Auth::logout();
		return Redirect::to('home');
	}
	
}