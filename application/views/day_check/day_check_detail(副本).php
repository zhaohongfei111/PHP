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
						<p><input type="button" value="印　刷" /></p>
					</div>';	
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logohtml);	
	?>	
	<form id="mainForm" action="" method="post" >
	<div class="mainbox">
		<div class="titletop titletop25"><a href="###">管理者からのお知らせあり</a><h2>登　 降 　園 　簿</h2></div>
	
		<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key_head =>$val_head){?>						
		<div class="xdatelist8" id=<?php echo 'head_'.$key_head?> <?php if($key_head!='C1'){echo 'style="display:none"';}?>>
			<div class="datelist">
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
						<input type="text" class="txt01" style="width:70px;" value="<?php echo $week;?>" /><em>曜日</em>
						<strong style="text-align:right;">引継ぎ時間(朝)</strong>
						<input name="txt_Time_Morning" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Time_Morning'];?>" />
						<span>園児数</span>
						<input name="txt_Morning_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Morning_Num'];?>" />
						<span>名</span>
					</li>
					<li><span>出席人数</span>
						<input name="txt_Present_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Present_Num'];?>" />
						<span style="width:20px;">名</span>
						<span style="">欠席人数</span>
						<input name="txt_Absent_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Absent_Num'];?>" />
						<span style="width:20px;">名</span>
						<span>合計人数</span>
						<input name="txt_All_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['All_Num'];?>" />
						<span style="width:20px;">名</span>
						<strong style="text-align:right;width:129px;">引継ぎ時間(夕)</strong>
						<input name="txt_Time_Afternoon" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Time_Afternoon'];?>" />
						<span>園児数</span>
						<input name="txt_Afternoon_Num" type="text" class="txt01" style="width:70px;" value="<?php echo empty($day_head)?'':$day_head['Afternoon_Num'];?>" />
						<span>名</span>
					</li>
					<li>
						<span style="width:105px;">早出担当者名</span>
						<select name="select_Early_Charge_Name" class="select01" style="width:120px;margin-right:10px;" >
							<option value="">------</option>
							<?php foreach ($workerList as $key =>$val){?>
								<option value="<?php echo $val['NAME'];?>" <?php if(!empty($day_head)){echo $day_head['Early_Charge_Name']==$val['NAME']?'selected':'';}?>><?php echo $val['NAME'];?></option>
							<?php }?>
						</select>
						<span style="width:105px;">遅出担当者名</span>
						<select name="select_Later_Charge_Name" class="select01" style="width:120px;" >
							<option value="">------</option>
							<?php foreach ($workerList as $key =>$val){?>
								<option value="<?php echo $val['NAME'];?>" <?php if(!empty($day_head)){echo $day_head['Later_Charge_Name']==$val['NAME']?'selected':'';}?>><?php echo $val['NAME'];?></option>
							<?php }?>
						</select>
					</li>
				</ul>
			</div>
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
			<div class="maintabletop <?php if(count($parameter['BASE_INFO']['CLASS'])>=9) echo ' maintabletop01'?>">
				<ul>
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
			</div>
			<div class="maintable">
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
							
							<td><input name="txt_Eat_Medicine[]" type="text" class="txt01" style="width:70px;" value="<?php echo empty($val['checkDetail'])?'':$val['checkDetail']['Eat_Medicine']?>" /></td>
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
							 		  if($val['commInfo'][0]['Late']=='1'){echo '遅　刻';}
									  elseif($val['commInfo'][0]['Rest']=='1'){echo 'お休み';}
									  elseif($val['commInfo'][0]['Other']=='1'){echo 'その他連絡';}}?>
							</td>
							<td <?php if(!empty($val['commInfo'])){echo 'class="yellowbg"';}?>><?php echo empty($val['commInfo'])?'':$val['commInfo'][0]['Reason'];?></td>
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
	<script type="text/javascript">
$(function(){
	$('#mainForm').validationEngine('attach');
	$('input[name="txt_Date_Y"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Date_M"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Date_D"]').on('change',this,function(){getChangeSearch()});
	$('.bus').attr('style','display:none');
	
	$('input[name="txt_Time_Morning"]').on('click',function(){
		setTimes(this);
	});
	$('input[name="txt_Time_Afternoon"]').on('click',function(){
		setTimes(this);
	});
});

function switchTab(n){  
	for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
		document.getElementById("tab_C" + i).className = "";  
		document.getElementById("tab_con_C"+i).style.display = "none";  
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
}


function formSubmit(){
	$('#btn_Save').attr('disabled',"true");
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	var tmpNo = tmpId.substring(4);
	var tmpHeader = 'head'+tmpNo;
	var tmpbody = 'tab_con_'+tmpNo;	
	
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('daycheck/dayCheckDetailUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: $('#mainForm').serialize(),
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			   				 
			addSaveOverlay(1000,400,json['result']);			   
		   }
		});
}
function setTimes(obj){
	if($(obj).val()==""){
		var myDate = new Date();
		var hours = myDate.getHours();  
		var minutes = myDate.getMinutes(); 
		$(obj).val(checkTime(hours)+':'+checkTime(minutes));
	}
}
function checkTime(i)
{
	if (i<10){i="0" + i}
  	return i
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
	location.href="<?php echo URL::site('daycheck/dayCheckDetail').URL::query(array('yearMonDay'=>NULL));?>?yearMonDay="+yearMonDay;
}

function outputPDF(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	var tmpNo = tmpId.substring(4);
	var tmpHeader = 'tab_header_'+tmpNo;
	var tmpbody = 'tab_con_'+tmpNo;	
}
</script>
	
</body>
</html>