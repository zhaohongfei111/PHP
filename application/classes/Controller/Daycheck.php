<?php defined('SYSPATH') or die('No direct script access.');

class Controller_DayCheck extends Controller_Sellevel {
	
	
	/**
	 * 登降圆簿信息页面
	 */
	public function action_dayCheckDetail() {
		
		if(array_key_exists('yearMonDay',$_GET)){
			$yearMonDay = $_GET['yearMonDay'];
		}else{
			$yearMonDay = date('Y-m-d');
		}
		list($Y,$m,$d) = explode('-',$yearMonDay);
		
		$parameter=Kohana::$config->load('parameter');
		//月份，天数列表
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
		$week = Public_Times::getWeek($yearMonDay);
		
		//管理时间列表
		$timeList=Public_Times::arriveLeaveList('06:30:00','23:00:00','G:i','600');
				
		//管理员list
		$worker_List = Model::factory('user')->userWorkerList();
		//孩子list
		$child_Info = Model::factory('dayCheck')->getChildrenDetail($yearMonDay);
		
		//day_check_head读取数据库中保存的头部参数
		$day_head=Model::factory('dayCheck')->getDayCheckHead($yearMonDay);
		//day_check_detail 读取数据库中孩子的具体数据(现在包含在$child_Info中)
		//$day_detail=Model::factory('dayCheck')->getDayCheckDetail($yearMonDay);
		
		//每个班级出席，缺席人数
		$num=array();
		foreach ($parameter['BASE_INFO']['CLASS'] as $key_class =>$val_class){
			$num[$key_class]=array();
			$num[$key_class]['in']=0;
			$num[$key_class]['out']=0;
			foreach ($child_Info as $key=>$val){
				if($val['Class']==$key_class){
					if(!empty($val['checkTime']['in_Time'])||!empty($val['checkTime']['out_Time'])){
						$num[$key_class]['in']=$num[$key_class]['in']+1;
					}else{
						$num[$key_class]['out']=$num[$key_class]['out']+1;
					}
				}
			}
		}
		
		$body = View::factory('day_check/day_check_detail')
				->set('parameter',$parameter)
				->bind('yearMonDay',$yearMonDay)
				->bind('months',$months)
				->bind('days',$days)
				->bind('week',$week)
				->bind('timeList',$timeList)
				->bind('num',$num)
				->bind('workerList',$worker_List)
				->bind('child_Info',$child_Info)
				->bind('day_head',$day_head);
		
		$this->response->body($body);
	}
	
	/**
	 * 获取最新的通知设定
	 */
	public function action_getNewNotice(){
		if ($this->request->is_ajax()){
			$time=Session::instance()->get('checkTime');
			$rst = Model::factory('dayCheck')->getNewNotice($time);
			if(!empty($rst)){
				echo  json_encode(array('result'=>TRUE,'notice'=>$rst));
				Session::instance()->set('checkTime', date('Y-m-d H:i:s'));
			}else{
				echo  json_encode(array('result'=>FALSE,'notice'=>''));
			}			
		}
	}
	
	/**
	 *  保存更新数据
	 */
	public function action_dayCheckDetailUpdate(){
		if ($this->request->is_ajax()){
			$rst = Model::factory('dayCheck')->dayCheckDetailUpdate($this->request);
			echo  json_encode(array('result'=>$rst));
		}else{
			Model::factory('dayCheck')->dayCheckDetailUpdate($this->request);
		}
	}
	
