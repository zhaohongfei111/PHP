<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Sellevel {
	
	public function before()
	{
		parent::before();		
	}
	
	public function action_index()
	{
		Model::factory('initialize')->guardian();//初始化保育者信息，无效化孩子都毕业的保育者(修正的功能)
		
		
		Session::instance()->set('checkTime',date('Y-m-d H:i:s'));//2017-2-14 登降圆 显示最新notice通知用。设置当前时间戳。
		
		$notice=Model::factory('master')->getNoticeBoard();
		if($this->customerType=='Admin'){
			$body = View::factory('index/index');
		}else{
			$Guardian_ID = Session::instance()->get('Guardian_ID');
			$child = Model::factory('child')->step1_selectByChildId($Guardian_ID);			
			$authority = Session::instance()->get('Authority');
						
			//master_guardianCon
			$table_guardianCon=Cache::instance()->get('table_master_guardiancon');
			$guardianCon = Model::factory('master')->getData($table_guardianCon);
			
			$body = View::factory('index/index1')
					->bind('Child_Id',$Guardian_ID)
					->bind('child',$child)
					->bind('guardianCon',$guardianCon)
					->bind('authority',$authority);
		}
		View::bind_global('notice', $notice);
		
		$this->response->body($body);
	}	
}