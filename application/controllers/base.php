<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public function __construct()
	{
		// Assets
		Asset::add('jquery', 'js/jquery.min.js');
		Asset::add('bootstrap-js', 'js/bootstrap.min.js');
		Asset::add('bootstrap-css', 'css/bootstrap.min.css');
		Asset::add('bootstrap-css-responsive', 'css/bootstrap-responsive.min.css', 'bootstrap-css');
		Asset::add('style', 'css/style.css');
		parent::__construct();

		// Filters
		$class = get_called_class();
		switch($class) {
			case 'Home_Controller':
				$this->filter('before', 'nonauth');
				break;
			case 'User_Controller':
				$this->filter('before', 'nonauth')->only(array('authenticate'));
				$this->filter('before', 'auth')->only(array('logout'));
				break;
			default:
				$this->filter('before', 'auth');
				break;
		}
	}

}