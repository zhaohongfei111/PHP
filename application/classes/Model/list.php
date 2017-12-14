<?php
class Model_list extends Model_DBCommon{
	
	/**
	 * 获取list信息
	 * @param unknown $table
	 * @return Ambigous <multitype:, Ambigous, multitype:unknown NULL >
	 */
	public function getList(){		
		try {			
			$table = Cache::instance()->get('table_child_1_base');			
			$child_Info = DB::select()->from($table)->where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',date('Y-m-d'))->where_close()->and_where('EnterDate','<=',date('Y-m-d'))->order_by('FamilyName_Spell','ASC')->execute()->as_array();

			foreach ($child_Info as $key => $val){
				$recog_Info = self::getChildTIMERecog($val['ID'],date('Y-m-d'));
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Project'=>'','Recog_Data'=>'');
				$child_Info[$key]=array_merge($val,$recog_Info);
				
				//登降圆状况获取
				$checkInfo=self::checkInfo($val['ID'],$val['Child_Id']);
				$child_Info[$key]['checkInfo']=$checkInfo;
			}	
			return $child_Info;
		} catch (Exception $e) {				
			echo $e->getMessage();				
		}			
	}
	

	public function checkTimeUpdate($request){
		
		try{
			$In_Time=$request->post('In_Time');
			$Out_Time=$request->post('Out_Time');
			$ID=$request->post('ID');
			$date=date('Y-m-d');
			$table= Cache::instance()->get('table_day_raw_data');	
			$rst=FALSE;
						
			$tmpTime=DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->and_where('Day_Date','=',$date)->execute()->as_array();

			if(empty($tmpTime)){							
				$rst=DB::insert($table,array('Day_Date','In_Time','Out_Time','Child_1_Base_ID','Updated'))->values(array($date,$In_Time,$Out_Time,$ID,'1'))->execute();
			}else{
				$rst=DB::update($table)->set(array('In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'Updated'=>'1'))->where('Child_1_Base_ID','=',$ID)->and_where('Day_Date','=',$date)->execute();
			}
			return $rst;
		}catch (Exception $e) {
			echo $e->getMessage();
			return FALSE;
		}		
	}
		
	
	/**
	 * 入園前の園児
	 * @return Ambigous <0, 1, 2, 3, 4, string, multitype:, multitype:unknown NULL >
	 */
	public function getListBeforeAdmission(){
		try {
			$table = Cache::instance()->get('table_child_1_base');			
			$child_Info = DB::select()->from($table)->and_where('EnterDate','>',date('Y-m-d'))->order_by('FamilyName_Spell','ASC')->execute()->as_array();		
			$model_child = Model::factory('child');
			foreach ($child_Info as $key => $val){
				$recog_Info = $model_child->getChildRecog($val['ID']);
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Data'=>'');
				$child_Info[$key]=array_merge($val,$recog_Info);
	
				//登降圆状况获取
				$checkInfo=self::checkInfo($val['ID'],$val['Child_Id']);
				$child_Info[$key]['checkInfo']=$checkInfo;
			}
			return $child_Info;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	
	/**
	 * 获取退圆信息list
	 * @param unknown $table
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function getLeaveList($name){
		try {
			$table = Cache::instance()->get('table_child_1_base');			
			$child_Info = DB::select()->from($table)->where('LeaveDate','!=','0000-00-00')->and_where('LeaveDate','<=',date('Y-m-d'))->and_where(DB::expr('CONCAT(`FamilyName`,`GivenName`)'),'LIKE',"%{$name}%")->order_by('FamilyName_Spell','ASC')->execute()->as_array();
			$model_child = Model::factory('child');
			//获取最新认定分区
			foreach ($child_Info as $key => $val){
				//$recog_Info = $model_child->getChildRecog($val['ID']);
				$recog_Info = self::getChildTIMERecog($val['ID'],$val['LeaveDate']);
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Data'=>'');
				$child_Info[$key]=array_merge($val,$recog_Info);
			}
			return $child_Info;
		} catch (Exception $e) {	
			echo $e->getMessage();
		}	
	}
	
	
	/**
	 * 名称搜索
	 */
	public  function searchByName($name){
		try {
			$table = Cache::instance()->get('table_child_1_base');		
			$model_child = Model::factory('child');
			$child_Info = DB::select()->from($table)->where(DB::expr('CONCAT(`FamilyName`,`GivenName`)'),'LIKE',"%{$name}%")->and_where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',date('Y-m-d'))->and_where_close()->and_where('EnterDate','<=',date('Y-m-d'))->order_by('FamilyName_Spell','ASC')->execute()->as_array();
			foreach ($child_Info as $key =>$val){
				//$recog_Info = $model_child->getChildRecog($val['ID']);
				$recog_Info = self::getChildTIMERecog($val['ID'],date('Y-m-d'));
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Data'=>'');
				$child_Info[$key] = array_merge($val,$recog_Info);

				//登降圆状况获取
				$checkInfo=self::checkInfo($val['ID'],$val['Child_Id']);
				$child_Info[$key]['checkInfo']=$checkInfo;
			}			
			return $child_Info;
		} catch (Exception $e) {		
			$e->getMessage();		
		}
	}
	
	/**
	 * 当月生日
	 * @param unknown $month
	 * @return multitype:Ambigous <Ambigous, multitype:, multitype:unknown NULL >
	 */
	public function searchByBirthdayM($month){
		try {		
			$table = Cache::instance()->get('table_child_1_base');
			$child_Info = DB::select()->from($table)->where('Birthday','LIKE',"%-{$month}-%")->and_where('LeaveDate','=','0000-00-00')->order_by('FamilyName_Spell','ASC')->execute()->as_array();
			return  $child_Info;		
		} catch (Exception $e) {
					
			$e->getMessage();
		
		}
	}
	
	/**
	 * 20170412由于base表中ID和Child_Id的错乱，修正参数
	 * 验证登降圆情况
	 * @return 0  表示没数据
	 * @return 1  表示退圆
	 * @return 2  表示迟到
	 * @return 3  表示休息
	 * @return 4  表示在园中
	 * 
	 */
	public function checkInfo($child_base_id,$child_id){
		$nowDate=date('Y-m-d');
		//获取这个孩子当天的考勤记录		
		$day_raw_data = DB::select()->from('day_raw_data')->where('Day_Date','=',$nowDate)->and_where('Child_1_Base_ID','=',$child_base_id)->execute()->current();
		if(!empty($day_raw_data)){			
			if(!empty($day_raw_data['Out_Time'])){
				return array('href'=>FALSE,'state'=>'<span class="blue">降園済</span>','in_Time'=>$day_raw_data['In_Time'],'out_Time'=>$day_raw_data['Out_Time']);
			}else{
				return array('href'=>FALSE,'state'=>'<span class="brown">在園中</span>','in_Time'=>$day_raw_data['In_Time'],'out_Time'=>$day_raw_data['Out_Time']);
			}
			//获取当天家长的信息
		}
		//获取当天家长提交的信息
		$table = Cache::instance()->get('table_communication');
		$child_Comm_Info = DB::select()->from($table)
							->where('Child_Id','=',$child_id)
							->and_where_open()->where('Late','IS NOT',NULL)->or_where('Rest','IS NOT',NULL)->and_where_close()
							->and_where('LeaveDate','<=',date('Y-m-d'))
							->and_where('LeaveDate_End','>=',date('Y-m-d'))
							->order_by('Submit_Date','DESC')->limit(1)->execute()->current();
		
		if(empty($child_Comm_Info)){
			return array('href'=>FALSE,'state'=>'<span class="blue">降園済</a>','in_Time'=>'','out_Time'=>'');
		}else{
			if($child_Comm_Info['Late']!=NULL){
				return array('href'=>$child_Comm_Info['ID'],'state'=>'<span class="deepblue">遅　刻</span>','in_Time'=>'','out_Time'=>'');
			}else if($child_Comm_Info['Rest']!=NULL){
				return array('href'=>$child_Comm_Info['ID'],'state'=>'<span class="red">お休み</span>','in_Time'=>'','out_Time'=>'');
			}
		}
	}
	
	
	
	
	/**
	 * 根据星期几获取当天课外活动
	 */
	public function getActtivityByWeek($yearMonDay){		
		try {
			$weekDay = date('D',strtotime($yearMonDay));				
			$table = Cache::instance()->get('table_master_activitiesset');
			$rst= DB::select()->from($table)->where('Activity_Week','=',$weekDay)->and_where('Activity_Checked','=',1)->execute()->as_array();		
			return empty($rst)?array():$rst;
		
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	
	/**
	 * 获取原先存储的数据信息
	 * @param unknown $yearMonDay
	 */
	public function getOldDayDetail($yearMonDay)
	{
		try {
			$table_Day = Cache::instance()->get('table_day_detail');
			$rst = DB::select()->from($table_Day)->where('Day_Date','=',$yearMonDay)->execute()->as_array();
			
			$model_child = Model::factory('child');
			foreach($rst as $key => $val){
				$rst[$key]['day_detail_ID'] = $val['ID'];
				$tmpChild = $model_child->step1_selectByKey($val['Child_1_Base_ID']);
				$rst[$key]['ID'] = $tmpChild['ID'];
				$rst[$key] = array_merge($tmpChild,$rst[$key],array('fromChange'=>0));
			}
			return $rst;
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	
	
	/**
	 * 获取孩子当前的区分
	 * @param unknown $ID
	 * @param unknown $datetime
	 * @return NULL|boolean
	 */
	public function getChildTIMERecog($ID,$datetime)
	{
		try {
			$table = Cache::instance()->get('table_child_recog');
			return DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->and_where('Recog_Date','<=',$datetime)->and_where('Recog_Date','IS NOT',NULL)->order_by('Recog_ID','DESC')->limit(1)->execute()->current();
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * 查询【登降园】设置时间的参考值
	 * 
	 * 1号認定
	 * 預かり保育：7：30～8：30, 14：00～18：30において該当する時間数
	 * ただし「課外活動」に✔が入っている場合は、14:00～15:00の1時間は「預かり保育」の時間に加算しない。
	 * 
	 * 教育時間：9：30～13:30において該当する時間数。ただし「長期休暇」に✔が入っている場合は、0：00時間とする。
	 * 
	 * 延長保育：18：30～19：30において該当する時間数。
	 * 
	 * 補助金対象：7：30～9：30, 13：30～18：30において該当する時間数。
	 *
	 'R1_TIMES' => array(
		'DELAYED_TIMES'=>array(array('07:30:00','08:30:00'),array('14:00:00','18:30:00')),
		'STUDY_TIMES'=>array('09:30:00','13:30:00'),
		'EXTENSION_TIMES'=>array('18:30:00','19:30:00'),
		'GRANTS_TIMES'=>array(array('07:30:00','09:30:00'),array('13:30:00','18:30:00')),
		'DELAYED_TIMES_WEEKEND'=>array('07:30:00','18:30:00'),
		'ACTIVITIES_TIMES'=>array('14:00:00','15:00:00')		//課外活動
	 ),
	
	 *
	 * 2号標準
	 * 通常保育：7：30～18：30において該当する時間数。		 * 
	 * ただし「課外活動」に✔が入っている場合は、14:00～15:00の1時間は「通常保育」の時間に加算しない。
	 * 
	 * 延長保育：18：30～19：30において該当する時間数。
	 * 
	 * 所定保育時間： 「通常保育」＋「延長保育」
	 *
	 'R2_TIMES' => array(
			'USUALLY_TIMES'=>array('07:30:00','18:30:00'),
			'EXTENSION_TIMES'=>array('18:30:00','19:30:00'),
			'ACTIVITIES_TIMES'=>array('14:00:00','15:00:00')	//課外活動
	 ),
	
	 *
	 * 2号時短
	 *預かり保育：7：30～9：00, 17：00～18：30において該当する時間数。
	 *
	 *通常保育：9：00～17：00において該当する時間数。
	 *ただし「課外活動」に✔が入っている場合は、14:00～15:00の1時間は「通常保育」の時間に加算しない。
	 *
	 *延長保育：18：30～19：30において該当する時間数。
	 *
	 *所定保育時間： 「預かり保育」＋「通常保育」＋「延長保育」
	 *
	 'R2S_TIMES' => array(
			'DELAYED_TIMES'=>array(array('07:30:00','09:00:00'),array('17:00:00','18:30:00')),
			'USUALLY_TIMES'=>array('09:00:00','14:00:00','15:00:00','17:00:00'),
			'EXTENSION_TIMES'=>array('18:30:00','19:30:00')
	 ),
	
	 *
	 * 3号標準 
	 * 通常保育：7：30～18：30において該当する時間数。
	 * 
	 * 延長保育：18：30～19：30において該当する時間数。
	 * 
	 * 所定保育時間： 「通常保育」＋「延長保育」 
	 *
	 'R3_TIMES' => array(
			'USUALLY_TIMES'=>array('07:30:00','18:30:00'),
			'EXTENSION_TIMES'=>array('18:30:00','19:30:00')
	 ),
	
	 *
	 * 3号時短
	 * 預かり保育：7：30～9：00, 17：00～18：30において該当する時間数。
	 * 
	 * 通常保育：9：00～17：00において該当する時間数。
	 * 
	 * 延長保育：18：30～19：30において該当する時間数。
	 * 
	 * 所定保育時間： 「預かり保育」＋「通常保育」＋「延長保育」 
	 *
	 'R3S_TIMES' => array(
			'DELAYED_TIMES'=>array(array('07:30:00','09:00:00'),array('17:00:00','18:30:00')),
			'USUALLY_TIMES'=>array('09:00:00','17:00:00'),
			'EXTENSION_TIMES'=>array('18:30:00','19:30:00')
	 ),
	 */
	public function getRTIMES(){
		try {
			$table_dataSet = Cache::instance()->get('table_master_dataset');
			$data = DB::select()->from($table_dataSet)->execute()->current();
			
			if(empty($data)){
				$result = array(
								'R1_TIMES' => array(
										'DELAYED_TIMES'=>array(array('07:30:00','08:30:00'),array('14:00:00','18:30:00')),
										'STUDY_TIMES'=>array('09:30:00','13:30:00'),
										'EXTENSION_TIMES'=>array('18:30:00','19:30:00'),
										'GRANTS_TIMES'=>array(array('07:30:00','09:30:00'),array('13:30:00','18:30:00')),
										'DELAYED_TIMES_WEEKEND'=>array('07:30:00','18:30:00'),
										'ACTIVITIES_TIMES'=>array('14:00:00','15:00:00')
								),
								
								'R2_TIMES' => array(
										'USUALLY_TIMES'=>array('07:30:00','18:30:00'),
										'EXTENSION_TIMES'=>array('18:30:00','19:30:00'),
										'ACTIVITIES_TIMES'=>array('14:00:00','15:00:00')
								),
								
								'R2S_TIMES' => array(
										'DELAYED_TIMES'=>array(array('07:30:00','09:00:00'),array('17:00:00','18:30:00')),
										'USUALLY_TIMES'=>array('09:00:00','17:00:00'),
										'EXTENSION_TIMES'=>array('18:30:00','19:30:00'),
										'ACTIVITIES_TIMES'=>array('14:00:00','15:00:00')
								),													
						
								'R3_TIMES' => array(
										'USUALLY_TIMES'=>array('07:30:00','18:30:00'),
										'EXTENSION_TIMES'=>array('18:30:00','19:30:00')
								),
								
								'R3S_TIMES' => array(
										'DELAYED_TIMES'=>array(array('07:30:00','09:00:00'),array('17:00:00','18:30:00')),
										'USUALLY_TIMES'=>array('09:00:00','17:00:00'),
										'EXTENSION_TIMES'=>array('18:30:00','19:30:00')
								));
				
			}else{
				$result = array(
						'R1_TIMES' => array(
								'DELAYED_TIMES'=>array(array($data['Standard_Begin1'],$data['Standard_End1']),array($data['Standard_Begin2'],$data['Standard_End2'])),
								'STUDY_TIMES'=>array($data['Education_Begin'],$data['Education_End']),
								'EXTENSION_TIMES'=>array($data['ExtendGuar_Begin'],$data['ExtendGuar_End']),
								'GRANTS_TIMES'=>array(array($data['Support_Begin1'],$data['Support_End1']),array($data['Support_Begin2'],$data['Support_End2'])),
								'DELAYED_TIMES_WEEKEND'=>array($data['Standard_Begin1'],$data['Standard_End2']),
								'ACTIVITIES_TIMES'=>array($data['Activities_Begin'],$data['Activities_End'])
						),
				
						'R2_TIMES' => array(
								'USUALLY_TIMES'=>array($data['CareStandard_Begin'],$data['CareStandard_End']),
								'EXTENSION_TIMES'=>array($data['ExtendGuar_Begin'],$data['ExtendGuar_End']),
								'ACTIVITIES_TIMES'=>array($data['Activities_Begin'],$data['Activities_End'])
						),
				
						'R2S_TIMES' => array(
								'DELAYED_TIMES'=>array(array($data['Short_Begin1'],$data['Short_End1']),array($data['Short_Begin2'],$data['Short_End2'])),
								'USUALLY_TIMES'=>array($data['CareShort_Begin'],$data['CareShort_End']),
								'EXTENSION_TIMES'=>array($data['ExtendGuar_Begin'],$data['ExtendGuar_End']),
								'ACTIVITIES_TIMES'=>array($data['Activities_Begin'],$data['Activities_End'])
						),
				
						'R3_TIMES' => array(
								'USUALLY_TIMES'=>array('CareStandard_Begin','CareStandard_End'),
								'EXTENSION_TIMES'=>array($data['ExtendGuar_Begin'],$data['ExtendGuar_End'])
						),
				
						'R3S_TIMES' => array(
								'DELAYED_TIMES'=>array(array($data['Short_Begin1'],$data['Short_End1']),array($data['Short_Begin2'],$data['Short_End2'])),
								'USUALLY_TIMES'=>array($data['CareShort_Begin'],$data['CareShort_End']),
								'EXTENSION_TIMES'=>array($data['ExtendGuar_Begin'],$data['ExtendGuar_End'])
						));
				
			}
			return $result;
		} catch (Exception $e) {
		}
		
	}
	
	/**
	 * /**
	 * 获取某天登降圆详细信息
	 * @param unknown $yearMonDay
	 * @param unknown $chk_activities
	 * @param unknown $isholidays
	 * @param unknown $isLongHoliday
	 */
	public function getDayRawDetail($yearMonDay,$chk_activities,$isholidays,$isLongHoliday,$request)
	{
		try {
			
			$table_base = Cache::instance()->get('table_child_1_base');
			$table_raw = Cache::instance()->get('table_day_raw_data');
					
			$child_List = DB::select()->from($table_base)->where('EnterDate','<=',$yearMonDay)->and_where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>=',$yearMonDay)->and_where_close()->order_by('FamilyName_Spell','ASC')->execute()->as_array();
			
			$w =date('w',strtotime($yearMonDay));
			//查询【登降园】设置时间的参考值
			$RTIMES = self::getRTIMES();
			
			//$parameter = Kohana::$config->load('parameter');
			
			//修改页面上方参数 发生页面刷新 保留下方list中修改的内容
			$submitChangeChildIdArr = array();
			if($request->method()=='POST'){
				$submit_day_detail = self::Validation_day_detail($request);
				foreach ($submit_day_detail as $key => $val){
					if($val['fromChange']){						
						$submitChangeChildIdArr[$key] = $val['Child_1_Base_ID'];
					}
				}			
			}
			
			foreach ($child_List as $key => $val){
				//修改页面上方参数 发生页面刷新 保留下方list中修改的内容
				if(!empty($submitChangeChildIdArr)){
					$tmpkey = array_search($val['ID'], $submitChangeChildIdArr);
					if($tmpkey!==FALSE){
						$child_List[$key] = array_merge($val,$submit_day_detail[$tmpkey]);
						continue;
					}
				}
				
				
				$act_chk = FALSE;
				if(!empty($chk_activities)&&!empty($val['Activities'])){
					$child_select_act = explode(';',$val['Activities']);
					//交集计算出这个孩子这一天是否有课外活动
					$can_select_arr = array_intersect($chk_activities,$child_select_act);
					foreach($can_select_arr as $key_c => $val_c){
						if($yearMonDay>=$val['Activities_Date_'.$val_c]){
							$act_chk = TRUE;
						}
					}
				}
				
				//登降圆交通方式
				$busCome_chk=FALSE;
				if($val['Traffic_Way']=='Bus'){
					$busCome_chk=TRUE;
				}
				$busGo_chk=FALSE;
				if($val['Leave_Way']=='Bus'){
					$busGo_chk=TRUE;
				}
							
				
				//获取当前孩子的区分
				$rstRecog = self::getChildTIMERecog($val['ID'],$yearMonDay);
				if(!empty($rstRecog)){
					$recog_Info = array('Recog_Type'=>$rstRecog['Recog_Type']);
				}else{
					unset($child_List[$key]);
					continue;
				}
				
				$rst = DB::select()->from($table_raw)->where('Day_Date','=',$yearMonDay)->and_where('Child_1_Base_ID','=',$val['ID'])->execute()->current();
				
				if(empty($rst)){
					$Day = array('day_detail_ID'=>'','Day_Date'=>$yearMonDay,'In_Time'=>'','Out_Time'=>'','On_Time'=>'','Delayed_Times'=>'','Usually_Times'=>'','Study_Times'=>'','Extension_Times'=>'','All_Times'=>'','Grants_Times'=>'','Day_Remark'=>'','showStatus'=>'','grantsStatus'=>'','Activity_Checked'=>FALSE,'BusCome_Checked'=>FALSE,'BusGo_Checked'=>FALSE,'fromChange'=>0);
				}else{
					if($recog_Info['Recog_Type']=='R1'){
						/*
						 * 1号標準の土曜日、日曜日および祝日の算出方法
						* 預かり保育：7：30～18：30において該当する時間数。
						* 「課外活動」の✔はすべてOFFにし、グレーアウトします。
						*/
						if($w==0||$w==6||$isholidays){
							$act_chk = FALSE;
						}
						$Day = self::computationalTimeR1($RTIMES['R1_TIMES'],$w,$act_chk,$busCome_chk,$busGo_chk,$isholidays,$isLongHoliday,$rst);
					}else if($recog_Info['Recog_Type']=='R2'){
						$Day = self::computationalTimeR2($RTIMES['R2_TIMES'],$act_chk,$rst);
					}else if($recog_Info['Recog_Type']=='R2S'){
						$Day = self::computationalTimeR2S($RTIMES['R2S_TIMES'],$act_chk,$busCome_chk,$busGo_chk,$rst);
					}else if($recog_Info['Recog_Type']=='R3'){
						$Day = self::computationalTimeR3($RTIMES['R3_TIMES'],$rst);
					}else if($recog_Info['Recog_Type']=='R3S'){

						$Day = self::computationalTimeR3S($RTIMES['R3S_TIMES'],$rst);
					}
						

					$Day = array_merge($Day,array('fromChange'=>0));
				}
				$child_List[$key] = array_merge($val,$recog_Info,$Day);				
			}
			return $child_List;
		} catch (Exception $e) {
			echo $e->getMessage();
			return FALSE;
		}
	}
	

	
	/**
	 * 
	 * @param unknown $parR1 			参数表中设置的参数
	 * @param unknown $w				星期几 【0：星期天  6：星期六】
	 * @param unknown $act_chk			課外活動
	 * @param unknown $isLongHoliday	長期休暇
	 * @param unknown $In_Time			入园时间
	 * @param unknown $Out_Time			离园时间
	 * @return array(入园时间,离园时间,在園時間,預かり保育,教育時間,延長保育,所定保育時間,補助金対象,備考)
	 */
	public static function computationalTimeR1($parR1,$w,$act_chk,$busCome_chk,$busGo_chk,$isholidays,$isLongHoliday,$rst_Day)
	{
		$In_Time = $rst_Day['In_Time'];
		$Out_Time = $rst_Day['Out_Time'];
		if(!empty($In_Time)&&!empty($Out_Time)){
			if($In_Time>$Out_Time){
				$tmp = $Out_Time;
				$Out_Time = $In_Time;
				$In_Time = $tmp;
			}
		}
		
		$parR1 = Public_Times::strTime($parR1);
		
		$On_Time = "0:00";
		$Delayed_Times = '0:00';
		$Study_Times = '0:00';
		$Extension_Times = '0:00';
		$All_Times = '0:00';
		$Grants_Times = '0:00';
		if(!empty($In_Time)&&!empty($Out_Time)){
			$iTimes = strtotime($In_Time);
			$oTimes = strtotime($Out_Time);
			
			$On_Time = Public_Times::timediff($oTimes-$iTimes);
			//计算 所定保育時間  使用
			$All_Times_Num = 0; 
			
			if($w>0&&$w<6&&!$isholidays)
			{					
				//預かり保育				
				$Delayed_Times_Num = 0;
				//计算上午的【預かり保育】时间
				if(!$busCome_chk){//バス行き:登園時間が9：30より前に打刻されていても、「預かり保育」の時間に加算しない。				
					if($iTimes<$parR1['DELAYED_TIMES'][0][1]){
						$m_s = $iTimes<$parR1['DELAYED_TIMES'][0][0]?$parR1['DELAYED_TIMES'][0][0]:$iTimes;
						$m_e = $oTimes>$parR1['DELAYED_TIMES'][0][1]?$parR1['DELAYED_TIMES'][0][1]:$oTimes;
						$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
					}
				}
				
				
				//计算下午的【預かり保育】时间
				if(!$busGo_chk){//バス帰り:降園時間が14:00よりも後に打刻されていても「預かり保育」の時間に加算しない。					
					if($oTimes>$parR1['DELAYED_TIMES'][1][0]){
						$m_s = $iTimes<$parR1['DELAYED_TIMES'][1][0]?$parR1['DELAYED_TIMES'][1][0]:$iTimes;
						$m_e = $oTimes>$parR1['DELAYED_TIMES'][1][1]?$parR1['DELAYED_TIMES'][1][1]:$oTimes;
						$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
					}
				}
				
				
				//如果这个孩子选择了课外活动 则需要减掉孩子课外活动的时间
				if($act_chk){
					$m_s = $iTimes<$parR1['ACTIVITIES_TIMES'][0]?$parR1['ACTIVITIES_TIMES'][0]:$iTimes;
					$m_e = $oTimes>$parR1['ACTIVITIES_TIMES'][1]?$parR1['ACTIVITIES_TIMES'][1]:$oTimes;
					
					if($m_s<$m_e){
						$act_DELAYED_TIME = 0;
						
						$m_s_1 = $m_s<$parR1['DELAYED_TIMES'][0][0]?$parR1['DELAYED_TIMES'][0][0]:$m_s;
						$m_e_1 = $m_e>$parR1['DELAYED_TIMES'][0][1]?$parR1['DELAYED_TIMES'][0][1]:$m_e;
						if($m_e_1>$m_s_1){
							$act_DELAYED_TIME += $m_e_1 - $m_s_1;
						}
						
						$m_s_2 = $m_s<$parR1['DELAYED_TIMES'][1][0]?$parR1['DELAYED_TIMES'][1][0]:$m_s;
						$m_e_2 = $m_e>$parR1['DELAYED_TIMES'][1][1]?$parR1['DELAYED_TIMES'][1][1]:$m_e;
						if($m_e_2>$m_s_2){
							$act_DELAYED_TIME += $m_e_2 - $m_s_2;
						}
						
						$Delayed_Times_Num -= $act_DELAYED_TIME;
						/*上面为下面的简易算法
						 *  //计算出课外活动占据了正常的保育时间
						if($m_s<=$parR1['DELAYED_TIMES'][0][0]){
							//在课外活动起始时间小于 预保育早上开始时间时 共有时间必须是 课外活动时间大于早上开始时间
							if($m_e>$parR1['DELAYED_TIMES'][0][0]){
									
								if($m_e<=$parR1['DELAYED_TIMES'][0][1]){
									$act_DELAYED_TIME = $m_e-$parR1['DELAYED_TIMES'][0][0];
								}elseif($m_e<=$parR1['DELAYED_TIMES'][1][0]){
									$act_DELAYED_TIME = $parR1['DELAYED_TIMES'][0][1]-$parR1['DELAYED_TIMES'][0][0];
								}elseif($m_e<=$parR1['DELAYED_TIMES'][1][1]){
									$act_DELAYED_TIME = $m_e-$parR1['DELAYED_TIMES'][0][0]-$parR1['DELAYED_TIMES'][1][0]+$parR1['DELAYED_TIMES'][0][1];
								}else{
									$act_DELAYED_TIME = $Delayed_Times_Num;
								}
							}
						
						}elseif ($m_s<=$parR1['DELAYED_TIMES'][0][1]){
						
							if($m_e<=$parR1['DELAYED_TIMES'][0][1]){
								$act_DELAYED_TIME = $m_e-$m_s;
							}elseif($m_e<=$parR1['DELAYED_TIMES'][1][0]){
								$act_DELAYED_TIME = $parR1['DELAYED_TIMES'][0][1]-$m_s;
							}elseif($m_e<=$parR1['DELAYED_TIMES'][1][1]){
								$act_DELAYED_TIME = $m_e-$m_s-$parR1['DELAYED_TIMES'][1][0]+$parR1['DELAYED_TIMES'][0][1];
							}else{
								$act_DELAYED_TIME = $parR1['DELAYED_TIMES'][1][1]-$m_s-$parR1['DELAYED_TIMES'][1][0]+$parR1['DELAYED_TIMES'][0][1];
							}
						
						}elseif ($m_s<=$parR1['DELAYED_TIMES'][1][0]){
						
							if($m_e<=$parR1['DELAYED_TIMES'][1][0]){
								$act_DELAYED_TIME = 0;
							}elseif($m_e<=$parR1['DELAYED_TIMES'][1][1]){
								$act_DELAYED_TIME = $m_e-$parR1['DELAYED_TIMES'][1][0];
							}else{
								$act_DELAYED_TIME = $parR1['DELAYED_TIMES'][1][1]-$parR1['DELAYED_TIMES'][1][0];
							}
						}elseif ($m_s<=$parR1['DELAYED_TIMES'][1][1]){
						
							if($m_e<=$parR1['DELAYED_TIMES'][1][1]){
								$act_DELAYED_TIME = $m_e-$m_s;
							}else{
								$act_DELAYED_TIME = $parR1['DELAYED_TIMES'][1][1]-$m_s;
							}
						}
						$Delayed_Times_Num -= $act_DELAYED_TIME; */
					}
				}				
				$Delayed_Times = Public_Times::timediff($Delayed_Times_Num);
				$All_Times_Num += $Delayed_Times_Num;				
				
				//教育時間
				$Study_Times_Num = 0;
				if(!$isLongHoliday){
					$s_s = $iTimes<$parR1['STUDY_TIMES'][0]?$parR1['STUDY_TIMES'][0]:$iTimes;
					$s_e = $oTimes>$parR1['STUDY_TIMES'][1]?$parR1['STUDY_TIMES'][1]:$oTimes;
					$Study_Times_Num = $s_e - $s_s;
					$Study_Times_Num = $Study_Times_Num>0?$Study_Times_Num:0;					
					$Study_Times = Public_Times::timediff($Study_Times_Num);
					$All_Times_Num += $Study_Times_Num;
				}
				
				//延長保育
				$Extension_Times_Num = 0;
				if($oTimes>$parR1['EXTENSION_TIMES'][0]){
					$e_s = $iTimes<$parR1['EXTENSION_TIMES'][0]?$parR1['EXTENSION_TIMES'][0]:$iTimes;					
					$e_e = $oTimes>$parR1['EXTENSION_TIMES'][1]?$parR1['EXTENSION_TIMES'][1]:$oTimes;
					$Extension_Times_Num = $e_e - $e_s;
					$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
					$Extension_Times = Public_Times::timediff($Extension_Times_Num);
					$All_Times_Num += $Extension_Times_Num;
				}
				
				//所定保育時間 = 「預かり保育」＋「教育時間」＋「延長保育」
				$All_Times = Public_Times::timediff($All_Times_Num);
				
				//補助金対象
				$Grants_Times_Num = 0;
				if($iTimes<$parR1['GRANTS_TIMES'][0][1]){
					$g_s = $iTimes<$parR1['GRANTS_TIMES'][0][0]?$parR1['GRANTS_TIMES'][0][0]:$iTimes;					
					$g_e = $oTimes>$parR1['GRANTS_TIMES'][0][1]?$parR1['GRANTS_TIMES'][0][1]:$oTimes;					
					$Grants_Times_Num += ($g_e-$g_s)>0?($g_e-$g_s):0;
				}				
				if($oTimes>$parR1['GRANTS_TIMES'][1][0]){
					$g_s = $iTimes<$parR1['GRANTS_TIMES'][1][0]?$parR1['GRANTS_TIMES'][1][0]:$iTimes;					
					$g_e = $oTimes>$parR1['GRANTS_TIMES'][1][1]?$parR1['GRANTS_TIMES'][1][1]:$oTimes;
					$Grants_Times_Num += ($g_e-$g_s)>0?($g_e-$g_s):0;
				}
				$Grants_Times = Public_Times::timediff($Grants_Times_Num);
				
			}else{				
				//預かり保育
				$Delayed_Times_Num = 0;
				$m_s = $iTimes<$parR1['DELAYED_TIMES_WEEKEND'][0]?$parR1['DELAYED_TIMES_WEEKEND'][0]:$iTimes;
				$m_e = $oTimes>$parR1['DELAYED_TIMES_WEEKEND'][1]?$parR1['DELAYED_TIMES_WEEKEND'][1]:$oTimes;
				$Delayed_Times_Num = $m_e - $m_s;
				$Delayed_Times_Num = $Delayed_Times_Num>0?$Delayed_Times_Num:0;
				$Delayed_Times = Public_Times::timediff($Delayed_Times_Num);
				$All_Times_Num += $Delayed_Times_Num;
				
				//教育時間
				$Study_Times = '0:00';
				
				//延長保育
				$Extension_Times_Num = 0;
				if($oTimes>$parR1['EXTENSION_TIMES'][0]){
					$e_s = $iTimes<$parR1['EXTENSION_TIMES'][0]?$parR1['EXTENSION_TIMES'][0]:$iTimes;
					$e_e = $oTimes>$parR1['EXTENSION_TIMES'][1]?$parR1['EXTENSION_TIMES'][1]:$oTimes;
					$Extension_Times_Num = $e_e - $e_s;
					$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
					$Extension_Times = Public_Times::timediff($Extension_Times_Num);
					$All_Times_Num += $Extension_Times_Num;
				}
				
				//所定保育時間 = 「預かり保育」＋「教育時間」＋「延長保育」
				$All_Times = Public_Times::timediff($All_Times_Num);
				
				//補助金対象
				$Grants_Times = $All_Times;				;
			}			
		}
		
			$show = array();
			if($Delayed_Times>'0:00'){
				$show[] = '<span class=\'red\'>預かり保育</span>'	;
			}
			if($Extension_Times>'0:00'){
				$show[] = '<span class=\'red\'>延長保育</span>'	;
			}
			if($Delayed_Times=='0:00'&&$Extension_Times=='0:00'){
				$show[] = '標準時間内';
			}
			$showStatus = implode('<br />',$show);

			if($Grants_Times>'4:00'){
				$grantsStatus = '<span class=\'red\'>4時間超え</span>';
			}else{
				$grantsStatus = '4時間以内';
			}
		
		return array('day_detail_ID'=>'','Day_Date'=>$rst_Day['Day_Date'],'In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'On_Time'=>$On_Time,'Delayed_Times'=>$Delayed_Times,'Study_Times'=>$Study_Times,'Extension_Times'=>$Extension_Times,'All_Times'=>$All_Times,'Grants_Times'=>$Grants_Times,'Day_Remark'=>'','showStatus'=>$showStatus,'grantsStatus'=>$grantsStatus,'Activity_Checked'=>$act_chk,'BusCome_Checked'=>$busCome_chk,'BusGo_Checked'=>$busGo_chk);
	}
	
	/**
	 * 
	 * @param unknown $parR2		参数表中设置的参数
	 * @param unknown $act_chk		課外活動
	 * @param unknown $rst_Day		考勤时间
	 */
	public static function computationalTimeR2($parR2,$act_chk,$rst_Day)
	{
		$In_Time = $rst_Day['In_Time'];
		$Out_Time = $rst_Day['Out_Time'];
		if(!empty($In_Time)&&!empty($Out_Time)){
			if($In_Time>$Out_Time){
				$tmp = $Out_Time;
				$Out_Time = $In_Time;
				$In_Time = $tmp;
			}
		}
		
		$parR2 = Public_Times::strTime($parR2);
		
		$On_Time = "0:00";
		$Usually_Times = '0:00';
		$Extension_Times = '0:00';
		$All_Times = '0:00';
		
		if(!empty($In_Time)&&!empty($Out_Time)){
			$iTimes = strtotime($In_Time);
			$oTimes = strtotime($Out_Time);
				
			$On_Time = Public_Times::timediff($oTimes-$iTimes);
			//计算 所定保育時間  使用
			$All_Times_Num = 0;
			
			//通常保育
			$Usually_Times_Num = 0;
			$m_s =  $iTimes<$parR2['USUALLY_TIMES'][0]?$parR2['USUALLY_TIMES'][0]:$iTimes;
			$m_e =  $oTimes>$parR2['USUALLY_TIMES'][1]?$parR2['USUALLY_TIMES'][1]:$oTimes;
			$Usually_Times_Num = $m_e - $m_s;
			if($Usually_Times_Num<0){
				$Usually_Times_Num = 0;
			}else{
				//如果这个孩子选择了课外活动 则需要减掉孩子课外活动的时间
				if($act_chk){
					$m_s = $iTimes<$parR2['ACTIVITIES_TIMES'][0]?$parR2['ACTIVITIES_TIMES'][0]:$iTimes;
					$m_e = $oTimes>$parR2['ACTIVITIES_TIMES'][1]?$parR2['ACTIVITIES_TIMES'][1]:$oTimes;
					
					$m_s = $m_s<$parR2['USUALLY_TIMES'][0]?$parR2['USUALLY_TIMES'][0]:$m_s;
					$m_e = $m_e>$parR2['USUALLY_TIMES'][1]?$parR2['USUALLY_TIMES'][1]:$m_e;					
					
					$act_USUALLY_TIME = $m_e - $m_s;
					$Usually_Times_Num -= $act_USUALLY_TIME>0?$act_USUALLY_TIME:0;						
				}
			}	
						
			$Usually_Times = Public_Times::timediff($Usually_Times_Num);
			$All_Times_Num += $Usually_Times_Num;
			
			
			//延長保育
			$Extension_Times_Num = 0;
			if($oTimes>$parR2['EXTENSION_TIMES'][0]){
				$e_s = $iTimes<$parR2['EXTENSION_TIMES'][0]?$parR2['EXTENSION_TIMES'][0]:$iTimes;
				$e_e = $oTimes>$parR2['EXTENSION_TIMES'][1]?$parR2['EXTENSION_TIMES'][1]:$oTimes;
				$Extension_Times_Num = $e_e - $e_s;
				$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
				$Extension_Times = Public_Times::timediff($Extension_Times_Num);
				$All_Times_Num += $Extension_Times_Num;
			}

			//所定保育時間 = 「預かり保育」＋「延長保育」
			$All_Times = Public_Times::timediff($All_Times_Num);			
		}
		
		if($Extension_Times>'0:00'){
			$showStatus = '<span class=\'red\'>延長保育</span>';
		}else{
			$showStatus = '標準時間内';
		}
		
		return array('day_detail_ID'=>'','Day_Date'=>$rst_Day['Day_Date'],'In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'On_Time'=>$On_Time,'Usually_Times'=>$Usually_Times,'Extension_Times'=>$Extension_Times,'All_Times'=>$All_Times,'Day_Remark'=>'','showStatus'=>$showStatus,'Activity_Checked'=>$act_chk,'BusCome_Checked'=>0,'BusGo_Checked'=>0);
		
	}
	
	/**
	 * 
	 * @param unknown $parR2S
	 * @param unknown $act_chk
	 * @param unknown $rst_Day
	 * @return multitype:unknown string
	 */
	public static function computationalTimeR2S($parR2S,$act_chk,$busCome_chk,$busGo_chk,$rst_Day)
	{
		$In_Time = $rst_Day['In_Time'];
		$Out_Time = $rst_Day['Out_Time'];
		if(!empty($In_Time)&&!empty($Out_Time)){
			if($In_Time>$Out_Time){
				$tmp = $Out_Time;
				$Out_Time = $In_Time;
				$In_Time = $tmp;
			}
		}
		
		$parR2S = Public_Times::strTime($parR2S);
		
		$On_Time = "0:00";
		$Delayed_Times = '0:00';
		$Usually_Times = '0:00';
		$Extension_Times = '0:00';
		$All_Times = '0:00';
		
		if(!empty($In_Time)&&!empty($Out_Time)){
			$iTimes = strtotime($In_Time);
			$oTimes = strtotime($Out_Time);
		
			$On_Time = Public_Times::timediff($oTimes-$iTimes);
			//计算 所定保育時間  使用
			$All_Times_Num = 0;
			
			//預かり保育
			$Delayed_Times_Num = 0;
			if(!$busCome_chk){//バス行き:登園時間が9：00より前に打刻されていても、「預かり保育」の時間に加算しない。				
				if($iTimes<$parR2S['DELAYED_TIMES'][0][1]){
					$m_s = $iTimes<$parR2S['DELAYED_TIMES'][0][0]?$parR2S['DELAYED_TIMES'][0][0]:$iTimes;
					$m_e = $oTimes>$parR2S['DELAYED_TIMES'][0][1]?$parR2S['DELAYED_TIMES'][0][1]:$oTimes;
					$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
				}
			}
			
			//バス帰り:特に時間加算方法に変更はありません
			if($oTimes>$parR2S['DELAYED_TIMES'][1][0]){
				$m_s = $iTimes<$parR2S['DELAYED_TIMES'][1][0]?$parR2S['DELAYED_TIMES'][1][0]:$iTimes;
				$m_e = $oTimes>$parR2S['DELAYED_TIMES'][1][1]?$parR2S['DELAYED_TIMES'][1][1]:$oTimes;
				$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
			}
			$Delayed_Times = Public_Times::timediff($Delayed_Times_Num);
			$All_Times_Num += $Delayed_Times_Num;
			
				
			//通常保育
			$Usually_Times_Num = 0;
			$m_s =  $iTimes<$parR2S['USUALLY_TIMES'][0]?$parR2S['USUALLY_TIMES'][0]:$iTimes;
			$m_e =  $oTimes>$parR2S['USUALLY_TIMES'][1]?$parR2S['USUALLY_TIMES'][1]:$oTimes;
			$Usually_Times_Num = $m_e - $m_s;
			if($Usually_Times_Num<0){
				$Usually_Times_Num = 0;
			}else{
				//如果这个孩子选择了课外活动 则需要减掉孩子课外活动的时间
				if($act_chk){
					$m_s = $iTimes<$parR2S['ACTIVITIES_TIMES'][0]?$parR2S['ACTIVITIES_TIMES'][0]:$iTimes;
					$m_e = $oTimes>$parR2S['ACTIVITIES_TIMES'][1]?$parR2S['ACTIVITIES_TIMES'][1]:$oTimes;
						
					$m_s = $m_s<$parR2S['USUALLY_TIMES'][0]?$parR2S['USUALLY_TIMES'][0]:$m_s;
					$m_e = $m_e>$parR2S['USUALLY_TIMES'][1]?$parR2S['USUALLY_TIMES'][1]:$m_e;
					
					$act_USUALLY_TIME = $m_e - $m_s;
					$Usually_Times_Num -= $act_USUALLY_TIME>0?$act_USUALLY_TIME:0;
				}
			}
		
			$Usually_Times = Public_Times::timediff($Usually_Times_Num);
			$All_Times_Num += $Usually_Times_Num;
				
			//延長保育
			$Extension_Times_Num = 0;
			if($oTimes>$parR2S['EXTENSION_TIMES'][0]){
				$e_s = $iTimes<$parR2S['EXTENSION_TIMES'][0]?$parR2S['EXTENSION_TIMES'][0]:$iTimes;
				$e_e = $oTimes>$parR2S['EXTENSION_TIMES'][1]?$parR2S['EXTENSION_TIMES'][1]:$oTimes;
				$Extension_Times_Num = $e_e - $e_s;
				$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
				$Extension_Times = Public_Times::timediff($Extension_Times_Num);
				$All_Times_Num += $Extension_Times_Num;
			}
		
			//所定保育時間 = 「預かり保育」＋「延長保育」
			$All_Times = Public_Times::timediff($All_Times_Num);
		}
		
		if($Extension_Times>'0:00'){
			$showStatus = '<span class=\'red\'>延長保育</span>';
		}else{
			$showStatus = '標準時間内';
		}
		
		return array('day_detail_ID'=>'','Day_Date'=>$rst_Day['Day_Date'],'In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'On_Time'=>$On_Time,'Delayed_Times'=>$Delayed_Times,'Usually_Times'=>$Usually_Times,'Extension_Times'=>$Extension_Times,'All_Times'=>$All_Times,'Day_Remark'=>'','showStatus'=>$showStatus,'Activity_Checked'=>$act_chk,'BusCome_Checked'=>$busCome_chk,'BusGo_Checked'=>$busGo_chk);
		
		
	}
	
	/**
	 * 
	 * @param unknown $parR3
	 * @param unknown $rst_Day
	 */
	public static function computationalTimeR3($parR3,$rst_Day)
	{
		$In_Time = $rst_Day['In_Time'];
		$Out_Time = $rst_Day['Out_Time'];
		if(!empty($In_Time)&&!empty($Out_Time)){
			if($In_Time>$Out_Time){
				$tmp = $Out_Time;
				$Out_Time = $In_Time;
				$In_Time = $tmp;
			}
		}
		
		$parR3 = Public_Times::strTime($parR3);
		
		$On_Time = "0:00";
		$Usually_Times = '0:00';
		$Extension_Times = '0:00';
		$All_Times = '0:00';
		
		if(!empty($In_Time)&&!empty($Out_Time)){
			$iTimes = strtotime($In_Time);
			$oTimes = strtotime($Out_Time);
		
			$On_Time = Public_Times::timediff($oTimes-$iTimes);
			//计算 所定保育時間  使用
			$All_Times_Num = 0;
				
			//通常保育
			$Usually_Times_Num = 0;
			$m_s =  $iTimes<$parR3['USUALLY_TIMES'][0]?$parR3['USUALLY_TIMES'][0]:$iTimes;
			$m_e =  $oTimes>$parR3['USUALLY_TIMES'][1]?$parR3['USUALLY_TIMES'][1]:$oTimes;
			$Usually_Times_Num = $m_e - $m_s;
			$Usually_Times_Num = $Usually_Times_Num>0?$Usually_Times_Num:0;		
			$Usually_Times = Public_Times::timediff($Usually_Times_Num);
			$All_Times_Num += $Usually_Times_Num;
				
				
			//延長保育
			$Extension_Times_Num = 0;
			if($oTimes>$parR3['EXTENSION_TIMES'][0]){
				$e_s = $iTimes<$parR3['EXTENSION_TIMES'][0]?$parR3['EXTENSION_TIMES'][0]:$iTimes;
				$e_e = $oTimes>$parR3['EXTENSION_TIMES'][1]?$parR3['EXTENSION_TIMES'][1]:$oTimes;
				$Extension_Times_Num = $e_e - $e_s;
				$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
				$Extension_Times = Public_Times::timediff($Extension_Times_Num);
				$All_Times_Num += $Extension_Times_Num;
			}
		
			//所定保育時間 = 「預かり保育」＋「延長保育」
			$All_Times = Public_Times::timediff($All_Times_Num);
		}
		
		if($Extension_Times>'0:00'){
			$showStatus = '<span class=\'red\'>延長保育</span>';
		}else{
			$showStatus = '標準時間内';
		}
		
		return array('day_detail_ID'=>'','Day_Date'=>$rst_Day['Day_Date'],'In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'On_Time'=>$On_Time,'Usually_Times'=>$Usually_Times,'Extension_Times'=>$Extension_Times,'All_Times'=>$All_Times,'Day_Remark'=>'','showStatus'=>$showStatus);
	}
	
	/**
	 * 
	 * @param unknown $parR3
	 * @param unknown $rst_Day
	 */
	public static function computationalTimeR3S($parR3S,$rst_Day)
	{
		$In_Time = $rst_Day['In_Time'];
		$Out_Time = $rst_Day['Out_Time'];
		if(!empty($In_Time)&&!empty($Out_Time)){
			if($In_Time>$Out_Time){
				$tmp = $Out_Time;
				$Out_Time = $In_Time;
				$In_Time = $tmp;
			}
		}
		
		$parR3S = Public_Times::strTime($parR3S);
		
		$On_Time = "0:00";
		$Delayed_Times = '0:00';
		$Usually_Times = '0:00';
		$Extension_Times = '0:00';
		$All_Times = '0:00';
		if(!empty($In_Time)&&!empty($Out_Time)){
			$iTimes = strtotime($In_Time);
			$oTimes = strtotime($Out_Time);
		
			$On_Time = Public_Times::timediff($oTimes-$iTimes);
			//计算 所定保育時間  使用
			$All_Times_Num = 0;
				
			//預かり保育
			$Delayed_Times_Num = 0;
			if($iTimes<$parR3S['DELAYED_TIMES'][0][1]){
				$m_s = $iTimes<$parR3S['DELAYED_TIMES'][0][0]?$parR3S['DELAYED_TIMES'][0][0]:$iTimes;
				$m_e = $oTimes>$parR3S['DELAYED_TIMES'][0][1]?$parR3S['DELAYED_TIMES'][0][1]:$oTimes;
				$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
			}
				
			if($oTimes>$parR3S['DELAYED_TIMES'][1][0]){
				$m_s = $iTimes<$parR3S['DELAYED_TIMES'][1][0]?$parR3S['DELAYED_TIMES'][1][0]:$iTimes;
				$m_e = $oTimes>$parR3S['DELAYED_TIMES'][1][1]?$parR3S['DELAYED_TIMES'][1][1]:$oTimes;
				$Delayed_Times_Num += ($m_e - $m_s)>0?($m_e - $m_s):0;
			}
			$Delayed_Times = Public_Times::timediff($Delayed_Times_Num);
			$All_Times_Num += $Delayed_Times_Num;
				
		
			//通常保育
			$Usually_Times_Num = 0;
			$m_s =  $iTimes<$parR3S['USUALLY_TIMES'][0]?$parR3S['USUALLY_TIMES'][0]:$iTimes;
			$m_e =  $oTimes>$parR3S['USUALLY_TIMES'][1]?$parR3S['USUALLY_TIMES'][1]:$oTimes;
			$Usually_Times_Num = $m_e - $m_s;
			$Usually_Times_Num = $Usually_Times_Num>0?$Usually_Times_Num:0;
			$Usually_Times = Public_Times::timediff($Usually_Times_Num);
			$All_Times_Num += $Usually_Times_Num;
		
			//延長保育
			$Extension_Times_Num = 0;
			if($oTimes>$parR3S['EXTENSION_TIMES'][0]){
				$e_s = $iTimes<$parR3S['EXTENSION_TIMES'][0]?$parR3S['EXTENSION_TIMES'][0]:$iTimes;
				$e_e = $oTimes>$parR3S['EXTENSION_TIMES'][1]?$parR3S['EXTENSION_TIMES'][1]:$oTimes;
				$Extension_Times_Num = $e_e - $e_s;
				$Extension_Times_Num = $Extension_Times_Num>0?$Extension_Times_Num:0;
				$Extension_Times = Public_Times::timediff($Extension_Times_Num);
				$All_Times_Num += $Extension_Times_Num;
			}
		
			//所定保育時間 = 「預かり保育」＋「延長保育」
			$All_Times = Public_Times::timediff($All_Times_Num);
		}
		
		if($Extension_Times>'0:00'){
			$showStatus = '<span class=\'red\'>延長保育</span>';
		}else{
			$showStatus = '標準時間内';
		}
		
		return array('day_detail_ID'=>'','Day_Date'=>$rst_Day['Day_Date'],'In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'On_Time'=>$On_Time,'Delayed_Times'=>$Delayed_Times,'Usually_Times'=>$Usually_Times,'Extension_Times'=>$Extension_Times,'All_Times'=>$All_Times,'Day_Remark'=>'','showStatus'=>$showStatus);
	}
	
	
	/**
	 * @param unknown $day_detail_ID
	 * @param unknown $yearMonDay
	 * @param unknown $Recog_Type
	 * @param unknown $inTime
	 * @param unknown $outTime
	 * @param unknown $activity_chk
	 * @param unknown $BusCome_chk
	 * @param unknown $BusGo_chk
	 * @param unknown $dayRemark
	 * @param unknown $isholidays
	 * @param unknown $isLongHoliday
	 * @param unknown $chk_event
	 * @return Ambigous <array(入园时间,离园时间,在園時間,預かり保育,教育時間,延長保育,所定保育時間,補助金対象,備考), multitype:unknown unknown string Ambigous <string, unknown> , multitype:unknown Ambigous <unknown, unknown> string , multitype:unknown>
	 */
	public function changeDayDetail($yearMonDay,$Recog_Type,$inTime,$outTime,$activity_chk,$busCome_chk,$busGo_chk,$isholidays,$isLongHoliday){
		try {
			
			$w =date('w',strtotime($yearMonDay));
			//查询【登降园】设置时间的参考值
			$RTIMES = self::getRTIMES();			
			//$parameter = Kohana::$config->load('parameter');			
			
			if(empty($inTime)||empty($outTime)){
				$Day = array('On_Time'=>'','Delayed_Times'=>'','Usually_Times'=>'','Study_Times'=>'','Extension_Times'=>'','All_Times'=>'','Grants_Times'=>'','showStatus'=>'','grantsStatus'=>'');
			}else{
				$rst =  array('Day_Date'=>$yearMonDay,'In_Time'=>$inTime,'Out_Time'=>$outTime);
				if($Recog_Type=='R1'){
					$Day = self::computationalTimeR1($RTIMES['R1_TIMES'],$w,$activity_chk,$busCome_chk,$busGo_chk,$isholidays,$isLongHoliday,$rst);
				}else if($Recog_Type=='R2'){
					$Day = self::computationalTimeR2($RTIMES['R2_TIMES'],$activity_chk,$busCome_chk,$busGo_chk,$rst);
				}else if($Recog_Type=='R2S'){
					$Day = self::computationalTimeR2S($RTIMES['R2S_TIMES'],$activity_chk,$busCome_chk,$busGo_chk,$rst);
				}else if($Recog_Type=='R3'){
					$Day = self::computationalTimeR3($RTIMES['R3_TIMES'],$rst);
				}else if($Recog_Type=='R3S'){
					$Day = self::computationalTimeR3S($RTIMES['R3S_TIMES'],$rst);
				}
			}
			return $Day;
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	
	/**
	 * 获取某天请求书的头部参数
	 * @param unknown $yearMonDay
	 */
	public function getDayParameter($yearMonDay)
	{
		try {
			$table_Day_Parameter = Cache::instance()->get('table_day_parameter');
			return DB::select()->from($table_Day_Parameter)->where('Para_Date','=',$yearMonDay)->limit(1)->execute()->current();
		} catch (Exception $e) {
		}		
	}
	/**
	 * 删除某天的头部参数，以及当天的所有invoice
	 * 因为每个invoice都是依赖于当天的头部参数存在的（主从关系）
	 * @param unknown $yearMonDay
	 */
	 public function delDayParameter($yearMonDay){
	 	try{
	 		$table_Day_Parameter = Cache::instance()->get('table_day_parameter');

	 		//开始事务处理存储过程
	 		DB::query(NULL, "BEGIN WORK")->execute();
	 		$rst = parent::delete($table_Day_Parameter, 'Para_Date', $yearMonDay);
	 		if($rst===FALSE){
	 			DB::query(NULL, "ROLLBACK")->execute();
	 			return FALSE;
	 		}
	 		
	 		//删除相关的invoice
	 		$table_Day = Cache::instance()->get('table_day_detail');
	 		$rst2=parent::delete($table_Day, 'Day_Date', $yearMonDay);
	 		if($rst2===FALSE){
	 			DB::query(NULL, "ROLLBACK")->execute();
	 			return FALSE;
	 		}
	 		DB::query(NULL, "COMMIT")->execute();
	 		return TRUE;
	 		
	 	}catch (Exception $e ){
	 		$e->getMessage();
	 		return FALSE;
	 	}
	 }
	
	
	
	public function Validation_day_detail($request){
		
		$day_detail_ID = $request->post('day_detail_ID');
		$Day_Date = $request->post('Day_Date');
		$In_Time = $request->post('In_Time');
		$Out_Time = $request->post('Out_Time');
		$On_Time = $request->post('On_Time');
		$Activity_Checked = $request->post('Activity_Checked');
		$BusCome_Checked = $request->post('BusCome_Checked');
		$BusGo_Checked = $request->post('BusGo_Checked');
		$Delayed_Times = $request->post('Delayed_Times');
		$Usually_Times = $request->post('Usually_Times');
		$Study_Times = $request->post('Study_Times');
		$Extension_Times = $request->post('Extension_Times');
		$All_Times = $request->post('All_Times');
		$Grants_Times = $request->post('Grants_Times');
		$showStatus = $request->post('showStatus');
		$grantsStatus = $request->post('grantsStatus');
		$Day_Remark = $request->post('Day_Remark');
		$Recog_Type = $request->post('Recog_Type');
		$Child_1_Base_ID = $request->post('Child_1_Base_ID');
		$fromChange = $request->post('fromChange');
		
		$day_detail_arr = array();
		foreach ($day_detail_ID as $key => $val)
		{			
			$day_detail_arr[] = array(
					'day_detail_ID' 	=> $val,
					'Day_Date' 			=> $Day_Date[$key],
					'In_Time' 			=> $In_Time[$key],
					'Out_Time' 			=> $Out_Time[$key],
					'On_Time' 			=> $On_Time[$key],
					'Activity_Checked' 	=> $Activity_Checked[$key],
					'BusCome_Checked' 	=> $BusCome_Checked[$key],
					'BusGo_Checked' 	=> $BusGo_Checked[$key],
					'Delayed_Times' 	=> $Delayed_Times[$key],
					'Usually_Times' 	=> $Usually_Times[$key],
					'Study_Times' 		=> $Study_Times[$key],
					'Extension_Times' 	=> $Extension_Times[$key],
					'All_Times' 		=> $All_Times[$key],
					'Grants_Times' 		=> $Grants_Times[$key],
					'showStatus' 		=> $showStatus[$key],
					'grantsStatus' 		=> $grantsStatus[$key],
					'Day_Remark' 		=> $Day_Remark[$key],
					'Recog_Type' 		=> $Recog_Type[$key],
					'Child_1_Base_ID'	=> $Child_1_Base_ID[$key],
					'fromChange' 		=> $fromChange[$key],
			);
			
		}
		return $day_detail_arr;
		
	}
	
	
	
	public function checkListUpdate($request)
	{
		try {
			
			$table_Day_Parameter = Cache::instance()->get('table_day_parameter');
			$table_day_detail = Cache::instance()->get('table_day_detail');
			
			$day_parameter_values = array(
				'Para_Date' =>$request->post('txt_Day_Y').'-'.$request->post('select_Day_M').'-'.$request->post('select_Day_D'),
			);			
			$Para_ActivityIDChecked = $request->post('chk_activities');
			$day_parameter_values['Para_ActivityIDChecked'] = empty($Para_ActivityIDChecked)?NULL:implode(';', $Para_ActivityIDChecked);
			$Para_ActivityIDS = $request->post('hidden_activities_ID');
			$day_parameter_values['Para_ActivityIDS'] = empty($Para_ActivityIDS)?NULL:implode(';', $Para_ActivityIDS);
			$Para_ActivityNAMES = $request->post('txt_activities');
			$day_parameter_values['Para_ActivityNAMES'] = empty($Para_ActivityNAMES)?NULL:implode(';', $Para_ActivityNAMES);			
			$Para_HolidayChecked = $request->post('chk_holidays');
			$day_parameter_values['Para_HolidayChecked'] = empty($Para_HolidayChecked)?0:$Para_HolidayChecked;
			$Para_LongHolidayChecked = $request->post('chk_longHoliday');
			$day_parameter_values['Para_LongHolidayChecked'] = empty($Para_LongHolidayChecked)?0:$Para_LongHolidayChecked;
			$Para_EventChecked = $request->post('chk_event');
			$day_parameter_values['Para_EventChecked'] = empty($Para_EventChecked)?0:$Para_EventChecked;
			
			$day_parameter_ID = $request->post('day_parameter_ID');
			
			//开始事务处理存储过程
			DB::query(NULL, "BEGIN WORK")->execute();
			if(!empty($day_parameter_ID)){
				$rst = parent::update($table_Day_Parameter, $day_parameter_values, 'ID', $day_parameter_ID);
				if($rst===FALSE){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}else{
				list($insert_id,$total_rows) = DB::insert($table_Day_Parameter,array_keys($day_parameter_values))->values(array_values($day_parameter_values))->execute();
				if($total_rows<1){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}
			
			
			
			$day_detail = self::Validation_day_detail($request);
			if(!empty($day_detail)){
				$detail_keys = array_keys($day_detail[0]);
				array_shift($detail_keys);
				array_pop($detail_keys);
				
				$sql_insert = DB::insert($table_day_detail,$detail_keys);
				$is_insert = FALSE;
				
				foreach ($day_detail as $key => $val){
					$day_detail_ID = array_shift($val);
					array_pop($val);					
					if(empty($day_detail_ID)){
						$sql_insert = $sql_insert->values($val);
						$is_insert = true;
					}else{
						$rst = parent::update($table_day_detail, $val, 'ID', $day_detail_ID);
						if($rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}
					}
					//在 day_raw_data表中，更新登降圆时间数据
					$In_Time=$val['In_Time'];
					$Out_Time=$val['Out_Time'];
					$ID=$val['Child_1_Base_ID'];
					$date=$val['Day_Date'];
					$table= Cache::instance()->get('table_day_raw_data');
					$rst_raw=FALSE;
					if(!empty($In_Time)||!empty($Out_Time)){
						$tmpTime=DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->and_where('Day_Date','=',$date)->execute()->as_array();
							
						if(empty($tmpTime)){
							$rst_raw=DB::insert($table,array('Day_Date','In_Time','Out_Time','Child_1_Base_ID','Updated'))->values(array($date,$In_Time,$Out_Time,$ID,'1'))->execute();
						}else{
							$rst_raw=DB::update($table)->set(array('In_Time'=>$In_Time,'Out_Time'=>$Out_Time,'Updated'=>'1'))->where('Child_1_Base_ID','=',$ID)->and_where('Day_Date','=',$date)->execute();
						}
						if($rst_raw===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}
					}
				
				}
				
				//更新
				if($is_insert){
					list($insert_id,$total_rows) = $sql_insert->execute();
					if($total_rows<1){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}				
			}
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			//echo $e->getMessage();			
			return FALSE;
		}
	}
	
		
	
	/**
	 * 获取月份的登降圆详细信息
	 * @param unknown $yearMon 查询的月份
	 * @param $ID 学生ID
	 */
	public function getMonDetail($yearMon,$ID){
	
		try {
			//获取这个孩子基本信息
			$model_child = Model::factory('child');			
			$base = $model_child->step1_selectByKey($ID);
	
	
			//基本参数定义
			$table_day_detail= Cache::instance()->get('table_day_detail');
			$table_day_para= Cache::instance()->get('table_day_parameter');
			$table_raw= Cache::instance()->get('table_day_raw_data');
			//查询【登降园】设置时间的参考值
			$RTIMES = self::getRTIMES();
			//$parameter = Kohana::$config->load('parameter');
				
			//一个月的头部参数设定
			$rst_top_para=DB::select()->from($table_day_para)->where('Para_Date','LIKE',$yearMon.'%')->execute()->as_array();
			//一个月头部参数设定的日期集合
			$rst_top_para_date=array();
			foreach ($rst_top_para as $key =>$val){
				$rst_top_para_date[$key]=$val['Para_Date'];
			}
				
			//一个月day_detail表中的数据
			$rst_mon_detail= DB::select()->from($table_day_detail)->where('Day_Date','LIKE',$yearMon.'%')->and_where('Child_1_Base_ID','=',$ID)->execute()->as_array();
	
			//一个月day_detail的日期集合
			$rst_mon_detail_date=array();
			foreach ($rst_mon_detail as $key =>$val){
				$rst_mon_detail_date[$key]=$val['Day_Date'];
			}
			
			//获取原始登降圆数据
			$rst_day_raw = DB::select()->from($table_raw)->where('Day_Date','LIKE',$yearMon.'%')->and_where('Child_1_Base_ID','=',$ID)->execute()->as_array();
			//一个月day_raw的日期集合
			$rst_mon_day_raw = array();
			foreach ($rst_day_raw as $key =>$val){
				$rst_mon_day_raw[$key]=$val['Day_Date'];
			}
			
				
			$recog_Info=array();
			//以月份的天数为数组，保存每天信息
			$dayList=array();
			//这个月的天数列表
			$days = Public_Times::getDaysList(substr($yearMon, 0,4),substr($yearMon, 5,2),'d','');
				
			foreach ($days as $key => $val){
				$Ymd = $yearMon.'-'.$val;
				
				//星期获取
				$w = Public_Times::getWeek($Ymd);
				$dayList[$val]['week'] = substr($w, 0,3);
				$dayList[$val]['canEdit'] = FALSE;
	
				//认定分区	
				$rstRecog= self::getChildTIMERecog($ID,$Ymd);
				if(!empty($rstRecog)){
					$recog_Info[$val] =$rstRecog['Recog_Type'];
				}else{
					$recog_Info[$val] ='';
					continue;
				}
				
				//在头部参数表中
				if(in_array($Ymd, $rst_top_para_date)){
					$w = date('w',strtotime($Ymd));
					
					//当天具体参数
					$tmpKey = array_search($Ymd, $rst_top_para_date);
					$rst_para = $rst_top_para[$tmpKey];
					$isholidays = empty($rst_para['Para_HolidayChecked'])?FALSE:TRUE;
					$isLongHoliday = empty($rst_para['Para_LongHoildayChecked'])?FALSE:TRUE;					
					
					//day_detail表中存在的直接使用
					if(in_array($Ymd, $rst_mon_detail_date)){
						$dayList[$val]['canEdit']=True;						
						$tmpKey = array_search($Ymd, $rst_mon_detail_date);
						$dayList[$val]= array_merge($dayList[$val],$rst_mon_detail[$tmpKey],array('isholidays'=>$isholidays,'isLongHoliday'=>$isLongHoliday,'w'=>$w));						
					}else if(in_array($Ymd, $rst_mon_day_raw)){
						$dayList[$val]['canEdit']=True;	
						
						$act_chk = FALSE;
						if(!empty($rst_para['Para_ActivityIDChecked'])&&!empty($base['Activities'])){
							$chk_activities = explode(';', $rst_para['Para_ActivityIDChecked']);
							$child_select_act = explode(';',$base['Activities']);
							//交集计算出这个孩子这一天是否有课外活动
							$can_select_arr = array_intersect($chk_activities,$child_select_act);
							foreach($can_select_arr as $key_c => $val_c){
								if($yearMon.'-'.$val>=$base['Activities_Date_'.$val_c]){
									$act_chk = TRUE;
								}
							}
						}
						
						
						$tmpKey = array_search($Ymd, $rst_mon_day_raw);
						$day_raw_data = $rst_day_raw[$tmpKey];						
						if($recog_Info[$val]=='R1'){
							/*
							 * 1号標準の土曜日、日曜日および祝日の算出方法
							* 預かり保育：7：30～18：30において該当する時間数。
							* 「課外活動」の✔はすべてOFFにし、グレーアウトします。
							*/
							if($w==0||$w==6||$isholidays){
								$act_chk = FALSE;
							}
							$Day = self::computationalTimeR1($RTIMES['R1_TIMES'],$w,$act_chk,$isholidays,$isLongHoliday,$day_raw_data);
						}else if($recog_Info[$val]=='R2'){
							$Day = self::computationalTimeR2($RTIMES['R2_TIMES'],$act_chk,$day_raw_data);
						}else if($recog_Info[$val]=='R2S'){
							$Day = self::computationalTimeR2S($RTIMES['R2S_TIMES'],$act_chk,$day_raw_data);
						}else if($recog_Info[$val]=='R3'){
							$Day = self::computationalTimeR3($RTIMES['R3_TIMES'],$day_raw_data);
						}else if($recog_Info[$val]=='R3S'){
							$Day = self::computationalTimeR3S($RTIMES['R3S_TIMES'],$day_raw_data);
						}
						$dayList[$val] = array_merge($dayList[$val],$Day,array('ID'=>'','Recog_Type'=>$recog_Info[$val],'Activity_Checked'=>$act_chk,'isholidays'=>$isholidays,'isLongHoliday'=>$isLongHoliday,'w'=>$w));						
					}					
				}
			}
			$recog_Info=array_unique($recog_Info);
			return array('base'=>$base,'monDetail'=>$dayList,'recog_Info'=>$recog_Info);
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	
	}
	
	
	
	/**
	 * @param unknown $request
	 * @return Ambigous <multitype:, string, NULL>
	 */
	
	public function Validation_monDetail($request){
		$ID=$request->post('day_detail_ID');
		$Day_Date = $request->post('hidden_Day_Date');
		$In_Time = $request->post('txt_In_Time');		
		$Out_Time = $request->post('txt_Out_Time');		
		$On_Time = $request->post('txt_On_Time');		
		$Activity_Checked = $request->post('hidden_Activity_Checked');		
		$BusCome_Checked = $request->post('hidden_BusCome_Checked');		
		$BusGo_Checked = $request->post('hidden_BusGo_Checked');		
		$Delayed_Times = $request->post('txt_Delayed_Times');		
		$Usually_Times = $request->post('txt_Usually_Times');		
		$Study_Times = $request->post('txt_Study_Times');		
		$Extension_Times = $request->post('txt_Extension_Times');		
		$All_Times = $request->post('txt_All_Times');		
		$Grants_Times = $request->post('hidden_Grants_Times');		
		$showStatus = $request->post('hidden_showStatus');		
		$grantsStatus = $request->post('hidden_grantsStatus');		
		$Day_Remark = $request->post('txt_Day_Remark');		
		$Recog_Type = $request->post('hidden_Recog_Type');
		
		$data=array();
		foreach ($ID as $key =>$val){
			$data[] = array(
					'ID' 				=> $val,
					'Day_Date' 			=> $Day_Date[$key],
					'In_Time' 			=> $In_Time[$key],
					'Out_Time' 			=> $Out_Time[$key],
					'On_Time' 			=> $On_Time[$key],
					'Activity_Checked' 	=> $Activity_Checked[$key],
					'BusCome_Checked' 	=> $BusCome_Checked[$key],
					'BusGo_Checked' 	=> $BusGo_Checked[$key],
					'Delayed_Times' 	=> $Delayed_Times[$key],
					'Usually_Times' 	=> $Usually_Times[$key],
					'Study_Times' 		=> $Study_Times[$key],
					'Extension_Times' 	=> $Extension_Times[$key],
					'All_Times' 		=> $All_Times[$key],
					'Grants_Times' 		=> $Grants_Times[$key],
					'showStatus' 		=> $showStatus[$key],
					'grantsStatus' 		=> $grantsStatus[$key],
					'Day_Remark' 		=> $Day_Remark[$key],
					'Recog_Type' 		=> $Recog_Type[$key],
					'Child_1_Base_ID'	=> $request->post('hidden_ID'),
			);
		}
	
		return $data;
	}
	
	/**
	 * monDetail数据保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function monDetail_Data(& $request){
		try {
			$data = self::Validation_monDetail($request);
			$table_day_detail = Cache::instance()->get('table_day_detail');
			$table_day_raw = Cache::instance()->get('table_day_raw_data');
			$rst='';
			DB::query(NULL, "BEGIN WORK")->execute();

			if(!empty($data)){
				$detail_keys = array_keys($data[0]);
				array_shift($detail_keys);
				$sql_insert = DB::insert($table_day_detail,$detail_keys);
				$is_insert = false;
				foreach ($data as $key=>$val){
					//将考勤数据更新到day_raw_data中
					$day_raw=DB::select()->from($table_day_raw)->where('Day_Date','=',$val['Day_Date'])->and_where('Child_1_Base_ID','=',$val['Child_1_Base_ID'])->execute()->as_array();	
					if(empty($day_raw)){
						DB::insert($table_day_raw,array('Day_Date','In_Time','Out_Time','Child_1_Base_ID','Updated'))->values(array($val['Day_Date'],$val['In_Time'],$val['Out_Time'],$val['Child_1_Base_ID'],'1'))->execute();
					}else{
						DB::update($table_day_raw)->set(array('In_Time'=>$val['In_Time'],'Out_Time'=>$val['Out_Time'],'Updated'=>'1'))->where('Day_Date','=',$val['Day_Date'])->and_where('Child_1_Base_ID','=',$val['Child_1_Base_ID'])->execute();
					}
					//
					$ID = array_shift($val);
					if(empty($ID)){
						$sql_insert = $sql_insert->values($val);
						$is_insert = true;
						
					}else{						
						$rst = parent::update($table_day_detail, $val, 'ID', $ID);
						if($rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}
					}
				}
				
				if($is_insert){
					list($insert_id,$total_rows) = $sql_insert->execute();
					if($total_rows<1){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}		
				DB::query(NULL, "COMMIT")->execute();
			}
			return TRUE;
			
		}catch (Exception $e){
			$e->getMessage();
			$rst=false;
		}
	}
	
	/**
	 * 
	 */
	public function getListTempDemand($yearMonth){
		try {
			//
			$table = Cache::instance()->get('table_temp_demand');
			$temp_demand = DB::select()->from($table)->where('Date','=',$yearMonth)->execute()->current();
			$is_old = FALSE;
			if(!empty($temp_demand)){
				$is_old = TRUE;
				$Child_ID_Arr = explode(';',$temp_demand['Child_ID_Arr']);
				$Support_Child_ID_Arr = explode(';',$temp_demand['Support_Child_ID_Arr']);
			}
			
			
			//获取这一个月的【土・日曜日、祝日】
			$t = date('t',strtotime($yearMonth.'-01'));
			$rstDays = array();
			for ($i=1;$i<=$t;$i++){
				$tmpDay = $yearMonth.'-'.substr('0'.$i,-2);
				$w = date('w',strtotime($tmpDay));
				if($w==0||$w==6){
					$rstDays[] = $tmpDay;					
				}
			}
			//查询获取祝日
			$table_Day_Parameter = Cache::instance()->get('table_day_parameter');
			$rst = DB::select()->from($table_Day_Parameter)->where('Para_HolidayChecked','=',1)->and_where('Para_Date','LIKE',$yearMonth.'%')->execute()->as_array();
			foreach($rst as $key => $val){
				$rstDays[] = $val['Para_Date'];				
			}
			$rstDays = array_unique($rstDays);
			$child_list = array();			
			$table_day_detail = Cache::instance()->get('table_day_detail');			
			$child_Info = self::getList();

			//修正39  保育料の設定   1号認定 不为0的情况下  生活保護世帯に該当 可以选择
			$table_costSet_1 = Cache::instance()->get('table_master_costset_1');
			$data_costSet_1_1	= DB::select("SetNumber")->from($table_costSet_1)->where('Project','=',1)->execute()->get("SetNumber");
			
			
			foreach ($child_Info as $key=>$val){								
				if($val['Recog_Type']=='R1'){
					$canEditCheckBox = FALSE;
					if($val['Recog_Project']==1){//&&$data_costSet_1_1>0
						$canEditCheckBox = TRUE;
					}
					if($is_old){
						if(in_array($val['ID'],$Child_ID_Arr)){
							$support = in_array($val['ID'],$Support_Child_ID_Arr);
							if($support) $canEditCheckBox = TRUE;						
							$child_list[] =  array_merge($child_Info[$key],array('state'=>'normal','support'=>$support,'canEditCheckBox'=>$canEditCheckBox));
						}else{
							$child_list[] =  array_merge($child_Info[$key],array('state'=>'new','support'=>$canEditCheckBox,'canEditCheckBox'=>$canEditCheckBox));
						}						
					}else{
						$child_list[] =  array_merge($child_Info[$key],array('state'=>'new','support'=>$canEditCheckBox,'canEditCheckBox'=>$canEditCheckBox));						
					}
					continue;
				}
				if($is_old){
					if(in_array($val['ID'],$Child_ID_Arr)){
						$support = in_array($val['ID'],$Support_Child_ID_Arr);
						if($support) $canEditCheckBox = TRUE;
						$child_list[] =  array_merge($child_Info[$key],array('state'=>'normal','support'=>$support,'canEditCheckBox'=>$canEditCheckBox));
					}
				}
			}
			
			$support_OverFour = $support_LessFour = $support_OverEight = $support_LessEight = $notSupport_OverFour = $notSupport_LessFour = $notSupport_OverEight = $notSupport_LessEight = 0;
			foreach($child_list as $key => $val){
				$tmpOverFour = DB::select(DB::expr('count(ID) AS Num'))->from($table_day_detail)->where('Child_1_Base_ID','=',$val['ID'])->and_where('Grants_Times','>','4:00')->and_where('Day_Date','LIKE',$yearMonth.'%')->and_where('Day_Date','NOT IN',$rstDays)->execute()->get('Num');
				$tmpLessFour = DB::select(DB::expr('count(ID) AS Num'))->from($table_day_detail)->where('Child_1_Base_ID','=',$val['ID'])->and_where('Grants_Times','>','0')->and_where('Grants_Times','<=','4:00')->and_where('Day_Date','LIKE',$yearMonth.'%')->and_where('Day_Date','NOT IN',$rstDays)->execute()->get('Num');
					
				$tmpOverEight = DB::select(DB::expr('count(ID) AS Num'))->from($table_day_detail)->where('Child_1_Base_ID','=',$val['ID'])->and_where('Grants_Times','>','8:00')->and_where('Day_Date','LIKE',$yearMonth.'%')->and_where('Day_Date','IN',$rstDays)->execute()->get('Num');
				$tmpLessEight = DB::select(DB::expr('count(ID) AS Num'))->from($table_day_detail)->where('Child_1_Base_ID','=',$val['ID'])->and_where('Grants_Times','>','0')->and_where('Grants_Times','<=','8:00')->and_where('Day_Date','LIKE',$yearMonth.'%')->and_where('Day_Date','IN',$rstDays)->execute()->get('Num');
				
				$child_list[$key] = array_merge($child_list[$key],array('overFour'=>$tmpOverFour,'lessFour'=>$tmpLessFour,'overEight'=>$tmpOverEight,'lessEight'=>$tmpLessEight));
							
				//计算回合总数（2017-02-17修正）
				if($val['support']){
					$support_OverFour += $tmpOverFour>0?$tmpOverFour:0;
					$support_LessFour += $tmpLessFour>0?$tmpLessFour:0;
					$support_OverEight += $tmpOverEight>0?$tmpOverEight:0;
					$support_LessEight += $tmpLessEight>0?$tmpLessEight:0;
				}else{
					$notSupport_OverFour += $tmpOverFour>0?$tmpOverFour:0;
					$notSupport_LessFour += $tmpLessFour>0?$tmpLessFour:0;
					$notSupport_OverEight += $tmpOverEight>0?$tmpOverEight:0;
					$notSupport_LessEight += $tmpLessEight>0?$tmpLessEight:0;
				}
			}
			
			$staffInfo = Model::factory('staffInfo')->getStaffList();			
			return array(
				'child_list'=>$child_list,
				'support_OverFour'=>$support_OverFour,
				'support_LessFour'=>$support_LessFour,
				'support_OverEight'=>$support_OverEight,
				'support_LessEight'=>$support_LessEight,
				'notSupport_OverFour'=>$notSupport_OverFour,
				'notSupport_LessFour'=>$notSupport_LessFour,
				'notSupport_OverEight'=>$notSupport_OverEight,
				'notSupport_LessEight'=>$notSupport_LessEight,
				'temp_demand'=>$temp_demand,
				'staffInfo'=>$staffInfo
			);		
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	
	public function  Validation_tempDemand($request){
		$Date = $request->post('select_year').'-'.$request->post('select_month');
		$Output_Date = $request->post('txt_output_year').'-'.$request->post('select_output_month').'-'.$request->post('select_output_day');
		$Child_ID = $request->post('txt_Child_ID');
		$Support_Child_ID = $request->post('chk_Support_Child_ID');
		$Child_ID_Arr = empty($Child_ID)?'':implode(';',$Child_ID);
		$Support_Child_ID_Arr = empty($Support_Child_ID)?'':implode(';',$Support_Child_ID);		
		$Outschool_Support_LessEignt_Num = $request->post('txt_Outschool_Support_LessEignt_Num');
		$Outschool_Support_OverEignt_Num = $request->post('txt_Outschool_Support_OverEignt_Num');
		$Outschool_Other_LessEight_Num = $request->post('txt_Outschool_Other_LessEight_Num');
		$Outschool_Other_OverEight_Num = $request->post('txt_Outschool_Other_OverEight_Num');		
		$Inschool_money = $request->post('txt_Inschool_money');
		$Outschool_money = $request->post('txt_Outschool_money');
		$Staff_ID = $request->post('chk_Staff_ID');
		$Staff_ID_Arr = empty($Staff_ID)?'':implode(';',$Staff_ID);
		
		return array(
				'Date'=>$Date,
				'Output_Date'=>$Output_Date,
				'Child_ID_Arr'=>$Child_ID_Arr,
				'Support_Child_ID_Arr'=>$Support_Child_ID_Arr,
				'Outschool_Support_LessEignt_Num'=>$Outschool_Support_LessEignt_Num,
				'Outschool_Support_OverEignt_Num'=>$Outschool_Support_OverEignt_Num,
				'Outschool_Other_LessEight_Num'=>$Outschool_Other_LessEight_Num,
				'Outschool_Other_OverEight_Num'=>$Outschool_Other_OverEight_Num,
				'Inschool_money'=>$Inschool_money,
				'Outschool_money'=>$Outschool_money,
				'Staff_ID_Arr'=>$Staff_ID_Arr
		);
	}
	
	public function setListTempDemand($request){
		try {
			$table = Cache::instance()->get('table_temp_demand');
			$data = self::Validation_tempDemand($request);
			$Num = DB::select(DB::expr('count(Date) AS Num'))->from($table)->where('Date','=',$data['Date'])->execute()->get('Num');
			if($Num){
				DB::update($table)->set($data)->where('Date','=',$data['Date'])->execute();
			}else{
				DB::insert($table,array_keys($data))->values(array_values($data))->execute();
			}
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}
		
		
	}
	
	/**
	 * 获取午睡检查的时刻表(old)
	 * @param unknown $child_id
	 * @param unknown $date
	 * @return Ambigous <multitype:, multitype:unknown NULL >|boolean
	 */
	public function listNapCheckDetailed($child_id,$date){
		try {
			$table_nap_check = Cache::instance()->get('table_nap_check');			
			return DB::select()->from($table_nap_check)->where('Child_1_Base_ID','=',$child_id)->and_where('Date','=',$date)->order_by('ID','ASC')->execute()->as_array();	
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	/**
	 * 获取午睡就床与起床的时刻表(old)
	 * @param unknown $child_id
	 * @param unknown $date
	 * @return Ambigous <multitype:, multitype:unknown NULL >|boolean
	 */
	public function listSleepCheckDetailed($child_id,$date){
		try {
			$table_nap_check = Cache::instance()->get('table_sleep_check');
			return DB::select()->from($table_nap_check)->where('Child_1_Base_ID','=',$child_id)->and_where('Date','=',$date)->order_by('ID','ASC')->execute()->as_array();
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	/**
	 * 获取起床，就床，午睡就床与起床的时刻表（new）
	 * @param unknown $child_id
	 * @param unknown $date
	 */
	public function listSleepNapDetailed($child_id,$date){
		try {
			$table_sleep_nap_check = Cache::instance()->get('table_sleep_nap_check');
			return DB::select()->from($table_sleep_nap_check)->where('Child_1_Base_ID','=',$child_id)->and_where('Date','=',$date)->order_by('ID','ASC')->execute()->as_array();
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	/**
	 * 读取起床，就床，午睡check数据（old 数据表合并前）
	 * @param unknown $yearMonDay
	 * @return multitype:multitype:number  multitype:unknown number  Ambigous <Ambigous, boolean, multitype:, multitype:unknown NULL , 0, 1, 2, 3, 4, multitype:boolean string , multitype:boolean string unknown , multitype:string unknown , multitype:string NULL >
	 */
	public function listNapCheck($yearMonDay){
		
		try {
			$child_Info = self::getList();
				
			$napCheck_Num = array();	
			$sleep_Num = array();		
			foreach ($child_Info as $key => $val){
				$listDetailed = self::listNapCheckDetailed($val['ID'], $yearMonDay);//午睡检查表
				$listDetailed_sleep	 = self::listSleepCheckDetailed($val['ID'], $yearMonDay);//午睡就床与起床		

				$child_Info[$key]['Check_list'] = $listDetailed;	
				$child_Info[$key]['Sleep_list'] = $listDetailed_sleep;
				
				$checkTimeCount=0;
				foreach ($listDetailed as $key_check => $val_check){
					if(!empty($val_check['Check_Time'])){
						$checkTime=explode(';', $val_check['Check_Time']);
						$checkTimeCount=$checkTimeCount<count($checkTime)?count($checkTime):$checkTimeCount;
					}
				}								

				//午睡检查记录的回合数
				if(array_key_exists($val['Class'],$napCheck_Num)){
					$napCheck_Num[$val['Class']] = $napCheck_Num[$val['Class']]<$checkTimeCount?$checkTimeCount:$napCheck_Num[$val['Class']];
				}else{
					$napCheck_Num[$val['Class']] = $checkTimeCount;
				}
				//就床与起床记录的回合数
				if(array_key_exists($val['Class'],$sleep_Num)){
					$sleep_Num[$val['Class']] = $sleep_Num[$val['Class']]<count($listDetailed_sleep)?count($listDetailed_sleep):$sleep_Num[$val['Class']];
				}else{
					$sleep_Num[$val['Class']] = count($listDetailed_sleep);
				}
				
			}	

			return array('child_info'=>$child_Info,'napCheck_Num'=>$napCheck_Num,'sleep_Num'=>$sleep_Num);
		} catch (Exception $e) {
		}
	}
	
	/**
	 * 午睡check数据处理(old)
	 * @param unknown $request
	 * @return multitype:multitype:string unknown
	 */
	public function Validation_napCheck($request){

		$yearMonDay = $request->post('yearMonDay');
		$child_ID = $request->post('txt_child_ID');		
		$checkTimeList =$request->post('txt_Check_Time');
		$napIdList =$request->post('txt_Nap_ID');
		
		$result = array();
		foreach ($child_ID as $key => $val){
			foreach ($napIdList[$val] as $key_l => $val_l){
				$checkTime=array_filter($checkTimeList[$val][$key_l+1]);
				$result[] = array('ID'=>$val_l,'Date'=>$yearMonDay,'Check_Time'=>implode(';', $checkTime),'Child_1_Base_ID'=>$val);
			}						
		}		
		return $result;		
	}
	
	/**
	 * 起床，就床时刻处理(old)
	 * @param unknown $request
	 * @return multitype:multitype:NULL unknown
	 */
	public function Validation_sleepCheck($request){

		$yearMonDay = $request->post('yearMonDay');
		$child_ID = $request->post('txt_child_ID');
		$sleepIdList = $request->post('txt_Sleep_ID');
		$beginTimeList = $request->post('txt_Begin_Sleep_Time');
		$endTimeList = $request->post('txt_End_Sleep_Time');

		$result = array();
		foreach ($child_ID as $key => $val){
			foreach ($sleepIdList[$val] as $key_l => $val_l){
				$result[] = array('ID'=>$val_l,'Date'=>$yearMonDay,'Begin_Sleep_Time'=> $beginTimeList[$val][$key_l+1],'End_Sleep_Time'=>$endTimeList[$val][$key_l+1],'Child_1_Base_ID'=>$val);
			}
		}
		return $result;
	}
	
	/**
	 * 起床，就床，午睡check 数据读取（new）
	 * @param unknown $yearMonDay
	 * @return multitype:multitype:number  multitype:unknown number  Ambigous <boolean, multitype:, multitype:unknown NULL , Ambigous, 0, 1, 2, 3, 4, multitype:boolean string , multitype:boolean string unknown , multitype:string unknown , multitype:string NULL >
	 */
	public function listSleepNapCheck($yearMonDay){
		try {
			$child_Info = self::getList();
		
			$napCheck_Num = array();
			$sleep_Num = array();
			foreach ($child_Info as $key => $val){
				$listDetailed = self::listSleepNapDetailed($val['ID'], $yearMonDay);//午睡检查表
		
				$child_Info[$key]['Check_list'] = $listDetailed;
		
				$checkTimeCount=0;
				foreach ($listDetailed as $key_check => $val_check){
					if(!empty($val_check['Check_Time'])){
						$checkTime=explode(';', $val_check['Check_Time']);
						$checkTimeCount=$checkTimeCount<count($checkTime)?count($checkTime):$checkTimeCount;
					}
				}
		
				//午睡检查记录的回合数
				if(array_key_exists($val['Class'],$napCheck_Num)){
					$napCheck_Num[$val['Class']] = $napCheck_Num[$val['Class']]<$checkTimeCount?$checkTimeCount:$napCheck_Num[$val['Class']];
				}else{
					$napCheck_Num[$val['Class']] = $checkTimeCount;
				}
				//就床与起床记录的回合数
				if(array_key_exists($val['Class'],$sleep_Num)){
					$sleep_Num[$val['Class']] = $sleep_Num[$val['Class']]<count($listDetailed)?count($listDetailed):$sleep_Num[$val['Class']];
				}else{
					$sleep_Num[$val['Class']] = count($listDetailed);
				}
		
			}
		
			return array('child_info'=>$child_Info,'napCheck_Num'=>$napCheck_Num,'sleep_Num'=>$sleep_Num);
		} catch (Exception $e) {
		}
	}
	
	/**
	 * 起床，就床时刻和午睡check时间  数据处理（20170418新方法，将上面的两个方法合并新数据表）
	 * @param unknown $request
	 */
	public function Validation_sleepNapCheck($request){
		$sleepNapIdList = $request->post('txt_Sleep_Nap_ID');
		$yearMonDay = $request->post('yearMonDay');		
		$child_ID = $request->post('txt_child_ID');
		$checkTimeList =$request->post('txt_Check_Time');			
		$beginTimeList = $request->post('txt_Begin_Sleep_Time');
		$endTimeList = $request->post('txt_End_Sleep_Time');		
		
		$result = array();
		
		foreach ($child_ID as $key => $val){		
			foreach ($sleepNapIdList[$val] as $key_l => $val_l){
				$checkTime=array_filter($checkTimeList[$val][$key_l+1]);
				$result[] = array('ID'=>$val_l,'Date'=>$yearMonDay,'Begin_Sleep_Time'=> $beginTimeList[$val][$key_l+1],'End_Sleep_Time'=>$endTimeList[$val][$key_l+1],'Check_Time'=>implode(';', $checkTime),'Child_1_Base_ID'=>$val);
			}
		}
		return $result;
		
	}

	/**
	 * 获取已保存的延长保育信息；2-5
	 */
	public function listExtensionGet($yearMonDay){
		$table= Cache::instance()->get('table_extension');
		$rst=parent::selectByKey($table, 'Extension_Date', $yearMonDay);
		//根据班级分类
		return $rst;
	}
	
	/**
	 * 2-5:延长R3保育读取
	 * @param unknown $yearMonDay
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function ExtensionR3First($yearMonDay){
		$table= Cache::instance()->get('table_extension');
		$table_recog = Cache::instance()->get('table_child_recog');
		$ListR3 = DB::select()->from($table_recog)
		->where('Recog_Type','=','R3')
		->execute()
		->as_array();
		$R3FirstID = $ListR3[0]['Child_1_Base_ID'];
		$rst = DB::select()->from($table)
		->where('Extension_Date','=',$yearMonDay)
		->and_where('Child_1_Base_ID','=',$R3FirstID)
		->execute()
		->as_array();
		return $rst;
	}
	/**
	 * 2-5:延长R2保育读取
	 * @param unknown $yearMonDay
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function ExtensionR2First($yearMonDay){
		$table= Cache::instance()->get('table_extension');
		$table_recog = Cache::instance()->get('table_child_recog');
		$ListR3 = DB::select()->from($table_recog)
		->where('Recog_Type','=','R2')
		->execute()
		->as_array();
		$R3FirstID = $ListR3[0]['Child_1_Base_ID'];
		$rst = DB::select()->from($table)
		->where('Extension_Date','=',$yearMonDay)
		->and_where('Child_1_Base_ID','=',$R3FirstID)
		->execute()
		->as_array();
		return $rst;
	}
	
	
	
	/**
	 * 2-5 延长保育 更新保存
	 * @param unknown $request
	 */
	public function listExtensionUpdate(& $request){
		
		$Extension_Date=$request->post('yearMonDay');
		$Suggestion=$request->post('txt_Suggestion');
		$Check_Point_tmp=$request->post('chk_Check_Point');
		$Check_Point = empty($Check_Point_tmp)?NULL:implode(';', $Check_Point_tmp);
		
		$Child_1_Base_ID=$request->post('hidden_ID');
		$Go_With=$request->post('select_Go_With');
		$Come_With=$request->post('select_Come_With');
		$Item=$request->post('txt_Item');
		
		$data=array();
		foreach ($Child_1_Base_ID as $key =>$val){
			$data[$key]['Extension_Date'] = $Extension_Date;
			$data[$key]['Suggestion'] = $Suggestion;
			$data[$key]['Check_Point'] = $Check_Point;
			$data[$key]['Go_With'] = $Go_With[$key];
			$data[$key]['Come_With'] = $Come_With[$key];
			$data[$key]['Item'] = $Item[$key];
			$data[$key]['Child_1_Base_ID'] = $val;
		}
		
		$table= Cache::instance()->get('table_extension');
		//更新或新规开始
		try {
	
			DB::query(NULL, "BEGIN WORK")->execute();
			foreach ($data as $key => $val){
				$old=DB::select()->from($table)->where('Extension_Date','=',$val['Extension_Date'])->and_where('Child_1_Base_ID','=',$val['Child_1_Base_ID'])->execute()->current();				
				//更新
				if(!empty($old)){				
					$tep_rst=parent::update2($table, $val, 'Extension_Date', $val['Extension_Date'], 'Child_1_Base_ID', $val['Child_1_Base_ID']);
					if($tep_rst===FALSE){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}else{
					//新规					
					$tep_rst=parent::insert($table, $val);
					if($tep_rst===FALSE){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}
			}			
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * old 就床，起床，午睡check保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function listNapCheckUpdate(& $request){
		try {
			$data = self::Validation_napCheck($request);
			
			$data_Sleep=self::Validation_sleepCheck($request);
			//return 
			$table_nap_check = Cache::instance()->get('table_nap_check');
			$table_sleep_check = Cache::instance()->get('table_sleep_check');
			
			DB::query(NULL, "BEGIN WORK")->execute();
			
			//就床与起床数据update
			$sql_insert_s = DB::insert($table_sleep_check,array('Date','Begin_Sleep_Time','End_Sleep_Time','Check_USERID','Child_1_Base_ID'));
			$is_insert_s = FALSE;
			$delIdArr_s = array();
			$Check_USERID_s = Session::instance()->get('USERID');
			foreach ($data_Sleep as $key => $val){
				if(empty($val['Begin_Sleep_Time'])&&empty($val['End_Sleep_Time'])){
					if(!empty($val['ID'])) $delIdArr_s[] = $val['ID'];
				}else{
					if(empty($val['ID'])){
						$sql_insert_s = $sql_insert_s->values(array($val['Date'],$val['Begin_Sleep_Time'],$val['End_Sleep_Time'],$Check_USERID_s,$val['Child_1_Base_ID']));
						$is_insert_s = TRUE;
					}else{
						DB::update($table_sleep_check)->set(array('Begin_Sleep_Time'=>$val['Begin_Sleep_Time'],'End_Sleep_Time'=>$val['End_Sleep_Time']))->where('ID','=',$val['ID'])->execute();
					}						
				}
			}
			if($is_insert_s) $sql_insert_s->execute();
			
			if(!empty($delIdArr_s)) DB::delete($table_sleep_check)->where('ID', 'IN', $delIdArr_s)->execute();			
			
			//午睡数据update
			$sql_insert = DB::insert($table_nap_check,array('Date','Check_Time','Check_USERID','Child_1_Base_ID'));
			$is_insert = FALSE;
			$delIdArr = array();
			$Check_USERID = Session::instance()->get('USERID');
			foreach ($data as $key => $val){
				if(empty($val['Check_Time'])){
					if(!empty($val['ID'])) $delIdArr[] = $val['ID'];
				}else{
					if(empty($val['ID'])){
						$sql_insert = $sql_insert->values(array($val['Date'],$val['Check_Time'],$Check_USERID,$val['Child_1_Base_ID']));
						$is_insert = TRUE;
					}else{
						DB::update($table_nap_check)->set(array('Check_Time'=>$val['Check_Time']))->where('ID','=',$val['ID'])->execute();
					}			
				}			
			}			
			if($is_insert) $sql_insert->execute();

			if(!empty($delIdArr)) DB::delete($table_nap_check)->where('ID', 'IN', $delIdArr)->execute();
			
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}		
	}
	
	/**
	 * new 就床 起床 午睡check 保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function listSleepNapCheckUpdate(& $request){
		try {
			$data = self::Validation_sleepNapCheck($request);
			//return $data[1]['End_Sleep_Time'];
			$table_sleep_nap_check = Cache::instance()->get('table_sleep_nap_check');
			
				
			DB::query(NULL, "BEGIN WORK")->execute();
				
			//就床与起床数据update
			$sql_insert_s = DB::insert($table_sleep_nap_check,array('Date','Begin_Sleep_Time','End_Sleep_Time','Check_Time','Check_USERID','Child_1_Base_ID'));
			$is_insert_s = FALSE;
			$delIdArr_s = array();
			$Check_USERID_s = Session::instance()->get('USERID');
			foreach ($data as $key => $val){
				
				if(empty($val['Begin_Sleep_Time'])&&empty($val['End_Sleep_Time'])&&empty($val['Check_Time'])){
					if(!empty($val['ID'])) $delIdArr_s[] = $val['ID'];
				}else{					
					if(empty($val['ID'])){
						$sql_insert_s = $sql_insert_s->values(array($val['Date'],$val['Begin_Sleep_Time'],$val['End_Sleep_Time'],$val['Check_Time'],$Check_USERID_s,$val['Child_1_Base_ID']));
						$is_insert_s = TRUE;
					}else{				
						DB::update($table_sleep_nap_check)->set(array('Begin_Sleep_Time'=>$val['Begin_Sleep_Time'],'End_Sleep_Time'=>$val['End_Sleep_Time'],'Check_Time'=>$val['Check_Time']))->where('ID','=',$val['ID'])->execute();						
					}
				}
				
			}
			if($is_insert_s) $sql_insert_s->execute();
			
			if(!empty($delIdArr_s)) DB::delete($table_sleep_nap_check)->where('ID', 'IN', $delIdArr_s)->execute();
						
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	public function Validation_napCheckDetail($request){
		$ID = $request->post('ID');
		$ID = array_unique($ID);
		$Check_Content = $request->post('Check_Content');
		$result = array();
		foreach ($ID as $key => $val){
			$result[] = array('ID'=>$val,'Check_Content'=>implode(';', $Check_Content[$val]));
		}
		return $result;
	}
	
	public function napCheckDetailUpdate(& $request){
		try {
			$table_sleep_nap_check = Cache::instance()->get('table_sleep_nap_check');
						
			$data = self::Validation_napCheckDetail($request);
			DB::query(NULL, "BEGIN WORK")->execute();
			foreach ($data as $key => $val){
				DB::update($table_sleep_nap_check)->set(array('Check_Content'=>$val['Check_Content']))->where('ID','=',$val['ID'])->execute();				
			}
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	/**
	 * 室温・湿度チェック
	 * @param unknown $yearMonDay
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function listTempCheck($yearMonDay){
		try {
			$class = Kohana::$config->load('parameter.BASE_INFO.CLASS');
			$table_temperature = Cache::instance()->get('table_temperature');
			$table_humidity = Cache::instance()->get('table_humidity');
			
			$result = array();
			foreach ($class as $key => $val){
				$temp = DB::select()->from($table_temperature)->where('Date','=',$yearMonDay)->and_where('class','=',$key)->order_by('Time','ASC')->execute()->as_array();
				$humidity = DB::select()->from($table_humidity)->where('Date','=',$yearMonDay)->and_where('class','=',$key)->order_by('Time','ASC')->execute()->as_array();
				$result[$key]['name'] = $val;
				$result[$key]['temp'] = $temp;
				$result[$key]['humidity'] = $humidity;
			}			
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
		}		
	}
	
	/**
	 * 室温・湿度チェック
	 * @param unknown $request
	 * @return multitype:multitype:NULL unknown
	 */
	public function Validation_tempCheck($request){
		$temp_id = $request->post('hidden_temp_id');
		$temp_Time = $request->post('txt_temp_Time');
		$temp1 = $request->post('select_temp1');
		$temp2 = $request->post('select_temp2');		
		$humidity_id = $request->post('hidden_humidity_id');
		$humidity_Time = $request->post('txt_humidity_Time');
		$humidity = $request->post('select_humidity');		
		$yearMonDay = $request->post('yearMonDay');
		$class = $request->post('class');
		$result = array();
		if(!empty($temp_id)){
			foreach ($temp_id as $key => $val){
				if($temp_Time[$key].$temp1[$key].$temp2[$key]!=""){
					$result['temp'][] = array('ID'=>$val,'Date'=>$yearMonDay,'Class'=>$class,'Time'=>$temp_Time[$key],'Temperature'=>$temp1[$key].'.'.$temp2[$key]);
			
				}elseif ($val!=""){
					$result['tempDelId'][] = $val;
				}
			}
		}else{
			$result['temp']=array();
		}
		
		if(!empty($humidity_id)){
			foreach ($humidity_id as $key => $val){
				if($humidity_Time[$key].$humidity[$key]!=""){
					$result['humidity'][] = array('ID'=>$val,'Date'=>$yearMonDay,'Class'=>$class,'Time'=>$humidity_Time[$key],'Humidity'=>$humidity[$key]);
				}elseif ($val!=""){
					$result['humidityDelId'][] = $val;
				}
			}
		}else{
			$result['humidity']=array();
		}
			
		return $result;
	}
	
	/**
	 * 室温・湿度チェック
	 * @param unknown $request
	 */
	public function listTempCheckUpdate(& $request){
		try {
			$data = self::Validation_tempCheck($request);
			$table_temperature = Cache::instance()->get('table_temperature');
			$table_humidity = Cache::instance()->get('table_humidity');
				
			DB::query(NULL, "BEGIN WORK")->execute();
			$sql_insert = DB::insert($table_temperature,array('Date','Class','Time','Temperature','User_Id'));
			$is_insert = FALSE;
			$Check_USERID = Session::instance()->get('USERID');
			
			foreach ($data['temp'] as $key => $val){
				if(empty($val['ID'])){
					$sql_insert = $sql_insert->values(array($val['Date'],$val['Class'],$val['Time'],$val['Temperature'],$Check_USERID));
					$is_insert = TRUE;
				}else{
					DB::update($table_temperature)->set(array('Time'=>$val['Time'],'Temperature'=>$val['Temperature']))->where('ID','=',$val['ID'])->execute();
				}
				
			}
			if($is_insert) $sql_insert->execute();
			
			if(array_key_exists('tempDelId', $data)) DB::delete($table_temperature)->where('ID', 'IN', $data['tempDelId'])->execute();
			
			$sql_insert = DB::insert($table_humidity,array('Date','Class','Time','Humidity','User_Id'));
			$is_insert = FALSE;
			foreach ($data['humidity'] as $key => $val){
				if(empty($val['ID'])){
					$sql_insert = $sql_insert->values(array($val['Date'],$val['Class'],$val['Time'],$val['Humidity'],$Check_USERID));
					$is_insert = TRUE;
				}else{
					DB::update($table_humidity)->set(array('Time'=>$val['Time'],'Humidity'=>$val['Humidity']))->where('ID','=',$val['ID'])->execute();
				}
			
			}
			if($is_insert) $sql_insert->execute();
			
			if(array_key_exists('humidityDelId', $data)) DB::delete($table_humidity)->where('ID', 'IN', $data['humidityDelId'])->execute();
				
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;		
			
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}		
	}
	
	/**
	 * 保育日志保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function log_Insert(& $request){
	
		$data['Log_ID']=$request->post('Log_ID');
		$txt_Log_Date_Y = $request->post('txt_Log_Date_Y');
		$select_Log_Date_M = $request->post('select_Log_Date_M');
		$select_Log_Date_D = $request->post('select_Log_Date_D');
		$Log_Date = empty($txt_Log_Date_Y)?'0000':$txt_Log_Date_Y;
		$Log_Date .= empty($select_Log_Date_M)?'-00':'-'.$select_Log_Date_M;
		$Log_Date .= empty($select_Log_Date_D)?'-00':'-'.$select_Log_Date_D;
		$data['Log_Date'] = $Log_Date;
		
		$data['Log_Week'] = $request->post('txt_Log_Week');
		$data['Log_Weather'] = $request->post('txt_Log_Weather');
		$data['Present_Num'] = $request->post('txt_Present_Num');
		$data['Absent_Num'] = $request->post('txt_Absent_Num');
		$data['Care_Security'] = $request->post('txt_Care_Security');
		$data['Curing'] = $request->post('txt_Curing');
		$data['Eating'] = $request->post('txt_Eating');
		$data['Education'] = $request->post('txt_Education');
		$data['Family_Comm'] = $request->post('txt_Family_Comm');

		$data['Class']=$request->post('select_Class');
		
		$Children_ID = $request->post('chk_Children_ID',NULL);
		$data['Children_ID'] = empty($Children_ID)?NULL:implode(';', $Children_ID);
		
		$Children_Status=$request->post('txt_Children_Status',NULL);

		$Status=array();
		if(!empty($Children_ID)){
			foreach ($Children_ID as $key => $val){
				$Status[]=$Children_Status[$val];
			}
		}
	
		$data['Children_Status'] = empty($Children_Status)?NULL:implode(';', $Status);		

		$data['Day_Flow'] = $request->post('txt_Day_Flow');
		$data['Daily_Life'] = $request->post('txt_Daily_Life');
		$data['Episode'] = $request->post('txt_Episode');
		$data['Matters'] = $request->post('txt_Matters');
		
		$Class_ID = $request->post('txt_Class_ID',NULL);
		$data['Class_ID'] = empty($Class_ID)?NULL:implode(';', $Class_ID);
	
		$Class_Num = $request->post('txt_Class_Num',NULL);
		foreach ($Class_Num as $key =>$val){
			if($val ==NULL){$Class_Num[$key]='0';}
		}
		$data['Class_Num'] = empty($Class_Num)?NULL:implode(';', $Class_Num);
	
		if($data['Log_Week']!='土'){
			$data['Class_ID']=NULL;
			$data['Class_Num']=NULL;
		}
	
		$data['Games'] = $request->post('txt_Games');
		$data['Activities'] = $request->post('txt_Activities');
		$data['Relationship'] = $request->post('txt_Relationship');
		$data['Personal_Rec'] = $request->post('txt_Personal_Rec');
		$data['Cooperation'] = $request->post('txt_Cooperation');
		$data['Hope_Weekday'] = $request->post('txt_Hope_Weekday');
		$data['Hope_Weekend'] = $request->post('txt_Hope_Weekend');
		

		$table=Cache::instance()->get('table_child_care_logs');
	
		if(!empty($data['Log_ID'])){
			$total_rows = parent::update($table, $data,'Log_ID',$data['Log_ID']);
		}else{
			$rst = parent::insert($table, $data);
			if($rst===FALSE){
				return FALSE;
			}
		}
			
		return TRUE;
	}
	
	/**
	 * 日志信息
	 * @param unknown $yearMonDay
	 * @param unknown $Class
	 * @return Ambigous <multitype:, unknown, NULL>
	 */
	public function getLogs($yearMonDay,$Class){
		$table = Cache::instance()->get('table_child_care_logs');
		$rst='';
		try {
	
			$rst=DB::select()->from($table)->where('Log_Date','=',$yearMonDay)->and_where('Class','=',$Class)->execute()->as_array();
		}catch (Exception $e) {
			$e->getMessage();
		}
		return empty($rst)?array():$rst[0];
	
	}
	
	public function getChildren($IDs){
		$table = Cache::instance()->get('table_child_1_base');
		$rst=array();
		try {
	
			$rst=DB::select()->from($table)->where('ID','IN',$IDs)->execute()->as_array();
	
			foreach ($rst as $key => $val){
				//$recog_Info = $model_child->getChildRecog($val['ID']);
				$recog_Info = Model::factory('list')->getChildTIMERecog($val['ID'],date('Y-m-d'));
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Data'=>'');
				$rst[$key]=array_merge($val,$recog_Info);
					
			}
		}catch (Exception $e) {
			$e->getMessage();
		}
		return empty($rst)?array():$rst;
	}
	
	
	/**
	 * list bus
	 * @param unknown $request
	 * @return Validation
	 */
	public function Validation_bus($request){
		$data['GoSchool'] = $request->post('chkbox_goSchool');
	
		$txt_goSchool_Y = $request->post('txt_goSchool_Y');
		$txt_goSchool_M = $request->post('txt_goSchool_M');
		$txt_goSchool_M = strlen($txt_goSchool_M)==1?'0'.$txt_goSchool_M:$txt_goSchool_M;
		$txt_goSchool_D = $request->post('txt_goSchool_D');
		$txt_goSchool_D = strlen($txt_goSchool_D)==1?'0'. $txt_goSchool_D:$txt_goSchool_D;
	
		$goSchool_Date = empty($txt_goSchool_Y)?'0000':$txt_goSchool_Y;
		$goSchool_Date .= empty($txt_goSchool_M)?'.00':'.'.$txt_goSchool_M;
		$goSchool_Date .= empty($txt_goSchool_D)?'.00':'.'.$txt_goSchool_D;
	
		$data['GoSchool_Date'] = $goSchool_Date;
	
		$data['LeaveSchool'] = $request->post('chkbox_leaveSchool');
	
		$txt_leaveSchool_Y = $request->post('txt_leaveSchool_Y');
		$txt_leaveSchool_M = $request->post('txt_leaveSchool_M');
		$txt_leaveSchool_M = strlen($txt_leaveSchool_M)==1?'0'.$txt_leaveSchool_M:$txt_leaveSchool_M;
		$txt_leaveSchool_D = $request->post('txt_leaveSchool_D');
		$txt_leaveSchool_D = strlen($txt_leaveSchool_D)==1?'0'. $txt_leaveSchool_D:$txt_leaveSchool_D;
	
		$leaveSchool_Date = empty($txt_leaveSchool_Y)?'0000':$txt_leaveSchool_Y;
		$leaveSchool_Date .= empty($txt_leaveSchool_M)?'.00':'.'.$txt_leaveSchool_M;
		$leaveSchool_Date .= empty($txt_leaveSchool_D)?'.00':'.'.$txt_leaveSchool_D;
	
		$data['LeaveSchool_Date'] = $leaveSchool_Date;
	
		$object = Validation::factory($data);
		$tableFileds = Cache::instance()->get('table_child_1_base_fields');
		foreach ($data as $key => $val){
			if($key=='Child_1_Base_ID') continue;
			if($tableFileds[$key]['not_empty'])	$object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	
	}
	
	public function bus_Data(& $request)
	{
		$data = self::Validation_bus($request);
		if($data->check()){
			$table = Cache::instance()->get('table_child_1_base');
			$ID = $request->post('hidden_ID');
			$total_rows = parent::update($table, $data->as_array(),'ID',$ID);
			return TRUE;
		}else {
			$data_errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('bus/busList').URL::query())->execute();
			return FALSE;
		}
	}
	
}