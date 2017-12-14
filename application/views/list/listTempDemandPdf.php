<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<style type="text/css">
	body {font-family:"sjis";padding: 0;font-size:15px;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;padding-top:10px;}
	 h3{margin:0px;}
	
	.txt01 {float:left;width:200px;}
	.txt01 h3 {font-weight:normal;}
	.txt01 p {width:113px;text-align:right;line-height:24px;padding:0 0;margin:0 0;}
	.txt02 {float:right;padding-bottom:10px; width:400px;}
	.txt02 p {line-height:24px;padding:0 0;margin:0 0;}
	.txt02 p span {display:inline-block;width:180px;}
	.txt02 p em {font-style:normal;display:inline-block;width:120px;text-align:center;}
	
	.wtablebox02 table {border-left:solid 1px #000;border-top:solid 1px #000;}
	.wtablebox02 table td {border-bottom:solid 1px #000;border-right:solid 1px #000;padding:0 10px;line-height:24px;vertical-align:middle;}
	.wtablebox02 table td.t1 {width:200px;text-align:center;}
	.wtablebox02 table td {text-align:center;}
	.wtablebox02 table td.t2 {text-align:center;padding-right:10px;}
	.wtablebox02 table td.t2 span {float:right;vertical-align:middle;}
	.wtablebox02 table td em {font-style:normal; padding-right:15px;vertical-align:middle;}
	.wtablebox02 table td input {border:solid 1px #000;width:18px;height:18px;vertical-align:middle;}
	.wtablebox02 table td.txtLeft{text-align:left;}
</style>

</head>
<body>
	<div class="content">
		<div class="txt01">
			<h3><?php if(!empty($data_temporary)) echo $data_temporary['ReportDestination'];?></h3>
			<P style="margin-top:25px;">捨印</P>
		</div>
		<div class="txt02">            
            <table width="100%">
            	<tr>
                    <td colspan="4" align="right"><?php echo $result['temp_demand']['Output_Date'];?></td>
                </tr>
            	<tr>
                	<td>(設置主体所在地)</td>
                    <td colspan="3"><?php if(!empty($data_temporary)) echo $data_temporary['BasedAddress'];?></td>
                </tr>
                <tr>
                	<td>(設置主体名称)</td>
                    <td colspan="3"><?php if(!empty($data_temporary)) echo $data_temporary['BasedName'];?></td>
                </tr>
                <tr>
                	<td></td>
                    <td style="font-size:10px;">職名</td>
                    <td style="font-size:10px;">氏名</td>
                    <td></td>
                </tr>
                <tr>
                	<td>(代表者職・氏名)</td>
                    <td><?php if(!empty($data_temporary)) echo $data_temporary['RepresentativeOffice'];?></td>
                    <td><?php if(!empty($data_temporary)) echo $data_temporary['RepresentativeName'];?></td>
                    <td>印</td>
                </tr>            
            </table>            
		</div>
		<div class="clear"></div>
		<h3 style="text-align:center;font-size:30px;line-height:34px;font-weight:normal;">一時預かり事業(幼稚園型)実績報告書 (<?php echo date('m',strtotime($result['temp_demand']['Date'].'-01'))?>月分)</h3>
		<p style="padding:0; margin:3px 0 15px;">次のとおり実績報告します。</p>
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td class="t1">幼稚園等名</td>
						<td class="txtLeft"><?php if(!empty($data_baseSet)) echo $data_baseSet['Kindergarden_Name2'];?></td>
					</tr>
					<tr>
						<td class="t1">所在地</td>
						<td class="txtLeft"><?php if(!empty($data_baseSet)) echo $data_baseSet['Kindergarden_Address'];?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3 style="font-size:15px;margin-top:15px;">ア　在籍園児の利用</h3>
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td rowspan="2" style="width:270px;">区分</td><td colspan="2" >平日(長期休業中を含む)</td><td colspan="2" >土・日曜日、祝日</td>
					</tr>
					<tr>
						<td>4時間以内</td><td>4時間超</td><td>8時間以内</td><td>8時間超</td>
					</tr>
					<tr>
						<td>生活保護世帯などに該当する世帯※</td>
                        <td class="t2"><span><?php echo $result['support_LessFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_OverFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_LessEight'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_OverEight'];?>人</span></td>
					</tr>
					<tr>
						<td>その他世帯</td>
                        <td class="t2"><span><?php echo $result['notSupport_LessFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['notSupport_OverFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['notSupport_LessEight'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['notSupport_OverEight'];?>人</span></td>
					</tr>
					<tr>
						<td>計</td>
                        <td class="t2"><span><?php echo $result['support_LessFour']+$result['notSupport_LessFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_OverFour']+$result['notSupport_OverFour'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_LessEight']+$result['notSupport_LessEight'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['support_OverEight']+$result['notSupport_OverEight'];?>人</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3 style="font-size:15px;margin-top:15px;">イ　在籍園児以外の児童の利用</h3>
		<div class="wtablebox02">
			<table width="68%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td rowspan="2" style="width:270px;">区分</td><td colspan="2" >全日</td>
					</tr>
					<tr>
						<td>8時間以内</td><td>8時間超</td>
					</tr>
					<tr>
						<td>生活保護世帯などに該当する世帯※</td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Support_LessEignt_Num'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Support_OverEignt_Num'];?>人</span></td>
					</tr>
					<tr>
						<td>その他世帯</td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Other_LessEight_Num'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Other_OverEight_Num'];?>人</span></td>
					</tr>
					<tr>
						<td>計</td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Support_LessEignt_Num']+$result['temp_demand']['Outschool_Other_LessEight_Num'];?>人</span></td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_Support_OverEignt_Num']+$result['temp_demand']['Outschool_Other_OverEight_Num'];?>人</span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3 style="font-size:15px;margin-top:15px;">第3条第2項に該当する世帯※の利用料免除分の補助額</h3>
		<div class="wtablebox02">
			<table width="68%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td>ア 　　在籍園児</td><td>イ 　　在籍園児以外の児童</td>
					</tr>
					<tr>
						<td class="t2"><span><?php echo $result['temp_demand']['Inschool_money'];?>円</span></td>
                        <td class="t2"><span><?php echo $result['temp_demand']['Outschool_money'];?>円</span></td>
					</tr>
				</tbody>
			</table>
			実績の詳細は、別紙「一時預かり事業(幼稚園型)利用状況内訳書」参照のこと。
		</div>
		<h3 style="font-size:15px;margin-top:8px;">担当(専任)保育士等名</h3>
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td style="width:170px;">氏名</td><td>区分</td><td>勤務形態</td>
					</tr>
                    <?php
					$Staff_ID_Arr = explode(';',$result['temp_demand']['Staff_ID_Arr']);
					foreach($result['staffInfo'] as $key => $val){
						if(!in_array($val['Staff_ID'],$Staff_ID_Arr)) continue;
						$arr=explode(';',$val['Staff_Duty']);
					?>
					<tr>
						<td><?php echo $val['Staff_Name'];?></td>
                        <td><em><?php echo in_array('Teacher', $arr)?'■':'□';?>幼稚園教諭</em>
             				<em><?php echo in_array('Guardian', $arr)?'■':'□';?>保育士</em>
                        	<em><?php echo in_array('Other', $arr)?'■':'□';?>その他</em>
                        </td>
                        <td>
                        	<em><?php echo $val['Staff_Work_Form']==1?'■':'□';?> 常勤</em>
                            <em><?php echo $val['Staff_Work_Form']==2?'■':'□';?> 非常勤　(　<?php echo $val['Staff_Work_Time'];?>　)時間</em>
                        </td>
					</tr>
					
					
					<!-- 
                    <tr>
						<td><?php echo $val['Staff_Name'];?></td>
                        <td><input class="checkbox01" type="checkbox" value="" <?php echo in_array('Teacher', $arr)?'checked="checked"':'';?>/><em>幼稚園教諭</em>
                        <input class="checkbox01" type="checkbox" value="" <?php echo in_array('Guardian', $arr)?'checked="checked"':'';?>/><em>保育士</em>
                        <input class="checkbox01" type="checkbox" value="" <?php echo in_array('Other', $arr)?'checked="checked"':'';?>/><em>その他</em></td>
                        <td>
                        	<input class="checkbox01" type="checkbox" value="" <?php echo $val['Staff_Work_Form']==1?'checked="checked"':'';?>/><em>常勤</em>
                            <input class="checkbox01" type="checkbox" value="" <?php echo $val['Staff_Work_Form']==2?'checked="checked"':'';?>/><em>非常勤　(　<?php echo $val['Staff_Work_Time'];?>　)時間</em>
                        </td>
					</tr>
					 -->
                    <?php
					}
					?>
					
				</tbody>
			</table>
		</div>
		<div style="text-align:left;padding:20px 0;height:60px;line-height:20px;"><?php if(!empty($data_temporary)) echo $data_temporary['ReportRemark'];?></div>
	</div>
	
</body>
</html>