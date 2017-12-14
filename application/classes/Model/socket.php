<?php
class Model_socket extends Model{	
	
	
	/**
	 * 清空表中数据
	 * TRUNCATE TABLE socket_message
	 */
	public function truncate(){
		try {
			
			DB::query(NULL,"TRUNCATE TABLE socket_message")->execute();
		} catch (Exception $e) {
			return false;
		}
	}
	
	/**
	 * 获取考勤机的ip和port
	 * @return NULL|boolean
	 */
	public function getIpAndPort(){
		try {
			return  DB::select('Machine_IP','Machine_Port')->from('machine_info')->execute()->as_array();
		} catch (Exception $e) {
			return false;
		}
	}
	
	
	public function insert(&$values){
		try {
			
			$sql = DB::insert('socket_message',array('Key','Card','Time'));
			
			foreach ($values as $key => $val){
				$sql = $sql->values($val);				
			}
			list($insert_id, $total_rows) = $sql->execute();
			
			return $total_rows;
			
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}		
	}
	
	/**
	 * 获取所有的考勤的数据
	 * 
	 */
	public function getEffective(){
		try {
			return  DB::select()->from('socket_message')->where('key','IN',array(2,3))->execute()->as_array();			
		} catch (Exception $e) {
			return false;
		}
	}
	
	
	public function getChildCard($class){
		try {			
			$cardListRst = DB::select(DB::expr('DISTINCT(`Card`)'))->from('socket_message')->where('key','IN',array(2,3))->execute()->as_array();
			
			$childIdList = array();
			$cardList = array();
			foreach($cardListRst as $key => $val){
				$childId = DB::select('ID')->from('child_1_base')->where('Class', '=', $class)->and_where_open()->where('Attendance_ID1','=',$val['Card'])->or_where('Attendance_ID2','=',$val['Card'])->and_where_close()->execute()->get('ID');
				if($childId){
					array_push($cardList,$val['Card']);
					array_push($childIdList,$childId);
				}
			}			
			$childCardList = array($cardList,$childIdList);
			return $childCardList;
		} catch (Exception $e) {
			return false;
		}
	}
	
	
	public function setRawData($data){
		try {
			$insert_values = array();
			foreach ($data as $key => $val){
				foreach($val as $key_v => $val_v){
					$tmpId = DB::select('ID')->from('day_raw_data')->where('Day_Date','=',$key_v)->and_where('Child_1_Base_ID','=',$key)->execute()->get('ID');
					$In_Time = isset($val_v['In_Time'])?$val_v['In_Time']:NULL;
					$Out_Time = isset($val_v['Out_Time'])?$val_v['Out_Time']:NULL;
					if(empty($tmpId)){
						$insert_values[] = array($key_v,$In_Time,$Out_Time,$key);
					}else{
						DB::update('day_raw_data')->set(array('In_Time'=>$In_Time,'Out_Time'=>$Out_Time))->where('ID','=',$tmpId)->execute();
					}
				}
			}
			
			if(count($insert_values)>0){
				$sql = DB::insert('day_raw_data',array('Day_Date','In_Time','Out_Time','Child_1_Base_ID'));
				
				foreach ($insert_values as $key => $val){
					$sql = $sql->values($val);
				}
				list($insert_id, $total_rows) = $sql->execute();
			}
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}
	}
	
}