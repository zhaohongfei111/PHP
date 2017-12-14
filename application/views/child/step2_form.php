				<div class="datelist datelist00 bold">
					<h2>保 護 者 情 報</h2>
					<div class="databox">
						<h3>代表保護者１</h3>
						<ul>
							<li><span>苗字</span><input name="txt_Guardian1_FamilyName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_FamilyName'];}?>" />
								<span>名前</span><input name="txt_Guardian1_GivenName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_GivenName'];}?>" />
								<span>性別</span><label for="male1"><em>男</em></label><input type="radio" class="radio01" id="male1"  name="radio_Guardian1_Sex" value="1"  <?php if(!empty($child_Info)){if($child_Info['Guardian1_Sex']=='1'){ echo 'checked';} }?>/>
								<label for="female1"><em>女</em></label><input type="radio" class="radio01" id="female1" name="radio_Guardian1_Sex" value="2" <?php if(!empty($child_Info)){if($child_Info['Guardian1_Sex']=='2'){ echo 'checked';} }?> />
							</li>
							<li><span>みょうじ</span><input name="txt_Guardian1_FamilyName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_FamilyName_Spell'];}?>" />
								<span>なまえ</span><input name="txt_Guardian1_GivenName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_GivenName_Spell'];}?>" />
								<span>関係</span><select name="select_Guardian1_Relation" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['Guardian1_Relation']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select>
							</li>
							<li><span>生年月日</span><input name="txt_Guardian1_Birthday_Y" style="width:70px;" type="text" class="txt01 validate[custom[integer],min[1900],max[<?php echo date('Y');?>],onlyNumberSp]" value="<?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian1_Birthday']);if($date[0]!='0000'){echo $date[0];}}?>" />
								<em>年</em><select name="select_Guardian1_Birthday_M" class="select01" >
								<option value="">----</option>
								<?php foreach ($months as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian1_Birthday']);if($date[1]==$key){ echo 'selected';} }?>  value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select>
								<em>月</em><select name="select_Guardian1_Birthday_D" class="select01" >
								<option value="">----</option>
								<?php 
								foreach ($days as $key=>$val){
								?>
									<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian1_Birthday']);if($date[2]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select>
								<em>日</em><em>満</em><input name="txt_Guardian1_Age" type="text" value="" disabled style="width:50px;" /><em>歳</em>
							</li>
							<li><strong>勤務先・在学校名</strong><input name="txt_Guardian1_WorkPlace" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_WorkPlace'];}?>" placeholder="専業主婦(夫)の場合は、「専業主婦(夫)」と記載" /></li>
							<li><strong>勤務先所在地</strong><input name="txt_Guardian1_WorkAddress" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_WorkAddress'];}?>" /></li>
							<li><strong>勤務先TEL</strong><input name="txt_Guardian1_WorkTel" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_WorkTel'];}?>" placeholder="電話番号( - なし)" /></li>
							<li><strong>緊急連絡先(携帯)</strong><input name="txt_Guardian1_Mobile" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_Mobile'];}?>" placeholder="電話番号( - なし)" /></li>
							<li><strong>勤務時間</strong>
								<b>平日</b><select name="select_Guardian1_WorkTime_Begin" class="select02" ><option value="">----</option><?php foreach ($arriveList_2 as $key=>$val) {?><option <?php if(!empty($child_Info)){if($child_Info['Guardian1_WorkTime_Begin']==$val['standard']){ echo 'selected';} }?>  value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select><b style="text-align:center;padding:0 0;">~</b>
								<select name="select_Guardian1_WorkTime_End" class="select02" ><option value="">----</option><?php foreach ($leaveList_2 as $key=>$val) { ?><option  <?php if(!empty($child_Info)){if($child_Info['Guardian1_WorkTime_End']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select>
							</li>
							<li><strong></strong>
								<b>土曜日</b><select name="select_Guardian1_WorkTime_Begin_Rest" class="select02" ><option value="">----</option><?php foreach ($arriveList_2 as $key=>$val) {?><option <?php if(!empty($child_Info)){if($child_Info['Guardian1_WorkTime_Begin_Rest']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select><b style="text-align:center;padding:0 0;">~</b>
								<select name="select_Guardian1_WorkTime_End_Rest" class="select02" ><option value="">----</option><?php foreach ($leaveList_2 as $key=>$val) { ?><option <?php if(!empty($child_Info)){if($child_Info['Guardian1_WorkTime_End_Rest']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select>
							</li>
							<li><strong>勤務休み</strong><select name="select_Guardian1_RestDay" class="select02" ><option value="">----</option><?php foreach ($parameter['GUARDIAN_RESTDAY'] as $key => $val){?><option <?php if(!empty($child_Info)){if($child_Info['Guardian1_RestDay']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option><?php }?></select>
								<input name="txt_Guardian1_RestOther" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian1_RestOther'];}?>" placeholder="その他の場合"/>
							</li>
						</ul>
					</div>
					<div class="databox">
						<h3>代表保護者２</h3>
						<ul>
							<li><span>苗字</span><input name="txt_Guardian2_FamilyName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_FamilyName'];}?>" />
								<span>名前</span><input name="txt_Guardian2_GivenName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_GivenName'];}?>" />
								<span>性別</span><label for="male2"><em>男</em></label><input type="radio" class="radio01" id="male2"  name="radio_Guardian2_Sex" value="1"  <?php if(!empty($child_Info)){if($child_Info['Guardian2_Sex']=='1'){ echo 'checked';} }?>/>
								<label for="female2"><em>女</em></label><input type="radio" class="radio01" id="female2" name="radio_Guardian2_Sex" value="2" <?php if(!empty($child_Info)){if($child_Info['Guardian2_Sex']=='2'){ echo 'checked';} }?> />
							</li>
							<li><span>みょうじ</span><input name="txt_Guardian2_FamilyName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_FamilyName_Spell'];}?>" />
								<span>なまえ</span><input name="txt_Guardian2_GivenName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_GivenName_Spell'];}?>" />
								<span>関係</span><select name="select_Guardian2_Relation" class="select02" >
								<option value="">----</option>
								<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['Guardian2_Relation']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
								</select>
							</li>
						<li><span>生年月日</span><input name="txt_Guardian2_Birthday_Y" type="text" class="txt01 validate[custom[integer],min[1900],max[<?php echo date('Y');?>],onlyNumberSp]" value="<?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian2_Birthday']);if($date[0]!='0000'){echo $date[0];}}?>" />
								<em>年</em><select name="select_Guardian2_Birthday_M" class="select01" >
								<option value="">----</option>
								<?php foreach ($months as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian2_Birthday']);if($date[1]==$key){ echo 'selected';} }?>  value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select>
								<em>月</em><select name="select_Guardian2_Birthday_D" class="select01" >
								<option value="">----</option>
								<?php 
								foreach ($days as $key=>$val){
								?>
									<option <?php if(!empty($child_Info)){$date=explode('-', $child_Info['Guardian2_Birthday']);if($date[2]==$key){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
								</select>
								<em>日</em><em>満</em><input name="txt_Guardian2_Age" type="text" value="" disabled style="width:50px;" /><em>歳</em>
							</li>
							<li><strong>勤務先・在学校名</strong><input name="txt_Guardian2_WorkPlace" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_WorkPlace'];}?>" placeholder="専業主婦(夫)の場合は、「専業主婦(夫)」と記載" /></li>
							<li><strong>勤務先所在地</strong><input name="txt_Guardian2_WorkAddress" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_WorkAddress'];}?>" /></li>
							<li><strong>勤務先TEL</strong><input name="txt_Guardian2_WorkTel" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_WorkTel'];}?>" placeholder="電話番号( - なし)" /></li>
							<li><strong>緊急連絡先(携帯)</strong><input name="txt_Guardian2_Mobile" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_Mobile'];}?>" placeholder="電話番号( - なし)" /></li>
							<li><strong>勤務時間</strong>
								<b>平日</b><select name="select_Guardian2_WorkTime_Begin" class="select02" ><option value="">----</option><?php foreach ($arriveList_2 as $key=>$val) {?><option <?php if(!empty($child_Info)){if($child_Info['Guardian2_WorkTime_Begin']==$val['standard']){ echo 'selected';} }?>  value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select><b style="text-align:center;padding:0 0;">~</b>
								<select name="select_Guardian2_WorkTime_End" class="select02" ><option value="">----</option><?php foreach ($leaveList_2 as $key=>$val) { ?><option  <?php if(!empty($child_Info)){if($child_Info['Guardian2_WorkTime_End']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select>
							</li>
							<li><strong></strong>
								<b>土曜日</b><select name="select_Guardian2_WorkTime_Begin_Rest" class="select02" ><option value="">----</option><?php foreach ($arriveList_2 as $key=>$val) {?><option <?php if(!empty($child_Info)){if($child_Info['Guardian2_WorkTime_Begin_Rest']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select><b style="text-align:center;padding:0 0;">~</b>
								<select name="select_Guardian2_WorkTime_End_Rest" class="select02" ><option value="">----</option><?php foreach ($leaveList_2 as $key=>$val) { ?><option <?php if(!empty($child_Info)){if($child_Info['Guardian2_WorkTime_End_Rest']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option><?php }?></select>
							</li>
							<li><strong>勤務休み</strong><select name="select_Guardian2_RestDay" class="select02" ><option value="">----</option><?php foreach ($parameter['GUARDIAN_RESTDAY'] as $key => $val){?><option <?php if(!empty($child_Info)){if($child_Info['Guardian2_RestDay']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option><?php }?></select>
								<input name="txt_Guardian2_RestOther" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Guardian2_RestOther'];}?>" placeholder="その他の場合"/>
							</li>
						</ul>
					</div>
					<div class="databox">
						<h3>代表保護者に連絡がつかない場合の連絡先</h3>
						<ul>
							<li><span>苗字</span><input name="txt_Assist_FamilyName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_FamilyName'];}?>" />
									<span>名前</span><input name="txt_Assist_GivenName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_GivenName'];}?>" />
									<span>性別</span><label for="male3"><em>男</em></label><input type="radio" class="radio01" id="male3"  name="radio_Assist_Sex" <?php if(!empty($child_Info)){if($child_Info['Assist_Sex']=='1'){ echo 'checked';} }?> value="1" />
									<label for="female3"><em>女</em></label><input type="radio" class="radio01" id="female3" name="radio_Assist_Sex" <?php if(!empty($child_Info)){if($child_Info['Assist_Sex']=='2'){ echo 'checked';} }?> value="2" />
								</li>
								<li><span>みょうじ</span><input name="txt_Assist_FamilyName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_FamilyName_Spell'];}?>" />
									<span>なまえ</span><input name="txt_Assist_GivenName_Spell" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_GivenName_Spell'];}?>" />
									<span>関係</span><select name="select_Assist_Relation" class="select02" >
									<option value="">----</option>
								<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
									<option <?php if(!empty($child_Info)){if($child_Info['Assist_Relation']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
									</select>
								</li>
							<li><span>住　 所</span><input name="txt_Assist_Address" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_Address'];}?>" /></li>
							<li><span>T  E  L</span><input name="txt_Assist_Tel" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Assist_Tel'];}?>" placeholder="電話番号( - なし)" /></li>
						</ul>
					</div>				
					<div class="databox">
                    	<div id="familyStatusList">
                            <h3>家族の状況<i>※代表保護者らも含めた同居家族</i></h3>
                            <?php
                            if(empty($child_family_status_list)){
                                for($i=0;$i<3;$i++){
                            ?>
                            <div class="datelist01 familyStatusListDiv">
                                <ul>
                                    <li><span>苗字</span><input name="txt_Member_FamilyName[]" type="text" class="txt01" value="" />
                                        <span>名前</span><input name="txt_Member_GivenName[]" type="text" class="txt01" value="" />
                                        <span>性別</span><label for="fmale<?php echo $i;?>"><em>男</em></label><input type="radio" class="radio01" id="fmale<?php echo $i;?>"  name="radio_Member_Sex_<?php echo $i;?>" value="1" /><label for="ffemale<?php echo $i;?>"><em>女</em></label><input type="radio" class="radio01" id="ffemale<?php echo $i;?>" name="radio_Member_Sex_<?php echo $i;?>" value="2" /><input type="hidden" name="radio_Member_Sex[]" value="" />
                                    </li>
                                    <li><span>みょうじ</span><input name="txt_Member_FamilyName_Spell[]" type="text" class="txt01" />
                                        <span>なまえ</span><input name="txt_Member_GivenName_Spell[]" type="text" class="txt01" />
                                        <span>関係</span><select name="select_Member_Relation[]" class="select02" >
                                        <option value="">----</option>
                                    <?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
                                        <option value="<?php echo $key?>"><?php echo $val?></option>
                                    <?php }?>
                                        </select>
                                    </li>
                                    <li><span>生年月日</span><input name="txt_Member_Birthday_Y[]" type="text" class="txt01 validate[custom[integer],min[1900],max[<?php echo date('Y');?>],onlyNumberSp]" value="" />
                                        <em>年</em><select name="select_Member_Birthday_M[]" class="select01" >
                                        <option value="">----</option>
                                        <?php foreach ($months as $key=>$val) {?>
                                            <option value="<?php echo $val?>"><?php echo $val?></option>
                                        <?php }?>
                                    </select>
                                        <em>月</em><select name="select_Member_Birthday_D[]" class="select01" >
                                            <option value="">----</option>
                                        <?php 
                                        foreach ($days as $key=>$val){
                                        ?>
                                            <option value="<?php echo $val?>"><?php echo $val?></option>
                                        <?php }?>
                                        </select>
                                        <em>日</em><em>満</em><input name="txt_Member_Age[]" type="text" value="" disabled style="width:50px;" /><em>歳</em>
                                    </li>
                                    <li><strong>勤務先・在学校名</strong><input name="txt_Member_WorkPlace[]" type="text" class="txt03" value="" /></li>
                                </ul>
                            </div>
                            <?php
                                }
                            }else{
                                
                                foreach($child_family_status_list as $key_s => $val_s){
                            ?>
                            <div class="datelist01 familyStatusListDiv">
                                <ul>
                                    <li><span>苗字</span><input name="txt_Member_FamilyName[]" type="text" class="txt01" value="<?php echo $val_s['Member_FamilyName'];?>" />
                                        <span>名前</span><input name="txt_Member_GivenName[]" type="text" class="txt01" value="<?php echo $val_s['Member_GivenName'];?>" />
                                        <span>性別</span><label for="fmale<?php echo $key_s;?>"><em>男</em></label><input type="radio" class="radio01" id="fmale<?php echo $key_s;?>"  name="radio_Member_Sex_<?php echo $key_s;?>" <?php if($val_s['Member_Sex']=='1'){ echo 'checked';}?> value="1" /><label for="ffemale<?php echo $key_s;?>"><em>女</em></label><input type="radio" class="radio01" id="ffemale<?php echo $key_s;?>" name="radio_Member_Sex_<?php echo $key_s;?>" <?php if($val_s['Member_Sex']=='2'){ echo 'checked';}?> value="2" /><input type="hidden" name="radio_Member_Sex[]" value="<?php echo $val_s['Member_Sex'];?>" />
                                    </li>
                                    <li><span>みょうじ</span><input name="txt_Member_FamilyName_Spell[]" type="text" class="txt01" value="<?php echo $val_s['Member_FamilyName_Spell'];?>" />
                                        <span>なまえ</span><input name="txt_Member_GivenName_Spell[]" type="text" class="txt01" value="<?php echo $val_s['Member_GivenName_Spell'];?>" />
                                        <span>関係</span><select name="select_Member_Relation[]" class="select02" >
                                        <option value="">----</option>
                                    <?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
                                        <option value="<?php echo $key?>" <?php if($val_s['Member_Relation']==$key){ echo 'selected';}?>><?php echo $val?></option>
                                    <?php }?>
                                        </select>
                                    </li>
                                    <li><span>生年月日</span><input name="txt_Member_Birthday_Y[]" type="text" class="txt01 validate[custom[integer],min[1900],max[<?php echo date('Y');?>],onlyNumberSp]" value="<?php $date=explode('-', $val_s['Member_Birthday']);if($date[0]!='0000'){echo $date[0];}?>" />
                                        <em>年</em><select name="select_Member_Birthday_M[]" class="select01" >
                                        <option value="">----</option>
                                        <?php foreach ($months as $key=>$val) {?>
                                            <option value="<?php echo $val?>" <?php if($date[1]==$key){ echo 'selected';}?>><?php echo $val?></option>
                                        <?php }?>
                                    </select>
                                        <em>月</em><select name="select_Member_Birthday_D[]" class="select01" >
                                            <option value="">----</option>
                                        <?php 
                                        foreach ($days as $key=>$val){
                                        ?>
                                            <option value="<?php echo $val?>" <?php if($date[2]==$key){ echo 'selected';}?>><?php echo $val?></option>
                                        <?php }?>
                                        </select>
                                        <em>日</em><em>満</em><input name="txt_Member_Age[]" type="text" value="" disabled style="width:50px;" /><em>歳</em>
                                    </li>
                                    <li><strong>勤務先・在学校名</strong><input name="txt_Member_WorkPlace[]" type="text" class="txt03" value="<?php echo $val_s['Member_WorkPlace'];?>" /></li>
                                </ul>
                            </div>
                        <?php
                                }
                        }
                        ?>
                        </div>
                        <div style="margin:10px 0 0 50px;">
                    		<input type="button" name="addFamilyStatus" value="家族の追加" onclick="addFamilyStatusLine()" <?php if($action=='step7'||$action=='step11') echo "disabled";?>/>
                    	</div>                						
					</div>
                    
				</div>
                <script type="text/javascript">
				$(document).ready(function() {					
					$.countAge({"year":$('input[name="txt_Guardian1_Birthday_Y"]'),
								"month":$('select[name="select_Guardian1_Birthday_M"]'),
								"day":$('select[name="select_Guardian1_Birthday_D"]'),
								"age":$('input[name="txt_Guardian1_Age"]')});				
					$.countAge({"year":$('input[name="txt_Guardian2_Birthday_Y"]'),
								"month":$('select[name="select_Guardian2_Birthday_M"]'),
								"day":$('select[name="select_Guardian2_Birthday_D"]'),
								"age":$('input[name="txt_Guardian2_Age"]')});															
					$.mkDays({"year":$('input[name="txt_Guardian1_Birthday_Y"]'),
								"month":$('select[name="select_Guardian1_Birthday_M"]'),
								"day":$('select[name="select_Guardian1_Birthday_D"]')});
					$.mkDays({"year":$('input[name="txt_Guardian2_Birthday_Y"]'),
								"month":$('select[name="select_Guardian2_Birthday_M"]'),
								"day":$('select[name="select_Guardian2_Birthday_D"]')});
					
					$('#familyStatusList .familyStatusListDiv').each(function(index, element) {
						$.countAge({"year":$('input[name="txt_Member_Birthday_Y[]"]:eq('+index+')'),
									"month":$('select[name="select_Member_Birthday_M[]"]:eq('+index+')'),
									"day":$('select[name="select_Member_Birthday_D[]"]:eq('+index+')'),
									"age":$('input[name="txt_Member_Age[]"]:eq('+index+')')});
                        $.mkDays({"year":$('input[name="txt_Member_Birthday_Y[]"]:eq('+index+')'),
									"month":$('select[name="select_Member_Birthday_M[]"]:eq('+index+')'),
									"day":$('select[name="select_Member_Birthday_D[]"]:eq('+index+')')});
                    });	
					
					
					$('#familyStatusList').on('click','input[type="radio"]',function(){
						$(this).parent().find('input[name="radio_Member_Sex[]"]').val($(this).val());
					});
					
					
									
				});
				
				function addFamilyStatusLine(){
					var i = $('#familyStatusList .datelist01').length;			
					$('#familyStatusList .datelist01:eq(0)').clone().appendTo('#familyStatusList').find('label:eq(0)').prop('for','fmale'+i).end().find('label:eq(1)').prop('for','ffemale'+i).end().find('input[type="text"]').val("").end().find('input[type="radio"]').prop({"checked":false,"name":'radio_Member_Sex_'+i}).eq(0).prop('id','fmale'+i).end().eq(1).prop('id','ffemale'+i).end().end().find('input[name="radio_Member_Sex[]"]').val("").end().find('select').val("");
					
					
					
					$.countAge({"year":$('input[name="txt_Member_Birthday_Y[]"]:eq('+i+')'),
								"month":$('select[name="select_Member_Birthday_M[]"]:eq('+i+')'),
								"day":$('select[name="select_Member_Birthday_D[]"]:eq('+i+')'),
								"age":$('input[name="txt_Member_Age[]"]:eq('+i+')')});
					$.mkDays({"year":$('input[name="txt_Member_Birthday_Y[]"]:eq('+i+')'),
								"month":$('select[name="select_Member_Birthday_M[]"]:eq('+i+')'),
								"day":$('select[name="select_Member_Birthday_D[]"]:eq('+i+')')});					
				}
				
				
				</script>