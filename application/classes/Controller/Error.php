<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Error extends Controller {
	
	public function action_postError()
	{
		echo View::factory('error/error')
				->set('errors',$this->request->post('errors'))
				->set('url',$this->request->post('url'));
	}
	
	
}