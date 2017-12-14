<?php
echo View::factory('public/head');
?>
<body>
	<?php	
	$logohtml = '<div class="topright topright01 right">';
	if(array_key_exists('from',$_GET)){	
	$logohtml .= '   <div class="topright topright01 right">
                        <p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="戻る"/></a></p>
                    </div>';
	}
	if($SELLEVEL!='Reader'){
		$logohtml .= '   <div class="topright topright01 right">
							<p><a href="'.URL::site('child/contact').URL::query(array('pdf'=>true)).'" target="_blank"><input type="button" value="緊急連絡カード作成" /></a></p>
						</div>';
	}
	$logohtml .= '				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>緊急連絡カード作成　対象園児</h2></div>
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
					<div class="imgbox"><?php if(!empty($img)){?><img src="<?php echo $img.'?time='.time();?>" style="width:278px;height:232px;" readonly /><?php }?></div>
				</div>
				<div class="clear"></div>
				<div class="datelist datelist02">
					<ul>
						<li><span>現 住 所</span><input type="text" class="txt02" value="<?php if(!empty($child_Info)){echo $child_Info['Address'];}?>"  readonly /></li>
						<li><span>登園時間</span>
							<b>平日</b><input name="txt_Arrive_Time"  type="text" class="txt04" value="<?php if(!empty($child_Info['Arrive_Time'])){ echo $child_Info['Arrive_Time']=='00:00:00'?'':date('H:i',strtotime($child_Info['Arrive_Time']));} ?>"readonly />
							<b>付添者続柄</b><input name="txt_Arrive_ByWho" type="text" class="txt04" value="<?php if(!empty($child_Info['Arrive_ByWho'])){ echo $parameter['RELATIONSHIP'][$child_Info['Arrive_ByWho']];} ?>" readonly />
						</li>
						<li><span></span>
							<b>土曜日</b><input name="txt_Arrive_Time_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info['Arrive_Time_Rest'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Arrive_Time_Rest']));} ?>" readonly />
							<b>付添者続柄</b><input name="txt_Arrive_ByWho_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info['Arrive_ByWho_Rest'])){ echo $parameter['RELATIONSHIP'][$child_Info['Arrive_ByWho_Rest']];} ?>" readonly />
						</li>
						<li><span>降園時間</span>
							<b>平日</b><input name="txt_Leave_Time" type="text" class="txt04" value="<?php if(!empty($child_Info['Leave_Time'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Leave_Time']));} ?>" readonly />
							<b>付添者続柄</b><input name="txt_Leave_ByWho" type="text" class="txt04" value="<?php if(!empty($child_Info['Leave_ByWho'])){ echo $parameter['RELATIONSHIP'][$child_Info['Leave_ByWho']];} ?>" readonly />
						</li>
						<li><span></span>
							<b>土曜日</b><input name="txt_Leave_Time_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info['Leave_Time_Rest'])){ echo $child_Info['Arrive_Time_Rest']=='00:00:00'?'':date('H:i',strtotime($child_Info['Leave_Time_Rest']));} ?>" readonly />
							<b>付添者続柄</b><input name="txt_Leave_ByWho_Rest" type="text" class="txt04" value="<?php if(!empty($child_Info['Leave_ByWho_Rest'])){ echo $parameter['RELATIONSHIP'][$child_Info['Leave_ByWho_Rest']];} ?>" readonly />
						</li>
						<li><strong style="width:400px;">代表保護者に連絡がつかない場合の連絡先</strong></li>
						<li><span></span><span>苗字</span><input name="txt_Assist_FamilyName" type="text" class="txt01" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_FamilyName'];}?>"  readonly />
									 	 <span>名前</span><input name="txt_Assist_GivenName" type="text" class="txt01" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_GivenName'];}?>"  readonly />
										 <span>性別</span><input name="txt_Assist_Sex" type="text" class="txt01" value="<?php if(!empty($contact_Info)){if($contact_Info['Assist_Sex']=='1'){echo '男';}if($contact_Info['Assist_Sex']=='2'){echo '女';}}?>"   readonly />
						</li>
						<li><span></span><span>みょうじ</span><input name="txt_Assist_FamilyName_Spell" type="text" class="txt01" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_FamilyName_Spell'];}?>"  readonly />
										 <span>なまえ</span><input name="txt_Assist_GivenName_Spell" type="text" class="txt01" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_GivenName_Spell'];}?>"  readonly />
									 	 <span>関係</span><input name="txt_Assist_Relation" type="text" class="txt01" value="<?php if(!empty($contact_Info['Assist_Relation'])){ echo $parameter['RELATIONSHIP'][$contact_Info['Assist_Relation']];} ?>"   readonly />
						</li>
						<li><span></span><span>住　 所</span><input name="txt_Assist_Address" type="text" class="txt03" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_Address'];}?>"  readonly /></li>
						<li><span></span><span>T  E  L</span><input name="txt_Assist_Tel" type="text" class="txt03" value="<?php if(!empty($contact_Info)){ echo $contact_Info['Assist_Tel'];}?>"   readonly /></li>
						<li><strong>かかりつけの病院</strong></li>
						<li><span></span><b>整形外科</b><input name="txt_Hospital_Physical" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_Physical_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Physical_Tel'];}?>"  readonly />	
						</li>
						<li><span></span><b>歯　科</b><input name="txt_Hospital_Tooth" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_Tooth_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Tooth_Tel'];}?>"   readonly />	
						</li>
						<li><span></span><b>眼　科</b><input name="txt_Hospital_Eye" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_Eye_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Eye_Tel'];}?>"   readonly />	
						</li>		
						<li><span></span><b>耳鼻科</b><input name="txt_Hospital_EarNose" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_EarNose_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_EarNose_Tel'];}?>"   readonly />	
						</li>	
						<li><span></span><b>皮膚科</b><input name="txt_Hospital_Skin" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_Skin_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Skin_Tel'];}?>"   readonly />	
						</li>	
						<li><span></span><b>小児科</b><input name="txt_Hospital_Child" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child'];}?>"  readonly />
							<span>TEL</span><input name="txt_Hospital_Child_Tel" type="text" class="txt05" value="<?php if(!empty($child_Info)){ echo $child_Info['Hospital_Child_Tel'];}?>"   readonly />	
						</li>
					</ul>
				</div>
				
				
				
			</div>
		</div>
	</div>
	
</body>
</html>