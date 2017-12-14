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
					<?php $firstClass=key($parameter['BASE_INFO']['CLASSForActivities']); ?>
					<?php foreach ($parameter['BASE_INFO']['CLASSForActivities'] as $key1 =>$val1){?>
						<li id=<?php echo 'tab_'.$key1?> <?php if($key1==$firstClass){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key1?>')"><?php echo $val1?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2" width="5%">編集</td>
							<td rowspan="2" width="8%">苗字</td>
							<td rowspan="2" width="8%">名前</td>
							<td rowspan="2" width="5%">性別</td>
							<td rowspan="2" width="8%">クラス</td>
							<td rowspan="2" width="8%">年齢</td>
							<td rowspan="2" width="10%">生年月日</td>
							<td rowspan="2" width="8%">認定区分</td>
							<td colspan="<?php echo count($activities);?>" >課外活動（開始年月日）</td>
						</tr>
						<tr class="tr01">
                        	<td width="<?php echo round(40/count($activities));?>%">
                        	<?php
                            echo implode('</td><td width="'.round(40/count($activities)).'%">',$activities);
							?>
							</td>
						</tr>
					</thead>
					<?php 
					
					foreach ($parameter['BASE_INFO']['CLASSForActivities'] as $key1 =>$val1){
					?>
					<tbody id=<?php echo 'tab_con_'.$key1?> <?php if($key1!=$firstClass){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>						
						<?php 
                        foreach ($child_Info as $key=>$val){
							$info_Act_arr = explode(';', $val['Activities']);
                        	if($val['Class']==$key1){
                        ?>
						<tr>
							<td><a name="tips<?php echo $val['ID'];?>"></a><input type="button" value="確認" onClick="location.href='<?php echo URL::site('activities/activitiesEdit').URL::query(array('ID'=>$val['ID'],'actShow'=>$key1));?>'" /></td>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
							<td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']] ?></td>
							<td><?php echo $val['Age']?></td>
							<td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
                            <?php
                            foreach($activities as $key_2 => $val_2){
							?>
                            <td><?php echo in_array($key_2,$info_Act_arr)?$val['Activities_Date_'.$key_2]=='0000-00-00'?'':$val['Activities_Date_'.$key_2].'~':'<em>未履修</em>';?></td>
                            <?php
							}
							?>
						</tr>
						<?php }}?>
					</tbody>
					<?php }?>										
				</table>
			</div>
			
		</div>
		
		
	</div>
<script type="text/javascript">  
var classList=new Array();
<?php $i=0; foreach ($parameter['BASE_INFO']['CLASSForActivities'] as $keyC =>$valC){ ?>	
classList[<?php echo $i;?>]="<?php echo $keyC;?>";
<?php $i++;}?>

							
function switchTab(n){  
	for(var k in classList){
		$('#tab_' + classList[k]).removeClass();
		$('#tab_con_' + classList[k]).hide();
	}
	$('#tab_' + n).addClass('cn');
	$('#tab_con_' + n).css('display','table-row-group');
	scrollAdjustment();	
}
<?php
if(array_key_exists('actShow',$_GET)){
echo "$(function(){switchTab('{$_GET['actShow']}')});";	
}
?>
</script> 
</body>
</html>