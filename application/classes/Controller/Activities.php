<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Activities extends Controller_Sellevel {
	
	public function action_activitiesList() {				
		$table = Cache::instance()->get('table_child_1_base');
		$child_Info = Model::factory('list')->getList($table);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['Age']=Public_Times::getAge($val['Birthday']);
			$child_Info[$key]['Birthday'] = Public_Times::handleBirthday($val['Birthday']);
			$child_Info[$key]['YearJap']=Public_Times::getYearJap(substr($val['Birthday'], 0,4));
		}
		//课外活动列表
		$activities = Model::factory('master')->getEffectiveActivities();
		
		$body = View::factory('activities/activitiesList')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('child_Info',$child_Info)
						->bind('activities',$activities);
		$this->response->body($body);		
	}
	
	public function action_activitiesEdit(){
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID=$_GET['ID'];
			$recog_Info = Model::factory('child')->getChildRecog($ID);
			$child_Info = Model::factory('child')->step1_selectByKey($ID);
			$child_Info['Age']=Public_Times::getAge($child_Info['Birthday']);
			$child_Info['Birthday'] = Public_Times::handleBirthday($child_Info['Birthday']);
			$child_Info['YearJap']=Public_Times::getYearJap(substr($child_Info['Birthday'], 0,4));
			$child_Info['Recog_Type']=$recog_Info['Recog_Type'];
			//课外活动列表
			$activities = Model::factory('master')->getEffectiveActivities();
					
			$body = View::factory('activities/activitiesEdit')			
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('child_Info',$child_Info)
						->bind('activities',$activities);
			View::set_global('ID',$child_Info['ID']);
			$this->response->body($body);
		}
	}
	
	public function action_activitiesInsert(){
		
		if(Model::factory('activities')->activities_Data($this->request)){
			$this->redirect('activities/activitiesList'.URL::query(array('ID'=>NULL)).'#tips'.$_GET['ID']);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}