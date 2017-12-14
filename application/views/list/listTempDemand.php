<?php
echo View::factory('public/head');
?>
<body>
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).'"><input type="button" value="園児一覧に戻る" /></a></p>
				</div>';
	if($SELLEVEL!='Reader'){		
		$logoHtml .= '<div class="topright topright01 right">
						<p><input type="button" value="実績報告書の作成" onclick="formSubmit()" /></p>
					</div>';
	}
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>
    <form id="form" action="<?php echo URL::site('list/setListTempDemand').URL::query();?>" method="post" target="_blank" >
	<div class="mainbox">
		<div class="pagetop pagetop16">
			<div class="topleft left">
				<div class="datelist datelist18">
					<ul>
						<li><span>請求対象月</span>
                        <?php list($year,$month) = explode('-',$date);?>
                        <select name="select_year" class="select01">

                        <?php foreach ($years as $key =>$val){?>

                        <option value="<?php echo $val['Y']?>" <?php if($year== $val['Y']) echo 'selected'?>><?php echo $val['Y']?></option>
                        <?php
						}
						?>                        
                        </select><em>年</em>
						<select name="select_month" class="select01">
                        <?php
                        for($i=1;$i<13;$i++){
						?>
						<option value="<?php echo substr('0'.$i,-2);?>" <?php if($month==substr('0'.$i,-2)) echo 'selected'?>><?php echo substr('0'.$i,-2);?></option>
						<?php
						}
						?>                        
                        </select><em>月</em>
						</li>
					</ul>
				</div>
			</div>
			<div class="topleft right">
				<div class="datelist datelist18">
					<ul>
						<li><span style="width:60px;">発行日</span>
                        	 <?php list($year,$month,$day) = explode('-',$output_date);?>
                            <input name="txt_output_year" type="text" class="txt01" style="width:60px;" value="<?php echo $year;?>"><em>年</em>
							<select name="select_output_month" class="select01">
							<?php
                            for($i=1;$i<13;$i++){
                            ?>
                            <option value="<?php echo substr('0'.$i,-2);?>" <?php if($month==substr('0'.$i,-2)) echo 'selected'?>><?php echo substr('0'.$i,-2);?></option>
                            <?php
                            }
                            ?></select><em>月</em>
							<select name="select_output_day" class="select01">
							<?php
                            for($i=1;$i<31;$i++){
                            ?>
                            <option value="<?php echo substr('0'.$i,-2);?>" <?php if($day==substr('0'.$i,-2)) echo 'selected'?>><?php echo substr('0'.$i,-2);?></option>
                            <?php
                            }
                            ?></select><em>日</em>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>
					<li class="cn"><a href="javascript:tag(0);">1号認定在園児</a></li>
					<li><a href="javascript:tag(1);">在園児以外</a></li>
					<li><a href="javascript:tag(2);">利用料免除</a></li>
					<li><a href="javascript:tag(3);">担当保育士</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable maintable16 fxmaintable8">
				<table class="table16" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="bg bg01">
							<td rowspan="5">月合計<br/>(延べ人数)</td>
                            <td rowspan="2">区分</td>
                            <td colspan="2">平日(長期休業中を合む)</td>
                            <td colspan="2">土・日曜日、祝日</td>
						</tr>
						<tr class="bg">
							<td>4時間以内</td>
                            <td>4時間超</td>
                            <td>8時間以内</td>
                            <td>8時間超</td>
						</tr>
						<tr id="support">
							<td>生活保護世帯等に該当する世帯</td>
                            <td><?php echo $result['support_LessFour'];?>人</td>
                            <td><?php echo $result['support_OverFour'];?>人</td>
                            <td><?php echo $result['support_LessEight'];?>人</td>
                            <td><?php echo $result['support_OverEight'];?>人</td>
						</tr>
						<tr id="notSupport">
							<td>その他世帯</td>
                            <td><?php echo $result['notSupport_LessFour'];?>人</td>
                            <td><?php echo $result['notSupport_OverFour'];?>人</td>
                            <td><?php echo $result['notSupport_LessEight'];?>人</td>
                            <td><?php echo $result['notSupport_OverEight'];?>人</td>
						</tr>
						<tr id="all">
							<td>計</td>
                            <td><?php echo $result['support_LessFour']+$result['notSupport_LessFour'];?>人</td>
                            <td><?php echo $result['support_OverFour']+$result['notSupport_OverFour'];?>人</td>
                            <td><?php echo $result['support_LessEight']+$result['notSupport_LessEight'];?>人</td>
                            <td><?php echo $result['support_OverEight']+$result['notSupport_OverEight'];?>人</td>
						</tr>
					</tbody>
				</table>
				
				<table class="table16_1" width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2">苗字</td>
                            <td rowspan="2">名前</td>
                            <td rowspan="2">性別</td>
                            <td rowspan="2">クラス</td>
                            <td rowspan="2">認定区分</td>
                            <td colspan="2">平日(長期休業中を合む)</td>
                            <td colspan="2">土・日曜日、祝日</td>
                            <td rowspan="2">生活保護<br/>世帯に該当</td>
						</tr>
						<tr class="bg">
							<td>4時間以内</td>
                            <td>4時間超</td>
                            <td>8時間以内</td>
                            <td>8時間超</td>
						</tr>
					</thead>
					<tbody>
                    <?php
					$Child_ID_Arr = explode(';',$result['temp_demand']['Child_ID_Arr']);
                    foreach($result['child_list'] as $key => $val){
					?>
						<tr>
							<td>
                            	<input type="hidden" name="txt_Child_ID[]" value="<?php echo $val['ID'];?>" >
								<?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p>
                            </td>
                            <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
                            <td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
                            <td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']];?></td>
                            <td><?php echo (int)$val['lessFour'];?>回</td>
                            <td><?php echo (int)$val['overFour'];?>回</td>
                            <td><?php echo (int)$val['lessEight'];?>回</td>
                            <td><?php echo (int)$val['overEight'];?>回</td>
                            <td><input name="chk_Support_Child_ID[]" class="checkbox01" type="checkbox" <?php if($val['support']) echo 'checked';?> value="<?php echo $val['ID'];?>" <?php if(!$val['canEditCheckBox']) echo 'disabled';?>></td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>            
            
            <div class="maintable maintable16 fxmaintable8" style="display:none;">
				<table class="table16_1" width="60%" align="center" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr class="bg01">
							<td rowspan="2">区分</td><td colspan="2">全日</td>
						</tr>
						<tr class="bg">
							<td>8時間以内</td><td>8時間超</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>生活保護世帯等に該当する世帯</td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Support_LessEignt_Num" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Support_LessEignt_Num'];else echo 0;?>" onChange="sum1()" class="validate[custom[integer]]"><span>人</span></td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Support_OverEignt_Num" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Support_OverEignt_Num'];else echo 0;?>" onChange="sum2()" class="validate[custom[integer]]"><span>人</span></td>
						</tr>
						<tr>
							<td>その他世帯</td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Other_LessEight_Num" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Other_LessEight_Num'];else echo 0;?>" onChange="sum1()" class="validate[custom[integer]]"><span>人</span></td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Other_OverEight_Num" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Other_OverEight_Num'];else echo 0;?>" onChange="sum2()" class="validate[custom[integer]]"><span>人</span></td>
						</tr>
						<tr>
							<td>計</td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Other_LessEight_All" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Support_LessEignt_Num']+$result['temp_demand']['Outschool_Other_LessEight_Num'];else echo 0;?>" readonly><span>人</span></td>
                            <td><input type="text" style="width:40px;" name="txt_Outschool_Other_OverEight_All" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_Support_OverEignt_Num']+$result['temp_demand']['Outschool_Other_OverEight_Num'];else echo 0;?>" readonly><span>人</span></td>
						</tr>
					</tbody>
				</table>
				
			</div>
         
         
         	<div class="maintable maintable16 fxmaintable8" style="display:none;">
				<table class="table16_1" width="60%" align="center" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr class="bg01">
							<td width="50%">在籍園児</td>
                            <td>在籍園児　以外の児童</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="text" style="width:80px;" name="txt_Inschool_money" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Inschool_money'];else echo 0;?>" class="validate[custom[integer]]"><span>円</span></td>
                            <td><input type="text" style="width:80px;" name="txt_Outschool_money" value="<?php if(!empty($result['temp_demand'])) echo $result['temp_demand']['Outschool_money'];else echo 0;?>" class="validate[custom[integer]]"><span>円</span></td>
						</tr>
					</tbody>
				</table>
			</div>
            
            
            <div class="maintable maintable16 fxmaintable8" style="display:none;">
				<div class="txt16">実績報告書に記載する担当保育士を選択</div>
				<table class="table16_1 table16_2" width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td class="t01" rowspan="2"></td>
                            <td rowspan="2">職員名</td>
                            <td rowspan="2">しよくいんめい</td>
                            <td rowspan="2">性別</td>
                            <td rowspan="2">職位</td>
                            <td rowspan="2">担当クラス</td>
                            <td colspan="3">区分</td>
                            <td rowspan="2">勤務形態</td>
						</tr>
						<tr class="bg">
							<td>幼稚園教諭</td>
                            <td>保育士</td>
                            <td>その他</td>
						</tr>
					</thead>
					<tbody>
                    	<?php
						$Staff_ID_Arr = explode(';',$result['temp_demand']['Staff_ID_Arr']);
                        foreach($result['staffInfo'] as $key => $val){
							$arr=explode(';',$val['Staff_Duty']);
						?>
						<tr>
							<td class="t01"><input name="chk_Staff_ID[]" class="checkbox01" type="checkbox" value="<?php echo $val['Staff_ID'];?>" <?php if(in_array($val['Staff_ID'],$Staff_ID_Arr)) echo 'checked';?>/></td>
                            <td><?php echo $val['Staff_Name'];?></td>
                            <td><?php echo $val['Staff_Name_Spell'];?></td>
                            <td><input type="text" class="txt01" value="<?php if($val['Staff_Sex']=='1') echo '男';else if($val['Staff_Sex']=='2') echo '女';?>" readonly></td>
                            <td><?php echo $val['Staff_Jobs'];?></td>
                            <td>
                            <input type="text" class="txt02" value="<?php if(!empty($val['Staff_Class'])) echo $parameter['BASE_INFO']['CLASS'][$val['Staff_Class']];?>" style="width:100px;" readonly>
                            </td>
                            <td><input type="checkbox" <?php echo in_array('Teacher', $arr)?'checked':'';?> class="checkbox02" name="Staff_Duty" value="Teacher" disabled /></td>
                            <td><input type="checkbox" <?php echo in_array('Guardian', $arr)?'checked':'';?> class="checkbox02" name="Staff_Duty" value="Guardian" disabled /></td>
                            <td><input type="checkbox" <?php echo in_array('Other', $arr)?'checked':'';?> class="checkbox02" name="Staff_Duty" value="Other" disabled/></td>
                            <td><input type="checkbox" <?php echo $val['Staff_Work_Form']==1?'checked':'';?> class="checkbox02" name="Staff_Work_Form" value="1" disabled/><b>常勤</b><input type="checkbox" <?php echo $val['Staff_Work_Form']==2?'checked':'';?> class="checkbox02" name="Staff_Work_Form" value="2" disabled/><b>非常勤</b><input type="text" name="Staff_Work_Time"  class="add" style="width:15px;" value="<?php echo $val['Staff_Work_Time'];?>" readonly ><b>時間</b></td>
						</tr>
                        <?php
						}
						?>						
					</tbody>
				</table>
			</div>
            
		</div>		
	</div>
    </form>
<script>

$(function(){
	var wh = $(window).height();		
	$('.maintable').css({'height':'auto','max-height':(wh-340)+'px'});
	$('select[name="select_year"]').on('change',function(){changeTime()});
	$('select[name="select_month"]').on('change',function(){changeTime()});
	$('input[name="chk_Support_Child_ID[]"]').on('click',function(){changeSupport(this)});
	$('#form').validationEngine('attach');

});	
function tag(num){
	$('.maintabletop li').removeClass("cn").eq(num).addClass("cn");
	$('.maintable').hide().eq(num).show();
}	
function formSubmit(){
	$('#form').submit();	
}
function changeTime(){
	var year = $('select[name="select_year"]').val();
	var month = $('select[name="select_month"]').val();
	location.href="<?php echo URL::site('list/listTempDemand').URL::query(array('yearMonth'=>NULL));?>&yearMonth="+year+'-'+month;
}
function sum1(){
	var val1 = 	$('input[name="txt_Outschool_Support_LessEignt_Num"]').val();
	var val2 = 	$('input[name="txt_Outschool_Other_LessEight_Num"]').val();
	$('input[name="txt_Outschool_Other_LessEight_All"]').val(parseInt(val1)+parseInt(val2));	
}

function sum2(){
	var val1 = 	$('input[name="txt_Outschool_Support_OverEignt_Num"]').val();
	var val2 = 	$('input[name="txt_Outschool_Other_OverEight_Num"]').val();
	$('input[name="txt_Outschool_Other_OverEight_All"]').val(parseInt(val1)+parseInt(val2));	
}
function changeSupport(obj){
	var tr = $(obj).parent().parent();
	var val1 = parseInt(tr.find('td:eq(5)').html());
	var val2 = parseInt(tr.find('td:eq(6)').html());
	var val3 = parseInt(tr.find('td:eq(7)').html());
	var val4 = parseInt(tr.find('td:eq(8)').html());
	
	var all_1 = parseInt($('#support').find('td:eq(1)').html());
	var all_2 = parseInt($('#support').find('td:eq(2)').html());
	var all_3 = parseInt($('#support').find('td:eq(3)').html());
	var all_4 = parseInt($('#support').find('td:eq(4)').html());
	var all_5 = parseInt($('#notSupport').find('td:eq(1)').html());
	var all_6 = parseInt($('#notSupport').find('td:eq(2)').html());
	var all_7 = parseInt($('#notSupport').find('td:eq(3)').html());
	var all_8 = parseInt($('#notSupport').find('td:eq(4)').html());
	
	
	if($(obj).prop('checked')){		
		if(val1!=0){
			$('#support').find('td:eq(1)').html((all_1+1)+'人');
			$('#notSupport').find('td:eq(1)').html((all_5-1)+'人');
		}
		if(val2!=0){
			$('#support').find('td:eq(2)').html((all_2+1)+'人');
			$('#notSupport').find('td:eq(2)').html((all_6-1)+'人');
		}
		if(val3!=0){
			$('#support').find('td:eq(3)').html((all_3+1)+'人');
			$('#notSupport').find('td:eq(3)').html((all_7-1)+'人');
		}
		if(val4!=0){
			$('#support').find('td:eq(4)').html((all_4+1)+'人');
			$('#notSupport').find('td:eq(4)').html((all_8-1)+'人');
		}		
	}else{
		if(val1!=0){
			$('#support').find('td:eq(1)').html((all_1-1)+'人');
			$('#notSupport').find('td:eq(1)').html((all_5+1)+'人');
		}
		if(val2!=0){
			$('#support').find('td:eq(2)').html((all_2-1)+'人');
			$('#notSupport').find('td:eq(2)').html((all_6+1)+'人');
		}
		if(val3!=0){
			$('#support').find('td:eq(3)').html((all_3-1)+'人');
			$('#notSupport').find('td:eq(3)').html((all_7+1)+'人');
		}
		if(val4!=0){
			$('#support').find('td:eq(4)').html((all_4-1)+'人');
			$('#notSupport').find('td:eq(4)').html((all_8+1)+'人');
		}		
	}
}

</script>
</body>
</html>