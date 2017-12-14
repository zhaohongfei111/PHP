<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
		<p><a href="'.URL::site('list/busList').URL::query(array('ID'=>NULL)).'"><input type="button" value="バス管理一覧に戻る" /></a></p>
	</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logohtml);
	?>	
	
	<form id="formMain" action ="<?php echo URL::site('list/busInsert').URL::query();?>" method = "post" enctype="multipart/form-data">
	<input type = "hidden" name = "hidden_ID" value = "<?php echo $child_Info['ID']?>">
	<div class="mainbox">
		<div class="content">
			<div class="tabbox">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>苗字</td><td>名前</td><td>性別</td><td>クラス</td><td>年齢</td><td>生年月日</td><td>認定区分</td>
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
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
					<thead>
						<tr>
							<td>項目</td><td>有無状况</td><td>開始年月曰</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<tr>
								<td>バス利用（登園時）</td>
								<td><input name="chkbox_goSchool" class="checkbox01" style="width:25px;height:25px;" type="checkbox" value="" <?php if(!empty($child_Info['GoSchool_Date'])&&$child_Info['GoSchool_Date']!='0000.00.00'){echo 'checked';}?>></td>
								<td><input name="txt_goSchool_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[2050]]" value="<?php if(!empty($child_Info['GoSchool_Date'])){echo substr($child_Info['GoSchool_Date'], 0,4)=='0000'?'':substr($child_Info['GoSchool_Date'], 0,4) ;}?>"><em>年</em>
									<input name="txt_goSchool_M" type="text" class="txt01 validate[custom[integer],min[1],max[12]]" value="<?php if(!empty($child_Info['GoSchool_Date'])){echo substr($child_Info['GoSchool_Date'], 0,4)=='0000'?'':substr($child_Info['GoSchool_Date'], 5,2) ;}?>"><em>月</em>
									<input name="txt_goSchool_D" type="text" class="txt01 validate[custom[integer],min[1],max[31]]" value="<?php if(!empty($child_Info['GoSchool_Date'])){echo substr($child_Info['GoSchool_Date'], 0,4)=='0000'?'':substr($child_Info['GoSchool_Date'], 8,2) ;}?>"><em>日</em></td>
							</tr>
							<tr>
								<td>バス利用（降園時）</td>
								<td><input name="chkbox_leaveSchool" class="checkbox01" style="width:25px;height:25px;" type="checkbox" value="" <?php if(!empty($child_Info['LeaveSchool_Date'])&&$child_Info['LeaveSchool_Date']!='0000.00.00'){echo 'checked';}?>></td>
								<td><input name="txt_leaveSchool_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[2050]]" value="<?php if(!empty($child_Info['LeaveSchool_Date'])){echo substr($child_Info['LeaveSchool_Date'], 0,4)=='0000'?'':substr($child_Info['LeaveSchool_Date'], 0,4) ;}?>"><em>年</em>
									<input name="txt_leaveSchool_M" type="text" class="txt01 validate[custom[integer],min[1],max[12]]" value="<?php if(!empty($child_Info['LeaveSchool_Date'])){echo substr($child_Info['LeaveSchool_Date'], 0,4)=='0000'?'':substr($child_Info['LeaveSchool_Date'], 5,2) ;}?>"><em>月</em>
									<input name="txt_leaveSchool_D" type="text" class="txt01 validate[custom[integer],min[1],max[31]]" value="<?php if(!empty($child_Info['LeaveSchool_Date'])){echo substr($child_Info['LeaveSchool_Date'], 0,4)=='0000'?'':substr($child_Info['LeaveSchool_Date'], 8,2) ;}?>"><em>日</em></td>
							</tr>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="databut">
				<input type="button" value="キャンセル" onClick="location.href='<?php echo URL::site('list/busList').URL::query(array('ID'=>NULL,'busShow'=>NULL));?>'"/>
				<?php
                if($SELLEVEL!='Reader'){
				?>
				<input type="button" value="登録して保存" name="formSave" id="formSave"/>
				 <?php
				}
				?>
			</div>
		</div>
		
		
	</div>
	</form>
	
	
	<script>
	$(function(){
		$('#formMain').validationEngine('attach');
		$('#formSave').bind('click',function(){$('#formMain').submit();});

		$('input[name="chkbox_goSchool"]').bind('click',function(){checkinput('chkbox_goSchool','txt_goSchool_Y','txt_goSchool_M','txt_goSchool_D');});
		checkinput('chkbox_goSchool','txt_goSchool_Y','txt_goSchool_M','txt_goSchool_D');

		$('input[name="chkbox_leaveSchool"]').bind('click',function(){checkinput('chkbox_leaveSchool','txt_leaveSchool_Y','txt_leaveSchool_M','txt_leaveSchool_D');});
		checkinput('chkbox_leaveSchool','txt_leaveSchool_Y','txt_leaveSchool_M','txt_leaveSchool_D');
	})
	
	function checkinput(checkName,inputName1,inputName2,inputName3)
{
	if($('input[name="'+checkName+'"]').is(":checked")==true){
		$('input[name="'+inputName1+'"]').attr('disabled',false);
		$('input[name="'+inputName2+'"]').attr('disabled',false);
		$('input[name="'+inputName3+'"]').attr('disabled',false);
	}else{
		$('input[name="'+inputName1+'"]').attr('disabled',true).val("");
		$('input[name="'+inputName2+'"]').attr('disabled',true).val("");
		$('input[name="'+inputName3+'"]').attr('disabled',true).val("");
	}
}
	
	</script>
</body>
</html>