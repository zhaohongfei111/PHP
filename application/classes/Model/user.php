<?php
class Model_User extends Model_DBCommon{
	
	protected $_rules = array
	(
			'USERID'                         => array
			(
					array('not_empty',NULL),
					array('min_length',array(':value', 4)),
					array('max_length',array(':value', 32)),
					array('regex',array(':value','/^[a-zA-Z]([a-zA-Z0-9_-]{3,43})+$/'))
			),
			'PWD'                        	 => array
			(
					array('min_length',array(':value', 5)),
					array('max_length',array(':value', 42))
			),
			'NAME'                      => array
			(
					array('not_empty',NULL)
			)
	);
	
	
	
	
	/**
	 * 登录用验证
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_user(& $array)
	{
		return Validation::factory($array)
				->rules('USERID', $this->_rules['USERID'])
				->rules('PWD', $this->_rules['PWD']);
	}
	
	/**
	 * 新规用户验证
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_userdata(& $request)
	{		
		$data['ID'] =  $request->post('ID');
		$data['NAME'] =  $request->post('NAME');
		$data['USERID'] =  $request->post('USERID');
		$data['PWD'] = $request->post('PWD');		
		$data['PWD'] =  empty($data['PWD'])?self::creatPwd():$data['PWD'];
		$data['Available'] =  $request->post('Available');
		$data['SELLEVEL'] =  $request->post('SELLEVEL');
		$data['Remark'] =  $request->post('Remark');
		
		$table = Cache::instance()->get('table_user');
		
		return Validation::factory($data)
				->rules('USERID', $this->_rules['USERID'])
				->rule('USERID', 'Model_User::unique_userid_exists',array(':value',$table,$data['ID']))
				->rules('PWD', $this->_rules['PWD'])
				->rules('NAME', $this->_rules['NAME']);
	}
	
	public function creatPwd()
	{
		$strAB = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
		$strNum = "1234567890";				
		$arr = array();
		array_push($arr, $strAB[rand(0,50)],$strAB[rand(0,50)],$strAB[rand(0,50)],$strAB[rand(0,50)],$strAB[rand(0,50)],$strAB[rand(0,50)]);
		array_push($arr, $strNum[rand(0,9)],$strNum[rand(0,9)],$strNum[rand(0,9)],$strNum[rand(0,9)]);		
		shuffle($arr);
		return implode($arr);
	}
	
	
	/**
	 * 用户登录提交
	 * @param unknown $array
	 * @return multitype:boolean Ambigous <multitype:, multitype:string >
	 */
	public function checkLogin(& $array)
	{
		try {
			$validation = $this->Validation_user($array);
			
			if($validation->check()){
				$table = Cache::instance()->get('table_user');				
				$user = $this->selectByKey($table,'USERID',$array['USERID']);
				$usernum = count($user);
				if($usernum<1){
					Request::factory('postprompt/loginError')->post('errors',array('入力アカウントは存在しません!'))->post('url',URL::site('login/index'))->execute();
				}elseif ($usernum>1){
					Request::factory('postprompt/loginError')->post('errors',array('入力したアカウントは重複です！'))->post('url',URL::site('login/index'))->execute();
				}else{
					if($user[0]['Available']=='0'){
						Request::factory('postprompt/loginError')->post('errors',array('入力したアカウントは無効です！'))->post('url',URL::site('login/index'))->execute();						
					}else if($user[0]['PWD']==$array['PWD']){
						$result = array('result'=>TRUE);
						Session::instance()->set('USERID', $array['USERID']);
						Session::instance()->set('PWD', $array['PWD']);
						Session::instance()->set('NAME', $user[0]['NAME']);
						Session::instance()->set('SELLEVEL', $user[0]['SELLEVEL']);						
						if(empty($user[0]['LASTLOGINTIME'])){
							Session::instance()->set('LASTLOGINTIME', '無');
						}else{
							Session::instance()->set('LASTLOGINTIME', date('Y/m/d H:i',$user[0]['LASTLOGINTIME']));
						}
						

						if($array['memory']){
							Cookie::set('USERID', $array['USERID'],604800);
							Cookie::set('PWD', $array['PWD'],604800);
						}else{
							Cookie::delete('USERID');
							Cookie::delete('PWD');
						}
						$this->update($table, array('LASTLOGINTIME'=>time()), 'USERID', $array['USERID']);
						
						HTTP::redirect('index/index');
						
					}else{
						Request::factory('postprompt/loginError')->post('errors',array('入力したアカウントはエラーです！'))->post('url',URL::site('login/index'))->execute();
					}					
				}				
			}else{
				$errors = $validation->errors('post');
				Request::factory('postprompt/loginError')->post('errors',$errors)->post('url',URL::site('login/index'))->execute();
			}
			
		}catch ( Database_Exception $e ){								
    		echo $e->getMessage();    		 					
    	}		
	}
	
