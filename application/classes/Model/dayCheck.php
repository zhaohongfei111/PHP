<?php
class Model_dayCheck extends Model_DBCommon{
	
	
	/**
	 * 在登录圆簿中这天的信息尚未保存过，读取原始孩子信息
	 * @param unknown $yearMonDay
	 */
	public function getChildrenDetail($yearMonDay){
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$child_Info = DB::select()->from($table)->where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',$yearMonDay)->where_close()->and_where('EnterDate','<=',$yearMonDay)->order_by('FamilyName_Spell','ASC')->execute()->as_array();
		
			foreach ($child_Info as $key => $val){
				//登降圆状况获取
				$checkInfo=self::checkTime($val['ID'],$yearMonDay);
				$child_Info[$key]['checkTime']=$checkInfo;
				$child_Info[$key]['commInfo']=self::commInfo_new($val['Child_Id'], $yearMonDay);
				
				$child_Info[$key]['checkDetail']=self::getDayCheckDetail($yearMonDay, $val['ID']);
			}
			return $child_Info;
		} catch (Exception $e) {
			echo $e->getMessage();
		}		
	}
	
	/**
	 * 某个班级（ PDF用 ）PDF1和PDF2
	 * @param unknown $yearMonDay
	 */
	public function getChildrenDetailByClass($yearMonDay,$class){
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$child_Info=array();
			$child_Info = DB::select('ID','FamilyName','GivenName')->from($table)->where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',$yearMonDay)->where_close()->and_where('EnterDate','<=',$yearMonDay)->and_where('Class','=',$class)->order_by('FamilyName_Spell','ASC')->execute()->as_array();
	
			foreach ($child_Info as $key => $val){

				//登降圆状况获取
				$child_Info[$key]['checkTime']=self::checkTime($val['ID'],$yearMonDay);
				//登降圆的详细信息 day_check_detail
				$child_Info[$key]['checkDetail']=self::getDayCheckDetail($yearMonDay, $val['ID']);
				
				// 起床与就床信息 午睡check数据
				$sleepNapCheck=Model::factory('list')->listSleepNapDetailed($val['ID'],$yearMonDay);

				
				$child_Info[$key]['sleepNapCheck']=$sleepNapCheck;
			}
			return $child_Info;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	/**
	 * 某个班级（ PDF用 ）PDF3
	 * @param unknown $yearMonDay
	 * @param unknown $class
	 * @return multitype:multitype:unknown
	 */
	public function getChildrenDetailByClassRecog($yearMonDay,$class){
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$child_Info=array();
			$child_Info = DB::select('ID','FamilyName','GivenName','Class')->from($table)->where_open()->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',$yearMonDay)->where_close()->and_where('EnterDate','<=',$yearMonDay)->and_where('Class','=',$class)->order_by('FamilyName_Spell','ASC')->execute()->as_array();
		
			foreach ($child_Info as $key => $val){
				//认定分区获取
				$recog_Info = Model::factory('list')->getChildTIMERecog($val['ID'],date('Y-m-d'));
				if(!is_array($recog_Info))  $recog_Info = array('Recog_Type'=>'','Recog_Project'=>'','Recog_Data'=>'');
				$child_Info[$key]=array_merge($val,$recog_Info);
				//登降圆状况获取
				$child_Info[$key]['checkTime']=self::checkTime($val['ID'],$yearMonDay);
				//登降圆的详细信息 day_check_detail
				$child_Info[$key]['checkDetail']=self::getDayCheckDetail($yearMonDay, $val['ID']);
				//员工检查睡觉信息
				$child_Info[$key]['sleepNapCheck']=Model::factory('list')->listSleepNapDetailed($val['ID'],$yearMonDay);			
			}
			//根据认定分区1，和认定分区2，整理数据
			$recog1=array();
			$recog2=array();
			foreach ($child_Info as $key =>$val){
				if($val['Recog_Type']=='R1'){
					$recog1[]=$val;
				}
				if($val['Recog_Type']=='R2'||$val['Recog_Type']=='R2S'){
					$recog2[]=$val;
				}
			}
			return array('Recog1'=>$recog1,'Recog2'=>$recog2);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * 验证登降圆情况,获取登降圆时间
	 * @param unknown $child_id 数据库编号ID
	 *
	 */
	public function checkTime($child_id,$yearMonDay){
		try {
			//获取这个孩子当天的考勤记录
		 	 //原始数据表中的考勤数据。
			$day_raw_data = DB::select()->from('day_raw_data')->where('Day_Date','=',$yearMonDay)->and_where('Child_1_Base_ID','=',$child_id)->execute()->current();
		  	//day_detail表中的考勤数据。
			$day_detail = DB::select()->from('day_detail')->where('Day_Date','=',$yearMonDay)->and_where('Child_1_Base_ID','=',$child_id)->execute()->current();
			//**考勤数据以day_detail表中为准。其次参考原始表day_raw_data**********
			if(!empty($day_detail)){
				return array('in_Time'=>$day_detail['In_Time'],'out_Time'=>$day_detail['Out_Time']);
			}elseif(!empty($day_raw_data)){
				return array('in_Time'=>$day_raw_data['In_Time'],'out_Time'=>$day_raw_data['Out_Time']);
			}else{
				return array('in_Time'=>'','out_Time'=>'');
			}
						
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * 获取孩子的请假，迟到等申请信息
	 * @param unknown $child_id 长编号身份ID
	 * @param unknown $yearMonDay
	 */
	public function commInfo($child_id,$yearMonDay){
		try {
			$table = Cache::instance()->get('table_communication');	
			$commInfo= DB::select()->from($table)
						->where('Child_Id','=',$child_id)
						->and_where_open()->where('Late','IS NOT',NULL)->or_where('Rest','IS NOT',NULL)->and_where_close()
						->and_where('LeaveDate','<=',$yearMonDay)->and_where('LeaveDate_End','>=',$yearMonDay)
						->order_by('Submit_Date','DESC')
						->execute()->as_array();	
			return $commInfo;
			} catch (Exception $e) {
				echo $e->getMessage();
			}
	}
	/**
	 * 新更新20170410
	 * 获取孩子的请假，迟到等申请信息
	 * @param unknown $child_id
	 * @param unknown $yearMonDay
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function commInfo_new($child_id,$yearMonDay){
		try {
			$table = Cache::instance()->get('table_communication');
			$commInfo= DB::select()->from($table)
			->where('Child_Id','=',$child_id)
			->and_where_open()->where('Late','IS NOT',NULL)->or_where('Rest','IS NOT',NULL)->or_where('Other','IS NOT',NULL)->and_where_close()
			->and_where('LeaveDate','<=',$yearMonDay)->and_where('LeaveDate_End','>=',$yearMonDay)
			->order_by('Submit_Date','DESC')
			->execute()->as_array();
			return $commInfo;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 *  登降圆簿head数据和孩子详细数据保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function dayCheckDetailUpdate($request){
	
		$data['head']['Date'] = $request->post('yearMonDay');
		$data['head']['Class'] = $request->post('Class');
		$data['head']['Present_Num'] =$request->post('txt_Present_Num');
		$data['head']['Absent_Num'] =$request->post('txt_Absent_Num');
		$data['head']['All_Num'] =$request->post('txt_All_Num');
	
		$data['head']['Time_Morning'] =$request->post('select_Time_Morning');
		$data['head']['Morning_Num'] =$request->post('txt_Morning_Num');
		$data['head']['Time_Afternoon'] =$request->post('select_Time_Afternoon');
		$data['head']['Afternoon_Num'] =$request->post('txt_Afternoon_Num');
		$data['head']['Early_Charge_Name'] =$request->post('select_Early_Charge_Name');
		$data['head']['Later_Charge_Name'] =$request->post('select_Later_Charge_Name');
	
		$Body_Temp =$request->post('select_Body_Temp');
		$Eat_Medicine =$request->post('select_Eat_Medicine');
		$Come_With = $request->post('select_Come_With');
		$Remark =$request->post('txt_Remark');
		$Child_1_Base_ID =$request->post('hidden_Child_ID');
		
		if(!empty($Child_1_Base_ID)){
			$temp=array();
			
			foreach ($Child_1_Base_ID as $key => $val){				
				$temp['Date']=$request->post('yearMonDay');				
				$temp['Body_Temp']=$Body_Temp[$key];
				$temp['Eat_Medicine']=$Eat_Medicine[$key];
				$temp['Come_With']=$Come_With[$key];
				$temp['Remark']=$Remark[$key];
				$temp['Child_1_Base_ID']=$Child_1_Base_ID[$key];
				$data['detail'][]=$temp;				
			}
			
		}

		//保存更新数据
		$table_day_check_head = Cache::instance()->get('table_day_check_head');
		$table_day_check_detail = Cache::instance()->get('table_day_check_detail');
		
		try {
			DB::query(NULL, "BEGIN WORK")->execute();	
			if(!empty($data)){
				//头部数据处理
				$old_head=DB::select()->from($table_day_check_head)->where('Date','=',$data['head']['Date'])->and_where('Class','=',$data['head']['Class'])->execute()->current();
				//更新头部数据
				if(!empty($old_head)){
					$tep_rst=parent::update2($table_day_check_head, $data['head'], 'Date', $data['head']['Date'],'Class',$data['head']['Class']);
					if($tep_rst===FALSE){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}else{
					//新规插入
					$tep_rst=parent::insert($table_day_check_head, $data['head']);
					if($tep_rst===FALSE){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}
				}
					
				//孩子的详细数据处理
				if(!empty($data['detail'])){
					foreach ($data['detail'] as $key_c => $val_c){
						$old_detail=DB::select()->from($table_day_check_detail)->where('Date','=',$data['head']['Date'])->and_where('Child_1_Base_ID','=',$val_c['Child_1_Base_ID'])->execute()->current();
						if(!empty($old_detail)){
							//更新
							$tep_rst=parent::update2($table_day_check_detail, $val_c,'Date', $data['head']['Date'], 'Child_1_Base_ID', $val_c['Child_1_Base_ID']);
							if($tep_rst===FALSE){
								DB::query(NULL, "ROLLBACK")->execute();
								return FALSE;
							}
						}else{
							//新规，插入
							$tep_rst=parent::insert($table_day_check_detail, $val_c);
							if($tep_rst===FALSE){
								DB::query(NULL, "ROLLBACK")->execute();
								return FALSE;
							}
						}
					}
				}
			}
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e){
			$e->getMessage();
			return FALSE;
		}	
	}
	
	/**
	 *  登降圆簿head数据和孩子详细数据保存
	 * @param unknown $request
	 * @return boolean
	 * 已修正
	 */
	/*
	public function dayCheckDetailUpdate($request){

		$txt_Date_Y = $request->post('txt_Date_Y');
		$select_Date_M = $request->post('select_Date_M');
		$select_Date_D = $request->post('select_Date_D');
		$InputDate = empty($txt_Date_Y)?'0000':$txt_Date_Y;
		$InputDate .= empty($select_Date_M)?'-00':'-'.$select_Date_M;
		$InputDate .= empty($select_Date_D)?'-00':'-'.$select_Date_D;
		$data['head']['Date'] = $InputDate;
		
		$data['head']['Present_Num'] =$request->post('txt_Present_Num');
		$data['head']['Absent_Num'] =$request->post('txt_Absent_Num');
		$data['head']['All_Num'] =$request->post('txt_All_Num');
		
		$data['head']['Time_Morning'] =$request->post('txt_Time_Morning');
		$data['head']['Morning_Num'] =$request->post('txt_Morning_Num');
		$data['head']['Time_Afternoon'] =$request->post('txt_Time_Afternoon');
		$data['head']['Afternoon_Num'] =$request->post('txt_Afternoon_Num');
		$data['head']['Early_Charge_Name'] =$request->post('select_Early_Charge_Name');
		$data['head']['Later_Charge_Name'] =$request->post('select_Later_Charge_Name');
		
		$Body_Temp =$request->post('select_Body_Temp');
		$Eat_Medicine =$request->post('txt_Eat_Medicine');
		$Come_With = $request->post('select_Come_With');
		$Remark =$request->post('txt_Remark');
		$Child_1_Base_ID =$request->post('hidden_Child_ID');
		if(!empty($Child_1_Base_ID)){
			$temp=array();
			foreach ($Child_1_Base_ID as $key => $val){
				$temp['Date']=$InputDate;
				$temp['Body_Temp']=$Body_Temp[$key];
				$temp['Eat_Medicine']=$Eat_Medicine[$key];
				$temp['Come_With']=$Come_With[$key];
				$temp['Remark']=$Remark[$key];
				$temp['Child_1_Base_ID']=$Child_1_Base_ID[$key];
				$data['detail'][]=$temp;
			}
		}
		
		//保存更新数据
		$table_day_check_head = Cache::instance()->get('table_day_check_head');
		$table_day_check_detail = Cache::instance()->get('table_day_check_detail');

		try {
		DB::query(NULL, "BEGIN WORK")->execute();
		
		if(!empty($data)){
			//头部数据处理
			$old_head=DB::select()->from($table_day_check_head)->where('Date','=',$data['head']['Date'])->execute()->current();
			//更新头部数据
			if(!empty($old_head)){				
				$tep_rst=parent::update($table_day_check_head, $data['head'], 'Date', $data['head']['Date']);
				if($tep_rst===FALSE){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}else{
				//新规插入
				$tep_rst=parent::insert($table_day_check_head, $data['head']);
				if($tep_rst===FALSE){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}
			
			//孩子的详细数据处理
			if(!empty($data['detail'])){			
				foreach ($data['detail'] as $key_c => $val_c){
					$old_detail=DB::select()->from($table_day_check_detail)->where('Date','=',$data['head']['Date'])->and_where('Child_1_Base_ID','=',$val_c['Child_1_Base_ID'])->execute()->current();
					if(!empty($old_detail)){
						//更新
						$tep_rst=parent::update2($table_day_check_detail, $val_c,'Date', $data['head']['Date'], 'Child_1_Base_ID', $val_c['Child_1_Base_ID']);
						if($tep_rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}
					}else{
						//新规，插入						
						$tep_rst=parent::insert($table_day_check_detail, $val_c);
						if($tep_rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}
					}
				}				
			}			
		}
		DB::query(NULL, "COMMIT")->execute();
		return TRUE;
		} catch (Exception $e){
			$e->getMessage();
			return FALSE;
		}
		
	}
	*/
	/**
	 * 读取某天的头部参数
	 * @param unknown $yearMonDay 日期
	 */
	public function getDayCheckHead($yearMonDay){
		$table_day_check_head = Cache::instance()->get('table_day_check_head');
		try {
			$rst=parent::selectByKey($table_day_check_head, 'Date', $yearMonDay);
			return empty($rst)?array():$rst;
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	/**
	 * 读取某天,某个班级的头部参数（PDF）
	 * @param unknown $yearMonDay 日期
	 * @param unknown $class      班级
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function getDayCheckHeadByClass($yearMonDay,$class){
		$table_day_check_head = Cache::instance()->get('table_day_check_head');
		try {
			//$rst=parent::selectByKey($table_day_check_head, 'Date', $yearMonDay);
			$rst=DB::select()->from($table_day_check_head)->where('Date','=',$yearMonDay)->and_where('Class','=',$class)->order_by('ID','DESC')->execute()->current();
			return empty($rst)?array():$rst;
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	
	/**
	 * 读取某天,某个班级的温度测量数据和湿度测量数据(PDF用)
	 * @param unknown $yearMonDay
	 * @param unknown $class
	 */
	public function getTempCheckByClass($yearMonDay,$class){
		try{
			$table_temperature = Cache::instance()->get('table_temperature');
			$table_humidity = Cache::instance()->get('table_humidity');
			$result = array();
			$temp=array();
			$humidity=array();
			$temp = DB::select()->from($table_temperature)->where('Date','=',$yearMonDay)->and_where('class','=',$class)->order_by('Time','ASC')->execute()->as_array();
			$humidity = DB::select()->from($table_humidity)->where('Date','=',$yearMonDay)->and_where('class','=',$class)->order_by('Time','ASC')->execute()->as_array();
			$result['temp'] = $temp;
			$result['humidity'] = $humidity;
			return $result;
			
		}catch (Exception $e){
			$e->getMessage();
		}
	}
	
	/**
	 * 读取某天学生的具体登降圆  簿信息
	 * @param unknown $yearMonDay
	 * @param unknown $ID 孩子的ID
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function getDayCheckDetail($yearMonDay,$ID){
		$table_day_check_detail = Cache::instance()->get('table_day_check_detail');
		try {	
			$rst=DB::select()->from($table_day_check_detail)->where('Date','=',$yearMonDay)->and_where('Child_1_Base_ID','=',$ID)->execute()->current();				
			return empty($rst)?array():$rst;
		} catch (Exception $e) {				
			$e->getMessage();

		}	
	}
	
	/**
	 * 获取时间戳之后新更新的notice
	 * @param unknown $time
	 * @return Ambigous <multitype:, NULL>
	 */
	public function getNewNotice($time){
		$table = Cache::instance()->get('table_master_noticeboard');
		try {
			$rst=DB::select()->from($table)->where('Board_Date','>',$time)->order_by('Board_Date','DESC')->execute()->current();
			return empty($rst)?array():$rst;
		} catch (Exception $e) {
			$e->getMessage();		
		}
	}
	
	/**
	 * 获取某个班级学生一个月的考勤信息，是否到校
	 * @param unknown $class
	 * @param unknown $thisYearMon
	 */
	public function getChildCheckTimeClass($class,$thisYearMon){
		$table = Cache::instance()->get('table_child_1_base');
		$days = date('t', strtotime($thisYearMon.'-01'));
		$child_Info=array();
		//某个班级有哪些孩子
		$child_Info = DB::select('ID','FamilyName','GivenName')
							->from($table)
							->where_open()
								->where('LeaveDate','=','0000-00-00')
								->or_where('LeaveDate','>',$thisYearMon.'-01')
							->where_close()
							->and_where('EnterDate','<=',$thisYearMon.'-'.$days)
							->and_where('Class','=',$class)
							->order_by('FamilyName_Spell','ASC')
							->execute()
							->as_array();
				
		//竖排 出席人次和
		$all_col_in=0;
		//竖排 欠席人次和
		$all_col_not_in=0;
		//横排每天出席人次和.组成月份数组
		$all_row_in=array();
		//加入考勤信息
		foreach ($child_Info as $key => $val){
			$check_rst=$child_Info[$key]['checkList']=self::getChildCheckTime($val['ID'], $thisYearMon);
			
			$inDayList=$check_rst['inDayList'];
			$noList=$check_rst['noList'];
			
			//print_r($noList);
			//print_r("TAG");
			$child_Info[$key]['checkList']=$inDayList;
			$child_Info[$key]['checkNoList']=$noList;
			//竖排
			$all_col_in +=count($inDayList);
			$all_col_not_in +=$days-count($inDayList)-count($noList);
			
			//横排
			foreach ($inDayList as $key_chkL => $val_chkL){
				if(array_key_exists($val_chkL, $all_row_in)){
					$all_row_in[$val_chkL] +=1;
				}else{
					$all_row_in[$val_chkL] =1;
				}
			}
		}
		
		
		return array('child_Info'=>$child_Info,'all'=>array('all_col_in'=>$all_col_in,'all_col_not_in'=>$all_col_not_in,'all_row_in'=>$all_row_in));		
	}
	
	
	/**
	 * 获取某个孩子一个月的考勤信息，判断是否到园
	 * $ID
	 */
	public function getChildCheckTime($ID,$thisYearMon){
		$table = Cache::instance()->get('table_day_raw_data');
		try {
			$rst=DB::select()->from($table)
							->where('Day_Date','LIKE',$thisYearMon.'%')
							->and_where('Child_1_Base_ID','=',$ID)
							->and_where('In_Time','<>','')  //inTime和OutTime不能为空
							->and_where('Out_Time','<>','')
							->execute()->as_array();
			
			$inDayList=array();//出席日期列表
			$noList=self::getHoildayMonth($thisYearMon);//祝日和日日曜日去除
			//print_r($noList);
			
			foreach ($rst as $key => $val){
					//去除日曜日的考勤  要求：星期日，不作表示。
					$week=date('w',strtotime($val['Day_Date']));
					
					//除去祝日；  要求：祝日，不作表示
					//从day_parameter表读取，某天关于祝日的设定
					$table_day_parameter=Cache::instance()->get('table_day_parameter');
					$day_parameter=DB::select()->from($table_day_parameter)
												->where('Para_Date','=',$val['Day_Date'])
												->execute()->current();
					
					$day=date('j',strtotime($val['Day_Date']));	//1-31日期表示方法
					
					//判断上面两个要求
					if($week!=0){
						if(empty($day_parameter)){							
							$inDayList[]=$day;
						}elseif ($day_parameter['Para_HolidayChecked']!='1'){
							$inDayList[]=$day;
						}				
					}											
				}

			return array('inDayList'=>$inDayList,'noList'=>$noList);
		} catch (Exception $e) {
			$e->getMessage();
		}
		
	}
	
	/**
	 * 获取某个月份中所有的祝日和日曜日
	 * @param unknown $yearMon
	 */
	public function getHoildayMonth($yearMon){
		$days = date('t', strtotime($yearMon.'-01'));
		$resultList=array();
		
		for($i=1;$i<=$days;$i++){
			$yearMonDay=$yearMon."-".($i>9?'':'0').$i;
			
			//日曜日条件：日曜日$week!=0
			$week=date('w',strtotime($yearMonDay));
			
			//祝日判断 
			$table_day_parameter=Cache::instance()->get('table_day_parameter');
			$day_parameter=DB::select()->from($table_day_parameter)
										->where('Para_Date','=',$yearMonDay)
										->execute()->current();
			
			if($week==0){
				$resultList[]=$i;
			}elseif((!empty($day_parameter))&&($day_parameter['Para_HolidayChecked']=='1')){
				$resultList[]=$i;
			}
		}
		
		return $resultList;
	}
	
	/**
	 * 【25-08】出席簿フォーマット(満3～5歳児クラス)
	 * @param unknown $class
	 * @param unknown $days
	 * @param unknown $yearMon
	 * @return Ambigous <multitype:, number>
	 */
	public function getPrintListR1($class,$days,$yearMon){
		$listAll = Model::factory('list')->getlist();
		$table_recog = Cache::instance()->get('table_child_recog');
		$table_child = Cache::instance()->get('table_child_1_base');
		//获取节假日表
		$table_parameter = Cache::instance()->get('table_day_parameter');
		$recog_list = DB::select()->from($table_recog)->where('Recog_Type','=','R1')->execute()->as_array();
		$listR1 = array();
		foreach($recog_list as $key=>$val){
				
			$list1 = DB::select()->from($table_child)->where('ID', '=' , $recog_list[$key]['Child_1_Base_ID'])->and_where('Class','=',$class)->execute()->as_array();
				
			if(!empty($list1)){
					
				array_push($listR1,$list1);}
		}
		$daylist=array();
		$isGoSchool = array();
		$table = Cache::instance()->get('table_day_raw_data');
		for($i=1;$i<=$days;$i++ ){
			if($i<10){
				$i='0'.$i;
			}
			$yearMonDay = $yearMon.'-'.$i;
			array_push($daylist,$yearMonDay);
		}
		foreach($listR1 as $key1 => $val1){
			foreach($daylist as $key=>$val){					
				$isGoSchool[$key] = DB::select()->from($table)->where('Day_Date','=',$val)->and_where('Child_1_Base_Id','=',$listR1[$key1][0]['ID'])->and_where('In_Time','!=','')->and_where('Out_Time','!=','')->execute()->as_array();
				$listR1[$key1][0]['isGoSchool']=$isGoSchool;
			}
		}
	
		//缺勤行
		foreach ($listR1 as $key =>$val){
			$m = 0;
			$n = 0;
			foreach($val[0]['isGoSchool'] as $key1=>$val1){
				//1-9日，天前加0
				if($key1<=9){
					$yearMonDay = $yearMon.'-0'.($key1+1);
				}else{
					$yearMonDay = $yearMon.'-'.($key1+1);
				}
	
				$result = DB::select()->from($table_parameter)->where('Para_Date','=',$yearMonDay)->execute()->current();
				if(!empty($result)&&$result['Para_HolidayChecked']=='1')	{
					//是节假日修改listR1
					$listR1[$key][0]['isGoSchool'][$key1]='0';
					$val1 = '0';
				}
					
				//判断是否周末
	
				if((!empty($val1))&&date('w',strtotime($yearMon.'-'	.($key1+1)))!='6' && date('w',strtotime($yearMon.'-'.($key1+1)))!='0'&&$val1!='0'){
					$m++;
				}
	
				$listR1[$key][0]['row_absence_num']=$m;
	
				if(date('w',strtotime($yearMon.'-'.($key1+1)))!='6' && date('w',strtotime($yearMon.'-'.($key1+1)))!='0'&&$val1!='0'){
					$n++;
				}
				$listR1[$key][0]['need_go_school']=$n;
					
					
			}
	
		}
	
		return $listR1;
	}
	
	public function getPrintListR2($class,$days,$yearMon){
		
		$listAll = Model::factory('list')->getlist();
		$table_recog = Cache::instance()->get('table_child_recog');
		$table_child = Cache::instance()->get('table_child_1_base');
	
		$table_parameter = Cache::instance()->get('table_day_parameter');
		$recog_list = DB::select()->from($table_recog)->where('Recog_Type','=','R2')->or_where('Recog_Type','=','R2S')->execute()->as_array();
		$listR2 = array();
		foreach($recog_list as $key=>$val){
	
			$list2 = DB::select()->from($table_child)->where('ID', '=' , $recog_list[$key]['Child_1_Base_ID'])->and_where('Class','=',$class)->execute()->as_array();
	
			if(!empty($list2)){
					
				array_push($listR2,$list2);}
		}
		$daylist=array();
		$isGoSchool = array();
		$table = Cache::instance()->get('table_day_raw_data');
		for($i=1;$i<=$days;$i++ ){
			if($i<10){
				$i='0'.$i;
			}
			$yearMonDay = $yearMon.'-'.$i;
			array_push($daylist,$yearMonDay);
		}
			
		foreach($listR2 as $key1 => $val1){
			foreach($daylist as $key=>$val){
				$isGoSchool[$key] = DB::select()->from($table)->where('Day_Date','=',$val)->and_where('Child_1_Base_Id','=',$listR2[$key1][0]['ID'])->and_where('In_Time','!=','')->and_where('Out_Time','!=','')->execute()->as_array();
				$listR2[$key1][0]['isGoSchool']=$isGoSchool;
			}
		}
	
	
	
		//缺勤行
		foreach ($listR2 as $key =>$val){
			$m = 0;$n = 0;
			foreach($val[0]['isGoSchool'] as $key1=>$val1){
				//1-9日，天前加0
				if($key1<=9){
					$yearMonDay = $yearMon.'-0'.($key1+1);
				}else{
					$yearMonDay = $yearMon.'-'.($key1+1);
				}
				//查询节假日
				$result = DB::select()->from($table_parameter)->where('Para_Date','=',$yearMonDay)->execute()->current();
				if(!empty($result)&&$result['Para_HolidayChecked']=='1')	{
	
	
					$listR2[$key][0]['isGoSchool'][$key1]='0';
					$val1 = '0';
	
				}
	
	
				//2号认证判断是否星期天
				if((!empty($val1)) && date('w',strtotime($yearMon.'-'.($key1+1)))!='0'){
					$m++;
				}
	
				$listR2[$key][0]['row_absence_num']=$m;
	
				if(date('w',strtotime($yearMon.'-'.($key1+1)))!='0'&&$val1!='0'){
					$n++;
				}
	
				$listR2[$key][0]['need_go_school']=$n;
			}
	
		}
		return $listR2;
	}
	
	
	
	public function col_absence_num($class,$days,$yearMon){
		
		$listR1 = Model::factory('dayCheck')->getPrintListR1($class,$days,$yearMon);
		$listR2 = Model::factory('dayCheck')->getPrintListR2($class,$days,$yearMon);
		for($i=0;$i<$days;$i++){
			$m = 0;
			foreach($listR1 as $key1 =>$val1){
				if(!empty($val1[0]['isGoSchool'][$i])&&$listR1[$key1]['0']['isGoSchool'][$i]!='0'&&date('w',strtotime($yearMon.'-'.($i+1)))!='0'&&date('w',strtotime($yearMon.'-'.($i+1)))!= '6'){
					$m++;	
				}
			}				
			$col_absence_num_R1[$i]=$m;				
		}
		for($i=0;$i<$days;$i++){
			$m = 0;
			foreach($listR2 as $key1 =>$val1){
				if(!empty($val1[0]['isGoSchool'][$i])&&$listR2[$key1]['0']['isGoSchool'][$i]!='0'&&date('w',strtotime($yearMon.'-'.($i+1)))!='0'){
					$m++;
				}
			}
			$col_absence_num_R2[$i]=$m;	
		}
		for($i=0;$i<$days;$i++){
			$col_absence_num[$i]=$col_absence_num_R1[$i]+$col_absence_num_R2[$i];
		}
		return $col_absence_num;
	}
	
	public function col_noabsence_num($class,$days,$yearMon){
		$listR1 = Model::factory('dayCheck')->getPrintListR1($class,$days,$yearMon);
		$listR2 = Model::factory('dayCheck')->getPrintListR2($class,$days,$yearMon);
	
		for($i=0;$i<$days;$i++){
			$m = 0;
			foreach($listR1 as $key1 =>$val1){
				if(empty($val1[0]['isGoSchool'][$i])&&date('w',strtotime($yearMon.'-'.($i+1)))!='0'&&date('w',strtotime($yearMon.'-'.($i+1)))!= '6'){
					$m++;	
				}
			}	
			$col_noabsence_num_R1[$i]=$m;	
		}
		for($i=0;$i<$days;$i++){
			$m = 0;
			foreach($listR2 as $key1 =>$val1){
				if(empty($val1[0]['isGoSchool'][$i])&&date('w',strtotime($yearMon.'-'.($i+1)))!='0'){
					$m++;
				}
			}
			$col_noabsence_num_R2[$i]=$m;	
		}
		for($i=0;$i<$days;$i++){
			$col_noabsence_num[$i]=$col_noabsence_num_R1[$i]+$col_noabsence_num_R2[$i];
		}
		return $col_noabsence_num;
	}
}