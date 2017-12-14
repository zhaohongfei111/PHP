<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Child extends Controller_Sellevel {	
	
	/**
	 * 新规的时候获取新的child_id
	 */
	public function action_getNewChildId()
	{
		if ($this->request->is_ajax()){
			$Y = $this->request->post('Y');
			echo  Model::factory('child')->getNewChildId($Y);
		}		
	}
	
	public function action_autolock(){
		if ($this->request->is_ajax()){			
			if($this->customerType=='Admin'){
				$user_ID = Session::instance()->get('USERID');
			}else{
				$user_ID = Session::instance()->get('Guardian_ID');
			}			
			$Child_ID = $this->request->post('Child_Id');
			Model::factory('child')->lockChildID($Child_ID,$user_ID);
			echo json_encode(array('lock'=>true));
		}else{
			echo json_encode(array('lock'=>false));
		}
	}
	
	
	/**
	 * 判断child_id 唯一性
	 */
	public function action_uniqueChildidExists()
	{

		if ($this->request->is_ajax()){
			header('Content-type:text/json');
			
			if($this->customerType=='Admin'){
				$user_ID = Session::instance()->get('USERID');
			}else{
				$user_ID = Session::instance()->get('Guardian_ID');
			}
			
			$Child_Id = $_GET['fieldValue'];
			$ID = $_GET['fieldId'];	
			sleep(2);			
			$model_child = Model::factory('child');
			$result1 = $model_child->unique_childid_exists($Child_Id,$ID);
			$result2 = $model_child->isUnLockChildID($Child_Id,$user_ID);			
			$result = $result1&&$result2?TRUE:FALSE;
			echo json_encode(array($ID,$result));
		}
		
	}
	
	/**
	 * Guardian
	 * 编辑小孩一览 
	 */
	public function action_sel(){
		if($this->customerType=='Guardian'){
			$Guardian_ID = Session::instance()->get('Guardian_ID');
			$model_child = Model::factory('child');
			$child = $model_child->step1_selectByChildId($Guardian_ID);

			//如果不存在这个
			if(empty($child)){
				Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
				exit;
			}
			
			if(!empty($child['group'])){
				$childGroupList = $model_child->getGroupChild($child['group']);
			}else{
				$childGroupList = array($child);
			}
			//增加一个session 记录哪些孩子这个人可以操作
			$canEditId = '';
			foreach ($childGroupList as $key => $val){
				$canEditId .= $key==0?$val['ID']:'#'.$val['ID'];
			}			
			Session::instance()->set('canEditId',$canEditId);
			
			$body = View::factory('child/sel')
					->bind('childGroupList',$childGroupList);
			$this->response->body($body);
		}
	}
	
	/**
	 * step1
	 */
	public function action_step1()
	{
		$model_child =  Model::factory('child');
		//数据不满足验证条件，从返回页面自动填写数据
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
			$Child_Id = $oldPost['txt_Child_Id'];
		//更新使用
		}elseif(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$child_Info = $model_child->step1_selectByKey($_GET['ID']);
			//如果数据不存在就报错
			if(empty($child_Info)){
				Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
				exit;
			}
			$Child_Id = $child_Info['Child_Id'];
		//新规
		}else{		
			if($this->customerType=='Guardian'){				
				$Guardian_ID = Session::instance()->get('Guardian_ID');	
				$tmp_Info = $model_child->step1_selectByChildId($Guardian_ID);
				/**
				 *  家长用户  如果添加第一个孩子则学号为账号
				 *  如果添加第二个孩子  第二个孩子学号自动连番 包括孩子表child_1_base 和     user_guardian
				 */
				if(empty($tmp_Info)){
					$Child_Id = $Guardian_ID;
				}else{			
					$Child_Id = $model_child->getNewChildId(date('Y'));
				}
			}else{
				$Child_Id = $model_child->getNewChildId(date('Y'));
			}
		}
		
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			//認定区分
			$childRecog = $model_child->getChildRecog($_GET['ID']);
						
			$img = Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/".$_GET['ID'].'.jpg';
			$img = file_exists($img)?URL::base().'media/uploadfile/childPictures/'.$_GET['ID'].'.jpg':'';
		}
		
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
		$arriveList = Public_Times::arriveLeaveList();
		$leaveList =Public_Times::arriveLeaveList("13:00:00","19:30:00","G:i","600");
		//课外活动列表
		$activities = Model::factory('master')->getEffectiveActivities();
		//master_classSet表   o
		$data_classSet = Model::factory('master')->getClassList();
		
		$body = View::factory('child/step1');		
				View::set_global('parameter',Kohana::$config->load('parameter'));
				View::bind_global('child_Info',$child_Info);	
				View::bind_global('months',$months);
				View::bind_global('days',$days);
				View::bind_global('arriveList',$arriveList);
				View::bind_global('leaveList',$leaveList);
				View::bind_global('oldPost',$oldPost);
				View::bind_global('Child_Id',$Child_Id);
				View::bind_global('childRecog', $childRecog);
				View::bind_global('activities', $activities);
				View::bind_global('data_classSet', $data_classSet);
				View::bind_global('img',$img);
				View::bind_global('customerType',$this->customerType);
		$this->response->body($body);
	}
	
	public function action_step1_insert()
	{
		$rst = Model::factory('child')->step1_Data1($this->request);
		if($rst){
			if($this->request->post('halfwaySave')=='False'){
				 $this->redirect('child/step2'.URL::query(array('ID'=>$rst,'fileRand'=>NULL)));
			}else{
				Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step1').URL::query(array('ID'=>$rst,'fileRand'=>NULL)))->execute();
			}
		}
	}
	
	/**
	 * step2
	 * 
	 */
	public function action_step2()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
		}elseif(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<2){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}			
			$child_Info = $model_child->step2_selectByKey($_GET['ID']);
			
			//step2 中家族の状況 不可以和$info_Step2 合并
			$child_family_status_list = $model_child->familyStatusList($_GET['ID']);
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}		
		
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
		$arriveList_2 = Public_Times::arriveLeaveList("00:00:00","23:30:00","G:i","1800");
		$leaveList_2 = $arriveList_2;//Public_Times::arriveLeaveList("00:00:00","23:30:00","G:i","1800");
		
		$body = View::factory('child/step2');		
				View::set_global('parameter',Kohana::$config->load('parameter'));
				View::set_global('ID',$_GET['ID']);
				View::bind_global('child_Info',$child_Info);
				View::bind_global('child_family_status_list',$child_family_status_list);
				View::bind_global('months',$months);
				View::bind_global('days',$days);
				View::bind_global('arriveList_2',$arriveList_2);
				View::bind_global('leaveList_2',$leaveList_2);
				View::bind_global('oldPost',$oldPost);
		
		$this->response->body($body);
	}
	
	public function action_step2_insert()
	{
		if(Model::factory('child')->step2_Data($this->request)){
			if($this->request->post('halfwaySave')=='False'){
				 $this->redirect('child/step3'.URL::query());
			}else{
				 Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step2').URL::query())->execute();
			}
		}
		
	}
	
	
	/**
	 * step3
	 */
	
	public function action_step3()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
		}elseif(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<3){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}			
			$child_Info = Model::factory('child')->step3_selectByKey($_GET['ID']);
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
						
		
		$months =Public_Times::getMonthList("m","");
		$body = View::factory('child/step3');
					View::set_global('parameter',Kohana::$config->load('parameter'));
					View::set_global('ID',$_GET['ID']);
					View::bind_global('months',$months);
					View::bind_global('child_Info',$child_Info);
					View::bind_global('oldPost',$oldPost);
		$this->response->body($body);	
	
	}
	
	public function action_step3_insert()
	{
		if(Model::factory('child')->step3_Data($this->request)){
			if($this->request->post('halfwaySave')=='False'){
				 $this->redirect('child/step4'.URL::query());
			}else{
				 Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step3').URL::query())->execute();
			}
		}	
	}
	
	
	/**
	 * step4
	 */
	public function action_step4()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
		}elseif (array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<4){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			$child_Info = $model_child->step4_selectByKey($_GET['ID']);
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}		
		
		$body = View::factory('child/step4');
				View::set_global('parameter',Kohana::$config->load('parameter'));
				View::set_global('ID',$_GET['ID']);
				View::bind_global('oldPost',$oldPost);
				View::bind_global('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	public function action_step4_insert()
	{
		if(Model::factory('child')->step4_Data($this->request)){
			if($this->request->post('halfwaySave')=='False'){
				$this->redirect('child/step5'.URL::query());
			}else{
				Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step4').URL::query())->execute();
			}
		}
	
	}
	
	
	/**
	 * step5
	 */
	public function action_step5()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
		}elseif(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){			
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<5){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			$child_Info = $model_child->step5_selectByKey($_GET['ID']);
			
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}		
		
		$months =Public_Times::getMonthList("m","");
		$eat_Snacks_Time =Public_Times::arriveLeaveList("09:00:00","18:00:00","G:i","1800");				
		$sleepWakeTimeList = Public_Times::arriveLeaveList("05:00:00","10:00:00","G:i","1800");
		$sleepSleepTimeList = Public_Times::arriveLeaveList("19:00:00","24:00:00","G:i","1800");
		
		$body = View::factory('child/step5');
				View::set_global('parameter',Kohana::$config->load('parameter'));
				View::set_global('ID',$_GET['ID']);
				View::bind_global('oldPost',$oldPost);
				View::bind_global('child_Info',$child_Info);
				View::bind_global('months',$months);
				View::bind_global('eat_Snacks_Time',$eat_Snacks_Time);
				View::bind_global('sleepWakeTimeList',$sleepWakeTimeList);
				View::bind_global('sleepSleepTimeList',$sleepSleepTimeList);
		$this->response->body($body);
	}
	
	public function action_step5_insert()
	{
	if(Model::factory('child')->step5_Data($this->request)){
			if($this->request->post('halfwaySave')=='False'){
				$this->redirect('child/step6'.URL::query());
			}else{
				Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step5').URL::query())->execute();
			}
		}
	}
	
	
	/**
	 * step6
	 */
	public function action_step6()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
		}elseif(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){			
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<6){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			$child_Info = $model_child->step6_selectByKey($_GET['ID']);
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
		
		$body = View::factory('child/step6');
				View::set_global('ID',$_GET['ID']);
				View::bind_global('oldPost',$oldPost);
				View::bind_global('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	public function action_step6_insert()
	{
		if(Model::factory('child')->step6_Data($this->request)){
			if($this->request->post('halfwaySave')=='False'){
				$this->redirect('child/step7'.URL::query());
			}else{
				Request::factory('postprompt/halfwaySaveSuccess')->post('url',URL::site('child/step6').URL::query())->execute();
			}
		}
	}
	
	
	/**
	 * step7
	 */
	public function action_step7()
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
			self::stepAllData();
		}elseif (array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<7){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			self::stepAllData($_GET['ID']);
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
		$body = View::factory('child/step7');				
				View::bind_global('oldPost',$oldPost);
		$this->response->body($body);	
	}
	
	
	/**
	 * step7
	 */
	public function action_step7_insert()
	{
		$model_child = Model::factory('child');
		$setbacksNum = $model_child->getSetbacksNum($this->request->post('txt_ID'));
		if($setbacksNum!=7){
			Request::factory('postprompt/postError')->post('errors',array("異常操作不可。"))->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
			return false;
		}
		
		if($model_child->step7_Data($this->request)){
			$this->redirect('child/step8'.URL::query());			
		}	
	}
	
	public function action_step8(){
		//判断step是否已经完成
		$setbacksNum = Model::factory('child')->getSetbacksNum($_GET['ID']);
		if($setbacksNum<8){
			Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
			exit;
		}
		$this->response->body(View::factory('child/step8'));
	}
	
	
	public function action_step11(){		
		if (array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<8&&$this->SELLEVEL != "Reader"){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			self::stepAllData($_GET['ID']);
		}else{
			//跳转到来的画面
			Request::factory('postprompt/notData')->post('url',URL::site('index/index'))->execute();
			exit;
		}
		
		$body = View::factory('child/step11');
		$this->response->body($body);
	}
	
	public function action_step12(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$oldPost = $this->request->post();
			self::stepAllData();
		}elseif (array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');
			//判断step是否已经完成
			$setbacksNum = $model_child->getSetbacksNum($_GET['ID']);
			if($setbacksNum<8){
				Request::factory('postprompt/illegally')->post('url',URL::site('child/step'.$setbacksNum).URL::query())->execute();
				exit;
			}
			self::stepAllData($_GET['ID']);
		}else{
			//跳转到来的画面
			Request::factory('postprompt/notData')->post('url',URL::site('index/index'))->execute();
			exit;
		}
	
		$body = View::factory('child/step12');
		$this->response->body($body);
	}
	
	public function action_step12_insert(){
		if ($this->request->is_ajax()){
			$rst = Model::factory('child')->step12_Data($this->request);
			echo  json_encode(array('result'=>$rst));
		}	
	}
	
	public function action_step13(){
		if (array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$model_child = Model::factory('child');			
			self::stepAllData($_GET['ID']);
			$body = View::factory('child/step13');
			$this->response->body($body);
		}
	}
	
	
	private function stepAllData(){		
		if(func_num_args()==1){
			$ID = func_get_arg(0);
			$model_child = Model::factory('child');
			
			$info_Step1= $model_child->step1_selectByKey($ID);
			$info_Step2= $model_child->step2_selectByKey($ID,$this->request);
			$info_Step3= $model_child->step3_selectByKey($ID,$this->request);
			$info_Step4= $model_child->step4_selectByKey($ID,$this->request);
			$info_Step5= $model_child->step5_selectByKey($ID,$this->request);
			$info_Step6= $model_child->step6_selectByKey($ID);
			$child_Info= array_merge($info_Step1,$info_Step2,$info_Step3,$info_Step4,$info_Step5,$info_Step6);
			//step2 中家族の状況 不可以和$info_Step2 合并
			$child_family_status_list = $model_child->familyStatusList($_GET['ID']);
			
			//認定区分
			$childRecog = $model_child->getChildRecog($ID);			
			$img = Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/".$ID.'.jpg';
			$img = file_exists($img)?URL::base().'media/uploadfile/childPictures/'.$ID.'.jpg':'';
		}else{
			$ID = '';
		}
		
		
		$months =Public_Times::getMonthList("m","");
		
		$days = Public_Times::getDaysList("","","d","");
		$arriveList = Public_Times::arriveLeaveList();
		$eat_Snacks_Time =Public_Times::arriveLeaveList("09:00:00","18:00:00","G:i","1800");
		$leaveList =Public_Times::arriveLeaveList("13:00:00","19:30:00","G:i","600");
		$sleepWakeTimeList = Public_Times::arriveLeaveList("05:00:00","10:00:00","G:i","1800");
		$sleepSleepTimeList = Public_Times::arriveLeaveList("19:00:00","24:00:00","G:i","1800");		
		$arriveList_2 = Public_Times::arriveLeaveList("00:00:00","23:30:00","G:i","1800");
		$leaveList_2 = $arriveList_2;//Public_Times::arriveLeaveList("00:00:00","23:30:00","G:i","1800");
		//课外活动列表
		$activities = Model::factory('master')->getEffectiveActivities();
		//master_classSet表   o
		$data_classSet = Model::factory('master')->getClassList();
		
		View::set_global('parameter',Kohana::$config->load('parameter'));
		View::set_global('ID',$ID);
		View::bind_global('child_Info',$child_Info);
		View::bind_global('child_family_status_list',$child_family_status_list);
		View::bind_global('childRecog',$childRecog);
		View::bind_global('img',$img);
		View::bind_global('months',$months);
		View::bind_global('days',$days);
		View::bind_global('eat_Snacks_Time',$eat_Snacks_Time);
		View::bind_global('arriveList',$arriveList);
		View::bind_global('leaveList',$leaveList);		
		View::bind_global('arriveList_2',$arriveList_2);
		View::bind_global('leaveList_2',$leaveList_2);		
		View::bind_global('sleepWakeTimeList',$sleepWakeTimeList);
		View::bind_global('sleepSleepTimeList',$sleepSleepTimeList);
		View::bind_global('activities',$activities);
		View::bind_global('data_classSet',$data_classSet);
	}
	
	public function action_calendar()
	{		
		$body = View::factory('child/calendar');
		$this->response->body($body);		
	}
	
	
	/**
	 * 要录作成
	 *
	 */
	public function action_summary() {
		
		$notDataBackUrl = URL::site('list/listAll');
		if(array_key_exists('from', $_GET)) $notDataBackUrl = URL::site($_GET['from']);
		
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID = $_GET['ID'];
			$model_child = Model::factory('child');
			//孩子信息
			$child_Info = $model_child->step1_selectByKey($ID);
			//如果数据不存在就报错
			if(empty($child_Info)){	
					
				Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
				exit;
			}
		}else{
			Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
			
			exit;
		}
		//获取孩子ID
		$img = Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/".$ID.'.jpg';
		$img = file_exists($img)?URL::base().'media/uploadfile/childPictures/'.$ID.'.jpg':'';	
	
		$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
		$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4),'');
		//监护人信息
		$step2_Info = $model_child->step2_selectByKey($ID);
		
		if(!empty($step2_Info)){
			$step2_Info['Guardian1_Age']= Public_Times::getAge($step2_Info['Guardian1_Birthday']);
			$step2_Info['Guardian1_Birthday'] = Public_Times::handleBirthday($step2_Info['Guardian1_Birthday']);
			$step2_Info['Guardian1_YearJap']= Public_Times::getYearJap(substr($step2_Info['Guardian1_Birthday'], 0,4));
			$step2_Info['Guardian2_Age']= Public_Times::getAge($step2_Info['Guardian2_Birthday']);
			$step2_Info['Guardian2_Birthday'] = Public_Times::handleBirthday($step2_Info['Guardian2_Birthday']);
			$step2_Info['Guardian2_YearJap']= Public_Times::getYearJap(substr($step2_Info['Guardian2_Birthday'], 0,4));
		}
				
		//入院前教育
		$step5_Info = $model_child->step5_selectByKey($ID);	
		//主要养育人
		$step3_Info = $model_child->step3_selectByKey($ID);
		
		//年,月，日列表
		$years=Public_Times::yearWestAndJap('1990', '2042','');
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
	
		//schoolin
		$schoolin = $model_child->summary_selectByKey($ID);
		$body = View::factory('child/summary');
				View::set_global('parameter',Kohana::$config->load('parameter'));
				View::bind_global('ID',$ID);
				View::bind_global('step2_Info',$step2_Info);				
				View::bind_global('step3_Info',$step3_Info);
				View::bind_global('step5_Info',$step5_Info);				
				View::bind_global('years',$years);
				View::bind_global('months',$months);
				View::bind_global('days',$days);
				View::bind_global('img',$img);								
				View::bind_global('child_Info',$child_Info);
				View::bind_global('schoolin', $schoolin);
				$this->response->body($body);				
	}
	
	/**
	* 要录作成录入
	*/
	public function action_summary_insert() {
		$model_child = Model::factory('child');
			
		if ($this->request->is_ajax()){
			$rst = $model_child->summary_Data($this->request);
			echo  json_encode(array('result'=>$rst));
		}else{
			if(($this->request->post('halfwaySave')=='False')&&$model_child->summary_Data($this->request)){
				$ID = $this->request->post('hidden_ID');
				$child_Info = $model_child->step1_selectByKey($ID);
				$step2_Info = $model_child->step2_selectByKey($ID);
				$summary = $model_child->summary_selectByKey($ID);
				
							
				include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
				
				$html = (string)View::factory('child/summaryPdf')
				->bind('child_Info',$child_Info)
				->bind('step2_Info',$step2_Info)
				->bind('summary',$summary)
				->set('post',$this->request->post);
				
				//echo $html;exit;
				
				$mpdf=new mPDF('ja','A4',0,'',15,15,10);
				$mpdf->SetDisplayMode('fullpage');
				$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				
				$mpdf->WriteHTML($html,0);
				
				$mpdf->Output('幼稚園幼児指導要録(学籍に関する記録).pdf','I');
				
				
				/*$html = (string)View::factory('child/summaryPdf');
				 $mpdf=new mPDF('ja');
				$mpdf->useAdobeCJK = true;
				$mpdf->WriteHTML($html);
				$mpdf->Output();*/
				exit;
								
			}			
		}
	}
	
	
	/**
	 *  健康作成
	 */
	public function action_health() {		
		$notDataBackUrl = URL::site('list/listAll');
		if(array_key_exists('from', $_GET)) $notDataBackUrl = URL::site($_GET['from']);
		
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID = $_GET['ID'];
			$model_child = Model::factory('child');
			//孩子信息
			$child_Info = $model_child->step1_selectByKey($ID);
			//如果数据不存在就报错
			if(empty($child_Info)){					
				Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
				exit;
			}			
		}else{
			Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
			exit;
		}
		//获取孩子ID
		$img = Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/".$ID.'.jpg';
		$img = file_exists($img)?URL::base().'media/uploadfile/childPictures/'.$ID.'.jpg':'';
		
		$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
		$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4),'');		
		
		//监护人信息
		$guardian_Info = $model_child->step2_selectByKey($ID);
		if(!empty($guardian_Info)){
			$guardian_Info['Guardian1_Age']=Public_Times::getAge($guardian_Info['Guardian1_Birthday']);
			$guardian_Info['Guardian1_YearJap']=Public_Times::getYearJap(substr($guardian_Info['Guardian1_Birthday'], 0,4));
			$guardian_Info['Guardian2_Age']=Public_Times::getAge($guardian_Info['Guardian2_Birthday']);
			$guardian_Info['Guardian2_YearJap']=Public_Times::getYearJap(substr($guardian_Info['Guardian2_Birthday'], 0,4));
		}
		//读取healthcard中已存在数据
		$healthcard_Info= $model_child->health_selectByKey($ID);
		//step中录入的健康信息
		$health_Info= $model_child->step4_selectByKey($ID);
	
		//年,月，日列表
		$years=Public_Times::yearWestAndJap('1990', '2042','');
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
			
		$body = View::factory('child/health')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('guardian_Info',$guardian_Info)
					->bind('health_Info',$health_Info)
					->bind('healthcard_Info',$healthcard_Info)
					->bind('years',$years)
					->bind('months',$months)
					->bind('days',$days)					
					->bind('img',$img)
					->bind('child_Info',$child_Info);
		View::bind_global('ID',$ID);
		$this->response->body($body);
	}
	
	/**
	 * 健康作成录入
	 */
	public function action_health_insert() {
		$model_child = Model::factory('child');
		
		if($model_child->health_Data($this->request)){

			$ID = $this->request->post('hidden_ID');
			$child_Info = $model_child->step1_selectByKey($ID);			
			$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
			$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4),'');
			
			//监护人信息
			$guardian_Info = $model_child->step2_selectByKey($ID);
			if(!empty($guardian_Info)){
				$guardian_Info['Guardian1_Age']=Public_Times::getAge($guardian_Info['Guardian1_Birthday']);
				$guardian_Info['Guardian1_YearJap']=Public_Times::getYearJap(substr($guardian_Info['Guardian1_Birthday'], 0,4));
				$guardian_Info['Guardian2_Age']=Public_Times::getAge($guardian_Info['Guardian2_Birthday']);
				$guardian_Info['Guardian2_YearJap']=Public_Times::getYearJap(substr($guardian_Info['Guardian2_Birthday'], 0,4));
			}
			
			//读取healthcard中已存在数据
			$healthcard_Info= $model_child->health_selectByKey($ID);
			//step中录入的健康信息
			$health_Info= $model_child->step4_selectByKey($ID);
			//获取健康卡图片
			$fileList = Kohana::list_files('insuranceFileImages/'.$ID, array(Kohana::$config->load('global.base_url')."/media/uploadfile/"));			
	
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	
			$html = (string)View::factory('child/healthPdf')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info)
					->bind('guardian_Info',$guardian_Info)
					->bind('healthcard_Info',$healthcard_Info)
					->bind('health_Info',$health_Info)
					->bind('fileList',$fileList)
					->set('post',$this->request->post);	
			//echo $html;exit;
	
			$mpdf=new mPDF('ja','A4',0,'',15,15,10);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	
			$mpdf->WriteHTML($html,0);
			$mpdf->Output('健康カード作成　対象園児.pdf','I');
			exit;
		}
	
	}

	/**
	 * 紧急联络
	 */
	public function action_contact() {
		$notDataBackUrl = URL::site('list/listAll');
		if(array_key_exists('from', $_GET)) $notDataBackUrl = URL::site($_GET['from']);
		
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID = $_GET['ID'];
			$model_child = Model::factory('child');
			//孩子信息
			$child_Info = $model_child->step1_selectByKey($ID);
			//如果数据不存在就报错
			if(empty($child_Info)){
				Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
				exit;
			}
		}else{
			Request::factory('postprompt/notData')->post('url',$notDataBackUrl.URL::query(array('ID'=>NULL,'from'=>NULL)))->execute();
			exit;
		}
		
		
		$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
		$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4),'');		
		//紧急联系人信息
		$contact_Info = $model_child->step2_selectByKey($ID);		
	
		
		View::set_global('parameter',Kohana::$config->load('parameter'));
		View::bind_global('child_Info',$child_Info);
		View::bind_global('contact_Info',$contact_Info);
		
		if(array_key_exists('pdf', $_GET)){
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));			
			$html = (string)View::factory('child/contactPdf');
			
			//echo $html;exit;			
			$mpdf=new mPDF('ja','A4',0,'',15,15,10);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list			
			$mpdf->WriteHTML($html,0);
			
			$mpdf->Output('健康カード作成　対象園児.pdf','I');			
			exit;
			
		}else{		
			$img = Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/".$ID.'.jpg';
			$img = file_exists($img)?URL::base().'media/uploadfile/childPictures/'.$ID.'.jpg':'';
			View::bind_global('img',$img);
			View::bind_global('ID',$ID);
			$body = View::factory('child/contact');
			$this->response->body($body);
		}
	}
	
	/**
	 * 
	 */
	public function action_invoice_Index()
	{
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$child = Model::factory('child')->step1_selectByKey($_GET['ID']);
			$months = Public_Times::getMonthList("m","");
			$years = Public_Times::yearWestAndJap('1980','2050');
						
			$body = View::factory('child/invoiceIndex')
						->bind('months',$months)
						->bind('years',$years)
						->bind('child',$child);
			$this->response->body($body);
		}
	}
	
	
	/**
	 * 请求书页面载入
	 */
	public function action_invoice()
	{
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
				
			$months = Public_Times::getMonthList("m","");
			$years = Public_Times::yearWestAndJap('1980','2050');		
							
			$yearMon	=	array_key_exists('YearMon', $_GET)?$_GET['YearMon']:date('Y-m');
			
			$model_child = Model::factory('child');
			$model_Master=Model::factory('master');
			
			//读取已存请求书信息
			$invoiceInfo	=	$model_child->getInvoice($_GET['ID'],$yearMon);
			$child 			= 	$model_child->step1_selectByKey($_GET['ID']);
			
			//master_activitiesSet表   o
			$table_activitiesSet=Cache::instance()->get('table_master_activitiesset');
			$activitiesSet = $model_Master->getData($table_activitiesSet);
			if(empty($invoiceInfo)){
				$tmpCheck = explode(';', $child['Activities']);
				$activitiesCheckedIDArr = array();
				for($i=1;$i<6;$i++){
					if(in_array($i,$tmpCheck)){
						if(!empty($child['Activities_Date_'.$i])){
							if(substr($child['Activities_Date_'.$i], 0,7)<=$yearMon){
								$activitiesCheckedIDArr[]=$i;
							}
						}
					}
				}   
				View::bind_global('activitiesCheckedIDArr', $activitiesCheckedIDArr);
				
			}
			
			$recogInfo		=	$model_child->getChildRecogList($_GET['ID']);			
			$buyGoodsInfo	=	$model_child->getBuyGoodsInfo($_GET['ID'],$yearMon);
			$monCost		=	$model_child->getMonCost($_GET['ID'],$yearMon);
			$overCost		=	$model_child->getOverCost($_GET['ID'],$monCost,$yearMon);
			$extraInfo		=	$model_child->getExtraCost($_GET['ID'],$yearMon);
			//print_r($extraInfo);
			//exit();
			
			$body = View::factory('child/invoice')
					->set('parameter',Kohana::$config->load('parameter'))					
					->bind('years',$years)
					->bind('months',$months)
					->bind('YearMon',$yearMon)
					->bind('child',$child)
					->bind('recogInfo',$recogInfo)
					->bind('monCost',$monCost)
					->bind('overCost',$overCost)
					->bind('extraInfo',$extraInfo)
					->bind('activitiesSet',$activitiesSet)
					->bind('buyGoodsInfo',$buyGoodsInfo)
					->bind('invoiceInfo',$invoiceInfo);
			$this->response->body($body);
		}
	}
	
	/**
	 * 请求书数据保存
	 */
	public function action_invoice_Insert(){
		if ($this->request->is_ajax()){
			$rst = Model::factory('child')->invoice_Data($this->request);
			echo  json_encode(array('result'=>$rst));
		}else{			
			$YearMon = $this->request->post('select_Request_Date_Y').'-'.$this->request->post('select_Request_Date_M');
			if(Model::factory('child')->invoice_Data($this->request)&&$this->request->post('pdf')){
				$this->redirect('child/invoicePDF'.URL::query(array('time'=>time(),'YearMon'=>$YearMon)));
			}else{
				Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('child/invoice').URL::query())->execute();
			}
		}
	}
	
	
	public function action_invoicePDF(){
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])&&array_key_exists('YearMon', $_GET)&&!empty($_GET['YearMon'])){
			;
			$invoiceInfo =Model::factory('child')->getInvoice($_GET['ID'],$_GET['YearMon']);			
			
			//master_baseSet表    o
			$table_baseSet=Cache::instance()->get('table_master_baseset');
			$data_baseSet=Model::factory('master')->getData($table_baseSet);
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
			
			$html = (string)View::factory('child/invoicePDF')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('invoiceInfo',$invoiceInfo)
					->set('yearMon',$_GET['YearMon'])
					->bind('data_baseSet',$data_baseSet[0]);
			//echo $html;exit;
			
			$mpdf=new mPDF('ja','A4',0,'',15,15,10);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
			
			$mpdf->WriteHTML($html,0);
			$mpdf->Output('保 育 料 請 求 書.pdf','I');
			exit;			
		}		
	}
	
	/**
	 * child/step1  
	 * 保険証コピーの添付
	 * 打开画面
	 */
	public function action_insuranceFile()
	{
		if(array_key_exists('ID',$_GET)){
			$fileName = $_GET['ID'];			
		}else if(array_key_exists('fileRand',$_GET)){
			$fileName = $_GET['fileRand'];
			if(rand(1,30)%30==0){
				$this->clearImgCache($fileName);
			}
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('child/step1'))->execute();
			exit;
		}
				
		$fileList = Kohana::list_files('insuranceFileImages/'.$fileName, array(Kohana::$config->load('global.base_url')."/media/uploadfile/"));		
		
		$body = View::factory('child/insuranceFile')
				->bind('fileList',$fileList);
		$this->response->body($body);		
	}

	/**
	 * child/step1
	 * 保険証コピーの添付
	 * 删除已经上传的文件
	 */
	public function action_delInsuranceFile()
	{
		$img =  Kohana::$config->load('global.base_url')."/media/uploadfile/".$this->request->post('img');
		$result = array('del'=>false);
		if(file_exists($img)){
			if (unlink($img)){
				$result = array('del'=>TRUE,'id'=>$this->request->post('id'));
			}
		}
		echo json_encode($result);
	}
	
	
	
	
	/**
	 * child/step1
	 * 保険証コピーの添付
	 * 保存上传文件
	 */
	public function action_saveImages(){
		if(array_key_exists('ID',$_GET)){
			$fileName = $_GET['ID'];
		}else if(array_key_exists('fileRand',$_GET)){
			$fileName = $_GET['fileRand'];
		}else{
			exit;
		}
		
		$dir = Kohana::$config->load('global.base_url')."/media/uploadfile/insuranceFileImages/{$fileName}/";
		if(!is_dir($dir)){
			mkdir($dir,0777,TRUE);
		}
				
		$image = Image::factory($_FILES['file']['tmp_name']);
		$image->resize(1000, 1000, Image::AUTO)->rotate($this->request->post('rotation'))->save($dir.$_FILES['file']['name']);
	}
	
	/**
	 * child/step1
	 * 保険証コピーの添付
	 * 清除那些长时间过期的文件
	 */
	private function clearImgCache($fileName)
	{
		$base_dir = Kohana::$config->load('global.base_url')."/media/uploadfile/insuranceFileImages/";
		if (false != ($handle = opendir (  $base_dir ))) {
			$i=0;
			while ( false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if ($file != "." && $file != ".."&&!strpos($file,".")) {
					if(substr($file, 0,8)=='fileRand'){
						if($file!=$fileName){
							$createTime = substr($file, 8,10);
							if(time()-$createTime>259200){							
								Public_File::deleteDir($base_dir.$file.'/');
							}
						}						
					}
				}
			}
			//关闭句柄
			closedir ( $handle );
		}
	}
	
	
	
	public function action_test1()
	{
		$table_day_parameter=Cache::instance()->get('table_day_parameter');
			$day_parameter=DB::select()->from($table_day_parameter)
											   ->where('Para_Date','=','2017-06-20')
											   ->execute()->current();
			if(empty($day_parameter)){
				print_r('2');
			}
		
			//$dir='G:/grandFather';
			//self::refresh($dir);
		
		// Model::factory('initialize')->guardian();		
		//print_r(Cache::instance()->get('table_child_1_base_fields'));
	
		//foreach( Cache::instance()->get('table_master_kidslessset_fields') as $val){
			//echo '$'."data['{$val["Field"]}'] = ".'$request->post(\'txt_'.$val["Field"]."');<br/>";
				
		//}
	}
	
}
