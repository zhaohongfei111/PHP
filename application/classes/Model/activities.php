<?php
class Model_activities extends Model_DBCommon{
	
	
	
	
	/**
	 * 验证数据
	 * @param unknown $request
	 */
	public function Validation_activities($request)
	{
		$Activities=$request->post('chbox_Activities');
		$data['Activities'] = empty($Activities)?NULL:implode(';', $Activities);
		
		$txt_Activities_Date_Y = $request->post('txt_Activities_Date_Y');
		$txt_Activities_Date_M = $request->post('txt_Activities_Date_M');
		$txt_Activities_Date_D = $request->post('txt_Activities_Date_D');
		if(!empty($Activities)){
			foreach ($Activities as $key => $val){
				$tmpY = substr('0000'.$txt_Activities_Date_Y[$key],-4);
				$tmpM = substr('00'.$txt_Activities_Date_M[$key],-2);
				$tmpD = substr('00'.$txt_Activities_Date_D[$key],-2);
				$data['Activities_Date_'.$val] = $tmpY."-".$tmpM."-".$tmpD;
			}
		}
		
		$object = Validation::factory($data);
		$tableFileds = Cache::instance()->get('table_child_1_base_fields');
		foreach ($data as $key => $val){
			if($key=='Child_1_Base_ID') continue;
			if($tableFileds[$key]['not_empty'])	$object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	}
	
	public function activities_Data(& $request)
	{
		$data = self::Validation_activities($request);
		if($data->check()){
			$table = Cache::instance()->get('table_child_1_base');
			$ID = $request->post('hidden_ID');
			$total_rows = parent::update($table, $data->as_array(),'ID',$ID);
			return TRUE;
		}else {
			$data_errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('activities/activitiesList').URL::query())->execute();
			return FALSE;
		}
		
	}
	
	
	
}