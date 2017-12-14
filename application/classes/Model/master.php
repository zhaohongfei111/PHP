<?php
class Model_master extends Model_DBCommon{	
	
	
	/**
	 * 验证处理系统参数
	 * @param unknown $request
	 */
	public function Validation_dataSet($request){
	
	//master_baseSet表
		$data_baseSet['Kindergarden_Name1'] = $request->post('txt_Kindergarden_Name1');
		$data_baseSet['Kindergarden_Name2'] = $request->post('txt_Kindergarden_Name2');
		$data_baseSet['Address_Area'] = $request->post('txt_Address_Area');
		$data_baseSet['Kindergarden_Address'] = $request->post('txt_Kindergarden_Address');
		$data_baseSet['Kindergarden_TEL'] = $request->post('txt_Kindergarden_TEL');
		$data_baseSet['Kindergarden_FAX'] = $request->post('txt_Kindergarden_FAX');
		$data_baseSet['Kindergarden_E_mail'] = $request->post('txt_Kindergarden_E_mail');
		$data_baseSet['Request_Remark'] = $request->post('txt_Request_Remark');
		$data_baseSet['BaseSet_Remark'] = $request->post('txt_BaseSet_Remark');

		$object_baseSet = Validation::factory($data_baseSet);
		$tableFileds = Cache::instance()->get('table_master_baseset_fields');
		foreach ($data_baseSet as $key => $val){
			if($tableFileds[$key]['not_empty']) $object_baseSet = $object_baseSet->rule($key,'not_empty');
			if(count($tableFileds[$key]['Validation']))	$object_baseSet = $object_baseSet->rules($key,$tableFileds[$key]['Validation']);
		}
		
	//dataSet表，时间数据设定
		$data_dataSet['Standard_Begin1'] = $request->post('select_Standard_Begin1');
		$data_dataSet['Standard_End1'] = $request->post('select_Standard_End1');
		$data_dataSet['Standard_Begin2'] = $request->post('select_Standard_Begin2');
		$data_dataSet['Standard_End2'] = $request->post('select_Standard_End2');
		$data_dataSet['Education_Begin'] = $request->post('select_Education_Begin');
		$data_dataSet['Education_End'] = $request->post('select_Education_End');
		$data_dataSet['ExtendGuar_Begin'] = $request->post('select_ExtendGuar_Begin');
		$data_dataSet['ExtendGuar_End'] = $request->post('select_ExtendGuar_End');
		$data_dataSet['Support_Begin1'] = $request->post('select_Support_Begin1');
		$data_dataSet['Support_End1'] = $request->post('select_Support_End1');
		$data_dataSet['Support_Begin2'] = $request->post('select_Support_Begin2');
		$data_dataSet['Support_End2'] = $request->post('select_Support_End2');
		$data_dataSet['CareStandard_Begin'] = $request->post('select_CareStandard_Begin');
		$data_dataSet['CareStandard_End'] = $request->post('select_CareStandard_End');
		$data_dataSet['CareShort_Begin'] = $request->post('select_CareShort_Begin');
		$data_dataSet['CareShort_End'] = $request->post('select_CareShort_End');
		$data_dataSet['Activities_Begin'] = $request->post('select_Activities_Begin');
		$data_dataSet['Activities_End'] = $request->post('select_Activities_End');
		$data_dataSet['Short_Begin1'] = $request->post('select_Short_Begin1');
		$data_dataSet['Short_End1'] = $request->post('select_Short_End1');
		$data_dataSet['Short_Begin2'] = $request->post('select_Short_Begin2');
		$data_dataSet['Short_End2'] = $request->post('select_Short_End2');
		
		$object_dataSet = Validation::factory($data_dataSet);
		$tableFileds_dataSet = Cache::instance()->get('table_master_dataset_fields');
		foreach ($data_dataSet as $key => $val){
			if($tableFileds_dataSet[$key]['not_empty']) $object_dataSet = $object_dataSet->rule($key,'not_empty');
			if(count($tableFileds_dataSet[$key]['Validation']))	$object_dataSet = $object_dataSet->rules($key,$tableFileds_dataSet[$key]['Validation']);
		}
		
	//master_activitiesSet表
		$data_activitiesSet=array();
		$key = 1;
		for($i=1;$i<6;$i++){
			if($request->post('txt_Activity_Name_'.$i)=='') continue;
			$data_activitiesSet[$i]['ID'] = $i;
			$data_activitiesSet[$i]['Activity_Checked'] = $request->post('chk_Activity_Checked_'.$i);
			$data_activitiesSet[$i]['Activity_Name'] = $request->post('txt_Activity_Name_'.$i);
			$data_activitiesSet[$i]['Activity_Week'] = $request->post('select_Activity_Week_'.$i);
			$data_activitiesSet[$i]['Activity_Price'] =str_replace(',', '', $request->post('txt_Activity_Price_'.$i));
			$data_activitiesSet[$i]['Activity_Cost'] =str_replace(',', '',  $request->post('txt_Activity_Cost_'.$i));
			$key++;
		}
		
		
		$tableFileds_activitiesSet = Cache::instance()->get('table_master_activitiesset_fields');
		foreach ($data_activitiesSet as $key1 =>$val1){
			$object_actvitySet = Validation::factory($val1);
			foreach ($val1 as $key => $val){
				if($tableFileds_activitiesSet[$key]['not_empty']) $object_actvitySet = $object_actvitySet->rule($key,'not_empty');
				if(count($tableFileds_activitiesSet[$key]['Validation']))	$object_actvitySet = $object_actvitySet->rules($key,$tableFileds_activitiesSet[$key]['Validation']);
			}
		}
		
	//master_costSet_1表，一号认定保育料の設定
		$data_costSet_1=array();
		for($i=1;$i<15;$i++){
			$data_costSet_1[$i]['Project'] = $i;
			$data_costSet_1[$i]['Number'] =str_replace(',', '', $request->post('txt_Number_'.$i)) ;
			$data_costSet_1[$i]['Condition'] =str_replace(',', '', $request->post('select_Condition_'.$i));
			$data_costSet_1[$i]['SetNumber'] =str_replace(',', '', $request->post('txt_SetNumber_'.$i));
		}
		
		$tableFileds_costSet_1 = Cache::instance()->get('table_master_costset_1_fields');
		foreach ($data_costSet_1 as $key1 =>$val1){
			$object_costSet_1 = Validation::factory($val1);
			foreach ($val1 as $key => $val){
				if($tableFileds_costSet_1[$key]['not_empty']) $object_costSet_1 = $object_costSet_1->rule($key,'not_empty');
				if(count($tableFileds_costSet_1[$key]['Validation']))	$object_costSet_1 = $object_costSet_1->rules($key,$tableFileds_costSet_1[$key]['Validation']);
			}
		}
		
		
	//master_costSet_23表，2,3号认定保育料の設定
		$parameter=Kohana::$config->load('parameter');
		$projects=$parameter['PROJECT'];
		$data_costSet_23=array();
		for($i=1;$i<20;$i++){
			$data_costSet_23[$projects[$i]]['Project'] =$projects[$i];
			$data_costSet_23[$projects[$i]]['FromPrice'] =str_replace(',', '', $request->post('txt_FromPrice_'.$projects[$i]));
			$data_costSet_23[$projects[$i]]['EndPrice'] =str_replace(',', '', $request->post('txt_EndPrice_'.$projects[$i]));
			$data_costSet_23[$projects[$i]]['Condition'] = $request->post('select_Condition_'.$projects[$i]);
			$data_costSet_23[$projects[$i]]['3_Standard'] =str_replace(',', '', $request->post('txt_3_Standard_'.$projects[$i]));
			$data_costSet_23[$projects[$i]]['3_Short'] =str_replace(',', '', $request->post('txt_3_Short_'.$projects[$i]));
			$data_costSet_23[$projects[$i]]['2_Standard'] =str_replace(',', '', $request->post('txt_2_Standard_'.$projects[$i]));
			$data_costSet_23[$projects[$i]]['2_Short'] =str_replace(',', '', $request->post('txt_2_Short_'.$projects[$i]));
		}
		
		$tableFileds_costSet_23 = Cache::instance()->get('table_master_costset_23_fields');
		foreach ($data_costSet_23 as $key1 =>$val1){
			$object_costSet_23 = Validation::factory($val1);
			foreach ($val1 as $key => $val){
				if($tableFileds_costSet_23[$key]['not_empty']) $object_costSet_23 = $object_costSet_23->rule($key,'not_empty');
				if(count($tableFileds_costSet_23[$key]['Validation']))	$object_costSet_23 = $object_costSet_23->rules($key,$tableFileds_costSet_23[$key]['Validation']);
			}
		}
		
		
		//master_classSet表
		$data_classSet=array();
		$key = 1;
		for($i=1;$i<11;$i++){
			if($request->post('txt_Class_Name_'.$i)=='') continue;
			$data_classSet[$key]['ID'] = 'C'.$key;
			$data_classSet[$key]['Class_Checked'] = $request->post('chk_Class_Checked_'.$i);
			$data_classSet[$key]['Class_Name'] = $request->post('txt_Class_Name_'.$i);
			$activities = $request->post('chk_Activities_'.$i);
			$data_classSet[$key]['Activities']=empty($activities)?NULL:implode(';', $activities);
			$data_classSet[$key]['Bus_Come'] = $request->post('chk_Bus_Come');
			$data_classSet[$key]['Bus_Go'] = $request->post('chk_Bus_Go');
			$data_classSet[$key]['Class_Remark'] = $request->post('txt_Class_Remark_'.$i);
			$data_classSet[$key]['Sort'] = $key;
			$key++;
		}
		
		$tableFileds_classSet = Cache::instance()->get('table_master_classset_fields');
		foreach ($data_classSet as $key1 =>$val1){
			$object_classSet = Validation::factory($val1);
			foreach ($val1 as $key => $val){
				if($tableFileds_classSet[$key]['not_empty']) $object_classSet = $object_classSet->rule($key,'not_empty');
				if(count($tableFileds_classSet[$key]['Validation']))	$object_classSet = $object_classSet->rules($key,$tableFileds_classSet[$key]['Validation']);
			}
		}
		
		//master_OverCostSet
		$data_overCostSet['Recog_1_Select'] = $request->post('chk_Recog_1_Select');
		$data_overCostSet['Recog_1_DayPrice'] =str_replace(',', '', $request->post('txt_Recog_1_DayPrice'));		
		$data_overCostSet['Recog_1_DayPrice_Remark'] = $request->post('txt_Recog_1_DayPrice_Remark');
		$data_overCostSet['Recog_1_MonPrice'] =str_replace(',', '', $request->post('txt_Recog_1_MonPrice'));
		$data_overCostSet['Recog_1_MonPrice_Remark'] = $request->post('txt_Recog_1_MonPrice_Remark');
		$data_overCostSet['Recog_1_Rata'] = $request->post('txt_Recog_1_Rata');
		$data_overCostSet['Recog_1_Rata_Remark'] = $request->post('txt_Recog_1_Rata_Remark');
		$data_overCostSet['Recog_1_Limit'] =str_replace(',', '', $request->post('txt_Recog_1_Limit'));
		$data_overCostSet['Recog_1_Limit_Remark'] = $request->post('txt_Recog_1_Limit_Remark');
		$data_overCostSet['Recog_2_3_Select'] = $request->post('chk_Recog_2_3_Select');		
		$data_overCostSet['Recog_2_3_DayPrice'] =str_replace(',', '', $request->post('txt_Recog_2_3_DayPrice'));
		$data_overCostSet['Recog_2_3_DayPrice_Remark'] = $request->post('txt_Recog_2_3_DayPrice_Remark');
		$data_overCostSet['Recog_2_3_MonPrice'] =str_replace(',', '', $request->post('txt_Recog_2_3_MonPrice'));
		$data_overCostSet['Recog_2_3_MonPrice_Remark'] = $request->post('txt_Recog_2_3_MonPrice_Remark');
		$data_overCostSet['Recog_2_3_Rata'] = $request->post('txt_Recog_2_3_Rata');
		$data_overCostSet['Recog_2_3_Rata_Remark'] = $request->post('txt_Recog_2_3_Rata_Remark');
		$data_overCostSet['Recog_2_3_Limit'] =str_replace(',', '', $request->post('txt_Recog_2_3_Limit'));
		$data_overCostSet['Recog_2_3_Limit_Remark'] = $request->post('txt_Recog_2_3_Limit_Remark');
		
		$tableFileds_overCostSet= Cache::instance()->get('table_master_overcostset_fields');
		$object_overCostSet = Validation::factory($data_overCostSet);
		foreach ($data_overCostSet as $key => $val){
			if($tableFileds_overCostSet[$key]['not_empty']) $object_overCostSet = $object_overCostSet->rule($key,'not_empty');
			if(count($tableFileds_overCostSet[$key]['Validation']))	$object_overCostSet = $object_overCostSet->rules($key,$tableFileds_overCostSet[$key]['Validation']);
		}

		
		//master_projectCostSet
		$data_ProjectName=$request->post('txt_Project_Name');
		$data_Recog_1= $request->post('txt_Recog_1');
		$data_Recog_2=$request->post('txt_Recog_2');
		$data_Recog_3= $request->post('txt_Recog_3');
		$data_ProjectRemark=$request->post('txt_Project_Remark');
		$data_projectCostSet=array();
		if(!empty($data_ProjectName)){
			foreach ($data_ProjectName as $key =>$val){
				if($val!=''){
					$data_projectCostSet[$key]['Project_Name']=$data_ProjectName[$key];
					$data_projectCostSet[$key]['Recog_1']=str_replace(',', '', $data_Recog_1[$key]);
					$data_projectCostSet[$key]['Recog_2']=str_replace(',', '', $data_Recog_2[$key]);
					$data_projectCostSet[$key]['Recog_3']=str_replace(',', '', $data_Recog_3[$key]);
					$data_projectCostSet[$key]['Project_Remark']=$data_ProjectRemark[$key];
				}
			}
		}
		
		//master_goodsCostSet
		$data_GoodsName=$request->post('txt_Goods_Name');
		$data_GoodsPrice=$request->post('txt_Goods_Price');
		$data_GoodsRemark=$request->post('txt_Goods_Remark');
		$data_GoodsPicture=$request->post('file_Goods_Picture');
		$data_goodsCostSet=array();
		if(!empty($data_GoodsName)){
			foreach ($data_GoodsName as $key=>$val){
				if($val!=''){
					$data_goodsCostSet[$key]['Goods_Name']=$data_GoodsName[$key];
					$data_goodsCostSet[$key]['Goods_Price']=str_replace(',', '', $data_GoodsPrice[$key]);
					$data_goodsCostSet[$key]['Goods_Remark']=$data_GoodsRemark[$key];
					$data_goodsCostSet[$key]['Goods_Picture']=$data_GoodsPicture[$key];
				}
			}
		}
		
		//master_eatCostSet
		$data_eatCostSet['Recog_1_Price'] =str_replace(',', '', $request->post('txt_Recog_1_Price'));
		$data_eatCostSet['Recog_2_Price'] =str_replace(',', '', $request->post('txt_Recog_2_Price'));
		$data_eatCostSet['Recog_3_Price'] =str_replace(',', '', $request->post('txt_Recog_3_Price'));
		$data_eatCostSet['EatCost_Remark'] = $request->post('txt_EatCost_Remark');
		
		//master_kidsLessSet
		$data_kidsLessSet['Less2_Recog1_Rata'] = $request->post('txt_Less2_Recog1_Rata');
		$data_kidsLessSet['Less2_Recog1_Round'] = $request->post('select_Less2_Recog1_Round');
		$data_kidsLessSet['Less2_Recog2_Rata'] = $request->post('txt_Less2_Recog2_Rata');
		$data_kidsLessSet['Less2_Recog2_Round'] = $request->post('select_Less2_Recog2_Round');
		$data_kidsLessSet['Less2_Recog3_Rata'] = $request->post('txt_Less2_Recog3_Rata');
		$data_kidsLessSet['Less2_Recog3_Round'] = $request->post('select_Less2_Recog3_Round');
		$data_kidsLessSet['Less2_Remark'] = $request->post('txt_Less2_Remark');
		$data_kidsLessSet['Less3_Recog1_Rata'] = $request->post('txt_Less3_Recog1_Rata');
		$data_kidsLessSet['Less3_Recog1_Round'] = $request->post('select_Less3_Recog1_Round');
		$data_kidsLessSet['Less3_Recog2_Rata'] = $request->post('txt_Less3_Recog2_Rata');
		$data_kidsLessSet['Less3_Recog2_Round'] = $request->post('select_Less3_Recog2_Round');
		$data_kidsLessSet['Less3_Recog3_Rata'] = $request->post('txt_Less3_Recog3_Rata');
		$data_kidsLessSet['Less3_Recog3_Round'] = $request->post('select_Less3_Recog3_Round');
		$data_kidsLessSet['Less3_Remark'] = $request->post('txt_Less3_Remark');
		
		//master_guardianCon
		$data_guardianCon['Acceptance_Data']=$request->post('txt_Acceptance_Data');
		$data_guardianCon['Acceptance_Remark']=$request->post('txt_Acceptance_Remark');
		
		//master_temporary
		$data_temporary['BasedAddress'] 		= $request->post('txt_BasedAddress');
		$data_temporary['BasedName']			= $request->post('txt_BasedName');
		$data_temporary['RepresentativeOffice'] = $request->post('txt_RepresentativeOffice');
		$data_temporary['RepresentativeName'] 	= $request->post('txt_RepresentativeName');
		$data_temporary['ReportDestination'] 	= $request->post('txt_ReportDestination');
		$data_temporary['ReportRemark'] 	= $request->post('txt_ReportRemark');
		
		//master_calendar
		$data_calendar['Reign_Title'] =$request->post('txt_Reign_Title');
		$data_calendar['Calendar_Year'] = $request->post('txt_Calendar_Year');
		
		
		
		return array('baseSet'=>$object_baseSet,'dataSet'=>$object_dataSet,'activities'=>$data_activitiesSet,'costSet_1'=>$data_costSet_1,
					'costSet_23'=>$data_costSet_23,'classSet'=>$data_classSet,'overCostSet'=>$object_overCostSet,'projectCostSet'=>$data_projectCostSet,
					'goodsCostSet'=>$data_goodsCostSet,'eatCostSet'=>$data_eatCostSet,'kidsLessSet'=>$data_kidsLessSet,'guardianCon'=>$data_guardianCon,
					'temporary'=>$data_temporary,'calendar'=>$data_calendar);
	}
	
	
	public function Validation_file()
	{
		$object = Validation::factory($_FILES);
		//验证图片格式

		return $object->rule('logo','Upload::type',array(':value',array('jpg','jpeg')))
					->rule('logo','Upload::size',array(':value','6M'))
					->rule('electronicSeal','Upload::type',array(':value',array('jpg','jpeg')))
					->rule('electronicSeal','Upload::size',array(':value','6M'));
		
	}
	
	
	/**
	 * 10-5参数录入
	 * @param unknown $request
	 */
	public function dataSet_Data(& $request){
		
		try {
			
			$images = self::Validation_file($request);
			if($images->check()){				
				$base_dir =  Kohana::$config->load('global.base_url')."/media/images/";
				$imagesArr = $images->as_array();
				if($imagesArr['logo']['error']==0){
					//生成一张160px的像素的图片
					$image = Image::factory($_FILES['logo']['tmp_name']);
					$image	->resize(392, 66, Image::AUTO)->save($base_dir."logo.jpg");
				}
			
				if($imagesArr['electronicSeal']['error']==0){
					//生成一张160px的像素的图片
					$image = Image::factory($_FILES['electronicSeal']['tmp_name']);
					$image	->resize(309, 121, Image::AUTO)->save($base_dir."s02.jpg");
				}
			}
			
			
			//所有数据
			$data=self::Validation_dataSet($request);
			
			DB::query(NULL, "BEGIN WORK")->execute();
			
			//master_baseSet表
			$table_baseSet=Cache::instance()->get('table_master_baseset');
			$data_baseSet = $data['baseSet'];
			if($data_baseSet->check()){
				$rst = parent::deleteAll($table_baseSet);
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
				$rst = parent::insert($table_baseSet, $data_baseSet->as_array());
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}				
			}
			
			//master_dataSet表
			$table_dataSet=Cache::instance()->get('table_master_dataset');
			$data_dataSet = $data['dataSet'];
			if($data_dataSet->check()){
				$rst = parent::deleteAll($table_dataSet);
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
				$rst = parent::insert($table_dataSet, $data_dataSet->as_array());
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_activitiesSet表
			$table_activitiesSet=Cache::instance()->get('table_master_activitiesset');
			$data_activitiesSet=$data['activities'];
			$rst = parent::deleteAll($table_activitiesSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}			
			if(!empty($data_activitiesSet)){
				$sql = DB::insert($table_activitiesSet,array_keys($data_activitiesSet[1]));
				foreach($data_activitiesSet as $key => $val){
					$sql = $sql->values(array_values($val));
				}
				list($insert_id,$total_rows) = $sql->execute();
				if(empty($total_rows)){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_costSet_1表
			$table_costSet_1=Cache::instance()->get('table_master_costset_1');
			$data_costSet_1=$data['costSet_1'];
			$rst = parent::deleteAll($table_costSet_1);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			for($i=1;$i<15;$i++){
				$rst = parent::insert($table_costSet_1, $data_costSet_1[$i]);
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_costSet_23表
			$parameter=Kohana::$config->load('parameter');
			$projects=$parameter['PROJECT'];
			
			$table_costSet_23=Cache::instance()->get('table_master_costset_23');
			$data_costSet_23=$data['costSet_23'];
			$rst = parent::deleteAll($table_costSet_23);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			for($i=1;$i<20;$i++){
				$rst = parent::insert($table_costSet_23, $data_costSet_23[$projects[$i]]);
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_classSet表
			$table_classSet=Cache::instance()->get('table_master_classset');
			$data_classSet=$data['classSet'];
			$rst = parent::deleteAll($table_classSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			if(!empty($data_classSet)){
				$sql = DB::insert($table_classSet,array_keys($data_classSet[1]));
				foreach($data_classSet as $key => $val){
					$sql = $sql->values(array_values($val));
				}
				list($insert_id,$total_rows) = $sql->execute();
				if(empty($total_rows)){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_overCostSet表
			$table_overCostSet=Cache::instance()->get('table_master_overcostset');
			$data_overCostSet=$data['overCostSet'];
			$rst = parent::deleteAll($table_overCostSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			if($data_overCostSet->check()){
				$rst = parent::insert($table_overCostSet, $data_overCostSet->as_array());
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_projectCostSet表
			$table_projectCostSet=Cache::instance()->get('table_master_projectcostset');
			$data_projectCostSet=$data['projectCostSet'];
			$rst = parent::deleteAll($table_projectCostSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			foreach ($data_projectCostSet as $key=>$val){
				$rst = parent::insert($table_projectCostSet,$val);
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			
			//master_goodsCostSet
			$table_goodsCostSet=Cache::instance()->get('table_master_goodscostset');
			$data_goodsCostSet=$data['goodsCostSet'];
			$rst = parent::deleteAll($table_goodsCostSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$hasGoodsPic = array();
			foreach ($data_goodsCostSet as $key=>$val){
				$rst = parent::insert($table_goodsCostSet,$val);
				$hasGoodsPic = array_merge($hasGoodsPic,explode(';',$val['Goods_Picture']));
				if($rst===false){
					DB::query(NULL, "ROLLBACK")->execute();
					return false;
				}
			}
			$hasGoodsPic = array_filter($hasGoodsPic);
			
			//master_eatCostSet
			$table_eatCostSet = Cache::instance()->get('table_master_eatcostset');
			$data_eatCostSet=$data['eatCostSet'];
			$rst = parent::deleteAll($table_eatCostSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$rst = parent::insert($table_eatCostSet,$data_eatCostSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			
			//master_kidsLessSet
			$table_kidsLessSet=Cache::instance()->get('table_master_kidslessset');
			$data_kidsLessSet=$data['kidsLessSet'];
			$rst = parent::deleteAll($table_kidsLessSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$rst =parent::insert($table_kidsLessSet,$data_kidsLessSet);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			
			//master_guardianCon
			$table_guardianCon=Cache::instance()->get('table_master_guardiancon');
			$data_guardianCon=$data['guardianCon'];
			$rst = parent::deleteAll($table_guardianCon);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$rst = parent::insert($table_guardianCon,$data_guardianCon);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			
			//master_temporary
			$table_temporary=Cache::instance()->get('table_master_temporary');
			$data_temporary=$data['temporary'];
			$rst = parent::deleteAll($table_temporary);
			

			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$rst = parent::insert($table_temporary,$data_temporary);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}

			//master_calendar
			$table_calendar=Cache::instance()->get('table_master_calendar');
			$data_calendar=$data['calendar'];
			$rst = parent::deleteAll($table_calendar);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			$rst = parent::insert($table_calendar,$data_calendar);
			if($rst===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
			
			
			$this->clearGoodsImg($hasGoodsPic);
			
			DB::query(NULL, "COMMIT")->execute();
			//return 'ww';
			return TRUE;
		} catch (Exception $e) {			
			echo $e->getMessage();
		}
	}
	
	
	private function clearGoodsImg($hasGoodsPic){
		$base_dir = Kohana::$config->load('global.base_url')."/media/uploadfile/goodsImages/";
		//获取路径下面的所有的文件
		$allFileList = Kohana::list_files(NULL, array(Kohana::$config->load('global.base_url')."/media/uploadfile/goodsImages/"));
		$allFileList = array_keys($allFileList);
		
		$delPic = array_diff($allFileList, $hasGoodsPic);
		foreach($delPic as $key => $val){
			unlink($base_dir.$val);
		}
	}
	
	
	/**
	 * 获取master各个表中数据
	 * @param unknown $table
	 */
	
	public function getData($table){
		$result=parent::select($table);
		return $result;
	}
	
	/**
	 * 获取班级的列表
	 */
	public function getClassList(){
		try {
			$table_classSet=Cache::instance()->get('table_master_classset');
			return DB::select()->from($table_classSet)->order_by('Sort','ASC')->execute()->as_array();
		} catch (Exception $e) {
		}
	}
	
	/**
	 * 获取有效幼儿园名
	 */
	public function getKindergardenName()
	{
		try {
			$table_baseSet=Cache::instance()->get('table_master_baseset');
			$list = DB::select()->from($table_baseSet)->execute()->as_array();
			return empty($list)?array():$list[0];
		} catch (Exception $e) {
		}
	}
	
	/**
	 * 获取有效的班级名称
	 */
	public function getEffectiveClass()
	{
		try {
			$table_classSet=Cache::instance()->get('table_master_classset');
			$list = DB::select()->from($table_classSet)->where('Class_Checked','=',1)->order_by('Sort','ASC')->execute()->as_array();
			$result = array();
			foreach ($list as $key => $val){
				$result[$val['ID']] = $val['Class_Name'];
			}
			return $result;
		} catch (Exception $e) {
		}
	}
	
	/**
	 * 获取有效的班级名称
	 */
	public function getEffectiveClassForActivities()
	{
		try {
			$table_classSet=Cache::instance()->get('table_master_classset');
			$list = DB::select()->from($table_classSet)->where('Class_Checked','=',1)->and_where('Activities','IS NOT',NULL)->order_by('Sort','ASC')->execute()->as_array();
			$result = array();
			foreach ($list as $key => $val){
				$result[$val['ID']] = $val['Class_Name'];
			}
			return $result;
		} catch (Exception $e) {
		}
	}
	
	
	/**
	 * 获取有效的課外活動設定
	 */
	public function getEffectiveActivities()
	{
		try {
			$table_activitiesSet = Cache::instance()->get('table_master_activitiesset');
			$list = DB::select()->from($table_activitiesSet)->where('Activity_Checked','=',1)->order_by('ID','ASC')->execute()->as_array();
			$result = array();
			foreach ($list as $key => $val){
				$result[$val['ID']] = $val['Activity_Name'];
			}
			return $result;
		} catch (Exception $e) {
		}
	}
	
	/**
	 * administration/index那个小圆点使用 
	 * 显示有几条信息
	 */
	public function getConfirmDataNum(){
		try {
			$table=Cache::instance()->get('table_buygoods');
			return DB::select(DB::expr("count(`ID`) AS `num`"))->from($table)->where('Confirmed','=',NULL)->execute()->get("num");			
		}catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	
	/**
	 * 获取待确认buyGoods数据
	 * @return Ambigous <multitype:, multitype:unknown NULL >
	 */
	public function getConfirmData($data,$current_Year=''){
		try {
			$table=Cache::instance()->get('table_buygoods');
			$sql = DB::select()->from($table)->where('Confirmed','=',$data);
			
			if(empty($current_Year)){
				$rst = $sql->execute()->as_array();
			}else{
				$rst = $sql->and_where('Submit_Date','LIKE',$current_Year.'%')->execute()->as_array();
			}
			return  $rst;
		} catch (Exception $e) {
			echo $e->getMessage();
		}		
	}
	
	
	public function confirmed(& $request){
		try {
			$table=Cache::instance()->get('table_buygoods');
			$data=$request->post('chk_Confirmed');
			if(!empty($data)){
				DB::update($table)->set(array('Confirmed'=>'1','Confirm_Date'=>date('Y-m-d H:i')))->where('ID','IN',$data)->execute();				
				return  true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			return false;
		}				
	}
	
	
	/**
	 * 10-8和10-9获取在园中和尚未入园学生列表信息
	 * @return Ambigous <unknown, multitype:, multitype:unknown NULL >
	 */
	public function getList($status='in'){
		try {
			$table = Cache::instance()->get('table_child_1_base');
			$child_Info = DB::select()->from($table)->where('LeaveDate','=','0000-00-00')->or_where('LeaveDate','>',date('Y-m-d'))->order_by('FamilyName_Spell','ASC')->execute()->as_array();
			$model_child = Model::factory('child');
			$in_List=array();
			$not_List=array();
			foreach ($child_Info as $key => $val){
				$recog_Info = $model_child->getChildRecog($val['ID']);
				if(!is_array($recog_Info))  $recog_Info = array('Recog_ID'=>'','Recog_Type'=>'','Recog_Data'=>'','Recog_Project'=>'');
				$child_Info[$key]=array_merge($val,$recog_Info);
				if($val['EnterDate']<=date('Y-m-d')){
					array_push($in_List, $child_Info[$key]);
				}else{
					array_push($not_List, $child_Info[$key]);
				}
			}
			if($status=='in'){
				return $in_List;
			}
			if($status=='not'){
				return $not_List;
			}else{
				return array();
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	
	/**
	 * 认定分区收费项目的选择保存（10-8和10-9）
	 * @param unknown $request
	 * @return boolean
	 */
	public function recogProject_Insert(& $request){
		$data=$request->post('select_Recog_project');
		$table=Cache::instance()->get('table_child_recog');
	
		DB::query(NULL, "BEGIN WORK")->execute();
	
		foreach ($data as $key=>$val){
			$result=parent::update($table, array('Recog_Project'=>$val), 'Recog_ID', $key);
			if($result===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
		}
		DB::query(NULL, "COMMIT")->execute();
		return true;
	}
	
	
	/**
	 * 公告板信息储存（Excel 10-10）
	 */
	public function noticeBoard_Insert(& $request){		
		try {			
			$data['ToWorker']=$request->post('txt_ToWorker');
			$data['ToGuardian']=$request->post('txt_ToGuardian');
			$data['Board_Date']=date('Y-m-d H:i:s');
			
			$table=Cache::instance()->get('table_master_noticeboard');
			$rst = parent::insert($table, $data);
			
			if($rst===FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
			
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * 获取公告板内容
	 */
	public function getNoticeBoard(){
		try {
			$table=Cache::instance()->get('table_master_noticeboard');
			return DB::select()->from($table)->order_by('ID','DESC')->limit(1)->execute()->current();			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	
	
	
	/**
	 * 10-15保存认定分区设定
	 */
	public function recogSet_Insert(& $request){
		$ID=$request->post('ID');
		$Recog_Type=$request->post('select_Recog_Type');
		$Recog_Date_Y=$request->post('txt_recog_date_Y');
		$Recog_Date_M=$request->post('select_recog_date_M');
		$Recog_Date_D=$request->post('select_recog_date_D');
		$data=array();
		if(!empty($ID)){
			foreach ($ID as $key =>$val){
				$data[$key]['Recog_Type']=$Recog_Type[$key];
				$data[$key]['Recog_Date']=$Recog_Date_Y[$key].'-'.$Recog_Date_M[$key].'-'.$Recog_Date_D[$key];
				$data[$key]['Child_1_Base_ID']=$val;
			}
				
			$table=Cache::instance()->get('table_child_recog');
	
			DB::query(NULL, "BEGIN WORK")->execute();
			foreach ($data as $key=>$val){
				//判断数据是否发生变动
				$recog_Info = Model::factory('child')->getChildRecog($ID[$key]);
				if($recog_Info['Recog_Type']!=$val['Recog_Type']||$recog_Info['Recog_Date']!=$val['Recog_Date']){
					$result=parent::insert($table, $val);
					if($result===false){
						DB::query(NULL, "ROLLBACK")->execute();
						return false;
					}
				}					
			}
			DB::query(NULL, "COMMIT")->execute();
		}
		return true;
	}
	
	/**
	 * 考勤机信息录入
	 * @param unknown $request
	 */
	public function machine_Insert(& $request){
	
		$table=Cache::instance()->get('table_machine_info');
		
		$Machine_Name=$request->post('txt_Machine_Name');
		$Machine_Address=$request->post('txt_Machine_Address');
		$Machine_IP=$request->post('txt_Machine_IP');
		$Machine_Port=$request->post('txt_Machine_Port');
	
		$data=array();
		if(!empty($Machine_Name)){
			foreach ($Machine_Name as $key =>$val){
				if($val!=''){
					$data[$key]['Machine_Name']=$val;
					$data[$key]['Machine_Address']=$Machine_Address[$key];
					$data[$key]['Machine_IP']=$Machine_IP[$key];
					$data[$key]['Machine_Port']=$Machine_Port[$key];
				}
			}
		}
	
		DB::query(NULL, "BEGIN WORK")->execute();
	
		$rst = parent::deleteAll($table);
		if($rst===false){
			DB::query(NULL, "ROLLBACK")->execute();
			return false;
		}
	
		foreach ($data as $key =>$val){
			$rst1 = parent::insert($table,$val);
			if($rst1===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
		}
		DB::query(NULL, "COMMIT")->execute();
	
		return true;
	}
	
	/**
	 * 获取考勤机数据信息
	 */
	public function getMachineInfo(){
		$table=Cache::instance()->get('table_machine_info');
		$result=parent::select($table);
		return $result;	
	}
	
	/**
	 * capital番号保存（10-18)
	 * @param unknown $request
	 * @return boolean
	 */
	public function capitalSet_Insert(& $request){
		$data=$request->post('txt_Capital_ID');
		$table=Cache::instance()->get('table_child_1_base');
		DB::query(NULL, "BEGIN WORK")->execute();
	
		foreach ($data as $key=>$val){
			$result=parent::update($table, array('Capital_ID'=>$val), 'ID', $key);
			if($result===false){
				DB::query(NULL, "ROLLBACK")->execute();
				return false;
			}
		}
		DB::query(NULL, "COMMIT")->execute();
		return true;
	}
	
	/**
	 * (22-1)全園児請求一覧  数据整合
	 * @param unknown $yearMon
	 * @return unknown
	 */
	public function getInvoiceAll($yearMon){
		
		$model_list=Model::factory('list');
		$model_child = Model::factory('child');
		//获取孩子基本信息
		$child_Info=$model_list->getList();
		foreach ($child_Info as $key => $val){
			//读取已存请求书信息
			$invoiceInfo	=	$model_child->getInvoice($val['ID'],$yearMon);//空array
			
			$buyGoodsInfo	=	$model_child->getBuyGoodsInfo($val['ID'],$yearMon);//空array
			$monCost		=	$model_child->getMonCost($val['ID'],$yearMon);//字符
			$overCost		=	$model_child->getOverCost($val['ID'],$monCost,$yearMon);//字符
			$extraInfo		=	$model_child->getExtraCost($val['ID'],$yearMon); //预保育数字和其他项目array
			$table_activitiesSet=Cache::instance()->get('table_master_activitiesset');
			$activitiesSet = self::getData($table_activitiesSet);
			
			//将信息添加到孩子信息中
			$child_Info[$key]['invoiceInfo']  =  $invoiceInfo;
			$child_Info[$key]['buyGoodsInfo'] =  $buyGoodsInfo;
			$child_Info[$key]['monCost']      =  $monCost;
			$child_Info[$key]['overCost']     =  $overCost;
			$child_Info[$key]['extraInfo']    =  $extraInfo;	
			$child_Info[$key]['activities']   =  $activitiesSet;
							
		}
		
		return $child_Info;		
	}
	
	/**
	 * 全園児請求一覧 更新或新规
	 * @param unknown $request
	 * @return boolean
	 */
	public function invoiceAll_Insert(& $request){
				
		$para=Kohana::$config->load('parameter');
		
		$IDs=$request->post('hidden_ID');
		$yearMon=$request->post('yearMon');
		$Child_Name=$request->post('hidden_Name');
		
		
		$Base_MonCost=str_replace(',', '', $request->post('txt_Base_MonCost'));
		$Base_MonCost_Remark=$request->post('txt_Base_MonCost_Remark');
		$Base_OverCost=str_replace(',', '',$request->post('txt_Base_OverCost'));
		$Base_OverCost_Remark = $request->post('txt_Base_OverCost_Remark');
		$Base_ProjectCost =str_replace(',', '', $request->post('txt_Base_ProjectCost'));	
		
		$Base_Projects_Name=$para['INVOICE_PROJECTS'];
		$Base_Projects_Cost=str_replace(',', '',$request->post('txt_Base_Projects_Cost'));
		$Base_Projects_Remark=$request->post('txt_Base_Projects_Remark');
		
		$Activity_PricePerM_1=str_replace(',', '',$request->post('txt_Activity_PricePerM_1'));
		$Activity_Cost_1 =str_replace(',', '',$request->post('txt_Activity_Cost_1'));
		$Activity_PricePerM_2=str_replace(',', '',$request->post('txt_Activity_PricePerM_2'));
		$Activity_Cost_2 =str_replace(',', '',$request->post('txt_Activity_Cost_2'));
		$Activity_PricePerM_3=str_replace(',', '',$request->post('txt_Activity_PricePerM_3'));
		$Activity_Cost_3 =str_replace(',', '',$request->post('txt_Activity_Cost_3'));
		$Activity_PricePerM_4=str_replace(',', '',$request->post('txt_Activity_PricePerM_4'));
		$Activity_Cost_4 =str_replace(',', '',$request->post('txt_Activity_Cost_4'));
		
		$Remark_All = $request->post('txt_Remark_All');
		
		$NewProjets_Name=$request->post('txt_NewProjets_Name');
		$NewProjets_Name=empty($NewProjets_Name)?array():$NewProjets_Name;
		foreach( $NewProjets_Name as $k=>$v){
			if( !$v )
				unset( $NewProjets_Name[$k] );
		}			
		$NewProjets_Name=array_unique($NewProjets_Name);
		
		$NewProjets_Cost=str_replace(',', '',$request->post('txt_NewProjets_Cost'));
		
		$invioceInfo=array();
		foreach ($IDs as $key => $val){
			
			$invioceInfo[$key]['Child_1_Base_ID']=$val;
			$invioceInfo[$key]['Request_Date']= $yearMon;
			$invioceInfo[$key]['Child_Name']= $Child_Name[$key];
			
			$invioceInfo[$key]['Base_MonCost_Checked']= '1';
			$invioceInfo[$key]['Base_MonCost']= $Base_MonCost[$key];
			$invioceInfo[$key]['Base_MonCost_Remark']= $Base_MonCost_Remark[$key];
			
			$invioceInfo[$key]['Base_OverCost_Checked']= '1';
			$invioceInfo[$key]['Base_OverCost']= $Base_OverCost[$key];
			$invioceInfo[$key]['Base_OverCost_Remark']= $Base_OverCost_Remark[$key];
			
			$invioceInfo[$key]['Base_ProjectCost_Checked']= '1';
			$invioceInfo[$key]['Base_ProjectCost']= $Base_ProjectCost[$key];
			
			$invioceInfo[$key]['Base_Projects_Name']= implode(';', $Base_Projects_Name);
			
			//基本项目的数据组合
			$Base_Projects_Cost[$val][]=0;
			$invioceInfo[$key]['Base_Projects_Cost']=str_replace(',', '',implode(';',  $Base_Projects_Cost[$val]));

			array_unshift($Base_Projects_Remark[$val], '','','','','','');		
			
			$Base_Projects_Remark[$val][]='';
			$invioceInfo[$key]['Base_Projects_Remark']=implode('<;>', $Base_Projects_Remark[$val]);
			
			//课外活动
			$invioceInfo[$key]['Activity_Name_1']='音楽';
			$invioceInfo[$key]['Activity_PricePerM_1']=$Activity_PricePerM_1[$key];
			$invioceInfo[$key]['Activity_Cost_1'] = $Activity_Cost_1[$key];
			
			$invioceInfo[$key]['Activity_Name_2']='英語';
			$invioceInfo[$key]['Activity_PricePerM_2']=$Activity_PricePerM_2[$key];
			$invioceInfo[$key]['Activity_Cost_2'] = $Activity_Cost_2[$key];
			
			$invioceInfo[$key]['Activity_Name_3']='体操';
			$invioceInfo[$key]['Activity_PricePerM_3']=$Activity_PricePerM_3[$key];
			$invioceInfo[$key]['Activity_Cost_3'] = $Activity_Cost_3[$key];
			
			$invioceInfo[$key]['Activity_Name_4']='バレエ＆ダンス';
			$invioceInfo[$key]['Activity_PricePerM_4']=$Activity_PricePerM_4[$key];
			$invioceInfo[$key]['Activity_Cost_4'] = $Activity_Cost_4[$key];
			
			$invioceInfo[$key]['Activity_Name_5']='書道';
			
			//购买物品
			$buyGoodsInfo =	Model::factory('child')->getBuyGoodsInfo($val,$yearMon);
			$thisYearMon=$buyGoodsInfo['thisYearMon'];
			$Buy_GoodsNames='';
			$Buy_GoodsPrices='';
			$Buy_GoodsRemark='';
			$countGoods=count($thisYearMon);
			foreach ($thisYearMon as $k_good => $v_good){
				if($k_good==0){
					$Buy_GoodsNames=$v_good['Goods_Name'];
					$Buy_GoodsPrices=$v_good['Goods_Price'];
					$Buy_GoodsRemark=$v_good['Goods_Remark'];
				}else{
					$Buy_GoodsNames=$Buy_GoodsNames.';'.$v_good['Goods_Name'];
					$Buy_GoodsPrices=$Buy_GoodsPrices.';'.$v_good['Goods_Price'];
					$Buy_GoodsRemark=$Buy_GoodsRemark.'<;>'.$v_good['Goods_Remark'];
				}
			}
			for($i=$countGoods;$i<10;$i++){
				$Buy_GoodsNames=$Buy_GoodsNames.';';
				$Buy_GoodsPrices=$Buy_GoodsPrices.';';
				$Buy_GoodsRemark=$Buy_GoodsRemark.'<;>';
			}
			$invioceInfo[$key]['Buy_GoodsNames']=$Buy_GoodsNames;
			$invioceInfo[$key]['Buy_GoodsPrices']=$Buy_GoodsPrices;
			$invioceInfo[$key]['Buy_GoodsRemark']=$Buy_GoodsRemark;
			
			//remark_all
			$invioceInfo[$key]['All_Remark']=$Remark_All[$key];
			
			//新规项目
			$tempNew_name=implode(';', $NewProjets_Name);
			$invioceInfo[$key]['NewProjets_Name']=$tempNew_name;

			
			$tempNew_cost='';
			$countNew=count($NewProjets_Name);
			for($i=0;$i<$countNew;$i++){
				if($i==0){
					$tempNew_cost=$NewProjets_Cost[$val][$i];
				}else{
					$tempNew_cost=$tempNew_cost.';'.$NewProjets_Cost[$val][$i];
				}
			}
						
			$invioceInfo[$key]['NewProjets_Cost']=str_replace(',', '',$tempNew_cost);
			
			$tempNew_remark='';			
			for($i=1;$i<=$countNew;$i++){if($i!=1){$tempNew_remark=$tempNew_remark.'<;>'.'';}}
						
			//将新规项目与基本项目合并
			if(!empty($NewProjets_Name)){
			$invioceInfo[$key]['Base_Projects_Name']=$invioceInfo[$key]['Base_Projects_Name'].';'.$tempNew_name;
			$invioceInfo[$key]['Base_Projects_Cost']=$invioceInfo[$key]['Base_Projects_Cost'].';'.$tempNew_cost;
			$invioceInfo[$key]['Base_Projects_Remark']=$invioceInfo[$key]['Base_Projects_Remark'].'<;>'.$tempNew_remark;		
			}
		}
		
		
		//保存更新数据
		$table_invoice = Cache::instance()->get('table_invoice');
		try {
			DB::query(NULL, "BEGIN WORK")->execute();
			if(!empty($invioceInfo)){
				
				foreach ($invioceInfo as $key => $val){
					//已存在数据读取
					$old_invoice=DB::select()->from($table_invoice)->where('Request_Date','=',$yearMon)->and_where('Child_1_Base_ID','=',$val['Child_1_Base_ID'])->execute()->current();
					if(!empty($old_invoice)){
						//更新时：删除由一览来的物品购买信息
						unset($val['Buy_GoodsNames']);
						unset($val['Buy_GoodsPrices']);
						unset($val['Buy_GoodsRemark']);
						//更新
						$tep_rst=parent::update2($table_invoice, $val, 'Request_Date', $yearMon,'Child_1_Base_ID',$val['Child_1_Base_ID']);

						if($tep_rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();							
							return FALSE;
						}						
					}else{
						//新规插入
						$tep_rst=parent::insert($table_invoice,$val);
						if($tep_rst===FALSE){
							DB::query(NULL, "ROLLBACK")->execute();
							return FALSE;
						}						
					}					
				}
			}
		
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
			
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
		
	}
	
	

	
}