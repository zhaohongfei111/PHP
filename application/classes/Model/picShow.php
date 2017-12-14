<?php
class Model_picShow extends Model_DBCommon{	
	
	/**
	 * 在user表中根据USERID获取ID，用来命名私人文件夹名
	 * @param unknown $USERID
	 */
	public function getID($USERID){
		$table = Cache::instance()->get('table_user');
		
		try {
			$rst=DB::select('ID')->from($table)->where('USERID','=',$USERID)->execute()->get('ID');
			return $rst;
			
		} catch (Exception $e) {
			$e->getMessage();
		}
			
	}
	
	
	
	
	
}