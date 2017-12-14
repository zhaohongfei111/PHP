<?php
echo View::factory('public/head');
?>
<body class="bg01">
	<?php	
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>
                <div class="topright topright01 right">
                    <p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()"/></p>
                </div>';
	$nameHtml = '<div class="headernavbox mainbox">
					<div class="headertit left">ジャンプ：</div>
					<div class="headerlist right">
						<ul>
							<li><a href="javascript:goDiv(\'dataSet\')">登  降  園</a></li>
							<li><a href="javascript:goDiv(\'activitiesSet\')">課 外 活 動</a></li>
							<li><a href="javascript:goDiv(\'costSet\')">保　育　料</a></li>
							<li><a href="javascript:goDiv(\'classSet\')">ク　ラ　ス</a></li>
							<li><a href="javascript:goDiv(\'overCostSet\')">延長保育料</a></li>
							<li><a href="javascript:goDiv(\'projectCostSet\')">保護者請求項目</a></li>
							<li><a href="javascript:goDiv(\'goodsCostSet\')">用 品 単 価</a></li>
							<li><a href="javascript:goDiv(\'eatCostSet\')">給　食　費</a></li>
							<li><a href="javascript:goDiv(\'kidsLessSet\')">多子軽減設定</a></li>
							<li><a href="javascript:goDiv(\'guardianCon\')">保護者連絡受付</a></li>
							<li><a href="javascript:goDiv(\'temporary\')">一時預かり実績</a></li>
                    		<li><a href="javascript:goDiv(\'other_set\')">その他設定</a></li>
						</ul>
					</div>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox headerbox00')
			->set('logoHtml',$logohtml)
			->bind('nameHtml',$nameHtml);
	?>
    
	<div class="mainbox mianbox01">
	<form id="formMain" action="<?php echo URL::site('administration/dataSet_Insert').URL::query(array('from'=>'administration/dataSet'));?>" method="post" enctype="multipart/form-data">
			<div class="datebox">
				<div id="baseSet" class="bgbox01">
					<div class="left">
						<div class="datelist datelist10 tdatelist10">
							<h1>システム基本設定</h1>
							<ul>
								<li><strong>園の名前１</strong></li>
								<li><input name="txt_Kindergarden_Name1" type="text" class="txt033" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_Name1'];?>" /></li>
								<li><strong>園の名前２</strong></li>
								<li><input name="txt_Kindergarden_Name2" type="text" class="txt033" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_Name2'];?>" /></li>
								<li><strong>所 在 地</strong></li>
								<li><strong style="width:12px;">〒</strong><input name="txt_Address_Area" type="text" style="width:95px;margin-right:5px;" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Address_Area'];?>" /><input name="txt_Kindergarden_Address" type="text"  class="txt033" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_Address'];?>" /></li>
								<li><strong style="width:210px;">TEL</strong><strong style="width:200px;">FAX</strong><strong style="width:200px;">管理者メールアドレス</strong></li>
								<li><input name="txt_Kindergarden_TEL" type="text" class="txt10" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_TEL'];?>" />
									<input name="txt_Kindergarden_FAX" type="text" class="txt10" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_FAX'];?>" />
									<input name="txt_Kindergarden_E_mail" type="text" class="txt10" value="<?php echo empty($data_baseSet)?'':$data_baseSet['0']['Kindergarden_E_mail'];?>" />
								</li>
								<li><strong>請 求 書 備 考 欄</strong></li>
								<li><textarea name="txt_Request_Remark" class="textarea01" name="" cols="20" rows="5"><?php echo empty($data_baseSet)?'':$data_baseSet['0']['Request_Remark'];?></textarea></li>
								<li><strong>備 考</strong></li>
								<li><textarea name="txt_BaseSet_Remark" class="textarea01" name="" cols="20" rows="5"><?php echo empty($data_baseSet)?'':$data_baseSet['0']['BaseSet_Remark'];?></textarea></li>
							</ul>
						</div>
					</div>
					<div class="datelist datelist10 right">
						<ul>
							<li><strong>ロゴデータ</strong></li>
							<li><div id="logo" class="simg01"><img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>" style="max-width:309px; max-height:121px;"/></div></li>
							<li>
								<div class="fileUpload">
									<div class="upbg"></div>
                                    <input type="file" class="upload" name="logo" id="imgOne" onChange="preImg(this,'logo','logoImg',309,121);"   accept=".jpg,.jpeg"/>
								</div>
							</li>
							<li><strong>電子印</strong></li>
							<li><div id="electronicSeal" class="simg01"><img src="<?php echo $media.'images/s02.jpg?'.rand(0,9999);?>"/></div></li>
							<li>
								<div class="fileUpload">
									<div class="upbg"></div>
                                    <input type="file" class="upload" name="electronicSeal" id="imgTwo" onChange="preImg(this,'electronicSeal','electronicSealImg',309,121);"   accept=".jpg,.jpeg"/>
								</div>
							</li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				
				<div id="dataSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>登降園実績管理データ設定</h1>
						<ul>
							<li><strong>預かり保育(標準)</strong>
								<b>開始時間①</b><select name="select_Standard_Begin1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Standard_Begin1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間①</b><select name="select_Standard_End1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Standard_End1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>開始時間②</b><select name="select_Standard_Begin2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Standard_Begin2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間②</b><select name="select_Standard_End2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Standard_End2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>預かり保育(短時間)</strong>
								<b>開始時間①</b><select name="select_Short_Begin1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Short_Begin1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間①</b><select name="select_Short_End1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Short_End1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>開始時間②</b><select name="select_Short_Begin2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Short_Begin2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間②</b><select name="select_Short_End2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Short_End2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>教育時間</strong>
								<b>開始時間</b><select name="select_Education_Begin" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Education_Begin']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間</b><select name="select_Education_End" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Education_End']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>延長保育</strong>
								<b>開始時間</b><select name="select_ExtendGuar_Begin" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['ExtendGuar_Begin']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間</b><select name="select_ExtendGuar_End" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['ExtendGuar_End']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>補助金対象</strong>
								<b>開始時間①</b><select name="select_Support_Begin1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Support_Begin1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間①</b><select name="select_Support_End1" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Support_End1']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>開始時間②</b><select name="select_Support_Begin2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Support_Begin2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間②</b><select name="select_Support_End2" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Support_End2']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>通常保育(標準)</strong>
								<b>開始時間</b><select name="select_CareStandard_Begin" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['CareStandard_Begin']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間</b><select name="select_CareStandard_End" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['CareStandard_End']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>通常保育(短時間)</strong>
								<b>開始時間</b><select name="select_CareShort_Begin" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['CareShort_Begin']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間</b><select name="select_CareShort_End" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['CareShort_End']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
							<li><strong>課外活動時間</strong>
								<b>開始時間</b><select name="select_Activities_Begin" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Activities_Begin']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
								<b>終了時間</b><select name="select_Activities_End" class="select02" >
										<option value="">----</option>
									<?php foreach ($timeList as $key =>$val){?>
										<option <?php if(!empty($data_dataSet)){echo $data_dataSet['0']['Activities_End']==$val['standard']?'selected':'';}else{echo  $val['objective']==''?'selected':'';}?> value="<?php echo $val['standard']?>"><?php echo $val['objective']?></option>
									<?php }?>
									</select>
							</li>
						</ul>
					</div>
				</div>
				
				<div id="activitiesSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>課外活動設定</h1>
						<ul>
                        <?php
                        for($i=0;$i<5;$i++){
							if(count($data_activitiesSet)>$i){								
								$a_checked = $data_activitiesSet[$i]['Activity_Checked']=='1'?'checked':'';
								$a_name = $data_activitiesSet[$i]['Activity_Name'];
								$a_week = $data_activitiesSet[$i]['Activity_Week'];								
								$a_price = $data_activitiesSet[$i]['Activity_Price'];
								$a_cost = $data_activitiesSet[$i]['Activity_Cost'];
							}else{								
								$a_checked = $a_name = $a_week = $a_price = $a_cost = "";
							}
							$key_n = $i+1;
						?>
                            <li><b>課外活動名<?php echo $key_n;?></b>
                                <input name="chk_Activity_Checked_<?php echo $key_n;?>" <?php echo $a_checked;?> class="checkbox01" type="checkbox" value="1"/>
                                <input name="txt_Activity_Name_<?php echo $key_n;?>" type="text" class="txt10" value="<?php echo $a_name;?>" />
                                <select name="select_Activity_Week_<?php echo $key_n;?>" class="select02" >
                                        <option value="">----</option>
                                    <?php foreach ($parameter['WEEK'] as $key =>$val){?>
                                        <option <?php echo $a_week==$key?'selected':'';?> value="<?php echo $key?>"><?php echo $val?></option>
                                    <?php }?>
                                </select>
                                <em>月額</em><input name="txt_Activity_Price_<?php echo $key_n;?>" type="text" class="txt01 Money" value="<?php echo $a_price;?>"><em>円</em>
                                <em>入会金</em><input name="txt_Activity_Cost_<?php echo $key_n;?>" type="text" class="txt01 Money" value="<?php echo $a_cost;?>"><em>円</em>
                            </li>
						<?php
						}
						?>
						</ul>
					</div>
				</div>
				
				<div id="costSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>保育料の設定</h1>
						<div class="datableb10">
							<h3>1号認定</h3>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<td colspan="2">階層区分</td><td class="t01">設定金額</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][1];?></td>
										<td>生活保護世帯</td>
										<td><input name="txt_SetNumber_1" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['0']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][2];?></td>
										<td>市民税非課税世帯</td>
										<td><input name="txt_SetNumber_2" type="text" class="txt01　Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['1']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][3];?></td>
										<td>市民税均等割のみ課税</td>
										<td><input name="txt_SetNumber_3" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['2']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][4];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_4" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['3']['Number'];?>"><em>円</em>
											<select name="select_Condition_4" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['3']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_4" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['3']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][5];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_5" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['4']['Number'];?>"><em>円</em>
											<select name="select_Condition_5" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['4']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_5" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['4']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][6];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_6" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['5']['Number'];?>"><em>円</em>
											<select name="select_Condition_6" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['5']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_6" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['5']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][7];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_7" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['6']['Number'];?>"><em>円</em>
											<select name="select_Condition_7" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['6']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php  echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_7" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['6']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][8];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_8" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['7']['Number'];?>"><em>円</em>
											<select name="select_Condition_8" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['7']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_8" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['7']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][9];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_9" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['8']['Number'];?>"><em>円</em>
											<select name="select_Condition_9" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['8']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_9" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['8']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][10];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_10" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['9']['Number'];?>"><em>円</em>
											<select name="select_Condition_10" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['9']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_10" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['9']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][11];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_11" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['10']['Number'];?>"><em>円</em>
											<select name="select_Condition_11" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['10']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_11" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['10']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][12];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_12" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['11']['Number'];?>"><em>円</em>
											<select name="select_Condition_12" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['11']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_12" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['11']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][13];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_13" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['12']['Number'];?>"><em>円</em>
											<select name="select_Condition_13" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['12']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_13" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['12']['SetNumber'];?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t02"><?php echo $parameter['RECOG_1'][14];?></td>
										<td>市民税所得税割額 
											<input name="txt_Number_14" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['13']['Number'];?>"><em>円</em>
											<select name="select_Condition_14" class="select02" >
													<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_1)){echo $data_costSet_1['13']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':''; }?>  value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>										
											</select>
										</td>
										<td><input name="txt_SetNumber_14" type="text" class="txt01 Money" value="<?php echo empty($data_costSet_1)?'':$data_costSet_1['13']['SetNumber'];?>"><em>円</em></td>
									</tr>
								</tbody>
							</table>
						</div>
						
						
						<div class="datableb10">
							<h3>2・3号認定</h3>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<td rowspan="4" colspan="3">階層区分</td><td class="t03" colspan="4">保育料徴収月額</td>
									</tr>
									<tr>
										<td colspan="2">3歳未満</td><td colspan="2">3歳以上</td>
									</tr>
									<tr>
										<td colspan="2">（3号認定）</td><td colspan="2">（2号認定）</td>
									</tr>
									<tr>
										<td>標準時間</td><td>短時間</td><td>標準時間</td><td>短時間</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][1];?></td>
										<td colspan="2">生活保護世帯</td>
										<td><input name="txt_3_Standard_A" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['0']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_A" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['0']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_A" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['0']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_A" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['0']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][2];?></td>
										<td colspan="2">市町村民税非課税世帯</td>
										<td><input name="txt_3_Standard_B" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['1']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_B" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['1']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_B" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['1']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_B" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['1']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][3];?></td>
										<td rowspan="17" class="t05">市町村民税課税世帯</td>
										<td>均等割額のみ又は所得税額<div class="tdright"><input name="txt_EndPrice_C1" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['2']['EndPrice']?>"><em>円</em>
												<select name="select_Condition_C1" class="select02">
														<option value="">----</option>
												<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
													<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['2']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
												<?php }?>	
												</select>
												</div>
										</td>
										<td><input name="txt_3_Standard_C1" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['2']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C1" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['2']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C1" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['2']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C1" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['2']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][4];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C2" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C2" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C2" class="select02">
																		<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['3']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C2" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C2" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C2" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C2" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['3']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][5];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C3" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C3" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C3" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['4']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C3" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C3" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C3" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C3" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['4']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][6];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C4" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C4" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C4" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['5']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C4" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C4" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C4" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C4" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['5']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][7];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C5" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C5" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C5" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['6']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C5" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C5" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C5" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C5" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['6']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][8];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C6" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C6" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C6" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['7']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C6" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C6" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C6" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C6" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['7']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][9];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C7" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C7" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C7" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['8']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C7" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C7" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C7" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C7" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['8']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][10];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C8" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C8" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C8" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['9']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C8" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C8" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C8" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C8" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['9']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][11];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C9" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C9" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C9" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['10']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C9" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C9" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C9" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C9" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['10']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][12];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C10" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C10" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C10" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['11']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C10" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C10" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C10" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C10" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['11']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][13];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C11" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C11" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C11" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['12']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C11" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C11" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C11" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C11" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['12']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][14];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C12" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C12" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C12" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['13']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C12" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C12" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C12" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C12" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['13']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][15];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C13" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C13" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C13" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['14']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C13" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C13" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C13" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C13" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['14']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][16];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C14" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C14" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C14" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['15']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C14" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C14" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C14" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C14" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['15']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04"><?php echo $parameter['PROJECT'][17];?></td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C15" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C15" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C15" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['16']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C15" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C15" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C15" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C15" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['16']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04">C16</td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C16" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['FromPrice']?>"><em>円</em><span>~</span>
																<input name="txt_EndPrice_C16" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['EndPrice']?>"><em>円</em>
																<select name="select_Condition_C16" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['17']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C16" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C16" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C16" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C16" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['17']['2_Short']?>"><em>円</em></td>
									</tr>
									<tr>
										<td class="t04">C17</td>
										<td>所得割額
											<div class="tdright"><input name="txt_FromPrice_C17" type="text" class="txt02 Money txt022" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['18']['FromPrice']?>"><em>円</em>
																
																<select name="select_Condition_C17" class="select02">
																	<option value="">----</option>
																<?php foreach ($parameter['EQUAL'] as $key =>$val){?>						
																	<option <?php if(!empty($data_costSet_23)){echo $data_costSet_23['18']['Condition']==$key?'selected':'';}else{echo $key==''?'selected':'';}?> value="<?php echo $key?>"><?php echo $val?></option>
																<?php }?>	
																</select>
											</div>
										</td>
										<td><input name="txt_3_Standard_C17" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['18']['3_Standard']?>"><em>円</em></td>
										<td><input name="txt_3_Short_C17" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['18']['3_Short']?>"><em>円</em></td>
										<td><input name="txt_2_Standard_C17" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['18']['2_Standard']?>"><em>円</em></td>
										<td><input name="txt_2_Short_C17" type="text" class="txt02 Money" value="<?php echo empty($data_costSet_23)?'':$data_costSet_23['18']['2_Short']?>"><em>円</em></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div id="classSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>クラス設定</h1>
						<h5><em>1</em><em>2</em><em>3</em><em>4</em><em>5</em></h5>
						<ul>
                        <?php
                        for($i=0;$i<10;$i++){
							if(count($data_classSet)>$i){
								$arr = explode(';', $data_classSet[$i]['Activities']);
								$c_checked = $data_classSet[$i]['Class_Checked']=='1'?'checked':'';
								$c_name = $data_classSet[$i]['Class_Name'];
								$c_remark = $data_classSet[$i]['Class_Remark'];
							}else{
								$arr=array();
								$c_checked = $c_name = $c_remark = "";
							}
							$key = $i+1;
						?>
							<li><span>クラス名</span>
								<b>クラス名<?php echo $key;?></b><input name="chk_Class_Checked_<?php echo $key;?>" <?php echo $c_checked;?> class="checkbox01" type="checkbox" value="1">
								<input name="txt_Class_Name_<?php echo $key;?>" type="text" class="txt10" value="<?php echo $c_name;?>">
								<em>課外活動</em>
                                <input <?php echo in_array('1', $arr)?'checked':'';?> name="chk_Activities_<?php echo $key;?>[]" class="checkbox01" type="checkbox" value="1">
                                <input <?php echo in_array('2', $arr)?'checked':'';?> name="chk_Activities_<?php echo $key;?>[]" class="checkbox01" type="checkbox" value="2">
                                <input <?php echo in_array('3', $arr)?'checked':'';?> name="chk_Activities_<?php echo $key;?>[]" class="checkbox01" type="checkbox" value="3">
                                <input <?php echo in_array('4', $arr)?'checked':'';?> name="chk_Activities_<?php echo $key;?>[]" class="checkbox01" type="checkbox" value="4">
                                <input <?php echo in_array('5', $arr)?'checked':'';?> name="chk_Activities_<?php echo $key;?>[]" class="checkbox01" type="checkbox" value="5">
                                <em>備考</em><input name="txt_Class_Remark_<?php echo $key;?>" type="text" class="txt03" style="width:260px;" value="<?php echo $c_remark;?>">
							</li>
						<?php
						}
						?>
						</ul>
					</div>
				</div>
				<div id="overCostSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>延長保育料設定</h1>
						<div class="tabright tabright01">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="t01">1号認定 延長保育料設定</td><td class="t02">設定単価</td><td>備考</td></tr>
								</thead>
								<tbody>
									<tr>
										<td class="t01"><input name="chk_Recog_1_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_1_Select']=='1'?'checked':'';}?> class="checkbox01" type="checkbox" value="1"><em>日額</em></td>
										<td><input name="txt_Recog_1_DayPrice" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_DayPrice']?>"><em>円</em></td>
										<td><input name="txt_Recog_1_DayPrice_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_DayPrice_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><input name="chk_Recog_1_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_1_Select']=='2'?'checked':'';}?> class="checkbox01" type="checkbox" value="2"><em>月額</em></td>
										<td><input name="txt_Recog_1_MonPrice" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_MonPrice']?>"><em>円</em></td>
										<td><input name="txt_Recog_1_MonPrice_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_MonPrice_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><input name="chk_Recog_1_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_1_Select']=='3'?'checked':'';}?> class="checkbox01" type="checkbox" value="3"><em>保育料率</em></td>
										<td><input name="txt_Recog_1_Rata" type="text" class="txt01" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_Rata']?>"><em>%</em></td>
										<td><input name="txt_Recog_1_Rata_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_Rata_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><em style="padding-left:150px;">上限値</em></td>
										<td><input name="txt_Recog_1_Limit" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_Limit']?>"><em>円</em></td>
										<td><input name="txt_Recog_1_Limit_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_1_Limit_Remark']?>"></td>
									</tr>
								</tbody>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="t01">2,3号認定 延長保育料設定</td><td class="t02">設定単価</td><td>備考</td></tr>
								</thead>
								<tbody>
									<tr>
										<td class="t01"><input name="chk_Recog_2_3_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_2_3_Select']=='1'?'checked':'';}?> class="checkbox01" type="checkbox" value="1"><em>日額</em></td>
										<td><input name="txt_Recog_2_3_DayPrice" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_DayPrice']?>"><em>円</em></td>
										<td><input name="txt_Recog_2_3_DayPrice_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_DayPrice_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><input name="chk_Recog_2_3_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_2_3_Select']=='2'?'checked':'';}?> class="checkbox01" type="checkbox" value="2"><em>月額</em></td>
										<td><input name="txt_Recog_2_3_MonPrice" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_MonPrice']?>"><em>円</em></td>
										<td><input name="txt_Recog_2_3_MonPrice_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_MonPrice_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><input name="chk_Recog_2_3_Select" <?php if(!empty($data_overCostSet)){echo $data_overCostSet['0']['Recog_2_3_Select']=='3'?'checked':'';}?> class="checkbox01" type="checkbox" value="3"><em>保育料率</em></td>
										<td><input name="txt_Recog_2_3_Rata" type="text" class="txt01" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_Rata']?>"><em>%</em></td>
										<td><input name="txt_Recog_2_3_Rata_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_Rata_Remark']?>"></td>
									</tr>
									<tr>
										<td class="t01"><em style="padding-left:150px;">上限値</em></td>
										<td><input name="txt_Recog_2_3_Limit" type="text" class="txt01 Money" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_Limit']?>"><em>円</em></td>
										<td><input name="txt_Recog_2_3_Limit_Remark" type="text" class="txt01" style="width:550px;" value="<?php echo empty($data_overCostSet)?'':$data_overCostSet['0']['Recog_2_3_Limit_Remark']?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			
				<div id="projectCostSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>保護者請求項目の単価設定</h1>
						<P>
							<input type="button" value="基 本 請 求 項 目 の 追 加" onClick="addLine('ProjectCost')" />
                            <input type="button" value="チ ェ ッ ク し た 項 目 の 削 除" onClick="delLine('ProjectCost')"/>
						</P>
						<div class="tabright tabright01">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="intb"></td>
										<td class="t011">基本請求項目</td>
										<td>1号認定</td>
										<td>2号認定</td>
										<td>3号認定</td>
										<td class="tb01">備考</td>
									</tr>
								</thead>
								<tbody id="ProjectCost">
								<?php if(empty($data_projectCostSet)){?>
									<tr><td class="intb"></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<tr><td class="intb"><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""></td>
										<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value=""></td>
										<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value=""></td>
									</tr>
									<?php }else{?>
											<?php foreach ($data_projectCostSet as $key =>$val){?>
												<tr><td class="intb" <?php if($key<2){ echo 'style="background-color:#FFFFFF;"';}?>><?php if($key>1){?><input name="chk_Project_Delete[]" class="checkbox01" type="checkbox" value=""><?php }?></td>
													<td class="t011" ><input name="txt_Project_Name[]" type="text" class="txt01" style="width:150px;" value="<?php echo $val['Project_Name']?>"></td>
													<td><input name="txt_Recog_1[]" type="text" class="txt01 Money" value="<?php echo $val['Recog_1']?>"><em>円</em></td>
													<td><input name="txt_Recog_2[]" type="text" class="txt01 Money" value="<?php echo $val['Recog_2']?>"><em>円</em></td>
													<td><input name="txt_Recog_3[]" type="text" class="txt01 Money" value="<?php echo $val['Recog_3']?>"><em>円</em></td>
													<td><input name="txt_Project_Remark[]" type="text" class="txt01" style="width:250px;" value="<?php echo $val['Project_Remark']?>"></td>
												</tr>
												
									<?php } }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div id="goodsCostSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>用品単価設定</h1>
						<P>
							<input type="button" value="用 品 の 追 加" onClick="addLine('Goods')" />
                            <input type="button" value="チ ェ ッ ク し た 項 目 の 削 除" onClick="delLine('Goods')" />
						</P>
						<div class="tabright tabright01">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" >                      
								<thead>
									<tr><td class="intb"></td><td class="t01">用品名</td><td class="t012">単価</td><td class="t013">備考</td></tr>
								</thead>
								<tbody id="Goods">
									<?php 
                                    if(empty($data_goodsCostSet)){
										for($i=0;$i<10;$i++){
                                    ?>                                
									<tr>
                                    	<td class="intb">
                                        	<input name="chk_GoodsDelete[]" class="checkbox01" type="checkbox" value="">
                                        </td>
										<td class="t01"><input name="txt_Goods_Name[]" type="text" class="txt01" style="width:50%;" value=""></td>
										<td><input name="txt_Goods_Price[]" type="text" class="txt01 Money" value=""><em>円</em></td>
										<td class="t013"><input name="txt_Goods_Remark[]" type="text" class="txt01" style="width:400px;" value=""></td>
                                        <td style="background:#FFF;">
                                        	<input type="button" class="tbut05 file_Goods_Btn" value="用品イメージの添付" />
                                            <input type="hidden" name="file_Goods_Picture[]" value="" >
                                        </td>
                                        
									</tr>
									<?php 
										}
									}else{
										foreach ($data_goodsCostSet as $key =>$val){
									?>
                                    <tr>
                                    	<td class="intb">
                                        	<input name="chk_GoodsDelete[]" class="checkbox01" type="checkbox" value="">
                                        </td>
                                        <td class="t01"><input name="txt_Goods_Name[]" type="text" class="txt01" style="width:50%;" value="<?php echo $val['Goods_Name']?>"></td>
                                        <td><input name="txt_Goods_Price[]" type="text" class="txt01 Money" value="<?php echo $val['Goods_Price']?>"><em>円</em></td>
                                        <td class="t013"><input name="txt_Goods_Remark[]" type="text" class="txt01" style="width:40%;" value="<?php echo $val['Goods_Remark']?>"></td>
                                        <td style="background:#FFF;">
                                        	<input type="button" class="tbut05 file_Goods_Btn" value="用品イメージの添付" />
                                            <input type="hidden" name="file_Goods_Picture[]" value="<?php echo $val['Goods_Picture'];?>" >
                                        </td>
                                    </tr>			
									<?php 
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div id="eatCostSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>給食費設定</h1>
						<div class="tabright tabright01">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="intb"></td>
										<td class="t012">1号認定</td>
										<td class="t012">2号認定</td>
										<td class="t012">3号認定</td>
										<td class="t013">備考</td>
									</tr>
								</thead>
								<tbody>
									<tr><td class="intb"></td>
										<td class="t012"><input name="txt_Recog_1_Price" type="text" class="txt01 Money" value="<?php echo empty($data_eatCostSet)?'':$data_eatCostSet['0']['Recog_1_Price']?>"><em>円</em></td>
										<td><input name="txt_Recog_2_Price" type="text" class="txt01 Money" value="<?php echo empty($data_eatCostSet)?'':$data_eatCostSet['0']['Recog_2_Price']?>"><em>円</em></td>
										<td><input name="txt_Recog_3_Price" type="text" class="txt01 Money" value="<?php echo empty($data_eatCostSet)?'':$data_eatCostSet['0']['Recog_3_Price']?>"><em>円</em></td>
										<td><input name="txt_EatCost_Remark" type="text" class="txt01" style="width:320px;" value="<?php echo empty($data_eatCostSet)?'':$data_eatCostSet['0']['EatCost_Remark']?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div id="kidsLessSet" class="bgbox01">
					<div class="datelist datelist10">
						<h1>多子軽減設定<em>※対象の保育料に対して"かかる率"とその端数の設定</em></h1>
						<div class="tabright tabright01">
							<h3>第2子割引</h3>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="t012"></td><td class="t012">1号認定</td><td class="t012">2号認定</td><td class="t012">3号認定</td><td class="t013">備考</td></tr>
								</thead>
								<tbody>
									<tr>
										<td class="t012"><i>割引率</i></td>
										<td class="t012"><input name="txt_Less2_Recog1_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less2_Recog1_Rata']?>"><em>%</em>
										<select name="select_Less2_Recog1_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less2_Recog1_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less2_Recog2_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less2_Recog2_Rata']?>"><em>%</em>
										<select name="select_Less2_Recog2_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less2_Recog2_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less2_Recog3_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less2_Recog3_Rata']?>"><em>%</em>
										<select name="select_Less2_Recog3_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less2_Recog3_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less2_Remark" type="text" class="txt01" style="width:150px;" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less2_Remark']?>"></td>
									</tr>
								</tbody>
							</table>
							<h3>第3子以降割引</h3>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr><td class="t012"></td><td class="t012">1号認定</td><td class="t012">2号認定</td><td class="t012">3号認定</td><td class="t013">備考</td></tr>
								</thead>
								<tbody>
									<tr>
										<td class="t012"><i>割引率</i></td>
										<td class="t012"><input name="txt_Less3_Recog1_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less3_Recog1_Rata']?>"><em>%</em>
										<select name="select_Less3_Recog1_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less3_Recog1_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less3_Recog2_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less3_Recog2_Rata']?>"><em>%</em>
										<select name="select_Less3_Recog2_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less3_Recog2_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less3_Recog3_Rata" type="text" class="txt11" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less3_Recog3_Rata']?>"><em>%</em>
										<select name="select_Less3_Recog3_Round" class="select02">
											<option value="">----</option>
										<?php foreach ($parameter['ROUND'] as $key=>$val ){?>
											<option <?php if(!empty($data_kidsLessSet)){echo $data_kidsLessSet['0']['Less3_Recog3_Round']==$key?'selected':'';}else{echo $key==''?'selected':''; }?> value="<?php echo $key?>"><?php echo $val?></option>
										<?php }?>
										</select></td>
										<td><input name="txt_Less3_Remark" type="text" class="txt01" style="width:150px;" value="<?php echo empty($data_kidsLessSet)?'':$data_kidsLessSet['0']['Less3_Remark']?>"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<div id="guardianCon" class="bgbox01">
					<div class="datelist datelist10">
						<h1>保護者連絡受付設定</h1>
						<ul>
							<li><b style="width:140px;">連絡の受付期限</b><input name="txt_Acceptance_Data" type="text" class="txt033" value="<?php echo empty($data_guardianCon)?'':$data_guardianCon['0']['Acceptance_Data'];?> "></li>
							<li class="tt01"><b style="width:140px;">受付期限備考</b><textarea name="txt_Acceptance_Remark" class="textarea011" name="" cols="20" rows="5"><?php echo empty($data_guardianCon)?'':$data_guardianCon['0']['Acceptance_Remark'];?></textarea></li>
						</ul>
					</div>
				</div>
                
				<div id="temporary" class="bgbox01">
					<div class="datelist datelist10">

							<h1>一時預かり事業(幼稚園型)実績報告書設定</h1>
							<ul>
								<li><strong>設置主体所在地</strong></li>
								<li><input name="txt_BasedAddress" type="text" class="txt03" value="<?php echo empty($data_temporary)?'':$data_temporary[0]['BasedAddress'];?>"></li>
								<li><strong>設置主体名称</strong></li>
								<li><input name="txt_BasedName" type="text" class="txt03" value="<?php echo empty($data_temporary)?'':$data_temporary[0]['BasedName'];?>"></li>
								<li><strong>代表者職</strong>
                                	<strong>代表者氏名</strong>
                                    <strong>実績報告書の宛先</strong></li>
								<li><input name="txt_RepresentativeOffice" type="text" class="txt01" style="width:120px;margin-right:25px;" value="<?php echo empty($data_temporary)?'':$data_temporary[0]['RepresentativeOffice'];?>">
                                	<input name="txt_RepresentativeName" type="text" class="txt01" style="width:120px;margin-right:25px;" value="<?php echo empty($data_temporary)?'':$data_temporary[0]['RepresentativeName'];?>">
                                    <input name="txt_ReportDestination" type="text" class="txt01" value="<?php echo empty($data_temporary)?'':$data_temporary[0]['ReportDestination'];?>"></li>
								<li><textarea class="ttxt10" style="width:90%;margin-top:10px;" name="txt_ReportRemark"><?php echo empty($data_temporary)?'':$data_temporary[0]['ReportRemark'];?></textarea>	</li>
							</ul>

						<div class="clear"></div>
					</div>					
				</div>
				
				<div class="bgbox01" id="other_set">
						<div class="datelist datelist10">
							<h1>その他設定</h1>
								<ul>
									<li><strong>年号の設定</strong></li>
									<li><input type="text" name="txt_Reign_Title" class="txt01" value="<?php echo empty($data_calendar)?'':$data_calendar[0]['Reign_Title'];?>"><em>開始する西暦</em><input type="text" name="txt_Calendar_Year" class="txt01" style="width:100px;" value="<?php echo empty($data_calendar)?'':$data_calendar[0]['Calendar_Year'];?>"><em>年</em></li>
								</ul>
						</div>
				</div>
				
				
			</div>
			</form>
	</div>
<script type="text/javascript">
//上传文件使用

var fileParameter = '<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('administrator/saveImages').URL::query();?>';
$(function(){
	$('input[name="chk_Recog_1_Select"]').on('click',this,function(){
		if($(this).prop('checked')){
			$('input[name="chk_Recog_1_Select"]').not(this).prop('checked',false);
		}
	});
	$('input[name="chk_Recog_2_3_Select"]').on('click',this,function(){
		if($(this).prop('checked')){
			$('input[name="chk_Recog_2_3_Select"]').not(this).prop('checked',false);
		}
	});
	$('#Goods').on('click','.file_Goods_Btn',function(){
		$('#Goods .curGoodsAddPic').removeClass();
		$(this).parents('tr:first').addClass('curGoodsAddPic');
		var goodsPic = $('.curGoodsAddPic').find('input[name="file_Goods_Picture[]"]').val();
		var goodsName = $('.curGoodsAddPic').find('input[name="txt_Goods_Name[]"]').val();
		addOverlay(1200,1200,'<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('administration/goodsImages?goodsName=');?>'+goodsName+'&goodsPic='+goodsPic);
	});

	$('.Money').each(function(){
		    $this=$(this);
		    $this.val(toThousands($this.val()))
		});
	
	$('.Money').change(function(){
			$(this).val(toThousands($(this).val()));
		});
		
});
function formMainSave(){
	//灰化保存按钮，在保存确认对话框关闭之前
	$('#btn_Save').attr('disabled',"true");

	var Data = new FormData($("#formMain" )[0]);  
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('administration/dataSet_Insert');?>",
		   async: false,  
	       cache: false,  
	       contentType: false,  
	       processData: false,
		   dataType: 'json',
		   data: Data,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){		 
			addSaveOverlay(1000,400,json['result']);		
				//alert(json['result']);	   
		   }
		});	
}

