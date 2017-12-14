<?php
class Model_child extends Model_DBCommon{	
	
	/**
	 * 验证
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step1($request)
	{	
		$data['Child_Id'] = $request->post('txt_Child_Id');		
		$txt_inputdate_Y = $request->post('txt_inputdate_Y');
		$select_inputdate_M = $request->post('select_inputdate_M');
		$select_inputdate_D = $request->post('select_inputdate_D');		
		$InputDate = empty($txt_inputdate_Y)?'0000':$txt_inputdate_Y;
		$InputDate .= empty($select_inputdate_M)?'-00':'-'.$select_inputdate_M;
		$InputDate .= empty($select_inputdate_D)?'-00':'-'.$select_inputdate_D;		
		$data['InputDate'] = $InputDate;
		
		$txt_EnterDate_Y = $request->post('txt_EnterDate_Y');
		$select_EnterDate_M = $request->post('select_EnterDate_M');
		$select_EnterDate_D = $request->post('select_EnterDate_D');
		$EnterDate = empty($txt_EnterDate_Y)?'0000':$txt_EnterDate_Y;
		$EnterDate .= empty($select_EnterDate_M)?'-00':'-'.$select_EnterDate_M;
		$EnterDate .= empty($select_EnterDate_D)?'-00':'-'.$select_EnterDate_D;
		$data['EnterDate'] = $EnterDate;
		
		$txt_LeaveDate_Y = $request->post('txt_LeaveDate_Y');
		$select_LeaveDate_M = $request->post('select_LeaveDate_M');
		$select_LeaveDate_D = $request->post('select_LeaveDate_D');
		$LeaveDate = empty($txt_LeaveDate_Y)?'0000':$txt_LeaveDate_Y;
		$LeaveDate .= empty($select_LeaveDate_M)?'-00':'-'.$select_LeaveDate_M;
		$LeaveDate .= empty($select_LeaveDate_D)?'-00':'-'.$select_LeaveDate_D;
		$data['LeaveDate'] = $LeaveDate;
		
		$data['FamilyName'] = $request->post('txt_FamilyName');
		$data['GivenName'] = $request->post('txt_GivenName');
		$data['FamilyName_Spell'] = $request->post('txt_FamilyName_Spell');
		$data['GivenName_Spell'] = $request->post('txt_GivenName_Spell');
		$data['NickName'] = $request->post('txt_NickName');		
		$txt_birthday_Y = $request->post('txt_birthday_Y');
		$select_birthday_M = $request->post('select_birthday_M');
		$select_birthday_D = $request->post('select_birthday_D');	
		$Birthday = empty($txt_birthday_Y)?'0000':$txt_birthday_Y;
		$Birthday .= empty($select_birthday_M)?'-00':'-'.$select_birthday_M;
		$Birthday .= empty($select_birthday_D)?'-00':'-'.$select_birthday_D;		
		$data['Birthday'] = $Birthday;
		$data['Sex'] = $request->post('radio_Sex');		
		if($request->post('halfwaySave')!='False'){
			if(empty($data['Sex'])) $data['Sex'] = '0';
		}		
		$data['PostCode'] = $request->post('txt_PostCode');
		$data['Address'] = $request->post('txt_Address');
		$data['Tel'] = $request->post('txt_Tel');
		$data['Class'] = $request->post('select_Class');
		
		$data['Child_Activities'] = $request->post('radio_Child_Activities',NULL);
		$Activities=$request->post('chbox_Activities');
		$data['Activities'] = empty($Activities)?NULL:implode(';', $Activities);		
		if(strtolower($request->action())=='step1_insert'){
			if(!empty($Activities)){
				foreach ($Activities as $key => $val){
					$data['Activities_Date_'.$val] = $EnterDate;
				}
			}
		}
		
		$data['Child_Eat'] = $request->post('radio_Child_Eat',NULL);
		$txt_child_eatdate_Y = $request->post('txt_child_eatdate_Y');
		$select_child_eatdate_M = $request->post('select_child_eatdate_M');
		$select_child_eatdate_D = $request->post('select_child_eatdate_D');
		$Child_EatDate = empty($txt_child_eatdate_Y)?'0000':$txt_child_eatdate_Y;
		$Child_EatDate .= empty($select_child_eatdate_M)?'-00':'-'.$select_child_eatdate_M;
		$Child_EatDate .= empty($select_child_eatdate_D)?'-00':'-'.$select_child_eatdate_D;
		$data['Child_EatDate'] = $Child_EatDate;

		$data['Child_Nursing'] = $request->post('radio_Child_Nursing',NULL);
		$txt_child_nursingdate_Y = $request->post('txt_child_nursingdate_Y');
		$select_child_nursingdate_M = $request->post('select_child_nursingdate_M');
		$select_child_nursingdate_D = $request->post('select_child_nursingdate_D');
		$Child_NursingDate = empty($txt_child_nursingdate_Y)?'0000':$txt_child_nursingdate_Y;
		$Child_NursingDate .= empty($select_child_nursingdate_M)?'-00':'-'.$select_child_nursingdate_M;
		$Child_NursingDate .= empty($select_child_nursingdate_D)?'-00':'-'.$select_child_nursingdate_D;
		$data['Child_NursingDate'] = $Child_NursingDate;
		
		$data['Temper'] = $request->post('txt_Temper');
		$data['BloodType'] = $request->post('select_BloodType');
		$data['Traffic_Way'] = $request->post('select_Traffic_Way');
		$data['Traffic_TakeTime'] = $request->post('select_Traffic_TakeTime');
		$data['Traffic_Distance'] = $request->post('select_Traffic_Distance');
		$data['Traffic_OtherWay'] = $request->post('txt_Traffic_OtherWay');
		$data['Arrive_Time'] = $request->post('select_Arrive_Time');
		$data['Arrive_ByWho'] = $request->post('select_Arrive_ByWho');
		$data['Arrive_ByOther'] = $request->post('txt_Arrive_ByOther');
		$data['Arrive_Time_Rest'] = $request->post('select_Arrive_Time_Rest');
		$data['Arrive_ByWho_Rest'] = $request->post('select_Arrive_ByWho_Rest');
		$data['Arrive_ByOther_Rest'] = $request->post('txt_Arrive_ByOther_Rest');		
		$data['Leave_Way'] = $request->post('select_Leave_Way');
		$data['Leave_TakeTime'] = $request->post('select_Leave_TakeTime');
		$data['Leave_Distance'] = $request->post('select_Leave_Distance');
		$data['Leave_OtherWay'] = $request->post('txt_Leave_OtherWay');		
		$data['Leave_Time'] = $request->post('select_Leave_Time');
		$data['Leave_ByWho'] = $request->post('select_Leave_ByWho');
		$data['Leave_ByOther'] = $request->post('txt_Leave_ByOther');
		$data['Leave_Time_Rest'] = $request->post('select_Leave_Time_Rest');
		$data['Leave_ByWho_Rest'] = $request->post('select_Leave_ByWho_Rest');
		$data['Leave_ByOther_Rest'] = $request->post('txt_Leave_ByOther_Rest');
		$data['Hospital_Physical'] = $request->post('txt_Hospital_Physical');
		$data['Hospital_Physical_Tel'] = $request->post('txt_Hospital_Physical_Tel');
		$data['Hospital_Tooth'] = $request->post('txt_Hospital_Tooth');
		$data['Hospital_Tooth_Tel'] = $request->post('txt_Hospital_Tooth_Tel');
		$data['Hospital_Eye'] = $request->post('txt_Hospital_Eye');
		$data['Hospital_Eye_Tel'] = $request->post('txt_Hospital_Eye_Tel');
		$data['Hospital_EarNose'] = $request->post('txt_Hospital_EarNose');
		$data['Hospital_EarNose_Tel'] = $request->post('txt_Hospital_EarNose_Tel');
		$data['Hospital_Skin'] = $request->post('txt_Hospital_Skin');
		$data['Hospital_Skin_Tel'] = $request->post('txt_Hospital_Skin_Tel');
		$data['Hospital_Child'] = $request->post('txt_Hospital_Child');
		$data['Hospital_Child_Tel'] = $request->post('txt_Hospital_Child_Tel');
		$data['Insurance_Record'] = $request->post('txt_Insurance_Record');
		$data['Insurance_Number'] = $request->post('txt_Insurance_Number');
		$insurance_Assistance=$request->post('txt_Insurance_Assistance');
		$data['Insurance_Assistance'] = empty($insurance_Assistance)?NULL:implode(';', $insurance_Assistance);
		$data['Nearby1_Class'] = $request->post('select_Nearby1_Class');
		$data['Nearby1_ChildName'] = $request->post('txt_Nearby1_ChildName');
		$data['Nearby2_Class'] = $request->post('select_Nearby2_Class');
		$data['Nearby2_ChildName'] = $request->post('txt_Nearby2_ChildName');

		$object = Validation::factory($data);

		$object = $object->rule('Child_Id', 'Model_child::unique_childid_exists',array(':value',$request->post('txt_ID')));
	
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_1_base_fields');		
			foreach ($data as $key => $val){
				if($key=='Child_Id') continue;
				if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		return $object;
	}
	
	
	public function Validation_step1_file()
	{
		$object = Validation::factory($_FILES);
		//验证图片格式
		return $object->rule('childPicture','Upload::type',array(':value',array('jpg','jpeg','png','gif')))->rule('childPicture','Upload::size',array(':value','6M'));
	}
	
	/**
	 * step1数据录入
	 * @param unknown $request
	 * Child_EatDate 特殊处理  新规时如果是给食默认为入园日
	 * 
	 */
	public function step1_Data1(& $request)
	{
		$data = self::Validation_step1($request);
		$images = self::Validation_step1_file($request);
		
		if($data->check()&&$images->check()){
			$table = Cache::instance()->get('table_child_1_base');
			$ID = $request->post('txt_ID');
			$base_media_dir =  Kohana::$config->load('global.base_url')."/media/uploadfile/";
			
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;
			//如果存在ID就更新 否则就是新规
			$values = $data->as_array();
			if(!empty($ID)){
				$total_rows = parent::update($table, $values,'ID',$ID);
				if($total_rows === false ){$result = false;}
			}else{
				//新规的时候 如果用户为家长 则新增的孩子和 原来的孩子必定为兄弟
				if($this->customerType!='Admin'){
					$user_ID = Session::instance()->get('Guardian_ID');
					if($values['Child_Id']!=$user_ID){
						$tmp = $this->step1_selectByChildId($user_ID);
						if(empty($tmp['group'])){
							$maxGroup = DB::select(DB::expr("MAX(`group`) AS `group`"))->from($table)->execute()->get("group");
							$values['group'] = $maxGroup + 1;
							$total_rows = parent::update($table, array('group'=>$values['group']), 'ID', $tmp['ID']);
							if($total_rows === false ){$result = false;}							
						}else{
							$values['group'] = $tmp['group'];
						}
						unset($tmp);												
					}
				}
				
				$rst = parent::insert($table, $values);
				if($rst === false ){
					$result = false;
				}else{
					list($insert_id, $total_rows) = $rst;					
					$ID = $insert_id;
					
					//如果是家长用户 则将ID放入可编辑组中
					if($this->customerType!='Admin'){
						$canEditId = Session::instance()->get('canEditId');
						Session::instance()->set('canEditId',$canEditId."#{$ID}");
					}
					
					if(array_key_exists('fileRand',$_GET)){
						$dir = $base_media_dir."insuranceFileImages/{$_GET['fileRand']}/";
						if(is_dir($dir)){
							rename($dir, $base_media_dir."insuranceFileImages/{$ID}/");
						}
					}
				}
			}
			
			if($request->post('halfwaySave')=='False'){
				$Child_EatDate = $values['Child_Eat']==1?$values['EnterDate']:$values['Child_EatDate'];	
				$Child_NursingDate = $values['Child_Nursing']==1?$values['EnterDate']:$values['Child_EatDate'];
				
				$total_rows = parent::update($table, array('Child_EatDate'=>$Child_EatDate,'Child_NursingDate'=>$Child_NursingDate,'setbacksNum'=>2),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			
			$imagesArr = $images->as_array();
			if($imagesArr['childPicture']['error']==0){
				//生成一张160px的像素的图片
				$image = Image::factory($_FILES['childPicture']['tmp_name']);
				$image	->resize(302, 256, Image::AUTO)->save($base_media_dir."childPictures/{$ID}.jpg");
			}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				if($request->post('halfwaySave')=='False'){
					//step1信息更新成功后，在editChange中保存‘新规登录’
					$table_edit_change=Cache::instance()->get('table_edit_change');
					$change=array(
							'Edit_Date' => date('Y-m-d H:m'),
							'Edit_UserID' =>Session::instance()->get('USERID'),
							'Edit_Content' => '新规登録',
							'Edit_Html'=>self::getBody('http://'.$_SERVER['HTTP_HOST'].URL::site('child/step13?fromStep1=true&ID='.$ID)),
							'Child_1_Base_ID'=>$ID
					);
					$rst_insert = parent::insert($table_edit_change, $change);
				}
				
				return $ID;				
			}
		}else{
			$data_errors =  $data->errors('post');
			$images_errors =  $images->errors('file');
			$errors = array_merge($data_errors,$images_errors);
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step1').URL::query())->execute();
			return FALSE;
		}
			
	}
	
	/**
	 * 锁住当前的child_id  
	 * 不让其他用户使用
	 * @param unknown $Child_ID
	 * @param unknown $user_ID
	 */
	public function lockChildID($Child_ID,$user_ID)
	{
		Cache::instance()->set($Child_ID, $user_ID,600);
	}
	
	/**
	 * 判断当child_id 是否被别的用户锁住
	 * @param unknown $Child_ID
	 * @param unknown $user_ID
	 * @return boolean
	 */
	public function isUnLockChildID($Child_ID,$user_ID)
	{	
		$lockUserID = Cache::instance()->get($Child_ID);
		if(empty($lockUserID)) return TRUE;
		return $lockUserID==$user_ID?TRUE:FALSE;		
	}
	
	/**
	 * 删除特定的锁住的child_id
	 * 目前不需要使用
	 * @param unknown $Child_ID
	 */
	public function unLockChildID($Child_ID)
	{
		Cache::instance()->delete($Child_ID);	
	}
	
	/**
	 * 获取新的Child
	 * child/step1  administration/userGuardianList
	 * @param unknown $Y
	 * @return string|number
	 */
	public function getNewChildId($Y)
	{		
		try {			
			if($this->customerType=='Admin'){
				$user_ID = Session::instance()->get('USERID');
			}else{
				$user_ID = Session::instance()->get('Guardian_ID');
			}
			
			$table = Cache::instance()->get('table_child_1_base');
			$Child_Id_Arr =  DB::select('Child_Id')->from($table)->where('Child_Id','Like',$Y.'%')->order_by('Child_Id','ASC')->execute()->as_array();			
			//如果这个月的ID还不存在
			if(empty($Child_Id_Arr)){
				for($i=$Y.'0001';$i<=$Y.'9999';$i++){
					if($this->isUnLockChildID($i,$user_ID)){
						$this->lockChildID($i,$user_ID);
						return $i;
					}
				}
			}
			
			//一共查询到多少个结果
			$Child_Id_Arr_Num = count($Child_Id_Arr);			
			$maxChildId = end($Child_Id_Arr);
			$num = substr($maxChildId['Child_Id'],-4);
			
			$model_userGuardian = Model::factory('userGuardian');
			if($Child_Id_Arr_Num==$num){
				for($i=$maxChildId['Child_Id']+1 ; $i<=$Y.'9999' ; $i++){
					if(!$model_userGuardian->hasGuardianID($i)){
						if($this->isUnLockChildID($i,$user_ID)){
							$this->lockChildID($i,$user_ID);
							return $i;
						}
					}
				}
			}else{				
				for($i=0; $i<$Child_Id_Arr_Num-1; $i++){
					if($Child_Id_Arr[$i+1]['Child_Id']-$Child_Id_Arr[$i]['Child_Id']>1){
						for($j=$Child_Id_Arr[$i]['Child_Id']+1; $j<$Child_Id_Arr[$i+1]['Child_Id']; $j++){
							if(!$model_userGuardian->hasGuardianID($j)){
								if($this->isUnLockChildID($j,$user_ID)){
									$this->lockChildID($j,$user_ID);
									return $j;
								}
							}
						}
					}
				}
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}	
	}
	
		
	/**
	 * 验证Child_Id 不能重复
	 * @param unknown $Child_Id
	 * @param string $ID
	 * @return boolean
	 */
	public static function unique_childid_exists($Child_Id,$ID='')
	{
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$sql = DB::select(DB::expr('COUNT(*) AS total_count'))
							->from($table)
							->where('Child_Id', '=', $Child_Id);
			if(!empty($ID)){
				$sql = $sql->and_where('ID','!=',$ID);
			}
			return !(bool) $sql->execute()->get('total_count');
			
		} catch (Exception $e) {
		
		}
	}
	
	/**
	 * 获取当前做到第几步了
	 * step1 or step2 or ...
	 */
	public function getSetbacksNum($ID)
	{
		try {
			$table = Cache::instance()->get('table_child_1_base');
			return DB::select('setbacksNum')
						->from($table)
						->where('ID', '=', $ID)
						->limit(1)
						->execute()					
						->get('setbacksNum');
				
		} catch (Exception $e) {
		
		}
	}
	
	
	/**
	 * step1数据查询
	 */
	public function step1_selectByKey($ID)
	{
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$result = parent::selectByKey($table, 'ID', $ID);
			return empty($result)?$result:$result[0];
		} catch (Exception $e) {
			
		}		
	}
	
