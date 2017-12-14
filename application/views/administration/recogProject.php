<?php
	echo View::factory('public/head');
?>
<body class="bg01">
	<?php	
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()" /></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>


	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('administration/RecogPro_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
    	<input type="hidden" name="switchTab" value="">
		<div class="maintablebox">
			<div class="xinnavbox">
				<span>表示切替：</span><em class="a1"><a href="<?php echo URL::site('administration/RecogProject').URL::query(array('Status'=>'in'));?>" <?php echo $status=='in'?'class="on"':'';?>>在園児</a></em><em class="a2"><a href="<?php echo URL::site('administration/RecogProject').URL::query(array('Status'=>'not'));?>" <?php echo $status=='not'?'class="on"':'';?>>入園前の園児</a></em>
			</div>
			<div class="maintabletop fmaintabletop01">
				<ul>				
					<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?>
						<li  id=<?php echo 'tab_'.$key?> <?php if($key=='R1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="maintable maintable11 fxmaintable8">
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
							<td>入园日</td>
							<td class="tt01">認定ランク</td>
						</tr>
					</thead>
					<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key1 =>$val1){?>
                    <tbody id=<?php echo 'tab_con_'.$key1?> <?php if($key1!='R1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?> >
                  		<?php foreach ($list as $key=>$val){
                  			if($val['Recog_Type']==$key1){?>
                  				<tr>
                  					<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
									<td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
									<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
									<td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']] ?></td>
									<td><?php echo $val['Age']?></td>
									<td><?php echo $val['Birthday']?><p><?php echo $val['YearJap_Birth']?></p></td>
									<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
									<td><?php echo $val['EnterDate']?><p><?php echo $val['YearJap_Enter']?></p></td>
									<td><select name="select_Recog_project[<?php echo $val['Recog_ID']?>]" class="select02" >
											<option value="">-----</option>
											<?php if($val['Recog_Type']=='R1'){
													foreach ($parameter['RECOG_1'] as $key2=>$val2){?>
														<option <?php echo $val['Recog_Project']==$key2?'selected':''?>  value="<?php echo $key2?>"><?php echo $val2?></option>
											<?php }}else{
													foreach ($parameter['PROJECT'] as $key3=>$val3){?>
														<option <?php echo $val['Recog_Project']==$key3?'selected':''?> value="<?php echo $key3?>"><?php echo $val3?></option>											
											<?php }}?>
									</select></td>
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
	function switchTab(n){ 
		   <?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?> 
				document.getElementById("tab_"+"<?php echo $key?>").className = "";  
				document.getElementById("tab_con_"+"<?php echo $key?>").style.display = "none";  
			<?php }?>
			document.getElementById("tab_" + n).className = "cn";  
			document.getElementById("tab_con_" + n).style.display = "table-row-group"; 
			$('input[name="switchTab"]').val(n);
		}  

	function formMainSave(){			
		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/RecogPro_Insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});	
	}
	<?php
	if(array_key_exists('switchTab',$_GET)){
	?>
	$(function(){
		switchTab("<?php echo $_GET['switchTab']?>")	
	});
	<?php
	}
	?>

	</script>
</body>
</html>