	/**
	 * 判断用户登录是否合法
	 */
	public function checkSession()
	{
		try {
			$USERID = Session::instance()->get('USERID');
			$PWD = Session::instance()->get('PWD');
		
			$table = Cache::instance()->get('table_user');
			$user = $this->selectByKey($table,'USERID',$USERID);
			$usernum = count($user);
			
			if($usernum==1){
				if($user[0]['PWD']!=$PWD){					
					Session::instance()->destroy();
					return FALSE;
				}
			}else{
				Session::instance()->destroy();
				return FALSE;
			}
			Session::instance()->set('SELLEVEL', $user[0]['SELLEVEL']);
			return $user[0];
		}catch ( Database_Exception $e ){
			echo $e->getMessage();
		}
	}
	
	/**
	 * 判断user_id 是否是唯一的值
	 * @param unknown $values
	 * @param unknown $table
	 * @return boolean
	 */
	public static function unique_userid_exists( $values , $table , $ID)
	{	
		try {
			$sql = DB::select(DB::expr('COUNT(*) AS total_count'))
					->from($table)
					->where('USERID', '=', $values);
			if(!empty($ID)) $sql = $sql->and_where('ID', '!=', $ID);
			
			
			return !(bool)$sql->execute()
					->get('total_count');
		} catch (Exception $e) {
			$e->getMessage();
			exit;
		}
		
	}
	
	/**
	 * 添加修改用户
	 * @param unknown $array
	 * @return multitype:boolean Ambigous <multitype:, multitype:string >
	 */
	public function userUpdate(& $request)
	{
		try {
			$data = $this->Validation_userdata($request);			
			if($data->check()){
				$table = Cache::instance()->get('table_user');
				
				$ID = $request->post('ID');
				$vaules = $data->as_array();
				if(empty($ID)){
					$rst = parent::insert($table, $vaules);
					if($rst === false ){
						$result = false;
					}else{
						list($insert_id, $total_rows) = $rst;
						$ID = $insert_id;						
					}
				}else{					
					 parent::update($table, $vaules,'ID',$ID);
				}
				return array('result'=>true,'ID'=>$ID,'PWD'=>$vaules['PWD']);
			}else{
				$data_errors =  $data->errors('post');
				return array('result'=>FALSE,'errors'=>$data_errors);
			}
			
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return array('result'=>FALSE,'errors'=>array('SYS異常があります。'));
		}
	}
	
	
	
	
	public function userDel($array)
	{
		try {
			$table = Cache::instance()->get('table_user');
			$total_rows = DB::delete($table)->where('ID', 'IN', $array)->execute();			
			return TRUE;
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * userWorker电子印图片名称保存到数据库
	 * @param unknown $image
	 * @param unknown $ID
	 * @return boolean
	 */
	public function SaveUserWorkerImages($image,$ID){
		try {
			$table = Cache::instance()->get('table_user');
			$oldUserWorkerPic = DB::select()->from($table)->where('ID','=',$ID)->execute()->get('UserWorkerPic');
			$userWorkerPic=empty($oldUserWorkerPic)?$image:$oldUserWorkerPic.';'.$image;
			parent::update($table,array('UserWorkerPic'=>$userWorkerPic),'ID',$ID);
			return TRUE;
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return FALSE;
		}
	}
	
	public function DelUserWorkerImages($image,$ID){
		try {
			$table = Cache::instance()->get('table_user');
			$oldUserWorkerPic = DB::select()->from($table)->where('ID','=',$ID)->execute()->get('UserWorkerPic');
			$oldArr=explode(';', $oldUserWorkerPic);
			$userWorkerPic=array_diff($oldArr,array('del'=>$image));
			$userWorkerPic=empty($userWorkerPic)?'':implode(';', $userWorkerPic);
			parent::update($table,array('UserWorkerPic'=>$userWorkerPic),'ID',$ID);
			return TRUE;
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return FALSE;
		}
	}
	
	/**
	 * 获取worker的信息列表
	 */
	public function userWorkerList(){
		$table = Cache::instance()->get('table_user');
		try {
			$worker_List = DB::select()->from($table)->execute()->as_array();
			return $worker_List;
		} catch (Exception $e) {
				
			echo $e->getMessage();
		}
	
	}	
}