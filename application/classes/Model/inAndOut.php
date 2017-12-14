<?php
class Model_inAndOut extends Model_DBCommon{
	
	public function childrenByClass(){
		$table = Cache::instance()->get('table_child_1_base');	
		
		$info=array();
		$info['C1']=parent::selectByKey($table, 'Class', 'C1');
		$info['C2']=parent::selectByKey($table, 'Class', 'C2');
		$info['C3']=parent::selectByKey($table, 'Class', 'C3');
		$info['C4']=parent::selectByKey($table, 'Class', 'C4');
		$info['C5']=parent::selectByKey($table, 'Class', 'C5');
		$info['C6']=parent::selectByKey($table, 'Class', 'C6');
		$info['C7']=parent::selectByKey($table, 'Class', 'C7');

		return $info;				
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}