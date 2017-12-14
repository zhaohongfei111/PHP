<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ListHistory extends Controller_Sellevel {
	
	/**
	 * 在校的孩子的修正记录情况
	 * @return unknown
	 */
	private function InTheSchoolList(){
		$model_list = Model::factory('list');
		$model_listHistory = Model::factory('listHistory');
		
		$child_Info = $model_list->getList();		
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['change'] = $model_listHistory->getEditNumAndLastTime($val['ID']);
			$rstRecog = $model_list->getChildTIMERecog($val['ID'],date('Y-m-d'));
			$child_Info[$key]['Recog_Type'] = empty($rstRecog)?'':$rstRecog['Recog_Type'];			
		}
		return $child_Info;
	}
	
	
	/**
	 * 全園児一覧(あいうえお順)
	 */
	public function action_listAll() {
		$child_Info = self::InTheSchoolList();

		$body = View::factory('listhistory/listAll')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info);
		$this->response->body($body);
	
	}
	
	/**
	 * クラスごと
	 */
	public function action_listClass() {
		$child_Info = self::InTheSchoolList();
		$body = View::factory('listhistory/listClass')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info);
		$this->response->body($body);		
	}
	
	/**
	 * 認定区分ごと
	 */
	public function action_listRecog() {
		$child_Info = self::InTheSchoolList();
		$body = View::factory('listhistory/listRecog')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info);
		$this->response->body($body);
	}
	
	/**
	 * 入園前の園児
	 */
	public function action_listBeforeAdmission() {
		$model_list = Model::factory('list');
		$model_listHistory = Model::factory('listHistory');
		
		$child_Info = $model_list->getListBeforeAdmission();
	
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['change'] = $model_listHistory->getEditNumAndLastTime($val['ID']);
			$rstRecog = $model_list->getChildTIMERecog($val['ID'],date('Y-m-d'));
			$child_Info[$key]['Recog_Type'] = empty($rstRecog)?'':$rstRecog['Recog_Type'];
		}
		$body = View::factory('listhistory/listBeforeAdmission')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info);
		$this->response->body($body);
	
	}
	
	/**
	 * 退圆列表
	 */
	public function action_listLeave() {
		$model_list = Model::factory('list');
		$model_listHistory = Model::factory('listHistory');
		
		$name = array_key_exists('txt_Search',$_GET)?$_GET['txt_Search']:'';
		$child_Info =$model_list->getLeaveList($name);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['change'] = $model_listHistory->getEditNumAndLastTime($val['ID']);
			$rstRecog = $model_list->getChildTIMERecog($val['ID'],date('Y-m-d'));
			$child_Info[$key]['Recog_Type'] = empty($rstRecog)?'':$rstRecog['Recog_Type'];
		}
		$body = View::factory('listhistory/listLeave')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('child_Info',$child_Info)
					->bind('search',$name);
		$this->response->body($body);
	
	}
	
	
	/**
	 * 園児名検索
	 */
	public function action_listRearch() {
		$model_list = Model::factory('list');
		$model_listHistory = Model::factory('listHistory');
		
		$name = array_key_exists('txt_Search', $_GET)?$_GET['txt_Search']:'';
		$child_Info = $model_list->searchByName($name);
		foreach ($child_Info as $key=>$val){
			$child_Info[$key]['change'] = $model_listHistory->getEditNumAndLastTime($val['ID']);
			$rstRecog = $model_list->getChildTIMERecog($val['ID'],date('Y-m-d'));
			$child_Info[$key]['Recog_Type'] = empty($rstRecog)?'':$rstRecog['Recog_Type'];
		}
		$body = View::factory('listhistory/listSearch')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('child_Info',$child_Info);
		View::bind_global('search',$name);
		$this->response->body($body);
	}
	
	/**
	 * 某个孩子的详细改动信息
	 */
	public function action_editHistoryDetail(){
		
		if(!array_key_exists('ID', $_GET)||empty($_GET['ID'])){
			return FALSE;
		}

		$child = Model::factory('child')->step1_selectByKey($_GET['ID']);
		$rstRecog = Model::factory('list')->getChildTIMERecog($child['ID'],date('Y-m-d'));
		$child['Recog_Type'] = empty($rstRecog)?'':$rstRecog['Recog_Type'];
		
		
		$history_list = Model::factory('listHistory')->getEditListDetail($_GET['ID']);
		
		$body = View::factory('listhistory/editHistoryDetail')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('child',$child)
						->bind('history_list',$history_list);
		$this->response->body($body);
	}
	
	
	public function action_reference(){
		if(!array_key_exists('ID', $_GET)||empty($_GET['ID'])){
			return FALSE;
		}
		$bodyHtml = Model::factory('listHistory')->getReference($_GET['ID']);
		
		$body = View::factory('listhistory/reference')
				->bind('bodyHtml',$bodyHtml);
		$this->response->body($body);
		
	}
}