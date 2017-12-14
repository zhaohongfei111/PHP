<?php
class Model_DBCommon extends Model{		
	protected  $customerType; 	//登录用户 是管理员用户 还是 保育者用户
	
	public function __construct(){
		if(Cache::instance()->get('isSet')!=1){
			//初始化设置表和字段信息
			self::setTablesFieldsParam();
		}		
		$this->customerType = strtolower(URL::base()) =='/kindergarden/'?'Admin':'Guardian';		
	}
	
	/**
	 * 查询
	 * @param unknown $table
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function select($table)
	{
		try {
						
			return DB::select()->from($table)->execute()->as_array();	
					
		} catch (Exception $e) {
			
			$e->getMessage();
			
		}
	}
	
	/**
	 * 写入
	 * @param unknown $table
	 * @param unknown $values
	 * @return array($insert_id, $total_rows)
	 */
	public function insert($table,$values)
	{
		try {
			return DB::insert($table,array_keys($values))->values(array_values($values))->execute();
			
		} catch (Exception $e) {			
			$e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * 写入数据库
	 * @param unknown $table
	 * @param unknown $setArray
	 * @param string $where
	 * @return $total_rows
	 */
	public function update($table,$setArray,$key,$value)
	{
		try {
			return DB::update($table)->set($setArray)->where($key,'=',$value)->execute();					
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;			
		}
	}
	
	/**
	 * 写入数据库
	 * @param unknown $table
	 * @param unknown $setArray
	 * @param string $where
	 * @return $total_rows
	 */
	public function update2($table,$setArray,$key1,$value1,$key2,$value2)
	{
		try {
			return DB::update($table)->set($setArray)->where($key1,'=',$value1)->and_where($key2,'=',$value2)->execute();
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * 写入数据库，多限定条件
	 * 新加入，留着需要的地方用
	 */
	public function updateMix($table,$setArray,$matchArray)
	{
		try {			
			$sql=DB::update($table)->set($setArray);
			$tag=0;
			//多个where条件
			foreach ($matchArray as $key => $val){
				if($tag==0){
					$sql=$sql->where($key,'=',$val);
				}else{
					$sql=$sql->and_where($key, '=', $val);
				}	
				$tag++;			
			}
			return $sql->execute();
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	
	/**
	 * 根据特定key=>val值查询
	 */
	public function selectByKey($table,$key,$value)
	{
		try {	
			return DB::select()->from($table)->where($key,'=',$value)->execute()->as_array();				
		} catch (Exception $e) {				
			$e->getMessage();

		}		
	}
	/**
	 * 
	 * @param unknown $table
	 * @param unknown $key
	 * @param unknown $value
	 * @return Ambigous <object, mixed, number, Database_Result_Cached, multitype:>
	 */
	public function delete($table,$key,$value)
	{
		try {
			
			return DB::delete($table)->where($key,'=',$value)->execute();
			
		} catch (Exception $e) {			
			$e->getMessage();
			return FALSE;			
		}
	}
	
	/**
	 * 清空表中数据
	 * @param unknown $table
	 * @return boolean
	 */
	public function deleteAll($table){
		try {			
			return DB::query(NULL, "TRUNCATE TABLE {$table}")->execute();
			//return DB::delete($table)->execute();				
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * 查询数据库中的表名
	 */
	private function getTablesList()
	{
		try {
			
			return DB::select("TABLE_NAME")->from("INFORMATION_SCHEMA.TABLES")->where('TABLE_SCHEMA','=','kindergarden')->execute()->as_array();
		
		} catch (Exception $e) {
			
			$e->getMessage();
			
		}		
	}
	
	/**
	 * 获取数据表中字段的详细信息
	 * @param unknown $table
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	private function getFieldsList($table)
	{
		try {
			
			return  DB::query(Database::SELECT, "DESC `{$table}`")->execute()->as_array();
						
		} catch (Exception $e) {
			
			$e->getMessage();
			
		}
	}
	
	/**
	* 设置参数放到缓存当中
	* $table_child_1_base  ='Child_1_Base';
	* 	 $table_child_1_base_field =array('Child_Id', 'InputDate', 'FamilyName', 'GivenName',
	* 			'FamilyName_Spell', 'GivenName_Spell', 'NickName', 'Birthday', 'Age', 'Sex', 'PostCode', 'Address', 'Tel','Recog_Type','Recog_Date', 'Class', 'Temper', 'BloodType',
	* 			'Traffic_Way', 'Traffic_TakeTime', 'Traffic_Distance', 'Traffic_OtherWay', 'Arrive_Time', 'Arrive_ByWho', 'Arrive_ByOther', 'Arrive_Time_Rest',
	* 			'Arrive_ByWho_Rest', 'Arrive_ByOther_Rest', 'Leave_Time', 'Leave_ByWho', 'Leave_ByOther', 'Leave_Time_Rest', 'Leave_ByWho_Rest', 'Leave_ByOther_Rest',
	* 			'Hospital_Physical', 'Hospital_Physical_Tel','Hospital_Tooth', 'Hospital_Tooth_Tel','Hospital_Eye', 'Hospital_Eye_Tel', 'Hospital_EarNose', 'Hospital_EarNose_Tel',
	* 			'Hospital_Skin', 'Hospital_Skin_Tel', 'Hospital_Child', 'Hospital_Child_Tel', 'Insurance_Record', 'Insurance_Number', 'Insurance_File', 'Insurance_Assistance',
	* 			'Nearby1_Class', 'Nearby1_ChildName', 'Nearby2_Class', 'Nearby2_ChildName');
	* 	 $table_child_2_family='child_2_family';
	* 	 $table_child_2_family_field =array('Guardian1_FamilyName','Guardian1_GivenName', 'Guardian1_FamilyName_Spell', 'Guardian1_GivenName_Spell','Guardian1_Birthday', 'Guardian1_Age', 'Guardian1_Sex',
	* 			'Guardian1_Relation', 'Guardian1_WorkPlace', 'Guardian1_WorkAddress', 'Guardian1_WorkTel', 'Guardian1_Mobile','Guardian1_WorkTime_Begin', 'Guardian1_WorkTime_End',
	* 			'Guardian1_WorkTime_Begin_Rest', 'Guardian1_WorkTime_End_Rest', 'Guardian1_RestDay', 'Guardian1_RestOther', 'Guardian2_FamilyName', 'Guardian2_GivenName', 'Guardian2_GivenName_Spell',
	* 			'Guardian2_FamilyName_Spell', 'Guardian2_Birthday', 'Guardian2_Age', 'Guardian2_Sex', 'Guardian2_Relation', 'Guardian2_WorkPlace', 'Guardian2_WorkAddress', 'Guardian2_WorkTel',
	* 			'Guardian2_Mobile', 'Guardian2_WorkTime_Begin', 'Guardian2_WorkTime_End', 'Guardian2_WorkTime_Begin_Rest', 'Guardian2_WorkTime_End_Rest', 'Guardian2_RestDay', 'Guardian2_RestOther',
	* 			'Assist_FamilyName', 'Assist_GivenName', 'Assist_FamilyName_Spell', 'Assist_GivenName_Spell', 'Assist_Address', 'Assist_Tel', 'Assist_Sex', 'Assist_Reation', 'Member1_FamilyName',
	* 			'Member1_GivenName', 'Member1_FamilyName_Spell', 'Member1_GivenName_Spell', 'Member1_Birthday', 'Member1_Age', 'Member1_Sex', 'Member1_Relation', 'Member1_WorkPlace', 'Member2_FamilyName',
	* 			'Member2_GivenName', 'Member2_FamilyName_Spell', 'Member2_GivenName_Spell', 'Member2_Birthday', 'Member2_Age', 'Member2_Sex', 'Member2_Relation', 'Member2_WorkPlace', 'Member3_FamilyName',
	* 			'Member3_GivenName', 'Member3_FamilyName_Spell', 'Member3_GivenName_Spell', 'Member3_Birthday', 'Member3_Age', 'Member3_Sex', 'Member3_Relation', 'Member3_WorkPlace', 'Member4_FamilyName',
	* 			'Member4_GivenName', 'Member4_FamilyName_Spell', 'Member4_GivenName_Spell', 'Member4_Birthday', 'Member4_Age', 'Member4_Sex', 'Member4_Relation', 'Member4_WorkPlace', 'Member5_FamilyName',
	* 			'Member5_GivenName', 'Member5_FamilyName_Spell', 'Member5_GivenName_Spell', 'Member5_Birthday', 'Member5_Age', 'Member5_Sex', 'Member5_Relation', 'Member5_WorkPlace', 'Member6_FamilyName',
	* 			'Member6_GivenName', 'Member6_FamilyName_Spell', 'Member6_GivenName_Spell', 'Member6_Birthday', 'Member6_Age', 'Member6_Sex', 'Member6_Relation', 'Member6_WorkPlace', 'Member7_FamilyName',
	* 			'Member7_GivenName', 'Member7_FamilyName_Spell', 'Member7_GivenName_Spell', 'Member7_Birthday', 'Member7_Age', 'Member7_Sex', 'Member7_Relation', 'Member7_WorkPlace', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_3_status='child_3_status';
	* 	 $table_child_3_status_field = array('Birth_Period', 'Birth_Weight', 'Birth_Status', 'Birth_Remark', 'Suckle_Status', 'Suckle_Way', 'Suckle_StopAgeY', 'Suckle_StopAgeM', 'Walk_Status', 'Walk_BeginAgeY', 'Walk_BeginAgeM',
	* 			'Language_Status', 'Language_BeginAgeY', 'Language_BeginAgeM', 'RaiseMen_Relation', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_3_vaccine='child_3_vaccine';
	* 	 $table_child_3_vaccine_field= array('4Mix_Date1', '4Mix_Date2', '4Mix_Date3', '4Mix_DateAdd', 'FluB_Date1', 'FluB_Date2', 'FluB_Date3', 'FluB_DateAdd', 'Pneumonia_Date1', 'Pneumonia_Date2', 'Pneumonia_Date3', 'Pneumonia_DateAdd',
	* 			'Encephalitis_Date1', 'Encephalitis_Date2', 'Encephalitis_DateAdd', 'Polio_Date1', 'Polio_Date2', 'Polio_Date3', 'Polio_Date4', 'BCG_Date', 'Measles_Date1', 'Measles_Date2', 'Mumps_Date',
	* 			'Chickenpox_Dateol', 'Vaccine_Remark', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_4_health='child_child_4_health';
	* 	 $table_child_4_health_field = array('His_Measles', 'His_Measles_Age', 'His_Chickenpox', 'His_Chickenpox_Age', 'His_Mumps', 'His_Mumps_Age', 'His_Rubella', 'His_Rubella_Age', 'His_Cough', 'His_Cough_Age', 'His_RedSpot',
	* 			'His_RedSpot_Age', 'His_HFMD', 'His_HFMD_Age', 'His_BacteriaInfect', 'His_BacteriaInfect_Age', 'His_Otitis', 'His_Otitis_Age', 'His_Pneumonia', 'His_Pneumonia_Age', 'His_Asthma', 'His_Asthma_Age',
	* 			'His_Poisoned', 'His_Poisoned_Age', 'His_Remark_Health', 'His_Remark_Injury', 'Body_HaveTic', 'Body_CatchCold', 'Body_Tonsil', 'Body_Diarrhea', 'Body_SkinWeak', 'Body_NoseBleed', 'Body_Fever',
	* 			'Body_Asthma', 'Body_Disjoint', 'Body_Disjoint_Place', 'Body_Atopy', 'Body_Atopy_Skin', 'Body_Atopy_Asthma', 'Body_Atopy_Remark', 'Body_Urticaria', 'Body_Urticaria_Reason', 'Body_Allergy',
	* 			'Body_Allergy_Reason', 'Body_Allergy_FoodDrug', 'Body_Other', 'Body_Other_Remark', 'Eye_Status', 'Eye_Status_Remark', 'Ear_Status', 'Ear_Status_History', 'Health_Remark', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_5_live1='child_5_live1';
	* 	 $table_child_5_live1_field=array('Eat_Appetite', 'Eat_Speed', 'Eat_Like', 'Eat_Unlike', 'Eat_Snacks', 'Eat_Snacks_Time', 'Toilet_Big', 'Toilet_Big_Leak', 'Toilet_Small', 'Toilet_Small_Period', 'Toilet_Night', 'Sleep_WakeTime',
	* 			'Sleep_Wake', 'Sleep_SleepTime', 'Sleep_Sleep', 'Sleep_Who', 'Sleep_Who_Other', 'Sleep_Daytime', 'Sleep_Daytime_Spend', 'Live1_Remark', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_5_live2='child_5_live2';
	* 	 $table_child_5_live2_field =array('Language', 'StrongHand', 'Hobby', 'DistingMen', 'Friend1_Age', 'Friend1_Name', 'Friend2_Age', 'Friend2_Name', 'PlayPlace', 'PlayPlace_Remark', 'LikePlay', 'TVTime', 'GameTime', 'Housework',
	* 			'Housework_Remark', 'Dress', 'Dress_Remark', 'Money', 'Money_Count', 'Money_Use', 'Feature_Good', 'Feature_Low', 'Live2_Remark', 'Child_1_Base_Child_Id');
		
	* 	 $table_child_6_agree='child_6_agree';
	* 	 $table_child_6_agree_field=array('Agree', 'Agree_Hope', 'Agree_Remark', 'Child_1_Base_Child_Id');
	*
	*
	*	获取方法 Cache::instance()->get('table_child_1_base_fields')
	*
	*
	*/
	public function setTablesFieldsParam()
	{
		try {			
			
			// Load the memcache cache driver using default setting
			$sqlite = Cache::instance();
			
			//获取所有的table表名
			$tableList = self::getTablesList();
			
			foreach ($tableList as $val){

				$sqlite->set("table_{$val['TABLE_NAME']}", $val['TABLE_NAME'] , 99999999);				
				
				//$table_child_1_base_field
				$fieldsList = self::getFieldsList($val['TABLE_NAME']);				
				
				$tmpFieldsList = array();
				
				foreach ($fieldsList as $key_f=>$val_f){

					$tmpFields['Field'] = $val_f['Field'];
					$tmpFields['not_empty'] = $val_f['Null']=='NO'?TRUE:FALSE;					
					
					switch (substr($val_f['Type'], 0,3)) {	
						case 'var':
							$tmpFields['Validation'] = array(array('max_length',array(':value',substr($val_f['Type'], 8,-1))));
						break;
						case 'int':
							$tmpFields['Validation'] = array(array('max_length',array(':value',substr($val_f['Type'], 4,-1))),array('numeric',NULL));
							break;
						case 'tim':
							$tmpFields['Validation'] = array(array('regex',array(':value','/^(0\d{1}|1\d{1}|2[0-3]):[0-5]\d{1}:([0-5]\d{1})$/')));
							break;						
						default:
							$tmpFields['Validation'] = array();
						break;
					}					
					$tmpFieldsList[$val_f['Field']] = $tmpFields;					
				}
							
				$sqlite->set("table_{$val['TABLE_NAME']}_fields", $tmpFieldsList ,99999999);
			}
			//已经设置成功
			$sqlite->set('isSet', 1, 99999999);
		} catch (Exception $e) {			
			$e->getMessage();			
		}		
	}
	
	/**
	 * 删除所有缓存
	 * 包括数据库的字段信息
	 */
	public function deleteCache()
	{
		try {			
			// Load the memcache cache driver using default setting
			$sqlite = Cache::instance();			
			$sqlite->delete_all();			
			$sqlite->set('isSet', 0);			
		} catch (Exception $e) {			
			$e->getMessage();			
		}
	}
	
	/**
	 * 重新设置参数
	 */
	public function resetTablesFieldsParam()
	{
		self::deleteCache();
		self::setTablesFieldsParam();		
	}

	/**
	 * $data['Child_Id'] = $request->post('txt_Child_Id');
	 * $data['Child_Id'] = $request->post('txt_Child_Id');
	 */
	public function quickCreateParam()
	{
		foreach( Cache::instance()->get('table_child_1_base_fields') as $val){
			echo '$'."data['{$val["Field"]}'] = ".'$request->post(\'txt_'.$val["Field"]."');<br/>";
		}
	}
	
}