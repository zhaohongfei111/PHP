<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {
	public $customerType; 	//登录用户 是管理员用户 还是 保育者用户
	
	public function before(){
		$this->customerType = strtolower(URL::base()) =='/kindergarden/'?'Admin':'Guardian';		
	}
	
	/**
	 * 登录画面
	 */
	public function action_index()
	{	
		$USERID = Session::instance()->get('USERID');
		if(!empty($USERID)){
			$this->redirect('index/index');
			return TRUE;
		}
		
		$USERID = Cookie::get('USERID',NULL);
		$PWD = Cookie::get('PWD',NULL);
		if(!empty($USERID)&&!empty($PWD)){
			$memory = TRUE;
		}else{
			$memory = FALSE;
		}
		
		View::bind_global('USERID',$USERID);
		View::bind_global('PWD',$PWD);
		View::bind_global('memory',$memory);
		
		$controller = strtolower($this->request->controller());
		$action = strtolower($this->request->action());
		View::set_global('controller', $controller);
		View::set_global('action', $action);
		View::set_global('customerType', $this->customerType);
		
		$titleImg = $this->customerType=='Admin'?'tit01.gif':'tit02.gif';
		View::set_global('titleImg',$titleImg);
		$this->response->body(View::factory('login/login'));
	}
	
	
	/**
	 * 登录提交画面
	 */
	public function action_checklogin()
	{
		$m_user = $this->customerType=='Admin'?Model::factory('user'):Model::factory('userGuardian');
		$USERID = $this->request->post('txt_username');
		$PWD =  $this->request->post('txt_password');
		$memory = $this->request->post('memory');
		
		$post = $this->customerType=='Admin'?array('USERID'=>$USERID,'PWD'=>$PWD,'memory'=>$memory):array('Guardian_ID'=>$USERID,'PWD'=>$PWD,'memory'=>$memory);		
		$m_user->checkLogin($post);
	}
	
	public function action_logout()
	{
		Session::instance()->destroy();
		if ($this->request->is_ajax()){
			json_encode(array('result'=>TRUE));
		}else{
			$this->redirect('login/index');
		}		
	}
	

} // End Welcome
