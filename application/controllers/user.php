<?php 

class User_Controller extends Base_Controller {
	
	public function action_authenticate() {
		$new_user = Input::get('new_user');
		
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required',
		);
		
		$input = Input::get();
		$validation = Validator::make($input, $rules);
		
		if($validation->fails()){
			return Redirect::to('/home')->with_errors($validation);
		}
		$data = array();
		if( $new_user == 'on' ){
			try{
				$user = Sentry::user()->register( array(
					'email'    => Input::get('email'),
					'password' => Input::get('password'),
				));

				if(!$user){
					$data['errors'] = 'Unable to add user to database';
				}
			} 
			catch( Exception $e ){
				$data['errors'] = $e->getMessage();
			}
			
			if(array_key_exists('errors', $data)){
				Session::flash('status_error',$data['errors']);
				return Redirect::to('/home');
			}
			else{
				return Redirect::to('/user/activate/'.$user['hash']);
			}
		}
		else{
			try{
				$valid_login = Sentry::login(Input::get('email'), Input::get('password'));
				if($valid_login){
					return Redirect::to('/dashboard');
				}
				else{
					$data['errors'] = 'Invalid Login';
				}
			}
			catch( Sentry\Exception $e ){
				$data['errors'] = $e->getMessage();
			}
			Session::flash('status_error',$data['errors']);
			return Redirect::to('/home');
		}
	}
	
	public function action_activate( $email = null , $hash = null){
		try{
			$activate_user = Sentry::activate_user($email, $hash, true);
			
			if($activate_user){
				return Redirect::to('/dashboard');
			}
			else{
				echo 'The user was not activated';
			}
		}
		catch (Sentry\Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function action_logout() {
		Sentry::logout();
		return Redirect::to('/home');
	}
}
