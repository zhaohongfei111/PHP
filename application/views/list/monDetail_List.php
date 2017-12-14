<?php
echo View::factory('public/head');
?>
<body>
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('list/checkList').URL::query(array('ID'=>NULL,'yearMon'=>NULL)).'"><input type="button" value="戻 る" /></a></p>
				</div>';
	if($SELLEVEL!='Reader'){
		$logoHtml .= '<div class="topright topright01 right">
						<p><input type="button" id="btn_Save" value="保 存" onclick="formMainSave()" /></p>
					</div>';
	}
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>	
	
	<div class="mainbox">
		<div class="xdatelist82">
			<div class="datelist">
				<ul>
					<li id="search">
						<span>クラス</span>
						<input type="text" class="txt01" value="<?php echo empty($base)?'':$parameter['BASE_INFO']['CLASS'][$base['Class']];?>" />
						<span>認定区分</span>
						<input type="text" class="txt01" value="<?php foreach ($recog_Info as $key =>$val){ echo $parameter['BASE_INFO']['Recog_Type'][$val].' '; }?>" />
                        <span>お名前</span>
						<input type="text" class="txt01" value="<?php echo empty($base)?'':$base['FamilyName'].$base['GivenName'];?>" />
						<input type="text" name="txt_Day_Y" class="txt01" style="width:100px;" value="<?php echo substr($yearMon, 0,4);?>" /><em>年</em>
						<select name="select_Day_M" class="select01" disabled >
						<?php foreach ($months as $key=>$val){?>
							<option <?php echo $val==substr($yearMon,5,2)?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
						<?php }?>
						</select><em>月</em>
					</li>
				</ul>
			</div>
		</div>
		<form id="formMain" action="<?php echo URL::site('list/monDetail_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="hidden_ID" value="<?php echo $ID?>" />
		<div class="maintablebox">
			<div class="maintable xmaintable8 xmaintable82">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
                	<colgroup>
                    	<col width="5%"></col>
                        <col width="5%"></col>
                        <col width="8%"></col>
                        <col width="8%"></col>
                        <col width="8%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="8%"></col>
                        <col width="16%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td class="blue">日にち</td>
							<td class="blue">曜日</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="green">課外活動</td>
							<td class="green">バス利用<br/>（行き）</td>
							<td class="green">バス利用<br/>（帰り）</td>
							<td class="violet">預かり<br/>保育</td>
							<td class="violet">通常<br/>保育</td>
							<td class="violet">教育<br/>時間</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育時間</td>
							<td class="t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
						<?php
						foreach ($monDetail as $key=>$val){
							if($val['canEdit']){
						?>
                        <tr>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['ID'];?>">                            
                            <input type="hidden" name="hidden_Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="w[]" value="<?php echo $val['w'];?>">
                            <input type="hidden" name="hidden_Activity_Checked[]" value="<?php echo $val['Activity_Checked'];?>">
                            <input type="hidden" name="hidden_BusCome_Checked[]" value="<?php echo $val['BusCome_Checked'];?>">
                            <input type="hidden" name="hidden_BusGo_Checked[]" value="<?php echo $val['BusGo_Checked'];?>">
                            <input type="hidden" name="hidden_Grants_Times[]" value="<?php echo $val['Grants_Times'];?>" />
                            <input type="hidden" name="hidden_showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="hidden_grantsStatus[]" value="<?php echo $val['grantsStatus'];?>">    
                            <input type="hidden" name="hidden_Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">                            
                            <input type="hidden" name="hidden_isholidays[]" value="<?php echo $val['isholidays'];?>">
                            <input type="hidden" name="hidden_isLongHoliday[]" value="<?php echo $val['isLongHoliday'];?>">
                            
                            
							<td><?php echo $key;?></td>
							<td><?php if($val['week']=='土'){echo '<font color="blue">'.$val['week'].'</font>';}elseif ($val['week']=='日'){echo '<font color="red">'.$val['week'].'</font>';}else{echo $val['week'];}?></td>
							<td><input name="txt_In_Time[]" class="txt01"  type="text" value="<?php echo $val['In_Time'];?>" onChange="changeTime(this)"></td>
							<td><input name="txt_Out_Time[]" class="txt01"  type="text" value="<?php echo $val['Out_Time'];?>" onChange="changeTime(this)"></td>
							<td><input name="txt_On_Time[]" readonly class="txt01"  type="text" value="<?php echo empty($val['On_Time'])?'':$val['On_Time'];?>"></td>
							<td><input name="chk_Activity" class="xcheckbox01" type="checkbox" <?php if($val['Activity_Checked']){echo 'checked';};?>  /></td>
							<td><input name="chk_BusCome" class="xcheckbox01" type="checkbox" <?php if($val['BusCome_Checked']){echo 'checked';};?> /></td>
							<td><input name="chk_BusGo" class="xcheckbox01" type="checkbox" <?php if($val['BusGo_Checked']){echo 'checked';};?>/></td>
							<td><input name="txt_Delayed_Times[]" readonly class="txt01"  type="text" value="<?php echo $val['Delayed_Times'];?>"></td>
							<td><input name="txt_Usually_Times[]" readonly class="txt01"  type="text" value="<?php echo $val['Usually_Times'];?>"></td>
							<td><input name="txt_Study_Times[]" readonly class="txt01"  type="text" value="<?php echo $val['Study_Times'];?>"></td>
							<td><input name="txt_Extension_Times[]" readonly class="txt01"  type="text" value="<?php echo $val['Extension_Times'];?>"></td>
							<td><input name="txt_All_Times[]" readonly class="txt01"  type="text" value="<?php echo $val['All_Times'];?>"></td>
							<td class="t02"><input name="txt_Day_Remark[]" class="txt02"  type="text" value="<?php echo $val['Day_Remark'];?>"></td>
						</tr>
                        <?php
							//$val['canEdit'] == false	
							}else{
						?>
                        <tr>
							<td><?php echo $key;?></td>
							<td><?php if($val['week']=='土'){echo '<font color="blue">'.$val['week'].'</font>';}elseif ($val['week']=='日'){echo '<font color="red">'.$val['week'].'</font>';}else{echo $val['week'];}?></td>
							<td>----</td>
							<td>----</td>
							<td>----</td>
							<td><input name="" class="xcheckbox01" type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="" class="xcheckbox01" type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="" class="xcheckbox01" type="checkbox" value="" onClick="return false;"/></td>
							<td>----</td>
							<td>----</td>
							<td>----</td>
							<td>----</td>
							<td>----</td>
							<td class="t02">----</td>
						</tr>
                        <?php	
							}						
						}
						?>
			
					</tbody>
				</table>
			</div>
			
		</div>	
		</form>
	</div>
