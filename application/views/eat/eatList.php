<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/backListLogoHtml'));	
	?>
	<div class="mainbox">
		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key1 =>$val1){?>
						<li id=<?php echo 'tab_'.$key1?> <?php if($key1=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key1?>')"><?php echo $val1?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<colgroup>
                        <col style="width:10%;"></col>
                        <col style="width:15%;"></col>
                        <col style="width:15%;"></col>
                        <col style="width:10%;"></col>
                        <col style="width:10%;"></col>
                        <col style="width:10%;"></col>
                        <col style="width:10%;"></col>
                        <col style="width:10%;"></col>
                        <col style="width:10%;"></col>
                    </colgroup>
                    <thead>
						<tr>
							<td>編集</td>
							<td>苗字</td>
							<td>名前</td>
							<td>性別</td>
							<td>クラス</td>
							<td>年齢</td>
							<td>生年月日</td>
							<td>認定区分</td>
							<td>給食の有無</td>
						</tr>
					</thead>
						<?php 
					foreach ($parameter['BASE_INFO']['CLASS'] as $key1 =>$val1){
					?>
					<tbody id=<?php echo 'tab_con_'.$key1?> <?php if($key1!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>						
						<?php 
                       		 foreach ($child_Info as $key=>$val){
                                if($val['Class']==$key1){
                        ?>
						
						<tr>
							<td><input type="button" value="確認" onClick="location.href='<?php echo URL::site('eat/eatEdit').URL::query(array('ID'=>$val['ID'],'eatShow'=>$key1));?>'"  /></td>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
							<td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']] ?></td>
							<td><?php echo $val['Age']?></td>
							<td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td><?php echo ((!empty($val['Child_EatDate']))&&($val['Child_EatDate']!='0000-00-00'))?$val['Child_EatDate'].'~':'未'?></td>
						</tr>	
						<?php }}?>				
					</tbody>
					<?php }?>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript">  
function switchTab(n){  
	for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
		document.getElementById("tab_C" + i).className = "";  
		document.getElementById("tab_con_C"+i).style.display = "none";  
	}  
	document.getElementById("tab_" + n).className = "cn";   
	document.getElementById("tab_con_" + n).style.display = "table-row-group"; 
	scrollAdjustment();	
}
<?php
if(array_key_exists('eatShow',$_GET)){
echo "$(function(){switchTab('{$_GET['eatShow']}')});";	
}
?>
</script> 
</body>
</html>