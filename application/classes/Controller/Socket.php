<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Socket extends Controller_Administration {
	
	private $socket;
	private $bur;	
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see Kohana_Controller::before()
	 * 连接socket
	 */
	public function before(){
		set_time_limit(100);
		parent::before();
// 		$ipAndPort=Model::factory('socket')->getIpAndPort();
// 		$ip=$ipAndPort['Machine_IP'];
// 		$port=$ipAndPort['Machine_Port'];
		include_once(Kohana::find_file('include'.DIRECTORY_SEPARATOR,'socket'));

		$this->socket = new Socket ('192.168.100.241', 10001);
		$this->buf = array();
		
	}
	
	
	/**
	 * !CodeTemplates.overridecomment.nonjd!
	 * @see Kohana_Controller::after()
	 * 关闭socket链接
	 */
	public function after(){
		socket_shutdown($this->socket->socket);
	}
	
	/**
	 * 页面发送读取考勤机 请求
	 */
	public function action_socket_send(){

		if(!$this->socket_on()){
			$result = array('result'=>FALSE,'Alert'=>'通信異常！');
		}else{
			Model::factory('socket')->truncate();
		}
		
		if(!$this->socket_send()){
			$result = array('result'=>FALSE,'Alert'=>'通信異常！');
		}
		
		$this->socket_off();		
		
		if($this->setDataToRawData()){
			$result = array('result'=>TRUE,'Alert'=>'データ読出成功。');
		}else{
			$result = array('result'=>FALSE,'Alert'=>'データ読出失敗！');
		}		
		
		echo json_encode($result);
		/*$body = View::factory('administration/mintRst')
					->bind('alert',$alert);
		
		$this->response->body($body); */
	}
	
	/**
	 * 快速读取一次数据
	 * @param number $dataLength
	 * @return multitype:number multitype:
	 */
	private function getOneBackData($dataLength=0){		
		$this->readBur();

		if(!$dataLength){
			if(count($this->buf)<4){
				return $this->getOneBackData();
			}
			//计算考勤机一次返回数据的长度
			//224 => e0
			//233 => e9
			if($this->buf[1]==224){
				$dataLength = $this->buf[2]+5;
			}else if($this->buf[1]==233){
				$dataLength = $this->buf[2]*256+$this->buf[3]+6;
			}
		}
		
		if(count($this->buf)<$dataLength){
			return $this->getOneBackData();
		}
		$rst = $this->buf;
		$this->buf = array();
		return array($rst,$dataLength);
	}
	
	/**
	 * 将断片数据拼接
	 */
	private function readBur(){		
		$this->buf = array_merge($this->buf,$this->socket->readBytes());		
	}
	
	/**
	 * 向考勤机发送 on 命令
	 * @return boolean
	 */
	private function socket_on(){
		try {
			$On = array(0x02,0xE0,0x00);
			$this->socket->sendData($On);		
			list($data,$length) = $this->getOneBackData();
			
			$on = FALSE;
			if(count($data) == 9 ){
				if($data[1]==224 && $data[2]==4  && $data[3]==170 && $data[4]==170 && $data[5]==170 && $data[6]==170 && $data[7]==158){
					$on = TRUE;
				}
			}			
			return $on;			
		} catch (Exception $e) {
			return FALSE;
		}	
	}
	
	
	
	/**
	 * 向考勤机发送off 命令
	 */
	private function socket_off(){
		$off = array(0x02,0xEF,0x00);
		$this->socket->sendData($off);
	}
	
	/**
	 * 读取考勤数据
	 * @param number $offset
	 * @return boolean
	 */
	private function socket_send($offset=0){

		try {
			$getMaxData = array(0x02,0xE9,0x04);
			$currentNum = 74*$offset;
			//计算偏移量
			array_push($getMaxData, floor($currentNum/(256*256*256)),floor($currentNum/(256*256)),floor($currentNum/256),$currentNum%256);			
			$this->socket->sendData($getMaxData);

			list($data,$length) = $this->getOneBackData();
			if($length!=10){
				$CRC8 = array_slice($data,-2,1);
				$CRC8check = $this->socket->CRC8check(array_slice($data,0,-2));
				if($CRC8check == $CRC8[0]){
					$dataArr = array_slice($data,8,-2);
					$dataNum = count($dataArr)/13;
										
					for($i=0;$i<$dataNum;$i++){
						$j=$i*13;
						$timeStr =  $this->socket->myTen2bin($dataArr[$j+9]).$this->socket->myTen2bin($dataArr[$j+10]).$this->socket->myTen2bin($dataArr[$j+11]).$this->socket->myTen2bin($dataArr[$j+12]);
						$year = bindec(substr($timeStr,0,7))+1980;
						$month = substr('0'.bindec(substr($timeStr,7,4)),-2);
						$day = substr('0'.bindec(substr($timeStr,11,5)),-2);
						$hour = substr('0'.bindec(substr($timeStr,16,5)),-2);
						$minute = substr('0'.bindec(substr($timeStr,21,6)),-2);
						$second = substr('0'.bindec(substr($timeStr,27,5))*2,-2);
							
						$dateLine[] = array(
								'key'=>$dataArr[$j],
								'card'=>$this->socket->tenToHex($dataArr[$j+1]).'-'.$this->socket->tenToHex($dataArr[$j+2]).'-'.$this->socket->tenToHex($dataArr[$j+3]).'-'.$this->socket->tenToHex($dataArr[$j+4]).'-'.$this->socket->tenToHex($dataArr[$j+5]).'-'.$this->socket->tenToHex($dataArr[$j+6]).'-'.$this->socket->tenToHex($dataArr[$j+7]).'-'.$this->socket->tenToHex($dataArr[$j+8]),
								'time'=>$year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$second
						);
					}
					Model::factory('socket')->insert($dateLine);					
					$offset++;
					return $this->socket_send($offset);
				}else{
					return FALSE;
				}
			}else{
				return TRUE;
			}
		} catch (Exception $e) {
			return FALSE;
		}
		
	}
	
	/**
	 * 将考勤数据写入到 day_raw_data 表中
	 * @return boolean
	 */
	public function setDataToRawData(){
		$class = $this->request->post('class');
		//$class = $_GET['class'];
		$model_socket = Model::factory('socket');
		$socket_message = $model_socket->getEffective();		
		$childCardList = $model_socket->getChildCard($class);
		if(empty($childCardList[0])) return TRUE;
		
		$rst = array();
		foreach($socket_message as $key => $val){
			$id_key = array_search($val['Card'], $childCardList[0]);
			if($childCardList[1][$id_key] != ''){				
				$tmpDate = date('Y-m-d',strtotime($val['Time']));
				$tmpTime = date('H:i:s',strtotime($val['Time']));				
				if($val['Key']==2){
					if(isset($rst[$childCardList[0][$id_key]][$tmpDate]['In_Time'])){
						$tmpTime = $tmpTime<$rst[$childCardList[0][$id_key]][$tmpDate]['In_Time']?$tmpTime:$rst[$childCardList[0][$id_key]][$tmpDate]['In_Time'];
					}
					$rst[$childCardList[1][$id_key]][$tmpDate]['In_Time'] = $tmpTime;
				}else if($val['Key']==3){
					if(isset($rst[$childCardList[0][$id_key]][$tmpDate]['Out_Time'])){
						$tmpTime = $tmpTime>$rst[$childCardList[0][$id_key]][$tmpDate]['Out_Time']?$tmpTime:$rst[$childCardList[0][$id_key]][$tmpDate]['Out_Time'];
					}					
					$rst[$childCardList[1][$id_key]][$tmpDate]['Out_Time'] = $tmpTime;
				}				
			}
		}
		return $model_socket->setRawData($rst);
	}
	
}
?>