<?php

class Gravatar_Preview_Controller extends Controller {

	public function action_form() {
		return View::make('gravatar::form');
	}
	
	public function action_preview() {
		$email = Input::get('email');
		$size  = Input::get('size');
		$avatar = Gravatar::make($email, $size);
		return View::make('gravatar::preview')->with('element', $avatar);
	}
	
}