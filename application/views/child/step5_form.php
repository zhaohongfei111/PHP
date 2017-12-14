				<div class="datelist datelist00 bold">
					<h2>生 活 の 状 況 ①</h2>
					<div class="databox">
						<h3>食 事</h3>
						<ul>
							<li><strong>食欲</strong><input name="checkbox_Eat_Appetite[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Appetite']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>ある</span>
								<input name="checkbox_Eat_Appetite[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Appetite']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>ふつう</span>
								<input name="checkbox_Eat_Appetite[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Appetite']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>少ない</span>
								<input name="checkbox_Eat_Appetite[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Appetite']=='4'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="4"/><strong>むらがある</strong>
							</li>
							<li><strong>食事のようす</strong><input name="checkbox_Eat_Speed[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Speed']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong>早く食べる</strong>
								<input name="checkbox_Eat_Speed[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Speed']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>ふつう</span>
								<input name="checkbox_Eat_Speed[]" <?php if(!empty($child_Info)){if($child_Info['Eat_Speed']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><strong>時間がかかる</strong>
							</li>
							<li><strong>好きなもの</strong><input name="txt_Eat_Like" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Eat_Like'];}?>"/></li>
							<li><strong>嫌いなもの</strong><input name="txt_Eat_Unlike" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Eat_Unlike'];}?>"/></li>
							<li><strong>間食</strong><input name="checkbox_Eat_Snacks[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eat_Snacks']=='1'){ echo 'checked';} }?> value="1"/><strong>時間を決めている</strong><select name="select_Eat_Snacks_Time" class="select01">
							<option value="">----</option>
							<?php foreach ($eat_Snacks_Time as $key =>$val) {?>
								<option  <?php if(!empty($child_Info)){if($child_Info['Eat_Snacks_Time']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>" ><?php echo $val['objective']?></option>
							<?php }?>
							</select><em>時ごろ</em></li>
							<li><strong></strong><input name="checkbox_Eat_Snacks[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eat_Snacks']=='2'){ echo 'checked';} }?> value="2"/><strong>決まっていない</strong></li>
							<li><strong></strong><input name="checkbox_Eat_Snacks[]" class="checkbox01 checkOnly" id="" type="checkbox" <?php if(!empty($child_Info)){if($child_Info['Eat_Snacks']=='3'){ echo 'checked';} }?> value="3"/><strong>与えない</strong></li>
						</ul>
					</div>
					
					<div class="databox">
						<h3>排 泄</h3>
						<ul>
							<li><strong>大便</strong><input name="checkbox_Toilet_Big[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Big']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong>ひとりでできる</strong></li>
							<li><strong></strong><input name="checkbox_Toilet_Big[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Big']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>できない</span>
								<input name="checkbox_Toilet_Big_Leak[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Big_Leak']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong>もらさない</strong>
								<input name="checkbox_Toilet_Big_Leak[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Big_Leak']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong>もらすことがある</strong>
							</li>
							<li><strong>小便</strong><input name="checkbox_Toilet_Small[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Small']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>とおい</span></li>
							<li><strong></strong><input name="checkbox_Toilet_Small[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Small']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>ふつう</span></li>
							<li><strong></strong><input name="checkbox_Toilet_Small[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Small']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>ちかい</span>
								<select name="select_Toilet_Small_Period" class="select01">
								<option value="">----</option>
								<?php foreach ($parameter['TOILET_SMALL_PERIOD'] as $key=>$val){?>
									<option <?php if(!empty($child_Info)){if($child_Info['Toilet_Small_Period']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php  echo $val?></option>
								<?php }?>
								</select><em>分おき</em>
							</li>
							<li><strong>夜尿</strong><input name="checkbox_Toilet_Night[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Night']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>しない</span><input name="checkbox_Toilet_Night[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Night']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>よくする</span></li>
							<li><strong></strong><input name="checkbox_Toilet_Night[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Night']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>時々する</span>
								<input name="checkbox_Toilet_Night[]" <?php if(!empty($child_Info)){if($child_Info['Toilet_Night']=='4'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="4"/><strong>疲れたときにする</strong>
							</li>
						</ul>
					</div>
					
					<div class="databox">
						<h3>睡 眠</h3>
						<ul>
							<li><strong>起床・就床</strong><span>起床</span>
                            	<select name="select_Sleep_WakeTime" class="select01">
                            	<option value=""></option>
                                <?php foreach ($sleepWakeTimeList as $key =>$val) {?>
								<option  <?php if(!empty($child_Info)){if($child_Info['Sleep_WakeTime']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>" ><?php echo $val['objective']?></option>
								<?php }?>
                                </select><em>時ごろ</em>
								<input name="checkbox_Sleep_Wake" <?php if(!empty($child_Info)){if($child_Info['Sleep_Wake']=='1'){ echo 'checked';} }?> class="checkbox01" id="" type="checkbox" value="1"/><strong style="width:300px;">時間は決まっていない</strong>
							</li>
							<li><strong></strong><span>就床</span>
                            	<select name="select_Sleep_SleepTime" class="select01">
                                <option value=""></option>
                                <?php foreach ($sleepSleepTimeList as $key =>$val) {?>
								<option  <?php if(!empty($child_Info)){if($child_Info['Sleep_SleepTime']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>" ><?php echo $val['objective']?></option>
								<?php }?>
                                </select><em>時ごろ</em>
								<input name="checkbox_Sleep_Sleep" <?php if(!empty($child_Info)){if($child_Info['Sleep_Sleep']=='1'){ echo 'checked';} }?> class="checkbox01" id="" type="checkbox" value="1"/><strong style="width:300px;">時間は決まっていない</strong>
							</li>
							<li><strong>寝るようす</strong><input name="checkbox_Sleep_Who[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Who']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>ひとりで</span>
								<input name="checkbox_Sleep_Who[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Who']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong>きょうだいと</strong>
							</li>
							<li><strong></strong><input name="checkbox_Sleep_Who[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Who']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>父と</span>
								<input name="checkbox_Sleep_Who[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Who']=='4'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="4"/><span>その他</span><input name="txt_Sleep_Who_Other" type="text" class="txt01" value="<?php if(!empty($child_Info)){echo $child_Info['Sleep_Who_Other'];}?>"/>
							</li>
							<li><strong></strong><input name="checkbox_Sleep_Who[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Who']=='5'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="5"/><span>母と</span></li>
							<li><strong>昼寝</strong><input name="checkbox_Sleep_Daytime[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Daytime']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong>いつもする</strong>
								<select name="select_Sleep_Daytime_Spend" class="select01">
								<option value="">----</option>
								<?php foreach ($parameter['SLEEP_DAYTIME_SPEND'] as $key=>$val){?>
									<option <?php if(!empty($child_Info)){if($child_Info['Sleep_Daytime_Spend']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>分</em>
							</li>
							<li><strong></strong><input name="checkbox_Sleep_Daytime[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Daytime']=='2'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong>疲れたときにする</strong></li>
							<li><strong></strong><input name="checkbox_Sleep_Daytime[]" <?php if(!empty($child_Info)){if($child_Info['Sleep_Daytime']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><strong>ほとんどしない</strong></li>
							<li><strong style="width:300px;">その他特記すること</strong></li>
							<li><textarea name="txt_Live1_Remark" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Live1_Remark'];}?></textarea></li>
						</ul>
					</div>
					
					<h2>生 活 の 状 況 ②</h2>
					<div class="databox">
						<ul>
							<li><strong>言葉</strong><input name="checkbox_Language[]" <?php if(!empty($child_Info)){if($child_Info['Language']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong>普通に話をする</strong>
								<input name="checkbox_Language[]" <?php if(!empty($child_Info)){if($child_Info['Language']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong style="width:170px;">赤ちゃん言葉がある</strong>
								<input name="checkbox_Language[]" <?php if(!empty($child_Info)){if($child_Info['Language']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><strong style="width:150px;">あまり話をしない</strong>
							</li>
							<li><strong>利き手</strong><input name="checkbox_StrongHand[]" <?php if(!empty($child_Info)){if($child_Info['StrongHand']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>右利き</span>
								<input name="checkbox_StrongHand[]" <?php if(!empty($child_Info)){if($child_Info['StrongHand']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>左利き</span>
								<input name="checkbox_StrongHand[]" <?php if(!empty($child_Info)){if($child_Info['StrongHand']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><strong style="width:350px;">左利きを右利きになおした</strong>
							</li>
							<li><strong>気になる癖</strong><input name="txt_Hobby" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Hobby'];}?>"/></li>
							<li><strong>人見知り</strong><input name="checkbox_DistingMen[]" <?php if(!empty($child_Info)){if($child_Info['DistingMen']=='1'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>しない</span>
								<input name="checkbox_DistingMen[]" <?php if(!empty($child_Info)){if($child_Info['DistingMen']=='2'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>ふつう</span>
								<input name="checkbox_DistingMen[]" <?php if(!empty($child_Info)){if($child_Info['DistingMen']=='3'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>つよい</span>
							</li>
							<li><strong>親しい友だち</strong><select name="select_Friend1_Age" class="select01">
							<option value="">----</option>
							<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Friend1_Age']==$key&&$child_Info['Friend1_Age']!=NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>歳</em>
								<input name="txt_Friend1_Name" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Friend1_Name'];}?>" placeholder="名　前"/>
							</li>
							<li><strong></strong><select name="select_Friend2_Age" class="select01">
							<option value="">----</option>
							<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Friend2_Age']==$key&&$child_Info['Friend2_Age']!=NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>歳</em>
								<input name="txt_Friend2_Name" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Friend2_Name'];}?>" placeholder="名　前"/>
							</li>
							<li><strong>よく遊ぶ場所</strong><input name="checkbox_PlayPlace[]"  <?php if(!empty($child_Info)){if($child_Info['PlayPlace']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>自宅</span>
								<input name="checkbox_PlayPlace[]" <?php if(!empty($child_Info)){if($child_Info['PlayPlace']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>近所</span>
								<input name="checkbox_PlayPlace[]" <?php if(!empty($child_Info)){if($child_Info['PlayPlace']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>公園</span>
								<input name="txt_PlayPlace_Remark" type="text" class="txt05" value="<?php if(!empty($child_Info)){echo $child_Info['PlayPlace_Remark'];}?>" placeholder="その他"/>
							</li>
							<li><strong>好きな遊び</strong><input name="txt_LikePlay" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['LikePlay'];}?>"/></li>
							<li><strong>TV・ゲーム等</strong><strong>TV/ビデオ</strong><em>１日</em><select name="select_TVTime" class="select01">
							<option value="">----</option>
							<?php foreach ($parameter['TV_TIME'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['TVTime']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>分</em></li>
							<li><strong></strong><strong>ゲーム機使用</strong><em>１日</em><select name="select_GameTime" class="select01">
							<option value="">----</option>
							<?php foreach ($parameter['TV_TIME'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['GameTime']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>分</em></li>
							<li><strong>お手伝い</strong><input name="checkbox_Housework[]" <?php if(!empty($child_Info)){if($child_Info['Housework']=='1'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong style="margin:0 0 0 15px;">させない</strong>
								<input name="checkbox_Housework[]" <?php if(!empty($child_Info)){if($child_Info['Housework']=='2'){ echo 'checked';} }?>  class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong style="margin:0 0 0 15px;">させる</strong>
								<input name="txt_Housework_Remark" type="text" class="txt05" value="<?php if(!empty($child_Info)){echo $child_Info['Housework_Remark'];}?>" placeholder="どのようなお手伝い？"/>
							</li>
							<li><strong>衣服の着脱</strong><input name="checkbox_Dress[]" <?php if(!empty($child_Info)){if($child_Info['Dress']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong style="margin:0 0 0 15px;">自分でできる</strong>
								<input name="checkbox_Dress[]" <?php if(!empty($child_Info)){if($child_Info['Dress']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong style="margin:0 0 0 15px;">手伝ってもらう</strong>
								<input name="txt_Dress_Remark" type="text" class="txt05" value="<?php if(!empty($child_Info)){echo $child_Info['Dress_Remark'];}?>" placeholder="靴下が自分で履けないなど"/>
							</li>
							<li><strong>おこづかい</strong><input name="checkbox_Money[]" <?php if(!empty($child_Info)){if($child_Info['Money']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><strong style="margin:0 0 0 15px;">与えない</strong>
								<input name="checkbox_Money[]" <?php if(!empty($child_Info)){if($child_Info['Money']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><strong style="margin:0 0 0 15px;">与える</strong>
								<input name="txt_Money_Count" type="text" style="width:30px;" value="<?php if(!empty($child_Info)){echo $child_Info['Money_Count'];}?>" style="width:150px;"/><span>円くらい</span>
								<input name="txt_Money_Use" type="text" style="width:100px;" value="<?php if(!empty($child_Info)){echo $child_Info['Money_Use'];}?>" style="width:150px;" placeholder="使途"/>
							</li>
							<li><strong>家族でみた性質</strong><span>長所</span><input name="txt_Feature_Good" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Feature_Good'];}?>"/></li>
							<li><strong></strong><span>短所</span><input name="txt_Feature_Low" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Feature_Low'];}?>"/></li>
							<li><strong style="width:300px;">その他特記すること</strong></li>
							<li><textarea name="txt_Live2_Remark" rows="" cols=""><?php if(!empty($child_Info)){echo $child_Info['Live2_Remark'];}?></textarea></li>
						</ul>
					</div>
					
					<h2 style="width:200px;">入 園 前 の 教 育 状 況</h2>
					<div class="databox">
						<ul>
							<li><input name="checkbox_Edu_Place[]" <?php if(!empty($child_Info)){if($child_Info['Edu_Place']=='1'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="1"/><span>家庭</span></li>
							<li><input name="checkbox_Edu_Place[]" <?php if(!empty($child_Info)){if($child_Info['Edu_Place']=='2'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="2"/><span>幼稚園</span>
								<input name="checkbox_Edu_Place[]" <?php if(!empty($child_Info)){if($child_Info['Edu_Place']=='3'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="3"/><span>保育園</span>
								<input name="txt_Edu_PlaceName" type="text" class="txt03" value="<?php if(!empty($child_Info)){echo $child_Info['Edu_PlaceName'];}?>"/>
							</li>
							<li><input name="checkbox_Edu_Place[]" <?php if(!empty($child_Info)){if($child_Info['Edu_Place']=='4'){ echo 'checked';} }?> class="checkbox01 checkOnly" id="" type="checkbox" value="4"/><span>その他</span>
								<input name="txt_Edu_Remark" type="text" class="txt03" style="width:495px;" value="<?php if(!empty($child_Info)){echo $child_Info['Edu_Remark'];}?>"/>
							</li>
						</ul>
					</div>	
				</div>
<script>
$(document).ready(function() {
	$('input[name="checkbox_Eat_Snacks[]"]').bind('click',function(){eatSnacksClick();});
	eatSnacksClick();
	
	$('input[name="checkbox_Toilet_Big[]"]').bind('click',function(){toiletBigClick();});
	toiletBigClick();
	
	$('input[name="checkbox_Toilet_Small[]"]').bind('click',function(){toiletSmallClick();});
	toiletSmallClick();
	
	$('input[name="checkbox_Sleep_Daytime[]"]').bind('click',function(){sleepDaytimeClick();});
	sleepDaytimeClick();
	
	$('input[name="checkbox_Sleep_Who[]"]').bind('click',function(){sleepWhoClick();});
	sleepWhoClick();
	
	$('input[name="checkbox_Housework[]"]').bind('click',function(){houseworkClick();});
	houseworkClick();
	
	$('input[name="checkbox_Dress[]"]').bind('click',function(){dressClick();});
	dressClick();
	
	$('input[name="checkbox_Money[]"]').bind('click',function(){moneyClick();});
	moneyClick();
	
	$('input[name="checkbox_Edu_Place[]"]').bind('click',function(){eduPlaceClick();});
	eduPlaceClick();
	
	$('select[name="select_Sleep_WakeTime"]').bind('click',function(){checkSelectOnly2('checkbox_Sleep_Wake','select_Sleep_WakeTime');});
	$('input[name="checkbox_Sleep_Wake"]').bind('click',function(){checkSelectOnly1('checkbox_Sleep_Wake','select_Sleep_WakeTime');});
	$('select[name="select_Sleep_SleepTime"]').bind('click',function(){checkSelectOnly2('checkbox_Sleep_Sleep','select_Sleep_SleepTime');});
	$('input[name="checkbox_Sleep_Sleep"]').bind('click',function(){checkSelectOnly1('checkbox_Sleep_Sleep','select_Sleep_SleepTime');});
})
function eatSnacksClick()
{
	if($('input[name="checkbox_Eat_Snacks[]"]:checked').val()=='1'){
		$('select[name="select_Eat_Snacks_Time"]').attr('disabled',false);
	}else{
		$('select[name="select_Eat_Snacks_Time"]').attr('disabled',true).val("");
	}
}
function toiletBigClick()
{
	if($('input[name="checkbox_Toilet_Big[]"]:checked').val()=='2'){
		$('input[name="checkbox_Toilet_Big_Leak[]"]').attr('disabled',false);
	}else{
		$('input[name="checkbox_Toilet_Big_Leak[]"]').attr({'disabled':true,'checked':false});
	}
}
function toiletSmallClick()
{
	if($('input[name="checkbox_Toilet_Small[]"]:checked').val()=='3'){
		$('select[name="select_Toilet_Small_Period"]').attr('disabled',false);
	}else{
		$('select[name="select_Toilet_Small_Period"]').attr('disabled',true).val("");
	}
}
function sleepDaytimeClick()
{
	if($('input[name="checkbox_Sleep_Daytime[]"]:checked').val()=='1'){
		$('select[name="select_Sleep_Daytime_Spend"]').attr('disabled',false);
	}else{
		$('select[name="select_Sleep_Daytime_Spend"]').attr('disabled',true).val("");
	}
}
function sleepWhoClick()
{
	if($('input[name="checkbox_Sleep_Who[]"]:checked').val()=='4'){
		$('input[name="txt_Sleep_Who_Other"]').attr('disabled',false);
	}else{
		$('input[name="txt_Sleep_Who_Other"]').attr('disabled',true).val("");
	}
}
function houseworkClick()
{
	if($('input[name="checkbox_Housework[]"]:checked').val()=='2'){
		$('input[name="txt_Housework_Remark"]').attr('disabled',false);
	}else{
		$('input[name="txt_Housework_Remark"]').attr('disabled',true).val("");
	}
}
function dressClick()
{
	if($('input[name="checkbox_Dress[]"]:checked').val()=='2'){
		$('input[name="txt_Dress_Remark"]').attr('disabled',false);
	}else{
		$('input[name="txt_Dress_Remark"]').attr('disabled',true).val("");
	}
}
function moneyClick()
{
	if($('input[name="checkbox_Money[]"]:checked').val()=='2'){
		$('input[name="txt_Money_Count"]').attr('disabled',false);
		$('input[name="txt_Money_Use"]').attr('disabled',false);
	}else{
		$('input[name="txt_Money_Count"]').attr('disabled',true).val("");
		$('input[name="txt_Money_Use"]').attr('disabled',true).val("");
	}
}
function eduPlaceClick()
{
	if($('input[name="checkbox_Edu_Place[]"]:checked').val()=='2'||$('input[name="checkbox_Edu_Place[]"]:checked').val()=='3'){
		$('input[name="txt_Edu_PlaceName"]').attr('disabled',false);
	}else{
		$('input[name="txt_Edu_PlaceName"]').attr('disabled',true).val("");
	}
	
	if($('input[name="checkbox_Edu_Place[]"]:checked').val()=='4'){
		$('input[name="txt_Edu_Remark"]').attr('disabled',false);
	}else{
		$('input[name="txt_Edu_Remark"]').attr('disabled',true).val("");
	}
}
function checkSelectOnly1(checkName,selectName)
{
	if($('input[name="'+checkName+'"]').is(":checked")==true){
		$('select[name="'+selectName+'"]').val("");
	}
}
function checkSelectOnly2(checkName,selectName)
{
	if($('select[name="'+selectName+'"]').val()!=""){
		$('input[name="'+checkName+'"]').prop('checked',false);
	}
}
</script>