<?php defined('SYSPATH') or die('No direct script access.');

class Controller_List extends Controller_Sellevel {
	
	/**
	 * 全園児一覧(あいうえお順)
	 */
	public function action_listAll() {
		$child_Info = Model::factory('list')->getList();
		$model_comm = Model::factory('communication');	
		
		//$rstss= Model::factory('socketBackWork')->socket_send_cmd();
		foreach ($child_Info as $key=>$val){			
			$child_Info[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));	
			//$child_Info[$key]['comm'] = $model_comm->childTodayComm($val['Child_Id']);
		}
		$body = View::factory('list/listAll')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
		$this->response->body($body);		
	}
	
	/**
	 * 登降圆时间手动更新
	 */
	public function action_checkTimeUpdate()
	{
		if ($this->request->is_ajax()){
			$rst = Model::factory('list')->checkTimeUpdate($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * クラスごと
	 */
	public function action_listClass() {
		$child_Info = Model::factory('list')->getList();
		$model_comm = Model::factory('communication');
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			//$child_Info[$key]['comm'] = $model_comm->childTodayComm($val['Child_Id']);
		}		
		$body = View::factory('list/listClass')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
		$this->response->body($body);	
	}
	
	/**
	 * 入園前の園児
	 */
	public function action_listBeforeAdmission() {
		
		$child_Info = Model::factory('list')->getListBeforeAdmission();
		
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
		}
		$body = View::factory('list/listBeforeAdmission')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info);
				$this->response->body($body);
		
	}
	
	
	/**
	 * 認定区分ごと
	 */
	public function action_listRecog() {
		$child_Info = Model::factory('list')->getList();
		$model_comm = Model::factory('communication');
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			//$child_Info[$key]['comm'] = $model_comm->childTodayComm($val['Child_Id']);
		}
		$body = View::factory('list/listRecog')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	/**
	 * 園児名検索
	 */
	public function action_listRearch() {
		$name = array_key_exists('txt_Search', $_GET)?$_GET['txt_Search']:'';
		$child_Info = Model::factory('list')->searchByName($name);
		$model_comm = Model::factory('communication');
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			//$child_Info[$key]['comm'] = $model_comm->childTodayComm($val['Child_Id']);
		}		
		$body = View::factory('list/listSearch')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
					View::bind_global('search',$name);
		$this->response->body($body);
	}
	
	/**
	 * 今月のお誕生日一覧
	 */
	public function action_listRearchBirth() {
		$month=date('m');
		$child_Info = Model::factory('list')->searchByBirthdayM($month);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);			
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
		}
		$body = View::factory('list/birthday')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	/**
	 * 退圆列表
	 */
	public function action_listLeave() {		
		$name = array_key_exists('txt_Search',$_GET)?$_GET['txt_Search']:'';
		
		$child_Info = Model::factory('list')->getLeaveList($name);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age'] = Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			$child_Info[$key]['LeaveAge'] = Public_Times::leaveAge($val['LeaveDate'], $val['Birthday']);
			$child_Info[$key]['EnterDateJap']=Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
			$child_Info[$key]['LeaveDateJap']=Public_Times::getYearJap(substr($val['LeaveDate'], 0,4));
		}
		$body = View::factory('list/listLeave')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info)
				->bind('search',$name);
		$this->response->body($body);
		
	}
	
	public function action_listExtension(){
		if(array_key_exists('yearMonDay',$_GET)){
			$yearMonDay = $_GET['yearMonDay'];
		}else{
			$yearMonDay = date('Y-m-d');
		}
		list($Y,$m,$d) = explode('-',$yearMonDay);
		
		//月份，天数列表
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
		$week = Public_Times::getWeek($yearMonDay);
		
		//已保存的
		$extensionList=Model::factory('list')->listExtensionGet($yearMonDay);
		//2017-5-25添加
		$ListR3=Model::factory('list')->ExtensionR3First($yearMonDay);
		$ListR2=Model::factory('list')->ExtensionR2First($yearMonDay);
		
		
		$extensionByID=array();
		foreach ($extensionList as $key => $val){
			$extensionByID[$val['Child_1_Base_ID']]=$val;
		}
		
		
		$child_Info = Model::factory('list')->getList();
		foreach ($child_Info as $key=>$val){
			if($val['Recog_Type']=='R2'||$val['Recog_Type']=='R3'){
				$child_Info[$key]['Age'] = Public_Times::getAge($val['Birthday']);
				$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
				$child_Info[$key]['YearJap'] = Public_Times::getYearJap(substr($val['Birthday'], 0,4));
				$child_Info[$key]['YearJap_EnterDate'] = Public_Times::getYearJap(substr($val['EnterDate'], 0,4));
				$child_Info[$key]['YearJap_InputDate'] = Public_Times::getYearJap(substr($val['InputDate'], 0,4));
				//将延长保育的信息整合到孩子list中
				if(array_key_exists($val['ID'], $extensionByID)){
					$child_Info[$key]['Extension']=$extensionByID[$val['ID']];
				}else{
					$child_Info[$key]['Extension']=array();
				}
			}else{
				unset($child_Info[$key]);
			}
		}
		
		$body = View::factory('list/listExtension')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('months',$months)
					->bind('days',$days)
					->bind('week',$week)
					->bind('yearMonDay',$yearMonDay)
					->bind('extensionList',$extensionList)
					->bind('child_Info',$child_Info)
					->bind('ListR2',$ListR2)
					->bind('ListR3',$ListR3)
					->bind('countList',$countList)
					->bind('extensionByID',$extensionByID);
		$this->response->body($body);
	}
	
	/**
	 * 延长保育 更新
	 */
	public function action_listExtensionUpdate(){
		$rst = Model::factory('list')->listExtensionUpdate($this->request);
		echo json_encode(array('result' => $rst));
	}
	
	/**
	 * 延长保育PDF
	 */
	 public function action_listExtensionPDF(){
	 	if(array_key_exists('yearMonDay',$_GET)&&!empty($_GET['yearMonDay'])&&array_key_exists('recog',$_GET)&&!empty($_GET['recog'])){
	 		
	 		$yearMonDay = $_GET['yearMonDay'];
	 		$recog = $_GET['recog'];
	 		
	 		list($Y,$m,$d) = explode('-',$yearMonDay);
	 		$week = Public_Times::getWeek($yearMonDay);
	 		$parameter=Kohana::$config->load('parameter');
	 	
	 		//已保存的
			$extensionList=Model::factory('list')->listExtensionGet($yearMonDay);
			$extensionByID=array();
			foreach ($extensionList as $key => $val){
				$extensionByID[$val['Child_1_Base_ID']]=$val;
			}
		
		
			$child_Info = Model::factory('list')->getList();
			foreach ($child_Info as $key=>$val){
				if($val['Recog_Type']==$recog){
					//将延长保育的信息整合到孩子list中
					if(array_key_exists($val['ID'], $extensionByID)){
						$child_Info[$key]['Extension']=$extensionByID[$val['ID']];
					}else{
						$child_Info[$key]['Extension']=array();
					}
				}else{
					unset($child_Info[$key]);
				}
			}
			sort($child_Info);
			
		
	 		$html = (string)View::factory('list/listExtensionPDF')
	 						->bind('parameter',$parameter)
	 						->bind('yearMonDay',$yearMonDay)
	 						->bind('week',$week)
	 						->bind('child_Info',$child_Info);
	 		//echo $html;exit;
	 	
	 		include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	 	
	 		$mpdf=new mPDF('ja','A4',0,'',15,15,10);
	 		$mpdf->SetDisplayMode('fullpage');
	 		$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	 		 	
	 		$mpdf->WriteHTML($html,0);
	 	
	 		$mpdf->Output('延長保育管理簿.pdf','I');
	 		exit;
	 	}
	 }
	
	
	/**
	 * 登降圆信息list
	 */
	public function action_checkList(){
		if(array_key_exists('yearMonDay',$_GET)){
			$yearMonDay = $_GET['yearMonDay'];
		}else{
			$yearMonDay = date('Y-m-d');
		}
		list($Y,$m,$d) = explode('-',$yearMonDay);
		$model_list = Model::factory('list');	

		//查询今天的的设置的参数
		$dayParameter = $model_list->getDayParameter($yearMonDay);
		if(!empty($dayParameter)){
		
			$Para_ActivityIDS_Arr	=	array_filter(explode(';',$dayParameter['Para_ActivityIDS']));
			$Para_ActivityNAMES_Arr	=	array_filter(explode(';',$dayParameter['Para_ActivityNAMES']));
			$activities = array();
			foreach($Para_ActivityIDS_Arr as $key=>$val){
				$activities[] = array('ID'=>$val,'Activity_Name'=>$Para_ActivityNAMES_Arr[$key]);
			}
			$chk_activities	=	array_filter(explode(';',$dayParameter['Para_ActivityIDChecked']));
			$chk_holidays = $dayParameter['Para_HolidayChecked'];
			$chk_longHoliday = $dayParameter['Para_LongHolidayChecked'];
			$chk_event = $dayParameter['Para_EventChecked'];
			
			$day_Detail = $model_list->getOldDayDetail($yearMonDay);			
		}else{
			$activities = $model_list->getActtivityByWeek($yearMonDay);	
			$chk_activities = array();
			foreach($activities as $key=>$val){
				$chk_activities[] = $val['ID'];
			}
			$chk_holidays = 0;
			$chk_longHoliday = 0;
			$chk_event = 0;
			
			if($this->request->method()=='POST'){
				$chk_activities = $this->request->post('chk_activities');
				$chk_holidays = $this->request->post('chk_holidays');
				$chk_longHoliday = $this->request->post('chk_longHoliday');
				$chk_event = $this->request->post('chk_event');
			}
			
			$isholidays = empty($chk_holidays)?FALSE:TRUE;
			$isLongHoliday = empty($chk_longHoliday)?FALSE:TRUE;			
			
			$day_Detail = $model_list->getDayRawDetail($yearMonDay,$chk_activities,$isholidays,$isLongHoliday,$this->request);
		}
		//月份，天数列表
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
		$week = Public_Times::getWeek($yearMonDay);
		//print_r($day_Detail);
		//print_r($chk_activities);
		//exit();
		
		
		$body = View::factory('list/checkList')
			->set('parameter',Kohana::$config->load('parameter'))
			->bind('dayParameter',$dayParameter)
			->bind('months',$months)
			->bind('days',$days)
			->bind('week',$week)
			->bind('activities',$activities)
			->bind('day_Detail',$day_Detail)
			->bind('yearMonDay',$yearMonDay)
			->bind('chk_activities',$chk_activities)
			->bind('chk_holidays',$chk_holidays)
			->bind('chk_longHoliday',$chk_longHoliday)
			->bind('chk_event',$chk_event);
		$this->response->body($body);
	
	}
	
	/**
	 * 登降園時間再取得
	 */
	public function action_delReGetInvice(){
		if ($this->request->is_ajax()){
			$yearMonDay=$this->request->post('yearMonDay');
			$rst = Model::factory('list')->delDayParameter($yearMonDay);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 登降圆信息update
	 */
	public function action_checkListUpdate()
	{		
		if ($this->request->is_ajax()){
			$rst = Model::factory('list')->checkListUpdate($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	/**
	 * 改变登降园时间 重新计算一整天的信息 
	 */
	public function action_changeDayDetail()
	{
		$yearMonDay 	=	$this->request->post('yearMonDay');
		$Recog_Type 	=	$this->request->post('Recog_Type');
		$inTime 		=	$this->request->post('inTime');
		$outTime 		=	$this->request->post('outTime');
		$activity_chk 	=	$this->request->post('activity_chk');
		$busCome_chk    =   $this->request->post('msg_BusCome_Checked');
		$busGo_chk      =   $this->request->post('msg_BusGo_Checked');
		
		$isholidays 	=	$this->request->post('isholidays');
		$isLongHoliday 	=	$this->request->post('isLongHoliday');
		
		$isholidays = $isholidays==1?TRUE:FALSE;
		$isLongHoliday = $isLongHoliday==1?TRUE:FALSE;
		
		$changeDayDetail = Model::factory('list')->changeDayDetail($yearMonDay,$Recog_Type,$inTime,$outTime,$activity_chk,$busCome_chk,$busGo_chk,$isholidays,$isLongHoliday);
		
		if($changeDayDetail!==false){			
			$result = array_merge(array('result'=>TRUE),$changeDayDetail);
		}else{
			$result = array('result'=>FALSE);
		}
		
		echo json_encode($result);
		exit;
	}
	
	
	/**
	 * 月份信息list
	 */
	public function action_monDetail(){
		if(array_key_exists('yearMon', $_GET)&&!empty($_GET['yearMon'])&&array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
	
			$yearMon=$_GET['yearMon'];
			$ID=$_GET['ID'];
				
			$info = Model::factory('list')->getMonDetail($yearMon,$ID);
			$monDetail = $info['monDetail'];
			$base = $info['base'];
			$recog_Info = $info['recog_Info'];
			$days=Public_Times::getDaysList(substr($yearMon, 0,4),substr($yearMon, 5,2),'d','');
			$months =Public_Times::getMonthList("m","");				
	
			$body = View::factory('list/monDetail_List')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('months',$months)
					->bind('ID',$ID)
					->bind('recog_Info',$recog_Info)
					->bind('base',$base)
					->bind('monDetail',$monDetail)
					->bind('yearMon',$yearMon);
			$this->response->body($body);
		}
	}
	
	public function action_monDetail_Insert(){	
		if ($this->request->is_ajax()){
			$rst = Model::factory('list')->monDetail_Data($this->request);
			echo  json_encode(array('result'=>$rst));
		}	
	}
	
	
	/**
	 * 午睡チェック
	 * 室温・湿度チェック
	 */
	public function action_listNapTempIndex(){
		$days = Public_Times::getDaysList("","","d","");
		$months = Public_Times::getMonthList("m","");
		$years = Public_Times::yearWestAndJap('2016','2050','');	

		$body = View::factory('list/listNapTempIndex')
					->bind('days',$days)
					->bind('months',$months)
					->bind('years',$years);		
		$this->response->body($body);
	}
	
	/**
	 * 午睡チェック
	 */
	public function action_listNapCheck(){
		if(array_key_exists('yearMonDay',$_GET)){
			$yearMonDay = $_GET['yearMonDay'];
		}else{
			$yearMonDay = date('Y-m-d');
		}
		list($Y,$m,$d) = explode('-',$yearMonDay);
		
		//月份，天数列表
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
		$week = Public_Times::getWeek($yearMonDay);		
		
		//new
		$rst = Model::factory('list')->listSleepNapCheck($yearMonDay);
		
		$child_Info = $rst['child_info'];
		$napCheck_Num = $rst['napCheck_Num'];
		$sleep_Num = $rst['sleep_Num'];		
		
		$body = View::factory('list/listNapCheck')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info)
				->bind('months',$months)
				->bind('days',$days)
				->bind('week',$week)
				->bind('napCheck_Num',$napCheck_Num)
				->bind('sleep_Num',$sleep_Num)
				->bind('yearMonDay',$yearMonDay);
		$this->response->body($body);
		
		
	}
	
	/**
	 * 午睡チェック 
	 * 数据库处理画面
	 */
	public function action_listNapCheckUpdate(){
		$rst = Model::factory('list')->listSleepNapCheckUpdate($this->request);
		echo json_encode(array('result' => $rst));
	}
	
	/**
	 * 午睡チェック、
	 * 备注详细写入画面
	 */
	public function action_napCheckDetail(){
		$yearMonDay = $_GET['yearMonDay'];
		$child_id = $_GET['child_id'];
		$class = $_GET['class'];
		$model_list = Model::factory('list');
		
		$child = Model::factory('child')->step1_selectByKey($child_id);
		$napCheckDetailed = $model_list->listSleepNapDetailed($child_id,$yearMonDay);
		
		$checkTimeList=array();
		foreach ($napCheckDetailed as $key => $val){
			$list=explode(';', $val['Check_Time']);
			$content=empty($val['Check_Content'])?array():explode(';', $val['Check_Content']);
			foreach ($list as $k =>$v){
				if(!empty($v)){
					$tmp['ID']=$val['ID'];
					$tmp['Check_Time']=$v;
					$tmp['Check_USERID']=$val['Check_USERID'];
					$tmp['Check_Content'] = array_key_exists($k, $content)?$content[$k]:'';
					$checkTimeList[]=$tmp;
				}
			}			
		}

		$Recog = $model_list->getChildTIMERecog($child['ID'],date('Y-m-d'));
		
		$body = View::factory('list/napCheckDetail')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child',$child)
				->bind('napCheckDetailed',$checkTimeList)
				->bind('Recog',$Recog);
				
		$this->response->body($body);		
	}
	
	/**
	 * 午睡チェック、
	 * 备注详细写入画面 
	 * 数据库处理
	 */
	public function action_napCheckDetailUpdate(){
		if ($this->request->is_ajax()){
			$rst = Model::factory('list')->napCheckDetailUpdate($this->request);
			echo  json_encode(array('result'=>$rst));
		}		
	}
	
	/**
	 * 室温 チェック時間
	 */
	public function action_listTempCheck(){
		if(array_key_exists('yearMonDay',$_GET)){
			$yearMonDay = $_GET['yearMonDay'];
		}else{
			$yearMonDay = date('Y-m-d');
		}
		list($Y,$m,$d) = explode('-',$yearMonDay);
	
		//月份，天数列表
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
		$week = Public_Times::getWeek($yearMonDay);
	
		$class = Model::factory('list')->listTempCheck($yearMonDay);

		$Check_USERID = Session::instance()->get('USERID');
		
		
		$body = View::factory('list/listTempCheck')
				->set('class',$class)
				->bind('months',$months)
				->bind('days',$days)
				->bind('week',$week)
				->bind('yearMonDay',$yearMonDay)
				->bind('Check_USERID',$Check_USERID);
		$this->response->body($body);
	}
	
	/**
	 * 室温 チェック時間
	 */
	public function action_listTempCheckUpdate(){
		$rst = Model::factory('list')->listTempCheckUpdate($this->request);
		echo json_encode(array('result' => $rst));	
	}
	
	/**
	 * 一時預かり事業の請求
	 */
	public function action_listTempDemand(){
		$date = array_key_exists('yearMonth',$_GET)?$_GET['yearMonth']:date('Y-m');
		$output_date = date('Y-m-d');
		$years = Public_Times::yearWestAndJap('1980','2037');
		
		$result = Model::factory('list')->getListTempDemand($date);

		$body = View::factory('list/listTempDemand')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('result',$result)
				->bind('date',$date)
				->bind('years',$years)
				->bind('output_date',$output_date);
		$this->response->body($body);
	}
	
	
	public function action_setListTempDemand(){
		$rst = Model::factory('list')->setListTempDemand($this->request);
		if($rst){
			$this->redirect('list/listTempDemandPdf'.URL::query());
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('list/listTempDemand').URL::query())->execute();
			return FALSE;
		}		
	}
	
	public function action_listTempDemandPdf(){
		$date = array_key_exists('yearMonth',$_GET)?$_GET['yearMonth']:date('Y-m');
		$model_list = Model::factory('list');
		$result = $model_list->getListTempDemand($date);
		
		//master_baseSet表    o
		$table_baseSet=Cache::instance()->get('table_master_baseset');
		$rst = $model_list->select($table_baseSet);
		$data_baseSet = empty($rst)?array():$rst[0];
		
		
		$table_temporary = Cache::instance()->get('table_master_temporary');
		$rst = $model_list->select($table_temporary);
		$data_temporary = empty($rst)?array():$rst[0];
		
		$html = (string)View::factory('list/listTempDemandPdf')
							->bind('result',$result)
							->bind('data_baseSet',$data_baseSet)
							->bind('data_temporary',$data_temporary);		
	
		include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
		
		$mpdf=new mPDF('jpn','A4',0,'',15,15,10);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		
		$mpdf->WriteHTML($html,0);
		
		$mpdf->Output('幼稚園幼児指導要録(学籍に関する記録).pdf','I');
		exit;
		
	}
	
	/**
	 * 20 保育日志index画面
	 */
	public function action_logIndex(){
			
		$y=date('Y');
		$m=date('m');
	
		$months = Public_Times::getMonthList("m","");
		$years = Public_Times::yearWestAndJap('1980','2050');
		$days = Public_Times::getDaysList("","","d","");
	
	
		$body = View::factory('child_care_logs/logIndex')
		->set('parameter',Kohana::$config->load('parameter'))
		->bind('months',$months)
		->bind('years',$years)
		->bind('days',$days);
		$this->response->body($body);
	
	}
	
	/**
	 * 保育日志 编辑页面
	 */
	public function action_log(){
	
		$y=date('Y');
		$m=date('m');
		//获取班级学生信息
		$child_Info = Model::factory('list')->getList();
	
		$months = Public_Times::getMonthList("m","");
		$years = Public_Times::yearWestAndJap('1980','2050');
		$days = Public_Times::getDaysList("","","d","");
	
		//星期六的log日志内容存储
		$log_info=array();
		//获取要查询的日期和班级
		$yearMonDay	=array_key_exists('YearMonDay', $_GET)?$_GET['YearMonDay']:date('Y-m-d');
		$week =date('w',strtotime($yearMonDay));
		if($week==6){
			$log_info=Model::factory('list')->getLogs($yearMonDay,'');
		}
	
		$parameter = Kohana::$config->load('parameter');
	
		$classes=array();
		foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){
			$classes[]=$key;
		}
	
		$body = View::factory('child_care_logs/log')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('months',$months)
				->bind('years',$years)
				->bind('days',$days)
				->bind('yearMonDay',$yearMonDay)
				->bind('child_Info',$child_Info)
				->bind('classes',$classes)
				->bind('log_info',$log_info);
	
		$this->response->body($body);
	}
	
	/**
	 * 用于log日志页面显示班级信息
	 */
	public function action_getClass(){
		if ($this->request->is_ajax()){
	
			$parameter = Kohana::$config->load('parameter');
			$Class = $this->request->post('Class');
			$YearMonDay=$this->request->post('YearMonDay');
			
			$log_info=Model::factory('list')->getLogs($YearMonDay,$Class);
			
			$child_status=array();
			if(!empty($log_info)){
				$children_id=explode(';', $log_info['Children_ID']);
				$status_info=explode(';', $log_info['Children_Status']);
				foreach($children_id as $key=>$val){
					$child_status[$val]=$status_info[$key];
				}
			}
	
			$rst=Model::factory('list')->getList();
			$child_info=array();
			foreach ($rst as $key => $val){
				if($val['Class']==$Class){
					$child_info[]=$val;
				}
			}
			foreach ($child_info as $key=>$val){
				if(empty($val['Recog_Type'])){
					$child_info[$key]['Recog']='';
				}else{
					$child_info[$key]['Recog']=$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']];
				}			
				$child_info[$key]['Age']=Public_Times::getAge($val['Birthday']);
				$child_info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
				$child_info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
			}
	
			$info=array('log_info'=>$log_info,'child_info'=>$child_info,'child_status'=>$child_status);
	
			echo  json_encode($info);
		}
	}
	
	public function action_log_insert(){
		if ($this->request->is_ajax()){
			$rst = Model::factory('list')->log_Insert($this->request);
			echo  json_encode(array('result'=>$rst));
		}
	}
	
	public function action_logPDF(){
		if(array_key_exists('YearMonDay', $_GET)&&!empty($_GET['YearMonDay'])&&array_key_exists('Class', $_GET)){
	
			$parameter = Kohana::$config->load('parameter');
			
			//日志内容
			$log_info=array();
			//与日志相关的孩子信息
			$child_info=array();
			
			
			//获取要查询的日期和班级
			$yearMonDay	=$_GET['YearMonDay'];
			$class=$_GET['Class'];
			
			//判断属于平日还是土曜日
			$week =date('w',strtotime($yearMonDay));
			$weekJap=Public_Times::getWeek($yearMonDay);
			if($week==6){
				//土曜日PDF生成
				$log_info=Model::factory('list')->getLogs($yearMonDay,'');
				
				include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
				
				$html = (string)View::factory('child_care_logs/logPDF_Weekend')
								->set('parameter',Kohana::$config->load('parameter'))
								->bind('log_info',$log_info)
								->bind('child_info',$child_info)
								->bind('yearMonDay',$yearMonDay)
								->bind('class',$class)
								->bind('week',$weekJap);
				//echo $html;exit;
							
				$mpdf=new mPDF('ja','A4',0,'',15,15,10);
				$mpdf->SetDisplayMode('fullpage');
				$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				
				$mpdf->WriteHTML($html,0);
				$mpdf->Output('保 育 日 誌  請 求 書.pdf','I');
				exit;
				
				
			}else{
			//平日pdf生成	
				$log_info=Model::factory('list')->getLogs($yearMonDay,$class);
				if(!empty($log_info)){
				
				$child_ID=explode(';', $log_info['Children_ID']);
				//将checked的孩子和他的‘本日の姿’相对应
				$child_status=array();					
				$status_info=explode(';', $log_info['Children_Status']);
				
				foreach($child_ID as $key=>$val){
					$child_status[$val]=$status_info[$key];
				}							
				
				$child_info=Model::factory('list')->getChildren($child_ID);
				foreach ($child_info as $key=>$val){
					$child_info[$key]['Recog']=$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']];
					$child_info[$key]['Age']=Public_Times::getAge($val['Birthday']);
					$child_info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
					$child_info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
					$child_info[$key]['Today']=$child_status[$val['ID']];
					}
				}
				include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
				
				$html = (string)View::factory('child_care_logs/logPDF_Weekday')
								->set('parameter',Kohana::$config->load('parameter'))
								->bind('log_info',$log_info)
								->bind('child_info',$child_info)
								->bind('yearMonDay',$yearMonDay)
								->bind('class',$class)
								->bind('week',$weekJap);
				//echo $html;exit;
				
				
				$mpdf=new mPDF('ja','A4',0,'',15,15,10);
				$mpdf->SetDisplayMode('fullpage');
				$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				
				$mpdf->WriteHTML($html,0);
				$mpdf->Output('保 育 日 誌  請 求 書.pdf','I');
				exit;
			}			
		}
	}
	
	/**
	 * list bus
	 */
	public function action_busList(){
		$table = Cache::instance()->get('table_child_1_base');
		$child_Info = Model::factory('list')->getList($table);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
		}
	
		$body = View::factory('list/busList')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	
	public function action_busEdit(){
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID=$_GET['ID'];
			$recog_Info = Model::factory('child')->getChildRecog($ID);
			$child_Info = Model::factory('child')->step1_selectByKey($ID);
			$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
			$child_Info['Birthday'] = Public_Times::handleBirthday($child_Info['Birthday']);
			$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4));
			$child_Info['Recog_Type']=$recog_Info['Recog_Type'];
								
			//print_r($child_Info['goSchool_Date']);
			//exit();
			$body = View::factory('list/busEdit')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('child_Info',$child_Info);
					
			View::set_global('ID',$child_Info['ID']);
			$this->response->body($body);
		}
	}
	
	
	public function action_busInsert(){
	
		if(Model::factory('list')->bus_Data($this->request)){
			$this->redirect('list/busList'.URL::query(array('ID'=>NULL)));
		}
	}
	
	
	
}