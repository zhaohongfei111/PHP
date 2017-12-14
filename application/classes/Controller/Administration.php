<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration extends Controller_Sellevel {
	
	public function before(){
		parent::before();
		if(!in_array(strtolower($this->request->action()),array('login','checklogin'))){	
			$administration = Session::instance()->get('administration');			
			if(empty($administration)||time()-$administration>600){
				Session::instance()->set('administration', 0);
				$this->redirect('administration/login');
			}else{
				Session::instance()->set('administration', time());
			}
		}		
	}
	
	public function action_index()
	{
		$confirmDataNum = Model::factory('master')->getConfirmDataNum();
		
		
		$body = View::factory('administration/index')
				->bind('confirmDataNum',$confirmDataNum);
		$this->response->body($body);
	} 
	
	public function action_login()
	{		
		$body = View::factory('administration/login');
		$this->response->body($body);		
	}
	
	public function action_checklogin()
	{
		$PWD = Session::instance()->get('PWD');
		if($PWD==$this->request->post('password')){			
			Session::instance()->set('administration', time());
			$this->redirect('administration/index');
		}else{
			Session::instance()->delete('administration');
			$this->redirect('administration/login');
		}
	}
	
	public function action_logout()
	{
		Session::instance()->delete('administration');
		$this->redirect('index/index');
	}
	
	/**
	 * 管理员列表
	 */
	public function action_userWorkerList() 
	{		
		$worker_List = Model::factory('user')->userWorkerList();
		$body = View::factory('administration/userWorkerList')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('worker_List',$worker_List);
		$this->response->body($body);
	}
	
	/**
	 * 管理者電子印
	 */
	public function action_userWorkerImages()
	{
		if(array_key_exists('userWorkerPic',$_GET)){
			$userWorkerPic = $_GET['userWorkerPic'];
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
		
		$gp_l = array_filter(explode(';', $userWorkerPic));
		
		$sp = Session::instance()->get('userWorkerPic');
		if(!empty($sp)){
			$sp_l = array_filter(explode(';', $sp));
			$fl = array_unique(array_merge($sp_l,$gp_l));
			Session::instance()->set('userWorkerPic','');
			$this->redirect('administration/userWorkerImages'.URL::query(array('userWorkerPic'=>implode(';',$fl))));
			exit;
		}
		
		$body = View::factory('administration/userWorkerImages')
						->bind('fileList',$gp_l);
		$this->response->body($body);
	}
	
	/**
	 * 管理者電子印保存
	 */
	public function action_saveUserWorkerImages(){
						
		$dir = Kohana::$config->load('global.base_url')."/media/uploadfile/userWorkerImages/";
		if(!is_dir($dir)){
			mkdir($dir,0777,TRUE);
		}
	
		$image = Image::factory($_FILES['file']['tmp_name']);
		list($usec, $sec) = explode(" ", microtime());
		list($zero,$num) = explode(".", $usec);
		$nameList = explode('.',$_FILES['file']['name']);
		$hz = array_pop($nameList);
		$imageName = $sec.$num.'.'.$hz;
		$sp = Session::instance()->get('userWorkerPic');
		$sp .= empty($sp)?$imageName:';'.$imageName;
		Session::instance()->set('userWorkerPic',$sp);
		$image->resize(400, 400, Image::AUTO)->rotate($this->request->post('rotation'))->save($dir.$imageName);
		
		if(array_key_exists('ID',$_GET)){
			$ID = $_GET['ID'];
			Model::factory('user')->SaveUserWorkerImages($imageName,$ID);
		}
	}
	
	/**
	 * 管理者電子印删除
	 */
	public function action_delUserWorkrtImages()
	{
		$img = $this->request->post('img');
		$ID = $this->request->post('ID');
		$delImg =  Kohana::$config->load('global.base_url')."/media/uploadfile/userWorkerImages/".$img;
		$result=array('del'=>FALSE);
		if(file_exists($delImg)){
			if (unlink($delImg)){
				$p_l = array_filter(explode(';', $_GET['userWorkerPic']));
				$p_l = array_diff($p_l, array($img));
				$result = array('ID'=>$ID,'del'=>TRUE,'src'=>URL::site('administration/userWorkerImages').URL::query(array('userWorkerPic'=>implode(';',$p_l))));
			}
		}
		Model::factory('user')->DelUserWorkerImages($img,$ID);
		
		echo json_encode($result);
	}
	
	/**
	 * 添加管理员
	 */
	public function action_addUserWorker()
	{		
		$model_user = Model::factory('user');		
		$result = $model_user->userUpdate($this->request);
		echo json_encode($result);		
	}
	
	/**
	 * 删除用户
	 */
	public function action_delUserWorker()
	{	
		$model_user = Model::factory('user');		
		$ID_Arr = array_filter(explode(';', $this->request->post('ID')));

		if(empty($ID_Arr)){
			$json = array('result'=>false);
		}else{
			$json['result'] = $model_user->userDel($ID_Arr);			
		}
		echo json_encode($json);
	}
	
	/**
	 * 获取初始密码
	 */
	public function action_getInitializationPwd()
	{
		$PWD = Model::factory('user')->creatPwd();
		echo json_encode(array('PWD'=>$PWD));
	}
	
	
	/**
	 * 保护者页面
	 */
	public function action_userGuardianList() {
		$name = array_key_exists('txt_Search', $_GET)?$_GET['txt_Search']:'';
		$guardian_List = Model::factory('userGuardian')->userGuardianList($name);		
		$body = View::factory('administration/guardian')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('guardian_List',$guardian_List)
				->bind('search',$name);
		$this->response->body($body);
	}
	
	
	/**
	 * 获取最新的
	 */
	public function action_getNewGuardianIDAndPwd()
	{ 
		 $Guardian_ID = Model::factory('child')->getNewChildId(date('Y'));		 
		 $PWD = Model::factory('user')->creatPwd();
		 echo json_encode(array('Guardian_ID'=>$Guardian_ID,'PWD'=>$PWD));
	}
	
	
	/**
	 * 添加管理员
	 */
	public function action_addUserGuardian()
	{		
		$model_userGuardian = Model::factory('userGuardian');
		$result = $model_userGuardian->userGuardianUpdate($this->request);
		echo json_encode($result);
	}
	
	/**
	 * 删除保育者
	 */
	public function action_delUserGuardian()
	{
		$model_userGuardian = Model::factory('userGuardian');	
		$ID_Arr = array_filter(explode(';', $this->request->post('ID')));
	
		if(empty($ID_Arr)){
			$json = array('result'=>false);
		}else{
			$json['result'] = $model_userGuardian->userGuardianDel($ID_Arr);
		}
		echo json_encode($json);
	}
	
	/**
	 * 保育者Guardian_ID唯一性判断
	 */
	public function action_uniqueGuardianIDExists()
	{
		if ($this->request->is_ajax()){
			header('Content-type:text/json');
			$Guardian_ID = $_GET['fieldValue'];
			$ID = $_GET['fieldId'];
			
			$table = Cache::instance()->get('table_user_guardian');
			$result = Model::factory('userGuardian')->unique_userGuardianId_exists($Guardian_ID,$table,$ID);
			echo json_encode(array($ID,$result));
		}				
	}
	
	/**
	 * 10-6
	 * きょうだいの設定
	 */
	public function action_relationship()
	{		
		$model_child = Model::factory('child');		
		$allGroup = $model_child->getAllGroup();		
	
		$siblingOrder = Kohana::$config->load('parameter.siblingOrder');
		
		$body = View::factory('administration/relationship')
				->bind('allGroup',$allGroup)
				->bind('siblingOrder',$siblingOrder);
		
		$this->response->body($body);
	}
	
	
	/**
	 * 10-7
	 * きょうだいの設定
	 */
	public function action_setRelationship()
	{
		$group = array_key_exists('GROUP', $_GET)?$_GET['GROUP']:'';		
		$guardian1 = array_key_exists('guardian1', $_GET)?$_GET['guardian1']:'';		
		$model_child = Model::factory('child');
		
		$oldIDArr = array();
		if(!empty($group)){
			$childGroupList = $model_child->getGroupChild($group);
			foreach($childGroupList as $key => $val){
				$oldIDArr[] = $val['ID'];
			}
		}else{
			$childGroupList = array();
		}		
		$childNoGroupList = $model_child->getNoGroupChild($guardian1);
		
		$siblingOrder = Kohana::$config->load('parameter.siblingOrder');

		
		$body = View::factory('administration/setRelationship')
				->bind('childGroupList',$childGroupList)
				->bind('childNoGroupList',$childNoGroupList)				
				->bind('oldIDArr',$oldIDArr)
				->bind('guardian1',$guardian1)
				->bind('siblingOrder',$siblingOrder);
				View::bind_global('group',$group);
		
		$this->response->body($body);
	}
	
	/**
	 * きょうだいの設定 提交画面
	 * 10-7
	 * @return boolean
	 */
	public function action_relationshipUpdate()
	{
		$rst = Model::factory('child')->groupRelationshipUpdate($this->request->post());
		
		if($rst){
			$this->redirect('administration/relationship'.URL::query(array('GROUP'=>NULL,'guardian1'=>NULL))."#{$rst}");			
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('administration/setRelationship').URL::query())->execute();
			return FALSE;
		}	
	}
	
	
	/**
	 * 10-5系统参数设定画面
	 */
	public function action_dataSet() {		
		$model_Master=Model::factory('master');
		//时间列表
		$timeList=Public_Times::arriveLeaveList('06:30:00','23:00:00','G:i','600');
		//master_baseSet表    o
		$table_baseSet=Cache::instance()->get('table_master_baseset');
		$data_baseSet=$model_Master->getData($table_baseSet);
		//master_dataSet表    o
		$table_dataSet=Cache::instance()->get('table_master_dataset');
		$data_dataSet=$model_Master->getData($table_dataSet);
		//master_activitiesSet表   o
		$table_activitiesSet=Cache::instance()->get('table_master_activitiesset');
		$data_activitiesSet=$model_Master->getData($table_activitiesSet);
		//master_costSet_1表   o
		$table_costSet_1=Cache::instance()->get('table_master_costset_1');
		$data_costSet_1=$model_Master->getData($table_costSet_1);
		//master_costSet_23表   o
		$table_costSet_23=Cache::instance()->get('table_master_costset_23');
		$data_costSet_23=$model_Master->getData($table_costSet_23);
		//master_classSet表   o		
		$data_classSet=$model_Master->getClassList();
		//master_overCostSet表    o
		$table_overCostSet=Cache::instance()->get('table_master_overcostset');
		$data_overCostSet=$model_Master->getData($table_overCostSet);
		//master_projectCostSet表  o
		$table_projectCostSet=Cache::instance()->get('table_master_projectcostset');
		$data_projectCostSet=$model_Master->getData($table_projectCostSet);
		//master_goodsCostSet  o
		$table_goodsCostSet=Cache::instance()->get('table_master_goodscostset');
		$data_goodsCostSet=$model_Master->getData($table_goodsCostSet);
		//master_eatCostSet  o
		$table_eatCostSet=Cache::instance()->get('table_master_eatcostset');
		$data_eatCostSet=$model_Master->getData($table_eatCostSet);
		//master_kidsLessSet  o
		$table_kidsLessSet=Cache::instance()->get('table_master_kidslessset');
		$data_kidsLessSet=$model_Master->getData($table_kidsLessSet);
		//master_guardianCon
		$table_guardianCon=Cache::instance()->get('table_master_guardiancon');
		$data_guardianCon=$model_Master->getData($table_guardianCon);
		//master_temporary
		$table_temporary=Cache::instance()->get('table_master_temporary');
		$data_temporary=$model_Master->getData($table_temporary);
		//master_calendar
		$table_calendar=Cache::instance()->get('table_master_calendar');
		$data_calendar=$model_Master->getData($table_calendar);
	
		$body = View::factory('administration/dataSet')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('data_baseSet',$data_baseSet)
				->bind('data_dataSet',$data_dataSet)
				->bind('data_activitiesSet',$data_activitiesSet)
				->bind('data_costSet_1',$data_costSet_1)
				->bind('data_costSet_23',$data_costSet_23)
				->bind('data_classSet',$data_classSet)
				->bind('data_overCostSet',$data_overCostSet)
				->bind('data_projectCostSet',$data_projectCostSet)
				->bind('data_goodsCostSet',$data_goodsCostSet)
				->bind('data_eatCostSet',$data_eatCostSet)
				->bind('data_kidsLessSet',$data_kidsLessSet)
				->bind('data_guardianCon',$data_guardianCon)
				->bind('data_temporary',$data_temporary)
				->bind('data_calendar',$data_calendar)
				->bind('timeList', $timeList);
		$this->response->body($body);
	}
	
	/**
	 * 10-5参数设定保存
	 */
	public function action_dataSet_Insert(){
		if ($this->request->is_ajax()){
				
			$rst = Model::factory('master')->dataSet_Data($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	
	
	/**
	 * 管理者确认购买物品
	 */
	public function action_buyGoodsConfirm(){
	
		//待确认数据
		$model=Model::factory('master');
		$confirm_data=Model::factory('master')->getConfirmData(NULL);
		if(!empty($confirm_data)){
			$model_child = Model::factory('child');
			foreach ($confirm_data as $key=>$val){				
				$step1 = $model_child->step1_selectByKey($val['Child_1_Base_ID']);
				$step2 = $model_child->step2_selectByKey($val['Child_1_Base_ID']);				
				//孩子名
				$confirm_data[$key]['Child_Name'] =	empty($step1)?'':$step1['FamilyName'].$step1['GivenName'];
				//监护人名
				$confirm_data[$key]['Guardian_Name'] = empty($step2)?'':$step2['Guardian1_FamilyName'].$step2['Guardian1_GivenName'];
			}
		}
	
		$body = View::factory('administration/buyGoodsConfirm')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('confirm_Data',$confirm_data);
		$this->response->body($body);
			
	}
	
	public function action_confirmed(){	
		if(Model::factory('master')->confirmed($this->request)){
			Request::factory('postprompt/saveSuccess')->execute();
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('administration/dataSet'))->execute();
			return FALSE;
		}
	}
	
	/**
	 * 用品购买确认后列表
	 */
	public function action_confirmList(){
		
		$confirm_Year = Public_Times::yearWestAndJap(2016,2050,"");
		$current_Year = array_key_exists('Confirm_Year', $_GET)?$_GET['Confirm_Year']:date("Y");
		
		
		$model = Model::factory('master');
		$confirm_data=Model::factory('master')->getConfirmData('1',$current_Year);
		if(!empty($confirm_data)){
			$model_child = Model::factory('child');
			foreach ($confirm_data as $key=>$val){
				$step1 = $model_child->step1_selectByKey($val['Child_1_Base_ID']);
				$step2 = $model_child->step2_selectByKey($val['Child_1_Base_ID']);
				//孩子名
				$confirm_data[$key]['Child_Name'] = empty($step1)?'':$step1['FamilyName'].$step1['GivenName'];
				//监护人名
				$confirm_data[$key]['Guardian_Name'] = empty($step2)?'':$step2['Guardian1_FamilyName'].$step2['Guardian1_GivenName'];
			}
		}
	
		$body = View::factory('administration/goodsConfirmList')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('confirm_Year',$confirm_Year)
				->bind('current_Year',$current_Year)
				->bind('confirm_Data',$confirm_data);
		$this->response->body($body);
	}
	
	
	/**
	 * 认定分区的具体收费项目选择（10-8）
	 */
	public function action_recogProject(){
		$status=array_key_exists('Status', $_GET)?$_GET['Status']:'in';
	
		$list=Model::factory('master')->getList($status);
		foreach ($list as $key=>$val){
			$list[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$list[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$list[$key]['YearJap_Birth'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			$list[$key]['YearJap_Enter'] = Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
		}
	
		$body = View::factory('administration/recogProject')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('status',$status)
				->bind('list',$list);
				$this->response->body($body);
	
	}
	
	public function action_RecogPro_Insert(){		
		if ($this->request->is_ajax()){
			$rst= Model::factory('master')->recogProject_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 公告板信息（10-10）
	 */
	public function action_noticeBoard(){
		$notice=Model::factory('master')->getNoticeBoard();
			
		$body = View::factory('administration/noticeBoard')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('notice',$notice);
		$this->response->body($body);
	}
	
	public function action_noticeBoard_Insert()
	{
		if ($this->request->is_ajax()){
			$rst= Model::factory('master')->noticeBoard_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 10-15 认定分区设定
	 */
	public function action_recogSet(){
	
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
	
		$status=array_key_exists('Status', $_GET)?$_GET['Status']:'in';
	
		$list=Model::factory('master')->getList($status);
		foreach ($list as $key=>$val){
			$list[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$list[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$list[$key]['YearJap_Birth'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			$list[$key]['YearJap_Enter'] = Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
		}
	
		$body = View::factory('administration/recogSet')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('status',$status)
				->bind('list',$list)
				->bind('days',$days)
				->bind('months',$months);
		$this->response->body($body);
	}
	
	public  function action_recogSet_Insert(){
		if ($this->request->is_ajax()){
			$rst= Model::factory('master')->recogSet_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 10-14 園児情報編集の申請履歴一覧
	 */
	public function action_applicationList(){
		//年份列表
		$years = Public_Times::yearWestAndJap(2000,2050,"");
	
		$current_Year = array_key_exists('year', $_GET)?$_GET['year']:date("Y");
	
		$list=Model::factory('communication')->getApplication($current_Year);
	
		$body = View::factory('administration/applicationList')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('years',$years)
					->bind('current_Year',$current_Year)
					->bind('list',$list);
		$this->response->body($body);
	}
	
	
	/*
	 * 读取所有员工信息
	*/
	public function action_staffInfoList(){
	
		$staffInfoList=Model::factory('staffInfo')->getStaffList();
	
		$body = View::factory('administration/staffInfoList')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('staffList',$staffInfoList);
		$this->response->body($body);
	}
	
	/*
	 * 添加员工信息
	*/
	public function action_addStaff(){
		$model = Model::factory('staffInfo');
	
		$result = $model->staffUpdate($this->request);
	
		echo json_encode($result);
	}
	
	/*
	 * 删除员工信息
	*/
	public function action_delStaff(){
	
		$model = Model::factory('staffInfo');
		$ID_Arr = array_filter(explode(';', $this->request->post('ID')));
	
		if(empty($ID_Arr)){
			$json = array('result'=>false);
		}else{

			$json['result'] = $model->delStaff($ID_Arr);
		}
		echo json_encode($json);
	}
	
	
	/**
	 * 10-16,10-17考勤ID设定
	 */
	public function action_attendanceIdSet(){
	
		$status=array_key_exists('Status', $_GET)?$_GET['Status']:'in';
		
		$list=Model::factory('master')->getList($status);
		foreach ($list as $key=>$val){
			$list[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$list[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$list[$key]['YearJap_Birth'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			$list[$key]['YearJap_Enter'] = Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
		}
	
		$body = View::factory('administration/attendanceIdSet')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('status',$status)
				->bind('list',$list);
		$this->response->body($body);
	}
	
	public function action_attendanceId_insert(){
		if ($this->request->is_ajax()){	
			$rst = Model::factory('child')->attendanceId_insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	public function action_mint(){
		$body = View::factory('administration/mint')
					->set('CLASS',Kohana::$config->load('parameter.BASE_INFO.CLASS'));
		$this->response->body($body);
						
	}
	
	/**
	 * （10-18）
	 */
	public function action_capitalSet(){
	
		$status=array_key_exists('Status', $_GET)?$_GET['Status']:'in';
	
		$list=Model::factory('master')->getList($status);
		foreach ($list as $key=>$val){
			$list[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$list[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$list[$key]['YearJap_Birth'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			$list[$key]['YearJap_Enter'] = Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
		}
	
		$body = View::factory('administration/capitalSet')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('status',$status)
					->bind('list',$list);
		$this->response->body($body);
	
	}	
	
	public function action_capitalSet_Insert(){
		if ($this->request->is_ajax()){
			$rst= Model::factory('master')->capitalSet_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * child/step1
	 * 保険証コピーの添付
	 * 打开画面
	 */
	public function action_goodsImages()
	{
		if(array_key_exists('goodsPic',$_GET)){
			$goodsPic = $_GET['goodsPic'];			
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
		
		$gp_l = array_filter(explode(';', $goodsPic));

		$sp = Session::instance()->get('goodsPic');
		if(!empty($sp)){
			$sp_l = array_filter(explode(';', $sp));
			$fl = array_unique(array_merge($sp_l,$gp_l));
			Session::instance()->set('goodsPic','');
			$this->redirect('administration/goodsImages'.URL::query(array('goodsPic'=>implode(';',$fl))));
			exit;
		}	
		$body = View::factory('administration/goodsImages')
					->bind('fileList',$gp_l);
		$this->response->body($body);
	}
	
	/**
	 * child/step1
	 * 保険証コピーの添付
	 * 删除已经上传的文件
	 */
	public function action_delGoodsImages()
	{
		$img = $this->request->post('img');
		$delImg =  Kohana::$config->load('global.base_url')."/media/uploadfile/goodsImages/".$img;
		$result = array('del'=>false);
		if(file_exists($delImg)){
			if (unlink($delImg)){
				$p_l = array_filter(explode(';', $_GET['goodsPic']));
				$p_l = array_diff($p_l, array($img));				
				$result = array('del'=>TRUE,'src'=>URL::site('administration/goodsImages').URL::query(array('goodsPic'=>implode(';',$p_l))));
			}
		}
		echo json_encode($result);
	}
	
	
	/**
	 * administration/dataset
	 * 保険証コピーの添付
	 * 保存上传文件
	 */
	public function action_saveGoodsImages(){	
		$dir = Kohana::$config->load('global.base_url')."/media/uploadfile/goodsImages/";
		if(!is_dir($dir)){
			mkdir($dir,0777,TRUE);
		}
		
		$image = Image::factory($_FILES['file']['tmp_name']);
		list($usec, $sec) = explode(" ", microtime());
		list($zero,$num) = explode(".", $usec);
		$nameList = explode('.',$_FILES['file']['name']);
		$hz = array_pop($nameList);
		$imageName = $sec.$num.'.'.$hz;
		$sp = Session::instance()->get('goodsPic');
		$sp .= empty($sp)?$imageName:';'.$imageName;
		Session::instance()->set('goodsPic',$sp);		
		$image->resize(400, 400, Image::AUTO)->rotate($this->request->post('rotation'))->save($dir.$imageName);
	}
	
	
	/**
	 * 19 考勤机信息登录
	 */
	public function action_machine_info(){
	
		$machine_Info=Model::factory('master')->getMachineInfo();
		$body = View::factory('administration/machine')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('machine_Info',$machine_Info);
		$this->response->body($body);	
	}
	
	public function action_machine_insert(){
		if ($this->request->is_ajax()){			
       		$rst= Model::factory('master')->machine_insert($this->request);
       		echo  json_encode(array('result'=>$rst));
		}	
	}
	
	/**
	 * 全園児請求一覧(22-1)
	 */
	public function action_invoiceAll(){
		
		if(array_key_exists('yearMon',$_GET)){
			$yearMon = $_GET['yearMon'];
		}else{
			$yearMon = date('Y-m');
		}
		//年月的选择框列表
		$months = Public_Times::getMonthList("m","");
		$years = Public_Times::yearWestAndJap('1980','2050');
		
		$child_Info=Model::factory('master')->getInvoiceAll($yearMon);
		foreach ($child_Info as $key_child => $val_child){
			$activitiesCheckedIDArr = array();
			if(empty($val_child['invoiceInfo'])){
				$tmpCheck = explode(';', $val_child['Activities']);
				for($i=1;$i<6;$i++){
					if(in_array($i,$tmpCheck)){
						if(!empty($val_child['Activities_Date_'.$i])){
							if(substr($val_child['Activities_Date_'.$i], 0,7)<=$yearMon){
								$activitiesCheckedIDArr[]=$i;
							}
						}
					}
				}						
			}
			$child_Info[$key_child]['activitiesCheckedIDArr']=$activitiesCheckedIDArr;
		}
		//print_r($child_Info);
		//exit();
		
		
		$body = View::factory('administration/invoiceAll')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('years',$years)
					->bind('months',$months)
					->bind('yearMon',$yearMon)
					->bind('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	public function action_invoiceAll_insert(){
		if ($this->request->is_ajax()){
			//$rst=$this->request->post();
			$rst= Model::factory('master')->invoiceAll_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 全園児請求一覧PDF(22-2)
	 */
	public function action_invoiceAllPDF(){
		if(array_key_exists('yearMon',$_GET)&&!empty($_GET['yearMon'])){
			$yearMon = $_GET['yearMon'];
			list($Y,$m) = explode('-',$yearMon);

			$parameter=Kohana::$config->load('parameter');
			
			$child_Info=Model::factory('master')->getInvoiceAll($yearMon);
			$tmp_child_Info=array();
			
			//计算总和
			$sum=array(
					'Base_MonCost'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Base_OverCost'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Base_ProjectCost'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_0'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_1'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_2'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_3'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_4'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_5'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_6'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Projects_cost_7'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Activity_Cost_1'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Activity_Cost_2'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Activity_Cost_3'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'Activity_Cost_4'=>array('R1'=>'0','R2'=>'0','R3'=>'0'),
					'All'=>array('R1'=>'0','R2'=>'0','R3'=>'0')
			);
			
			$total=0;
			
			//将学生按照班级分类
			foreach ($parameter['BASE_INFO']['CLASS'] as $key_C =>$val_C){
				$tmp_child_Info[$key_C]=array();
				foreach ($child_Info as $key_child => $val_child){
										
					if($val_child['Class']==$key_C){
						
						$projects_cost=array(0,0,0,0,0,0,0,0);
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
						}
							
						$all='0';
						if(!empty($val_child['invoiceInfo'])){
							$all += $val_child['invoiceInfo']['Base_MonCost'];
							$all += $val_child['invoiceInfo']['Base_OverCost'];
							$all += $val_child['invoiceInfo']['Base_ProjectCost'];
							$all += $projects_cost[0];
							$all += $projects_cost[1];
							$all += $projects_cost[2];
							$all += $projects_cost[3];
							$all += $projects_cost[4];
							$all += $projects_cost[5];
							$all += $projects_cost[6];
							$all += $projects_cost[7];
							$all += $projects_cost[8];
							$all += $val_child['invoiceInfo']['Activity_PricePerM_1'];
							$all += $val_child['invoiceInfo']['Activity_PricePerM_2'];
							$all += $val_child['invoiceInfo']['Activity_PricePerM_3'];
							$all += $val_child['invoiceInfo']['Activity_PricePerM_4'];
						}
						$child_Info[$key_child]['ALL']=$all;
						//所有总计
						$total +=$all;
																		
						$tmp_child_Info[$key_C][]=$child_Info[$key_child];
					}																				
				}
			}
			
			//每个认定分区总计
			foreach ($child_Info as $key_c => $val_c){
				$projects_cost=array();
				if(!empty($val_c['invoiceInfo'])){
					$projects_cost=explode(';', $val_c['invoiceInfo']['Base_Projects_Cost']);					
				}
												
				if($val_c['Recog_Type']=='R1'){
					$sum['Base_MonCost']['R1']        +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_MonCost'];
					$sum['Base_OverCost']['R1']       +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_OverCost'];
					$sum['Base_ProjectCost']['R1']    +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_ProjectCost'];
					$sum['Projects_cost_0']['R1']     +=empty($projects_cost)?'0':$projects_cost[0];
					$sum['Projects_cost_1']['R1']     +=empty($projects_cost)?'0':$projects_cost[1];
					$sum['Projects_cost_2']['R1']     +=empty($projects_cost)?'0':$projects_cost[2];
					$sum['Projects_cost_3']['R1']     +=empty($projects_cost)?'0':$projects_cost[3];
					$sum['Projects_cost_4']['R1']     +=empty($projects_cost)?'0':$projects_cost[4];
					$sum['Projects_cost_5']['R1']     +=empty($projects_cost)?'0':$projects_cost[5];
					$sum['Projects_cost_6']['R1']     +=empty($projects_cost)?'0':$projects_cost[6];
					$sum['Projects_cost_7']['R1']     +=empty($projects_cost)?'0':$projects_cost[7];
					$sum['Projects_cost_7']['R1']     +=empty($projects_cost)?'0':$projects_cost[8];
					$sum['Activity_Cost_1']['R1']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_1'];
					$sum['Activity_Cost_2']['R1']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_2'];
					$sum['Activity_Cost_3']['R1']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_3'];
					$sum['Activity_Cost_4']['R1']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_4'];
					$sum['All']['R1']= $sum['Base_MonCost']['R1']+$sum['Base_OverCost']['R1']+$sum['Base_ProjectCost']['R1']+$sum['Projects_cost_0']['R1'] +$sum['Projects_cost_1']['R1'] +$sum['Projects_cost_2']['R1'] 
										+$sum['Projects_cost_3']['R1'] +$sum['Projects_cost_4']['R1'] +$sum['Projects_cost_5']['R1'] +$sum['Projects_cost_6']['R1'] +$sum['Projects_cost_7']['R1'] +$sum['Activity_Cost_1']['R1']
										+$sum['Activity_Cost_2']['R1']+$sum['Activity_Cost_3']['R1']+$sum['Activity_Cost_4']['R1'];		
				}
				if($val_c['Recog_Type']=='R2'||$val_c['Recog_Type']=='R2S'){
					$sum['Base_MonCost']['R2']        +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_MonCost'];
					$sum['Base_OverCost']['R2']       +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_OverCost'];
					$sum['Base_ProjectCost']['R2']    +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_ProjectCost'];
					$sum['Projects_cost_0']['R2']     +=empty($projects_cost)?'0':$projects_cost[0];
					$sum['Projects_cost_1']['R2']     +=empty($projects_cost)?'0':$projects_cost[1];
					$sum['Projects_cost_2']['R2']     +=empty($projects_cost)?'0':$projects_cost[2];
					$sum['Projects_cost_3']['R2']     +=empty($projects_cost)?'0':$projects_cost[3];
					$sum['Projects_cost_4']['R2']     +=empty($projects_cost)?'0':$projects_cost[4];
					$sum['Projects_cost_5']['R2']     +=empty($projects_cost)?'0':$projects_cost[5];
					$sum['Projects_cost_6']['R2']     +=empty($projects_cost)?'0':$projects_cost[6];
					$sum['Projects_cost_7']['R2']     +=empty($projects_cost)?'0':$projects_cost[7];
					$sum['Projects_cost_7']['R2']     +=empty($projects_cost)?'0':$projects_cost[8];
					$sum['Activity_Cost_1']['R2']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_1'];
					$sum['Activity_Cost_2']['R2']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_2'];
					$sum['Activity_Cost_3']['R2']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_3'];
					$sum['Activity_Cost_4']['R2']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_4'];
					$sum['All']['R2']= $sum['Base_MonCost']['R2']+$sum['Base_OverCost']['R2']+$sum['Base_ProjectCost']['R2']+$sum['Projects_cost_0']['R2'] +$sum['Projects_cost_1']['R2'] +$sum['Projects_cost_2']['R2']
										+$sum['Projects_cost_3']['R2'] +$sum['Projects_cost_4']['R2'] +$sum['Projects_cost_5']['R2'] +$sum['Projects_cost_6']['R2'] +$sum['Projects_cost_7']['R2'] +$sum['Activity_Cost_1']['R2']
										+$sum['Activity_Cost_2']['R2']+$sum['Activity_Cost_3']['R2']+$sum['Activity_Cost_4']['R2'];
				}
				if($val_c['Recog_Type']=='R3'||$val_c['Recog_Type']=='R3S'){
					$sum['Base_MonCost']['R3']        +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_MonCost'];
					$sum['Base_OverCost']['R3']       +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_OverCost'];
					$sum['Base_ProjectCost']['R3']    +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Base_ProjectCost'];
					$sum['Projects_cost_0']['R3']     +=empty($projects_cost)?'0':$projects_cost[0];
					$sum['Projects_cost_1']['R3']     +=empty($projects_cost)?'0':$projects_cost[1];
					$sum['Projects_cost_2']['R3']     +=empty($projects_cost)?'0':$projects_cost[2];
					$sum['Projects_cost_3']['R3']     +=empty($projects_cost)?'0':$projects_cost[3];
					$sum['Projects_cost_4']['R3']     +=empty($projects_cost)?'0':$projects_cost[4];
					$sum['Projects_cost_5']['R3']     +=empty($projects_cost)?'0':$projects_cost[5];
					$sum['Projects_cost_6']['R3']     +=empty($projects_cost)?'0':$projects_cost[6];
					$sum['Projects_cost_7']['R3']     +=empty($projects_cost)?'0':$projects_cost[7];
					$sum['Projects_cost_7']['R3']     +=empty($projects_cost)?'0':$projects_cost[8];
					$sum['Activity_Cost_1']['R3']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_1'];
					$sum['Activity_Cost_2']['R3']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_2'];
					$sum['Activity_Cost_3']['R3']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_3'];
					$sum['Activity_Cost_4']['R3']	  +=empty($val_c['invoiceInfo'])?'0':$val_c['invoiceInfo']['Activity_PricePerM_4'];
					$sum['All']['R3']= $sum['Base_MonCost']['R3']+$sum['Base_OverCost']['R3']+$sum['Base_ProjectCost']['R3']+$sum['Projects_cost_0']['R3'] +$sum['Projects_cost_1']['R3'] +$sum['Projects_cost_2']['R3']
										+$sum['Projects_cost_3']['R3'] +$sum['Projects_cost_4']['R3'] +$sum['Projects_cost_5']['R3'] +$sum['Projects_cost_6']['R3'] +$sum['Projects_cost_7']['R3'] +$sum['Activity_Cost_1']['R3']
										+$sum['Activity_Cost_2']['R3']+$sum['Activity_Cost_3']['R3']+$sum['Activity_Cost_4']['R3'];
				}				
			}
			$sum['total']=$total;
			
			//print_r($sum);
			//exit();
			unset($child_Info);
			$html = (string)View::factory('administration/invoiceAllPDF')
								->bind('parameter',$parameter)
								->bind('yearMon',$yearMon)
								->bind('child_Info',$tmp_child_Info)
								->bind('sum',$sum);
			//echo $html;exit;
			
			//释放内存数据
			unset($tmp_child_Info);
			unset($parameter);
			unset($sum);
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
		
			$mpdf=new mPDF('ja','A2-L',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		
		
			$mpdf->WriteHTML($html,0);
		
			$mpdf->Output('全園児請求一覧フォーマット.pdf','I');
			exit;
		}
		
	}
	
	public function action_capitalCSV(){
		
		if(array_key_exists('yearMon',$_GET)&&!empty($_GET['yearMon'])){
			$yearMon = $_GET['yearMon'];
			
			$parameter=Kohana::$config->load('parameter');
				
			$child_Info=Model::factory('master')->getInvoiceAll($yearMon);
			
			foreach ($child_Info as $key_child => $val_child){
						
				$projects_cost=array(0,0,0,0,0,0,0,0);
				if(!empty($val_child['invoiceInfo'])){
					$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
				}							
				$all='0';
				if(!empty($val_child['invoiceInfo'])){
					$all += $val_child['invoiceInfo']['Base_MonCost'];
					$all += $val_child['invoiceInfo']['Base_OverCost'];
					$all += $val_child['invoiceInfo']['Base_ProjectCost'];
					$all += $projects_cost[0];
					$all += $projects_cost[1];
					$all += $projects_cost[2];
					$all += $projects_cost[3];
					$all += $projects_cost[4];
					$all += $projects_cost[5];
					$all += $projects_cost[6];
					$all += $projects_cost[7];
					$all += $projects_cost[8];
					$all += $val_child['invoiceInfo']['Activity_PricePerM_1'];
					$all += $val_child['invoiceInfo']['Activity_PricePerM_2'];
					$all += $val_child['invoiceInfo']['Activity_PricePerM_3'];
					$all += $val_child['invoiceInfo']['Activity_PricePerM_4'];
				}
				$child_Info[$key_child]['ALL']=$all;					
			}
			
			$csvContent='キャピタル番号,合計'."\n";
			foreach ($child_Info as $k=>$v){
				$csvContent .=$v['Capital_ID'].','.$v['ALL']."\n";
			}	
						
			header("Content-Type: application/vnd.ms-excel; charset=utf-8");
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=subcontract.csv ");
			header("Content-Transfer-Encoding: binary ");
				
			$csvContent = mb_convert_encoding($csvContent,"Shift_JIS","utf-8");
			//$csvContent = iconv("utf-8","gbk",$csvContent);
			echo $csvContent;
			exit;
		}								
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}