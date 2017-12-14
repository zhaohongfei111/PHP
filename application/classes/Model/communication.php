<?php
class Model_communication extends Model_DBCommon{
	
	public function Validation_comm($request)
	{
		$data['Child_Id'] = $request->post('chkbox_Child_Id');

		$LeaveDate_Y=$request->post('txt_LeaveDate_Y');		
		$LeaveDate_M=$request->post('select_LeaveDate_M');
		$LeaveDate_D=$request->post('select_LeaveDate_D');
		$data['LeaveDate'] =(empty($LeaveDate_Y)?'0000':$LeaveDate_Y).'-'.(empty($LeaveDate_M)?'00':$LeaveDate_M).'-'.(empty($LeaveDate_D)?'00':$LeaveDate_D);
		
		$LeaveDate_End_Y=$request->post('txt_LeaveDate_End_Y');
		$LeaveDate_End_M=$request->post('select_LeaveDate_End_M');
		$LeaveDate_End_D=$request->post('select_LeaveDate_End_D');
		$data['LeaveDate_End'] =(empty($LeaveDate_End_Y)?'0000':$LeaveDate_End_Y).'-'.(empty($LeaveDate_End_M)?'00':$LeaveDate_End_M).'-'.(empty($LeaveDate_End_D)?'00':$LeaveDate_End_D);
		
		$data['Late'] = $request->post('chkbox_Late',NULL);		
		$data['Arrive_Time'] = $request->post('select_Arrive_Time')==''?NULL:$request->post('select_Arrive_Time');		
		$data['Eat'] = $request->post('select_Eat')==''?NULL:$request->post('select_Eat');		
		$data['Rest'] = $request->post('chkbox_Rest',NULL);
		$data['Other'] = $request->post('chkbox_Other',NULL);
		$data['Reason'] = $request->post('txt_Reason');

		$nowDate=date('Y-m-d H:i');
		$data['Submit_Date']=$nowDate;
		
		$object = Validation::factory($data);
		
		$tableFileds = Cache::instance()->get('table_communication_fields');
		foreach ($data as $key => $val){
			if(in_array($key,array('ID','Child_Id'))) continue;
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	}
	
	public function Validation_commUpdate($request)
	{
		$data['ID'] = $request->post('ID');
		
		$LeaveDate_Y=$request->post('txt_LeaveDate_Y');
		$LeaveDate_M=$request->post('select_LeaveDate_M');
		$LeaveDate_D=$request->post('select_LeaveDate_D');
		$data['LeaveDate'] =(empty($LeaveDate_Y)?'0000':$LeaveDate_Y).'-'.(empty($LeaveDate_M)?'00':$LeaveDate_M).'-'.(empty($LeaveDate_D)?'00':$LeaveDate_D);
		
		$LeaveDate_End_Y=$request->post('txt_LeaveDate_End_Y');
		$LeaveDate_End_M=$request->post('select_LeaveDate_End_M');
		$LeaveDate_End_D=$request->post('select_LeaveDate_End_D');
		$data['LeaveDate_End'] =(empty($LeaveDate_End_Y)?'0000':$LeaveDate_End_Y).'-'.(empty($LeaveDate_End_M)?'00':$LeaveDate_End_M).'-'.(empty($LeaveDate_End_D)?'00':$LeaveDate_End_D);
		
		$data['Late'] = $request->post('chkbox_Late',NULL);
		$data['Arrive_Time'] = $request->post('select_Arrive_Time')==''?NULL:$request->post('select_Arrive_Time');
		$data['Eat'] = $request->post('select_Eat')==''?NULL:$request->post('select_Eat');
		$data['Rest'] = $request->post('chkbox_Rest',NULL);
		$data['Other'] = $request->post('chkbox_Other',NULL);
		$data['Reason'] = $request->post('txt_Reason');
		
		$object = Validation::factory($data);
		
		$tableFileds = Cache::instance()->get('table_communication_fields');
		foreach ($data as $key => $val){
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
		
	}
	
	public function comm_Data(& $request){
		
		try {
			$table = Cache::instance()->get('table_communication');
			$data = self::Validation_comm($request);
			
			if($data->check()){
				//做事务处理
				DB::query(NULL, "BEGIN WORK")->execute();
					
				$values = $data->as_array();
				$comm_group = "";
				foreach($values['Child_Id'] as $key => $val){
					$thisVal = $values;
					$thisVal['Child_Id'] = $val;
			
					if($key!=0){
						$thisVal['comm_group'] = $comm_group;
					}
			
					$rst = parent::insert($table, $thisVal);
			
					if($rst==false){
						DB::query(NULL, "ROLLBACK")->execute();
						return false;
					}
			
					if($key==0){
						list($comm_group, $total_rows) = $rst;
						$rst = parent::update($table,array('comm_group'=>$comm_group),'ID',$comm_group);
						if($rst==false){
							DB::query(NULL, "ROLLBACK")->execute();
							return false;
						}
					}
				}
				
				$base_media_dir =  Kohana::$config->load('global.base_url')."/media/uploadfile/";
				if(array_key_exists('fileRand',$_GET)){
					$dir = $base_media_dir."comm/{$_GET['fileRand']}/";
					if(is_dir($dir)){
						rename($dir, $base_media_dir."comm/{$comm_group}/");
					}
				}
				
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}else{
				$errors =  $data->errors('post');
				Request::factory('postPrompt/postError')->post('errors',$errors)->post('url',URL::site('communication/comm').URL::query())->execute();
				return FALSE;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
			
		}
		
			
	}
	
	/**
	 * 
	 */
	public function comm_update($request)
	{
		try {
			$table = Cache::instance()->get('table_communication');
			$data = self::Validation_commUpdate($request);
			
			$values = $data->as_array();
			
			$rst = parent::update($table,$values, 'ID', $values['ID']);
			if($rst===FALSE){
				return FALSE;
			}else{
				return TRUE;
			}			
		} catch (Exception $e) {
			return FALSE;
		}
		
	}
	
	
	//根据特定key读取comm内容
	public function commList_selectByKey($key,$val,$time="" ){
		try {
			$table = Cache::instance()->get('table_communication');
			$table_base=Cache::instance()->get('table_child_1_base');
			$table_family=Cache::instance()->get('table_child_2_family');
			
			$sql = DB::select()->from($table)->where($key,'=',$val);
			
			if(!empty($time)){
				//如果是今天查询的话 未来请假的也显示
				if($time==date('Y-m-d')&&$key=="Rest"){
					$sql = $sql->and_where('LeaveDate_End','>=',$time);
				}else{
					$sql = $sql->and_where('LeaveDate','<=',$time)->and_where('LeaveDate_End','>=',$time);
				}
			}			
			//if(!empty($time)) $sql = $sql->and_where('LeaveDate','<=',$time)->and_where('LeaveDate_End','>=',$time);			
			$result = $sql->execute()->as_array();
						
			if(!empty($result)){
				foreach ($result as $key=>$val){																						
					$child_info=parent::selectByKey($table_base,'Child_Id',$val['Child_Id']);
					$family_info=parent::selectByKey($table_family,'Child_1_Base_ID',$child_info['0']['ID']);
					$tmp1 = empty($family_info)?array('GuardianName'=>''):array('GuardianName'=>$family_info['0']['Guardian1_FamilyName'].$family_info['0']['Guardian1_GivenName']);
					$tmp=array('Name'=>$child_info['0']['FamilyName'].$child_info['0']['GivenName'],
							'Class'=>$child_info['0']['Class']);
					$result[$key]=array_merge($val,$tmp,$tmp1);
				}
			}
			return $result;
		} catch (Exception $e) {
				echo $e->getMessage();
		}		
	}
	
	/**
	 * 查询这一天这个孩子是否有   【遅　刻】   和 【お休み】的情况
	 * @param unknown $Child_Id
	 * @return NULL
	 */
	public function childTodayComm($Child_Id)
	{
		try {
			$table = Cache::instance()->get('table_communication');	
			return DB::select()->from($table)
						->where('Child_Id','=',$Child_Id)
						->and_where_open()->where('Late','IS NOT',NULL)->or_where('Rest','IS NOT',NULL)->and_where_close()
						->and_where('LeaveDate','<=',date('Y-m-d'))->and_where('LeaveDate_End','>=',date('Y-m-d'))
						->order_by('Submit_Date','DESC')
						->limit(1)
						->execute()->current();			
		} catch (Exception $e) {
		}
	}
	
	
	/**
	 * 根据ID获取某条具体内容
	 * @param unknown $id
	 */
	public function getComm_Info($id){
		try {
			$table = Cache::instance()->get('table_communication');
			$result = parent::selectByKey($table, 'ID', $id);
			return empty($result)?'':$result[0];
			
		} catch (Exception $e) {
			
		}
	
	}
	
	
	/**
	 * 获取所有购买用品信息
	 */
	public function getGoodsInfo(){
		$table = Cache::instance()->get('table_master_goodscostset');
		$result = parent::select($table);
		return $result;
	}
	
	public function Validation_buyGoods($request)
	{
		$ID = $request->post('chkbox_ID');
		$goods_Name = $request->post('select_Goods_Name');
		$goods_Price = $request->post('txt_Goods_Price');
		$goods_Remark = $request->post('txt_Goods_Remark');
		
		$data_BuyGood=array();
		$valKey = 0;
		foreach ($ID as $key => $val){		
			foreach($goods_Name as $key_g=>$val_g){
				if(!empty($val_g)){				
					$data_BuyGood[$valKey]['Child_1_Base_ID']=$val;
					$data_BuyGood[$valKey]['Goods_Name']=$val_g;
					$data_BuyGood[$valKey]['Goods_Price']=$goods_Price[$key_g];
					$data_BuyGood[$valKey]['Goods_Remark']=$goods_Remark[$key_g];
					$data_BuyGood[$valKey]['Submit_Date']=date('Y-m-d H:i');
					$valKey += 1;
				}
			}		
		}
		$object = array();
		$tableFileds = Cache::instance()->get('table_buygoods_fields');
		
		
		foreach ($data_BuyGood as $key1 =>$val1){
			$object_temp = Validation::factory($val1);	
			foreach ($val1 as $key => $val){
				if($tableFileds[$key]['not_empty']) $object_temp = $object_temp->rule($key,'not_empty');
				if(count($tableFileds[$key]['Validation']))	$object_temp = $object_temp->rules($key,$tableFileds[$key]['Validation']);
			}
			$object[$key1]=$object_temp;
		}
	
		return $object;
	}
	
	
	/**
	 * 购入物品存储
	 */
	public function buyGoods_Data(& $request){
		
		try {
			$data = self::Validation_buyGoods($request);
			$table = Cache::instance()->get('table_buygoods');
			
			//做事务处理
			DB::query(NULL, "BEGIN WORK")->execute();
			
			foreach ($data as $key =>$val){
				if($val->check()){					
					$rst = parent::insert($table, $val->as_array());
					
					if($rst==false){
						DB::query(NULL, "ROLLBACK")->execute();
						return false;
					}
					
				}else{
					$errors =  $val->errors('post');
					Request::factory('postPrompt/postError')->post('errors',$errors)->post('url',URL::site('communication/buyGoods').URL::query())->execute();
					return FALSE;
				}				
			}
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			echo $e->getMessage();			
		}
		
	}
	
	
	/**
	 * 9-6 園児情報編集の申請
	 */
	public function Validation_application($request){
	
		$data['Child_Id'] = $request->post('chkbox_Child_Id');
		$data['Reason'] = $request->post('txt_Reason');
		$data['Submit_Date'] = date('Y-m-d H:i');
	
		$object = Validation::factory($data);
	
		$tableFileds = Cache::instance()->get('table_comm_application_fields');
		foreach ($data as $key => $val){
			if(in_array($key,array('ID','Child_Id'))) continue;
			if($tableFileds[$key]['not_empty']) $object = $object->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object = $object->rules($key,$tableFileds[$key]['Validation']);
		}
		return $object;
	} 
	
	public function application_Data(& $request){
		try {
			$table = Cache::instance()->get('table_comm_application');
			$data = self::Validation_application($request);
	
			if($data->check()){
				//做事务处理
				DB::query(NULL, "BEGIN WORK")->execute();
					
				$values = $data->as_array();
	
				$comm_group = "";
				foreach($values['Child_Id'] as $key => $val){
					$thisVal = $values;
					$thisVal['Child_Id'] = $val;
	
					if($key!=0){
						$thisVal['comm_group'] = $comm_group;
					}
					
					$rst = parent::insert($table, $thisVal);
	
					if($rst==false){
						DB::query(NULL, "ROLLBACK")->execute();
						return false;
					}
	
					if($key==0){
						list($comm_group, $total_rows) = $rst;
						$rst = parent::update($table,array('comm_group'=>$comm_group),'ID',$comm_group);
						if($rst==false){
							DB::query(NULL, "ROLLBACK")->execute();
							return false;
						}
					}
				}
	
				DB::query(NULL, "COMMIT")->execute();
				return TRUE;
			}else{
				$errors =  $data->errors('post');
				Request::factory('postPrompt/postError')->post('errors',$errors)->post('url',URL::site('communication/comm').URL::query())->execute();
				return FALSE;								
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * 获取申请内容
	 */
	public function getApplication($year=''){
		try {
			$table = Cache::instance()->get('table_comm_application');
			$table_base=Cache::instance()->get('table_child_1_base');
			$table_family=Cache::instance()->get('table_child_2_family');
				
			$sql = DB::select()->from($table);
				
			if(empty($year)){
				$rst = $sql->execute()->as_array();
			}else{
				$rst = $sql->where('Submit_Date','LIKE',$year.'%')->execute()->as_array();
			}
			//添加孩子和保护者信息
			if(!empty($rst)){
			
				foreach ($rst as $key =>$val){
					$child_Name=DB::select(array(DB::expr('CONCAT(`FamilyName`,`GivenName`)'),'Child_Name'))
									->from($table_base)->where('Child_Id','=',$val['Child_Id'])->execute()->get('Child_Name');
						
					$rst[$key]['Child_Name']=$child_Name;
						
					$ID=DB::select('ID')->from($table_base)->where('Child_Id','=',$val['Child_Id'])->execute()->get('ID');
						                                                                                 
					$guardian_Name=DB::select(array(DB::expr('CONCAT(`Guardian1_FamilyName`,`Guardian1_GivenName`)'),'Guardian_Name'))
										->from($table_family)->where('Child_1_Base_ID','=',$ID)->execute()->get('Guardian_Name');
					$rst[$key]['Guardian_Name']=$guardian_Name;
				}
			}
	
			return  $rst;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	
}