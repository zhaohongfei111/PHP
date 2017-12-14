<?php 
class Public_Times{
	
	/**
	 * 获取年
	 * @param string "m"、"n"
	 * @param string "月"
	 * @return multitype:string
	 */
	public static function getMonthList($format="m",$unit="月"){
		$months = array();
				
		if($format=="m"){
			for($i=1;$i<13;$i++){
				$months[$i] = substr("0{$i}",-2).$unit;
			}
		}else{
			for($i=1;$i<13;$i++){
				$months[$i] = $i.$unit;
			}
		}
		return $months;
	}
	
	
	/**
	 * 获取这个月的天的数组
	 * @param string $year
	 * @param string $month
	 * @param string $format 'd'、'j'
	 * @param string $unit
	 * @return multitype:string
	 */
	public static function getDaysList($year="",$month="",$format="d",$unit="日"){
		$days = array();
	
		if($month==""){
			if($format=="d"){
				for($i=1;$i<=31;$i++){
					$days[$i] = substr("0{$i}",-2).$unit;
				}
			}else{
				for($i=1;$i<=31;$i++){
					$days[$i] = $i.$unit;
				}
			}
		}else{
			$m1 = array(1,3,5,7,8,10,12);
			$m2 = array(4,6,9,11);
			if($format=="d"){
				if($year==""){
					if(in_array($month,$m1)){
						for($i=1;$i<=31;$i++){
							$days[$i] = substr("0{$i}",-2).$unit;
						}
					}elseif($month==2) {
						for($i=1;$i<=29;$i++){
							$days[$i] = substr("0{$i}",-2).$unit;
						}
					}else{
						for($i=1;$i<=30;$i++){
							$days[$i] = substr("0{$i}",-2).$unit;
						}
					}
				}else{
					if(in_array($month,$m1)){
						for($i=1;$i<=31;$i++){
							$days[$i] = substr("0{$i}",-2).$unit;
						}
					}elseif($month==2) {
						if(date('L',strtotime($year.'-'.$month.'-01'))){
							for($i=1;$i<=29;$i++){
								$days[$i] = substr("0{$i}",-2).$unit;
							}
						}else{
							for($i=1;$i<=28;$i++){
								$days[$i] = substr("0{$i}",-2).$unit;
							}
						}
							
					}else{
						for($i=1;$i<=30;$i++){
							$days[$i] = substr("0{$i}",-2).$unit;
						}
					}
				}
			}else{
				if($year==""){
					if(in_array($month,$m1)){
						for($i=1;$i<=31;$i++){
							$days[$i] = $i.$unit;
						}
					}elseif($month==2) {
						for($i=1;$i<=29;$i++){
							$days[$i] = $i.$unit;
						}
					}else{
						for($i=1;$i<=30;$i++){
							$days[$i] = $i.$unit;
						}
					}
				}else{
					if(in_array($month,$m1)){
						for($i=1;$i<=31;$i++){
							$days[$i] = $i.$unit;
						}
					}elseif($month==2) {
						if(date('L',strtotime($year.'-'.$month.'-01'))){
							for($i=1;$i<=29;$i++){
								$days[$i] = $i.$unit;
							}
						}else{
							for($i=1;$i<=28;$i++){
								$days[$i] = $i.$unit;
							}
						}
							
					}else{
						for($i=1;$i<=30;$i++){
							$days[$i] = $i.$unit;
						}
					}
				}
			}
			
		}
		return $days;
	}
	
	/**
	 * 获取区间段的时间参数
	 * @param unknown $startTime
	 * @param unknown $endTime
	 * @param string $format	格式化时间
	 * @param string $interval	间隔 
	 * 
	 * objective: '7:30','7:40','7:50'...
	 * standard: '07:30:00','07:40:00','07:50:00'...
	 */
	public static function arriveLeaveList($startTime="07:30:00",$endTime="14:00:00",$format="G:i",$interval="600"){
		$result = array();
		
		$startTime = strtotime(date('Y-m-d')." {$startTime}");
		
		$endTime = strtotime(date('Y-m-d')." {$endTime}");	
		//把时间区间写入到数据库	
		for($i=$startTime;$i<=$endTime;$i+=$interval){
			$result[] = array('objective'=>date($format,$i),'standard'=>date('H:i:s',$i));
		}		
		return $result;		
	}
	
