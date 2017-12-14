                <?php
                $action_num = (int)str_replace('step','',$action);
				?>
                <div class="dlfbox left">
					<div class="datelist datelist01 bold">
						<h2>基 本 情 報</h2>
						<ul>
							<li><span>整理番号</span><input name="txt_Child_Id" type="text" id="<?php echo $child_Info['ID'];?>" class="txt01 validate[required,ajax[uniqueChildidExists]]" value="<?php if(!empty($child_Info)){ echo $child_Info['Child_Id'];}else{ echo $Child_Id;}?>" <?php if($customerType!='Admin') echo "readonly='readonly'";?> /></li>
							<li><span>記 入 日 </span><input name="txt_inputdate_Y" type="text" class="txt01 validate[required,custom[integer],min[2016],max[2050]]" value="<?php if(!empty($child_Info['InputDate'])){ if(substr($child_Info['InputDate'],0,4)!='0000') echo substr($child_Info['InputDate'],0,4);}else{ echo date('Y');}?>" /><em>年</em>
								<select name="select_inputdate_M" class="select01 validate[required]" >
									<option value="">----</option>
									<?php
									 foreach ($months as $key =>$val) {
									 ?>
										<option <?php if(!empty($child_Info['InputDate'])){if(substr($child_Info['InputDate'],5,2)==$val){ echo 'selected';} }else{ if(date('m')==$key){ echo 'selected';}}?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>月</em>
								<select name="select_inputdate_D" class="select01 validate[required]" >
									<option value="">----</option>
									<?php
									 foreach ($days as $key=>$val) {
									?>
									<option <?php if(!empty($child_Info['InputDate'])){if(substr($child_Info['InputDate'],8,2)==$val){ echo 'selected';} }else{ if(date('d')==$key){ echo 'selected';}}?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>日</em>
							</li>
							
							<li><span>入 園 日 </span><input name="txt_EnterDate_Y" type="text" class="txt01 validate[required,custom[integer],min[2010],max[2050]]" value="<?php if(!empty($child_Info['EnterDate'])){ if(substr($child_Info['EnterDate'],0,4)!='0000') echo substr($child_Info['EnterDate'],0,4);}else{ echo date('Y');}?>" <?php if(empty($_GET['ID'])){?>onchange="getNewChildId(this)"<?php }?> /><em>年</em>
								<select name="select_EnterDate_M" class="select01 validate[required]" >
									<option value="">----</option>
									<?php
									 foreach ($months as $key =>$val) {
									 ?>
										<option <?php if(!empty($child_Info['EnterDate'])){if(substr($child_Info['EnterDate'],5,2)==$val){ echo 'selected';} }else{ if(date('m')==$key){ echo 'selected';}}?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>月</em>
								<select name="select_EnterDate_D" class="select01 validate[required]" >
									<option value="">----</option>
									<?php
									 foreach ($days as $key=>$val) {
									?>
									<option <?php if(!empty($child_Info['EnterDate'])){if(substr($child_Info['EnterDate'],8,2)==$val){ echo 'selected';} }else{ if(date('d')==$key){ echo 'selected';}}?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>日</em>
							</li>
							
							<li <?php if($action_num<8){ echo "style='display:none;'";}?>><span>退 園 日 </span><input name="txt_LeaveDate_Y" type="text" class="txt01 validate[custom[integer],min[2016],max[2050]]" value="<?php if(!empty($child_Info['LeaveDate'])&&substr($child_Info['LeaveDate'],0,4)!='0000'){ echo substr($child_Info['LeaveDate'],0,4);}?>" /><em>年</em>
								<select name="select_LeaveDate_M" class="select01 " >
									<option value="">----</option>
									<?php
									 foreach ($months as $key =>$val) {
									 ?>
										<option <?php if(!empty($child_Info['LeaveDate'])){if(substr($child_Info['LeaveDate'],5,2)==$val){ echo 'selected';} }?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>月</em>
								<select name="select_LeaveDate_D" class="select01 " >
									<option value="">----</option>
									<?php
									 foreach ($days as $key=>$val) {
									?>
									<option <?php if(!empty($child_Info['LeaveDate'])){if(substr($child_Info['LeaveDate'],8,2)==$val){ echo 'selected';} }?>  value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>日</em>
							</li>
						</ul>
					</div>
					<div class="datelist bold">
						<h2>園 児 情 報</h2>
						<ul>
							<li>
								<span>苗字</span><input name="txt_FamilyName" type="text" class="txt01 validate[required]" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName'];}?>" />
								<span>名前</span><input name="txt_GivenName" type="text" class="txt01 validate[required]" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName'];}?>" />
							</li>
							<li>
								<span>みょうじ</span><input name="txt_FamilyName_Spell" type="text" class="txt01 validate[required]" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName_Spell'];}?>" />
								<span>なまえ</span><input name="txt_GivenName_Spell" type="text" class="txt01 validate[required]" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName_Spell'];}?>" />
							</li>
							<li><strong>家庭での呼び名</strong><input name="txt_NickName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['NickName'];}?>" /></li>
						</ul>
					</div>
				</div>
				<div class="fileUpload right">
					<div id="upbg" class="upbg"><?php if(!empty($img)){?><img src="<?php echo $img.'?time='.time();?>" style="width:302px;height:256px;" /><?php }?></div>
					<input type="file" class="upload" name="childPicture" id="imgOne" onChange="preImg(this,'upbg','childImg',302,256);"   accept=".jpg,.jpeg,.png,.gif"/>
				</div>
				<div class="clear"></div>
				<div class="datelist bold">
					<ul>
						<li><span>生年月日</span><input name="txt_birthday_Y" type="text" class="txt01 validate[required,custom[integer],min[2010],max[<?php echo date('Y');?>],onlyNumberSp]" value="<?php if(!empty($child_Info['Birthday'])&&substr($child_Info['Birthday'],0,4)!='0000'){ echo substr($child_Info['Birthday'],0,4);}?>" /><em>年</em>
							<select name="select_birthday_M" class="select01 validate[required]" >
								<option value="">----</option>
								<?php 
									foreach($months as $key=>$val) {
								?>
									<option <?php if(!empty($child_Info['Birthday'])){if(substr($child_Info['Birthday'],5,2)==$val){ echo 'selected';} }?> value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
							</select><em>月</em>
							<select name="select_birthday_D" class="select01 validate[required]" >
								<option value="">----</option>
								<?php
									foreach($days as $key=>$val) {
								?>
									<option <?php if(!empty($child_Info['Birthday'])){if(substr($child_Info['Birthday'],8,2)==$val){ echo 'selected';} }?>  value="<?php echo $val?>"><?php echo $val?></option>
								<?php }?>
							</select><em>日</em><em>満</em>
							<input name="txt_Age" type="text" disabled="disabled" value="" style="width:50px;" /><em>歳</em>
						</li>
						<li><span>性別</span>
							<label for="male"><em>男</em></label><input type="radio" class="radio01 validate[required]" id="male" name="radio_Sex" value="1"  <?php if(!empty($child_Info)){if($child_Info['Sex']=='1'){ echo 'checked';} }?> />
							<label for="female"><em>女</em></label><input type="radio" class="radio01 validate[required]" id="female" name="radio_Sex" value="2"  <?php if(!empty($child_Info)){if($child_Info['Sex']=='2'){ echo 'checked';} }?>/>
						</li>
						<li><span>現 住 所</span><input name="txt_PostCode" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['PostCode'];}?>" placeholder="郵便番号( - なし)" />
							<input name="txt_Address" type="text" class="txt02" value="<?php if(!empty($child_Info)){ echo $child_Info['Address'];}?>" />
						</li>
						<li><span>T  E  L</span><input name="txt_Tel" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Tel'];}?>" placeholder="電話番号( - なし)" />
						</li>						
						<li><span>ク ラ ス </span>
						<select name="select_Class" class="select02 validate[required]" >
							<option value="">------</option>
						<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
							<option  <?php if(!empty($child_Info)){if($child_Info['Class']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
						<?php }?>
						</select>
							<span>平熱</span><input name="txt_Temper" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Temper'];}?>" />
							<span>血液型</span>
							<select name="select_BloodType" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['BASE_INFO']['BloodType'] as $key=>$val){?>
								<option <?php if(!empty($child_Info)){if($child_Info['BloodType']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
						</li>
                        <!--新加-->
						<li>
							<span>課外活動</span>
							<label for="aOne"><em>希望する</em><input name="radio_Child_Activities" type="radio" id="aOne" class="radio01" value="1" <?php if(!empty($child_Info)){if($child_Info['Child_Activities']=='1'){ echo 'checked';} }?>/></label>
							<label for="aTwo"><em>しない</em><input name="radio_Child_Activities" type="radio" id="aTwo"  class="radio01" value="2" <?php if(!empty($child_Info)){if($child_Info['Child_Activities']=='2'){ echo 'checked';} }?>/></label>
							<p style="color:#914b67;padding-left:15px;font-size:12px;">※クラスによっては選択できない場合があります</p>
						</li>
						<li style="padding-left:20px;">
                        	<span></span>
                        	<?php
							$info_Act_arr = empty($child_Info)?array():explode(';', $child_Info['Activities']);
                            foreach($activities as $key => $val){
							?>
							<input name="chbox_Activities[]" class="checkbox01" id="act<?php echo $key;?>" type="checkbox" value="<?php echo $key;?>"  <?php if(in_array($key, $info_Act_arr)){ echo 'checked';}?>/><label for="act<?php echo $key;?>" ><?php if($key!=4){?><span><?php echo $val;?></span><?php }else{?><strong><?php echo $val;?></strong><?php }?></label>					
							<?php
							}
							?>
						</li>
						<li>
							<span>給　食</span>
							<label for="one"><em>希望する</em><input name="radio_Child_Eat" type="radio" id="one" class="radio01" value="1" <?php if(!empty($child_Info)){if($child_Info['Child_Eat']=='1'){ echo 'checked';} }?>/></label>
							<label for="two"><em>しない</em><input name="radio_Child_Eat" type="radio" id="two" class="radio01" value="2" <?php if(!empty($child_Info)){if($child_Info['Child_Eat']=='2'){ echo 'checked';} }?>/></label>
                            <?php
								if(!empty($child_Info['Child_EatDate'])){
									list($child_eatdate_Y,$child_eatdate_m,$child_eatdate_d) = explode('-',$child_Info['Child_EatDate']);
								}else{
									$child_eatdate_Y=$child_eatdate_m=$child_eatdate_d='';
								}								
							?>
                            <abbr <?php if($action_num<8){ echo "style='display:none;'";}?>>
                            <label for="childEatDate"><em>開始年月日</em></label>
							<input name="txt_child_eatdate_Y" id="childEatDate" type="text" style="width:70px;" class="txt01 validate[custom[integer],min[2016],max[2050]]" value="<?php if($child_eatdate_Y!='0000') echo $child_eatdate_Y;?>"><em>年</em>
							<select name="select_child_eatdate_M" class="select01" style="width:50px;">
								<option value="">----</option>
							<?php
								 foreach ($months as $key=>$val){
							?>
								<option value="<?php echo $val?>" <?php if($val==$child_eatdate_m) echo 'selected';?>><?php echo $val?></option>
							<?php }?>
							</select><em>月</em>
							<select name="select_child_eatdate_D" class="select01" style="width:50px;">
                            	<option value="">----</option>
							<?php 
								foreach ($days as $key=>$val){
							?>
								<option value="<?php echo $val?>" <?php if($val==$child_eatdate_d) echo 'selected';?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
                            </abbr>
							<p style="color:#914b67;padding-left:15px;font-size:12px;">※1号認定の園児のみ選択可</p>                            
						</li>
						<li>
							<strong style="width:170px;">時間外保育申請の有無</strong>
							<label for="nOne"><em>申請済み</em><input name="radio_Child_Nursing" type="radio" class="radio01" id="nOne" value="1" <?php if(!empty($child_Info)){if($child_Info['Child_Nursing']=='1'){ echo 'checked';} }?> /></label>
							<label for="nTwo"><em>現状必要としない</em><input name="radio_Child_Nursing" type="radio"  class="radio01" id="nTwo" value="2" <?php if(!empty($child_Info)){if($child_Info['Child_Nursing']=='2'){ echo 'checked';} }?> /></label>
                            <?php
								if(!empty($child_Info['Child_NursingDate'])){
									list($child_nursingdate_Y,$child_nursingdate_m,$child_nursingdate_d) = explode('-',$child_Info['Child_NursingDate']);
								}else{
									$child_nursingdate_Y=$child_nursingdate_m=$child_nursingdate_d='';
								}								
							?>
                            <abbr <?php if($action_num<8){ echo "style='display:none;'";}?>>
                            <label for="childNursingDate"><em>開始年月日</em></label>
							<input name="txt_child_nursingdate_Y" id="childNursingDate" type="text" style="width:70px;" class="txt01 validate[custom[integer],min[2016],max[2050]]" value="<?php if($child_nursingdate_Y!='0000') echo $child_nursingdate_Y;?>"><em>年</em>
							<select name="select_child_nursingdate_M" class="select01" style="width:50px;">
								<option value="">----</option>
								<?php
									 foreach ($months as $key=>$val){
								?>
									<option value="<?php echo $val?>" <?php if($val==$child_nursingdate_m) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
							</select><em>月</em>
							<select name="select_child_nursingdate_D" class="select01" style="width:50px;">
								<option value="">----</option>
							<?php 
								foreach ($days as $key=>$val){
							?>
								<option value="<?php echo $val?>" <?php if($val==$child_nursingdate_d) echo 'selected';?>><?php echo $val?></option>
							<?php }?>
							</select><em>日</em>
                            </abbr>
							<p style="color:#914b67;padding-left:15px;font-size:12px;">※2号標準、3号標準の園児のみ選択可</p>
						</li>
						<!--新加-->
						<li><span>登園方法</span>
                            <select name="select_Traffic_Way" class="select02" >
                                <option value="">手段</option>
                            <?php foreach ($parameter['TRAFFIC']['Traffic_Way'] as $key => $val) {?>
                                <option <?php if(!empty($child_Info)){if($child_Info['Traffic_Way']==$key){ echo 'selected';} }?>  value="<?php echo  $key?>"><?php echo $val?></option>
                            <?php }?>
                            </select>
							<select name="select_Traffic_TakeTime" class="select02" >
								<option value="">通園時間</option>
							<?php foreach ($parameter['TRAFFIC']['Traffic_TakeTime'] as $key => $val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Traffic_TakeTime']==$key&&!empty($child_Info['Traffic_TakeTime'])){ echo 'selected';} }?>  value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<select name="select_Traffic_Distance" class="select02" >
								<option value="">おおよその距離</option>
							<?php foreach ($parameter['TRAFFIC']['Traffic_Distance'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Traffic_Distance']==$key&&!empty($child_Info['Traffic_Distance'])){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
						</li>
						<li><span></span>
							<input name="txt_Traffic_OtherWay" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Traffic_OtherWay'];}?>" placeholder="備考/その他の手段など" />
						</li>
						<li><span>登園時間</span>
							<b>平日</b><select name="select_Arrive_Time" class="select02" >
								<option value="">----</option>
							<?php foreach ($arriveList as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Arrive_Time']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard'];?>"><?php echo $val['objective']?></option>
							<?php  }?>
							</select>
							<b>付添者続柄</b><select name="select_Arrive_ByWho" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Arrive_ByWho']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<input name="txt_Arrive_ByOther" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Arrive_ByOther'];}?>" placeholder="その他の場合関係性" />
						</li>
						<li><span></span>
							<b>土曜日</b><select name="select_Arrive_Time_Rest" class="select02" >
								<option value="">----</option>
							<?php foreach ($arriveList as $key=>$val) {?>
							<option <?php if(!empty($child_Info)){if($child_Info['Arrive_Time_Rest']==$val['standard']){ echo 'selected';} }?>  value="<?php echo $val['standard'];?>"><?php echo $val['objective']?></option>
							<?php }?>
							</select>
							<b>付添者続柄</b><select name="select_Arrive_ByWho_Rest" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Arrive_ByWho_Rest']==$key){ echo 'selected';} }?>  value="<?php echo $key;?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<input  name="txt_Arrive_ByOther_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Arrive_ByOther_Rest'];}?>" placeholder="その他の場合関係性" />
						</li>                        
                        <!--新加-->
						<li><span>降園方法</span>
						<select name="select_Leave_Way" class="select02" >
							<option value="">手段</option>
						<?php foreach ($parameter['TRAFFIC']['Traffic_Way'] as $key => $val) {?>
							<option <?php if(!empty($child_Info)){if($child_Info['Leave_Way']==$key){ echo 'selected';} }?>  value="<?php echo  $key?>"><?php echo $val?></option>
						<?php }?>
						</select>
							<select name="select_Leave_TakeTime" class="select02" >
								<option value="">通園時間</option>
							<?php foreach ($parameter['TRAFFIC']['Traffic_TakeTime'] as $key => $val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Leave_TakeTime']==$key&&!empty($child_Info['Leave_TakeTime'])){ echo 'selected';} }?>  value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<select name="select_Leave_Distance" class="select02" >
								<option value="">おおよその距離</option>
							<?php foreach ($parameter['TRAFFIC']['Traffic_Distance'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Leave_Distance']==$key&&!empty($child_Info['Leave_Distance'])){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
						</li>
						<li><span></span>
							<input name="txt_Leave_OtherWay" type="text" class="txt03" value="<?php if(!empty($child_Info)){ echo $child_Info['Leave_OtherWay'];}?>" placeholder="備考/その他の手段など" />
						</li>
						<li><span>降園時間</span>
							<b>平日</b><select name="select_Leave_Time" class="select02" >
								<option value="">----</option>
							<?php foreach ($leaveList as $key => $val){?>
							<option <?php if(!empty($child_Info)){if($child_Info['Leave_Time']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
							<?php }?>
							</select>
							<b>付添者続柄</b><select name="select_Leave_ByWho" class="select02" >	
								<option value="">----</option>						
							<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Leave_ByWho']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<input name="txt_Leave_ByOther" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Leave_ByOther'];}?>" placeholder="その他の場合関係性" />
						</li>
						<li><span></span>
							<b>土曜日</b><select name="select_Leave_Time_Rest" class="select02" >
								<option value="">----</option>
							<?php foreach ($leaveList as $key => $val){?>
							<option <?php if(!empty($child_Info)){if($child_Info['Leave_Time_Rest']==$val['standard']){ echo 'selected';} }?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
							<?php }?>
							</select>
							<b>付添者続柄</b><select name="select_Leave_ByWho_Rest" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['RELATIONSHIP'] as $key=>$val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Leave_ByWho_Rest']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<input name="txt_Leave_ByOther_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info)){ echo $child_Info['Leave_ByOther_Rest'];}?>" placeholder="その他の場合関係性" />
						</li>
						<li><strong>かかりつけの病院</strong>
							<b>整形外科</b><input name="txt_Hospital_Physical" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical'];}?>" />
							<span style="text-align:center;">TEL</span><input  name="txt_Hospital_Physical_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong></strong>
							<b>歯　科</b><input name="txt_Hospital_Tooth" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth'];}?>" />
							<span style="text-align:center;">TEL</span><input name="txt_Hospital_Tooth_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong></strong>
							<b>眼　科</b><input name="txt_Hospital_Eye" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye'];}?>" />
							<span style="text-align:center;">TEL</span><input name="txt_Hospital_Eye_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong></strong>
							<b>耳鼻科</b><input name="txt_Hospital_EarNose" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose'];}?>" />
							<span style="text-align:center;">TEL</span><input name="txt_Hospital_EarNose_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong></strong>
							<b>皮膚科</b><input name="txt_Hospital_Skin" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin'];}?>" />
							<span style="text-align:center;">TEL</span><input name="txt_Hospital_Skin_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong></strong>
							<b>小児科</b><input name="txt_Hospital_Child" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child'];}?>" />
							<span style="text-align:center;">TEL</span><input name="txt_Hospital_Child_Tel" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child_Tel'];}?>" placeholder="電話番号( - なし)" style="width:224px;" />	
						</li>
						<li><strong>健康保険証番号</strong>
							<input name="txt_Insurance_Record" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Insurance_Record'];}?>" placeholder="記　号" style="text-align:center;width:300px;" />
							<input name="txt_Insurance_Number" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Insurance_Number'];}?>" placeholder="番　号" style="text-align:center;" />
                            <input id="insuranceFile" type="button" value="保険証コピーの添付" class="txt01" style="text-align:center; color:#A9A9A9;"/>
						</li>
						<li><strong>受けている補助</strong>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="gd" type="checkbox" value="0"  <?php if(!empty($child_Info)){if(in_array('0', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?>/><label for="gd"><strong>該当なし</strong></label>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="yr" type="checkbox" value="1"  <?php if(!empty($child_Info)){if(in_array('1', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?>/><label for="yr"><strong>乳幼児医療費</strong></label>
							<input name="txt_Insurance_Assistance[]" class="checkbox01" id="jt" type="checkbox" value="2"  <?php if(!empty($child_Info)){if(in_array('2', explode(';', $child_Info['Insurance_Assistance']))){ echo 'checked';} }?>/><label for="jt"><strong style="width:200px;">ひとり親家庭等医療費</strong></label>
						</li>
						<li><strong>近所の園児</strong>
							<select name="select_Nearby1_Class" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Nearby1_Class']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							</select>
							<input name="txt_Nearby1_ChildName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Nearby1_ChildName'];}?>" placeholder="園児名" style="text-align:center;width:260px;margin-left:10px;" />
						</li>
						<li><strong></strong>
							<select name="select_Nearby2_Class" class="select02" >
								<option value="">----</option>
							<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
								<option <?php if(!empty($child_Info)){if($child_Info['Nearby2_Class']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
							<?php }?>
							
							</select>
							<input name="txt_Nearby2_ChildName" type="text" class="txt01" value="<?php if(!empty($child_Info)){ echo $child_Info['Nearby2_ChildName'];}?>" placeholder="園児名" style="text-align:center;width:260px;margin-left:10px;" />
						</li>
					</ul>
				</div>
                
<script type="text/javascript">
$(document).ready(function() {
	$.countAge({"year":$('input[name="txt_birthday_Y"]'),
				"month":$('select[name="select_birthday_M"]'),
				"day":$('select[name="select_birthday_D"]'),
				"age":$('input[name="txt_Age"]')});
						
	recogType();
	
	$('select[name="select_Class"]').on("change",this,function(){changeClass()});
	changeClass();
	
	//$('input[name="radio_Child_Activities"]').bind('click',function(){childActivitiesClick();});
	//childActivitiesClick()
	
	$('#insuranceFile').bind('click',function(){addOverlay(1200,1200,'<?php echo URL::site('child/insuranceFile').URL::query();?>')});			
	$.mkDays({"year":$('input[name="txt_inputdate_Y"]'),
				"month":$('select[name="select_inputdate_M"]'),
				"day":$('select[name="select_inputdate_D"]')});
	$.mkDays({"year":$('input[name="txt_EnterDate_Y"]'),
				"month":$('select[name="select_EnterDate_M"]'),
				"day":$('select[name="select_EnterDate_D"]')});
	$.mkDays({"year":$('input[name="txt_LeaveDate_Y"]'),
				"month":$('select[name="select_LeaveDate_M"]'),
				"day":$('select[name="select_LeaveDate_D"]')});					
	$.mkDays({"year":$('input[name="txt_birthday_Y"]'),
				"month":$('select[name="select_birthday_M"]'),
				"day":$('select[name="select_birthday_D"]')});					
	$.mkDays({"year":$('input[name="txt_recog_date_Y"]'),
				"month":$('select[name="select_recog_date_M"]'),
				"day":$('select[name="select_recog_date_D"]')});
	//select_Traffic_Way 	select_Traffic_TakeTime			select_Traffic_Distance	
	$('select[name="select_Traffic_Way"]').on('change',function(){
		allNullOrAllHas('select_Traffic_Way','select_Traffic_TakeTime','select_Traffic_Distance');
	});
	$('select[name="select_Traffic_TakeTime"]').on('change',function(){
		allNullOrAllHas('select_Traffic_Way','select_Traffic_TakeTime','select_Traffic_Distance');
	});
	$('select[name="select_Traffic_Distance"]').on('change',function(){
		allNullOrAllHas('select_Traffic_Way','select_Traffic_TakeTime','select_Traffic_Distance');
	});	
	$('select[name="select_Leave_Way"]').on('change',function(){
		allNullOrAllHas('select_Leave_Way','select_Leave_TakeTime','select_Leave_Distance');
	});
	$('select[name="select_Leave_TakeTime"]').on('change',function(){
		allNullOrAllHas('select_Leave_Way','select_Leave_TakeTime','select_Leave_Distance');
	});
	$('select[name="select_Leave_Distance"]').on('change',function(){		
		allNullOrAllHas('select_Leave_Way','select_Leave_TakeTime','select_Leave_Distance');		
	});
});
function allNullOrAllHas(Name1,Name2,Name3){
	var val1 = $('select[name="'+Name1+'"]').val();
	var val2 = $('select[name="'+Name2+'"]').val();	
	var val3 = $('select[name="'+Name3+'"]').val();	
	var val = val1+val2+val3;
	if(val==''){
		$('select[name="'+Name1+'"]').removeClass('validate[required]');
		$('select[name="'+Name2+'"]').removeClass('validate[required]');
		$('select[name="'+Name3+'"]').removeClass('validate[required]');
	}else{
		$('select[name="'+Name1+'"]').addClass('validate[required]');
		$('select[name="'+Name2+'"]').addClass('validate[required]');
		$('select[name="'+Name3+'"]').addClass('validate[required]');	
	}
}


function getNewChildId(obj){
	if($.trim($('input[name="ID"]').val())!='') return false;	
	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('child/getNewChildId');?>",
	   cache: false,
	   dataType: 'html',
	   data: "Y="+$(obj).val(),
	   error: function(){alert('ajaxエラー');},
	   success: function(html){
			$('input[name="txt_Child_Id"]').val(html)
	   }
	});
}

function childEatDateClick()
{   
	if($('input[name="radio_Child_Eat"][value="1"]').is(":checked")==true){
		$('input[name="txt_child_eatdate_Y"]').attr('disabled',false);
		$('select[name="select_child_eatdate_M"]').attr('disabled',false);
		$('select[name="select_child_eatdate_D"]').attr('disabled',false);
	}else{
		$('input[name="txt_child_eatdate_Y"]').attr({'disabled':true}).val("");
		$('select[name="select_child_eatdate_M"]').attr({'disabled':true}).val("");
		$('select[name="select_child_eatdate_D"]').attr({'disabled':true}).val("");
	}
}

function childNursingDateClick()
{
	if($('input[name="radio_Child_Nursing"][value="1"]').is(":checked")==true){
		$('input[name="txt_child_nursingdate_Y"]').attr('disabled',false);
		$('select[name="select_child_nursingdate_M"]').attr('disabled',false);
		$('select[name="select_child_nursingdate_D"]').attr('disabled',false);
	}else{
		$('input[name="txt_child_nursingdate_Y"]').attr({'disabled':true}).val("");
		$('select[name="select_child_nursingdate_M"]').attr({'disabled':true}).val("");
		$('select[name="select_child_nursingdate_D"]').attr({'disabled':true}).val("");
	}
}

function recogType()
{
	var tmpVal = "<?php echo $childRecog['Recog_Type'];?>"
	if(tmpVal==""){
		$('input[name="radio_Child_Eat"]').eq(1).trigger("click").end().unbind('click').bind('click',function(){return false;});
		$('input[name="radio_Child_Nursing"]').eq(1).trigger("click").end().unbind('click').bind('click',function(){return false;});					
	}else if(tmpVal=='R1'){
		$('input[name="radio_Child_Eat"]').unbind('click').bind('click',function(){
			childEatDateClick();
		})
		$('input[name="radio_Child_Nursing"]').eq(1).trigger("click").end().unbind('click').bind('click',function(){return false;});
	}else{
		$('input[name="radio_Child_Eat"]').eq(1).trigger("click").end().unbind('click').bind('click',function(){return false;});
		$('input[name="radio_Child_Nursing"]').unbind('click').bind('click',function(){
			childNursingDateClick();
		});
	}
	childEatDateClick();
	childNursingDateClick();
}

var classActivities = new Array();
<?php
foreach($data_classSet as $key => $val){
	echo "classActivities['{$val['ID']}'] = [".implode(",",explode(';',$val['Activities']))."];\n";					
}
?>
function changeClass()
{
	var tmpClass = $('select[name="select_Class"]').val();
	if(tmpClass==''){
		$('input[name="radio_Child_Activities"]').unbind('click').eq(1).trigger("click").end().bind('click',function(){return false;});
	}else{
		if(classActivities[tmpClass].length>0){
			$('input[name="radio_Child_Activities"]').unbind('click').bind('click',function(){childActivitiesClick(tmpClass);});							
			
		}else{
			$('input[name="radio_Child_Activities"]').unbind('click').eq(1).trigger("click").end().bind('click',function(){return false;});
		}
	}
	childActivitiesClick(tmpClass);					
}
		
function childActivitiesClick(tmpClass)
{	
	var activities = new Array();
	<?php
	$i = 0;
	foreach($activities as $key => $val){
		echo "activities[{$i}] = {$key};\n";
		$i++;					
	}
	?>
		
	if($('input[name="radio_Child_Activities"][value="1"]').is(":checked")==true){		
		if(tmpClass!=''){
			for(i in activities){
				if($.inArray(activities[i],classActivities[tmpClass])!=-1){
					$('input[name="chbox_Activities[]"][value="'+activities[i]+'"]').attr('disabled',false);
				}else{
					$('input[name="chbox_Activities[]"][value="'+activities[i]+'"]').attr({'disabled':true,'checked':false});
				}
			}
			
			
			//for(i in classActivities[tmpClass]){				
				//$('input[name="chbox_Activities[]"][value="'+classActivities[tmpClass][i]+'"]').attr('disabled',false);				
			//}
		}
	}else{
		$('input[name="chbox_Activities[]"]').attr({'disabled':true,'checked':false});
	}
}
				
				
<?php if(empty($child_Info)||$customerType=='Admin'){?>
function autoLock()
{
	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('child/autolock');?>",
	   cache: false,
	   dataType: 'json',
	   data: "Child_Id="+$('input[name="txt_Child_Id"]').val(),
	   error: function(){},
	   success: function(json){
			if(!json.lock){
				alert("整理番号エラー");	
				window.location.reload();
			}
	   }
	});					
}				
<?php
		if(empty($child_Info)){
?>
	setInterval("autoLock()", 55000);
<?php 
		}else if($customerType=='Admin'){
?>
	$('input[name="txt_Child_Id"]').one('change',function(){setInterval("autoLock()", 55000);});					
<?php 
		}
	}
?>									
</script>

<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>                                
                