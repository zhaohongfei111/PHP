<?php
echo View::factory('public/head');
?>

<body>
	 <?php
	$logohtml = '<div class="topright topright01 right">
						<p><a href="'.URL::site('index/index').'"><input type="button" value="メインメニューに戻る" /></a></p>
					</div>
					<div class="topright topright01 right">
						<p><input type="button" id="btn_Save" value="保 存" onclick="formSubmit()" /></p>
					</div>
					<div class="topright topright01 right">
						<p><input type="button" value="登降園簿の印刷" onclick="outputPDF()" /></p>
					</div>
					<div class="topright topright01 right">
						<p><input type="button" value="出席簿の印刷" onclick="outputPDF2()" /></p>
					</div>';	
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logohtml);	
	?>	
	<form id="mainForm" action="" method="post" >
	<div class="mainbox">
		<div class="titletop titletop25"><a id="Notice" href="javascript:void(0)" style="background-color:#fff">管理者からのお知らせあり</a><h2>登　 降 　園 　簿</h2><div class="clear"></div>
		</div>
	
		<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key_head =>$val_head){	
					$head_data=array();
 					foreach ($day_head as $k_head =>$v_head ){
							if($key_head== $v_head['Class']){
								$head_data=$v_head;}}?>					
		<div class="xdatelist8" id=<?php echo 'head_'.$key_head?> <?php if($key_head!='C1'){echo 'style="display:none"';}?>>
			<div class="datelist left">
				<ul>
					<li>
						<span>年月日</span>
						<?php
                        list($Y,$m,$d) = explode('-',$yearMonDay);
						?>
						<input name="txt_Date_Y" type="text" class="txt01 validate[required,custom[integer],min[2000],max[2050]]"style="width:100px;" value="<?php echo $Y;?>" /><em>年</em>
						<select name="select_Date_M" class="select01" >
							<?php foreach ($months as $key=>$val){?>
								<option <?php echo $val==$m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>月</em>
						<select name="select_Date_D" class="select01" >
							<?php foreach ($days as $key=>$val){?>
								<option <?php echo $val==$d?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>日</em>
						<input type="text" class="txt01" style="width:88px;" value="<?php echo $week;?>" /><em>日</em>
						<strong style="text-align:right;">引継ぎ時間(朝)</strong>
						<select name="select_Time_Morning" class="select01" style="width:75px" >
							<option value="">------</option>
							<?php foreach ($timeList as $key=>$val){?>
								<option <?php if(!empty($head_data)){ echo $val['objective']==$head_data['Time_Morning']?'selected':'';}?> value="<?php echo $val['objective'];?>"><?php echo $val['objective'];?></option>
							<?php }?>
						</select>															
						<span>園児数</span>
						<input name="txt_Morning_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($head_data)?'':$head_data['Morning_Num'];?>" />
						<span style="width:15px;">名</span>
					</li>
					<li><span>出席人数</span>
						<input name="txt_Present_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($head_data)?$num[$key_head]['in']:$head_data['Present_Num'];?>" />
						<span style="width:20px;">名</span>
						<span style="">欠席人数</span>
						<input name="txt_Absent_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($head_data)?$num[$key_head]['out']:$head_data['Absent_Num'];?>" />
						<span style="width:20px;">名</span>
						<span>合計人数</span>
						<input name="txt_All_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($head_data)?$num[$key_head]['in']+$num[$key_head]['out']:$head_data['All_Num'];?>" />
						<span style="width:20px;">名</span>
						<strong style="text-align:right;width:129px;">引継ぎ時間(夕)</strong>
						<select name="select_Time_Afternoon" class="select01" style="width:75px" >
							<option value="">------</option>
							<?php foreach ($timeList as $key=>$val){?>
								<option <?php if(!empty($head_data)){ echo $val['objective']==$head_data['Time_Afternoon']?'selected':'';}?> value="<?php echo $val['objective'];?>"><?php echo $val['objective'];?></option>
							<?php }?>
						</select>
						<span>園児数</span>
						<input name="txt_Afternoon_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($head_data)?'':$head_data['Afternoon_Num'];?>" />
						<span style="width:15px;">名</span>
					</li>
					
					<li>
						<span style="width:105px;">早出担当者名</span>
						<select name="select_Early_Charge_Name" class="select01" style="width:120px;margin-right:10px;" >
							<option value="">------</option>
							<?php foreach ($workerList as $key =>$val){?>
								<option value="<?php echo $val['NAME'];?>" <?php if(!empty($head_data)){echo $head_data['Early_Charge_Name']==$val['NAME']?'selected':'';}?>><?php echo $val['NAME'];?></option>
							<?php }?>
						</select>
						<span style="width:105px;">遅出担当者名</span>
						<select name="select_Later_Charge_Name" class="select01" style="width:120px;" >
							<option value="">------</option>
							<?php foreach ($workerList as $key =>$val){?>
								<option value="<?php echo $val['NAME'];?>" <?php if(!empty($head_data)){echo $head_data['Later_Charge_Name']==$val['NAME']?'selected':'';}?>><?php echo $val['NAME'];?></option>
							<?php }?>
						</select>
					</li>
					
				</ul>
				
			</div>
			<div class="right"><a style="display:inline-block;margin-top:5px;line-height:24px;background:#4472c4;color:#fff;border-radius:6px;padding:7px 14px;text-align:center;" href="javascript:void(0);" onclick="getNewNotice()">新規連絡<br/>確認</a></div>
		</div>
		<?php }?>
		
		
		<div class="wbut">
			<div class="topright right">
				<p><input type="button" value="午睡チェック" style="background:#3399ff" onClick="location.href='<?php echo URL::site('list/listNapCheck').URL::query(array('from'=>$controller.'/'.$action ,'yearMonDay'=>$yearMonDay));?>'"/></p>
			</div>
			<div class="topright right">
				<p><input type="button" value="室温・湿度チェック" style="background:#ffd966" onClick="location.href='<?php echo URL::site('list/listTempCheck').URL::query(array('from'=>$controller.'/'.$action ,'yearMonDay'=>$yearMonDay));?>'"/></p>
			</div>
		</div>
		
		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>				
			</div>
			<div class="maintable fxmaintable8 fxmaintable25">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2">番号</td>
							<td rowspan="2">苗字</td>
							<td rowspan="2">名前</td>
							<td rowspan="2">性別</td>
							<td rowspan="2">登園時間</td>
							<td class="bodyTemp" rowspan="2">体温</td>
							<td rowspan="2">与薬者</td>
							<td rowspan="2">降園時間</td>
							<td rowspan="2">迎え</td>
							<td class="bus" colspan="2">バス</td>
							<td rowspan="2">保護者連絡</td>
							<td rowspan="2">連絡内容</td>
							<td rowspan="2">備考</td>
						</tr>
							
						<tr class="bus">
							<td>行き</td>
							<td>帰り</td>
						</tr>
					</thead>
					<?php 
					foreach ($parameter['BASE_INFO']['CLASS'] as $key1 =>$val1){
						$No=1;
					?>
					<tbody id=<?php echo 'tab_con_'.$key1?> <?php if($key1!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>
						 <?php 
                       		 foreach ($child_Info as $key=>$val){
                                if($val['Class']==$key1){
                        ?>
						<tr>
							<td>
								<?php echo $No;?>
								<input type="hidden" name="hidden_Child_ID[]" value="<?php echo $val['ID']?>"/>
							</td>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
							<td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo $val['checkTime']['in_Time'];?></td>
							<td class="bodyTemp"><select name="select_Body_Temp[]" class="select01" style="width:85px;" >
								<option value="">----</option>
								<?php foreach($parameter['BODY_TEMPERATURE'] as $key_t => $val_t){?>
									<option  value="<?php echo $val_t;?>" <?php if(!empty($val['checkDetail'])){echo $val['checkDetail']['Body_Temp']==$val_t?'selected':'';}?>><?php echo $val_t;?></option>
								<?php }?>
							</select></td>
							
							<td>
								<select name="select_Eat_Medicine[]" class="select01" style="width:93px;" >
									<option value="">----</option>
									<?php foreach ($workerList as $key_wl =>$val_wl){?>
									<option value="<?php echo $val_wl['NAME'];?>" <?php if(!empty($val['checkDetail'])){echo $val['checkDetail']['Eat_Medicine']==$val_wl['NAME']?'selected':'';}?>><?php echo $val_wl['NAME'];?></option>
									<?php }?>
								</select>
							</td>
							
							<td><?php echo $val['checkTime']['out_Time'];?></td>
							<td><select name="select_Come_With[]" class="select01" style="width:70px;" >
								<option value="">-----</option>
								<?php foreach($parameter['WITH'] as $key_w => $val_w){?>
									<option value="<?php echo $key_w;?>" <?php if(!empty($val['checkDetail'])){echo $val['checkDetail']['Come_With']==$key_w?'selected':'';}?>><?php echo $val_w;?></option>
								<?php }?>
							</select></td>
							<td class="bus"><?php echo $val['Traffic_Way']=='Bus'?'〇':'--'?></td>
							<td class="bus"><?php echo $val['Leave_Way']=='Bus'?'〇':'--'?></td>
							<td <?php if(!empty($val['commInfo'])){echo 'class="yellowbg"';}?>><?php if(!empty($val['commInfo'])){
							 		  if($val['commInfo'][0]['Late']=='1'){echo '連絡あり';}//遅　刻
									  elseif($val['commInfo'][0]['Rest']=='1'){echo '連絡あり';}//お休み
									  elseif($val['commInfo'][0]['Other']=='1'){echo 'その他連絡';}}?>
							</td>
							<td <?php if(!empty($val['commInfo'])){echo 'class="yellowbg"';}?>><?php if(!empty($val['commInfo'])){
							 		  if($val['commInfo'][0]['Late']=='1'){echo '遅　刻';}//遅　刻
									  elseif($val['commInfo'][0]['Rest']=='1'){echo 'お休み';}//お休み
									  elseif($val['commInfo'][0]['Other']=='1'){echo 'その他連絡';}}?>
							</td>
							<td><input name="txt_Remark[]" type="text" class="txt01" style="width:70px;" value="<?php echo empty($val['checkDetail'])?'':$val['checkDetail']['Remark'];?>" /></td>
							<?php $No++;}}?>
						</tr>									
					</tbody>
					<?php }?>	
				</table>
			</div>
			
		</div>	
	</div>
	</form>
	
		<!--弹出框  -->
		 <div id="zhezhao" class="ui-overlay" style="display:none;">
			<div class="ui-widget-overlay" style="z-index:100;"></div>
			<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 812px; height: 222px; position: fixed;"></div>
		</div>
         <div class="dialog xnolist" style="display:none;" >
			<a href="javascript:void(0)" onclick="hideNotice()" style="position:absolute;top:-13px;right:-13px;"><img src="<?php echo $media;?>images/ctb01.png"/></a>
			<div id="noticeCont" class="xnolist" style="height:270px;text-align:left">
				
			</div>
		</div>
	
	
	<script type="text/javascript">
$(function(){
	$('#mainForm').validationEngine('attach');
	$('input[name="txt_Date_Y"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Date_M"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Date_D"]').on('change',this,function(){getChangeSearch()});
	$('.bus').attr('style','display:none');
	
});

function switchTab(n){  
	for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
		document.getElementById("tab_C" + i).className = "";  
		document.getElementById("tab_con_C"+i).style.display = "none";  

		$('#head_C'+i).attr('style','display:none');
	}  
	document.getElementById("tab_" + n).className = "cn";   
	document.getElementById("tab_con_" + n).style.display = "table-row-group";
	
	$('.bus').removeAttr('style');
	$('.bodyTemp').removeAttr('style');
	if(n=='C1'||n=='C2'||n=='C3'){
		$('.bus').attr('style','display:none');
	}
	if(n=='C5'||n=='C6'||n=='C7'){
		$('.bodyTemp').attr('style','display:none');
	}	
	$('#head_'+ n).removeAttr('style');		
}


function formSubmit(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	
	var tmpNo = tmpId.substring(4);
	var tmpHeader = 'head_'+tmpNo;
	var tmpbody = 'tab_con_'+tmpNo;	
	
	if($('#'+tmpbody+' tr').length<1) return false;

	var data = $('#'+tmpHeader+' input').serialize()+'&'+$('#'+tmpHeader+' select').serialize()+
				'&'+$('#'+tmpbody+' input').serialize()+'&'+$('#'+tmpbody+' select').serialize()+
				'&yearMonDay=<?php echo $yearMonDay;?>'+'&Class='+tmpNo;

	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('daycheck/dayCheckDetailUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: data,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){			
		   addSaveOverlay(1000,400,json['result']);			   
		   }
		});
}

