<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Picshow extends Controller_Sellevel {	
	
	public function action_picShowIndex() {
		
		$body = View::factory('picShow/index');
		
		$this->response->body($body);			
		
	}
	
	/**
	 * 上传图片
	 */
	public function action_uploadImg(){
		
		$gp_l=array();
		$body = View::factory('picShow/uploadImg')
					->bind('fileList',$gp_l);
		$this->response->body($body);
	}
	
	/**
	 * 保存上传的图片
	 */
	public function action_saveImg(){
		
		if(array_key_exists('sel',$_GET)&&($_GET['sel']=='Pub')){
			$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
		}else{
			$model_pic=Model::factory('picShow');
			$USERID = Session::instance()->get('USERID');
			//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
			$ID=$model_pic->getID($USERID);
			$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
		}	
		$dir_short=$_GET['dir'];
		$dir_short_array=explode('/', $dir_short);
			
		//判断服务器编码
		$parameter=Kohana::$config->load('parameter');
		if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
			$dir_short='';
			///编码转换
			foreach ($dir_short_array as $key => $val){
				if(!empty($val)){					
					$temp=iconv("UTF-8", "shift-jis", $val);
					$dir_short.='/'.$temp;
				}
			}
		}
		
		
		$dir =$dir_base.'/'.$dir_short.'/';
		if(!is_dir($dir)){
			mkdir($dir,0777,TRUE);
		}
		
		$image = Image::factory($_FILES['file']['tmp_name']);

		list($usec, $sec) = explode(" ", microtime());
		list($zero,$num) = explode(".", $usec);
		$nameList = explode('.',$_FILES['file']['name']);
		$hz = array_pop($nameList);
		$imageName = $sec.$num.'.'.$hz;
		
		$image->resize(400, 400, Image::AUTO)->rotate($this->request->post('rotation'))->save($dir.$imageName);
		
	}
	
	/**
	 * 新规文件夹
	 */
	public function  action_addNewFile(){
		if ($this->request->is_ajax()){
			$sel=$this->request->post('sel');	
			if($sel=='Pub'){
				$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
			}else{
				$model_pic=Model::factory('picShow');
				$USERID = Session::instance()->get('USERID');
				//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
				$ID=$model_pic->getID($USERID);
				$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
			}	

			
			
			$fileName=$this->request->post('fileName');				
			$dir_short=	$this->request->post('dir_short');						
			$dir_short_array=explode('/', $dir_short);	
			
			$dir_short_code=$dir_short;
			
			//判断服务器编码
			$parameter=Kohana::$config->load('parameter');
			if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
				$dir_short_code='';
				///编码转换
				$fileName=iconv("UTF-8", "shift-jis", $fileName);
				foreach ($dir_short_array as $key => $val){
					if(!empty($val)){
							
						$temp=iconv("UTF-8", "shift-jis", $val);
						$dir_short_code.='/'.$temp;
					}
				}
			}
			
			//拼接地址			
			$dir=$dir_base.$dir_short_code.'/'.$fileName;
			$rst=false;
			
			if(!is_dir($dir)){
				$rst=mkdir($dir,0777,TRUE);
			}
			
			echo  json_encode(array('result'=>$rst));
		}
		
	}
	
	/**
	 * 重命名文件
	 */
	public function  action_reNameFile(){
		if ($this->request->is_ajax()){
			
			$sel=$this->request->post('sel');	
			if($sel=='Pub'){
				$dir_base=$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
			}else{
				$model_pic=Model::factory('picShow');
				$USERID = Session::instance()->get('USERID');
				//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
				$ID=$model_pic->getID($USERID);
				$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
			}	
			
			$oldFileName=$this->request->post('oldFileName');
			$newFileName=$this->request->post('newFileName');

			$dir_short=	$this->request->post('dir_short');
			
			$dir_short_array=explode('/', $dir_short);
			
			//服务器编码判断
			$parameter=Kohana::$config->load('parameter');
			if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
				$dir_short='';
				///编码转换
				$oldFileName=iconv("UTF-8", "shift-jis", $oldFileName);
				$newFileName=iconv("UTF-8", "shift-jis", $newFileName);
				foreach ($dir_short_array as $key => $val){
					if(!empty($val)){
							
						$temp=iconv("UTF-8", "shift-jis", $val);
						$dir_short.='/'.$temp;
					}
				}
			}
				
			//获取后缀
			$nameList = explode('.',$oldFileName);
			$hz='';
			if(count($nameList)>1){
				$hz = '.'.array_pop($nameList);
			}
			
			$dir_old=$dir_base.'/'.$dir_short.'/'.$oldFileName;
			$dir_new=$dir_base.'/'.$dir_short.'/'.$newFileName.$hz;
			$rst=false;
			$rst=rename($dir_old,$dir_new);
			echo  json_encode(array('result'=>$rst));
		}
	
	}
	/**
	 * 移动文件
	 */
	public function  action_moveFile(){
		if ($this->request->is_ajax()){
				
			$sel=$this->request->post('sel');	
			if($sel=='Pub'){
				$dir_base=$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
			}else{
				$model_pic=Model::factory('picShow');
				$USERID = Session::instance()->get('USERID');
				//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
				$ID=$model_pic->getID($USERID);
				$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
			}	
		
			$moveFile=$this->request->post('moveFile');
			$aimFile=$this->request->post('aimFile');
			
			$moveFilet_array=explode('/', $moveFile);
			$aimFile_array=explode('/', $aimFile);
				
			//服务器编码判断
			$parameter=Kohana::$config->load('parameter');
			if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
				$moveFile='';
				$aimFile='';
				///编码转换
				foreach ($moveFilet_array as $key => $val){
					if(!empty($val)){							
						$temp=iconv("UTF-8", "shift-jis", $val);
						$moveFile.='/'.$temp;
					}
				}
				foreach ($aimFile_array as $key => $val){
					if(!empty($val)){
						$temp=iconv("UTF-8", "shift-jis", $val);
						$aimFile.='/'.$temp;
					}
				}
			}
	
			$moveFile=$dir_base.$moveFile;
			$aimFile=$dir_base.$aimFile.'/';
			$rst=false;
			$rst=rename($moveFile,$aimFile);
			echo  json_encode(array('result'=>$rst));
		}	
	}
	/**
	 * 删除文件
	 */
	public function  action_delFile(){
		if ($this->request->is_ajax()){
					
			$sel=$this->request->post('sel');	
			if($sel=='Pub'){
				$dir_base=$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
			}else{
				$model_pic=Model::factory('picShow');
				$USERID = Session::instance()->get('USERID');
				//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
				$ID=$model_pic->getID($USERID);
				$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
			}	
			
			$delFile=$this->request->post('delFile');
			$delFile_array=explode('/', $delFile);
				
				
			//判断服务器编码
			$parameter=Kohana::$config->load('parameter');
			if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
				$delFile='';
				///编码转换

				foreach ($delFile_array as $key => $val){
					if(!empty($val)){
							
						$temp=iconv("UTF-8", "shift-jis", $val);
						$delFile.='/'.$temp;
					}
				}
			}
			
			$delFile=$dir_base.$delFile;

			$rst=false;

			if(is_dir($delFile)){
				Public_File::deleteDir($delFile);
				$rst=true;
			}else{
				$rst=unlink($delFile);
			}
			echo  json_encode(array('result'=>$rst));
		}
	
	}
	
	/**
	 * 私有的写真文件
	 */
	public function action_privatePic() {
		
		$model_pic=Model::factory('picShow');
		
		$USERID = Session::instance()->get('USERID');
		//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
		$ID=$model_pic->getID($USERID);
		
		$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/privatePic/".$ID;
		
		$dir_short=array_key_exists('dir', $_GET)?$_GET['dir']:'';
		$pre_dir=array_key_exists('pre_dir', $_GET)?$_GET['pre_dir']:'';
		
		//判断服务器编码
		$parameter=Kohana::$config->load('parameter');
		if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
			//编码转换
			$dir_short=iconv("UTF-8", "shift-jis", $dir_short);
			$pre_dir=iconv("UTF-8", "shift-jis", $pre_dir);
		}
		
		
	
		
		$dir=$dir_base.$dir_short;
		

		if (!file_exists($dir)){
			mkdir ($dir,0777,true);
		}		
		
		//图片数据整理
		//$files_list=array();
		$isFile=array();
		$noFile=array();		
		$files=scandir($dir);
		foreach ($files as $key =>$val){
			if($val!='.'&&$val!='..')
			{
				if(is_dir($dir.'/'.$val)){					
					$isFile[$val]=array('name'=>$val,'path'=>$dir.'/'.$val,'relative_path'=>'uploadfile/picShow/privatePic/'.$ID.'/'.$dir_short.'/'.$val,'time'=>fileatime($dir.'/'.$val));
				}else{
					$noFile[$val]=array('name'=>$val,'path'=>$dir.'/'.$val,'relative_path'=>'uploadfile/picShow/privatePic/'.$ID.'/'.$dir_short.'/'.$val,'time'=>fileatime($dir.'/'.$val));
				}
			}			
		}	
		
		$sort=array_key_exists('sort', $_GET)?$_GET['sort']:'';
		//是否排序:1表示升序，2表示降序
		if($sort==1){
			//对文件夹处理
			ksort($isFile);
			ksort($noFile);
		}
		if($sort==2){
			krsort($isFile);
			krsort($noFile);
		}
		
		$files_list=array('isFile'=>$isFile,'noFile'=>$noFile);
		//print_r($files_list);
		//exit();
	
		$body = View::factory('picShow/privatePic')
					->set('parameter',Kohana::$config->load('parameter'))
					->bind('dir_short',$dir_short)
					->bind('pre_dir',$pre_dir)
					->bind('parameter',$parameter)
					->bind('files_list',$files_list);
	
		$this->response->body($body);
	
	}
	/**
	 * 共有的写真文件
	 */
	public function action_publicPic() {
	
		$model_pic=Model::factory('picShow');
	
		$USERID = Session::instance()->get('USERID');
		//获取登陆者的数据库表中编号ID，用来命名私人图片文件夹名称
		$ID=$model_pic->getID($USERID);
	
		$dir_base=Kohana::$config->load('global.base_url')."/media/uploadfile/picShow/publicPic";
	
		$dir_short=array_key_exists('dir', $_GET)?$_GET['dir']:'';
		$pre_dir=array_key_exists('pre_dir', $_GET)?$_GET['pre_dir']:'';
		
		//判断服务器编码
		$parameter=Kohana::$config->load('parameter');
		if($parameter['SERVER_OSCODE']['Current']=="shift-jis"){
			//编码转换
			$dir_short=iconv("UTF-8", "shift-jis", $dir_short);
			$pre_dir=iconv("UTF-8", "shift-jis", $pre_dir);
		}
		
	
		$dir=$dir_base.$dir_short;
	
		if (!file_exists($dir)){
			mkdir ($dir,0777,true);
		}
	
		//图片数据整理
		//$files_list=array();
		$isFile=array();
		$noFile=array();
		$files=scandir($dir);
		foreach ($files as $key =>$val){
			if($val!='.'&&$val!='..')
			{
				if(is_dir($dir.'/'.$val)){
					$isFile[$val]=array('name'=>$val,'path'=>$dir.'/'.$val,'relative_path'=>'uploadfile/picShow/publicPic/'.$dir_short.'/'.$val,'time'=>fileatime($dir.'/'.$val));
				}else{
					$noFile[$val]=array('name'=>$val,'path'=>$dir.'/'.$val,'relative_path'=>'uploadfile/picShow/publicPic/'.$dir_short.'/'.$val,'time'=>fileatime($dir.'/'.$val));
				}
			}
		}
	
		$sort=array_key_exists('sort', $_GET)?$_GET['sort']:'';
		//是否排序:1表示升序，2表示降序
		if($sort==1){
			//对文件夹处理
			ksort($isFile);
			ksort($noFile);
		}
		if($sort==2){
			krsort($isFile);
			krsort($noFile);
		}
	
		$files_list=array('isFile'=>$isFile,'noFile'=>$noFile);
		//print_r($files_list);
		//exit();
	
		$body = View::factory('picShow/publicPic')
		->set('parameter',Kohana::$config->load('parameter'))
		->bind('dir_short',$dir_short)
		->bind('pre_dir',$pre_dir)
		->bind('files_list',$files_list);
	
		$this->response->body($body);
	
	}
	
	
	
	
}