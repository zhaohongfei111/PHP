<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sellevel extends Controller {	
	public $SELLEVEL;		//管理员权限
	public $customerType; 	//登录用户 是管理员用户 还是 保育者用户	
	public $controller;
	public $action;
	
	public function before(){
		$this->customerType = strtolower(URL::base()) =='/kindergarden/'?'Admin':'Guardian';
		$this->controller = strtolower($this->request->controller());
		$this->action = strtolower($this->request->action());
		
		View::set_global('controller', $this->controller );
		View::set_global('action', $this->action);
		View::set_global('customerType', $this->customerType);
		if($this->action=='step13'){
			return;
		}	
			
		$m_user = $this->customerType=='Admin'?Model::factory('user'):Model::factory('userGuardian');
		$user = $m_user->checkSession();
		if(!$user){
			$this->redirect('login/index');
		}
		$this->SELLEVEL = Session::instance()->get('SELLEVEL');		
		
		View::set_global('SELLEVEL', $this->SELLEVEL);
				
		if($this->customerType=='Admin'){
			switch($this->SELLEVEL){
				case 'Editor':
					self::kindergardenForEditorLevel();
					break;
				case 'Reader':
					self::kindergardenForReaderLevel();
					break;
			}
			
		}else{
			self::guardianLevel();
		}
	}
	
	/**
	 * 妈妈页面权限判断
	 */
	private function guardianLevel(){
		if(in_array($this->controller, array('index','child','communication'))){
			switch ($this->controller){
				case 'index':
					//首页可以访问
					if(!in_array($this->action, array('index'))){
						Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
						exit;
					}
					break;
				case 'child':
					//判断是否有【園児情報編集権限】
					$authority = Session::instance()->get('Authority');
					if(!$authority){
						Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
						exit;
					}
					
					//在允许编辑权限的情况下 只允许访问step1-12这些画面 包括更新
					if(in_array($this->action,array('step1','step2','step3','step4','step5','step6','step7','step8','step11','step12','step1_insert','step2_insert','step3_insert','step4_insert','step5_insert','step6_insert','step7_insert','step12_insert','insurancefile','saveimages','sel'))){
						if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
							$canEditIdArr = explode('#', Session::instance()->get('canEditId'));
							if(!in_array($_GET['ID'], $canEditIdArr)){
								Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
								exit;
							}
						}
					}else{
						Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
						exit;
					}
					break;
				case 'communication':
					//目前只允许访问这些目录
					if(!in_array($this->action, array('commmenu','comm','comm_insert','buygoods','buygoods_insert','commapplication','application_insert','commfile','delcommfile','savefiles'))){
						Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
						exit;
					}
					break;
			}
		}else{
			Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
			exit;
		}
	}
	
	/**
	 * 管理员[编辑权限]画面权限判断
	 */
	private function kindergardenForEditorLevel(){
		switch ($this->controller ){
			case 'administration':
				Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
				exit;
				break;
			case 'socket':
				Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
				exit;
				break;
		}
	}
	
	/**
	 * 管理员画面权限判断
	 */
	private function kindergardenForReaderLevel(){
		switch ($this->controller ){
			case 'administration':
				Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
				exit;
				break;
			case 'socket':
				Request::factory('postprompt/illegally')->post('url',URL::site('index/index').URL::query())->execute();
				exit;
				break;
			case 'child':
				if(!in_array($this->action,array('step11','insuranceFile','health','contact','invoice_index','invoicepdf','summary'))){
					Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
					exit;
				}
				break;
			case 'list':
				if(!in_array($this->action,array('listall','listclass','listrecog','listrecog','listbeforeadmission','listleave','listrearch','checklist','mondetail','listtempdemand','listnaptempindex','listnapcheck','listtempcheck','napcheckdetail'))){
					Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
					exit;
				}
				break;
			case 'activities':
				if(!in_array($this->action,array('activitieslist','activitiesedit'))){
					Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
					exit;
				}
				break;
			case 'eat':
				if(!in_array($this->action,array('eatlist','eatedit'))){
					Request::factory('postprompt/illegally')->post('url',URL::site('index/index'))->execute();
					exit;
				}
				break;
			case 'listhistory':
				
				break;
			
		}
	}
	
}