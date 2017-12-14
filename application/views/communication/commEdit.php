<?php
	echo View::factory('public/head');
?>
<body>    
    <?php
	$logohtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'child_Id'=>NULL,'thisID'=>NULL,'from'=>NULL)).'#tips'.$_GET['thisID'].'"><input type="button" value="園児一覧に戻る" /></a></p>
				</div>
				<div class="topright toptxt right">
					<strong>現在の状況</strong><span>';//お休み
	if($info['Late']!=NULL){
	$logohtml .= '遅　刻';
	}else if($info['Rest']!=NULL){
	$logohtml .= 'お休み';	
	}			
	$logohtml .= '</span></div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox" style="margin-top:0;">
	<form id="formMain" action="<?php echo URL::site('communication/comm_update').URL::query();?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="ID" value="<?php echo $ID;?>">
		<input type="hidden" name="Child_Id" value="<?php echo $child['Child_Id'];?>">
		<div class="content">
			<div class="titletop"><h2>登降園状況ステータスの変更</h2></div>
			<div class="datebox">
				<div class="datelist datelist01">
					<h2>登降園連絡</h2>
				</div>
				<div class="datelist datelist01">
					<h2></h2>
					<ul>
						<li><span>対象園児</span><input  type="text" class="txt05" value="<?php echo $child['FamilyName'].$child['GivenName']?>" disabled></li>
					</ul>
				</div>
				<div class="datelist datelist08">
					<ul>
						<li><span>対象日付</span>
							<input name="txt_LeaveDate_Y" type="text" class="txt01"  style="width:90px;" value="<?php echo !empty($info)? substr($info['LeaveDate'],0,4):date("Y");?>" /><em>年</em>
							<select name="select_LeaveDate_M" class="select01" >
							<option value="">----</option>
							<?php foreach ($months as $key=>$val){?>
								<option value="<?php echo $val?>" <?php if(!empty($info)){ if(substr($info['LeaveDate'],5,2)==$val){echo "selected";} elseif ($val==date('m')) {echo "selected";}} ?>><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							
							<select name="select_LeaveDate_D" class="select01" >
							<option value="">----</option>
							<?php foreach ($days as $key=>$val){?>
								<option value="<?php echo $val?>"  <?php if(!empty($info)){ if(substr($info['LeaveDate'],8,2)==$val){echo "selected";} elseif ($val==date('d')) {echo "selected";}} ?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
						
							<em style="font-size:24px;margin-left:0;">~</em>
							
							<input name="txt_LeaveDate_End_Y" type="text" class="txt01" style="width:90px;"  value="<?php echo !empty($info)? substr($info['LeaveDate_End'],0,4):date("Y");?>" /><em>年</em>
							<select name="select_LeaveDate_End_M" class="select01" >
							<option value="">----</option>
							<?php foreach ($months as $key=>$val){?>
								<option value="<?php echo $val?>"  <?php if(!empty($info)){ if(substr($info['LeaveDate_End'],5,2)==$val){echo "selected";} elseif ($val==date('m')) {echo "selected";}} ?>><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							<select name="select_LeaveDate_End_D" class="select01" >
							<option value="">----</option>
							<?php foreach ($days as $key=>$val){?>
								<option value="<?php echo $val?>"  <?php if(!empty($info)){ if(substr($info['LeaveDate_End'],8,2)==$val){echo "selected";} elseif ($val==date('d')) {echo "selected";}} ?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
						</li>
						<li><span>連絡内容</span></li>
						<li><p>　　　　園に連絡する内容を選択してください。</p></li>
						<li><span></span><input name="chkbox_Late" class="checkbox01 checkOnly" id="gd" type="checkbox" <?php if(!empty($info)){if($info['Late']=='1') echo "checked";}?> value="1"/><span>遅　刻</span></li>
						<li><span></span><em>登園予定時間</em>
						<select name="select_Arrive_Time" class="select02" >
						<option value="">----</option>
						<?php foreach ($arriveList as $key=>$val) {?>
							<option <?php if(!empty($info)){if($info['Arrive_Time']==$val['standard']){echo "selected";}}?>  value="<?php echo $val['standard'];?>"><?php echo $val['objective']?></option>
						<?php  }?>
						</select>
							<em>給食要否</em><select name="select_Eat" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['EAT'] as $key =>$val){?>
								<option <?php if(!empty($info)){if($info['Eat']==$val){echo "selected";}}?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select>
						</li>
						<li><span></span><input name="chkbox_Rest" class="checkbox01 checkOnly" id="gd" <?php if(!empty($info)){if($info['Rest']=='1') echo "checked";}?> type="checkbox" value="1"/><span>お休み</span></li>
						<li><span></span><input name="chkbox_Other" class="checkbox01 checkOnly" id="gd" <?php if(!empty($info)){if($info['Other']=='1') echo "checked";}?> type="checkbox" value="1"/><strong>その他連絡</strong></li>
						<li><strong>理由(内容詳細)</strong></li>
                        <li><span></span><textarea name="txt_Reason" rows=""  cols=""><?php if(!empty($info)){echo $info['Reason'];}?></textarea></li>
						<li><span></span><input id="file" type="button" value="ファイルの添付" class="txt01" style="text-align:center; color:#A9A9A9;"/><i>ファイルの添付が必要である場合のみ添付をお願いします</i></li>
					</ul>
				</div>
				<div class="pagetxt08">
					<h3>[注意事項]</h3>
					<p>※ インフルエンザやその他感染症などの可能性がある場合、理由欄に記載のうえ、　必ず園にその旨を申し出てください。</p>
					<p>※ 園バス利用の園児は、遅刻もしくは欠席の場合、自動的にキャンセルとなります。</p>
					<p>※「その他連絡」を選択された場合、連絡事項を理由欄に記載ください。</p>
				</div>
				
				<div class="databut">
					<input type="button" value="変　更" onClick="formMainSave()" />
				</div>
				
			</div>
		</div>
			</form>
	</div>
	<script>
	$(function(){
		$('input[name="chkbox_Late"]').bind('click',function(){lateClick();});
		lateClick();
		/*$('#file').on('click',this,function(){
			$('input[name="file[]"]').trigger('click');	
		})*/
		
		$('#file').bind('click',function(){addOverlay(1200,1200,'<?php echo URL::site('communication/commFile').URL::query(array('comm_group'=>$info['comm_group']));?>')});
		
		$('.checkOnly').on('click',this,function(){checkOnly($(this))});
		
		$.mkDays({"year":$('input[name="txt_LeaveDate_Y"]'),
					"month":$('select[name="select_LeaveDate_M"]'),
					"day":$('select[name="select_LeaveDate_D"]')});
		$.mkDays({"year":$('input[name="txt_LeaveDate_End_Y"]'),
					"month":$('select[name="select_LeaveDate_End_M"]'),
					"day":$('select[name="select_LeaveDate_End_D"]')});
		
	})
	
	function checkOnly(obj){
		var checkboxArr = ['chkbox_Late','chkbox_Rest','chkbox_Edit','chkbox_Other'];
		var objname = obj.attr("name");
		if(obj.prop("checked")){
			checkboxArr.forEach(function(v){
				if(v!=objname){
					$('input[name="'+v+'"]').attr('checked',false);					
				}
			})
			if(objname!='chkbox_Late') lateClick();
		}		
	}
	
	function formMainSave(){	
		if($('.checkOnly:checked').length==0){
			alert('連絡内容を選択してください。');
			return false;
		}
	
		$('#formMain').submit();	
	}
	
	function lateClick()
	{
		if($('input[name="chkbox_Late"]').is(":checked")==true){
			$('select[name="select_Arrive_Time"]').attr('disabled',false);
			$('select[name="select_Eat"]').attr('disabled',false);
		}else{
			$('select[name="select_Arrive_Time"]').attr('disabled',true).val("");
			$('select[name="select_Eat"]').attr('disabled',true).val("");
		}
	}	
	</script>
    
    <link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script> 
</body>
</html>