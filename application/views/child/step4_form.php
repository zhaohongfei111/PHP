				<div class="datelist datelist00 bold">
					<h2>健 康 の 状 況</h2>
					<div class="databox">
						<h3>今までかかったことのある病気や怪我</h3>
						<ul>
							<li><input name="checkbox_His_Measles" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Measles']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">麻しん (はしか)</strong>
								<select name="select_His_Measles_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Measles_Age']==$key&&$child_Info['His_Measles_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Chickenpox" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Chickenpox']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">水痘 (みずぼうそう)</strong>
								<select name="select_His_Chickenpox_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Chickenpox_Age']==$key&&$child_Info['His_Chickenpox_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Mumps" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Mumps']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">流行性耳下腺炎 (おたふくかぜ)</strong>
								<select name="select_His_Mumps_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Mumps_Age']==$key&&$child_Info['His_Mumps_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</option></select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Rubella" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Rubella']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">風しん(三日はしか)</strong>
								<select name="select_His_Rubella_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Rubella_Age']==$key&&$child_Info['His_Rubella_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Cough" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Cough']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">百日せき</strong>
								<select name="select_His_Cough_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Cough_Age']==$key&&$child_Info['His_Cough_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_RedSpot" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_RedSpot']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">伝染病紅斑 (りんご病)</strong>
								<select name="select_His_RedSpot_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_RedSpot_Age']==$key&&$child_Info['His_RedSpot_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_HFMD" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_HFMD']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">手足口病</strong>
								<select name="select_His_HFMD_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_HFMD_Age']==$key&&$child_Info['His_HFMD_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_BacteriaInfect" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_BacteriaInfect']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">溶連菌感染症</strong>
								<select name="select_His_BacteriaInfect_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_BacteriaInfect_Age']==$key&&$child_Info['His_BacteriaInfect_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Otitis" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Otitis']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">中耳炎</strong>
								<select name="select_His_Otitis_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Otitis_Age']==$key&&$child_Info['His_Otitis_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Pneumonia" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Pneumonia']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">肺炎</strong>
								<select name="select_His_Pneumonia_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Pneumonia_Age']==$key&&$child_Info['His_Pneumonia_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Asthma" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Asthma']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">ぜん息</strong>
								<select name="select_His_Asthma_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Asthma_Age']==$key&&$child_Info['His_Asthma_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><input name="checkbox_His_Poisoned" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['His_Poisoned']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">自家中毒</strong>
								<select name="select_His_Poisoned_Age" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['His_Poisoned_Age']==$key&&$child_Info['His_Poisoned_Age']!==NULL){echo 'selected';}}?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
							</li>
							<li><strong>その他の病気</strong></li>
							<li><textarea name="txt_His_Remark_Health" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['His_Remark_Health'];}?></textarea></li>
							<li><strong>その他の怪我</strong></li>
							<li><textarea name="txt_His_Remark_Injury" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['His_Remark_Injury'];}?></textarea></li>
						</ul>
					</div>
					
					<div class="databox">
						<h3>体のようす</h3>
						<ul>
							<li><input name="checkbox_Body_HaveTic" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_HaveTic']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">ひきつけをおこす</strong></li>
							<li><input name="checkbox_Body_CatchCold" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_CatchCold']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">風邪をひきやすい</strong></li>
							<li><input name="checkbox_Body_Tonsil" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Tonsil']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">扁桃腺がはれやすい</strong></li>
							<li><input name="checkbox_Body_Diarrhea" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Diarrhea']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">下痢をしやすい</strong></li>
							<li><input name="checkbox_Body_SkinWeak" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_SkinWeak']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">皮膚が弱い</strong></li>
							<li><input name="checkbox_Body_NoseBleed" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_NoseBleed']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">鼻血が出やすい</strong></li>
							<li><input name="checkbox_Body_Fever" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Fever']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">熱を出しやすい</strong></li>
							<li><input name="checkbox_Body_Asthma" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Asthma']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">ぜん息をおこしやすい</strong></li>
							<li><input name="checkbox_Body_Disjoint" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Disjoint']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">脱臼しやすい</strong><input name="txt_Body_Disjoint_Place" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Body_Disjoint_Place'];}?>" placeholder="場 所" /></li>
							<li><input name="checkbox_Body_Atopy" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Atopy']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">アトピー性がある</strong><input name="checkbox_Body_Atopy_Skin" class="checkbox01" id="gd" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Atopy_Skin']=='1'){echo 'checked';}}?> value="1"/><span>皮膚炎</span><input name="checkbox_Body_Atopy_Asthma" class="checkbox01" id="gd" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Atopy_Asthma']=='1'){echo 'checked';}}?> value="1"/><span>ぜん息</span><input name="txt_Body_Atopy_Remark" type="text" class="txt01" value="<?php if(!empty($child_Info)){echo $child_Info['Body_Atopy_Remark'];}?>" placeholder="そ の 他"></li>
							<li><input name="checkbox_Body_Urticaria" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Urticaria']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">じんましんができやすい</strong><input name="txt_Body_Urticaria_Reason" type="text" class="txt03" value="" placeholder="原 因" /></li>
							<li><input name="checkbox_Body_Allergy" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Allergy']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">アレルギーがある</strong></li>
							<li style="margin-left:40px;"><strong>原因と症状</strong></li>
							<li style="margin-left:40px;"><textarea name="txt_Body_Allergy_Reason" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Body_Allergy_Reason'];}?></textarea></li>
							<li style="margin-left:40px;"><strong style="width:500px;">アレルギーのおきる食べ物もしくは薬</strong></li>
							<li style="margin-left:40px;"><textarea name="txt_Body_Allergy_FoodDrug" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Body_Allergy_FoodDrug'];}?></textarea></li>
							<li><input name="checkbox_Body_Other" class="checkbox01" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Body_Other']=='1'){echo 'checked';}}?> value="1"/><strong style="width:300px;">その他の症状</strong></li>
							<li><textarea name="txt_Body_Other_Remark" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Body_Other_Remark'];}?></textarea></li>
						</ul>
					</div>
					<div class="databox">
						<h3>目のようす</h3>
						<ul>
							<li><input name="checkbox_Eye_Status[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eye_Status']=='1'){ echo 'checked';} }?> value="1"/><span>異状なし</span><input name="checkbox_Eye_Status[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eye_Status']=='2'){ echo 'checked';} }?> value="2"/><span>近視</span><input name="checkbox_Eye_Status[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eye_Status']=='3'){ echo 'checked';} }?> value="3"/><span>弱視</span></li>
							<li><input name="txt_Eye_Status_Remark" type="text" class="txt03" placeholder="そ の 他" value="<?php if(!empty($child_Info)){echo $child_Info['Eye_Status_Remark'];}?>" /></li>
						</ul>
					</div>
					<div class="databox">
						<h3>耳のようす</h3>
						<ul>
							<li><input name="checkbox_Ear_Status[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Ear_Status']=='1'){ echo 'checked';} }?> value="1"/><span>異状なし</span></li>
							<li><input name="checkbox_Ear_Status[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Ear_Status']=='2'){ echo 'checked';} }?> value="2"/><span>異状あり</span><input name="txt_Ear_Status_History" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Ear_Status_History'];}?>" placeholder="耳疾患の既往症" /></li>
						</ul>
					</div>
					<div class="databox">
						<h3>その他特記すること</h3>
						<ul>
							<li><textarea name="txt_Health_Remark" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Health_Remark'];}?></textarea></li>
						</ul>
					</div>
				</div>
