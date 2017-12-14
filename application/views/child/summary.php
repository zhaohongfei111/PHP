<?php
echo View::factory('public/head');
?>
<body>
	<?php	
	$logohtml = '<div class="topright topright01 right">';
	if(array_key_exists('from',$_GET)){	
		if($SELLEVEL!='Reader'){
			$logohtml .= '   <div class="topright topright01 right">
								<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="保存せずに戻る"  /></a></p>
							</div>';
		}else{
			$logohtml .= '   <div class="topright topright01 right">
								<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="戻る"  /></a></p>
							</div>';

		}
	}
	if($SELLEVEL!='Reader'){
		$logohtml .= '	 <div class="topright topright01 right">
							<p><input id="halfwaySave" type="button" value="途中保存" /></p>
						</div>
						<div class="topright topright01 right">
							<p><input type="button" value="作　成" onClick="formMainSave()"/></p>
						</div>';
	}
	$logohtml .= '				</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>要録作成　対象園児</h2></div>
			<div class="datebox">
				<div class="left">
					<div class="datelist datelist01 datelist02">
						<h2>基 本 情 報</h2>
						<ul>
							<li><span>整理番号</span><input name="txt_Child_Id" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){ echo $child_Info['Child_Id'];}?>" /></li>
						</ul>
					</div>
					<div class="datelist datelist02">
						<h2>園 児 情 報</h2>
						<ul>
							<li>
								<span>苗字</span><input name="txt_FamilyName" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName'];}?>" />
								<span>名前</span><input name="txt_GivenName" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName'];}?>" />
							</li>
							<li>
								<span>みょうじ</span><input name="txt_FamilyName_Spell" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){ echo $child_Info['FamilyName_Spell'];}?>" />
								<span>なまえ</span><input name="txt_GivenName_Spell" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){ echo $child_Info['GivenName_Spell'];}?>" />
							</li>
							<li><span>生年月日</span><input name="txt_birthday_Y" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ echo substr($child_Info['Birthday'],0,4);}?>" style="width:80px;" />
								<em>年</em><input name="txt_birthday_M" type="text" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>" class="txt08" disabled="disabled" />
								<em>月</em><input name="txt_birthday_D" type="text" value="<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>" class="txt08" disabled="disabled" />
								<em>日</em><em>満</em><input name="txt_Age" type="text" value="<?php if(!empty($child_Info)){echo substr($child_Info['Age'], 0,1);}?>" class="txt08" disabled="disabled" /><em>歳</em>
							</li>
							<li><span style="width:25px;"></span><em>（</em><input name="txt_birthday_Y_Jap" type="text" class="txt01" value="<?php if(!empty($child_Info)){echo $child_Info['YearJap'];}?>" style="width:80px;" disabled="disabled"/><em>年）</em></li>
							<li><span>性別</span><input name="txt_Sex" type="text" value="<?php if(!empty($child_Info)){if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}}?>" class="txt08" disabled="disabled" />
								<span>クラス</span><input name="txt_Class" type="text" class="txt01" disabled="disabled" value="<?php if(!empty($child_Info)){echo empty($child_Info['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child_Info['Class']];}?>" />
							</li>
						</ul>
					</div>
				</div>
				<div class="photoimg right">
					<div class="imgbox"><?php if(!empty($img)){?><img src="<?php echo $img.'?time='.time();?>" style="width:278px;height:232px;" /><?php }?></div>
				</div>
				<div class="clear"></div>
				<div class="datelist datelist01 datelist02">
					<ul>
						<li><span>現 住 所</span><input type="text" class="txt02" disabled="disabled" value="<?php if(!empty($child_Info)){echo $child_Info['Address'];}?>"  /></li>
					</ul>
				</div>
				
				<form id="formMain" action="<?php echo URL::site('child/summary_insert').URL::query();?>" method="post" enctype="multipart/form-data">				
				<input name="hidden_ID" type="hidden" value="<?php echo $ID;?>"/> 
				<input name="halfwaySave" type="hidden" value="True" />
                
				<div class="datelist datetit">
					<h2>入 力 情 報</h2>
					<h3>保護者の選択<i>※要録に記載する保護者を選択してください。</i></h3>
					<div class="table05">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
                                	<td></td>
                                    <td>苗字</td>
                                    <td>名前</td>
                                    <td>性別</td>
                                    <td>関係</td>
                                    <td>年齢</td>
                                    <td>生年月日</td>
                                    <td>緊急連絡先</td>
                                    <td>勤務先・在学校名</td>
                                </tr>
							</thead>
							<tbody>
								<tr>
                                	<td><input name="checkbox_Guardian1" class="checkbox01 checkOnly" type="checkbox" value="1" <?php if(!empty($schoolin)&&$schoolin['Guardian1']==1) echo "checked";?>/></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_FamilyName'];}?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_FamilyName_Spell'];}?></p></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_GivenName'];}?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_GivenName_Spell'];}?></td>
                                    <td><?php if(!empty($step2_Info)){if($step2_Info['Guardian1_Sex']=='1'){echo '男';}elseif($step2_Info['Guardian1_Sex']=='2'){ echo '女';}}?></td>
                                    <td><?php if(!empty($step2_Info['Guardian1_Relation'])){echo $parameter['RELATIONSHIP'][$step2_Info['Guardian1_Relation']];} ?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_Age'];}?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_Birthday'];} ?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_YearJap'];} ?></p></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_Mobile'];} ?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian1_WorkPlace'];} ?></td>
                                </tr>
								<tr><td><input name="checkbox_Guardian2" class="checkbox01 checkOnly" type="checkbox" value="2" <?php if(!empty($schoolin)&&$schoolin['Guardian2']==2) echo "checked";?>/></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_FamilyName'];}?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_FamilyName_Spell'];}?></p></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_GivenName'];}?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_GivenName_Spell'];}?></td>
                                    <td><?php if(!empty($step2_Info)){if($step2_Info['Guardian2_Sex']=='1'){echo '男';}elseif($step2_Info['Guardian2_Sex']=='2'){ echo '女';}}?></td>
                                    <td><?php if(!empty($step2_Info['Guardian2_Relation'])){echo $parameter['RELATIONSHIP'][$step2_Info['Guardian2_Relation']];} ?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_Age'];}?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_Birthday'];} ?><p><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_YearJap'];} ?></p></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_Mobile'];} ?></td>
                                    <td><?php if(!empty($step2_Info)){echo $step2_Info['Guardian2_WorkPlace'];} ?></td></tr>
							</tbody>
						</table>
					</div>
					<div class="left">
						<h3>入園前の状況</h3>
						<textarea name="txt_situation" rows="" cols="" placeholder="保育所等での集団生活の経験の有無等を記入すること。なお、転入園してきた幼児 については、併せてこの欄に前に在園した幼稚園名、所在地及び転入園の事由等を記入する"><?php if(!empty($schoolin)) echo $schoolin['situation'];?></textarea>
						<h3>進 学 先 など</h3>
						<textarea name="txt_source" rows="" cols="" placeholder="進学した小学校等の名称・所在地を記入すること。なお、転園した幼児については、 この欄に転園先の幼稚園名、所在地及び転園の事由等を記入すること。また、退園し た幼児については、この欄にその事由等を記入する"><?php if(!empty($schoolin)) echo $schoolin['source'];?></textarea>
					</div>
					<div class="data05 right">
						<h4>データベース参考情報</h4>
						<ul>
                        	<?php
								if(!empty($step5_Info)){
									switch($step5_Info['Edu_Place']){
										case 1:
											$Edu_Place	= "家庭";
											break;
										case 2:
											$Edu_Place	= "幼稚園({$step5_Info['Edu_PlaceName']})";
											break;
										case 3:
											$Edu_Place	= "保育園({$step5_Info['Edu_PlaceName']})";
											break;
										case 4:
											$Edu_Place	= "その他({$step5_Info['Edu_Remark']})";
											break;
										default:
											$Edu_Place	= "";
											break;										
									}	
								}else{
									$Edu_Place	= "";	
								}
							?>
							<li><p>入園前の教育状況：</p><input type="text" class="txt03" disabled="disabled" value="<?php echo $Edu_Place;?>"  /></li>
							<li><p>主に養育した人：</p><input type="text" class="txt03" disabled="disabled" value="<?php if(!empty($step3_Info['RaiseMen_Relation'])) echo  $parameter['RELATIONSHIP'][$step3_Info['RaiseMen_Relation']]?>"  /></li>
						</ul>
						<div class="but05"><input type="button" value="園児情報詳細参照" /></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="datelist">
					<div class="box05 left">
						<ul>
                        	<?php
                            	$InDate_Y = $InDate_m = $InDate_d = $ChangeInDate_Y = $ChangeInDate_m = $ChangeInDate_d = $InterruptDate_Y = $InterruptDate_m = $InterruptDate_d = $FinishDate_Y = $FinishDate_m = $FinishDate_d = '';
								if(!empty($schoolin)){
									list($InDate_Y,$InDate_m,$InDate_d) = explode('-',$schoolin['InDate']);									
									list($ChangeInDate_Y,$ChangeInDate_m,$ChangeInDate_d) = explode('-',$schoolin['ChangeInDate']);									
									list($InterruptDate_Y,$InterruptDate_m,$InterruptDate_d) = explode('-',$schoolin['InterruptDate']);									
									list($FinishDate_Y,$FinishDate_m,$FinishDate_d) = explode('-',$schoolin['FinishDate']);
								}
							?>
							<li>
                            	<span>入　園</span><select name="select_InDate_Y" class="select02" >
									<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['Y'];?>" <?php if($InDate_Y==$val['Y']) echo 'selected';?>><?php echo $val['Y']?></option>
								<?php }?>
								</select><em>年</em>
								<select name="select_InDate_M" class="select01" >
								<option value="">-----</option>
								<?php foreach ($months as $key=>$val){?>
									<option value="<?php echo $val;?>" <?php if($InDate_m==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>月</em>
								<select name="select_InDate_D" class="select01" >
								<option value="">------</option>
								<?php foreach ($days as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($InDate_d==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>日</em>
							</li>
							<li><span>転入園</span><select name="select_ChangeInDate_Y" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['Y']?>" <?php if($ChangeInDate_Y==$val['Y']) echo 'selected';?>><?php echo $val['Y']?></option>
								<?php }?>
								</select><em>年</em>
								<select name="select_ChangeInDate_M" class="select01" >
								<option value="">-----</option>
								<?php foreach ($months as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($ChangeInDate_m==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>月</em>
								<select name="select_ChangeInDate_D" class="select01" >
								<option value="">------</option>
								<?php foreach ($days as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($ChangeInDate_d==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>日</em>
							</li>
							<li><span>転・退園</span><select name="select_InterruptDate_Y" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['Y']?>" <?php if($InterruptDate_Y==$val['Y']) echo 'selected';?>><?php echo $val['Y']?></option>
								<?php }?>
								</select><em>年</em>
								<select name="select_InterruptDate_M" class="select01" >
								<option value="">-----</option>
								<?php foreach ($months as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($InterruptDate_m==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>月</em>
								<select name="select_InterruptDate_D" class="select01" >
								<option value="">------</option>
								<?php foreach ($days as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($InterruptDate_d==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>日</em>
							</li>
							<li><span>修　了</span><select name="select_FinishDate_Y" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['Y']?>" <?php if($FinishDate_Y==$val['Y']) echo 'selected';?>><?php echo $val['Y']?></option>
								<?php }?>
								</select><em>年</em>
								<select name="select_FinishDate_M" class="select01" >
								<option value="">-----</option>
								<?php foreach ($months as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($FinishDate_m==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>月</em>
								<select name="select_FinishDate_D" class="select01" >
								<option value="">------</option>
								<?php foreach ($days as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($FinishDate_d==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>日</em>
							</li>
						</ul>
					</div>
					<div class="box05 box055 right">
						<h3><strong>年度及び入園 (転入園)</strong><strong>進級時の幼児の年齢</strong></h3>
						<ul>
                        	<?php
                            $Period1_Year = $Period1_AgeY = $Period1_AgeM = $Period2_Year = $Period2_AgeY = $Period2_AgeM = $Period3_Year = $Period3_AgeY = $Period3_AgeM = $Period4_Year = $Period4_AgeY = $Period4_AgeM = '';
							if(!empty($schoolin)){
								$Period1_Year = $schoolin['Period1_Year'];
								$Period1_AgeY = $schoolin['Period1_AgeY'];
								$Period1_AgeM = $schoolin['Period1_AgeM'];
								$Period2_Year = $schoolin['Period2_Year'];
								$Period2_AgeY = $schoolin['Period2_AgeY'];
								$Period2_AgeM = $schoolin['Period2_AgeM'];
								$Period3_Year = $schoolin['Period3_Year'];
								$Period3_AgeY = $schoolin['Period3_AgeY'];
								$Period3_AgeM = $schoolin['Period3_AgeM'];
								$Period4_Year = $schoolin['Period4_Year'];
								$Period4_AgeY = $schoolin['Period4_AgeY'];
								$Period4_AgeM = $schoolin['Period4_AgeM'];
							}
							?>
							<li><select name="select_Period1_Year" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['jap']?>" <?php if($Period1_Year==$val['jap']) echo 'selected';?>><?php echo $val['jap']?></option>
								<?php }?>
								</select><em>年度</em>
								<select name="select_Period1_AgeY" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period1_AgeY==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
								<select name="select_Period1_AgeM" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period1_AgeM==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月</em>
							</li>
							
							<li><select name="select_Period2_Year" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['jap']?>" <?php if($Period2_Year==$val['jap']) echo 'selected';?>><?php echo $val['jap']?></option>
								<?php }?>
								</select><em>年度</em>
								<select name="select_Period2_AgeY" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period2_AgeY==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
								<select name="select_Period2_AgeM" class="select01">
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period2_AgeM==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月</em>
							</li>
							<li><select name="select_Period3_Year" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['jap']?>" <?php if($Period3_Year==$val['jap']) echo 'selected';?>><?php echo $val['jap']?></option>
								<?php }?>
								</select><em>年度</em>
								<select name="select_Period3_AgeY" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period3_AgeY==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
								<select name="select_Period3_AgeM" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period3_AgeM==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月</em>
							</li>
							<li><select name="select_Period4_Year" class="select02" >
								<option value="">-----</option>
								<?php foreach ($years as $key=>$val){?>
									<option value="<?php echo $val['jap']?>" <?php if($Period4_Year==$val['jap']) echo 'selected';?>><?php echo $val['jap']?></option>
								<?php }?>
								</select><em>年度</em>
								<select name="select_Period4_AgeY" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeY'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period4_AgeY==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>歳</em>
								<select name="select_Period4_AgeM" class="select01" >
								<option value="">-----</option>
								<?php foreach ($parameter['AGE']['AgeM'] as $key=>$val){?>
									<option value="<?php echo $val?>" <?php if($Period4_AgeM==$val) echo 'selected';?>><?php echo $val?></option>
								<?php }?>
								</select><em>ヶ月</em>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>	
				<?php
                $Teach1_Year = $Teach2_Year = $Teach3_Year = $Teach4_Year = '';
				if(!empty($schoolin)){
					$Teach1_Year = $schoolin['Teach1_Year'];
					$Teach2_Year = $schoolin['Teach2_Year'];
					$Teach3_Year = $schoolin['Teach3_Year'];
					$Teach4_Year = $schoolin['Teach4_Year'];
				}
				?>
				<div class="pagetable05">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr><td></td><td colspan="2">平成<select name="select_Teach1_Year" class="select02" >
							<option value="">-----</option>
							<?php for($year=2;$year<=54;$year++){?>
								<option value="<?php echo $year?>" <?php if($Teach1_Year==$year) echo "selected";?>><?php echo $year?></option>
							<?php }?>
							</select>年度</td>
							<td colspan="2">平成<select name="select_Teach2_Year" class="select02" >
							<option value="">-----</option>
							<?php for($year=2;$year<=54;$year++){?>
								<option value="<?php echo $year?>" <?php if($Teach2_Year==$year) echo "selected";?>><?php echo $year?></option>
							<?php }?>
							</select>年度</td></tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td>教育日数<input name="txt_Teach1_Days" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach1_Days'];}?>"/></td>
								<td>出席日数<input name="txt_Teach1_inDays" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach1_inDays'];}?>"/></td>
								<td>教育日数<input name="txt_Teach2_Days" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach2_Days'];}?>"/></td>
								<td>出席日数<input name="txt_Teach2_inDays" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach2_inDays'];}?>"/></td>
							</tr>
							<tr>
								<td rowspan="2">指導の重点等</td>
								<td colspan="2"><p>学年の重点</p><textarea name="txt_Teach1_YearPoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach1_YearPoint'];}?></textarea></td>
								<td colspan="2"><p>学年の重点</p><textarea name="txt_Teach2_YearPoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach2_YearPoint'];}?></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><p>個人の重点</p><textarea name="txt_Teach1_SinglePoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach1_SinglePoint'];}?></textarea></td>
								<td colspan="2"><p>個人の重点</p><textarea name="txt_Teach2_SinglePoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach2_SinglePoint'];}?></textarea></td>
							</tr>
							<tr>
								<td>指導上参考となる事項</td>
								<td colspan="2"><textarea name="txt_Teach1_Reference" rows="" cols="" style="height:140px;"><?php if(!empty($schoolin)){echo $schoolin['Teach1_Reference'];}?></textarea></td>
								<td colspan="2"><textarea name="txt_Teach2_Reference" rows="" cols="" style="height:140px;"><?php if(!empty($schoolin)){echo $schoolin['Teach2_Reference'];}?></textarea></td>
							</tr>
							<tr>
								<td>備考</td>
								<td colspan="2"><textarea name="txt_Teach1_Remark" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach1_Remark'];}?></textarea></td>
								<td colspan="2"><textarea name="txt_Teach2_Remark" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach2_Remark'];}?></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="pagetable05">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr><td></td><td colspan="2">平成<select name="select_Teach3_Year" class="select02" >
							<option value="">-----</option>
							<?php for($year=2;$year<=54;$year++){?>
								<option value="<?php echo $year;?>" <?php if($Teach3_Year==$year) echo "selected";?>><?php echo $year?></option>
							<?php }?>
							</select>年度</td>
							<td colspan="2">平成<select name="select_Teach4_Year" class="select02" >
							<option value="">-----</option>
							<?php for($year=2;$year<=54;$year++){?>
								<option value="<?php echo $year?>" <?php if($Teach4_Year==$year) echo "selected";?>><?php echo $year?></option>
							<?php }?>
							</select>年度</td></tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td>教育日数<input name="txt_Teach3_Days" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach3_Days'];}?>"/></td>
								<td>出席日数<input name="txt_Teach3_inDays" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach3_inDays'];}?>"/></td>
								<td>教育日数<input name="txt_Teach4_Days" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach4_Days'];}?>"/></td>
								<td>出席日数<input name="txt_Teach4_inDays" type="text" class="txt01" value="<?php if(!empty($schoolin)){echo $schoolin['Teach4_inDays'];}?>"/></td>
							</tr>
							<tr>
								<td rowspan="2">指導の重点等</td>
								<td colspan="2"><p>学年の重点</p><textarea name="txt_Teach3_YearPoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach3_YearPoint'];}?></textarea></td>
								<td colspan="2"><p>学年の重点</p><textarea name="txt_Teach4_YearPoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach4_YearPoint'];}?></textarea></td>
							</tr>
							<tr>
								<td colspan="2"><p>個人の重点</p><textarea name="txt_Teach3_SinglePoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach3_SinglePoint'];}?></textarea></td>
								<td colspan="2"><p>個人の重点</p><textarea name="txt_Teach4_SinglePoint" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach4_SinglePoint'];}?></textarea></td>
							</tr>
							<tr>
								<td>指導上参考となる事項</td>
								<td colspan="2"><textarea name="txt_Teach3_Reference" rows="" cols="" style="height:140px;"><?php if(!empty($schoolin)){echo $schoolin['Teach3_Reference'];}?></textarea></td>
								<td colspan="2"><textarea name="txt_Teach4_Reference" rows="" cols="" style="height:140px;"><?php if(!empty($schoolin)){echo $schoolin['Teach4_Reference'];}?></textarea></td>
							</tr>
							<tr>
								<td>備考</td>
								<td colspan="2"><textarea name="txt_Teach3_Remark" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach3_Remark'];}?></textarea></td>
								<td colspan="2"><textarea name="txt_Teach4_Remark" rows="" cols=""><?php if(!empty($schoolin)){echo $schoolin['Teach4_Remark'];}?></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				</form>
			</div>
		</div>
	</div>
    
	<script>
	$(function(){		
		$('#halfwaySave').bind('click',function(){
			$('input[name="halfwaySave"]').val("True");
			$.ajax({
				   type: "POST",
				   url: "<?php echo URL::site('child/summary_insert');?>",
				   cache: false,
				   dataType: 'json',
				   data: $('#formMain').serialize(),
				   error: function(){alert('ajaxエラー');},
				   success: function(json){
					   				 
					addSaveOverlay(1000,400,json['result']);
								   
				   }
				});		
		});
		
		$('.checkOnly').on('click',this,function(){checkOnly($(this))});
		
		$.mkDays({"year":$('select[name="select_InDate_Y"]'),
					"month":$('select[name="select_InDate_M"]'),
					"day":$('select[name="select_InDate_D"]')});
		$.mkDays({"year":$('select[name="select_ChangeInDate_Y"]'),
					"month":$('select[name="select_ChangeInDate_M"]'),
					"day":$('select[name="select_ChangeInDate_D"]')});
		$.mkDays({"year":$('select[name="select_InterruptDate_Y"]'),
					"month":$('select[name="select_InterruptDate_M"]'),
					"day":$('select[name="select_InterruptDate_D"]')});
		$.mkDays({"year":$('select[name="select_FinishDate_Y"]'),
					"month":$('select[name="select_FinishDate_M"]'),
					"day":$('select[name="select_FinishDate_D"]')});
		
	});
    function formMainSave(){
        $('input[name="halfwaySave"]').val("False");
        $('#formMain').prop('target','_blank').submit().prop('target','_self');
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