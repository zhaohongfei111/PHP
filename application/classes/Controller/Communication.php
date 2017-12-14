<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Communication extends Controller_Sellevel {
	
	/**
	 * guardian 使用
	 */
	public function action_commMenu(){
		
		$this->response->body(View::factory('communication/commMenu'));
	}
	
	
	/**
	 * kindergarden 使用
	 * 转向listMenu页面
	 */
	public function action_listMenu(){
		$body = View::factory('communication/listMenu');
		$this->response->body($body);
	
	}
	
	public function action_comm() {
		
		$child_Id = Session::instance()->get('Guardian_ID');
		$model_child = Model::factory('child');
		$children = $model_child->step1_selectByChildId($child_Id);
		if(!empty($children['group'])){
			$children_list = $model_child->getGroupChild($children['group']);
		}else{
			$children_list = array($children);
		}
		
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
		$arriveList = Public_Times::arriveLeaveList();
		
		$body = View::factory('communication/communication')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('months',$months)
				->bind('days',$days)
				->bind('arriveList',$arriveList)
				->bind('children_list',$children_list);
		$this->response->body($body);	
	}

	//信息录入
	public function action_comm_insert()
	{
		if(Model::factory('communication')->comm_Data($this->request)){
			$body = View::factory('communication/comm_end');
			$this->response->body($body);
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('communication/comm'))->execute();
			return FALSE;
		}	
	}
	
	/**
	 * Communication/commEdit
	 * 管理员用于更新请假申请
	 */
	public function action_comm_update()
	{
		if(Model::factory('communication')->comm_update($this->request)){
			$this->redirect('communication/commEdit'.URL::query());
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('communication/commEdit').URL::query())->execute();
			return FALSE;
		}
	}
	
	
	public function action_pastTimeList()
	{
		$pastTime = array_key_exists('pastTime', $_GET)?$_GET['pastTime']:date('Y-m-d',strtotime("-1 day"));
		//获取迟到信息
		$late=Model::factory('communication')->commList_selectByKey('Late','1',$pastTime);
		//print_r($late);
		//获取休假信息
		$rest=Model::factory('communication')->commList_selectByKey('Rest','1',$pastTime);
		//print_r($rest);
		//获取其他信息
		$other=Model::factory('communication')->commList_selectByKey('Other','1',$pastTime);
		//print_r($other);
		
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
		
		$body = View::factory('communication/pastTimeList')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('late',$late)
					->bind('rest',$rest)
					->bind('other',$other)
					->bind('pastTime',$pastTime)
					->bind('months',$months)
					->bind('days',$days);
		
		$this->response->body($body);
	}

	//保护者联系信息一览	
	public function action_commList() 
	{
		//当前时间
		$nowTime=date("Y-m-d H:i:s");
		//获取迟到信息
		$late=Model::factory('communication')->commList_selectByKey('Late','1',date('Y-m-d'));	
		//print_r($late);
		//获取休假信息
		$rest=Model::factory('communication')->commList_selectByKey('Rest','1',date('Y-m-d'));	
		//print_r($rest);
		//获取其他信息
		$other=Model::factory('communication')->commList_selectByKey('Other','1',date('Y-m-d'));	
		//print_r($other);
		
		$body = View::factory('communication/commList')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('late',$late)
					->bind('rest',$rest)
					->bind('other',$other)
					->bind('nowTime',$nowTime);
		
		$this->response->body($body);
	}
	
	//迟到信息详细内容
	public function action_commLate() {
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID=$_GET['ID'];
			$late=Model::factory('communication')->commList_selectByKey('ID',$ID);
			
			$body = View::factory('communication/commLate')
			->set('parameter',Kohana::$config->load('parameter'))
							->bind('late_Info',$late[0]);
			$this->response->body($body);
		}
	}
	
	//请假信息详细内容
	public function action_commRest() {
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID=$_GET['ID'];
			$rest=Model::factory('communication')->commList_selectByKey('ID',$ID);
			$body = View::factory('communication/commRest')
			->set('parameter',Kohana::$config->load('parameter'))
			->bind('rest_Info',$rest[0]);
			$this->response->body($body);
		}
	}
	
	//其他信息详细内容
	public function action_commOther() {
		if(array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			$ID=$_GET['ID'];
			$other=Model::factory('communication')->commList_selectByKey('ID',$ID);
	
			$body = View::factory('communication/commOther')
						->set('parameter',Kohana::$config->load('parameter'))
						->bind('other_Info',$other[0]);
			$this->response->body($body);
		}
	}
	

	/**
	 * 幼儿园联络编辑
	 */
	public function action_commEdit(){
		
		if(array_key_exists('child_Id', $_GET)&&!empty($_GET['child_Id'])&&array_key_exists('ID', $_GET)&&!empty($_GET['ID'])){
			//communication表的ID
			$ID=$_GET['ID'];
			$child_Id=$_GET['child_Id'];
			$children = Model::factory('child')->step1_selectByChildId($child_Id);
			$months =Public_Times::getMonthList("m","");
			$days = Public_Times::getDaysList("","","d","");
			$arriveList = Public_Times::arriveLeaveList();
		
			$info = Model::factory('communication')->getComm_Info($ID);
			
			$body = View::factory('communication/commEdit')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('months',$months)
					->bind('days',$days)
					->bind('arriveList',$arriveList)
					->bind('child',$children)
					->bind('ID',$ID)
					->bind('info',$info);
		
			$this->response->body($body);
		}
	}
	
	/**
	 * 園への連絡
	 */
	public function action_commFile()
	{
		if(array_key_exists('comm_group',$_GET)){
			$fileName = $_GET['comm_group'];
		}else if(array_key_exists('fileRand',$_GET)){
			$fileName = $_GET['fileRand'];
			if(rand(1,30)%30==0){
				$this->clearImgCache($fileName);
			}
		}else{
			Request::factory('postprompt/notData')->post('url',URL::site('communication/comm'))->execute();
			exit;
		}
		
		$fileList = Kohana::list_files('comm/'.$fileName, array(Kohana::$config->load('global.base_url')."/media/uploadfile/"));		
		$body = View::factory('communication/commFile')
				->bind('fileList',$fileList);
		$this->response->body($body);
	
	}
	
	/**
	 * communication/comm
	 * 園への連絡
	 * 删除已经上传的文件
	 */
	public function action_delCommFile()
	{
		$img =  Kohana::$config->load('global.base_url')."/media/uploadfile/".$this->request->post('img');
		$result = array('del'=>false);
		if(file_exists($img)){
			if (unlink($img)){
				$result = array('del'=>TRUE,'id'=>$this->request->post('id'));
			}
		}
		echo json_encode($result);
	}
	
	/**
	 * communication/comm
	 * 園への連絡
	 * 保存上传文件
	 */
	public function action_saveFiles(){
		if(array_key_exists('comm_group',$_GET)){
			$fileName = $_GET['comm_group'];
		}else if(array_key_exists('fileRand',$_GET)){
			$fileName = $_GET['fileRand'];
		}else{
			exit;
		}
		$d = DIRECTORY_SEPARATOR;
		$dir = Kohana::$config->load('global.base_url')."{$d}media{$d}uploadfile{$d}comm{$d}{$fileName}{$d}";
		if(!is_dir($dir)){
			mkdir($dir,0777,TRUE);
		}
	
		$mimeTypes = array("image/gif","image/jpeg","image/pjpeg","image/bmp","image/png","application/pdf");
		
		if (in_array($_FILES["file"]["type"],$mimeTypes) && ($_FILES["file"]["size"] < 20000000))
		{
			if ($_FILES["file"]["error"] == 0)
			{			
						
				if (!file_exists($dir.$_FILES["file"]["name"]))
				{
					move_uploaded_file($_FILES["file"]["tmp_name"], $dir.$_FILES["file"]["name"]);
				}
			}
		}
	}
	
	
	/**
	 * communication/comm
	 * 園への連絡
	 * 清除那些长时间过期的文件
	 */
	private function clearImgCache($fileName)
	{
		$d = DIRECTORY_SEPARATOR;
		$base_dir = Kohana::$config->load('global.base_url')."{$d}media{$d}comm{$d}";
		if (false != ($handle = opendir (  $base_dir ))) {
			$i=0;
			while ( false !== ($file = readdir ( $handle )) ) {
				//去掉"“.”、“..”以及带“.xxx”后缀的文件
				if ($file != "." && $file != ".."&&!strpos($file,".")) {
					if(substr($file, 0,8)=='fileRand'){
						if($file!=$fileName){
							$createTime = substr($file, 8,10);
							if(time()-$createTime>259200){
								Public_File::deleteDir($base_dir.$file.$d);
							}
						}
					}
				}
			}
			//关闭句柄
			closedir ( $handle );
		}
	}
	
	
	
	
	/**
	 * 用品购买追加
	 */
	public function action_buyGoods() {
	
		$child_Id = Session::instance()->get('Guardian_ID');
		//$guardian_Name = Session::instance()->get('NAME');
		
		$model_child = Model::factory('child');
		$children = $model_child->step1_selectByChildId($child_Id);
		if(!empty($children['group'])){
			$children_list = $model_child->getGroupChild($children['group']);
		}else{
			$children_list = array($children);
		}		
		
		$months =Public_Times::getMonthList("m","");
		$days = Public_Times::getDaysList("","","d","");
		$arriveList = Public_Times::arriveLeaveList();
		$goodsInfo=Model::factory('communication')->getGoodsInfo();
	
		$body = View::factory('communication/commBuyGoods')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('months',$months)
					->bind('days',$days)
					->bind('arriveList',$arriveList)
					->bind('children_list',$children_list)
					->bind('goodsInfo',$goodsInfo);
		$this->response->body($body);
	}
	
	public function action_buyGoods_Insert() {
		if(Model::factory('communication')->buyGoods_Data($this->request)){
			$body = View::factory('communication/comm_end');
			$this->response->body($body);
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('communication/buyGoods'))->execute();
			return FALSE;
		}	
	}
	
	
	/**
	 * 9-6 園児情報編集の申請
	 */
	public function action_commApplication(){
	
		$child_Id = Session::instance()->get('Guardian_ID');
		$model_child = Model::factory('child');
		$children = $model_child->step1_selectByChildId($child_Id);
		if(!empty($children['group'])){
			$children_list = $model_child->getGroupChild($children['group']);
		}else{
			$children_list = array($children);
		}
		$body = View::factory('communication/commApplication')
				->set('parameter',Kohana::$config->load('parameter'))
				->bind('children_list',$children_list);
		$this->response->body($body);
	}
	
	public function action_application_Insert() {
		
		if(Model::factory('communication')->application_Data($this->request)){
			$body = View::factory('communication/comm_end');
			$this->response->body($body);
		}else{
			Request::factory('postprompt/postError')->post('errors',array("DB更新失敗！"))->post('url',URL::site('communication/commApplication'))->execute();
			return FALSE;
		}
	}
	
	
}