function addLine(obj){	
	var target="#"+obj;
	var tr='';
	if(obj=='ProjectCost')	{
		tr += '	<tr><td class="intb"><input name="chk_Delete" class="checkbox01" type="checkbox" value="">';
		tr += ' 	</td>';
		tr += '   	<td class="t011" >';
		tr += '			<input name="txt_Project_Name[]"'; 
		tr += '  type="text" class="txt01" style="width:150px;" value="" >';				
		tr += ' 	</td>';
		tr += '		<td><input name="txt_Recog_1[]"';
		tr += '  type="text" class="txt01 Money"  value="" ><em>円</em></td>';
		tr += '		<td><input name="txt_Recog_2[]"';
		tr += '  type="text" class="txt01 Money"  value="" ><em>円</em></td>';
		tr += '		<td><input name="txt_Recog_3[]';
		tr += '"  type="text" class="txt01 Money"  value="" ><em>円</em></td>';
		tr += '		<td><input name="txt_Project_Remark[]';
		tr += '"  type="text" class="txt01" style="width:250px;" value="" ></td>';				
		tr += '	</tr>';
	}
	if(obj=='Goods'){
		tr +='<tr><td class="intb"><input name="chk_GoodsDelete[]" class="checkbox01" type="checkbox" value=""></td>';
		tr +='	<td class="t01"><input name="txt_Goods_Name[]" type="text" class="txt01" style="width:50%;" value=""></td>';
		tr +='	<td><input name="txt_Goods_Price[]" type="text" class="txt01 Money" value=""><em>円</em></td>';
		tr +='	<td class="t013"><input name="txt_Goods_Remark[]" type="text" class="txt01" style="width:40%;" value=""></td>';
		tr +='	<td style="background:#FFF;"><input type="button" class="tbut05 file_Goods_Btn" value="用品イメージの添付" /><input type="hidden" name="file_Goods_Picture[]" value="" ></td>';
		tr +='</tr>'
	}				
	$(target).append(tr);			
}
function delLine(obj)
{
	$("#"+obj).find('input[type="checkbox"]:checked').parents("tr").remove();
}
function goDiv(div) {
	var a = $("#"+div).offset().top;
	$("html,body").animate({scrollTop:a-250}, 'slow'); 
}

$(function(){
	$('#activitiesSet input[type="checkbox"]').on('click',this,function(){
		activitiesCanCheck();
	});
	activitiesCanCheck();
});
function activitiesCanCheck(){
	var canCheck = []
	var key = 0;
	$('#activitiesSet input[type="checkbox"]').each(function(index, element) {
		if($(this).prop('checked')){
			canCheck[key] = index+1; 
			key++;
		}
    });
	
	$('#classSet li').each(function(index, element) {
		$(this).find('input[type="checkbox"]').each(function(index, element) {
			if(index!=0){
				if($.inArray(index, canCheck)!=-1){
					$(this).prop('disabled',false);
				}else{
					$(this).prop({'disabled':true,'checked':false});
				}
			}
        });
    });
}
</script>	
<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>     
</body>
</html>