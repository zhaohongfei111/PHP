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
							<input name="txt_Suggestion" type="text" class="txt05" value="<?php echo empty($extensionList)?'':$extensionList['0']['Suggestion'];?>" style="width:240px;">
						</li>
					</ul>
				</div>
				<div class="datelist fdatelist left" style="width:450px;">
					<h3>点検事項</h3>
					<ul>
						<li>
						<?php $check_point=array();
							  if(!empty($extensionList)&&!empty($extensionList['0']['Check_Point'])){$check_point=explode(';', $extensionList['0']['Check_Point']);}?>
							  
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
				<div class="clear"></div>
			</div>
			
	
	
		<div class="maintablebox">
			<div class="maintabletop">
				<ul>
					<li id="tab_R2" class="cn"><a href="javascript:switchTab('R2')">2号標準時間</a></li>
					<li id="tab_R3"><a href="javascript:switchTab('R3')">3号標準時間</a></li>
				</ul>
			</div>
			<div class="maintable">
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
								<?php foreach($parameter['WITH'] as $key_w => $val_w){?>
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
								<?php foreach($parameter['WITH'] as $key_w => $val_w){?>
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
	var data = $('#MainForm').serialize()+'&yearMonDay='+yearMonDay;

	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/listExtensionUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: data,
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