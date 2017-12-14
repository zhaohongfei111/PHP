<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>健　康　記　録　カ　ー　ド </title>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:720px;margin:0 auto;padding-top:70px;}
	.tabletop {font-size:24px;font-weight:bold;text-align:center;border:solid 1px #d0d0d0;padding:6px 0 4px 0;}
	.wtablebox01 {margin-top:10px;}
	.wtablebox01 table,.wtablebox02 table {border-left:solid 2px #000;border-top:solid 2px #000;border-right:solid 1px #000;border-bottom:solid 1px #000;}
	.wtablebox01 table td,.wtablebox02 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;}
	.wtablebox01 table thead td {font-size:13px;}
	.wtablebox01 table thead td em {display:inline-block;width:100%;height:100%;background:url(images/tbg.gif) no-repeat -20px -15px;padding:40px 0 29px 0;}
	.wtablebox01 table thead span {padding:0 5px;}
	.wtablebox01 table tbody td {padding:2px;}
	.wtablebox01 table tbody td.t01 {font-weight:bold;font-size:16px;width:80px;text-align:center;}
	
	.wtablebox02 {padding-top:20px;padding-bottom:20px;}
	.wtablebox02 table td {padding:2px;font-size:14px;}
	.wtablebox02 table td span {font-size:12px;}
	.wtablebox02 table td.t1 {font-weight:bold;text-align:center;line-height:21px;width:68px;font-size:15px;}
	.wtablebox02 table td.t2 {padding:5px; height:60px;}
	.wtablebox02 table td.t3 {line-height:20px;font-size:14px;padding:0 0 0 5px;text-align:left;width:370px;}
	.wtablebox02 table td.t4 {font-weight:bold;width:136px;text-align:center;font-size:15px;}
	.wtablebox02 table td.t5 {width:190px;text-align:center; line-height:20px;}
	.wtablebox02 table td.t6 {text-align:center;}
	.wtablebox02 table td.t01 {border-bottom:dotted 1px #000;}
	.wtablebox02 table td.t02 {border-right:dotted 1px #000;}



</style>
</head>

<body>
	<div style="position:absolute; left:60px; top:30px;"><img src="<?php echo $media;?>images/logo.jpg" /></div>
	<div class="content">
		<div class="tabletop">健　康　記　録　カ　ー　ド </div>
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
						<td class="t1" rowspan="5">園児名</td>
						<td class="t1" rowspan="4">ふりがな<br/>名　　前</td>
						<td class="t3" rowspan="3" align="left">
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
						<td class="t1 t02">クラス</td>
                        <td style="padding-left:5px;"><?php echo empty($child_Info['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child_Info['Class']];?></td>
					</tr>
					<tr>
						<td class="t1 t02">性別</td>
                        <td style="padding-left:5px;"><?php if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}?></td>
					</tr>
					<tr>
						<td class="t1 t02">血液型</td>
                        <td style="padding-left:5px;"><?php if(!empty($child_Info['BloodType'])){ echo $parameter['BASE_INFO']['BloodType'][$child_Info['BloodType']];}?></td>
					</tr>
					<tr>
						<td class="t3"><?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($child_Info['Birthday'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>　月　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>　日生</td>
						<td class="t1 t01" colspan="2">平熱</td>
					</tr>
					<tr>
						<td class="t1">体重</td>
						<td class="t3"><?php echo empty($healthcard_Info['Weight'])?'　　':$healthcard_Info['Weight'];?>ｋｇ　　<?php echo substr($healthcard_Info['ScanDate'],0,4)!='0000'?substr($healthcard_Info['ScanDate'],0,4):'　　　　';?>　年　<?php echo substr($healthcard_Info['ScanDate'],5,2)!='00'?substr($healthcard_Info['ScanDate'],5,2):'　　';?>　月　<?php echo substr($healthcard_Info['ScanDate'],8,2)!='00'?substr($healthcard_Info['ScanDate'],8,2):'　　';?>　日測定</td>
						<td colspan="2" align="center"><?php echo $child_Info['Temper'];?></td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t1" rowspan="4">保護者</td>
						<td class="t1">ふりがな<br/>名　　前</td>
						<td>
                        <?php 
							if(!empty($healthcard_Info['Guardian1'])){							
								echo $guardian_Info['Guardian1_FamilyName_Spell'];
								for($i=0;$i<1;$i++){
									echo "　";	
								}
								echo $guardian_Info['Guardian1_GivenName_Spell'];
								echo "<br />";                           	
								echo $guardian_Info['Guardian1_FamilyName'];
								$end = (strlen($guardian_Info['Guardian1_FamilyName_Spell'])-strlen($guardian_Info['Guardian1_FamilyName']))/3+1;
								for($i=0;$i<$end;$i++){
									echo "　";	
								}
								echo $guardian_Info['Guardian1_GivenName'];						
							}							
							if(!empty($healthcard_Info['Guardian1'])&&!empty($healthcard_Info['Guardian2'])){echo "<br />";}
							
							if(!empty($healthcard_Info['Guardian2'])){						
								echo $guardian_Info['Guardian2_FamilyName_Spell'];
								for($i=0;$i<1;$i++){
									echo "　";	
								}
								echo $guardian_Info['Guardian2_GivenName_Spell'];
								echo "<br />";                           	
								echo $guardian_Info['Guardian2_FamilyName'];
								$end = (strlen($guardian_Info['Guardian2_FamilyName_Spell'])-strlen($guardian_Info['Guardian2_FamilyName']))/3+1;
								for($i=0;$i<$end;$i++){
									echo "　";	
								}
								echo $guardian_Info['Guardian2_GivenName'];						
							}							
						?>
                        </td>
					</tr>
					<tr>
						<td class="t1">現住所</td>
						<td>
						<?php
							/* 2016-11-30 修正6
							 * if(!empty($healthcard_Info['Guardian1'])){							
								echo $guardian_Info['Guardian1_WorkAddress'];													
							}							
							if(!empty($healthcard_Info['Guardian1'])&&!empty($healthcard_Info['Guardian2'])){echo "<br />";}
							
							if(!empty($healthcard_Info['Guardian2'])){						
								echo $guardian_Info['Guardian2_WorkAddress'];														
							}*/	
							echo $child_Info['PostCode'].' '.$child_Info['Address'];						
						?>
                        </td>
					</tr>
					<tr>
						<td class="t1">自宅TEL</td>
						<td>
						<?php
							/* 2016-11-30 修正6
							 * if(!empty($healthcard_Info['Guardian1'])){							
								echo $guardian_Info['Guardian1_WorkTel'];													
							}							
							if(!empty($healthcard_Info['Guardian1'])&&!empty($healthcard_Info['Guardian2'])){echo "<br />";}
							
							if(!empty($healthcard_Info['Guardian2'])){						
								echo $guardian_Info['Guardian2_WorkTel'];														
							}*/	
							echo $child_Info['Tel'];					
						?>
                        </td>
					</tr>
					<tr>
						<td class="t1">携　帯</td>
						<td>
						<?php
							if(!empty($healthcard_Info['Guardian1'])){							
								echo $guardian_Info['Guardian1_Mobile'];													
							}							
							if(!empty($healthcard_Info['Guardian1'])&&!empty($healthcard_Info['Guardian2'])){echo "<br />";}
							
							if(!empty($healthcard_Info['Guardian2'])){						
								echo $guardian_Info['Guardian1_Mobile'];														
							}							
						?>
                        </td>
					</tr>
				</tbody>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;border-top:none;">
				<tbody>
					<tr>
						<td class="t4" rowspan="24">既往症と身体状況</td>
						<td class="t5 t02">麻しん(はしか)</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Measles']=='1'?'✔':'';}?></td>
						<td class="t5 t02">手足ロ病</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_HFMD']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">水痘(みずぼうそう)</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Chickenpox']=='1'?'✔':'';}?></td>
						<td class="t5 t02">溶連菌感染症</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_BacteriaInfect']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">流行性耳下腺炎(おたふくかぜ)</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Mumps']=='1'?'✔':'';}?></td>
						<td class="t5 t02">中耳炎</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Otitis']=='1'?'✔':'';}?></td>
					</tr>
                    <tr>
						<td class="t5 t02">風しん（三日はしか）</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Rubella']=='1'?'✔':'';}?></td>
						<td class="t5 t02">肺炎</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Pneumonia']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">百日せき</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Cough']=='1'?'✔':'';}?></td>
						<td class="t5 t02">ぜん息</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Asthma']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">伝染病紅斑(りんご病)</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_RedSpot']=='1'?'✔':'';}?></td>
						<td class="t5 t02">自家中毒</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['His_Poisoned']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02"><strong>その他の病気</strong></td>
						<td colspan="4"><?php if(!empty($health_Info)){ echo $health_Info['His_Remark_Health'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02"><strong>その他の怪我</strong></td>
						<td colspan="4"><?php if(!empty($health_Info)){ echo $health_Info['His_Remark_Injury'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02">ひきつけをおこす</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_HaveTic']=='1'?'✔':'';}?></td>
						<td class="t5 t02">熱を出しやすい</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_Fever']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">風邪をひきやすい</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_CatchCold']=='1'?'✔':'';}?></td>
						<td class="t5 t02">ぜん息をおこしやすい</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_Asthma']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">扁桃腺がはれやすい</td>
						<td align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_Tonsil']=='1'?'✔':'';}?></td>
						<td class="t5 t02">脱臼しやすい</td>
						<td colspan="2" align="center"><?php if(!empty($health_Info)){ echo $health_Info['Body_Disjoint']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">下痢をしやすい</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_Diarrhea']=='1'?'✔':'';}?></td>
						<td class="t5" rowspan="3">アトピー性</td>
						<td class="t6 t02">皮膚炎</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Skin']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">皮膚が弱い</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_SkinWeak']=='1'?'✔':'';}?></td>
						<td class="t6 t02">ぜん息</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Asthma']=='1'?'✔':'';}?></td>
					</tr>
					<tr>
						<td class="t5 t02">鼻血が出やすい</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_NoseBleed']=='1'?'✔':'';}?></td>
						<td class="t6 t02">その他</td>
						<td align="center"><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Remark'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02">じんましんができやすい</td>
						<td>(原因)</td>
                        <td colspan="3"><?php if(!empty($health_Info)){echo $health_Info['Body_Urticaria_Reason'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02" rowspan="3">アレルギーがある</td>
						<td>(原因)</td>
                        <td colspan="3" rowspan="2"><?php if(!empty($health_Info)){echo $health_Info['Body_Allergy_Reason'];}?></td>
					</tr>
					<tr>
						<td>(症状)</td>
					</tr>
					<tr>
						<td colspan="4">(原因となる食べ物もしくは薬):<?php if(!empty($health_Info)){echo $health_Info['Body_Allergy_FoodDrug'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02">目のようす</td>
						<td colspan="4"><?php if(!empty($health_Info)){if(!empty($health_Info['Eye_Status'])){switch ($health_Info['Eye_Status']){case '1':echo '異状なし';break;case '2': echo '近視' ;break;case '3':echo '弱視';break; }} echo '   '.$health_Info['Eye_Status_Remark'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02">耳のようす</td>
						<td colspan="4"><?php if(!empty($health_Info)){if(!empty($health_Info['Ear_Status'])){switch ($health_Info['Ear_Status']){case '1':echo '異状なし';break;case '2': echo '異状あり' ;break; }} echo '   '.$health_Info['Ear_Status_History'];}?></td>
					</tr>
					<tr>
						<td class="t5 t02">その他の特記事項</td>
						<td colspan="4"><?php if(!empty($health_Info)){ echo $health_Info['Health_Remark']; } ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
	<?php
    foreach($fileList as $key => $val){
	?>
	<div class="content">
		<div class="tabletop">保　険　証　コ　ピー　添　付　欄</div>		
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td style="height:900px;" align="center">
                        
                        <img src="<?php echo $media.'uploadfile/'.$key;?>" width="95%">
                        
                        </td>
					</tr>

				</tbody>
			</table>
		</div>		
	</div>
    <?php
	}
	?>
</body>
</html>