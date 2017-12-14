<?php
if($val['checkInfo']['href']==false){
	echo $val['checkInfo']['state'];
}else{
?>
<a href="<?php echo URL::site('Communication/commEdit').URL::query(array('child_Id'=>$val['Child_Id'],'ID'=>$val['checkInfo']['href'],'thisID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><?php echo $val['checkInfo']['state'];?></a>
<?php	
}
?>