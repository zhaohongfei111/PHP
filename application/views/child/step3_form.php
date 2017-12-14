				<div class="datelist datelist00 bold">
					<h2>入 園 前 の 状 況</h2>
					<div class="databox">
						<h3>出産について</h3>
						<ul>
							<li><strong>出 産 時 期</strong>
								<select name="select_Birth_Period" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['BIRTH']['Birth_Period'] as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['Birth_Period']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select>
								<input name="txt_Birth_Weight" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Birth_Weight'];}?>" placeholder="出生時の体重" /><em>g</em>
							</li>
							<li><strong>出 産 状 況</strong>
								<select name="select_Birth_Status" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['BIRTH']['Birth_Status'] as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['Birth_Status']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
									<?php }?>
								</select>
								<input name="txt_Birth_Remark" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Birth_Remark'];}?>" placeholder="備 考"/>
							</li>			
						</ul>
					</div>
					<div class="databox">
						<h3>授乳について</h3>
						<ul>
							<li><strong>授 乳 状 況</strong><select name="select_Suckle_Status" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['SUCKLE']['Suckle_Status'] as $key => $val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['Suckle_Status']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select></li>
							<li><strong>授 乳 方 法</strong><select name="select_Suckle_Way" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['SUCKLE']['Suckle_Way'] as $key =>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['Suckle_Way']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>	
								</select></li>
							<li><strong>離　　　乳</strong><select name="select_Suckle_StopAgeY" class="select01" >
							<option value="">----</option>
							<?php foreach ($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Suckle_StopAgeY']==$key&&$child_Info['Suckle_StopAgeY']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>歳</em>
								<select name="select_Suckle_StopAgeM" class="select01" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Suckle_StopAgeM']==$key&&$child_Info['Suckle_StopAgeM']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月頃から</em>
							</li>
						</ul>
					</div>
					<div class="databox">
						<h3>歩行(ひとりあるき)について</h3>
						<ul>
							<li><strong>歩 行 状 況</strong><select name="select_Walk_Status" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['WALK_STATUS'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Walk_Status']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select></li>
							<li><strong>歩 行 時 期</strong><select name="select_Walk_BeginAgeY" class="select01" >
							<option value="">----</option>
							<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['Walk_BeginAgeY']==$key&&$child_Info['Walk_BeginAgeY']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>歳</em>
								<select name="select_Walk_BeginAgeM" class="select01" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['Walk_BeginAgeM']==$key&&$child_Info['Walk_BeginAgeM']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月頃から</em>
							</li>
						</ul>
					</div>
					<div class="databox">
						<h3>言語について</h3>
						<ul>
							<li><strong>言 語 状 況</strong><select name="select_Language_Status" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['LANGUAGE_STATUS'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['Language_Status']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
								<input name="txt_Language_Remark" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Language_Remark'];}?>" placeholder="備 考" />
							</li>
							<li><strong style="width:200px;">言葉を使い始めた時期</strong><select name="select_Language_BeginAgeY" class="select01" >
							<option value="">----</option>
							<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
							<option <?php if(!empty($child_Info)){if($child_Info['Language_BeginAgeY']==$key&&$child_Info['Language_BeginAgeY']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select><em>歳</em>
								<select name="select_Language_BeginAgeM" class="select01" >
								<option value="">----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
									<option <?php if(!empty($child_Info)){if($child_Info['Language_BeginAgeM']==$key&&$child_Info['Language_BeginAgeM']!==NULL){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月頃から</em>
							</li>
						</ul>
					</div>
					<div class="databox">
						<h3>養育環境</h3>
						<ul>
							<li><strong>主に養育した人</strong><select name="select_RaiseMen_Relation" class="select02" >
							<option value="">----</option>
							<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val){?>
								<option  <?php if(!empty($child_Info)){if($child_Info['RaiseMen_Relation']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select></li>
						</ul>
					</div>
				</div>
				
				<div class="datelist">
					<h2>予 防 接 種</h2>
					<div class="databox">
						<h3>四種混合　(ジフテリア、百日せき、破傷風、ポリオ)</h3>
						<h3>1期初回</h3>
						<ul>
							<li><span>1回</span><input name="txt_4Mix_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['4Mix_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_4Mix_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['4Mix_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<span>1期追加</span><input name="txt_4Mix_DateAdd_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:120px;" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['4Mix_DateAdd']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
								<select name="select_4Mix_DateAdd_M" class="select01">
								<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['4Mix_DateAdd']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
								</select><em>月</em>

							</li>
							<li><span>2回</span><input name="txt_4Mix_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['4Mix_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_4Mix_Date2_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['4Mix_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<i>※三種混合とポリオ単独の場合は、三種混合を記入</i>
							</li>
							<li><span>3回</span><input name="txt_4Mix_Date3_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['4Mix_Date3']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_4Mix_Date3_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['4Mix_Date3']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>ヒブ　(インフルエンザ菌b型)</h3>
						<h3>1期初回</h3>
						<ul>
							<li><span>1回</span><input name="txt_FluB_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['FluB_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_FluB_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['FluB_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<span>1期追加</span><input name="txt_FluB_DateAdd_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:120px;" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['FluB_DateAdd']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
								<select name="select_FluB_DateAdd_M" class="select01">
								<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['FluB_DateAdd']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
								</select><em>月</em>
							</li>
							<li><span>2回</span><input name="txt_FluB_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['FluB_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="selectFluB_Date2_M" class="select01">
								<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['FluB_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<i>※接種回数は、初回接種の月齢によって異なる</i>
							</li>
							<li><span>3回</span><input name="txt_FluB_Date3_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['FluB_Date3']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_FluB_Date3_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['FluB_Date3']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>小児用肺炎球菌</h3>
						<h3>1期初回</h3>
						<ul>
							<li><span>1回</span><input name="txt_Pneumonia_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Pneumonia_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Pneumonia_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Pneumonia_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<span>1期追加</span><input name="txt_Pneumonia_DateAdd_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:120px;" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Pneumonia_DateAdd']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
								<select name="select_Pneumonia_DateAdd_M" class="select01">
								<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Pneumonia_DateAdd']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
								</select><em>月</em>
							</li>
							<li><span>2回</span><input name="txt_Pneumonia_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Pneumonia_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Pneumonia_Date2_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Pneumonia_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<i>※接種回数は、初回接種の月齢によって異なる</i>
							</li>
							<li><span>3回</span><input name="txt_Pneumonia_Date3_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Pneumonia_Date3']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Pneumonia_Date3_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Pneumonia_Date3']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>日本脳炎</h3>
						<h3>1期初回</h3>
						<ul>
							<li><span>1回</span><input name="txt_Encephalitis_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Encephalitis_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Encephalitis_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Encephalitis_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<span>1期追加</span><input name="txt_Encephalitis_DateAdd_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:120px;" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Encephalitis_DateAdd']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
								<select name="select_Encephalitis_DateAdd_M" class="select01">
								<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Encephalitis_DateAdd']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
								</select><em>月</em>
							</li>
							<li><span>2回</span><input name="txt_Encephalitis_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Encephalitis_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Encephalitis_Date2_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Encephalitis_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>ポリオ<i>ポリオ単独の場合のみ記入</i></h3>
						<ul>
							<li><span></span><input name="txt_Polio_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Polio_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Polio_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Polio_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<input name="txt_Polio_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Polio_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Polio_Date2_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Polio_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							</li>
							<li><span></span><input name="txt_Polio_Date3_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Polio_Date3']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Polio_Date3_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Polio_Date3']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
								<input name="txt_Polio_Date4_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Polio_Date4']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Polio_Date4_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Polio_Date4']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							</li>
							<li><span></span><i>※生ワクチンは2回、不活化ワクチンは4回</i></li>
						</ul>
					</div>
					<div class="databox">
						<h3>BCG</h3>
						<ul>
							<li><span></span><input name="txt_BCG_Date_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['BCG_Date']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_BCG_Date_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['BCG_Date']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>麻しん (はしか) 風しん混合</h3>
						<ul>
							<li><span>1期</span><input name="txt_Measles_Date1_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Measles_Date1']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Measles_Date1_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Measles_Date1']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
							<li><span>2期</span><input name="txt_Measles_Date2_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Measles_Date2']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Measles_Date2_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Measles_Date2']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>流行性耳下腺炎 (おたふくかぜ)</h3>
						<ul>
							<li><span></span><input name="txt_Mumps_Date_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Mumps_Date']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Mumps_Date_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Mumps_Date']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>水痘 (みずぼうそう)</h3>
						<ul>
							<li><span></span><input name="txt_Chickenpox_Date_Y" type="text" class="txt01 validate[custom[integer],min[2000],max[<?php echo date('Y');?>]]" value="<?php if(!empty($child_Info)){ $date=explode('-', $child_Info['Chickenpox_Date']);if($date[0]!='0000'){echo $date[0];}}?>"/><em>年</em>
							<select name="select_Chickenpox_Date_M" class="select01">
							<option value="">----</option>
							<?php foreach ($months as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Chickenpox_Date']);if($date[1]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><em>月</em></li>
						</ul>
					</div>
					<div class="databox">
						<h3>その他</h3>
						<ul>
							<li><textarea name="txt_Vaccine_Remark" rows="" cols=""><?php if(!empty($child_Info)){ echo $child_Info['Vaccine_Remark'];}?></textarea></li>
						</ul>
					</div>
				</div>
 				<script type="text/javascript">
				$(document).ready(function() {					
					$('select[name="select_Suckle_Status"]').bind('change',function(){changeSuckleWay()});					
					changeSuckleWay();
					$('select[name="select_Walk_Status"]').bind('change',function(){changeWalkStatus()});
					changeWalkStatus();
					$('select[name="select_Language_Status"]').bind('change',function(){changeLanguageStatus()});
					changeLanguageStatus();
				});
				
				function changeSuckleWay(){
					if($('select[name="select_Suckle_Status"]').val()=='Away'){
						$('select[name="select_Suckle_StopAgeY"]').attr('disabled',false);
						$('select[name="select_Suckle_StopAgeM"]').attr('disabled',false);
					}else{
						$('select[name="select_Suckle_StopAgeY"]').attr('disabled',true).val("");
						$('select[name="select_Suckle_StopAgeM"]').attr('disabled',true).val("");
					}
				}
				
				function changeWalkStatus(){
					if($('select[name="select_Walk_Status"]').val()=='Yes'){
						$('select[name="select_Walk_BeginAgeY"]').attr('disabled',false);
						$('select[name="select_Walk_BeginAgeM"]').attr('disabled',false);
					}else{
						$('select[name="select_Walk_BeginAgeY"]').attr('disabled',true).val("");
						$('select[name="select_Walk_BeginAgeM"]').attr('disabled',true).val("");
					}
				}
				
				function changeLanguageStatus(){
					if($('select[name="select_Language_Status"]').val()=='Yes'){
						$('select[name="select_Language_BeginAgeY"]').attr('disabled',false);
						$('select[name="select_Language_BeginAgeM"]').attr('disabled',false);
					}else{
						$('select[name="select_Language_BeginAgeY"]').attr('disabled',true).val("");
						$('select[name="select_Language_BeginAgeM"]').attr('disabled',true).val("");
					}
				}
				</script>