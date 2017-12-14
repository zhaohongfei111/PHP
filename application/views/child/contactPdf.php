<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>緊　急　連　絡　カ　ー　ド</title>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:750px;margin:0 auto;padding-top:40px;}
	.tabletop {font-size:24px;font-weight:bold;text-align:center;border:solid 1px #d0d0d0;padding:1px 0 1px 0;}
	.wtablebox01 {margin-top:10px;}
	.wtablebox01 table,.wtablebox02 table {border-left:solid 2px #000;border-top:solid 2px #000;border-right:solid 1px #000;border-bottom:solid 1px #000;}
	.wtablebox01 table td,.wtablebox02 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;}
	.wtablebox01 table thead td {font-size:13px;}
	.wtablebox01 table thead td em {display:inline-block;width:100%;height:100%;background:url(images/tbg.gif) no-repeat -20px -15px;padding:40px 0 29px 0;}
	.wtablebox01 table thead span {padding:0 5px;}
	.wtablebox01 table tbody td {padding:2px;}
	.wtablebox01 table tbody td.t01 {font-weight:bold;font-size:14px;width:80px;text-align:center;}
	
	.wtablebox02 {padding-top:10px;padding-bottom:0px;}
	.wtablebox02 table td {padding:1px;font-size:14px;}
	.wtablebox02 table td span {font-size:12px;}
	.wtablebox02 table td.t1 {font-weight:bold;text-align:center;line-height:16px;width:90px;font-size:14px;}
	.wtablebox02 table td.t01 {border-bottom:dotted 1px #000;font-weight:bold;text-align:center;line-height:16px;width:198px;font-size:14px;}
	.wtablebox02 table td.t02 {font-weight:bold;text-align:center;line-height:16px;width:150px;font-size:14px;}
	.wtablebox02 table td.t2 {padding:3px 5px; height:16px;line-height:16px; text-align:center;}
	.wtablebox02 table td.t3 {text-align:center;}
	.wtablebox02 table td.t03 {border-right:dotted 1px #000; text-align:center}
	.wtablebox02 table td.t4 {width:180px;font-weight:bold;text-align:center;line-height:18px;font-size:15px;}
	.wtablebox02 table td.time{width:86px; text-align:center;}

</style>
</head>

<body>
	<div style="position:absolute; left:60px; top:30px;"><img src="<?php echo $media;?>images/logo.jpg" style="height:40px;" /></div>
	<div class="content">
		<div class="tabletop">緊　急　連　絡　カ　ー　ド</div>
		<div class="wtablebox01">
			<table width="30%" align="right" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td class="t01">出力日</td>
						<td align="center"><?php echo date('Y- m- d');?></td>
					</tr>
					<tr>
						<td class="t01">整理番号</td>
						<td align="center"><?php echo $child_Info['Child_Id'];?></td>
					</tr>
				</tbody>
			</table>
			<div class="clear"></div>
		</div>
		
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td class="t1" rowspan="7">園児名</td>
						<td class="t1" rowspan="4">ふりがな<br/>名　　前</td>
						<td rowspan="4" style="padding-left:5px;">
                         <?php 
							echo $child_Info['FamilyName_Spell'];
							for($i=0;$i<1;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName_Spell'];?>
                            <br />
                            <?php
							echo $child_Info['FamilyName'];
							$end = (strlen($child_Info['FamilyName_Spell'])-strlen($child_Info['FamilyName']))/3+1;
							for($i=0;$i<$end;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName'];
						?>                        
                        </td>
						<td class="t01">性別</td>
					</tr>
					<tr>
						<td class="t2" align="center"><?php if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}?></td>
					</tr>
					<tr>
						<td class="t01">クラス</td>
					</tr>
					<tr>
						<td class="t2" align="center"><?php echo empty($child_Info['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child_Info['Class']];?></td>
					</tr>
					<tr>
						<td class="t1">生年月日</td>
						<td colspan="2" style="padding-left:5px;"><?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($child_Info['Birthday'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>　月　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>　日生</td>
					</tr>
					<tr>
						<td class="t1">現住所</td>
						<td colspan="2"  style="padding-left:5px;"><?php echo $child_Info['Address'];?></td>
					</tr>
					<tr>
						<td class="t1">自宅TEL</td>
						<td colspan="2" style="padding-left:5px;"><?php echo $child_Info['Tel'];?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t4" rowspan="2">登園時間</td>
						<td class="t3">平日</td>
						<td class="time" colspan="3"><?php  if(!empty($child_Info['Arrive_Time'])){ echo $child_Info['Arrive_Time']=='00:00:00'?'':date('H:i',strtotime($child_Info['Arrive_Time']));}?></td>
						<td class="t3 t03">付添者続柄</td>
						<td align="center"><?php if(!empty($child_Info['Arrive_ByWho'])){ echo $parameter['RELATIONSHIP'][$child_Info['Arrive_ByWho']];} ?></td>
					</tr>
					<tr>
						<td class="t3">土曜</td>
						<td class="time" colspan="3"><?php if(!empty($child_Info['Arrive_Time_Rest'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Arrive_Time_Rest']));} ?></td>
						<td class="t3 t03">付添者続柄</td>
						<td align="center"><?php if(!empty($child_Info['Arrive_ByWho_Rest'])){ echo $parameter['RELATIONSHIP'][$child_Info['Arrive_ByWho_Rest']];} ?></td>
					</tr>
					<tr>
						<td class="t4" rowspan="2">降園時間</td>
						<td class="t3">平日</td>
						<td class="time" colspan="3"><?php if(!empty($child_Info['Leave_Time'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Leave_Time']));} ?></td>
						<td class="t3 t03">付添者続柄</td>
						<td align="center"><?php if(!empty($child_Info['Leave_ByWho'])){ echo $parameter['RELATIONSHIP'][$child_Info['Leave_ByWho']];} ?></td>
					</tr>
					<tr>
						<td class="t3">土曜</td>
						<td class="time" colspan="3"><?php if(!empty($child_Info['Leave_Time_Rest'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Leave_Time_Rest']));} ?></td>
						<td class="t3 t03">付添者続柄</td>
						<td align="center"><?php if(!empty($child_Info['Leave_ByWho_Rest'])){ echo $parameter['RELATIONSHIP'][$child_Info['Leave_ByWho_Rest']];} ?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t1" rowspan="7">代表保護者</td>
						<td class="t1" rowspan="2">ふりがな<br/>名　　前</td>
						<td rowspan="2">
                        <?php 						
						echo $contact_Info['Guardian1_FamilyName_Spell'];
						for($i=0;$i<1;$i++){
							echo "　";	
						}
						echo $contact_Info['Guardian1_GivenName_Spell'];
						echo "<br />";                           	
						echo $contact_Info['Guardian1_FamilyName'];
						$end = (strlen($contact_Info['Guardian1_FamilyName_Spell'])-strlen($contact_Info['Guardian1_FamilyName']))/3+1;
						for($i=0;$i<$end;$i++){
							echo "　";	
						}
						echo $contact_Info['Guardian1_GivenName'];									
						?>
                        
                        
                        </td>
						<td class="t01">関係</td>
					</tr>
					<tr>
						<td class="t2"><?php if(!empty($contact_Info['Guardian1_Relation'])){ echo $parameter['RELATIONSHIP'][$contact_Info['Guardian1_Relation']];} ?></td>
					</tr>
					<tr>
						<td class="t1">携　帯</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian1_Mobile'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務先名称</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian1_WorkPlace'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務先<br/>住　所</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian1_WorkAddress'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務時間</td>
						<td colspan="2" >
                        <?php
						$workTime = $workTimeRest = array();
						if(!empty($contact_Info)){
							if(!empty($contact_Info['Guardian1_WorkTime_Begin'])||!empty($contact_Info['Guardian1_WorkTime_End'])){
								$workTime[] = empty($contact_Info['Guardian1_WorkTime_Begin'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian1_WorkTime_Begin']));
								$workTime[] = empty($contact_Info['Guardian1_WorkTime_End'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian1_WorkTime_End']));
							}
							if(!empty($contact_Info['Guardian1_WorkTime_Begin_Rest'])||!empty($contact_Info['Guardian1_WorkTime_End_Rest'])){
								$workTimeRest[] = empty($contact_Info['Guardian1_WorkTime_Begin_Rest'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian1_WorkTime_Begin_Rest']));
								$workTimeRest[] = empty($contact_Info['Guardian1_WorkTime_End_Rest'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian1_WorkTime_End_Rest']));
							}
						}
						?>                        
                        平　日：<?php echo implode(' ～ ',$workTime);?><br />
                        土曜日：<?php echo implode(' ～ ',$workTimeRest);?>
                        </td>
					</tr>
					<tr>
						<td class="t1">勤務休日</td>
						<td colspan="2" ><?php if(!empty($contact_Info['Guardian1_RestDay'])){ echo $parameter['GUARDIAN_RESTDAY'][$contact_Info['Guardian1_RestDay']];} ?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t1" rowspan="7">代表保護者</td>
						<td class="t1" rowspan="2">ふりがな<br/>名　　前</td>
						<td rowspan="2">
                        <?php						
						echo $contact_Info['Guardian2_FamilyName_Spell'];
						for($i=0;$i<1;$i++){
							echo "　";	
						}
						echo $contact_Info['Guardian2_GivenName_Spell'];
						echo "<br />";                           	
						echo $contact_Info['Guardian2_FamilyName'];
						$end = (strlen($contact_Info['Guardian2_FamilyName_Spell'])-strlen($contact_Info['Guardian2_FamilyName']))/3+1;
						for($i=0;$i<$end;$i++){
							echo "　";	
						}
						echo $contact_Info['Guardian2_GivenName'];						
						?>
                        </td>
						<td class="t01">関係</td>
					</tr>
					<tr>
						<td class="t2"><?php if(!empty($contact_Info['Guardian2_Relation'])){ echo $parameter['RELATIONSHIP'][$contact_Info['Guardian2_Relation']];} ?></td>
					</tr>
					<tr>
						<td class="t1">携　帯</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian2_Mobile'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務先名称</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian2_WorkPlace'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務先<br/>住　所</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Guardian2_WorkAddress'];} ?></td>
					</tr>
					<tr>
						<td class="t1">勤務時間</td>
						<td colspan="2" >
                        <?php
						$workTime = $workTimeRest = array();
						if(!empty($contact_Info)){
							if(!empty($contact_Info['Guardian2_WorkTime_Begin'])||!empty($contact_Info['Guardian2_WorkTime_End'])){
								$workTime[] = empty($contact_Info['Guardian2_WorkTime_Begin'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian2_WorkTime_Begin']));
								$workTime[] = empty($contact_Info['Guardian2_WorkTime_End'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian2_WorkTime_End']));
							}
							if(!empty($contact_Info['Guardian2_WorkTime_Begin_Rest'])||!empty($contact_Info['Guardian2_WorkTime_End_Rest'])){
								$workTimeRest[] = empty($contact_Info['Guardian2_WorkTime_Begin_Rest'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian2_WorkTime_Begin_Rest']));
								$workTimeRest[] = empty($contact_Info['Guardian2_WorkTime_End_Rest'])?'　　　　　':date('H:i',strtotime($contact_Info['Guardian2_WorkTime_End_Rest']));
							}
						}
						?>                        
                        平　日：<?php echo implode(' ～ ',$workTime);?><br />
                        土曜日：<?php echo implode(' ～ ',$workTimeRest);?>
                        </td>
					</tr>
					<tr>
						<td class="t1">勤務休日</td>
						<td colspan="2" ><?php if(!empty($contact_Info['Guardian2_RestDay'])){ echo $parameter['GUARDIAN_RESTDAY'][$contact_Info['Guardian2_RestDay']];} ?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t1" rowspan="4">保護者に連絡つかない場合の連絡先</td>
						<td class="t1" rowspan="2">ふりがな<br/>名　　前</td>
						<td rowspan="2">
                        <?php 						
						echo $contact_Info['Assist_FamilyName_Spell'];
						for($i=0;$i<1;$i++){
							echo "　";	
						}
						echo $contact_Info['Assist_GivenName_Spell'];
						echo "<br />";                           	
						echo $contact_Info['Assist_FamilyName'];
						$end = (strlen($contact_Info['Assist_FamilyName_Spell'])-strlen($contact_Info['Assist_FamilyName']))/3+1;
						for($i=0;$i<$end;$i++){
							echo "　";	
						}
						echo $contact_Info['Assist_GivenName'];									
						?>
                        </td>
						<td class="t01">関係</td>
					</tr>
					<tr>
						<td class="t2"><?php if(!empty($contact_Info['Assist_Relation'])){ echo $parameter['RELATIONSHIP'][$contact_Info['Assist_Relation']];} ?></td>
					</tr>
					<tr>
						<td class="t1">住　　所</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Assist_Address'];} ?></td>
					</tr>
					<tr>
						<td class="t1">連絡先TEL</td>
						<td colspan="2" ><?php if(!empty($contact_Info)){ echo $contact_Info['Assist_Tel'];} ?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t1" rowspan="6">かかりつけ</td>
						<td class="t02">整形外科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical_Tel'];}?></td>
					</tr>
					<tr>
						<td class="t02">歯科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth_Tel'];}?></td>
					</tr>
					<tr>
						<td class="t02">眼科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye_Tel'];}?></td>
					</tr>
					<tr>
						<td class="t02">耳鼻科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose_Tel'];}?></td>
					</tr>
					<tr>
						<td class="t02">皮膚科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin_Tel'];}?></td>
					</tr>
					<tr>
						<td class="t02">小児科</td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child'];}?></td>
						<td><?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child_Tel'];}?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	
	
</body>
</html>