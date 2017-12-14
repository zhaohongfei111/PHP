<?php
echo View::factory('public/head');
?>
<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
?>
	<div class="mianbox" style="margin-top:0;">
	<form id="formMain" action="<?php echo URL::site('communication/comm_insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="content">
			<div class="titletop"><h2>園への連絡</h2></div>
			<div class="datebox">
				<div class="datelist datelist01">
					<h2>登降園連絡</h2>
				</div>
				<div class="datelist datelist01">
					<h2></h2>
					<ul>
						<li><span>対象園児</span>	</li>		
						<?php foreach ($children_list as $key=>$val){?>
       						<li>
                            	<input name="chkbox_Child_Id[]" class="checkbox01"  type="checkbox" value="<?php echo $val['Child_Id']?>" checked/>
                                <input type="text" class="txt05" value="<?php echo $val['FamilyName'].$val['GivenName']?>"/>
                            </li>     
     					<?php }?>		
					</ul>
				</div>
				<div class="datelist datelist08">
					<ul>
						<li><span>対象日付</span>
							<input name="txt_LeaveDate_Y" type="text" class="txt01"  style="width:80px;" value="<?php echo date("Y");?>" /><em>年</em>
							<select name="select_LeaveDate_M" class="select01" >
							<option value="">----</option>
							<?php foreach ($months as $key=>$val){?>
								<option value="<?php echo $val?>" <?php if($val==date('m')) echo "selected";?>><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							<select name="select_LeaveDate_D" class="select01" >
							<option value="">----</option>
							<?php foreach ($days as $key=>$val){?>
								<option value="<?php echo $val?>" <?php if($val==date('d')) echo "selected";?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
							<em>~</em>
							
							<input name="txt_LeaveDate_End_Y" type="text" class="txt01" style="width:80px;"  value="<?php echo date("Y");?>" /><em>年</em>
							<select name="select_LeaveDate_End_M" class="select01" >
							<option value="">----</option>
							<?php foreach ($months as $key=>$val){?>
								<option value="<?php echo $val?>" <?php if($val==date('m')) echo "selected";?>><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							<select name="select_LeaveDate_End_D" class="select01" >
							<option value="">----</option>
							<?php foreach ($days as $key=>$val){?>
								<option value="<?php echo $val?>" <?php if($val==date('d')) echo "selected";?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
						</li>
						<li><span>連絡内容</span></li>
						<li><p>　　　　園に連絡する内容を選択してください。</p></li>
						<li><span></span><input name="chkbox_Late" class="checkbox01 checkOnly"  type="checkbox" value="1"/><span>遅　刻</span></li>
						<li><span></span><em>登園予定時間</em>
						<select name="select_Arrive_Time" class="select02" >
						<option value="">----</option>
						<?php foreach ($arriveList as $key=>$val) {?>
							<option  value="<?php echo $val['standard'];?>"><?php echo $val['objective']?></option>
						<?php  }?>
						</select>
							<em>給食要否</em><select name="select_Eat" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['EAT'] as $key =>$val){?>
								<option value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select>
						</li>
						<li><span></span><input name="chkbox_Rest" class="checkbox01 checkOnly" type="checkbox" value="1"/><span>お休み</span></li>
						<li><span></span><input name="chkbox_Other" class="checkbox01 checkOnly" type="checkbox" value="1"/><strong>その他連絡</strong></li>
						<li><strong>理由(内容詳細)</strong></li>
                        <li><span></span><textarea name="txt_Reason" rows="" cols=""></textarea></li>
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
					<input type="button" value="送　信"  onClick="formMainSave()"/>
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
		
		$('#file').bind('click',function(){addOverlay(1200,1200,'<?php echo URL::site('communication/commFile').URL::query();?>')});
		
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
		if($('input[name="chkbox_Child_Id[]"]:checked').length==0){
			alert('対象園児を選択してください。');
			return false;
		}
		if($('.checkOnly:checked').length==0){
			alert('連絡内容を選択してください。');
			return false;
		}		
		$('#formMain').submit();	
	}
	
	function lateClick()
	{
		if($('input[name="chkbox_Late"]').is(":checked")==true){
			$('select[name="select_Arrive_Time"]').attr('disabled',false).val("");
			$('select[name="select_Eat"]').attr('disabled',false).val("");
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