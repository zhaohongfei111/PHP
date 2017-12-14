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
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key=> $val){ ?>
					<li <?php if($key=='C1') echo 'class = "cn"'?> id= <?php echo 'tab_'.$key?>><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>編 集</td><td>苗字</td><td>名前</td><td>性別</td><td>クラス</td><td>年齢</td><td>生年月日</td><td>認定区分</td><td>バス（登園時）利用の有無</td><td>バス（降園時）利用の有無</td>
						</tr>
					</thead>
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key=>$val){?>
					<tbody id=<?php echo 'tab_con_'.$key?> <?php if($key!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>
						<?php foreach ($child_Info as $key1 => $val1){
								if($child_Info[$key1]['Class']==$key){
							?>
						<tr>
							<td><input type="button" value="編 集" onClick="location.href='<?php echo URL::site('list/busEdit').URL::query(array('ID'=>$val1['ID'],'busShow'=>$key));?>'" /></td>
							<td><?php echo $val1['FamilyName']?><p><?php echo $val1['FamilyName_Spell']?></p></td>
							<td><?php echo $val1['GivenName']?><p><?php echo $val1['GivenName_Spell']?></p></td>
							<td><?php if($val1['Sex']=='2'){echo '女';}if($val1['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val1['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val1['Class']]?></td>
							<td><?php echo $val1['Age']?></td>
							<td><?php echo $val1['Birthday']?><p><?php echo $val1['YearJap']?></p></td>
							<td><?php echo empty($val1['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val1['Recog_Type']] ; ?></td>
							<td><?php  if($val1['GoSchool_Date']==''||$val1['GoSchool_Date']=='0000.00.00'){echo'無';}if($val1['GoSchool_Date']!=''&&$val1['GoSchool_Date']!='0000.00.00'){echo $val1['GoSchool_Date'].'~';}?></td>
							<td><?php  if($val1['LeaveSchool_Date']==''||$val1['LeaveSchool_Date']=='0000.00.00'){echo'無';}if($val1['LeaveSchool_Date']!=''&&$val1['LeaveSchool_Date']!='0000.00.00'){echo $val1['LeaveSchool_Date'].'~';}?></td>
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
			if(array_key_exists('busShow',$_GET)){
			echo "$(function(){switchTab('{$_GET['busShow']}')});";	
			}
			?>
	</script>
	
</body>
</html>