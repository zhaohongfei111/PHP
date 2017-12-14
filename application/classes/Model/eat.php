<?php
class Model_eat extends Model_DBCommon{
	
	/**
	 * 验证数据
	 * @param unknown $request
	 */
	public function Validation_eat($request)
	{
		$data['Child_Eat']=$request->post('chkbox_Child_Eat');
		
		$txt_Child_EatDate_Y = $request->post('txt_Child_EatDate_Y');
		$txt_Child_EatDate_M = $request->post('txt_Child_EatDate_M');
		$txt_Child_EatDate_M=strlen($txt_Child_EatDate_M)==1?'0'.$txt_Child_EatDate_M:$txt_Child_EatDate_M;
		$txt_Child_EatDate_D = $request->post('txt_Child_EatDate_D');
		$txt_Child_EatDate_D=strlen($txt_Child_EatDate_D)==1?'0'.$txt_Child_EatDate_D:$txt_Child_EatDate_D;
		$Child_EatDate = empty($txt_Child_EatDate_Y)?'0000':$txt_Child_EatDate_Y;
		$Child_EatDate .= empty($txt_Child_EatDate_M)?'-00':'-'.$txt_Child_EatDate_M;
		$Child_EatDate .= empty($txt_Child_EatDate_D)?'-00':'-'.$txt_Child_EatDate_D;
		$data['Child_EatDate'] = $Child_EatDate;
		
		$object = Validation::factory($data);
		$tableFileds = Cache::instance()->get('table_child_1_base_fields');
		foreach ($data as $key => $val){
			if($key=='Child_1_Base_ID') continue;
			if($tableFileds[$key]['not_empty'])	$object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
		
	}
	
	public function eat_Data(& $request)
	{
		$data = self::Validation_eat($request);
		if($data->check()){
			$table = Cache::instance()->get('table_child_1_base');
			$ID = $request->post('hidden_ID');			
			$total_rows = parent::update($table, $data->as_array(),'ID',$ID);
			return TRUE;
		}else {
			$data_errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('eat/eatList').URL::query())->execute();
			return FALSE;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
}