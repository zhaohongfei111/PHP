<?php
/**
 * 装个系统数据更新初始化
 * @author gh
 *
 */
class Model_initialize extends Model_DBCommon{
	
	/**
	 * 保护者是否有效
	 */
	public static function guardian(){	
		
		$table_base = Cache::instance()->get('table_child_1_base');
		$table_guardian = Cache::instance()->get('table_user_guardian');
		$yearMonDay = date('Y-m-d');
		
		
		$guardian_List = Model::factory('userGuardian')->userGuardianList('');
		if(!empty($guardian_List)){
			foreach ($guardian_List as $key =>$val){
				$check_rst='0';
				$group=DB::select('group')->from($table_base)->where('Child_Id','=',$val['Guardian_ID'])->execute()->get('group');	
				//获取同一个group下的兄弟孩子
				$children=DB::select()->from($table_base)->where('group','=',$group)->execute()->as_array();	
				//判断孩子是否退圆
				foreach ($children as $key_child => $val_child){
					if($val_child['LeaveDate']=='0000-00-00'||($val_child['LeaveDate']>=$yearMonDay)){
						$check_rst='1';
					}
				}
				DB::update($table_guardian)->set(array('Available'=>$check_rst))->where('Guardian_ID','=',$val['Guardian_ID'])->execute();
			}
		}		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}