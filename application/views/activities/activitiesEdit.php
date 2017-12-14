<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
		<p><a href='.URL::site('activities/activitiesList').URL::query(array('ID'=>NULL)).'#tips'.$ID.'"><input type="button" value="課外活動一覧に戻る" /></a></p>
	</div>';
		
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logohtml);
	?>
 <form id="formMain" action="<?php echo URL::site('activities/activitiesInsert').URL::query();?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="hidden_ID" value="<?php echo $child_Info['ID']?>"/>
	<div class="mainbox">
		<div class="content">
			<div class="tabbox">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>苗字</td>
							<td>名前</td>
							<td>性別</td>						
							<td>クラス</td>
							<td>年齢</td>
							<td>生年月日</td>
							<td>認定区分</td>							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $child_Info['FamilyName']?><p><?php echo $child_Info['FamilyName_Spell']?></p></td>
							<td><?php echo  $child_Info['GivenName']?><p><?php echo $child_Info['GivenName_Spell']?></p></td>
							<td><?php if($child_Info['Sex']=='2'){echo '女';}if($child_Info['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($child_Info['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child_Info['Class']] ?></td>
							<td><?php echo $child_Info['Age']?></td>
							<td><?php echo $child_Info['Birthday']?><p><?php echo $child_Info['YearJap']?></p></td>
							<td><?php echo empty($child_Info['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$child_Info['Recog_Type']] ; ?></td>
						</tr>
					</tbody>
				</table>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>課外活動項目</td><td>履修状況</td><td>開始年月日</td>
						</tr>
					</thead>
					<tbody>
                    	<?php
						$info_Act_arr = empty($child_Info)?array():explode(';', $child_Info['Activities']);
                        foreach($activities as $key => $val){
							if(empty($child_Info['Activities_Date_'.$key])){
								$Y = $m = $d = '';
							}else{
								list($Y,$m,$d) = explode('-',$child_Info['Activities_Date_'.$key]);
								if($Y=='0000') $Y='';
								if($m=='00') $m='';
								if($d=='00') $d='';
							}
						?>
						<tr>
							<td><?php echo $val;?></td>
                            <td><input name="chbox_Activities[]" <?php if(in_array($key, $info_Act_arr)){ echo 'checked';}?> class="checkbox01" type="checkbox" value="<?php echo $key;?>"/></td>
							<td><input name="txt_Activities_Date_Y[]" type="text" class="txt01 validate[custom[integer],min[2000],max[2050]]" value="<?php echo $Y;?>" /><em>年</em>
						 		<input name="txt_Activities_Date_M[]" type="text" class="txt01 validate[custom[integer],min[1],max[12]]" value="<?php echo $m;?>" /><em>月</em>
								<input name="txt_Activities_Date_D[]" type="text" class="txt01 validate[custom[integer],min[1],max[31]]" value="<?php echo $d;?>" /><em>日</em>
							</td>
						</tr>						
						<?php	
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="databut">
				<input type="button" value="キャンセル" onClick="location.href='<?php echo URL::site('activities/activitiesList').URL::query(array('ID'=>NULL)).'#tips'.$ID;?>'" />
                <?php
                if($SELLEVEL!='Reader'){
				?>
				<input type="button" value="登録して保存" name="formSave" id="formSave" />
                <?php
				}
				?>
			</div>
		</div>
		
		
	</div>
</form>

<script >
$(function(){
	$('#formMain').validationEngine('attach');
	$('#formSave').bind('click',function(){$('#formMain').submit();});
	
	$('input[name="chbox_Activities[]"]').each(function(index, element) {
        $(this).on('click',this,function(){
			checkinput(index);
		});
		checkinput(index);
    });
	
})

function checkinput(index){
	if($('input[name="chbox_Activities[]"]:eq('+index+')').is(":checked")==true){
		$('input[name="txt_Activities_Date_Y[]"]:eq('+index+')').attr('disabled',false);
		$('input[name="txt_Activities_Date_M[]"]:eq('+index+')').attr('disabled',false);
		$('input[name="txt_Activities_Date_D[]"]:eq('+index+')').attr('disabled',false);
	}else{
		$('input[name="txt_Activities_Date_Y[]"]:eq('+index+')').attr('disabled',true).val("");
		$('input[name="txt_Activities_Date_M[]"]:eq('+index+')').attr('disabled',true).val("");
		$('input[name="txt_Activities_Date_D[]"]:eq('+index+')').attr('disabled',true).val("");
	}
}


</script>
</body>
</html>