<?php
class Public_File{	
	public static function deleteDir($dir)
	{
		if (is_dir($dir)) {
			if ($dp = opendir($dir)) {
				while (($file=readdir($dp)) != false) {
					if (is_dir($dir.'/'.$file) && $file!='.' && $file!='..') {
						self::deleteDir($dir.'/'.$file);
					} else if($file!='.' && $file!='..'){
						unlink($dir.'/'.$file);
					}
				}
				closedir($dp);
			} else {
				exit('Not permission');
			}
			rmdir($dir);
		}
	}
	
	
}