	/**
	 * 0 歳 児[C1]PDF
	 * 
	 */
	public function action_dayCheckDetailPDF1(){
		
		if(array_key_exists('yearMonDay',$_GET)&&!empty($_GET['yearMonDay'])){
			$yearMonDay = $_GET['yearMonDay'];
			list($Y,$m,$d) = explode('-',$yearMonDay);
			$week = Public_Times::getWeek($yearMonDay);
			$parameter=Kohana::$config->load('parameter');
			//具体班级(PDF为C1使用)
			$class='C1';
		
			$model=Model::factory('dayCheck');
			//当前班级 head部分数据
			$head_data=$model->getDayCheckHeadByClass($yearMonDay,'C1');

			//和孩子相关的睡觉，登降圆等数据
			$child_info=$model->getChildrenDetailByClass($yearMonDay,'C1');

			
			//某个班级的温度和湿度数据
			$temp_data=$model->getTempCheckByClass($yearMonDay,'C1');
			//print_r($child_info);
			//exit();
		
			$html = (string)View::factory('day_check/dayCheckDetailPDF1')
						->bind('parameter',$parameter)
						->bind('class', $class)
						->bind('yearMonDay',$yearMonDay)
						->bind('week',$week)
						->bind('head_data',$head_data)
						->bind('child_info',$child_info)
						->bind('temp_data',$temp_data);
			//echo $html;exit;
			unset($child_info);
			unset($temp_data);
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
		
			$mpdf=new mPDF('ja','A3',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		
				
			$mpdf->WriteHTML($html,0);
		
			$mpdf->Output('0歳児クラス午睡チェック入り登降園簿.pdf','I');
			exit;
		}
	}
	
	/**
	 * 1・2・満 3 歳 児  C2,C3,C4 PDF
	 */
	public function action_dayCheckDetailPDF2(){
		if(array_key_exists('yearMonDay',$_GET)&&!empty($_GET['yearMonDay'])&&array_key_exists('class',$_GET)&&!empty($_GET['class'])){
			
			$yearMonDay = $_GET['yearMonDay'];
			$class=$_GET['class'];		
			
			//基本的参数
			$week = Public_Times::getWeek($yearMonDay);
			$parameter=Kohana::$config->load('parameter');
			
			$model=Model::factory('dayCheck');
			//当前班级 head部分数据
			$head_data=$model->getDayCheckHeadByClass($yearMonDay,$class);
			//某个班级的温度和湿度数据
			$temp_data=$model->getTempCheckByClass($yearMonDay,$class);
			//和孩子相关的睡觉，登降圆等数据
			$child_info=$model->getChildrenDetailByClass($yearMonDay,$class);
			
	
	
			$html = (string)View::factory('day_check/dayCheckDetailPDF2')
								->bind('parameter',$parameter)
								->bind('class', $class)
								->bind('yearMonDay',$yearMonDay)
								->bind('week',$week)
								->bind('head_data',$head_data)
								->bind('child_info',$child_info)
								->bind('temp_data',$temp_data);
		
			//echo $html;exit;
			unset($child_info);
			unset($temp_data);
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	
			$mpdf=new mPDF('ja','A3',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	
	
			$mpdf->WriteHTML($html,0);	
			$mpdf->Output('1・2・満3歳児クラス午睡チェック入り登降園簿.pdf','I');
			exit;
		}		
	}
	
	/**
	 * 3・4・5 歳 児 (PDF)PDF
	 */
	public function action_dayCheckDetailPDF3(){
		if(array_key_exists('yearMonDay',$_GET)&&!empty($_GET['yearMonDay'])&&array_key_exists('class',$_GET)&&!empty($_GET['class'])){
			
			$yearMonDay = $_GET['yearMonDay'];
			$class=$_GET['class'];
				
			//基本的参数
			$week = Public_Times::getWeek($yearMonDay);
			$parameter=Kohana::$config->load('parameter');
			
			$model=Model::factory('dayCheck');
			//当前班级 head部分数据
			$head_data=$model->getDayCheckHeadByClass($yearMonDay,$class);
			//某个班级的温度和湿度数据
			$temp_data=$model->getTempCheckByClass($yearMonDay,$class);
			
			//和孩子相关的睡觉，登降圆等数据
			$child_info=$model->getChildrenDetailByClassRecog($yearMonDay,$class);	
			//print_r($child_info);
			//exit();
			
			$html = (string)View::factory('day_check/dayCheckDetailPDF3')
										->bind('parameter',$parameter)
										->bind('class', $class)
										->bind('yearMonDay',$yearMonDay)
										->bind('week',$week)
										->bind('head_data',$head_data)
										->bind('child_info',$child_info)
										->bind('temp_data',$temp_data);
			//echo $html;exit;
			unset($child_info);
			unset($temp_data);
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	
			$mpdf=new mPDF('ja','A3',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	
	
			$mpdf->WriteHTML($html,0);
	
			$mpdf->Output('3・4・5 歳児クラス午睡チェック入 り登降園簿.pdf','I');
			exit;
		}
	}
	
	/**
	 * 0・1・2 歳 児 (PDF)PDF 【25-08】出席簿フォーマット(0～2歳児クラス)
	 */
	public function action_dayCheckPresentPDF1(){
		if(array_key_exists('yearMon',$_GET)&&!empty($_GET['yearMon'])&&array_key_exists('class',$_GET)&&!empty($_GET['class'])){
				
			$yearMon = $_GET['yearMon'];
			$class=$_GET['class'];
			
			//基本参数
			$parameter=Kohana::$config->load('parameter');
			//这个月的天数
			$days = date('t', strtotime($yearMon.'-01'));
			//
			$rst=Model::factory('dayCheck')->getChildCheckTimeClass($class,$yearMon);
			$child_CheckList=$rst['child_Info'];
			$all=$rst['all'];
			//print_r($child_CheckList);
			//exit();
			//unset($rst);
			$html = (string)View::factory('day_check/dayCheckPresentPDF1')
								->bind('parameter',$parameter)
								->bind('class',$class)
								->bind('yearMon',$yearMon)
								->bind('days',$days)
								->bind('all',$all)
								->bind('child_CheckList',$child_CheckList);
			//echo $html;exit;
			unset($child_CheckList);
			unset($parameter);
			unset($all);
				
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	
			$mpdf=new mPDF('ja','A3',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	
	
			$mpdf->WriteHTML($html,0);
	
			$mpdf->Output('出席簿フォーマット(0～2歳児クラス).pdf','I');
			exit;
		}
	}
	
	/**
	 * 【25-08】出席簿フォーマット(満3～5歳児クラス)
	 */
	function action_dayCheckDetailprint2(){
		if(array_key_exists('yearMon',$_GET)&&!empty($_GET['yearMon'])&&array_key_exists('class',$_GET)&&!empty($_GET['class'])){
	
			$yearMon = $_GET['yearMon'];
			$class = $_GET['class'];
			list($Y,$M) = explode('-', $yearMon);
			$yearMon = $Y.'-'.$M;
			$parameter=Kohana::$config->load('parameter');
			$days = cal_days_in_month(CAL_GREGORIAN, $M, $Y);
	
			$listR1 = Model::factory('dayCheck')->getPrintListR1($class,$days,$yearMon);
			$listR2 = Model::factory('dayCheck')->getPrintListR2($class,$days,$yearMon);
	
			$col_absence_num = Model::factory('dayCheck')->col_absence_num($class,$days,$yearMon);
			$col_noabsence_num = Model::factory('dayCheck')->col_noabsence_num($class,$days,$yearMon);
	
			$table_holiday = Cache::instance()->get('table_day_parameter');
			$Holiday = DB::select()->from($table_holiday)->where('Para_HolidayChecked','=','1')->execute()->as_array();
			$holiday = array();
			foreach($Holiday as $key=>$val){
				$holiday[$key]=$val['Para_Date'] ;
			}
			//print_r($col_noabsence_num);
			//exit();
	
	
	
			$total_absence_num=0;
			for($i=0;$i<$days;$i++){
				$total_absence_num +=$col_absence_num[$i];
			}
	
			$total_count = count($listR1)+count($listR2);
			$no_absence_num=$total_count*$days-$total_absence_num;
	
	
			$html = View::factory('day_check/dayCheckDetailprint2')
								->bind('parameter',$parameter)
								->bind('Y',$Y)
								->bind('M',$M)
								->bind('days',$days)
								->bind('listR1',$listR1)
								->bind('listR2',$listR2)
								->bind('class',$class)
								->bind('col_absence_num',$col_absence_num)
								->bind('col_noabsence_num',$col_noabsence_num)
								->bind('total_count',$total_count)
								->bind('total_absence_num',$total_absence_num)
								->bind('no_absence_num',$no_absence_num)
								->bind('holiday',$holiday);
			
			//echo $html;exit;
	
			unset($listR1);
			unset($listR2);
	
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
	
			$mpdf=new mPDF('ja','A3',0,'',15,15,10,16,9,9);
			$mpdf->allow_charset_conversion=true;
			$mpdf->charset_in='UTF-8';
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
	
				
			$mpdf->WriteHTML($html,0);
			$mpdf->Output('出席簿フォーマット(満3～5歳児クラス).pdf','I');
			exit;
			//$this->response->body($html);
		}
	
	}
	
	
	
}