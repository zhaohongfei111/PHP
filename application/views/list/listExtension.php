<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/listLogoHtml'));	
	?>	
	<div class="mainbox">
		<?php
		echo View::factory('list/pageTop');
		?>
	</div>
		<form id="MainForm" action="" method="post" >
		<div class="fdatevox mainbox">
				<div class="datelist fdatelist left" style="width:430px;">
					<ul>
						<li>
                        <?php
                        list($Y,$m,$d) = explode('-',$yearMonDay);
						?>
						<input name="txt_Day_Y" type="text" class="txt01 validate[required,custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:100px;" value="<?php echo $Y;?>" /><em>年</em>
						<select name="select_Day_M" class="select01" >
							<?php foreach ($months as $key=>$val){?>
								<option <?php echo $val==$m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>月</em>
						<select name="select_Day_D" class="select01" >
							<?php foreach ($days as $key=>$val){?>
								<option <?php echo $val==$d?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>日</em>
						<input type="text" class="txt01" style="width:40px;" value="<?php echo $week;?>" /><em>日</em>
					</li>
					</ul>
				</div>
				<div class="datelist fdatelist left"style="width:290px;">
					<ul>
						<li>
							<p>子どもの様子・評価・改善</p>
							<input id="txt_Suggestion" name="txt_Suggestion" type="text" class="txt05" value="<?php echo empty($ListR2)?'':$ListR2['0']['Suggestion'];?>" style="width:240px;">
							<input id="txt_SuggestionR3" name="txt_Suggestion" type="text" class="txt05" value="<?php echo empty($ListR3)?'':$ListR3[0]['Suggestion'];?>" style="width:240px; display:none">
						</li>
					</ul>
				</div>
				<div id="check_point" class="datelist fdatelist left" style="width:450px;">
					<h3>点検事項</h3>
					<ul>
						<li>
						<?php $check_point=array();
							  if(!empty($ListR2)&&!empty($ListR2['0']['Check_Point'])){$check_point=explode(';', $ListR2['0']['Check_Point']);}?>
							  
							<label><em>沐浴室</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="1" <?php echo in_array('1', $check_point)?'checked':'';?>></label>
							<label><em>電気</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="2" <?php echo in_array('2', $check_point)?'checked':'';?>></label>
							<label><em>エアコン</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="3" <?php echo in_array('3', $check_point)?'checked':'';?>></label>
							<label><em>水道</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="4" <?php echo in_array('4', $check_point)?'checked':'';?>></label>
							<label><em>配膳室</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="5" <?php echo in_array('5', $check_point)?'checked':'';?>></label>
							<label><em>カーペット</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="6" <?php echo in_array('6', $check_point)?'checked':'';?>></label>
							<label><em>ベープ</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="7" <?php echo in_array('7', $check_point)?'checked':'';?>></label>
							<label><em>扇風機</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="8" <?php echo in_array('8', $check_point)?'checked':'';?>></label>
							<label><em>戸締り</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="9" <?php echo in_array('9', $check_point)?'checked':'';?>></label>
						</li>
					</ul>
				</div>
				
				<div id="check_pointR3" class="datelist fdatelist left" style="width:450px; display:none">
					<h3>点検事項</h3>
					<ul>
						<li>
						<?php $check_point=array();
							  if(!empty($ListR3)&&!empty($ListR3[0]['Check_Point'])){$check_point=explode(';', $ListR3[0]['Check_Point']);}?>
							  
							<label><em>沐浴室</em><input  name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="1" <?php echo in_array('1', $check_point)?'checked':'';?>></label>
							<label><em>電気</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="2" <?php echo in_array('2', $check_point)?'checked':'';?>></label>
							<label><em>エアコン</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="3" <?php echo in_array('3', $check_point)?'checked':'';?>></label>
							<label><em>水道</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="4" <?php echo in_array('4', $check_point)?'checked':'';?>></label>
							<label><em>配膳室</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="5" <?php echo in_array('5', $check_point)?'checked':'';?>></label>
							<label><em>カーペット</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="6" <?php echo in_array('6', $check_point)?'checked':'';?>></label>
							<label><em>ベープ</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="7" <?php echo in_array('7', $check_point)?'checked':'';?>></label>
							<label><em>扇風機</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="8" <?php echo in_array('8', $check_point)?'checked':'';?>></label>
							<label><em>戸締り</em><input name="chk_Check_Point[]" class="checkbox01" type="checkbox" value="9" <?php echo in_array('9', $check_point)?'checked':'';?>></label>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			
	
	
		<div class="maintablebox">
			<div class="maintabletop maintabletop01">
				<ul>
					<li id="tab_R2" class="cn"><a href="javascript:switchTab('R2')">2号標準時間</a></li>
					<li id="tab_R3"><a href="javascript:switchTab('R3')">3号標準時間</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable xmaintable">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>登降園状況</td>
							<td>苗字</td>
							<td>名前</td>
							<td>性別</td>
							<td>クラス</td>
							<td>年齢</td>
							<td>生年月日</td>
							<td>認定区分</td>
							<td>入園日</td>
							<td>申請日</td>
							<td>出欠</td>
							<td>迎え</td>
							<td>引き継ぎ事項</td>
						</tr>
					</thead>
					
					<!-- 2号标准 -->
					<tbody id="tab_con_R2">
					<?php foreach ($child_Info as $key =>$val){
							if($val['Recog_Type']=='R2'){?>
						<tr>
							 <td><a name="tips<?php echo $val['ID'];?>">
                            <?php
                            echo View::factory('list/commStatus')->bind('val',$val);
							?></a>
							<input type="hidden" name="hidden_ID[]" value="<?php echo $val['ID']?>"/>
                            </td>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                            <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
                            <td><?php echo $val['Age']?></td>
                            <td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
							 <td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td><?php echo $val['EnterDate']?><p><?php echo $val['YearJap_EnterDate']?></p></td>
							<td><?php echo $val['InputDate']?><p><?php echo $val['YearJap_InputDate']?></p></td>
							<td><select name="select_Go_With[]" class="select01" style="width:70px;" >
								<option value="">-----</option>
								<?php foreach($parameter['CHOICE'] as $key_w => $val_w){?>
									<option value="<?php echo $key_w;?>" <?php if(!empty($val['Extension'])){echo $val['Extension']['Go_With']==$key_w?'selected':'';}?> ><?php echo $val_w;?></option>
								<?php }?>
								</select>
							</td>
							<td><select name="select_Come_With[]" class="select01" style="width:70px;" >
								<option value="">-----</option>
								<?php foreach($parameter['WITH'] as $key_w => $val_w){?>
									<option value="<?php echo $key_w;?>" <?php if(!empty($val['Extension'])){echo $val['Extension']['Come_With']==$key_w?'selected':'';}?> ><?php echo $val_w;?></option>
								<?php }?>
								</select>
							</td>
							<td><input name="txt_Item[]" type="text" class="txt01" style="width:70px;" value="<?php if(!empty($val['Extension'])){echo $val['Extension']['Item'];}?>" /></td>
						</tr>
					<?php }}?>
					</tbody>
					
					<!--3号标准  -->
					<tbody id="tab_con_R3" style="display:none">
					<?php foreach ($child_Info as $key =>$val){
							if($val['Recog_Type']=='R3'){?>
						<tr>
							 <td>
							 <?php if($yearMonDay<date('Y-m-d')){?>
							 	<a><span class="red">降園済</a>							 	
							 <?php }else{?>
							 <a>
                            	<?php echo View::factory('list/commStatus')->bind('val',$val);?>
                            	</a>
							<?php }?>
							<input type="hidden" name="hidden_ID[]" value="<?php echo $val['ID']?>"/>
                            </td>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                            <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
                            <td><?php echo $val['Age']?></td>
                            <td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td><?php echo $val['EnterDate']?><p><?php echo $val['YearJap_EnterDate']?></p></td>
							<td><?php echo $val['InputDate']?><p><?php echo $val['YearJap_InputDate']?></p></td>
							<td><select name="select_Go_With[]" class="select01" style="width:70px;" >
								<option value="">-----</option>
								<?php foreach($parameter['CHOICE'] as $key_w => $val_w){?>
									<option value="<?php echo $key_w;?>" <?php if(!empty($val['Extension'])){echo $val['Extension']['Go_With']==$key_w?'selected':'';}?> ><?php echo $val_w;?></option>
								<?php }?>
								</select>
							</td>
							<td><select name="select_Come_With[]" class="select01" style="width:70px;" >
								<option value="">-----</option>
								<?php foreach($parameter['WITH'] as $key_w => $val_w){?>
									<option value="<?php echo $key_w;?>" <?php if(!empty($val['Extension'])){echo $val['Extension']['Come_With']==$key_w?'selected':'';}?> ><?php echo $val_w;?></option>
								<?php }?>
								</select>
							</td>
							<td><input name="txt_Item[]" type="text" class="txt01" style="width:70px;" value="<?php if(!empty($val['Extension'])){echo $val['Extension']['Item'];}?>" /></td>
						</tr>
					<?php }}?>
					</tbody>
				</table>
			</div>
		</div>
		</form>
	
<script type="text/javascript">  
$(function(){		   
	$('#MainForm').validationEngine('attach');
	$('input[name="txt_Day_Y"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Day_M"]').on('change',this,function(){getChangeSearch()});
	$('select[name="select_Day_D"]').on('change',this,function(){getChangeSearch()});
});
function switchTab(n){ 
 
	document.getElementById("tab_R2").className = "";  
	document.getElementById("tab_con_R2").style.display = "none";  

	document.getElementById("tab_R3").className = "";  
	document.getElementById("tab_con_R3").style.display = "none"; 

	document.getElementById("tab_" + n).className = "cn";  
	document.getElementById("tab_con_" + n).style.display = "table-row-group"; 

	if(n=='R3'){
		document.getElementById("txt_Suggestion").style.display = "none"; 
		document.getElementById("txt_SuggestionR3").style.display = "inline-block";

		document.getElementById("formSubmit").style.display = "none"; 
		document.getElementById("formSubmitR3").style.display = "inline-block"; 

		document.getElementById("check_point").style.display = "none"; 
		document.getElementById("check_pointR3").style.display = "inline-block";  
	}else if(n=='R2'){
		document.getElementById("txt_SuggestionR3").style.display = "none"; 
		document.getElementById("txt_Suggestion").style.display = "inline-block";

		document.getElementById("formSubmitR3").style.display = "none"; 
		document.getElementById("formSubmit").style.display = "inline-block"; 

		document.getElementById("check_pointR3").style.display = "none"; 
		document.getElementById("check_point").style.display = "inline-block";  
		}
	
	scrollAdjustment();	
}  
function formSubmit(){
	var txt_Day_Y = $('input[name="txt_Day_Y"]').val();
	var select_Day_M = $('select[name="select_Day_M"]').val();
	var select_Day_D = $('select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;
	
	var input_Year = $("input[name='txt_Day_Y']").serialize();
	var input_Mon = $("select[name='select_Day_M']").serialize();
	var input_Day = $("select[name='select_Day_D']").serialize();

	
	var input_Suggestion = $('#txt_Suggestion').serialize();
	var input_check_point = $("#check_point input[name='chk_Check_Point[]']").serialize();
	var input_selected_gowith = $("#tab_con_R2 select[name='select_Go_With[]']").serialize();
	var input_selected_comewith = $("#tab_con_R2 select[name='select_Come_With[]']").serialize();
	var Child_1_Base_ID = $("#tab_con_R2 input[name='hidden_ID[]']").serialize();
	var Item = $("#tab_con_R2 input[name='txt_Item[]']").serialize();
	var data1;
	data1 =input_Year + '&'+ input_Mon +'&' + input_Day +'&' + input_Suggestion + '&' + input_check_point+'&'+input_selected_gowith + '&' + input_selected_comewith + '&' + Child_1_Base_ID + '&' + Item +'&yearMonDay='+ yearMonDay;
	console.log(data1);
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/listExtensionUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: data1,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			addSaveOverlay(1000,400,json['result']);			   
		   }
		});
	
}


