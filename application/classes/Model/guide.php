<?php
class Model_guide extends Model_DBCommon{
	public function getguideYear($Select_group){
		$table = Cache::instance()->get('table_guide_plan_year');
		$rst = DB::select()->from($table)
							->where('Select_group_year','=',$Select_group)
							->execute()
							->as_array();
		return $rst;
	}
	
	public function getguideMonth($Select_group){
		$table = Cache::instance()->get('table_guide_plan_month');
		$rst = DB::select()->from($table)
					->where('Select_group_month','=',$Select_group)
					->execute()
					->as_array();
		return $rst;
	}
	
	public function getguideWeek($Select_group){
		$table = Cache::instance()->get('table_guide_plan_week');
		$rst = DB::select()->from($table)
				->where('Select_group_week','=',$Select_group)
				->execute()
				->as_array();
		return $rst;
	}
	public function guideUpdate(& $request){
		$Complete_Date = $request->post('Complete_Date');
		$Select_group_year = $request->post('Select_group_year');
		$txt_Year_Title = $request->post('txt_Year_Title');
		$txt_Year_Valuation = $request->post('txt_Year_Valuation');
		$txt_Month_Title_tmp = $request->post('txt_Month_Title');
		$txt_Month_Title = empty($txt_Month_Title_tmp)?NULL:implode('^', $txt_Month_Title_tmp);
		$txt_Target_tmp = $request->post('txt_Target');
		$txt_Target = empty($txt_Target_tmp)?NULL:implode('^', $txt_Target_tmp);
		$txt_Life_tmp = $request->post('txt_Life');
		$txt_Life = empty($txt_Life_tmp)?NULL:implode('^', $txt_Life_tmp);
		$txt_Feel_tmp = $request->post('txt_Feel');
		$txt_Feel = empty($txt_Feel_tmp)?NULL:implode('^', $txt_Feel_tmp);
		$txt_Health_tmp = $request->post('txt_Health');
		$txt_Health = empty($txt_Health_tmp)?NULL:implode('^', $txt_Health_tmp);
		$txt_Relationship_tmp = $request->post('txt_Relationship');
		$txt_Relationship = empty($txt_Relationship_tmp)?NULL:implode('^', $txt_Relationship_tmp);
		$txt_Environment_tmp = $request->post('txt_Environment');
		$txt_Environment = empty($txt_Environment_tmp)?NULL:implode('^', $txt_Environment_tmp);
		$txt_Speak_tmp = $request->post('txt_Speak');
		$txt_Speak = empty($txt_Speak_tmp)?NULL:implode('^', $txt_Speak_tmp);
		$txt_Performance_tmp = $request->post('txt_Performance');
		$txt_Performance = empty($txt_Performance_tmp)?NULL:implode('^', $txt_Performance_tmp);
		$txt_Attention_tmp = $request->post('txt_Attention');
		$txt_Attention = empty($txt_Attention_tmp)?NULL:implode('^', $txt_Attention_tmp);
		$txt_Dothings_tmp = $request->post('txt_Dothings');
		$txt_Dothings = empty($txt_Dothings_tmp)?NULL:implode('^', $txt_Dothings_tmp);
		$txt_Self_Valuation_tmp = $request->post('txt_Self_Valuation');
		$txt_Self_Valuation = empty($txt_Self_Valuation_tmp)?NULL:implode('^', $txt_Self_Valuation_tmp);
	
		$data =array();
		$data['Complete_Date']=$Complete_Date;
		$data['Select_group_year']=$Select_group_year;		
		$data['txt_Year_Title']=$txt_Year_Title;
		$data['txt_Year_Valuation']=$txt_Year_Valuation;
		$data['txt_Month_Title']=$txt_Month_Title;
		$data['txt_Target']=$txt_Target;
		$data['txt_Life']=$txt_Life;
		$data['txt_Feel']=$txt_Feel;
		$data['txt_Health']=$txt_Health;
		$data['txt_Relationship']=$txt_Relationship;
		$data['txt_Environment']=$txt_Environment;
		$data['txt_Speak']=$txt_Speak;
		$data['txt_Performance']=$txt_Performance;
		$data['txt_Attention']=$txt_Attention;
		$data['txt_Dothings']=$txt_Dothings;
		$data['txt_Self_Valuation']=$txt_Self_Valuation;
		
		$table = Cache::instance()->get('table_guide_plan_year');
		
		
		try{
			DB::query(NULL, "BEGIN WORK")->execute();
				$old = DB::select()->from($table)->where('Select_group_year','=',$data['Select_group_year'])->execute()->current();
				
				//更新
				if(!empty($old)){	
					$rst = parent::update($table,$data,'Select_group_year',$data['Select_group_year']);
					if($rst==FALSE){
						DB::query(NULL, "ROLLBACK")->execute();	
						return FALSE;
					}
				}else{
					//新规
					$rst = parent::insert($table, $data);
					if($rst ===FALSE){
						DB::query(NULL,"ROLLBACK")->execute();
						return FALSE;
					}
				}		
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	
public function guideUpdate2(& $request){
		
		$Complete_Date = $request->post('Complete_Date');
		$Select_group_month = $request->post('Select_group_month');
		$txt_Child_Status = $request->post('txt_Child_Status');
		$txt_Target = $request->post('txt_Target');
		$txt_Month_Title = $request->post('txt_Month_Title');
		$txt_Dothings = $request->post('txt_Dothings');
		$txt_Cure_Content = $request->post('txt_Cure_Content');
		$txt_Cure_Environment = $request->post('txt_Cure_Environment');
		$txt_Education_Content = $request->post('txt_Education_Content');
		$txt_Education_Environment = $request->post('txt_Education_Environment');
		$txt_Together_Content = $request->post('txt_Together_Content');
		$txt_Together_Environment = $request->post('txt_Together_Environment');
		$txt_Safe_Content = $request->post('txt_Safe_Content');
		$txt_Safe_Environment = $request->post('txt_Safe_Environment');
		$txt_Eat = $request->post('txt_Eat');
		$txt_Valuation = $request->post('txt_Valuation');
		$txt_Teacher_Cooperation = $request->post('txt_Teacher_Cooperation');
		$txt_Parents_Support =  $request->post('txt_Parents_Support');
		$txt_Area_Support = $request->post('txt_Area_Support');
		
		$data = Array();
		$data['Complete_Date']=$Complete_Date;
		$data['Select_group_month']=$Select_group_month;
		$data['txt_Child_Status']=$txt_Child_Status;
		$data['txt_Target']=$txt_Target;
		$data['txt_Month_Title']=$txt_Month_Title;
		$data['txt_Dothings']=$txt_Dothings;
		$data['txt_Cure_Content']=$txt_Cure_Content;
		$data['txt_Cure_Environment']=$txt_Cure_Environment;
		$data['txt_Education_Content']=$txt_Education_Content;
		$data['txt_Education_Environment']=$txt_Education_Environment;
		$data['txt_Together_Content']=$txt_Together_Content;
		$data['txt_Together_Environment']=$txt_Together_Environment;
		$data['txt_Safe_Content']=$txt_Safe_Content;
		$data['txt_Safe_Environment']=$txt_Safe_Environment;
		$data['txt_Eat']=$txt_Eat;
		$data['txt_Valuation']=$txt_Valuation;
		$data['txt_Teacher_Cooperation']=$txt_Teacher_Cooperation;
		$data['txt_Parents_Support']=$txt_Parents_Support;		
		$data['txt_Area_Support']=$txt_Area_Support;
	
		$table = Cache::instance()->get('table_guide_plan_month');
		
		
		try{
			DB::query(NULL, "BEGIN WORK")->execute();						
			$old = DB::select()->from($table)->where('Select_group_month','=',$data['Select_group_month'])->execute()->current();
			
			//更新
			if(!empty($old)){
				$rst = parent::update($table,$data,'Select_group_month',$data['Select_group_month']);
				if($rst==FALSE){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}else{
				//新规
				$rst = parent::insert($table, $data);
				if($rst ===FALSE){
					DB::query(NULL,"ROLLBACK")->execute();
					return FALSE;
				}
			}
		
			DB::query(NULL, "COMMIT")->execute();
			return TRUE;
		} catch (Exception $e) {
			$e->getMessage();
			return FALSE;
		}
	}
	
	public function guideUpdate3(& $request){
		$Complete_Date = $request->post('Complete_Date');
		$Select_group_week = $request->post('Select_group_week');
		$txt_Year_Title = $request->post('txt_Year_Title');
		$txt_Month_Title = $request->post('txt_Month_Title');
		$txt_Week_Title = $request->post('txt_Week_Title');
		$txt_Week_Target = $request->post('txt_Week_Target');
		$txt_Week_Child_Status = $request->post('txt_Week_Child_Status');
		$txt_Week_Teacher_Cooperation = $request->post('txt_Week_Teacher_Cooperation');
		$txt_Week_Environment = $request->post('txt_Week_Environment');
		$txt_Week_Valiation = $request->post('txt_Week_Valiation');
		
		$data =Array();
		$data['Complete_Date']=$Complete_Date;
		$data['Select_group_week']=$Select_group_week;
		$data['txt_Year_Title']=$txt_Year_Title;
		$data['txt_Month_Title']=$txt_Month_Title;
		$data['txt_Week_Title']=$txt_Week_Title;
		$data['txt_Week_Target']=$txt_Week_Target;
		$data['txt_Week_Child_Status']=$txt_Week_Child_Status;
		
		$data['txt_Week_Teacher_Cooperation']=$txt_Week_Teacher_Cooperation;
		$data['txt_Week_Environment']=$txt_Week_Environment;
		$data['txt_Week_Valiation']=$txt_Week_Valiation;
		
		
		$table = Cache::instance()->get('table_guide_plan_week');
		try{
			
			DB::query(NULL, "BEGIN WORK")->execute();
			$old = DB::select()->from($table)->where('Select_group_week','=',$data['Select_group_week'])->execute()->current();
		
			//更新
			if(!empty($old)){
				$rst = parent::update($table,$data,'Select_group_week',$data['Select_group_week']);
				
				if($rst==FALSE){
					DB::query(NULL, "ROLLBACK")->execute();
					return FALSE;
				}
			}else{
				//新规
				$rst = parent::insert($table, $data);
				if($rst ===FALSE){
					DB::query(NULL,"ROLLBACK")->execute();
					return FALSE;
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