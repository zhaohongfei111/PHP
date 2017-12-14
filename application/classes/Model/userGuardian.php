<?php
class Model_userGuardian extends Model_DBCommon{
	
	protected $_rules = array
	(
			'Guardian_ID'                         => array
			(
					array('not_empty',NULL),
					array('min_length',array(':value', 8)),
					array('max_length',array(':value', 8))
			),
			'PWD'                        	 => array
			(
					array('min_length',array(':value', 5)),
					array('max_length',array(':value', 42))
			)
	);
	
	
	
	
	/**
	 * 登录用验证
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_userGuardian(& $array)
	{
		return Validation::factory($array)
				->rules('Guardian_ID', $this->_rules['Guardian_ID'])
				->rules('PWD', $this->_rules['PWD']);
	}
	
	/**
	 * 新规用户验证
	 * @param unknown $array
	 * @return Ambigous <$this, Validation>
	 */
	public function Validation_userGuardiandata(& $request)
	{		
		$data['ID'] =  $request->post('ID');
		$data['Guardian_ID'] =  $request->post('Guardian_ID');
		$data['PWD'] = $request->post('PWD');		
		$data['PWD'] =  empty($data['PWD'])?Model::factory('user')->creatPwd():$data['PWD'];
		$data['Available'] =  $request->post('Available');
		$data['Authority'] =  $request->post('Authority');
		$data['Remark'] =  $request->post('Remark');
		
		$table = Cache::instance()->get('table_user_guardian');
		
		return Validation::factory($data)
				->rules('Guardian_ID', $this->_rules['Guardian_ID'])
				->rule('Guardian_ID', 'Model_userGuardian::unique_userGuardianId_exists',array(':value',$table,$data['ID']))
				->rules('PWD', $this->_rules['PWD']);
	}
	
	
	/**
	 * 用户登录提交
	 * @param unknown $array
	 * @return multitype:boolean Ambigous <multitype:, multitype:string >
	 */
	public function checkLogin(& $array)
	{
		try {			
			$validation = $this->Validation_userGuardian($array);
			
			if($validation->check()){
				$table = Cache::instance()->get('table_user_guardian');				
				$user = $this->selectByKey($table,'Guardian_ID',$array['Guardian_ID']);
				$usernum = count($user);
				if($usernum<1){
					Request::factory('postprompt/loginError')->post('errors',array('入力アカウントは存在しません!'))->post('url',URL::site('login/index'))->execute();
				}elseif ($usernum>1){
					Request::factory('postprompt/loginError')->post('errors',array('入力したアカウントは重複です!'))->post('url',URL::site('login/index'))->execute();
				}else{
					if($user[0]['Available']!='1'){
						Request::factory('postprompt/loginError')->post('errors',array('入力したアカウントは無効です！'))->post('url',URL::site('login/index'))->execute();						
					}else if($user[0]['PWD']==$array['PWD']){
						$result = array('result'=>TRUE);
						Session::instance()->set('Guardian_ID', $array['Guardian_ID']);
						Session::instance()->set('PWD', $array['PWD']);
						Session::instance()->set('Authority', $user[0]['Authority']);
						
						$table_base	= Cache::instance()->get('table_child_1_base');
						$table_family = Cache::instance()->get('table_child_2_family');
						$step1_ID = DB::select("ID")->from($table_base)->where('child_Id','=',$array['Guardian_ID'])->execute()->get('ID');
						$Guardian_Name = DB::select(array(DB::expr('CONCAT(`Guardian1_FamilyName`,`Guardian1_GivenName`)'),'Guardian_Name'))->from($table_family)->where('Child_1_Base_ID','=',$step1_ID)->execute()->get("Guardian_Name");
						Session::instance()->set('NAME', $Guardian_Name);
						
						
						if(empty($user[0]['LASTLOGINTIME'])){
							Session::instance()->set('LASTLOGINTIME', '無');
						}else{
							Session::instance()->set('LASTLOGINTIME', date('Y/m/d H:i',$user[0]['LASTLOGINTIME']));
						}

						if($array['memory']){
							Cookie::set('USERID', $array['Guardian_ID'],604800);
							Cookie::set('PWD', $array['PWD'],604800);
						}else{
							Cookie::delete('USERID');
							Cookie::delete('PWD');
						}
						$this->update($table, array('LASTLOGINTIME'=>time()), 'Guardian_ID', $array['Guardian_ID']);
						
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
			$Guardian_ID = Session::instance()->get('Guardian_ID');
			$PWD = Session::instance()->get('PWD');
		
			$table = Cache::instance()->get('table_user_guardian');
			$user = $this->selectByKey($table,'Guardian_ID',$Guardian_ID);
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
	public static function unique_userGuardianId_exists( $values , $table , $ID)
	{	
		try {
			$sql = DB::select(DB::expr('COUNT(*) AS total_count'))
					->from($table)
					->where('Guardian_ID', '=', $values);
			if(!empty($ID)) $sql = $sql->and_where('ID', '!=', $ID);

			Cache::instance()->set('a', $sql);
			
			return !(bool)$sql->execute()
							->get('total_count');
		} catch (Exception $e) {
			$e->getMessage();
			exit;
		}
		
	}
	
	/**
	 * 添加修改保育者
	 * @param unknown $array
	 * @return multitype:boolean Ambigous <multitype:, multitype:string >
	 */
	public function userGuardianUpdate(& $request)
	{
		try {
			$data = $this->Validation_userGuardiandata($request);			
			if($data->check()){
				$table = Cache::instance()->get('table_user_guardian');
				
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
				

				$table_base	= Cache::instance()->get('table_child_1_base');
				$table_family = Cache::instance()->get('table_child_2_family');				
				$child_name = DB::select(array(DB::expr('CONCAT(`FamilyName`,`GivenName`)'),'Name'))->from($table_base)->where('child_Id','=',$vaules['Guardian_ID'])->execute()->get("Name");
				$step1_ID = DB::select("ID")->from($table_base)->where('child_Id','=',$vaules['Guardian_ID'])->execute()->get('ID');	
				$Guardian_Name = DB::select(array(DB::expr('CONCAT(`Guardian1_FamilyName`,`Guardian1_GivenName`)'),'Guardian_Name'))->from($table_family)->where('Child_1_Base_ID','=',$step1_ID)->execute()->get("Guardian_Name");

				
				return array('result'=>true,'ID'=>$ID,'Name'=>$child_name,'Guardian_Name'=>$Guardian_Name,'Guardian_ID'=>$vaules['Guardian_ID'],'PWD'=>$vaules['PWD']);
			}else{
				$data_errors =  $data->errors('post');
				return array('result'=>FALSE,'errors'=>$data_errors);
			}
			
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return array('result'=>FALSE,'errors'=>array('SYS異常があります。'));
		}
	}
	
	
	
	
	public function userGuardianDel($array)
	{
		try {
			$table = Cache::instance()->get('table_user_guardian');
			$total_rows = DB::delete($table)->where('ID', 'IN', $array)->execute();			
			return TRUE;
		}catch ( Database_Exception $e ){
			//echo $e->getMessage();
			return FALSE;
		}
	}
	
	
	/**
	 * 获取guardian的信息列表
	 */
	public function userGuardianList($name){		
		try {
			$table_guardian = 	Cache::instance()->get('table_user_guardian');
			$table_base	=		Cache::instance()->get('table_child_1_base');
			$table_family =		Cache::instance()->get('table_child_2_family');
			$sql = DB::select('guardian.*',array(DB::expr('CONCAT(`base`.`FamilyName`,`base`.`GivenName`)'),'Name'),array(DB::expr('CONCAT(`family`.`Guardian1_FamilyName`,`family`.`Guardian1_GivenName`)'),'Guardian_Name'))->from(array($table_guardian,'guardian'))
										->join(array($table_base,'base'),'left')->on('guardian.Guardian_ID','=','base.Child_Id')
										->join(array($table_family,'family'),'left')->on('base.ID','=','family.Child_1_Base_ID');
			if(!empty($name)){
				$sql = $sql->where(DB::expr('CONCAT(`base`.`FamilyName`,`base`.`GivenName`)'),'LIKE',"%{$name}%");
			}
			
			return $sql->order_by('guardian.Guardian_ID','ASC')->execute()->as_array();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	/**
	 * 判断 table_user_guardian 是否 已存在  Guardian_ID
	 * @param unknown $Guardian_ID
	 * @return boolean
	 */
	public function hasGuardianID($Guardian_ID)
	{
		try {
			$table = Cache::instance()->get('table_user_guardian');
			$hasNum =  DB::select(DB::expr('count(`ID`) AS `NUM`'))
						->from($table)
						->where('Guardian_ID','=',$Guardian_ID)
						->execute()
						->get('NUM');			
			return $hasNum==0?false:true;
		} catch (Exception $e) {
			return FALSE;
		}
	}	
	
}