	/**
	 * 年 西元 语 日本年之间转换
	 */
	public static function yearWestAndJap($startYear,$endYear,$unit="年"){
		$YearList = array();
		
		for($i=$startYear;$i<=$endYear;$i++){
			if($i<1913){
				$YearList[] = array('west'=>$i.$unit,'jap'=>'明治'.($i-1867).$unit,'Y'=>$i);
			}else if($i<1927){
				$YearList[] = array('west'=>$i.$unit,'jap'=>'大正'.($i-1911).$unit,'Y'=>$i);
			}else if($i<1990){
				$YearList[] = array('west'=>$i.$unit,'jap'=>'昭和'.($i-1925).$unit,'Y'=>$i);
			}else{
				$YearList[] = array('west'=>$i.$unit,'jap'=>'平成'.($i-1988).$unit,'Y'=>$i);
			}
		}
		return $YearList;
	}
	
	/**
	 * 西元 语 日本年之间转换
	 */
	public static function getYearJap($year,$unit="年"){
		if((int)$year == 0){ 
			return '';
		}
		
		$yaerJap='';
		if($year<1913){
				$yaerJap= '明治'.($year-1867).$unit;
			}else if($year<1927){
				$yaerJap = '大正'.($year-1911).$unit;
			}else if($year<1990){
				$yaerJap='昭和'.($year-1925).$unit;
			}else{
				$yaerJap ='平成'.($year-1988).$unit;
			}
		return  $yaerJap;
	}
	
	
	
	
	/**
	 * 年龄计算
	 */
	
	public static function getAge($date){
		if($date=='') return '';
		list($birthY,$birthM,$birthD) = explode('-',$date);
		if($birthY=='0000'||$birthM=='00'||$birthD=='00'){
			return '';
		}
		
		$Y_between = date('Y') - $birthY;		
		$m_between = date('m') - $birthM;
		$d_between = date('d') - $birthD;

		if($d_between<0){
			$m_between -= 1;
		}
		if($m_between<0){
			$m_between += 12;
			$Y_between -= 1;
		}
		return $Y_between.'歳'.$m_between.'ケ月';
	}
	/**
	 * 退圆时年龄计算
	 * @param unknown $date
	 * @return string
	 */
	public static function leaveAge($leaveDate,$date){
		if($date=='') return '';
		list($birthY,$birthM,$birthD) = explode('-',$date);
		if(empty($leaveDate)){
			return '';
		}
		if($birthY=='0000'||$birthM=='00'||$birthD=='00'){
			return '';
		}
		list($leaveY,$leaveM,$leaveD) = explode('-',$leaveDate);
		if($leaveY=='0000'||$leaveM=='00'||$leaveD=='00'){
			return '';
		}
	
		$Y_between = $leaveY - $birthY;
		$m_between = $leaveM - $birthM;
		$d_between = $leaveD - $birthD;
	
		if($d_between<0){
			$m_between -= 1;
		}
		if($m_between<0){
			$m_between += 12;
			$Y_between -= 1;
		}
		return $Y_between.'歳'.$m_between.'ケ月';
	}
	
	/**
	 * 将年月日处理成想要的格式
	 */
	public static function handleBirthday($birthday)
	{
		if(!empty($birthday)){
			list($birthY,$birthM,$birthD) = explode('-',$birthday);
				
			if($birthY!='0000'||$birthM!='00'||$birthD!='00'){
				$birthday = ($birthY=='0000'?'****':$birthY).'-'.($birthM=='00'?'**':$birthM).'-'.($birthD=='00'?'**':$birthD);
			}else{
				$birthday = '';
			}
		}
		return $birthday;
	}
	
	/**
	 * 获取星期几
	 */	
	public static function getWeek($date){		
		$shuchu = date("w",strtotime($date));      //获取星期值
		$weekarray=array("日曜","月曜","火曜","水曜","木曜","金曜","土曜");
		return $weekarray[$shuchu];
	}
	
	
	public static function timediff( $timediff )
	{
		
		$days = intval( $timediff / 86400 );
		$remain = $timediff % 86400;
		$hours = intval( $remain / 3600 );
		$remain = $remain % 3600;
		$mins = intval( $remain / 60 );
		$secs = $remain % 60;
		return $hours.":".substr('0'.$mins, -2);
		//$res = array( "day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs );
		//return $res;
	}
	
	public static function strTime($par){
		foreach ($par as $key => $val){
			if(is_array($val)){
				$par[$key] = Public_Times::strTime($val);
			}else{
				$par[$key] = strtotime($val);
			}			
		}
		return $par;
	}
	
	/**
	 * 体温选项生成
	 */
	public static function getBodyTemp($startTemp,$endTemp){
		
		$result=array();
		$start=sprintf("%.1f",$startTemp);
		$end=sprintf("%.1f",$endTemp);
		$result[1]=$start.'以下';
		
		for($i=$start;$i<=$end;$i=$i+0.1){
			$result[]=sprintf("%.1f",$i);			
		}
		$result[]=$end.'以上';
		return $result;
	}
	
	
	
	
	
	
	
	
	
}