<script>
$(document).ready(function() {
	$('input[name="checkbox_His_Measles"]').bind('click',function(){checkSelect('checkbox_His_Measles','select_His_Measles_Age')});
	checkSelect('checkbox_His_Measles','select_His_Measles_Age');
	
	$('input[name="checkbox_His_Chickenpox"]').bind('click',function(){checkSelect('checkbox_His_Chickenpox','select_His_Chickenpox_Age')});
	checkSelect('checkbox_His_Chickenpox','select_His_Chickenpox_Age');
	
	$('input[name="checkbox_His_Mumps"]').bind('click',function(){checkSelect('checkbox_His_Mumps','select_His_Mumps_Age')});
	checkSelect('checkbox_His_Mumps','select_His_Mumps_Age');
	
	$('input[name="checkbox_His_Rubella"]').bind('click',function(){checkSelect('checkbox_His_Rubella','select_His_Rubella_Age')});
	checkSelect('checkbox_His_Rubella','select_His_Rubella_Age');
	
	$('input[name="checkbox_His_Cough"]').bind('click',function(){checkSelect('checkbox_His_Cough','select_His_Cough_Age')});
	checkSelect('checkbox_His_Cough','select_His_Cough_Age');
	
	$('input[name="checkbox_His_RedSpot"]').bind('click',function(){checkSelect('checkbox_His_RedSpot','select_His_RedSpot_Age')});
	checkSelect('checkbox_His_RedSpot','select_His_RedSpot_Age');
	
	$('input[name="checkbox_His_HFMD"]').bind('click',function(){checkSelect('checkbox_His_HFMD','select_His_HFMD_Age')});
	checkSelect('checkbox_His_HFMD','select_His_HFMD_Age');
	
	$('input[name="checkbox_His_BacteriaInfect"]').bind('click',function(){checkSelect('checkbox_His_BacteriaInfect','select_His_BacteriaInfect_Age')});
	checkSelect('checkbox_His_BacteriaInfect','select_His_BacteriaInfect_Age');
	
	$('input[name="checkbox_His_Otitis"]').bind('click',function(){checkSelect('checkbox_His_Otitis','select_His_Otitis_Age')});
	checkSelect('checkbox_His_Otitis','select_His_Otitis_Age');
	
	$('input[name="checkbox_His_Pneumonia"]').bind('click',function(){checkSelect('checkbox_His_Pneumonia','select_His_Pneumonia_Age')});
	checkSelect('checkbox_His_Pneumonia','select_His_Pneumonia_Age');
	
	$('input[name="checkbox_His_Asthma"]').bind('click',function(){checkSelect('checkbox_His_Asthma','select_His_Asthma_Age')});
	checkSelect('checkbox_His_Asthma','select_His_Asthma_Age');
	
	$('input[name="checkbox_His_Poisoned"]').bind('click',function(){checkSelect('checkbox_His_Poisoned','select_His_Poisoned_Age')});
	checkSelect('checkbox_His_Poisoned','select_His_Poisoned_Age');
	
	$('input[name="checkbox_Body_Atopy"]').bind('click',function(){bodyAtopyClick();});
	bodyAtopyClick();
		
	$('input[name="checkbox_Body_Allergy"]').bind('click',function(){bodyAllergyClick();});
	bodyAllergyClick();	
	
	$('input[name="checkbox_Body_Other"]').bind('click',function(){bodyOtherClick();});
	bodyOtherClick();
	
	$('input[name="checkbox_Ear_Status[]"]').bind('click',function(){earStatusClick();});
	earStatusClick();		
});
function checkSelect(checkName,selectName)
{
	if($('input[name="'+checkName+'"]').is(":checked")==true){
		$('select[name="'+selectName+'"]').attr('disabled',false);
	}else{
		$('select[name="'+selectName+'"]').attr('disabled',true).val("");
	}
}
function bodyAtopyClick()
{   
	if($('input[name="checkbox_Body_Atopy"]').is(":checked")==true){
		$('input[name="checkbox_Body_Atopy_Skin"]').attr('disabled',false);
		$('input[name="checkbox_Body_Atopy_Asthma"]').attr('disabled',false);
		$('input[name="txt_Body_Atopy_Remark"]').attr('disabled',false);
	}else{
		$('input[name="checkbox_Body_Atopy_Skin"]').attr({'disabled':true,'checked':false});
		$('input[name="checkbox_Body_Atopy_Asthma"]').attr({'disabled':true,'checked':false});
		$('input[name="txt_Body_Atopy_Remark"]').attr('disabled',true).val("");
	}
}
function bodyAllergyClick()
{
	if($('input[name="checkbox_Body_Allergy"]').is(":checked")==true){
		$('textarea[name="txt_Body_Allergy_Reason"]').attr('disabled',false);
		$('textarea[name="txt_Body_Allergy_FoodDrug"]').attr('disabled',false);
	}else{
		$('textarea[name="txt_Body_Allergy_Reason"]').attr('disabled',true).val("");
		$('textarea[name="txt_Body_Allergy_FoodDrug"]').attr('disabled',true).val("");
	}
}

function bodyOtherClick()
{
	if($('input[name="checkbox_Body_Other"]').is(":checked")==true){
		$('textarea[name="txt_Body_Other_Remark"]').attr('disabled',false);
	}else{
		$('textarea[name="txt_Body_Other_Remark"]').attr('disabled',true).val("");
	}	
}
function earStatusClick()
{
	if($('input[name="checkbox_Ear_Status[]"]:checked').val()=='2'){
		$('input[name="txt_Ear_Status_History"]').attr('disabled',false);
	}else{
		$('input[name="txt_Ear_Status_History"]').attr('disabled',true).val("");
	}
}


</script>