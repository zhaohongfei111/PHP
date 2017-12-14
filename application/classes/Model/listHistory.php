<?php
class Model_listHistory extends Model_DBCommon{
	
	
	public function getEditNumAndLastTime($child_id){
		try {
			$table_edit_change = Cache::instance()->get('table_edit_change');
			return DB::select(DB::expr("count(ID) AS `changeNum`"),'Edit_Date')->from($table_edit_change)->where('Child_1_Base_ID','=',$child_id)->execute()->current();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	/**
	 * 获取编辑list信息(具体某个详细信息)
	 */
	public function getEditListDetail($child_id){
		try {
			
			$table_edit_change = Cache::instance()->get('table_edit_change');
			return DB::select()->from($table_edit_change)->where('Child_1_Base_ID','=',$child_id)->order_by('Edit_Date','ASC')->execute()->as_array();
				
		}catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getReference($ID){
		try {
			
			$table_edit_change = Cache::instance()->get('table_edit_change');
			return DB::select('Edit_Html')->from($table_edit_change)->where('ID','=',$ID)->order_by('Edit_Date','ASC')->execute()->get('Edit_Html');
			
		} catch (Exception $e) {
			
		}
	}
	
}