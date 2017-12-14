<?php defined('SYSPATH') or die('No direct script access.');

class Controller_postprompt extends Controller {
	
	/**
	 * post提交验证错误画面
	 */
	public function action_postError()
	{
		echo View::factory('promptpage/error')
				->set('errors',$this->request->post('errors'))
				->set('url',$this->request->post('url'));
	}
	
	/**
	 * 途中保存中转画面
	 */
	public function action_halfwaySaveSuccess()
	{
		echo View::factory('promptpage/halfwaysavesuccess')
			->set('url',$this->request->post('url'));
	}
	
	/**
	 * 用户登录错误
	 */
	public function action_loginError()
	{
		echo View::factory('promptpage/loginError')
					->set('errors',$this->request->post('errors'))
					->set('url',$this->request->post('url'));		
	}
	
	/**
	 * step 画面中  ID 不存在
	 */
	public function action_notData()
	{
		echo View::factory('promptpage/notData')
				->set('url',$this->request->post('url'));
	}
	
	/**
	 * 还没有做到step* 这个画面就提前强行进入画面了
	 */
	public function action_illegally()
	{
		echo View::factory('promptpage/illegally')
				->set('url',$this->request->post('url'));
	}
	
	public function action_saveSuccess()
	{
		$url = array_key_exists('from', $_GET)?$_GET['from']:'child/step12';		
		$from = $this->request->post('from');
		if(!empty($from)) $url = $from;
		echo View::factory('promptpage/saveSuccess')
			->set('url',$url)
			->bind('from',$from);
	}
	
	
}