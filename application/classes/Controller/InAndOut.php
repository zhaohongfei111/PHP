<?php defined('SYSPATH') or die('No direct script access.');

class Controller_InAndOut extends Controller {
	
	public function action_manage() {
		
		$children_Info=Model::factory('inAndOut')->childrenByClass();
		$body = View::factory('inAndOut/inOutManage')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('children_Info',$children_Info);
		$this->response->body($body);
		
	}
	
	public function action_comfirm() {
		$date=date('Y-m');
		//$dayList=Public_Times::getDaysList('2016','06','d','');
		$dayNum=date('t');

		$list=array();
		for($i=1;$i<=$dayNum;$i++){
			$list[$i]=Public_Times::getWeek($date.'-'.$i);
			
		}
        
		$body = View::factory('inAndOut/comfirm')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('date',$date)
				->bind('dayNum',$dayNum)
				->bind('list',$list);
		$this->response->body($body);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}