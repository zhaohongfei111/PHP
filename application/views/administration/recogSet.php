<?php
	echo View::factory('public/head');
?>
<body class="bg01">

	<?php
	$logoHtml = '
				<div class="topright topright01 right">
					<p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保存"  onClick="formMainSave()"/></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoClass','logo logo01')
			->set('logoHtml',$logoHtml);	
	?>



	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('administration/recogSet_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="maintablebox">
			<div class="navbox">
				<ul>
					<li class="td01"><span>表示切替：</span><a href="<?php echo URL::site('administration/recogSet').URL::query(array('Status'=>'in'));?>" <?php echo $status=='in'?'style="background:#2f5597;"':'style="background:#ffccff;"';?> >在園児</a><a href="<?php echo URL::site('administration/recogSet').URL::query(array('Status'=>'not'));?>" <?php echo $status=='not'?'style="background:#2f5597;"':'style="background:#ffccff;"';?> >入園前の園児</a></li>
				</ul>
			</div>

			<div class="maintabletop<?php if(count($parameter['BASE_INFO']['CLASS'])>=9) echo ' maintabletop01'?>">
				<ul>				
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li  id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>	
				<div class="clear"></div>				
			</div>
			<div class="maintable table10">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>苗字</td>
							<td>名前</td>
							<td>性別</td>
							<td>クラス</td>
							<td>年齢</td>
							<td>生年月日</td>
							<td>入園日</td>
							<td>認定区分</td>
							<td>認定日</td>
						</tr>
					</thead>
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key_Class =>$val_Class){?>
						 <tbody id=<?php echo 'tab_con_'.$key_Class?> <?php if($key_Class!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?> >
							<?php foreach ($list as $key_list=>$val_list){
                  			if($val_list['Class']==$key_Class){?>
                  				<tr>
                  					<td><?php echo $val_list['FamilyName']?><p><?php echo $val_list['FamilyName_Spell']?></p></td>
									<td><?php echo  $val_list['GivenName']?><p><?php echo $val_list['GivenName_Spell']?></p></td>
									<td><?php if($val_list['Sex']=='2'){echo '女';}if($val_list['Sex']=='1'){echo '男';}?></td>
									<td><?php echo empty($val_list['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val_list['Class']] ?></td>
									<td><?php echo $val_list['Age']?></td>
									<td><?php echo $val_list['Birthday']?><p><?php echo $val_list['YearJap_Birth']?></p></td>								
									<td><?php echo $val_list['EnterDate']?><p><?php echo $val_list['YearJap_Enter']?></p></td>	
									<td>
                                    	<input type="hidden" name="ID[]" value="<?php echo $val_list['ID'];?>" >
                                    	<select name="select_Recog_Type[]" class="select01 validate[required]" >
											<option value="">--------</option>
											<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key_Recog=>$val_Recog) {?>
												<option value="<?php echo $key_Recog?>" <?php if($val_list['Recog_Type']==$key_Recog) echo 'selected';?>><?php echo $val_Recog?></option>
											<?php }?>
										</select>
									</td>	
									<td>
										<input name="txt_recog_date_Y[]" type="text" class="txt01 validate[required,custom[integer],min[2000],max[2050]]" style="width:60px;" value="<?php if(!empty($val_list['Recog_Date'])){echo substr($val_list['Recog_Date'], 0,4)=='0000'?'':substr($val_list['Recog_Date'], 0,4);}?>"><em>年</em>
										<select name="select_recog_date_M[]" class="select02 validate[required]">
											<option value="">----</option>
											<?php
								 				foreach ($months as $key_m=>$val_m){
											?>
											<option value="<?php echo $val_m?>" <?php if(!empty($val_list['Recog_Date'])){echo substr($val_list['Recog_Date'], 5,2)==$val_m?'selected':'';}?>><?php echo $val_m?></option>
											<?php }?>
										</select><em>月</em>
										<select name="select_recog_date_D[]" class="select02 validate[required]">
											<option value="">----</option>
											<?php 
												foreach ($days as $key_d=>$val_d){
											?>
											<option value="<?php echo $val_d?>" <?php if(!empty($val_list['Recog_Date'])){echo substr($val_list['Recog_Date'], 8,2)==$val_d?'selected':'';}?> ><?php echo $val_d?></option>
											<?php }?>
										</select><em>日</em>
									</td>									
                  				</tr>
                  				<?php }}?>           
						</tbody>
					<?php }?>
				</table>
			</div>
		</div>
		</form>
	</div>
	
	<script>
	$(document).ready(function() {
		$('#formMain').validationEngine('attach');
	});
	function switchTab(n){ 
		   <?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?> 
				document.getElementById("tab_"+"<?php echo $key?>").className = "";  
				document.getElementById("tab_con_"+"<?php echo $key?>").style.display = "none";  
			<?php }?>
			document.getElementById("tab_" + n).className = "cn";  
			document.getElementById("tab_con_" + n).style.display = "table-row-group"; 
		} 
	function formMainSave(){
		if($('select option:selected[value=""]').length > 0){
			var showId = $('select option:selected[value=""]:eq(0)').trigger('blur').parents('tbody').attr('id').substring(8);
			switchTab(showId);
			return false;
		}
		if($('input[name="txt_recog_date_Y[]"][value=""]').length > 0){
			var showId = $('input[name="txt_recog_date_Y[]"][value=""]:eq(0)').parents('tbody').attr('id').substring(8);
			switchTab(showId)
		}
		
		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/recogSet_Insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});	
	} 
	</script>
	
</body>
</html>