	/**
	 * step1数据查询
	 */
	public function step1_selectByChildId($Child_Id)
	{
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$result = parent::selectByKey($table, 'Child_Id', $Child_Id);
			return empty($result)?$result:$result[0];
		} catch (Exception $e) {
				
		}
	}
	
	/**
	 * 获取最新的認定区分
	 * @param unknown $ID
	 */
	public function getChildRecog($ID)
	{
		try {
			$table = Cache::instance()->get('table_child_recog');
			return DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->order_by('Recog_ID','DESC')->limit(1)->execute()->current();			
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * 获取最新的認定区分
	 * @param unknown $ID
	 */
	public function getChildRecogList($ID)
	{
		try {
			$table = Cache::instance()->get('table_child_recog');
			return DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->order_by('Recog_ID','DESC')->execute()->as_array();
		} catch (Exception $e) {
			return false;
		}
	}
	
	
	/**
	 * 获取一个包含的所有认定分区
	 * @param unknown $ID
	 * @param unknown $yearMon
	 * @param unknown $recogInfo
	 * 
	 * 问题：认定区分按时间排序  还是 按后面登录的覆盖前面登录的。
	 * 		认定区分细分类没有分  导致出错
	 */
	public function getMonRecogList($yearMon,$ID){
		
		$table = Cache::instance()->get('table_child_recog');
		$recogInfo = DB::select()->from($table)->where('Child_1_Base_ID','=',$ID)->and_where('Recog_Project','<>','')->order_by('Recog_Date','DESC')->execute()->as_array();
		//获取这个月天数
		$yearMonDay_Begin = $yearMon.'-01';
		$dayNum = date('t',strtotime($yearMonDay_Begin));
		$yearMonDay_End = $yearMon."-{$dayNum}";
		$count=count($recogInfo);	
	
		$rst=array();
		if($count!=0){
			for ($i=0;$i<$count;$i++){
				if($recogInfo[$i]['Recog_Date']<=$yearMonDay_End&&$recogInfo[$i]['Recog_Date']>$yearMonDay_Begin){
					if($i==0){
						$days=substr($yearMonDay_End, 8,2)-substr($recogInfo[$i]['Recog_Date'], 8,2)+1;
						$rst[]=array('Recog_Date'=>$recogInfo[$i]['Recog_Date'],'Recog_Type'=>$recogInfo[$i]['Recog_Type'],
								'Recog_Project'=>$recogInfo[$i]['Recog_Project'],'Percent'=>round($days/$dayNum,2));
					}else{
						$days=substr($recogInfo[$i-1]['Recog_Date'], 8,2)-substr($recogInfo[$i]['Recog_Date'], 8,2);
						$rst[]=array('Recog_Date'=>$recogInfo[$i]['Recog_Date'],'Recog_Type'=>$recogInfo[$i]['Recog_Type'],
								'Recog_Project'=>$recogInfo[$i]['Recog_Project'],'Percent'=>round($days/$dayNum,2));
					}
				}
				if($recogInfo[$i]['Recog_Date']<=$yearMonDay_Begin){
					if($i==0){
						$rst[]=array('Recog_Date'=>$yearMonDay_Begin,'Recog_Type'=>$recogInfo[$i]['Recog_Type'],
								'Recog_Project'=>$recogInfo[$i]['Recog_Project'],'Percent'=>1);
						break;
					}else {
						$days=substr($recogInfo[$i-1]['Recog_Date'], 8,2)-substr($yearMonDay_Begin, 8,2);
						$rst[]=array('Recog_Date'=>$yearMonDay_Begin,'Recog_Type'=>$recogInfo[$i]['Recog_Type'],
								'Recog_Project'=>$recogInfo[$i]['Recog_Project'],'Percent'=>round($days/$dayNum,2));
						break;
					}
				}
			}
		}
		return $rst;
	}
	
	
	
	/**
	 * 認定区分
	 * @param unknown $request
	 */
	public function Validation_Recog_Type($request,$ID)
	{
		$data['Recog_Type'] = $request->post('select_Recog_Type');
		$Recog_Date_Y = $request->post('txt_recog_date_Y');
		$Recog_Date_m = $request->post('select_recog_date_M');
		$Recog_Date_d = $request->post('select_recog_date_D');
		$data['Recog_Date'] = (empty($Recog_Date_Y)?'0000':$Recog_Date_Y).'-'.(empty($Recog_Date_m)?'00':$Recog_Date_m).'-'.(empty($Recog_Date_d)?'00':$Recog_Date_d);
		$data['Child_1_Base_ID'] = $ID;
	
		$object = Validation::factory($data);
		
		return $object;
	}
	
	
	/**
	 *验证step2
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step2($request)
	{
		$data['Guardian1_FamilyName'] = $request->post('txt_Guardian1_FamilyName');
		$data['Guardian1_GivenName'] = $request->post('txt_Guardian1_GivenName');
		$data['Guardian1_FamilyName_Spell'] = $request->post('txt_Guardian1_FamilyName_Spell');
		$data['Guardian1_GivenName_Spell'] = $request->post('txt_Guardian1_GivenName_Spell');
		$guardian1_Birthday_Y = $request->post('txt_Guardian1_Birthday_Y');
		$guardian1_Birthday_M = $request->post('select_Guardian1_Birthday_M');
		$guardian1_Birthday_D = $request->post('select_Guardian1_Birthday_D');
		$data['Guardian1_Birthday'] =(empty($guardian1_Birthday_Y)?'0000':$guardian1_Birthday_Y).'-'.(empty($guardian1_Birthday_M)?'00':$guardian1_Birthday_M).'-'.(empty($guardian1_Birthday_D)?'00':$guardian1_Birthday_D);
		$data['Guardian1_Sex'] = $request->post('radio_Guardian1_Sex');
		$data['Guardian1_Relation'] = $request->post('select_Guardian1_Relation');
		$data['Guardian1_WorkPlace'] = $request->post('txt_Guardian1_WorkPlace');
		$data['Guardian1_WorkAddress'] = $request->post('txt_Guardian1_WorkAddress');
		$data['Guardian1_WorkTel'] = $request->post('txt_Guardian1_WorkTel');
		$data['Guardian1_Mobile'] = $request->post('txt_Guardian1_Mobile');
		$data['Guardian1_WorkTime_Begin'] = $request->post('select_Guardian1_WorkTime_Begin');
		$data['Guardian1_WorkTime_End'] = $request->post('select_Guardian1_WorkTime_End');
		$data['Guardian1_WorkTime_Begin_Rest'] = $request->post('select_Guardian1_WorkTime_Begin_Rest');
		$data['Guardian1_WorkTime_End_Rest'] = $request->post('select_Guardian1_WorkTime_End_Rest');
		$data['Guardian1_RestDay'] = $request->post('select_Guardian1_RestDay');
		$data['Guardian1_RestOther'] = $request->post('txt_Guardian1_RestOther');
		$data['Guardian2_FamilyName'] = $request->post('txt_Guardian2_FamilyName');
		$data['Guardian2_GivenName'] = $request->post('txt_Guardian2_GivenName');
		$data['Guardian2_GivenName_Spell'] = $request->post('txt_Guardian2_GivenName_Spell');
		$data['Guardian2_FamilyName_Spell'] = $request->post('txt_Guardian2_FamilyName_Spell');
		$guardian2_Birthday_Y = $request->post('txt_Guardian2_Birthday_Y');
		$guardian2_Birthday_M = $request->post('select_Guardian2_Birthday_M');
		$guardian2_Birthday_D = $request->post('select_Guardian2_Birthday_D');
		$data['Guardian2_Birthday'] =(empty($guardian2_Birthday_Y)?'0000':$guardian2_Birthday_Y).'-'.(empty($guardian2_Birthday_M)?'00':$guardian2_Birthday_M).'-'.(empty($guardian2_Birthday_D)?'00':$guardian2_Birthday_D);
		$data['Guardian2_Sex'] = $request->post('radio_Guardian2_Sex');
		$data['Guardian2_Relation'] = $request->post('select_Guardian2_Relation');
		$data['Guardian2_WorkPlace'] = $request->post('txt_Guardian2_WorkPlace');
		$data['Guardian2_WorkAddress'] = $request->post('txt_Guardian2_WorkAddress');
		$data['Guardian2_WorkTel'] = $request->post('txt_Guardian2_WorkTel');
		$data['Guardian2_Mobile'] = $request->post('txt_Guardian2_Mobile');
		$data['Guardian2_WorkTime_Begin'] = $request->post('select_Guardian2_WorkTime_Begin');
		$data['Guardian2_WorkTime_End'] = $request->post('select_Guardian2_WorkTime_End');
		$data['Guardian2_WorkTime_Begin_Rest'] = $request->post('select_Guardian2_WorkTime_Begin_Rest');
		$data['Guardian2_WorkTime_End_Rest'] = $request->post('select_Guardian2_WorkTime_End_Rest');
		$data['Guardian2_RestDay'] = $request->post('select_Guardian2_RestDay');
		$data['Guardian2_RestOther'] = $request->post('txt_Guardian2_RestOther');
		$data['Assist_FamilyName'] = $request->post('txt_Assist_FamilyName');
		$data['Assist_GivenName'] = $request->post('txt_Assist_GivenName');
		$data['Assist_FamilyName_Spell'] = $request->post('txt_Assist_FamilyName_Spell');
		$data['Assist_GivenName_Spell'] = $request->post('txt_Assist_GivenName_Spell');
		$data['Assist_Address'] = $request->post('txt_Assist_Address');
		$data['Assist_Tel'] = $request->post('txt_Assist_Tel');
		$data['Assist_Sex'] = $request->post('radio_Assist_Sex');
		$data['Assist_Relation'] = $request->post('select_Assist_Relation');		
		$data['Child_1_Base_ID'] = $request->post('txt_ID');

		$object = Validation::factory($data);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_2_family_fields');
			foreach ($data as $key => $val){
				if($key=='Child_1_Base_ID') continue;
				if($tableFileds[$key]['not_empty'])	$object = $object->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		return $object;
	}
	
	public function step2_familyStatus($request)
	{
		$FamilyName = $request->post('txt_Member_FamilyName');
		$GivenName = $request->post('txt_Member_GivenName');
		$FamilyName_Spell = $request->post('txt_Member_FamilyName_Spell');
		$GivenName_Spell = $request->post('txt_Member_GivenName_Spell');
		$Birthday_Y=$request->post('txt_Member_Birthday_Y');
		$Birthday_M=$request->post('select_Member_Birthday_M');
		$Birthday_D =$request->post('select_Member_Birthday_D');		
		$Sex = $request->post('radio_Member_Sex');
		$Relation = $request->post('select_Member_Relation');
		$WorkPlace = $request->post('txt_Member_WorkPlace');
			
		$data = array();
		$sort = 1;
		foreach ($FamilyName as $key => $val){			
			if($val.$GivenName[$key].$FamilyName_Spell[$key].$GivenName_Spell[$key].$Relation[$key].$WorkPlace[$key]!=''){
				$Birthday = (empty($Birthday_Y[$key])?'0000':$Birthday_Y[$key]).'-'.(empty($Birthday_M[$key])?'00':$Birthday_M[$key]).'-'.(empty($Birthday_D[$key])?'00':$Birthday_D[$key]);
				$data[] = array(
						'Member_FamilyName'			=>	$val,
						'Member_GivenName'			=>	$GivenName[$key],
						'Member_FamilyName_Spell'	=>	$FamilyName_Spell[$key],
						'Member_GivenName_Spell'	=>	$GivenName_Spell[$key],						
						'Member_Birthday'			=>	$Birthday,
						'Member_Sex'				=>	$Sex[$key],
						'Member_Relation'			=>	$Relation[$key],
						'Member_WorkPlace'			=>	$WorkPlace[$key],
						'sort'						=>	$sort,
						'Child_1_Base_ID'			=>	$request->post('txt_ID')
				);
				$sort++;
			}
		}
		return $data;
		
	}
	
	
	
	
	/**
	 * step2数据录入
	 * @param unknown $request
	 */
	public function step2_Data(& $request){

		$data = self::Validation_step2($request);
		if($data->check()){
			$table = Cache::instance()->get('table_child_2_family');
			$ID = $request->post('txt_ID');
			$child_info = self::step2_selectByKey($ID);
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;			
					
			//如果存在ID就更新 否则就是新规
			if(!empty($child_info)){
				$total_rows = parent::update($table, $data->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
			}else{					
				$rst = parent::insert($table, $data->as_array());
				if($rst === false ){
					$result = false;
				}					
			}
			
			//家族の状況的数据
			$familyStatusData = $this->step2_familyStatus($request);
			$rst = $this->familyStatusDelete($ID);
			if($rst === false ){
				$result = false;
			}
			if(!empty($familyStatusData)){
				$rst = $this->familyStatusInsert($familyStatusData);
				if($rst === false ){
					$result = false;
				}
			}
			
			if($request->post('halfwaySave')=='False'){
				$total_rows = parent::update(Cache::instance()->get('table_child_1_base'), array('setbacksNum'=>3),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}
		}else {
			$data_errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('child/step2').URL::query())->execute();
			return FALSE;
		}
		
	}
	/**
	 * step2数据查询
	 */
	public function step2_selectByKey($ID,$request='')
	{
		try {
			$table = Cache::instance()->get('table_child_2_family');
			$result= parent::selectByKey($table, 'Child_1_Base_ID', $ID);		
			
			if(empty($result)){
				if($request!=''){
					$Validation_step2 = $this->Validation_step2($request);
					$result = $Validation_step2->as_array();			
				}
			}else{
				$result = $result[0];
			}
			return $result;
		} catch (Exception $e) {
			
			
		}		
	}
	
	/**
	 * 家族の状況 删除
	 */
	public function familyStatusDelete($Child_1_Base_ID)
	{
		try {
			$table = Cache::instance()->get('table_child_2_family_status');
			return $this->delete($table, 'Child_1_Base_ID', $Child_1_Base_ID);
		} catch (Exception $e) {			
			return FALSE;
		}
	}
	
	/**
	 * 家族の状況 新增
	 */
	public function familyStatusInsert($valuesArr)
	{
		try {
			$table = Cache::instance()->get('table_child_2_family_status');
			
			$sql = DB::insert($table,array_keys($valuesArr[0]));
			foreach ($valuesArr as $key=>$val){
				$sql = $sql->values(array_values($val));
			}
			return $sql->execute();
						
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	/**
	 * 家族の状況 list
	 */
	public function familyStatusList($Child_1_Base_ID)
	{
		try {
			$table = Cache::instance()->get('table_child_2_family_status');
			return DB::select()->from($table)->where('Child_1_Base_ID','=',$Child_1_Base_ID)->order_by('sort','ASC')->execute()->as_array();			
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
	
	/**
	 *验证step3
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step3($request)
	{
		//表 table child_3_status
		$data_Status['Birth_Period'] = $request->post('select_Birth_Period');
		$data_Status['Birth_Weight'] = $request->post('txt_Birth_Weight');
		$data_Status['Birth_Status'] = $request->post('select_Birth_Status');
		$data_Status['Birth_Remark'] = $request->post('txt_Birth_Remark');
		$data_Status['Suckle_Status'] = $request->post('select_Suckle_Status');
		$data_Status['Suckle_Way'] = $request->post('select_Suckle_Way');
		$data_Status['Suckle_StopAgeY'] = $request->post('select_Suckle_StopAgeY')==''?NULL:$request->post('select_Suckle_StopAgeY');
		$data_Status['Suckle_StopAgeM'] = $request->post('select_Suckle_StopAgeM')==''?NULL:$request->post('select_Suckle_StopAgeM');
		$data_Status['Walk_Status'] = $request->post('select_Walk_Status');
		$data_Status['Walk_BeginAgeY'] = $request->post('select_Walk_BeginAgeY')==''?NULL:$request->post('select_Walk_BeginAgeY');
		$data_Status['Walk_BeginAgeM'] = $request->post('select_Walk_BeginAgeM')==''?NULL:$request->post('select_Walk_BeginAgeM');
		$data_Status['Language_Status'] = $request->post('select_Language_Status');
		$data_Status['Language_Remark'] = $request->post('txt_Language_Remark');
		$data_Status['Language_BeginAgeY'] = $request->post('select_Language_BeginAgeY')==''?NULL:$request->post('select_Language_BeginAgeY');
		$data_Status['Language_BeginAgeM'] = $request->post('select_Language_BeginAgeM')==''?NULL:$request->post('select_Language_BeginAgeM');
		$data_Status['RaiseMen_Relation'] = $request->post('select_RaiseMen_Relation');
		$data_Status['Child_1_Base_ID'] = $request->post('txt_ID');
		
		//table child_3_vaccine
		$mix_Date1_Y=$request->post('txt_4Mix_Date1_Y');
		$mix_Date1_M=$request->post('select_4Mix_Date1_M');
		$data_Vaccine['4Mix_Date1'] =(empty($mix_Date1_Y)?'0000':$mix_Date1_Y).'-'.(empty($mix_Date1_M)?'00':$mix_Date1_M);
		
		$mix_Date2_Y=$request->post('txt_4Mix_Date2_Y');
		$mix_Date2_M=$request->post('select_4Mix_Date2_M');
		$data_Vaccine['4Mix_Date2'] =(empty($mix_Date2_Y)?'0000':$mix_Date2_Y).'-'.(empty($mix_Date2_M)?'00':$mix_Date2_M);
		
		$mix_Date3_Y=$request->post('txt_4Mix_Date3_Y');
		$mix_Date3_M=$request->post('select_4Mix_Date3_M');
		$data_Vaccine['4Mix_Date3'] =(empty($mix_Date3_Y)?'0000':$mix_Date3_Y).'-'.(empty($mix_Date3_M)?'00':$mix_Date3_M);

		$mix_DateAdd_Y=$request->post('txt_4Mix_DateAdd_Y');
		$mix_DateAdd_M=$request->post('select_4Mix_DateAdd_M');
		$data_Vaccine['4Mix_DateAdd'] =(empty($mix_DateAdd_Y)?'0000':$mix_DateAdd_Y).'-'.(empty($mix_DateAdd_M)?'00':$mix_DateAdd_M);

		$fluB_Date1_Y=$request->post('txt_FluB_Date1_Y');
		$fluB_Date1_M=$request->post('select_FluB_Date1_M');
		$data_Vaccine['FluB_Date1'] =(empty($fluB_Date1_Y)?'0000':$fluB_Date1_Y).'-'.(empty($fluB_Date1_M)?'00':$fluB_Date1_M);

		$fluB_Date2_Y=$request->post('txt_FluB_Date2_Y');
		$fluB_Date2_M=$request->post('select_FluB_Date2_M');
		$data_Vaccine['FluB_Date2'] =(empty($fluB_Date2_Y)?'0000':$fluB_Date2_Y).'-'.(empty($fluB_Date2_M)?'00':$fluB_Date2_M);

		$fluB_Date3_Y=$request->post('txt_FluB_Date3_Y');
		$fluB_Date3_M=$request->post('select_FluB_Date3_M');
		$data_Vaccine['FluB_Date3'] =(empty($fluB_Date3_Y)?'0000':$fluB_Date3_Y).'-'.(empty($fluB_Date3_M)?'00':$fluB_Date3_M);

		$fluB_DateAdd_Y=$request->post('txt_FluB_DateAdd_Y');
		$fluB_DateAdd_M=$request->post('select_FluB_DateAdd_M');
		$data_Vaccine['FluB_DateAdd'] =(empty($fluB_DateAdd_Y)?'0000':$fluB_DateAdd_Y).'-'.(empty($fluB_DateAdd_M)?'00':$fluB_DateAdd_M);

		$pneumonia_Date1_Y=$request->post('txt_Pneumonia_Date1_Y');
		$pneumonia_Date1_M=$request->post('select_Pneumonia_Date1_M');
		$data_Vaccine['Pneumonia_Date1'] =(empty($pneumonia_Date1_Y)?'0000':$pneumonia_Date1_Y).'-'.(empty($pneumonia_Date1_M)?'00':$pneumonia_Date1_M);
		
		$pneumonia_Date2_Y=$request->post('txt_Pneumonia_Date2_Y');
		$pneumonia_Date2_M=$request->post('select_Pneumonia_Date2_M');
		$data_Vaccine['Pneumonia_Date2'] =(empty($pneumonia_Date2_Y)?'0000':$pneumonia_Date2_Y).'-'.(empty($pneumonia_Date2_M)?'00':$pneumonia_Date2_M);

		$pneumonia_Date3_Y=$request->post('txt_Pneumonia_Date3_Y');
		$pneumonia_Date3_M=$request->post('select_Pneumonia_Date3_M');
		$data_Vaccine['Pneumonia_Date3'] =(empty($pneumonia_Date3_Y)?'0000':$pneumonia_Date3_Y).'-'.(empty($pneumonia_Date3_M)?'00':$pneumonia_Date3_M);

		$pneumonia_DateAdd_Y=$request->post('txt_Pneumonia_DateAdd_Y');
		$pneumonia_DateAdd_M=$request->post('select_Pneumonia_DateAdd_M');
		$data_Vaccine['Pneumonia_DateAdd'] =(empty($pneumonia_DateAdd_Y)?'0000':$pneumonia_DateAdd_Y).'-'.(empty($pneumonia_DateAdd_M)?'00':$pneumonia_DateAdd_M);

		$encephalitis_Date1_Y= $request->post('txt_Encephalitis_Date1_Y');
		$encephalitis_Date1_M=$request->post('select_Encephalitis_Date1_M');
		$data_Vaccine['Encephalitis_Date1'] = (empty($encephalitis_Date1_Y)?'0000':$encephalitis_Date1_Y).'-'.(empty($encephalitis_Date1_M)?'00':$encephalitis_Date1_M);
		
		$encephalitis_Date2_Y= $request->post('txt_Encephalitis_Date2_Y');
		$encephalitis_Date2_M=$request->post('select_Encephalitis_Date2_M');
		$data_Vaccine['Encephalitis_Date2'] = (empty($encephalitis_Date2_Y)?'0000':$encephalitis_Date2_Y).'-'.(empty($encephalitis_Date2_M)?'00':$encephalitis_Date2_M);

		$encephalitis_DateAdd_Y= $request->post('txt_Encephalitis_DateAdd_Y');
		$encephalitis_DateAdd_M=$request->post('select_Encephalitis_DateAdd_M');
		$data_Vaccine['Encephalitis_DateAdd'] = (empty($encephalitis_DateAdd_Y)?'0000':$encephalitis_DateAdd_Y).'-'.(empty($encephalitis_DateAdd_M)?'00':$encephalitis_DateAdd_M);

		$polio_Date1_Y = $request->post('txt_Polio_Date1_Y');
		$polio_Date1_M = $request->post('select_Polio_Date1_M');
		$data_Vaccine['Polio_Date1'] =(empty($polio_Date1_Y)?'0000':$polio_Date1_Y).'-'.(empty($polio_Date1_M)?'00':$polio_Date1_M);
		
		$polio_Date2_Y = $request->post('txt_Polio_Date2_Y');
		$polio_Date2_M = $request->post('select_Polio_Date2_M');
		$data_Vaccine['Polio_Date2'] =(empty($polio_Date2_Y)?'0000':$polio_Date2_Y).'-'.(empty($polio_Date2_M)?'00':$polio_Date2_M);
		
		$polio_Date3_Y = $request->post('txt_Polio_Date3_Y');
		$polio_Date3_M = $request->post('select_Polio_Date3_M');
		$data_Vaccine['Polio_Date3'] =(empty($polio_Date3_Y)?'0000':$polio_Date3_Y).'-'.(empty($polio_Date3_M)?'00':$polio_Date3_M);

		$polio_Date4_Y = $request->post('txt_Polio_Date4_Y');
		$polio_Date4_M = $request->post('select_Polio_Date4_M');
		$data_Vaccine['Polio_Date4'] =(empty($polio_Date4_Y)?'0000':$polio_Date4_Y).'-'.(empty($polio_Date4_M)?'00':$polio_Date4_M);
		
		$BCG_Date_Y= $request->post('txt_BCG_Date_Y');
		$BCG_Date_M=$request->post('select_BCG_Date_M');
		$data_Vaccine['BCG_Date'] =(empty($BCG_Date_Y)?'0000':$BCG_Date_Y).'-'.(empty($BCG_Date_M)?'00':$BCG_Date_M);
		
		$measles_Date1_Y =$request->post('txt_Measles_Date1_Y');
		$measles_Date1_M = $request->post('select_Measles_Date1_M');
		$data_Vaccine['Measles_Date1'] = (empty($measles_Date1_Y)?'0000':$measles_Date1_Y).'-'.(empty($measles_Date1_M)?'00':$measles_Date1_M);
		
		$measles_Date2_Y =$request->post('txt_Measles_Date2_Y');
		$measles_Date2_M = $request->post('select_Measles_Date2_M');
		$data_Vaccine['Measles_Date2'] = (empty($measles_Date2_Y)?'0000':$measles_Date2_Y).'-'.(empty($measles_Date2_M)?'00':$measles_Date2_M);

		$mumps_Date_Y = $request->post('txt_Mumps_Date_Y');
		$mumps_Date_M =$request->post('select_Mumps_Date_M');
		$data_Vaccine['Mumps_Date'] =(empty($mumps_Date_Y)?'0000':$mumps_Date_Y).'-'.(empty($mumps_Date_M)?'00':$mumps_Date_M);
		
		$chickenpox_Date_Y= $request->post('txt_Chickenpox_Date_Y');
		$chickenpox_Date_M =$request->post('select_Chickenpox_Date_M');
		$data_Vaccine['Chickenpox_Date'] =(empty($chickenpox_Date_Y)?'0000':$chickenpox_Date_Y).'-'.(empty($chickenpox_Date_M)?'00':$chickenpox_Date_M);
		
		$data_Vaccine['Vaccine_Remark'] = $request->post('txt_Vaccine_Remark');
		$data_Vaccine['Child_1_Base_ID'] = $request->post('txt_ID');
		
		$object_Status = Validation::factory($data_Status);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_3_status_fields');
			foreach ($data_Status as $key => $val){
				if($key=='Child_1_Base_Child_Id') continue;
				if($tableFileds[$key]['not_empty']) $object_Status = $object_Status->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_Status = $object_Status->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		$object_Vaccine = Validation::factory($data_Vaccine);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_3_vaccine_fields');
			foreach ($data_Vaccine as $key => $val){
				if($key=='Child_1_Base_Child_Id') continue;
				if($tableFileds[$key]['not_empty']) $object_Vaccine = $object_Vaccine->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_Vaccine = $object_Vaccine->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		
		return array($object_Status,$object_Vaccine);
	}
	
	/**
	 * step3数据录入
	 * @param unknown $request
	 */
	public function step3_Data(& $request){

		$data = self::Validation_step3($request);
		if($data[0]->check()&&$data[1]->check()){
			$ID = $request->post('txt_ID');
			$child_info = self::step3_selectByKey($ID);
				
			$table_Status = Cache::instance()->get('table_child_3_status');
			$table_Vaccine = Cache::instance()->get('table_child_3_vaccine');
				
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;
			if(!empty($child_info)){
				$total_rows = parent::update($table_Status, $data[0]->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
				$total_rows = parent::update($table_Vaccine, $data[1]->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
			}else{
				$rst = parent::insert($table_Status, $data[0]->as_array());
				if($rst === false ){$result = false;}
				$rst = parent::insert($table_Vaccine, $data[1]->as_array());
				if($rst === false ){$result = false;}
			}

			if($request->post('halfwaySave')=='False'){
				$total_rows = parent::update(Cache::instance()->get('table_child_1_base'), array('setbacksNum'=>4),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}
		}else {
			$data_errors_status =  $data[0]->errors('post');
			$data_errors_vaccine =  $data[1]->errors('post');
			$errors =array_merge($data_errors_status,$data_errors_vaccine);
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step3').URL::query())->execute();
			return FALSE;
		}	
	}
	
	/**
	 * step3数据查询
	 */
	public function step3_selectByKey($ID,$request='')
	{
		$table_Status = Cache::instance()->get('table_child_3_status');
		$result_Status= parent::selectByKey($table_Status, 'Child_1_Base_ID', $ID);
		$table_Vaccine = Cache::instance()->get('table_child_3_vaccine');
		$result_Vaccine= parent::selectByKey($table_Vaccine, 'Child_1_Base_ID', $ID);
		
		if(!empty($result_Status[0])&&!empty($result_Vaccine[0])){		
			$result=array_merge($result_Status[0],$result_Vaccine[0]);			
		}else{			
			//$result = array();
			if($request!=''){
				$Validation_step3 = $this->Validation_step3($request);
				$result = array_merge($Validation_step3[0]->as_array(),$Validation_step3[1]->as_array());
				
			}else{
				$result  = array();
			}
		}
		
		return $result;
	}	
	
	
	/**
	 *验证step4
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step4($request)
	{		
		$data['His_Measles'] = $request->post('checkbox_His_Measles');
		$data['His_Measles_Age'] = $request->post('select_His_Measles_Age')==''?NULL:$request->post('select_His_Measles_Age');		
		$data['His_Chickenpox'] = $request->post('checkbox_His_Chickenpox');		
		$data['His_Chickenpox_Age'] = $request->post('select_His_Chickenpox_Age')==''?NULL:$request->post('select_His_Chickenpox_Age');		
		$data['His_Mumps'] = $request->post('checkbox_His_Mumps');
		$data['His_Mumps_Age'] = $request->post('select_His_Mumps_Age')==''?NULL:$request->post('select_His_Mumps_Age');
		$data['His_Rubella'] = $request->post('checkbox_His_Rubella');
		$data['His_Rubella_Age'] = $request->post('select_His_Rubella_Age')==''?NULL:$request->post('select_His_Rubella_Age');
		$data['His_Cough'] = $request->post('checkbox_His_Cough');		
		$data['His_Cough_Age'] =$request->post('select_His_Cough_Age')==''?NULL:$request->post('select_His_Cough_Age');
		$data['His_RedSpot'] = $request->post('checkbox_His_RedSpot');
		$data['His_RedSpot_Age'] = $request->post('select_His_RedSpot_Age')==''?NULL:$request->post('select_His_RedSpot_Age');
		$data['His_HFMD'] = $request->post('checkbox_His_HFMD');
		$data['His_HFMD_Age'] = $request->post('select_His_HFMD_Age')==''?NULL:$request->post('select_His_HFMD_Age');
		$data['His_BacteriaInfect'] = $request->post('checkbox_His_BacteriaInfect');
		$data['His_BacteriaInfect_Age'] = $request->post('select_His_BacteriaInfect_Age')==''?NULL:$request->post('select_His_BacteriaInfect_Age');
		$data['His_Otitis'] = $request->post('checkbox_His_Otitis');
		$data['His_Otitis_Age'] = $request->post('select_His_Otitis_Age')==''?NULL:$request->post('select_His_Otitis_Age');
		$data['His_Pneumonia'] = $request->post('checkbox_His_Pneumonia');
		$data['His_Pneumonia_Age'] = $request->post('select_His_Pneumonia_Age')==''?NULL:$request->post('select_His_Pneumonia_Age');
		$data['His_Asthma'] = $request->post('checkbox_His_Asthma');
		$data['His_Asthma_Age'] = $request->post('select_His_Asthma_Age')==''?NULL:$request->post('select_His_Asthma_Age');
		$data['His_Poisoned'] = $request->post('checkbox_His_Poisoned');
		$data['His_Poisoned_Age'] = $request->post('select_His_Poisoned_Age')==''?NULL:$request->post('select_His_Poisoned_Age');
		$data['His_Remark_Health'] = $request->post('txt_His_Remark_Health');
		$data['His_Remark_Injury'] = $request->post('txt_His_Remark_Injury');
		$data['Body_HaveTic'] = $request->post('checkbox_Body_HaveTic');
		$data['Body_CatchCold'] = $request->post('checkbox_Body_CatchCold');
		$data['Body_Tonsil'] = $request->post('checkbox_Body_Tonsil');
		$data['Body_Diarrhea'] = $request->post('checkbox_Body_Diarrhea');
		$data['Body_SkinWeak'] = $request->post('checkbox_Body_SkinWeak');
		$data['Body_NoseBleed'] = $request->post('checkbox_Body_NoseBleed');
		$data['Body_Fever'] = $request->post('checkbox_Body_Fever');
		$data['Body_Asthma'] = $request->post('checkbox_Body_Asthma');
		$data['Body_Disjoint'] = $request->post('checkbox_Body_Disjoint');
		$data['Body_Disjoint_Place'] = $request->post('txt_Body_Disjoint_Place');
		$data['Body_Atopy'] = $request->post('checkbox_Body_Atopy');
		$data['Body_Atopy_Skin'] = $request->post('checkbox_Body_Atopy_Skin');
		$data['Body_Atopy_Asthma'] = $request->post('checkbox_Body_Atopy_Asthma');
		$data['Body_Atopy_Remark'] = $request->post('txt_Body_Atopy_Remark');
		$data['Body_Urticaria'] = $request->post('checkbox_Body_Urticaria');
		$data['Body_Urticaria_Reason'] = $request->post('txt_Body_Urticaria_Reason');
		$data['Body_Allergy'] = $request->post('checkbox_Body_Allergy');
		$data['Body_Allergy_Reason'] = $request->post('txt_Body_Allergy_Reason');
		$data['Body_Allergy_FoodDrug'] = $request->post('txt_Body_Allergy_FoodDrug');
		$data['Body_Other'] = $request->post('checkbox_Body_Other');
		$data['Body_Other_Remark'] = $request->post('txt_Body_Other_Remark');
		$checkbox_Eye_Status = $request->post('checkbox_Eye_Status');
		$data['Eye_Status'] = is_array($checkbox_Eye_Status)?$checkbox_Eye_Status[0]:$checkbox_Eye_Status;
		$data['Eye_Status_Remark'] = $request->post('txt_Eye_Status_Remark');
		$checkbox_Ear_Status = $request->post('checkbox_Ear_Status');
		$data['Ear_Status'] = is_array($checkbox_Ear_Status)?$checkbox_Ear_Status[0]:$checkbox_Ear_Status;
		$data['Ear_Status_History'] = $request->post('txt_Ear_Status_History');
		$data['Health_Remark'] = $request->post('txt_Health_Remark');
		$data['Child_1_Base_ID'] = $request->post('txt_ID');		
		
		$object = Validation::factory($data);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_4_health_fields');
			foreach ($data as $key => $val){
				if($key=='Child_1_Base_ID') continue;
				if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		return $object;
	}
	
	/**
	 * step4数据录入
	 * @param unknown $request
	 */
	public function step4_Data(& $request){		

		$data = self::Validation_step4($request);
		if($data->check()){
			$ID = $request->post('txt_ID');
			$child_info = self::step4_selectByKey($ID);
			$table = Cache::instance()->get('table_child_4_health');
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;				
			//如果存在ID就更新 否则就是新规
			if(!empty($child_info)){
				$total_rows = parent::update($table, $data->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
			}else{
				$rst = parent::insert($table, $data->as_array());
				if($rst === false ){$result = false;}
			}
			
			if($request->post('halfwaySave')=='False'){
				$total_rows = parent::update(Cache::instance()->get('table_child_1_base'), array('setbacksNum'=>5),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}
		}else {				
			$errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step4').URL::query())->execute();
			return FALSE;
		}	
	}
	
	/**
	 * step4数据查询
	 */
	public function step4_selectByKey($ID,$request='')
	{
		try {
			$table = Cache::instance()->get('table_child_4_health');
			$result = parent::selectByKey($table, 'Child_1_Base_ID', $ID);
			
			if(empty($result)){
				if($request!=''){
					$Validation_step4 = $this->Validation_step4($request);
					$result = $Validation_step4->as_array();
				}
			}else{
				$result = $result[0];
			}
			
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
		}		
	}	
	
	/**
	 *验证step5
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step5($request)
	{
		$checkbox_Eat_Appetite = $request->post('checkbox_Eat_Appetite');
		$data_Live1['Eat_Appetite'] = is_array($checkbox_Eat_Appetite)?$checkbox_Eat_Appetite[0]:$checkbox_Eat_Appetite;
		$checkbox_Eat_Speed = $request->post('checkbox_Eat_Speed');
		$data_Live1['Eat_Speed'] =  is_array($checkbox_Eat_Speed)?$checkbox_Eat_Speed[0]:$checkbox_Eat_Speed;
		$data_Live1['Eat_Like'] = $request->post('txt_Eat_Like');
		$data_Live1['Eat_Unlike'] = $request->post('txt_Eat_Unlike');
		$checkbox_Eat_Snacks = $request->post('checkbox_Eat_Snacks');
		$data_Live1['Eat_Snacks'] = is_array($checkbox_Eat_Snacks)?$checkbox_Eat_Snacks[0]:$checkbox_Eat_Snacks;
		$data_Live1['Eat_Snacks_Time'] = $request->post('select_Eat_Snacks_Time');		
		$checkbox_Toilet_Big = $request->post('checkbox_Toilet_Big');
		$data_Live1['Toilet_Big'] = is_array($checkbox_Toilet_Big)?$checkbox_Toilet_Big[0]:$checkbox_Toilet_Big;		
		$checkbox_Toilet_Big_Leak = $request->post('checkbox_Toilet_Big_Leak');
		$data_Live1['Toilet_Big_Leak'] = is_array($checkbox_Toilet_Big_Leak)?$checkbox_Toilet_Big_Leak[0]:$checkbox_Toilet_Big_Leak;
		$checkbox_Toilet_Small = $request->post('checkbox_Toilet_Small');
		$data_Live1['Toilet_Small'] = is_array($checkbox_Toilet_Small)?$checkbox_Toilet_Small[0]:$checkbox_Toilet_Small;		
		$data_Live1['Toilet_Small_Period'] = $request->post('select_Toilet_Small_Period');		
		$checkbox_Toilet_Night = $request->post('checkbox_Toilet_Night');
		$data_Live1['Toilet_Night'] = is_array($checkbox_Toilet_Night)?$checkbox_Toilet_Night[0]:$checkbox_Toilet_Night;		
		$data_Live1['Sleep_WakeTime'] = $request->post('select_Sleep_WakeTime');		
		$data_Live1['Sleep_Wake'] = $request->post('checkbox_Sleep_Wake');		
		$data_Live1['Sleep_SleepTime'] = $request->post('select_Sleep_SleepTime');
		$data_Live1['Sleep_Sleep'] = $request->post('checkbox_Sleep_Sleep');		
		$checkbox_Sleep_Who = $request->post('checkbox_Sleep_Who');
		$data_Live1['Sleep_Who'] = is_array($checkbox_Sleep_Who)?$checkbox_Sleep_Who[0]:$checkbox_Sleep_Who;	
		$data_Live1['Sleep_Who_Other'] = $request->post('txt_Sleep_Who_Other');
		$checkbox_Sleep_Daytime = $request->post('checkbox_Sleep_Daytime');
		$data_Live1['Sleep_Daytime'] = is_array($checkbox_Sleep_Daytime)?$checkbox_Sleep_Daytime[0]:$checkbox_Sleep_Daytime;		
		$data_Live1['Sleep_Daytime_Spend'] = $request->post('select_Sleep_Daytime_Spend');
		$data_Live1['Live1_Remark'] = $request->post('txt_Live1_Remark');
		$data_Live1['Child_1_Base_ID'] = $request->post('txt_ID');
		
		$checkbox_Language = $request->post('checkbox_Language');
		$data_Live2['Language'] = is_array($checkbox_Language)?$checkbox_Language[0]:$checkbox_Language;
		$checkbox_StrongHand = $request->post('checkbox_StrongHand');
		$data_Live2['StrongHand'] = is_array($checkbox_StrongHand)?$checkbox_StrongHand[0]:$checkbox_StrongHand;
		$data_Live2['Hobby'] = $request->post('txt_Hobby');
		$checkbox_DistingMen = $request->post('checkbox_DistingMen');
		$data_Live2['DistingMen'] = is_array($checkbox_DistingMen)?$checkbox_DistingMen[0]:$checkbox_DistingMen;		
		$data_Live2['Friend1_Age'] = $request->post('select_Friend1_Age')==''?NULL:$request->post('select_Friend1_Age');
		$data_Live2['Friend1_Name'] = $request->post('txt_Friend1_Name');		
		$data_Live2['Friend2_Age'] = $request->post('select_Friend2_Age')==''?NULL:$request->post('select_Friend2_Age');
		$data_Live2['Friend2_Name'] = $request->post('txt_Friend2_Name');
		$checkbox_PlayPlace = $request->post('checkbox_PlayPlace');
		$data_Live2['PlayPlace'] = is_array($checkbox_PlayPlace)?$checkbox_PlayPlace[0]:$checkbox_PlayPlace;
		$data_Live2['PlayPlace_Remark'] = $request->post('txt_PlayPlace_Remark');
		$data_Live2['LikePlay'] = $request->post('txt_LikePlay');
		$data_Live2['TVTime'] = $request->post('select_TVTime')==''?NULL:$request->post('select_TVTime');
		$data_Live2['GameTime'] = $request->post('select_GameTime')==''?NULL:$request->post('select_GameTime');
		$checkbox_Housework = $request->post('checkbox_Housework');
		$data_Live2['Housework'] = is_array($checkbox_Housework)?$checkbox_Housework[0]:$checkbox_Housework;
		$data_Live2['Housework_Remark'] = $request->post('txt_Housework_Remark');
		$checkbox_Dress = $request->post('checkbox_Dress');
		$data_Live2['Dress'] = is_array($checkbox_Dress)?$checkbox_Dress[0]:$checkbox_Dress;
		$data_Live2['Dress_Remark'] = $request->post('txt_Dress_Remark');		
		$checkbox_Money = $request->post('checkbox_Money');
		$data_Live2['Money'] = is_array($checkbox_Money)?$checkbox_Money[0]:$checkbox_Money;
		$data_Live2['Money_Count'] = $request->post('txt_Money_Count');
		$data_Live2['Money_Use'] = $request->post('txt_Money_Use');
		$data_Live2['Feature_Good'] = $request->post('txt_Feature_Good');
		$data_Live2['Feature_Low'] = $request->post('txt_Feature_Low');
		$data_Live2['Live2_Remark'] = $request->post('txt_Live2_Remark');
		$data_Live2['Child_1_Base_ID'] = $request->post('txt_ID');		
		
		$checkbox_Edu_Place = $request->post('checkbox_Edu_Place');
		$data_Edu['Edu_Place'] = is_array($checkbox_Edu_Place)?$checkbox_Edu_Place[0]:$checkbox_Edu_Place;
		$data_Edu['Edu_PlaceName'] = $request->post('txt_Edu_PlaceName');
		$data_Edu['Edu_Remark'] = $request->post('txt_Edu_Remark');
		$data_Edu['Child_1_Base_ID'] = $request->post('txt_ID');
		
		$object_Live1 = Validation::factory($data_Live1);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_5_live1_fields');
			foreach ($data_Live1 as $key => $val){
				if($key=='Child_1_Base_ID') continue;
				if($tableFileds[$key]['not_empty']) $object_Live1 = $object_Live1->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_Live1 = $object_Live1->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		
		$object_Live2 = Validation::factory($data_Live2);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_5_live2_fields');
			foreach ($data_Live2 as $key => $val){
				if($key=='Child_1_Base_ID') continue;
				if($tableFileds[$key]['not_empty']) $object_Live2 = $object_Live2->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_Live2 = $object_Live2->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		
		$object_Edu = Validation::factory($data_Edu);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_5_Edu_fields');
			foreach ($data_Edu as $key => $val){
				if($key=='Child_1_Base_ID') continue;
				if($tableFileds[$key]['not_empty']) $object_Edu = $object_Edu->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_Edu = $object_Edu->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		return array($object_Live1,$object_Live2,$object_Edu);		
	}
	
	/**
	 * step5数据录入
	 * @param unknown $request
	 */
	public function step5_Data(& $request){
		$data = self::Validation_step5($request);
		if($data[0]->check()&&$data[1]->check()&&$data[2]->check()){			
			$ID = $request->post('txt_ID');
			$child_info = self::step5_selectByKey($ID);
			$table_Live1 = Cache::instance()->get('table_child_5_live1');
			$table_Live2 = Cache::instance()->get('table_child_5_live2');
			$table_Edu = Cache::instance()->get('table_child_5_edu');
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;
			//如果存在ID就更新 否则就是新规
			if(!empty($child_info)){				
				$total_rows = parent::update($table_Live1, $data[0]->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
				$total_rows = parent::update($table_Live2, $data[1]->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
				$total_rows = parent::update($table_Edu, $data[2]->as_array(),'Child_1_Base_ID',$ID);				
				if($total_rows === false ){$result = false;}
			}else{
				
				$rst = parent::insert($table_Live1, $data[0]->as_array());
				if($rst === false ){$result = false;}
				$rst = parent::insert($table_Live2, $data[1]->as_array());
				if($rst === false ){$result = false;}
				$rst = parent::insert($table_Edu, $data[2]->as_array());				
				if($rst === false ){$result = false;}
			}
			
			if($request->post('halfwaySave')=='False'){
				$total_rows = parent::update(Cache::instance()->get('table_child_1_base'), array('setbacksNum'=>6),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}			
			return TRUE;
		}else {
			$data_errors_Live1 =  $data[0]->errors('post');
			$data_errors_Live2 =  $data[1]->errors('post');
			$data_errors_Edu =  $data[2]->errors('post');
			$errors =array_merge($data_errors_Live1,$data_errors_Live2,$data_errors_Edu);
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step5').URL::query())->execute();
			return FALSE;
		}	
	}
	
	/**
	 * step5数据查询
	 */
	public function step5_selectByKey($ID,$request='')
	{
		$table_Live1 = Cache::instance()->get('table_child_5_live1');
		$result_Live1= parent::selectByKey($table_Live1, 'Child_1_Base_ID', $ID);
		$table_Live2 = Cache::instance()->get('table_child_5_live2');
		$result_Live2= parent::selectByKey($table_Live2, 'Child_1_Base_ID', $ID);
		$table_Edu = Cache::instance()->get('table_child_5_edu');
		$result_Edu= parent::selectByKey($table_Edu, 'Child_1_Base_ID', $ID);
		
		
		
		if(!empty($result_Live1[0])&&!empty($result_Live2[0])&&!empty($result_Edu[0])){
			$result=array_merge($result_Live1[0],$result_Live2[0],$result_Edu[0]);
		}else{
			//$result = array();
			if($request!=''){
				$Validation_step5 = $this->Validation_step5($request);
				$result = array_merge($Validation_step5[0]->as_array(),$Validation_step5[1]->as_array(),$Validation_step5[2]->as_array());		
			}else{
				$result  = array();
			}
		}
		
		return $result;
	}
	
	
	
	/**
	 *验证step6
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_step6($request)
	{
		$data['Agree'] = $request->post('checkbox_Agree');
		$data['Agree_Hope'] = $request->post('txt_Agree_Hope');
		$data['Agree_Remark'] = $request->post('txt_Agree_Remark');
		$data['Child_1_Base_ID'] = $request->post('txt_ID');
		
		$object = Validation::factory($data);
		
		if($request->post('halfwaySave')=='False'){
			$tableFileds = Cache::instance()->get('table_child_6_agree_fields');
			foreach ($data as $key => $val){
				if($key=='Child_1_Base_Child_Id') continue;
				if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
			}
		}
		return $object;
	}
	
	/**
	 * step6数据录入
	 * @param unknown $request
	 */
	public function step6_Data(& $request){
		
		$data = self::Validation_step6($request);
		if($data->check()){			
			$table = Cache::instance()->get('table_child_6_agree');
			$ID = $request->post('txt_ID');
			$child_info = self::step6_selectByKey($ID);
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;
			//如果存在ID就更新 否则就是新规
			if(!empty($child_info)){
				$total_rows = parent::update($table, $data->as_array(),'Child_1_Base_ID',$ID);
				if($total_rows === false ){$result = false;}
			}else{
				$rst = parent::insert($table, $data->as_array());
				if($rst === false ){$result = false;}
			}

			if($request->post('halfwaySave')=='False'){
				$total_rows = parent::update(Cache::instance()->get('table_child_1_base'), array('setbacksNum'=>7),'ID',$ID);
				if($total_rows === false ){$result = false;}
			}
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}
			
		}else {
			$errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step6').URL::query())->execute();
			return FALSE;
		}
		
	}
	
	/**
	 * step6数据查询
	 */
	public function step6_selectByKey($ID)
	{
		$table = Cache::instance()->get('table_child_6_agree');
		$result= parent::selectByKey($table, 'Child_1_Base_ID', $ID);
		return empty($result)?$result:$result[0];
	}
	
	
	public function step7_Data(& $request)
	{
		$table = Cache::instance()->get('table_child_1_base');		
		parent::update($table, array('setbacksNum'=>8),'ID',$request->post('txt_ID'));
		return true;		
	}
	
	public function step12_Data(& $request)
	{
		$ID = $request->post('txt_ID');
		$data1 = self::Validation_step1($request);
		$images = self::Validation_step1_file($request);		
		$data2 = self::Validation_step2($request);
		$data3 = self::Validation_step3($request);
		$data4 = self::Validation_step4($request);
		$data5 = self::Validation_step5($request);
		$data6 = self::Validation_step6($request);
		$familyStatusData = $this->step2_familyStatus($request);
		
		$parameter=Kohana::$config->load('parameter');
		$changeContent='';
		//Step1内容判断
		$rst_step1=self::getEditChange_Step($data1->as_array(), $ID, '1');
		if(!$rst_step1){
			$changeContent=$parameter['EDIT_CHANGE']['Step1_Base'];
		}
		//step2保护者内容判断，家庭成员另外判断
		$rst_step2=self::getEditChange_Step($data2->as_array(), $ID, '2');
		if(!$rst_step2){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step2']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step2'];
		}
		//step3 status判断
		$rst_Step3_Status=self::getEditChange_Step($data3[0]->as_array(), $ID, '3');
		if(!$rst_Step3_Status){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step3_Status']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step3_Status'];
		}
		//step3 Vaccine判断
		$rst_Step3_Vaccine=self::getEditChange_Step($data3[1]->as_array(), $ID, '3');
		if(!$rst_Step3_Vaccine){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step3_Vaccine']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step3_Vaccine'];
		}
		//step4 Health判断
		$rst_Step4=self::getEditChange_Step($data4->as_array(), $ID, '4');
		if(!$rst_Step4){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step4_Health']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step4_Health'];
		}
		//step5 Live判断
		$rst_Step5_Live1=self::getEditChange_Step($data5[0]->as_array(), $ID, '5');
		$rst_Step5_Live2=self::getEditChange_Step($data5[1]->as_array(), $ID, '5');
		if(!($rst_Step5_Live1&&$rst_Step5_Live2)){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step5_Live']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step5_Live'];
		}
		//Step5 Edu判断
		$rst_Step5_Edu=self::getEditChange_Step($data5[2]->as_array(), $ID, '5');
		if(!$rst_Step5_Edu){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step5_Edu']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step5_Edu'];
		}
		
		//Step6 判断
		$rst_Step6=self::getEditChange_Step($data6->as_array(), $ID, '6');
		if(!$rst_Step6){
			$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Step6']:$changeContent.';'.$parameter['EDIT_CHANGE']['Step6'];
		}
		
		// step2 家族成员信息变更
		$rst_Family=self::getEditChange_Family($familyStatusData, $ID);
		switch ($rst_Family){
			case 0:
				break;
			case 1:
				$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Family_Add']:$changeContent.';'.$parameter['EDIT_CHANGE']['Family_Add'];
				break;
			case 2:
				$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Family_Less']:$changeContent.';'.$parameter['EDIT_CHANGE']['Family_Less'];
				break;
			case 3:
				$changeContent=empty($changeContent)?$parameter['EDIT_CHANGE']['Family_Change']:$changeContent.';'.$parameter['EDIT_CHANGE']['Family_Change'];
				break;
		}
		
		
		
		if($data1->check()&&$images->check()&&$data2->check()&&$data3[0]->check()&&$data3[1]->check()&&$data4->check()&&$data5[0]->check()&&$data5[1]->check()&&$data5[2]->check()&&$data6->check()){
			DB::query(NULL, "BEGIN WORK")->execute();
			$result = TRUE;			
			
			$table1 = Cache::instance()->get('table_child_1_base');			
			$total_rows = parent::update($table1, $data1->as_array(),'ID',$ID);
			if($total_rows === false ){$result = false;}	
			
			$imagesArr = $images->as_array();
			if($imagesArr['childPicture']['error']==0){
				//生成一张160px的像素的图片
				$image = Image::factory($_FILES['childPicture']['tmp_name']);
				$image	->resize(160, 160, Image::AUTO)->save(Kohana::$config->load('global.base_url')."/media/uploadfile/childPictures/{$ID}.jpg");
			}
			
			$table2 = Cache::instance()->get('table_child_2_family');
			$total_rows = parent::update($table2, $data2->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			
			//家族の状況的数据
			$familyStatusData = $this->step2_familyStatus($request);
			$rst = $this->familyStatusDelete($ID);
			if($rst === false ){
				$result = false;
			}
			if(!empty($familyStatusData)){
				$rst = $this->familyStatusInsert($familyStatusData);
				if($rst === false ){
					$result = false;
				}
			}
			
			
			$table_Status = Cache::instance()->get('table_child_3_status');
			$table_Vaccine = Cache::instance()->get('table_child_3_vaccine');
			$total_rows = parent::update($table_Status, $data3[0]->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			$total_rows = parent::update($table_Vaccine, $data3[1]->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}

			$table4 = Cache::instance()->get('table_child_4_health');
			$total_rows = parent::update($table4, $data4->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}				
			
			$table_Live1 = Cache::instance()->get('table_child_5_live1');
			$table_Live2 = Cache::instance()->get('table_child_5_live2');
			$table_Edu = Cache::instance()->get('table_child_5_edu');
			$total_rows = parent::update($table_Live1, $data5[0]->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			$total_rows = parent::update($table_Live2, $data5[1]->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			$total_rows = parent::update($table_Edu, $data5[2]->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			
			$table6 = Cache::instance()->get('table_child_6_agree');
			$total_rows = parent::update($table6, $data6->as_array(),'Child_1_Base_ID',$ID);
			if($total_rows === false ){$result = false;}
			
			if($result === false ){
				DB::query(NULL, "ROLLBACK")->execute();
				return FALSE;
			}else{
				DB::query(NULL, "COMMIT")->execute();
				
				//step信息更新成功后，保存更新条目
				if(!empty($changeContent)){
					$table_edit_change=Cache::instance()->get('table_edit_change');
					$change=array(
							'Edit_Date' => date('Y-m-d H:m'),
							'Edit_UserID' =>Session::instance()->get('USERID'),
							'Edit_Content' => $changeContent,
							'Edit_Html'=>self::getBody('http://'.$_SERVER['HTTP_HOST'].URL::site('child/step13?ID='.$ID)),
							'Child_1_Base_ID'=>$ID
					);
					$rst_insert = parent::insert($table_edit_change, $change);
				}				
				return $ID;
			}
		}else{
			$data1_errors =  $data1->errors('post');
			$images_errors =  $images->errors('file');			
			$data2_errors =  $data2->errors('post');
			$data3_errors[0] =  $data3[0]->errors('post');
			$data3_errors[1] =  $data3[1]->errors('post');
			$data4_errors =  $data4->errors('post');
			$data5_errors[0] =  $data5[0]->errors('post');
			$data5_errors[1] =  $data5[1]->errors('post');
			$data5_errors[2] =  $data5[2]->errors('post');
			$data6_errors =  $data6->errors('post');			
			
			$errors = array_merge($data1_errors,$images_errors,$data2_errors,$data3_errors[0],$data3_errors[1],$data4_errors,$data5_errors[0],$data5_errors[1],$data5_errors[2],$data6_errors);
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/step12').URL::query())->execute();
			return FALSE;
		}
	}
	
	
	/**
	 * 要录作成数据
	 */
	
	public function Validation_summary($request)
	{
		$data['Guardian1'] = $request->post('checkbox_Guardian1');
		$data['Guardian2'] = $request->post('checkbox_Guardian2');
		
		$data['situation'] = $request->post('txt_situation');
		$data['source'] = $request->post('txt_source');
	
		$InDate_Y=$request->post('select_InDate_Y');
		$InDate_M=$request->post('select_InDate_M');
		$InDate_D=$request->post('select_InDate_D');
		$data['InDate'] = (empty($InDate_Y)?'0000':$InDate_Y).'-'.(empty($InDate_M)?'00':$InDate_M).'-'.(empty($InDate_D)?'00':$InDate_D);
	
		$ChangeInDate_Y=$request->post('select_ChangeInDate_Y');
		$ChangeInDate_M=$request->post('select_ChangeInDate_M');
		$ChangeInDate_D=$request->post('select_ChangeInDate_D');
		$data['ChangeInDate'] = (empty($ChangeInDate_Y)?'0000':$ChangeInDate_Y).'-'.(empty($ChangeInDate_M)?'00':$ChangeInDate_M).'-'.(empty($ChangeInDate_D)?'00':$ChangeInDate_D);
	
		$InterruptDate_Y=$request->post('select_InterruptDate_Y');
		$InterruptDate_M=$request->post('select_InterruptDate_M');
		$InterruptDate_D=$request->post('select_InterruptDate_D');
		$data['InterruptDate'] = (empty($InterruptDate_Y)?'0000':$InterruptDate_Y).'-'.(empty($InterruptDate_M)?'00':$InterruptDate_M).'-'.(empty($InterruptDate_D)?'00':$InterruptDate_D);
	
		$FinishDate_Y=$request->post('select_FinishDate_Y');
		$FinishDate_M=$request->post('select_FinishDate_M');
		$FinishDate_D=$request->post('select_FinishDate_D');
		$data['FinishDate'] = (empty($FinishDate_Y)?'0000':$FinishDate_Y).'-'.(empty($FinishDate_M)?'00':$FinishDate_M).'-'.(empty($FinishDate_D)?'00':$FinishDate_D);
	
		$data['Period1_Year'] = $request->post('select_Period1_Year')==''?NULL:$request->post('select_Period1_Year');
		$data['Period1_AgeY'] = $request->post('select_Period1_AgeY')==''?NULL:$request->post('select_Period1_AgeY');
		$data['Period1_AgeM'] = $request->post('select_Period1_AgeM')==''?NULL:$request->post('select_Period1_AgeM');
	
		$data['Period2_Year'] = $request->post('select_Period2_Year')==''?NULL:$request->post('select_Period2_Year');
		$data['Period2_AgeY'] = $request->post('select_Period2_AgeY')==''?NULL:$request->post('select_Period2_AgeY');
		$data['Period2_AgeM'] = $request->post('select_Period2_AgeM')==''?NULL:$request->post('select_Period2_AgeM');
	
		$data['Period3_Year'] = $request->post('select_Period3_Year')==''?NULL:$request->post('select_Period3_Year');
		$data['Period3_AgeY'] = $request->post('select_Period3_AgeY')==''?NULL:$request->post('select_Period3_AgeY');
		$data['Period3_AgeM'] = $request->post('select_Period3_AgeM')==''?NULL:$request->post('select_Period3_AgeM');
	
		$data['Period4_Year'] = $request->post('select_Period4_Year')==''?NULL:$request->post('select_Period4_Year');
		$data['Period4_AgeY'] = $request->post('select_Period4_AgeY')==''?NULL:$request->post('select_Period4_AgeY');
		$data['Period4_AgeM'] = $request->post('select_Period4_AgeM')==''?NULL:$request->post('select_Period4_AgeM');
	
	
		$data['Teach1_Year'] = $request->post('select_Teach1_Year');
		$data['Teach1_Days'] = $request->post('txt_Teach1_Days')==''?NULL:$request->post('txt_Teach1_Days');
		$data['Teach1_inDays'] = $request->post('txt_Teach1_inDays')==''?NULL:$request->post('txt_Teach1_inDays');;
		$data['Teach1_YearPoint'] = $request->post('txt_Teach1_YearPoint');
		$data['Teach1_SinglePoint'] = $request->post('txt_Teach1_SinglePoint');
		$data['Teach1_Reference'] = $request->post('txt_Teach1_Reference');
		$data['Teach1_Remark'] = $request->post('txt_Teach1_Remark');
	
		$data['Teach2_Year'] = $request->post('select_Teach2_Year');
		$data['Teach2_Days'] = $request->post('txt_Teach2_Days')==''?NULL:$request->post('txt_Teach2_Days');
		$data['Teach2_inDays'] = $request->post('txt_Teach2_inDays')==''?NULL:$request->post('txt_Teach2_inDays');;
		$data['Teach2_YearPoint'] = $request->post('txt_Teach2_YearPoint');
		$data['Teach2_SinglePoint'] = $request->post('txt_Teach2_SinglePoint');
		$data['Teach2_Reference'] = $request->post('txt_Teach2_Reference');
		$data['Teach2_Remark'] = $request->post('txt_Teach2_Remark');
	
		$data['Teach3_Year'] = $request->post('select_Teach3_Year');
		$data['Teach3_Days'] = $request->post('txt_Teach3_Days')==''?NULL:$request->post('txt_Teach3_Days');
		$data['Teach3_inDays'] = $request->post('txt_Teach3_inDays')==''?NULL:$request->post('txt_Teach3_inDays');;
		$data['Teach3_YearPoint'] = $request->post('txt_Teach3_YearPoint');
		$data['Teach3_SinglePoint'] = $request->post('txt_Teach3_SinglePoint');
		$data['Teach3_Reference'] = $request->post('txt_Teach3_Reference');
		$data['Teach3_Remark'] = $request->post('txt_Teach3_Remark');
	
		$data['Teach4_Year'] = $request->post('select_Teach4_Year');
		$data['Teach4_Days'] = $request->post('txt_Teach4_Days')==''?NULL:$request->post('txt_Teach4_Days');
		$data['Teach4_inDays'] = $request->post('txt_Teach4_inDays')==''?NULL:$request->post('txt_Teach4_inDays');;
		$data['Teach4_YearPoint'] = $request->post('txt_Teach4_YearPoint');
		$data['Teach4_SinglePoint'] = $request->post('txt_Teach4_SinglePoint');
		$data['Teach4_Reference'] = $request->post('txt_Teach4_Reference');
		$data['Teach4_Remark'] = $request->post('txt_Teach4_Remark');
	
		$data['Child_1_Base_ID'] = $request->post('hidden_ID');
	
		$object = Validation::factory($data);
	
		$tableFileds = Cache::instance()->get('table_schoolin_fields');
		foreach ($data as $key => $val){
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	}
	
	/**
	 * 要录作成数据录入
	 * @param unknown $request
	 */
	public function summary_Data(& $request){
		$data = self::Validation_summary($request);		
		if($data->check()){			
			$table = Cache::instance()->get('table_schoolin');
			
			$summary = self::summary_selectByKey($data['Child_1_Base_ID']);

			if(!empty($summary))
			{
				$result = DB::update($table)->set($data->as_array())->where('Child_1_Base_ID','=',$data['Child_1_Base_ID'])->execute();
			}
			else
			{
				$result = parent::insert($table, $data->as_array());
			}
			
			return TRUE;
		}else {
			$data_errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('child/summary').URL::query())->execute();
			return FALSE;
		}
	}
	
	
	public function summary_selectByKey($Child_1_Base_ID){
		try {
			$table = Cache::instance()->get('table_schoolin');
			$result = parent::selectByKey($table, 'Child_1_Base_ID', $Child_1_Base_ID);
			return empty($result)?$result:$result[0];
		} catch (Exception $e) {
			$e->getMessage();
		}
	}	
	
	
	/**
	 * health作成数据整理
	 */
	public function Validation_health($request)
	{
		$data['Weight'] = $request->post('txt_Weight');
	
		$scanDate_Y= $request->post('select_ScanDate_Y');
		$scanDate_M= $request->post('select_ScanDate_M');
		$scanDate_D= $request->post('select_ScanDate_D');
		$data['ScanDate'] =(empty($scanDate_Y)?'0000':$scanDate_Y).'-'.(empty($scanDate_M)?'00':$scanDate_M).'-'.(empty($scanDate_D)?'00':$scanDate_D);
			
		$data['Guardian1'] = $request->post('checkbox_Guardian1',NULL);
		$data['Guardian2'] = $request->post('checkbox_Guardian2',NULL);
		$data['Child_1_Base_ID'] = $request->post('hidden_ID');
	
		$object = Validation::factory($data);
	
		$tableFileds = Cache::instance()->get('table_healthcard_fields');
		foreach ($data as $key => $val){
			if($key=='Child_1_Base_ID') continue;
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
	
		return $object;
	}
	
	/**
	 * 健康作成数据录入
	 * @param unknown $request
	 */
	public function health_Data(& $request){
		$data = self::Validation_health($request);
		if($data->check()){
			$ID = $request->post('hidden_ID');
			$health_info = self::health_selectByKey($ID);
			$table = Cache::instance()->get('table_healthcard');
			//如果存在ID就更新 否则就是新规
			if(!empty($health_info)){
				$total_rows = parent::update($table, $data->as_array(),'Child_1_Base_ID',$ID);
			}else{
				$rst = parent::insert($table, $data->as_array());
			}
			return TRUE;
		}else {
			$errors =  $data->errors('post');
			Request::factory('postprompt/postError')->post('errors',$errors)->post('url',URL::site('child/health').URL::query())->execute();
			return FALSE;
		}
	
	}
	
	/**
	 * health数据查询
	 */
	public function health_selectByKey($ID)
	{
		try {
			$table = Cache::instance()->get('table_healthcard');
			$result= parent::selectByKey($table, 'Child_1_Base_ID', $ID);
			return empty($result)?$result:$result[0];
		} catch (Exception $e) {
	
		}
	}
	
	
	/**
	 *  查询group成员的信息的sql语句
	 *  特别供应给getGroupChild  getNoGroupChild 使用
	 * @return Ambigous <$this, Database_Query_Builder_Select>
	 */
	private static function getGroupSql()
	{
		$table_base = Cache::instance()->get('table_child_1_base');
		$table_family = Cache::instance()->get('table_child_2_family');
		$table_guardian = Cache::instance()->get('table_user_guardian');
		
		return DB::select('base.ID','base.Child_Id','base.InputDate','base.EnterDate','base.group','base.siblingOrder','base.FamilyName','base.GivenName','base.setbacksNum','family.Guardian1_FamilyName','family.Guardian1_GivenName','guardian.PWD')
				->from(array($table_base,'base'))
				->join(array($table_family,'family'),'left')->on('family.Child_1_Base_ID','=','base.ID')
				->join(array($table_guardian,'guardian'),'left')->on('guardian.Guardian_ID','=','base.Child_Id')				
				->where_open()->where('base.LeaveDate','=','0000-00-00')->or_where('base.LeaveDate','>',date('Y-m-d'))->where_close();
	}
	
	/**
	 * 获取当前组的Child
	 * @param unknown $group
	 */
	public function getGroupChild($group)
	{		
		try {
			return self::getGroupSql()->and_where('base.group','=',$group)->order_by('base.siblingOrder','ASC')->execute()->as_array();
		} catch (Exception $e) {
				
		}		
	}
	
	
	/**
	 * 获取当前组加上未分组的
	 * 数据库中未分组的group 值为0
	 * @param string $group
	 */
	public function getNoGroupChild($guardian1)
	{
		try {
			$sql = self::getGroupSql()->and_where('base.group','=','0');
			if(!empty($guardian1)){
				$sql = $sql->and_where(DB::expr('CONCAT(family.Guardian1_FamilyName,family.Guardian1_GivenName)'),'LIKE',"%{$guardian1}%");
			}			
			return $sql->order_by('family.Guardian1_FamilyName_Spell','ASC')->execute()->as_array();					
		} catch (Exception $e) {
			//echo $e->getMessage();
		}		
	}
	
	public function getAllGroup()
	{
		try {
			$table_base = Cache::instance()->get('table_child_1_base');
			$groupList = DB::select(DB::expr("DISTINCT(`group`)"))->from($table_base)->where('group','<>','0')->order_by('Child_Id','ASC')->execute()->as_array();

			$allGroup = array();
			foreach($groupList as $key => $val){			
				$allGroup[$val['group']] = self::getGroupChild($val['group']);			
			}
			
			return $allGroup;
		} catch (Exception $e) {
			//echo $e->getMessage();
		}		
	}
	
	/**
	 * 兄弟关系提交处理页面
	 * 
	 * 由于本画面提交画面中的 siblingOrder变量 提交的时候无值得为 disabled属性。 所以不需要去空处理
	 * 
	 * @param unknown $post
	 * @return boolean
	 */
	public function groupRelationshipUpdate($post)
	{
		try {		
			$IDArr = array();
			DB::query(NULL, "BEGIN WORK")->execute();
			$table_base = Cache::instance()->get('table_child_1_base');
			
			//整理出本次选择的孩子的信息
			foreach($post['ID'] as $key => $val ){
				if(!empty($val)){
					$IDArr[] = $val;
				}				
			}
	
			//如果小于两个人 是无法组成兄弟关系的 直接将这个组去掉		
			if(count($IDArr)<2){
				if(!empty($post['group'])){
					$total_rows = DB::update($table_base)->set(array('group'=>0,'siblingOrder'=>NULL))->where('group','=',$post['group'])->execute();
					if($total_rows==0){
						DB::query(NULL, "ROLLBACK")->execute();
						return FALSE;
					}else{
						DB::query(NULL, "COMMIT")->execute();
						return TRUE;
					}
				}
			}
			
			//如果没有传递group过来 则表明目前没有组 那就给他新加一个组
			if(empty($post['group'])){
				$maxGroup = DB::select(DB::expr("MAX(`group`) AS `group`"))->from($table_base)->execute()->get("group");
				$group = $maxGroup + 1;				
			}else{
				$group = $post['group'];
				
				//解除兄弟关系
				$oldIDArr = explode(',', $post['oldID']);
				$delArr = array_diff($oldIDArr, $IDArr);
				foreach($delArr as $key => $val){
					$total_rows = DB::update($table_base)->set(array('group'=>0,'siblingOrder'=>NULL))->where('ID','=',$val)->and_where('group','=',$group)->execute();
					if($total_rows==0){
						DB::query(NULL, "ROLLBACK")->execute();
					}
				}
			}
			
			//将本次更新的孩子信息更新
			foreach($IDArr as $key => $val ){					
				DB::update($table_base)->set(array('group'=>$group,'siblingOrder'=>$post['siblingOrder'][$key]))->where('ID','=',$val)->and_where_open()->where('group','=',$post['group'])->or_where('group','=',0)->and_where_close()->execute();
			}
			
			DB::query(NULL, "COMMIT")->execute();
			return $group;
			
		} catch (Exception $e) {
			Request::factory('postprompt/postError')->post('errors',array($e->getMessage()))->post('url',URL::site('administration/setRelationship').URL::query())->execute();
			return FALSE;
		}		
	}
	
	/**
	 * 请求书使用
	 */
	public function getActivityInfo($child,$thisYearMon){
		try {
			$table_activity=Cache::instance()->get('table_master_activitiesset');			
			$activities = empty($child['Activities'])?array():explode(';', $child['Activities']);
			
			//所有选修的项目详细信息
			$activitiesInfo= DB::select()->from($table_activity)->where('ID','IN',$activities)->order_by('ID','ASC')->execute()->as_array();			
			
			//指定月份   的活动项目
			$Mon_activity=array();
			for($i=1;$i<=5;$i++){
				if(!empty($child['Activities_Date_'.$i])){
					if(substr($child['Activities_Date_'.$i], 0,7)<=$thisYearMon){
						$Mon_activity[]=$i;
					}
				}
			}
						
			//指定月份   选修的项目详细信息
			$Mon_Act_Info= empty($Mon_activity)?array():DB::select()->from($table_activity)->where('ID','IN',$Mon_activity)->order_by('ID','ASC')->execute()->as_array();
			
			return array('activitiesInfo'=>$activitiesInfo,'Mon_Act_Info'=>$Mon_Act_Info);
			
		} catch (Exception $e) {
			
		}
	
	}
	
	/**
	 * 获取购买物品信息
	 * @param unknown $child_Id
	 */
	public function getBuyGoodsInfo($Child_1_Base_ID,$thisYearMon)
	{
		try {
			$table_Buy = Cache::instance()->get('table_buygoods');
			$buyThisYearMon = DB::select()->from($table_Buy)->where('Confirm_Date','LIKE',$thisYearMon.'%')->and_where('Confirmed','=',1)->and_where('Child_1_Base_ID','=',$Child_1_Base_ID)->order_by('ID','ASC')->execute()->as_array();
			$buyAll = DB::select()->from($table_Buy)->where('Child_1_Base_ID','=',$Child_1_Base_ID)->and_where('Confirmed','=','1')->order_by('ID','DESC')->execute()->as_array();
			return array('thisYearMon'=>$buyThisYearMon,'all'=>$buyAll);			
		} catch (Exception $e) {
			
		}		
	}
	
	
	/**
	 * 月額保育料获取
	 */
	public function getMonCost($Child_1_Base_ID,$thisYearMon){
	
		$table_recog_1=Cache::instance()->get('table_master_costset_1');
		$table_recog_23=Cache::instance()->get('table_master_costset_23');
	
		$child = self::step1_selectByKey($Child_1_Base_ID);
	
		$recogList=self::getMonRecogList($thisYearMon, $Child_1_Base_ID);
		
		if(empty($recogList)||count($recogList)>1){
			return 0;
		}
		
		$Less_Recog1_Rata = $Less_Recog2_Rata = $Less_Recog3_Rata = 1;
		$Less_Recog1_Round = $Less_Recog2_Round = $Less_Recog3_Round = 'Equal';
		if((int)$child['siblingOrder']>1){
			$table_kidsLessSet = Cache::instance()->get('table_master_kidslessset');
			$data_kidsLessSet = Model::factory('master')->getData($table_kidsLessSet);
			if(!empty($data_kidsLessSet)){
				if((int)$child['siblingOrder']==2){
					$Less_Recog1_Rata = (100-$data_kidsLessSet[0]['Less2_Recog1_Rata'])/100;
					$Less_Recog2_Rata = (100-$data_kidsLessSet[0]['Less2_Recog2_Rata'])/100;
					$Less_Recog3_Rata = (100-$data_kidsLessSet[0]['Less2_Recog3_Rata'])/100;
					
					$Less_Recog1_Round = $data_kidsLessSet[0]['Less2_Recog1_Round'];
					$Less_Recog2_Round = $data_kidsLessSet[0]['Less2_Recog2_Round'];
					$Less_Recog3_Round = $data_kidsLessSet[0]['Less2_Recog3_Round'];
				}else{
					$Less_Recog1_Rata = (100-$data_kidsLessSet[0]['Less3_Recog1_Rata'])/100;
					$Less_Recog2_Rata = (100-$data_kidsLessSet[0]['Less3_Recog2_Rata'])/100;
					$Less_Recog3_Rata = (100-$data_kidsLessSet[0]['Less3_Recog3_Rata'])/100;
					
					$Less_Recog1_Round = $data_kidsLessSet[0]['Less3_Recog1_Round'];
					$Less_Recog2_Round = $data_kidsLessSet[0]['Less3_Recog2_Round'];
					$Less_Recog3_Round = $data_kidsLessSet[0]['Less3_Recog3_Round'];
				}
			}
		}
		
		$parameter=Kohana::$config->load('parameter');
		$cost_all='';
		foreach ($recogList as $key =>$val){
			if($val['Recog_Type']=='R1'){
				$cost = DB::select('SetNumber')->from($table_recog_1)->where('Project','=',$val['Recog_Project'])->execute()->get('SetNumber');
				$tmp = $cost*$val['Percent']*$Less_Recog1_Rata;
				$cost_all += self::costRound($tmp,$Less_Recog1_Round);
			}
			if($val['Recog_Type']=='R2'){
				$cost = DB::select('2_Standard')->from($table_recog_23)->where('Project','=',$parameter['PROJECT'][$val['Recog_Project']])->execute()->get('2_Standard');
				$tmp = $cost*$val['Percent']*$Less_Recog2_Rata;
				$cost_all += self::costRound($tmp,$Less_Recog2_Round);
			}
			if($val['Recog_Type']=='R2S'){
				$cost = DB::select('2_Short')->from($table_recog_23)->where('Project','=',$parameter['PROJECT'][$val['Recog_Project']])->execute()->get('2_Short');
				$tmp = $cost*$val['Percent']*$Less_Recog2_Rata;
				$cost_all += self::costRound($tmp,$Less_Recog2_Round);
			}
			if($val['Recog_Type']=='R3'){
				$cost = DB::select('3_Standard')->from($table_recog_23)->where('Project','=',$parameter['PROJECT'][$val['Recog_Project']])->execute()->get('3_Standard');
				$tmp = $cost*$val['Percent']*$Less_Recog3_Rata;
				$cost_all += self::costRound($tmp,$Less_Recog3_Round);
			}
			if($val['Recog_Type']=='R3S'){
				$cost = DB::select('3_Short')->from($table_recog_23)->where('Project','=',$parameter['PROJECT'][$val['Recog_Project']])->execute()->get('3_Short');
				$tmp = $cost*$val['Percent']*$Less_Recog3_Rata;
				$cost_all += self::costRound($tmp,$Less_Recog3_Round);
			}
		}		
		
		return $cost_all;
	}
	
	
	private function costRound($num,$round){
		switch ($round){
			case 'Abandon':
				$num = floor($num/10)*10;				
				break;
			case 'Up':
				$num = ceil($num/10)*10;
				break;
			case 'Equal':				
				break;
		}		
		return $num;
	}
	
	
	/**
	 * 获取延長保育料
	 * $overDays 为预设值 为虚拟数据
	 */
	public function getOverCost($Child_1_Base_ID,$monCost,$thisYearMon){
		try {
			$table_overCost=Cache::instance()->get('table_master_overcostset');
				
			//本月中认定分区信息数据
			$recogList=self::getMonRecogList($thisYearMon, $Child_1_Base_ID);
			if(empty($recogList)||count($recogList)>1){
				return 0;
			}			
			
			$overCostInfo = DB::select()->from($table_overCost)->execute()->current();				
			if(empty($overCostInfo)) return array('overCost'=>'','remark'=>'');
				
			$table_day_detail=Cache::instance()->get('table_day_detail');
			$rst_day_detail = DB::select()
								->from($table_day_detail)
								->where('Day_Date','LIKE',$thisYearMon.'%')
								->and_where('Child_1_Base_ID','=',$Child_1_Base_ID)
								->and_where('Extension_Times','>','0:00')
								->execute()->as_array();
			//print_r($overCostInfo);
			//exit();
			$overCost = 0;
			//R1日额
			if($overCostInfo['Recog_1_Select']=='1'){
				foreach ($rst_day_detail as $key =>$val){
					if($val['Recog_Type']=='R1'){
						$overCost += $overCostInfo['Recog_1_DayPrice'];
					}
				}
			}
				
			//R1月额
			if($overCostInfo['Recog_1_Select']=='2'){
				foreach ($recogList as $key => $val){
					if($val['Recog_Type']=='R1'){
						$overCost += $overCostInfo['Recog_1_MonPrice']*$val['Percent'];
					}
				}
			}
			//R1比率
			if($overCostInfo['Recog_1_Select']=='3'){
				foreach ($recogList as $key => $val){
					if($val['Recog_Type']=='R1'){
						$cost_Rata = $monCost*$val['Percent']*$overCostInfo['Recog_1_Rata']/100;
						$overCost += $cost_Rata<=$overCostInfo['Recog_1_Limit']*$val['Percent']?$cost_Rata: $overCostInfo['Recog_1_Limit']*$val['Percent'];
					}
				}
			}
				
			//2,3 日额
			if($overCostInfo['Recog_2_3_Select']=='1'){
				foreach ($rst_day_detail as $key =>$val){
					if($val['Recog_Type']=='R2'||$val['Recog_Type']=='R2S'||$val['Recog_Type']=='R3'||$val['Recog_Type']=='R3S'){
						$overCost += $overCostInfo['Recog_2_3_DayPrice'];
					}
				}
			}
			//2,3 月额
			if($overCostInfo['Recog_2_3_Select']=='2'){
				foreach ($recogList as $key => $val){
					if($val['Recog_Type']=='R2'||$val['Recog_Type']=='R2S'||$val['Recog_Type']=='R3'||$val['Recog_Type']=='R3S'){
						$overCost += $overCostInfo['Recog_2_3_MonPrice']*$val['Percent'];
					}
				}
			}
				
			//2,3比率
			if($overCostInfo['Recog_2_3_Select']=='3'){
				foreach ($recogList as $key => $val){
					if($val['Recog_Type']=='R2'||$val['Recog_Type']=='R2S'||$val['Recog_Type']=='R3'||$val['Recog_Type']=='R3S'){
						$cost_Rata=$monCost*$val['Percent']*$overCostInfo['Recog_2_3_Rata']/100;
						$overCost += $cost_Rata <= $overCostInfo['Recog_2_3_Limit']*$val['Percent']?$cost_Rata: $overCostInfo['Recog_2_3_Limit']*$val['Percent'];
					}
				}
			}	
			return $overCost;
		} catch (Exception $e) {
				
		}
	
	
	}
	
	/**
	 * 預かり保育收费获取
	 */
	public function getExtraCost($Child_1_Base_ID,$thisYearMon){
		try {
			//从day_detail表中读取 預かり保育 的数据
			$table_day_detail=Cache::instance()->get('table_day_detail');
			$rst_day_detail=DB::select()
							->from($table_day_detail)
							->where('Day_Date','LIKE',$thisYearMon.'%')
							->and_where('Child_1_Base_ID','=',$Child_1_Base_ID)
							->and_where('Delayed_Times','>','0:00')
							->execute()->as_array();
				
			$extraData=array();
			foreach ($rst_day_detail as $key =>$val){
				if(!empty($val['Delayed_Times'])){
					list($hour,$min) = explode(':',$val['Delayed_Times']);
					$tmpKey = date('d',strtotime($val['Day_Date']));
					
					if($min<=30&&$min>0){
						$extraData[$tmpKey] = $hour+0.5;
					}else if($min>30){
						$extraData[$tmpKey] = $hour+1;
					}					
				}
			}
	
			$table_projectsCost=Cache::instance()->get('table_master_projectcostset');				
			$projectsCostInfo =DB::select()->from($table_projectsCost)->order_by('ID','ASC')->execute()->as_array();
	
			$extraCost = 0;
			if(!empty($projectsCostInfo)){
				$model=Model::factory('list');
				foreach ($extraData as $key=>$val){										
					$recog = $model->getChildTIMERecog($Child_1_Base_ID,$thisYearMon.'-'.$key);				
					if($recog['Recog_Type']=='R1'){
						$extraCost += $val<=4?$projectsCostInfo[0]['Recog_1']:$projectsCostInfo[0]['Recog_1']+$projectsCostInfo[1]['Recog_1']*($val-4)/0.5;
					}
					if($recog['Recog_Type']=='R2'||$recog['Recog_Type']=='R2S'){
						$extraCost += $val<=4?$projectsCostInfo[0]['Recog_2']:$projectsCostInfo[0]['Recog_2']+$projectsCostInfo[1]['Recog_2']*($val-4)/0.5;
					}
					if($recog['Recog_Type']=='R3'||$recog['Recog_Type']=='R3S'){
						$extraCost += $val<=4?$projectsCostInfo[0]['Recog_3']:$projectsCostInfo[0]['Recog_3']+$projectsCostInfo[1]['Recog_3']*($val-4)/0.5;
					}
				}
				array_splice($projectsCostInfo, 0, 2);
			}
			
			
			$recogList = self::getMonRecogList($thisYearMon, $Child_1_Base_ID);
	
			foreach ($projectsCostInfo as $key => $val){
				$money = 0;				
				foreach ($recogList as $key_r =>$val_r){
					if($val_r['Recog_Type']=='R1'){
						$money = $val['Recog_1']*$val_r['Percent'];
					}
					if($val_r['Recog_Type']=='R2'||$val_r['Recog_Type']=='R2S'){
						$money = $val['Recog_2']*$val_r['Percent'];
					}
					if($val_r['Recog_Type']=='R3'||$val_r['Recog_Type']=='R3S'){
						$money = $val['Recog_3']*$val_r['Percent'];
					}
				}
				$projectsCostInfo[$key]['money'] = $money;
			}
			
			return array('extraCost'=>$extraCost,'projects'=>$projectsCostInfo);
		}catch (Exception $e){
				echo $e->getMessage();
		}
	}
	
	/**
	 * 请求书信息插入
	 */
	public function Validation_invoice($request){	
	
		$data['Child_Name'] = $request->post('txt_Child_Name');
	
		$request_Date_Y = $request->post('select_Request_Date_Y');
		$request_Date_M = $request->post('select_Request_Date_M');
		$request_Date = empty($request_Date_Y)?'0000':$request_Date_Y;
		$request_Date .= empty($request_Date_M)?'-00':'-'.$request_Date_M;
		$data['Request_Date'] = $request_Date;
	
		$data['Base_MonCost_Checked'] = $request->post('chk_Base_MonCost_Checked',NULL);
		$data['Base_MonCost'] =str_replace(',', '', $request->post('txt_Base_MonCost'));
		$data['Base_MonCost_Remark'] = $request->post('txt_Base_MonCost_Remark');
	
		$data['Base_OverCost_Checked'] = $request->post('chk_Base_OverCost_Checked',NULL);
		$data['Base_OverCost'] =str_replace(',', '', $request->post('txt_Base_OverCost'));
		$data['Base_OverCost_Remark'] = $request->post('txt_Base_OverCost_Remark');
	
		$data['Base_ProjectCost_Checked'] = $request->post('chk_Base_ProjectCost_Checked',NULL);
		$data['Base_ProjectCost'] =str_replace(',', '', $request->post('txt_Base_ProjectCost'));
		$data['Base_ProjectCost_Remark'] = $request->post('txt_Base_ProjectCost_Remark');
			
		$base_Projects_Checked = $request->post('chk_Base_Projects_Checked',NULL);
		empty($base_Projects_Checked)?$base_Projects_Checked=NULL:$base_Projects_Checked=implode(';', $base_Projects_Checked);
		$data['Base_Projects_Checked'] = $base_Projects_Checked;
	
		$base_Projects_Name=$request->post('txt_Base_Projects_Name');
		$data['Base_Projects_Name'] = implode(';', $base_Projects_Name);
	
		$base_Projects_Cost= $request->post('txt_Base_Projects_Cost');
		$data['Base_Projects_Cost'] =str_replace(',', '', implode(';', $base_Projects_Cost));
	
		$base_Projects_Remark=$request->post('txt_Base_Projects_Remark');
		$data['Base_Projects_Remark'] = implode('<;>', $base_Projects_Remark);
	
		
		$activity_Checked = $request->post('chk_Activity_Checked',NULL);
		$activity_Cost_Checked = $request->post('chk_Activity_Cost',NULL);		
		$data['Activity_Checked_5'] = $data['Activity_Checked_4'] = $data['Activity_Checked_3'] = $data['Activity_Checked_2'] = $data['Activity_Checked_1'] = 0;
		$data['Activity_Cost_Checked_5'] = $data['Activity_Cost_Checked_4'] = $data['Activity_Cost_Checked_3'] = $data['Activity_Cost_Checked_2'] = $data['Activity_Cost_Checked_1'] = 0;
		if(!empty($activity_Checked)){
			foreach ($activity_Checked as $val){
				$data['Activity_Checked_'.$val] = 1;				
			}
		}
		if(!empty($activity_Cost_Checked)){
			foreach ($activity_Cost_Checked as $val){
				$data['Activity_Cost_Checked_'.$val] = 1;
			}
		}
	
		$Activity_Name = $request->post('txt_Activity_Name');
		$Activity_PricePerM =$request->post('txt_Activity_PricePerM');
		$Activity_Cost = $request->post('hidden_Activity_Cost');
		$Activity_Remark = $request->post('txt_Activity_Remark');
		foreach ($Activity_Name as $key => $val)
		{
			$tmpK = $key+1;
			$data['Activity_Name_'.$tmpK] = $val;
			$data['Activity_PricePerM_'.$tmpK] =str_replace(',', '', $Activity_PricePerM[$key]);
			$data['Activity_Cost_'.$tmpK] = $Activity_Cost[$key];
			$data['Activity_Remark_'.$tmpK] = $Activity_Remark[$key];
		}	
	
		$buy_Checked = $request->post('chk_Buy_Checked');
		empty($buy_Checked)?$buy_Checked=NULL:$buy_Checked=implode(';', $buy_Checked);
		$data['Buy_Checked'] = $buy_Checked;
	
		$buy_GoodsNames = $request->post('txt_Buy_GoodsNames');
		empty($buy_GoodsNames)?$buy_GoodsNames=NULL:$buy_GoodsNames=implode(';', $buy_GoodsNames);
		$data['Buy_GoodsNames'] = $buy_GoodsNames;
	
		$buy_GoodsPrices = $request->post('txt_Buy_GoodsPrices');
		empty($buy_GoodsPrices)?$buy_GoodsPrices=NULL:$buy_GoodsPrices=implode(';', $buy_GoodsPrices);
		$data['Buy_GoodsPrices'] = str_replace(',', '', $buy_GoodsPrices);
	
		$buy_GoodsRemark = $request->post('txt_Buy_GoodsRemark');
		empty($buy_GoodsRemark)?$buy_GoodsRemark=NULL:$buy_GoodsRemark=implode('<;>', $buy_GoodsRemark);
		$data['Buy_GoodsRemark'] = $buy_GoodsRemark;
		
		$data['Child_1_Base_ID'] = $request->post('ID');
		
		$object = Validation::factory($data);
	
	
		$tableFileds = Cache::instance()->get('table_invoice_fields');
		foreach ($data as $key => $val){
			if($key=='ID') continue;
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	}
	/**
	 * 请求书保存
	 * @param unknown $request
	 * @return boolean
	 */
	public function invoice_Data(& $request)
	{
		try {
			
			$data = self::Validation_invoice($request);
			
			$values=$data->as_array();
			if($data->check()){
				$table = Cache::instance()->get('table_invoice');	
				
				$ID = DB::select('ID')->from($table)->where('Request_Date','=',$values['Request_Date'])->and_where('Child_1_Base_ID','=',$values['Child_1_Base_ID'])->execute()->get('ID');
				
				if(!empty($ID)){
					$total_rows = parent::update($table, $values,'ID',$ID);					
				}else{
					$rst = parent::insert($table, $values);
					if($rst===FALSE){
						return FALSE;
					}
				}
				return true;
			}else {
				$data_errors =  $data->errors('post');
				Request::factory('postprompt/postError')->post('errors',$data_errors)->post('url',URL::site('invoice/invoice').URL::query())->execute();
				return FALSE;
				
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}			
	}
	
	/**
	 * 读取某个孩子的某月请求书信息
	 * @param unknown $child_Id
	 * @param unknown $thisYearMon
	 * @return Ambigous <multitype:, unknown, NULL>
	 */
	public function getInvoice($Child_1_Base_ID,$thisYearMon){
	
		$table = Cache::instance()->get('table_invoice');
		$rst='';
		try {
			$rst=DB::select()->from($table)->where('Child_1_Base_ID','=',$Child_1_Base_ID)->and_where('Request_Date','=',$thisYearMon)->execute()->as_array();
		}catch (Exception $e) {
			$e->getMessage();
		}
		return empty($rst)?array():$rst[0];
	}
	
	
	/**
	 * 判断child的信息是否被更改.此方法不适用于家庭成员信息变更
	 * @param array $newDate 新录入的信息
	 * @param unknown $ID  录入信息的child的ID
	 * @param $step 步数
	 * @return true 表示没变  False表示有改变
	 */
	public function getEditChange_Step($newData,$ID,$step){
		$oldData=array();
		switch ($step){
			case 1:
				$oldData=self::step1_selectByKey($ID);
				break;
			case 2:
				$oldData=self::step2_selectByKey($ID);
				break;
			case 3:
				$oldData=self::step3_selectByKey($ID);
				break;
			case 4:
				$oldData=self::step4_selectByKey($ID);
				break;
			case 5:
				$oldData=self::step5_selectByKey($ID);
				break;
			case 6:
				$oldData=self::step6_selectByKey($ID);
				break;
		}
		foreach ($newData as $key =>$val){
			if(array_key_exists($key, $oldData)&&$val!=$oldData[$key]){
				return FALSE;
			}
		}
		return TRUE;
	}
	
	/**
	 * 判断家庭信息的改变
	 * @param unknown $newData
	 * @param unknown $ID
	 * @return 0 未发生改变； 1 追加了新成员； 2 削除了成员；3 成员信息发生变动
	 */
	public function getEditChange_Family($newData,$ID){
		$oldData=self::familyStatusList($ID);
	
		if(count($newData)>count($oldData)){
			return 1;
		}
	
		if(count($newData)<count($oldData)){
			return 2;
		}
	
		foreach ($newData as $key => $val){
			foreach ($val as $key_1 =>$val_1){
				if(array_key_exists($key_1,$oldData[$key])&&$val_1!=$oldData[$key][$key_1]){
					return 3;
				}
			}
		}
		return 0;
	}
	
	public function getBody($url)
	{
		$ret = file_get_contents($url);
		// 若需要从页面中获取内容，可以用正则匹配
		$p = "/(<body>)(.*)(<\/body>)/is";
		// 使用正则进行匹配
		if (preg_match($p,$ret,$rs)) return $rs[2];
		else  	return false;
	}
	
	
	/*
	 * 10-16,10-17考勤ID保存
	*/
	public function attendanceId_insert(& $request){
	
		$data['Attendance_ID1']=$request->post('txt_Attendance_ID1');
		$data['Attendance_ID2']=$request->post('txt_Attendance_ID2');
	
		$table=Cache::instance()->get('table_child_1_base');
		DB::query(NULL, "BEGIN WORK")->execute();
	
		foreach ($data['Attendance_ID1'] as $key=>$val){
			$result=parent::update($table, array('Attendance_ID1'=>$val,'Attendance_ID2'=>$data['Attendance_ID2'][$key]), 'ID', $key);
			if($result===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
		}
		DB::query(NULL, "COMMIT")->execute();
		return true;
	
	}
	
}