<?php
if($SELLEVEL!='Reader'){
?>
<script>
var formSave = true;
$(function(){
	$('#search input[type="text"]').on('change',this,function(){getChangeSearch()});
	$('#search select').on('change',this,function(){getChangeSearch()});
	
	$('input[name="txt_In_Time[]"]').on('change',this,function(){
		ajaxChangeDayDetail(this)
	});
	$('input[name="txt_Out_Time[]"]').on('change',this,function(){
		ajaxChangeDayDetail(this)
	});
	$('input[name="chk_Activity"]').on('click',this,function(){
		var tr = $(this).parent().parent();		
		var isholidays = tr.find('input[name="hidden_isholidays[]"]:eq(0)').val()
		var w = tr.find('input[name="w[]"]:eq(0)').val()	
		if(tr.find('input[name="hidden_Recog_Type[]"]:eq(0)').val()=='R1'){
			if(w=='0'||w=='6'||isholidays=='1'){
				return false;	
			}
		}
		ajaxChangeDayDetail(this);		
	});
	
	$('input[name="chk_BusCome"]').on('click',this,function(){
		if($(this).prop('checked')){
			$(this).parent().parent().find('input[name="hidden_BusCome_Checked[]"]:eq(0)').val(1);
		}else{
			$(this).parent().parent().find('input[name="hidden_BusCome_Checked[]"]:eq(0)').val(0);
		}
	});
	
	$('input[name="chk_BusGo"]').on('click',this,function(){
		if($(this).prop('checked')){
			$(this).parent().parent().find('input[name="hidden_BusGo_Checked[]"]:eq(0)').val(1);
		}else{
			$(this).parent().parent().find('input[name="hidden_BusGo_Checked[]"]:eq(0)').val(0);
		}
	});
	
});
function formMainSave(){
	if(formSave){
		formSubmit();
	}else{
		setTimeout("formMainSave()",500);
	}	
}

function formSubmit()
{
	$('#btn_Save').attr('disabled',"true");
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/monDetail_Insert');?>",
		   cache: false,
		   dataType: 'json',
		   data: $('#formMain').serialize(),
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			   				 
			addSaveOverlay(1000,400,json['result']);			   
		   }
		});
}