function getNewNotice(){

	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('daycheck/getNewNotice');?>",
		   cache: false,
		   dataType: 'json',
		   data:'' ,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
				if(json['result']){
			    	$('#Notice').attr('style','background-color:red');
			    	$('#Notice').attr('onclick','showNotice()');
			    	regNotice(json['notice']['ToWorker']);
				}
		   }
		});
}

function showNotice(){
	$('#zhezhao').show(500);
	$('.dialog').show(500);
}
function hideNotice(){
	$('#zhezhao').hide(500);
	$('.dialog').hide(500);
	$('#Notice').attr('style','background-color:#fff');
	$('#Notice').removeAttr('onclick');
}
function regNotice(text) {	
	var reg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
    text = text.replace(reg, "<a href='$1$2' target='_blank'> $1$2</a>").replace(/\n/g, "<br />").replace("<br />","");	
    $('#noticeCont').html(text);
	}

function getChangeSearch()
{
	var txt_Day_Y = $('#mainForm input[name="txt_Date_Y"]').val();
	var select_Day_M = $('#mainForm select[name="select_Date_M"]').val();
	var select_Day_D = $('#mainForm select[name="select_Date_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	location.href="<?php echo URL::site('daycheck/dayCheckDetail').URL::query(array('yearMonDay'=>NULL,'from'=>NULL));?>?yearMonDay="+yearMonDay;
}

function outputPDF(){
	var txt_Day_Y = $('#mainForm input[name="txt_Date_Y"]').val();
	var select_Day_M = $('#mainForm select[name="select_Date_M"]').val();
	var select_Day_D = $('#mainForm select[name="select_Date_D"]').val();
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;
	
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	var tmpNo = tmpId.substring(4);
	if(tmpNo=='C1'){
		location.href="<?php echo URL::site('daycheck/dayCheckDetailPDF1').URL::query(array('yearMonDay'=>NULL,'from'=>NULL));?>?yearMonDay="+yearMonDay+"&class="+tmpNo;
	}
	if(tmpNo=='C2'||tmpNo=='C3'||tmpNo=='C4'){
		location.href="<?php echo URL::site('daycheck/dayCheckDetailPDF2').URL::query(array('yearMonDay'=>NULL,'from'=>NULL));?>?yearMonDay="+yearMonDay+"&class="+tmpNo;
	}
	if(tmpNo=='C5'||tmpNo=='C6'||tmpNo=='C7'){
		location.href="<?php echo URL::site('daycheck/dayCheckDetailPDF3').URL::query(array('yearMonDay'=>NULL,'from'=>NULL));?>?yearMonDay="+yearMonDay+"&class="+tmpNo;
	}
}

function outputPDF2(){
	var txt_Day_Y = $('#mainForm input[name="txt_Date_Y"]').val();
	var select_Day_M = $('#mainForm select[name="select_Date_M"]').val();

	var yearMon = txt_Day_Y + '-' + select_Day_M;
	
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	var tmpNo = tmpId.substring(4);
	if(tmpNo=='C1'||tmpNo=='C2'||tmpNo=='C3'){
		location.href="<?php echo URL::site('daycheck/dayCheckPresentPDF1').URL::query(array('yearMonDay'=>NULL,'from'=>NULL,'class'=>NULL));?>?yearMon="+yearMon+"&class="+tmpNo;
	}
	if(tmpNo=='C4'||tmpNo=='C5'||tmpNo=='C6'||tmpNo=='C7'){
		location.href="<?php echo URL::site('daycheck/dayCheckDetailprint2').URL::query(array('yearMonDay'=>NULL,'from'=>NULL,'class'=>NULL));?>?yearMon="+yearMon+"&class="+tmpNo;
	}
}
</script>
	
<style type="text/css">
.dialog{
	position: fixed;
	_position:absolute;
	z-index:100;
	top: 50%;
	left: 50%;
	margin: -141px 0 0 -201px;
	width: 500px;
	height:300px;
	border:1px solid #CCC;
	line-height: 280px;
	text-align:center;
	font-size: 14px;
	background-color:#F4F4F4;
}	
</style>
<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>
</body>
</html>