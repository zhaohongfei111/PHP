<?php
class Model_staffInfo extends Model_DBCommon{
	
	
	public function getStaffList(){
		$table = Cache::instance()->get('table_staff_info');	
		$rst=parent::select($table);
		return $rst;
	}
	
	public function Validation_staffData($request){
		$data['Staff_Name'] =  $request->post('Staff_Name');
		$data['Staff_Name_Spell'] =  $request->post('Staff_Name_Spell');
		$data['Staff_Sex'] =  $request->post('Staff_Sex');
		$data['Staff_Jobs'] =  $request->post('Staff_Jobs');
		$data['Staff_Class'] =  $request->post('Staff_Class');
		$data['Staff_Duty'] =  $request->post('Staff_Duty');
		$data['Staff_Work_Form'] =  $request->post('Staff_Work_Form');
		$data['Staff_Work_Time'] =  $request->post('Staff_Work_Time');
		
		$object = Validation::factory($data);
		
		$tableFileds = Cache::instance()->get('table_staff_info_fields');
		foreach ($data as $key => $val){
			if($tableFileds[$key]['not_empty'])	$object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	}
	
	
	//员工信息添加
	public function staffUpdate(& $request){
		try {
			$data=$this->Validation_staffData($request);
			if($data->check()){
				$table=Cache::instance()->get('table_staff_info');	
				$values = $data->as_array();				
				
				
				$Staff_ID=$request->post('Staff_ID');
				if(empty($Staff_ID)){
					$rst = parent::insert($table, $values);
					if($rst === false ){
						$result = false;
					}else{
						list($insert_id, $total_rows) = $rst;
						$Staff_ID = $insert_id;
					}
					
				}else{
					parent::update($table, $values,'Staff_ID',$Staff_ID);
				}
				return array('result'=>true,'Staff_ID'=>$Staff_ID);
			}else{
				$data_errors =  $data->errors('post');
				return array('result'=>FALSE,'errors'=>$data_errors);
			}
			
		}catch ( Database_Exception $e ){
			return array('result'=>FALSE,'errors'=>array('SYS異常があります。'));
		}
	}
	
	/*
	 * 删除选取的staff的信息
	 */
	public function delStaff($staff_ID_arr){
		try {
			$table = Cache::instance()->get('table_staff_info');
			$total_rows = DB::delete($table)->where('Staff_ID', 'IN', $staff_ID_arr)->execute();
			return TRUE;
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return FALSE;
		}
	}	
	
}