function getChangeSearch()
{
	var txt_Day_Y = $('#search input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#search select[name="select_Day_M"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMon = txt_Day_Y + '-' + select_Day_M ;	
	location.href="<?php echo URL::site('list/monDetail').URL::query(array('yearMon'=>NULL));?>&yearMon="+yearMon;
}
function ajaxChangeDayDetail(obj)
{
	formSave = false;
	
	var tr = $(obj).parent().parent();
	var yearMonDay = tr.find('input[name="hidden_Day_Date[]"]').val(); 
	var Recog_Type = tr.find('input[name="hidden_Recog_Type[]"]').val(); 
	var inTime = tr.find('input[name="txt_In_Time[]"]').val();
	var outTime = tr.find('input[name="txt_Out_Time[]"]').val();
	var activity_chk = tr.find('input[name="chk_Activity"]').prop('checked')?1:0;
	var isholidays = tr.find('input[name="hidden_isholidays[]"]').val();
	var isLongHoliday = tr.find('input[name="hidden_isLongHoliday[]"]').val();	
	var data = 'yearMonDay='+yearMonDay+'&Recog_Type='+Recog_Type+'&inTime='+inTime+'&outTime='+outTime+'&activity_chk='+activity_chk+'&isholidays='+isholidays+'&isLongHoliday='+isLongHoliday;		
	$.ajax({
		type: "POST",
		url: "<?php echo URL::site('list/changeDayDetail');?>",
		cache: false,
		dataType: 'json',
		data: data,
		error: function(){alert('ajaxエラー');},
		success: function(json){
			tr.find('input[name="hidden_Activity_Checked[]"]').val(activity_chk);
			tr.find('input[name="txt_On_Time[]"]').val(json.On_Time);			
			tr.find('input[name="txt_Delayed_Times[]"]').val(json.Delayed_Times);
			tr.find('input[name="txt_Usually_Times[]"]').val(json.Usually_Times);
			tr.find('input[name="txt_Study_Times[]"]').val(json.Study_Times);
			tr.find('input[name="txt_Extension_Times[]"]').val(json.Extension_Times);
			tr.find('input[name="txt_All_Times[]"]').val(json.All_Times);			
			tr.find('input[name="hidden_showStatus[]"]').val(json.showStatus);
			tr.find('input[name="hidden_Grants_Times[]"]').val(json.Grants_Times);	
			tr.find('input[name="hidden_grantsStatus[]"]').val(json.grantsStatus);
			formSave = true;	
		}
	});
}


</script>
<?php
}else{
?>
<script>
$(function(){
	$('input[type="text"]').prop('readonly',true);
	$('input[type="checkbox"]').on('click',function(){return false;});
});
</script>
<?php	
}
?>
<style>
.xmaintable82 table td input.txt01{border:none;background:none;width:60px;padding:0 0;text-align:center;}
.xmaintable82 table td input.txt02{border:none;background:none;width:120px;padding:0 0;text-align:center;}
.xmaintable82 table td.t02{text-align:center;}
</style>
</body>
</html>