function formSubmitR3(){
	var txt_Day_Y = $('input[name="txt_Day_Y"]').val();
	var select_Day_M = $('select[name="select_Day_M"]').val();
	var select_Day_D = $('select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;
	var data = $('#MainForm').serialize()+'&yearMonDay='+yearMonDay;
	console.log(data);
	var input_Year = $("input[name='txt_Day_Y']").serialize();
	var input_Mon = $("select[name='select_Day_M']").serialize();
	var input_Day = $("select[name='select_Day_D']").serialize();

	
	var input_Suggestion = $('#txt_SuggestionR3').serialize();
	var input_check_point = $("#check_pointR3 input[name='chk_Check_Point[]']").serialize();
	var input_selected_gowith = $("#tab_con_R3 select[name='select_Go_With[]']").serialize();
	var input_selected_comewith = $("#tab_con_R3 select[name='select_Come_With[]']").serialize();
	var Child_1_Base_ID = $("#tab_con_R3 input[name='hidden_ID[]']").serialize();
	var Item = $("#tab_con_R3 input[name='txt_Item[]']").serialize();
	var data2
	var data2 =input_Year + '&'+ input_Mon +'&' + input_Day +'&' + input_Suggestion + '&' + input_check_point+'&'+input_selected_gowith + '&' + input_selected_comewith + '&' + Child_1_Base_ID + '&' + Item +'&yearMonDay='+ yearMonDay;
	console.log(data2);
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/listExtensionUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: data2,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			addSaveOverlay(1000,400,json['result']);			   
		   }
		});
	
}
function getChangeSearch()
{
	var txt_Day_Y = $('input[name="txt_Day_Y"]').val();
	var select_Day_M = $('select[name="select_Day_M"]').val();
	var select_Day_D = $('select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	location.href="<?php echo URL::site('list/listExtension').URL::query(array('yearMonDay'=>NULL));?>?yearMonDay="+yearMonDay;
}

function outputPDF(){
	var txt_Day_Y = $('input[name="txt_Day_Y"]').val();
	var select_Day_M = $('select[name="select_Day_M"]').val();
	var select_Day_D = $('select[name="select_Day_D"]').val();
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;
	
	var tmpId = $('.maintabletop').find('li.cn').attr('id');
	var tmpNo = tmpId.substring(4);
	location.href="<?php echo URL::site('list/listExtensionPDF').URL::query(array('yearMonDay'=>NULL));?>?yearMonDay="+yearMonDay+"&recog="+tmpNo;
}
</script> 
</body>
</html>