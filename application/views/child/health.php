<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
					<h4>※園児の体重と測定日を入力、保護者を選択すること</h4>';
	if(array_key_exists('from',$_GET)){					
    $logohtml .= '   <div class="topright topright01 right">
                        <p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="戻る" style="margin-top:0;"/></a></p>
                    </div>';
	}
	if($SELLEVEL!='Reader'){
	   $logohtml .= '	<div class="topright topright01 right">
							<p><input type="button" value="健康カード作成" onClick="formMainSave()" style="margin-top:0;"/></p>
						</div>';
	}
	$logohtml .= '					</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>健康カード作成　対象園児</h2></div>
			<div class="datebox">
				<div class="left">
					<div class="datelist datelist01 datelist02">
						<h2>基 本 情 報</h2>
						<ul>
							<li><span>整理番号</span><input name="txt_Child_Id" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Child_Id'];}?>" readonly /></li>
						</ul>
					</div>
					<div class="datelist datelist02">
						<h2>園 児 情 報</h2>
						<ul>
							<li>
								<span>苗字</span><input name="txt_FamilyName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName'];}?>" readonly />
								<span>名前</span><input name="txt_GivenName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName'];}?>" readonly />
							</li>
							<li>
								<span>みょうじ</span><input name="txt_FamilyName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName_Spell'];}?>" readonly />
								<span>なまえ</span><input name="txt_GivenName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName_Spell'];}?>" readonly />
							</li>
							<li><span>生年月日</span><input name="txt_birthday_Y" type="text" class="txt01" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ echo substr($child_Info['Birthday'],0,4);}?>" style="width:80px;" readonly />
								<em>年</em><input name="txt_birthday_M" type="text" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>" class="txt08" readonly />
								<em>月</em><input name="txt_birthday_D" type="text" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>" class="txt08" readonly />
								<em>日</em><em>満</em><input name="txt_Age" type="text" value="<?php if(!empty($child_Info)){echo substr($child_Info['Age'], 0,1);}?>" class="txt08" readonly /><em>歳</em>
							</li>
							<li><span style="width:25px;"></span><em>（</em><input name="txt_birthday_Y_Jap" type="text" class="txt01" value="<?php if(!empty($child_Info)){echo $child_Info['YearJap'];}?>" style="width:80px;" readonly /><em>年）</em></li>
							<li><span>性別</span><input name="txt_Sex" type="text" value="<?php if(!empty($child_Info)){if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}}?>" class="txt08" readonly />
								<span>クラス</span><input name="txt_Class" type="text" class="txt01" value="<?php if(!empty($child_Info)){echo empty($child_Info['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child_Info['Class']];}?>" readonly />
							</li>
						</ul>
					</div>
				</div>
				<div class="photoimg right">
					<div class="imgbox"><?php if(!empty($img)){?><img src="<?php echo $img.'?time='.time();?>" style="width:278px;height:232px;" /><?php }?></div>
				</div>
				<div class="clear"></div>
				<div class="datelist datelist02">
					<ul>
						<li><span>現 住 所</span><input type="text" class="txt02" value="<?php if(!empty($child_Info)){echo $child_Info['PostCode'].' '.$child_Info['Address'];}?>"  readonly /></li>
						<li><span>平熱</span><input name="txt_Temper" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Temper'];}?>" readonly />
						<span>血液型</span><input name="txt_BloodType" type="text" class="txt01" value="<?php if(!empty($child_Info['BloodType'])){ echo $parameter['BASE_INFO']['BloodType'][$child_Info['BloodType']];}?>"  readonly /></li>
						<li><strong>受けている補助</strong>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="gd" type="checkbox" value="0"  <?php if(!empty($child_Info)){if(in_array('0', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?> disabled /><label for="gd"><strong>該当なし</strong></label>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="yr" type="checkbox" value="1"  <?php if(!empty($child_Info)){if(in_array('1', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?> disabled /><label for="yr"><strong>乳幼児医療費</strong></label>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="jt" type="checkbox" value="2"  <?php if(!empty($child_Info)){if(in_array('2', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?> disabled /><label for="jt"><strong style="width:200px;">ひとり親家庭等医療費</strong></label>
						</li>
					</ul>
				</div>
				
				<div class="pagetable06">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
						<tbody>
							<tr>
								<td class="t01" rowspan="23">既往症と身体状況</td>
								<td class="t02" style="width:250px;">麻しん(はしか)</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_Measles']=='1'?'✔':'';}?></td>
								<td class="t02" style="width:250px;">手足ロ病</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_HFMD']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">水痘（みずぼうそう）</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_Chickenpox']=='1'?'✔':'';}?></td>
								<td class="t02">溶連菌感染症</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_BacteriaInfect']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">流行性耳下腺炎(おたふくかぜ)</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_Mumps']=='1'?'✔':'';}?></td>
								<td class="t02">中耳炎</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_Otitis']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">風しん（三日はしか）</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_Rubella']=='1'?'✔':'';}?></td>
								<td class="t02">肺炎</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_Pneumonia']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">百日せき</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_Cough']=='1'?'✔':'';}?></td>
								<td class="t02">ぜん息</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_Asthma']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">伝染病紅斑(りんご病)</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['His_RedSpot']=='1'?'✔':'';}?></td>
								<td class="t02">自家中毒</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['His_Poisoned']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">その他の病気</td>
								<td colspan="4"><?php if(!empty($health_Info)){echo $health_Info['His_Remark_Health'];}?></td>
							</tr>
							<tr>
								<td class="t02">その他の怪我</td>
								<td colspan="4"><?php if(!empty($health_Info)){echo $health_Info['His_Remark_Injury'];}?></td>
							</tr>
							<tr>
								<td class="t02">ひきつけをおこす</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_HaveTic']=='1'?'✔':'';}?></td>
								<td class="t02">熱を出しやすい</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['Body_Fever']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">風邪をひきやすい</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_CatchCold']=='1'?'✔':'';}?></td>
								<td class="t02">ぜん息をおこしやすい</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['Body_Asthma']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">扁桃腺がはれやすい</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_Tonsil']=='1'?'✔':'';}?></td>
								<td class="t02">脱臼しやすい</td>
								<td colspan="2"><?php if(!empty($health_Info)){echo $health_Info['Body_Disjoint']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">下痢をしやすい</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_Diarrhea']=='1'?'✔':'';}?></td>
								<td rowspan="3" class="t02">アトピー性</td>
								<td class="t03">皮膚炎</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Skin']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">皮膚が弱い</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_SkinWeak']=='1'?'✔':'';}?></td>
								<td class="t03">ぜん息</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Asthma']=='1'?'✔':'';}?></td>
							</tr>
							<tr>
								<td class="t02">鼻血が出やすい</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_NoseBleed']=='1'?'✔':'';}?></td>
								<td class="t03">その他</td>
								<td><?php if(!empty($health_Info)){echo $health_Info['Body_Atopy_Remark'];}?></td>
							</tr>
							<tr>
								<td class="t02">じんましんができやすい</td>
								<td class="t04">(原因)</td>
								<td colspan="3"><?php if(!empty($health_Info)){echo $health_Info['Body_Urticaria_Reason'];}?></td>
							</tr>
							<tr>
								<td rowspan="3" class="t02">アレルギーがある</td>
								<td class="t04">(原因)</td>
								<td colspan="3" rowspan="2"><?php if(!empty($health_Info)){echo $health_Info['Body_Allergy_Reason'];}?></td>
							</tr>
							<tr>
								<td class="t04">(症状)</td>
							</tr>
							<tr>
								<td colspan="4" style="text-align:left;">(原因となる食べ物もしくは薬):<?php if(!empty($health_Info)){echo $health_Info['Body_Allergy_FoodDrug'];}?></td>
							</tr>
							<tr>
								<td class="t02">目のようす</td>
								<td colspan="4"><?php if(!empty($health_Info)){if(!empty($health_Info['Eye_Status'])){switch ($health_Info['Eye_Status']){case '1':echo '異状なし';break;case '2': echo '近視' ;break;case '3':echo '弱視';break; }} echo '   '.$health_Info['Eye_Status_Remark'];}?></td>
							</tr>
							<tr>
								<td class="t02">耳のようす</td>
								<td colspan="4"><?php if(!empty($health_Info)){if(!empty($health_Info['Ear_Status'])){switch ($health_Info['Ear_Status']){case '1':echo '異状なし';break;case '2': echo '異状あり' ;break; }} echo '   '.$health_Info['Ear_Status_History'];}?></td>
							</tr>
							<tr>
								<td class="t02">その他の特記事項</td>
								<td colspan="4"><?php if(!empty($health_Info)){ echo $health_Info['Health_Remark']; } ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<form id="formMain" action="<?php echo URL::site('child/health_insert').URL::query();?>" method="post" target="_blank" enctype="multipart/form-data">
				<div class="datelist datetit">
					<h2>入 力 情 報</h2>
					<input name="hidden_ID" type="hidden" value="<?php echo $ID;?>" />
					<h3>園児の体重</h3>
					<div class="databox">
						<ul>
							<li><span>体　重</span><input name="txt_Weight" type="text" value="<?php if(!empty($healthcard_Info)){echo $healthcard_Info['Weight'];}?>" style="width:100px;" /><em>kg</em>
								<span>測定日</span>
								<select name="select_ScanDate_Y" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option <?php if(!empty($healthcard_Info)){echo $val['Y']==substr($healthcard_Info['ScanDate'], 0,4)?'selected':'';}?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
								<?php }?>
							</select><em>年</em>
								<select name="select_ScanDate_M" class="select01" >
								<option value="">-----</option>
								<?php foreach ($months as $key=>$val){?>
									<option <?php if(!empty($healthcard_Info)){echo $val==substr($healthcard_Info['ScanDate'], 5,2)?'selected':'';}?> value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select><em>月</em>
								<select name="select_ScanDate_D" class="select01" >
								<option value="">------</option>
								<?php foreach ($days as $key=>$val){?>
									<option <?php if(!empty($healthcard_Info)){echo $val==substr($healthcard_Info['ScanDate'], 8,2)?'selected':'';}?> value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select><em>日</em>
							</li>
						</ul>
					</div>
					<h3>保護者の選択<i>※健康カードに記載する保護者を選択してください。</i></h3>
					<div class="table05">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td></td><td>苗字</td><td>名前</td><td>性別</td><td>関係</td><td>年齢</td><td>生年月日</td><td>緊急連絡先</td><td>勤務先・在学校名</td></tr>
							</thead>
							<tbody>
								<tr>
                                	<td><input <?php if(!empty($healthcard_Info)){echo $healthcard_Info['Guardian1']==1?'checked':'';}?> name="checkbox_Guardian1" class="checkbox01 checkOnly" type="checkbox" value="1"/></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_FamilyName'];}?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_FamilyName_Spell'];}?></p></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_GivenName'];}?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_GivenName_Spell'];}?></td>
                                    <td><?php if(!empty($guardian_Info)){if($guardian_Info['Guardian2_Sex']=='1'){echo '男';}if($guardian_Info['Guardian2_Sex']=='2'){echo '女';}}?></td>
                                    <td><?php if(!empty($guardian_Info['Guardian1_Relation'])){echo $parameter['RELATIONSHIP'][$guardian_Info['Guardian1_Relation']];} ?></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_Age'];}?></td>
                                    <td><?php if(!empty($guardian_Info)){$birthday=explode('-',$guardian_Info['Guardian1_Birthday']);
                                    									if($birthday[0]=='0000'&&$birthday[1]=='00'&&$birthday[2]=='00'){echo '';}
                                    									else{foreach ($birthday as $key=>$val){if($val=='00'){$birthday[$key]='**';}if($val=='0000'){$birthday[$key]='****';}}echo implode('-',$birthday);}} ?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_YearJap'];} ?></p></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_Mobile'];} ?></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian1_WorkPlace'];} ?></td></tr>
								<tr><td><input <?php if(!empty($healthcard_Info)){echo $healthcard_Info['Guardian2']==2?'checked':'';}?> name="checkbox_Guardian2" class="checkbox01 checkOnly" type="checkbox" value="2"/></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_FamilyName'];}?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_FamilyName_Spell'];}?></p></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_GivenName'];}?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_GivenName_Spell'];}?></td>
                                    <td><?php if(!empty($guardian_Info)){if($guardian_Info['Guardian2_Sex']=='1'){echo '男';}if($guardian_Info['Guardian2_Sex']=='2'){echo '女';}}?></td>
                                    <td><?php if(!empty($guardian_Info['Guardian2_Relation'])){echo $parameter['RELATIONSHIP'][$guardian_Info['Guardian2_Relation']];} ?></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_Age'];}?></td>
                                    <td><?php if(!empty($guardian_Info)){$birthday=explode('-',$guardian_Info['Guardian2_Birthday']);
                                    									if($birthday[0]=='0000'&&$birthday[1]=='00'&&$birthday[2]=='00'){echo '';}
                                    									else{foreach ($birthday as $key=>$val){if($val==='00'){$birthday[$key]='**';}if($val==='0000'){$birthday[$key]='****';}}echo implode('-',$birthday);}}  ?><p><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_YearJap'];} ?></p></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_Mobile'];} ?></td>
                                    <td><?php if(!empty($guardian_Info)){echo $guardian_Info['Guardian2_WorkPlace'];} ?></td></tr>
							</tbody>
						</table>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
    
<script>
$(function(){
	$('.checkOnly').on('click',this,function(){checkOnly($(this))});
});
function formMainSave(){
	$('#formMain').submit();	
}
function checkOnly(obj)
{
	var checkboxArr = ['checkbox_Guardian1','checkbox_Guardian2'];
	var objname = obj.attr("name");
	if(obj.prop("checked")){
		checkboxArr.forEach(function(v){
			if(v!=objname){
				$('input[name="'+v+'"]').attr('checked',false);					
			}
		})
	}
}

</script>
</body>
</html>