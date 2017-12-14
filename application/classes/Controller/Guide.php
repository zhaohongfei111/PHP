<?php defined('SYSPATH') or die('No direct script access.');
	header("Content-Type: text/html;charset=utf-8");
class Controller_Guide  extends Controller_Sellevel {

	
	public function action_guide(){
		$yearMonDay = date('Y-m-d');
		list($Y,$m,$d) = explode('-',$yearMonDay);
		if(array_key_exists('Select_group_year',$_GET)){
				$Select_group_year = $_GET['Select_group_year'];
		}else{
			$Select_group_year = $Y.'-0-C1';
			
		}
		if(array_key_exists('Select_group_month',$_GET)){
			$Select_group_month = $_GET['Select_group_month'];
		}else{
			$Select_group_month = $Y.'-'.$m.'-0-C1';
				
		}
		
		if(array_key_exists('Select_group_week',$_GET)){
			$Select_group_week = $_GET['Select_group_week'];
		}else{
			$Select_group_week = $Y.'-'.$m.'-1-0-C1';
		
		}
		//表示
		$tag=array_key_exists('tag', $_GET)?$_GET['tag']:'';
		
		$guideList_year = Model::factory('guide')->getguideYear($Select_group_year);
		$guideList_month = Model::factory('guide')->getguideMonth($Select_group_month);
		$guideList_week = Model::factory('guide')->getguideWeek($Select_group_week);
		
		
		
		
		
		//获得月 日 
		$months = Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList($Y,$m,'d','');
	
		
		list($Y_guide_y,$Y_guide_age,$Y_guide_class)=explode('-',$Select_group_year);
		list($M_guide_y,$M_guide_m,$M_guide_age,$M_guide_class)=explode('-',$Select_group_month);
		list($W_guide_y,$W_guide_m,$W_guide_w,$W_guide_age,$W_guide_class)=explode('-',$Select_group_week);
		
		
		
		
		
		
		if($m<=2){
			$season=3;
		}else if($m>2&&$m<=5){
			$season=0;
		}else if($m>5&&$m<=8){
			$season=1;
		}else if($m>8&&$m<=11){
			$season=2;
		}
		
		//数据库获取的year页面数据
		$data_year=array();
		foreach($guideList_year as $key =>$val){
			
		
			$data_year['txt_Year_Title']=$guideList_year[$key]['txt_Year_Title'];
			$data_year['txt_Year_Valuation']=$guideList_year[$key]['txt_Year_Valuation'];
			//$data_year['year']=$year;
			//$data_year['age']=$age;
			//$data_year['class']=$class;
			
			$data_year['txt_Month_Title']=explode('^',$guideList_year[$key]['txt_Month_Title']);
			$data_year['txt_Target']=explode('^',$guideList_year[$key]['txt_Target']);
			$data_year['txt_Life']=explode('^',$guideList_year[$key]['txt_Life']);
			$data_year['txt_Feel']=explode('^',$guideList_year[$key]['txt_Feel']);
			$data_year['txt_Health']=explode('^',$guideList_year[$key]['txt_Health']);
			$data_year['txt_Relationship']=explode('^',$guideList_year[$key]['txt_Relationship']);
			$data_year['txt_Environment']=explode('^',$guideList_year[$key]['txt_Environment']);
			$data_year['txt_Speak']=explode('^',$guideList_year[$key]['txt_Speak']);
			$data_year['txt_Performance']=explode('^',$guideList_year[$key]['txt_Performance']);
			$data_year['txt_Attention']=explode('^',$guideList_year[$key]['txt_Attention']);
			$data_year['txt_Dothings']=explode('^',$guideList_year[$key]['txt_Dothings']);
			$data_year['txt_Self_Valuation']=explode('^',$guideList_year[$key]['txt_Self_Valuation']);
		}
		
		
		//数据库获取的month页面数据
		$data_month=array();
		foreach($guideList_month as $key =>$val){
			$data_month['txt_Child_Status'] =$guideList_month[$key]['txt_Child_Status'];
			$data_month['txt_Target'] =$guideList_month[$key]['txt_Target'];
			$data_month['txt_Month_Title'] =$guideList_month[$key]['txt_Month_Title'];
			
			$data_month['txt_Dothings'] =$guideList_month[$key]['txt_Dothings'];		
			$data_month['txt_Cure_Content'] =$guideList_month[$key]['txt_Cure_Content'];
			$data_month['txt_Cure_Environment'] =$guideList_month[$key]['txt_Cure_Environment'];
			$data_month['txt_Education_Content'] =$guideList_month[$key]['txt_Education_Content'];
			$data_month['txt_Education_Environment'] =$guideList_month[$key]['txt_Education_Environment'];
			$data_month['txt_Together_Content'] =$guideList_month[$key]['txt_Together_Content'];
			$data_month['txt_Together_Environment'] =$guideList_month[$key]['txt_Together_Environment'];
			$data_month['txt_Safe_Content'] =$guideList_month[$key]['txt_Safe_Content'];
			$data_month['txt_Safe_Environment'] =$guideList_month[$key]['txt_Safe_Environment'];
			$data_month['txt_Eat'] =$guideList_month[$key]['txt_Eat'];
			$data_month['txt_Valuation'] =$guideList_month[$key]['txt_Valuation'];
			$data_month['txt_Teacher_Cooperation'] =$guideList_month[$key]['txt_Teacher_Cooperation'];
			$data_month['txt_Parents_Support'] =$guideList_month[$key]['txt_Parents_Support'];
			$data_month['txt_Area_Support'] =$guideList_month[$key]['txt_Area_Support'];
			}
		 	
			//表2根据month的月查year表的月主题
			$arr_m = array($M_guide_y,$M_guide_age,$M_guide_class);
			$M_Select_group_year = implode("-",$arr_m);
			$M_guideList_year=Model::factory('guide')->getguideYear($M_Select_group_year);
			$M_data_year = Array();
			foreach($M_guideList_year as $key =>$val){
				$M_data_year['txt_Month_Title']=explode('^',$M_guideList_year[$key]['txt_Month_Title']);
			}
			
			//表3根据month查year表数据
			$arr_w = array($W_guide_y,$W_guide_age,$W_guide_class);
			$W_Select_group_year = implode("-",$arr_w);
			$W_guideList_year=Model::factory('guide')->getguideYear($W_Select_group_year);
			$W_data_year = Array();
			
			foreach($W_guideList_year as $key =>$val){
				$W_data_year['txt_Year_Title']=$W_guideList_year[$key]['txt_Year_Title'];
				$W_data_year['txt_Month_Title']=explode('^',$W_guideList_year[$key]['txt_Month_Title']);
			}
			
			
			
		//数据库获取的week页面数据
		$data_week=array();
		foreach($guideList_week as $key =>$val){
			
			$data_week['txt_Year_Title'] = $guideList_week[$key]['txt_Year_Title'];
			$data_week['txt_Month_Title'] = $guideList_week[$key]['txt_Month_Title'];
			$data_week['txt_Week_Title'] = $guideList_week[$key]['txt_Week_Title'];
			$data_week['txt_Week_Target'] = $guideList_week[$key]['txt_Week_Target'];
			$data_week['txt_Week_Child_Status'] = $guideList_week[$key]['txt_Week_Child_Status'];
			$data_week['txt_Week_Teacher_Cooperation'] = $guideList_week[$key]['txt_Week_Teacher_Cooperation'];
			$data_week['txt_Week_Environment'] = $guideList_week[$key]['txt_Week_Environment'];
			$data_week['txt_Week_Valiation'] = $guideList_week[$key]['txt_Week_Valiation'];
		}
		
	
		
		if((preg_replace('/^0*/', '', $M_guide_m)-1)==0){
			$relmonth = 9;
		} elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==1){
			$relmonth = 10;
		} elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==2){
			$relmonth = 11;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==3){
			$relmonth = 0;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==4){
			$relmonth = 1;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==5){
			$relmonth = 2;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==6){
			$relmonth = 3;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==7){
			$relmonth = 4;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==8){
			$relmonth = 5;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==9){
			$relmonth = 6;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==10){
			$relmonth = 7;
		}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==111){
			$relmonth = 8;
		};
		
		
		if((preg_replace('/^0*/', '', $W_guide_m)-1)==0){
			$relmonth_W = 9;
		} elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==1){
			$relmonth_W = 10;
		} elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==2){
			$relmonth_W = 11;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==3){
			$relmonth_W = 0;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==4){
			$relmonth_W = 1;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==5){
			$relmonth_W = 2;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==6){
			$relmonth_W = 3;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==7){
			$relmonth_W = 4;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==8){
			$relmonth_W = 5;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==9){
			$relmonth_W = 6;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==10){
			$relmonth_W = 7;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==11){
			$relmonth_W = 8;
		};
		
		$body = View::factory('guide/guide')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('months',$months)
				->bind('days',$days)
				->bind('week',$week)
				->bind('Select_group_year',$Select_group_year)
				->bind('Select_group_month',$Select_group_month)
				->bind('Select_group_week',$Select_group_week)
				->bind('Y_guide_y',$Y_guide_y)
				->bind('Y_guide_age',$Y_guide_age)
				->bind('Y_guide_class',$Y_guide_class)
				->bind('M_guide_y',$M_guide_y)
				->bind('M_guide_m',$M_guide_m)
				->bind('M_guide_age',$M_guide_age)
				->bind('M_guide_class',$M_guide_class)
				->bind('W_guide_y',$W_guide_y)
				->bind('W_guide_m',$W_guide_m)
				->bind('W_guide_w',$W_guide_w)
				->bind('W_guide_age',$W_guide_age)
				->bind('W_guide_class',$W_guide_class)
				->bind('M_guideList_year',$M_guideList_year)
				->bind('M_data_year',$M_data_year)
				->bind('W_guideList_year',$W_guideList_year)
				->bind('W_data_year',$W_data_year)
				->bind('yearMonDay',$yearMonDay)
				->bind('guideList_year',$guideList_year)
				->bind('guideList_month',$guideList_month)
				->bind('guideList_week',$guideList_week)
				->bind('data_year',$data_year)
				->bind('data_month',$data_month)
				->bind('data_week',$data_week)				
				->bind('season',$season)
				->bind('relmonth',$relmonth)
				->bind('relmonth_W',$relmonth_W)
				->bind('tag',$tag);
		$this->response ->body($body);
					
					
	
					
}

	public function action_guideUpdate(){
		$rst = Model::factory('guide')->guideUpdate($this->request);
		echo json_encode(array('result' => $rst));
	}
	//month表
	public function action_guideUpdate2(){
		$rst = Model::factory('guide')->guideUpdate2($this->request);
		echo json_encode(array('result' => $rst));
	}
	//week表
	public function action_guideUpdate3(){
		$rst = Model::factory('guide')->guideUpdate3($this->request);
		echo json_encode(array('result' => $rst));
	}
	
	public function action_guide_yearPDF(){
		$Select_group_year = $_GET['Select_group_year'];
		$guideList_year = Model::factory('guide')->getguideYear($Select_group_year);
	
		list($Y_guide_y,$Y_guide_age,$Y_guide_class)=explode('-',$Select_group_year);
		//数据库获取的year页面数据
		$data_year=array();
		foreach($guideList_year as $key =>$val){
	
	
			$data_year['txt_Year_Title']=$guideList_year[$key]['txt_Year_Title'];
			$data_year['txt_Year_Valuation']=$guideList_year[$key]['txt_Year_Valuation'];
			$data_year['select_Year']=$Y_guide_y;
			$data_year['select_Age']=$Y_guide_age;
			$data_year['select_Class']=$Y_guide_class;
			
			$data_year['txt_Month_Title']=explode('^',$guideList_year[$key]['txt_Month_Title']);
			$data_year['txt_Target']=explode('^',$guideList_year[$key]['txt_Target']);
			$data_year['txt_Life']=explode('^',$guideList_year[$key]['txt_Life']);
			$data_year['txt_Feel']=explode('^',$guideList_year[$key]['txt_Feel']);
			$data_year['txt_Health']=explode('^',$guideList_year[$key]['txt_Health']);
			$data_year['txt_Relationship']=explode('^',$guideList_year[$key]['txt_Relationship']);
			$data_year['txt_Environment']=explode('^',$guideList_year[$key]['txt_Environment']);
			$data_year['txt_Speak']=explode('^',$guideList_year[$key]['txt_Speak']);
			$data_year['txt_Performance']=explode('^',$guideList_year[$key]['txt_Performance']);
			$data_year['txt_Attention']=explode('^',$guideList_year[$key]['txt_Attention']);
			$data_year['txt_Dothings']=explode('^',$guideList_year[$key]['txt_Dothings']);
			$data_year['txt_Self_Valuation']=explode('^',$guideList_year[$key]['txt_Self_Valuation']);
	
			$html =(string) View::factory('guide/guide_yearPDF')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('guideList_year',$guideList_year)
					->bind('data_year',$data_year);
			
			unset($data_year);
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
			
			$mpdf=new mPDF('ja','A3-L',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
			
			
			$mpdf->WriteHTML($html,0);
			
			$mpdf->Output('年間指導計画.pdf','I');
			exit;
			
			
			
		}
	}
	
	public function action_guide_monthPDF(){
		$Select_group_month = $_GET['Select_group_month'];
		$guideList_month = Model::factory('guide')->getguideMonth($Select_group_month);
		list($M_guide_y,$M_guide_m,$M_guide_age,$M_guide_class)=explode('-',$Select_group_month);
	
		//数据库获取数据
		$data_month = Array();
		foreach($guideList_month as $key =>$val){
			$data_month['txt_Child_Status'] =$guideList_month[$key]['txt_Child_Status'];
			$data_month['txt_Target'] =$guideList_month[$key]['txt_Target'];
			$data_month['txt_Month_Title'] =$guideList_month[$key]['txt_Month_Title'];
			
			$data_month['txt_Dothings'] =$guideList_month[$key]['txt_Dothings'];		
			$data_month['txt_Cure_Content'] =$guideList_month[$key]['txt_Cure_Content'];
			$data_month['txt_Cure_Environment'] =$guideList_month[$key]['txt_Cure_Environment'];
			$data_month['txt_Education_Content'] =$guideList_month[$key]['txt_Education_Content'];
			$data_month['txt_Education_Environment'] =$guideList_month[$key]['txt_Education_Environment'];
			$data_month['txt_Together_Content'] =$guideList_month[$key]['txt_Together_Content'];
			$data_month['txt_Together_Environment'] =$guideList_month[$key]['txt_Together_Environment'];
			$data_month['txt_Safe_Content'] =$guideList_month[$key]['txt_Safe_Content'];
			$data_month['txt_Safe_Environment'] =$guideList_month[$key]['txt_Safe_Environment'];
			$data_month['txt_Eat'] =$guideList_month[$key]['txt_Eat'];
			$data_month['txt_Valuation'] =$guideList_month[$key]['txt_Valuation'];
			$data_month['txt_Teacher_Cooperation'] =$guideList_month[$key]['txt_Teacher_Cooperation'];
			$data_month['txt_Parents_Support'] =$guideList_month[$key]['txt_Parents_Support'];
			$data_month['txt_Area_Support'] =$guideList_month[$key]['txt_Area_Support'];
			}
			
			//表2根据month的月查year表的月主题
			$arr_m = array($M_guide_y,$M_guide_age,$M_guide_class);
			$M_Select_group_year = implode("-",$arr_m);
			$M_guideList_year=Model::factory('guide')->getguideYear($M_Select_group_year);
			$M_data_year = Array();
			foreach($M_guideList_year as $key =>$val){
				$M_data_year['txt_Month_Title']=explode('^',$M_guideList_year[$key]['txt_Month_Title']);
			}
			if((preg_replace('/^0*/', '', $M_guide_m)-1)==0){
				$relmonth = 9;
			} elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==1){
				$relmonth = 10;
			} elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==2){
				$relmonth = 11;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==3){
				$relmonth = 0;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==4){
				$relmonth = 1;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==5){
				$relmonth = 2;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==6){
				$relmonth = 3;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==7){
				$relmonth = 4;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==8){
				$relmonth = 5;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==9){
				$relmonth = 6;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==10){
				$relmonth = 7;
			}elseif((preg_replace('/^0*/', '', $M_guide_m)-1)==111){
				$relmonth = 8;
			};
			
			$html =(string) View::factory('guide/guide_monthPDF')
								->set('parameter',Kohana::$config->load('parameter'))
								->bind('M_guide_y',$M_guide_y)
								->bind('M_guide_m',$M_guide_m)
								->bind('M_guide_age',$M_guide_age)
								->bind('M_guide_class',$M_guide_class)
								->bind('M_data_year',$M_data_year)
								->bind('M_guideList_year',$M_guideList_year)
								->bind('guideList_year',$guideList_year)
								->bind('guideList_month',$guideList_month)
								->bind('data_month',$data_month)
								->bind('relmonth',$relmonth);
			
			
			unset($data_month);
			
			
			include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
				
			$mpdf=new mPDF('ja','A3-L',0,'',15,15,10,16,9,9);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				
				
			$mpdf->WriteHTML($html,0);
				
			$mpdf->Output('月間指導計画.pdf','I');
			exit;
			
	}
	
	
	public function action_guide_weekPDF(){
		$Select_group_week = $_GET['Select_group_week'];
		$guideList_week = Model::factory('guide')->getguideWeek($Select_group_week);
		list($W_guide_y,$W_guide_m,$W_guide_w,$W_guide_age,$W_guide_class)=explode('-',$Select_group_week);
		//数据库获取的week页面数据
		$data_week=array();
		foreach($guideList_week as $key =>$val){
				
			$data_week['txt_Year_Title'] = $guideList_week[$key]['txt_Year_Title'];
			$data_week['txt_Month_Title'] = $guideList_week[$key]['txt_Month_Title'];
			$data_week['txt_Week_Title'] = $guideList_week[$key]['txt_Week_Title'];
			$data_week['txt_Week_Target'] = $guideList_week[$key]['txt_Week_Target'];
			$data_week['txt_Week_Child_Status'] = $guideList_week[$key]['txt_Week_Child_Status'];
			$data_week['txt_Week_Teacher_Cooperation'] = $guideList_week[$key]['txt_Week_Teacher_Cooperation'];
			$data_week['txt_Week_Environment'] = $guideList_week[$key]['txt_Week_Environment'];
			$data_week['txt_Week_Valiation'] = $guideList_week[$key]['txt_Week_Valiation'];
		}
		
		//表3根据month查year表数据
		$arr_w = array($W_guide_y,$W_guide_age,$W_guide_class);
		$W_Select_group_year = implode("-",$arr_w);
		$W_guideList_year=Model::factory('guide')->getguideYear($W_Select_group_year);
		$W_data_year = Array();
			
		foreach($W_guideList_year as $key =>$val){
			$W_data_year['txt_Year_Title']=$W_guideList_year[$key]['txt_Year_Title'];
			$W_data_year['txt_Month_Title']=explode('^',$W_guideList_year[$key]['txt_Month_Title']);
		}
		
		if((preg_replace('/^0*/', '', $W_guide_m)-1)==0){
			$relmonth_W = 9;
		} elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==1){
			$relmonth_W = 10;
		} elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==2){
			$relmonth_W = 11;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==3){
			$relmonth_W = 0;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==4){
			$relmonth_W = 1;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==5){
			$relmonth_W = 2;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==6){
			$relmonth_W = 3;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==7){
			$relmonth_W = 4;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==8){
			$relmonth_W = 5;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==9){
			$relmonth_W = 6;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==10){
			$relmonth_W = 7;
		}elseif((preg_replace('/^0*/', '', $W_guide_m)-1)==11){
			$relmonth_W = 8;
		};
		
		$html =(string) View::factory('guide/guide_weekPDF')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('W_guide_y',$W_guide_y)
						->bind('W_guide_m',$W_guide_m)
						->bind('W_guide_age',$W_guide_age)
						->bind('W_guide_class',$W_guide_class)
						->bind('W_data_year',$W_data_year)
						->bind('W_guideList_year',$W_guideList_year)
						->bind('guideList_year',$guideList_year)
						->bind('guideList_week',$guideList_week)
						->bind('data_week',$data_week)
						->bind('relmonth_W',$relmonth_W);
		
		
		
		unset($data_week);
		include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR.'mpdf','mpdf'));
		
		$mpdf=new mPDF('ja','A3-L',0,'',15,15,10,16,9,9);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
		
		
		$mpdf->WriteHTML($html,0);
		
		$mpdf->Output('週間指導計画.pdf','I');
		exit;
	}
}