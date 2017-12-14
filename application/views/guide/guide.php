<?php
echo View::factory('public/head');
?>
<body>
 	<?php
	$NAME = Session::instance()->get('NAME');
	$LASTLOGINTIME = Session::instance()->get('LASTLOGINTIME');
	?>
	<div class="headerbox01">
		<div class="mtop"><span>こども園トータルマネジメントシステム</span><?php if(!empty($NAME)) echo "ようこそ {$NAME}さん";?></div>
		<div class="logo">
			<a href="<?php echo URL::site('index/index');?>"><img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>" class="left logoimg"></a>
			<div class="topright topright01 right">
				<p><a href="<?php echo URL::site('list/listall')?>"><input type="button" value="園児一覧に戻る" /></a></p>
			</div>
			<div id="buttonY" class="topright topright01 right">
				<p><input type="button" value="保 存" onclick="formSubmitY()"/></p>
			</div>
			<div id="buttonM" class="topright topright01 right" style="display:none">
				<p><input type="button" value="保 存" onclick="formSubmitM()"/></p>
			</div>
			<div id="buttonW" class="topright topright01 right" style="display:none">
				<p><input type="button" value="保 存" onclick="formSubmitW()"/></p>
			</div>
			<div class="topright topright01 right">
				<p id = PDF_Y><a href="<?php echo URL::site('guide/guide_yearPDF').URL::query(array('Select_group_year'=>$Select_group_year));?>"><input type="button" value="PDFに出力" /></a></p>
				<p id = PDF_M style="display:none"><a href = "<?php echo URL::site('guide/guide_monthPDF').URL::query(array('Select_group_month'=>$Select_group_month));?>"><input type="button" value="PDFに出力" /></a></p>
				<p id = PDF_W style="display: none"><a href = "<?php echo URL::site('guide/guide_weekPDF').URL::query(array('Select_group_week'=>$Select_group_week));?>"><input type="button" value="PDFに出力" /></a></p>
			</div>
		</div>
	</div>
	<form id = "MainForm">
	<div class="mainbox">
		<div class="xdatelist8" style="height:50px;">
			<div class="datelist right">
				<ul>
					<li>
					<?php
                      list($Y,$m,$d) = explode('-',$yearMonDay);
					?>
						<span>作成日</span>
						<input type="text" name='txt_Com_Y' class="txt01 " style="width:100px;" value="<?php echo $Y;?>" />
						<em>年</em>
						<select name="select_Com_M" class="select01" >
						<?php foreach ($months as $key=>$val){?>
							<option <?php echo $val==$m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
						<?php }?>
						</select>
						<em>月</em>
						<select name="select_Com_D" class="select01" >
						<?php foreach ($days as $key=>$val){?>
							<option <?php echo $val==$d?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
						<?php }?>
						</select>
						<em>日</em>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>
					<li id='li_Y' class="cn"><a href="javascript:switchTab('Y')">年間指導計画</a></li>
					<li id='li_M'><a href="javascript:switchTab('M')">月間指導計画</a></li>
					<li id='li_W'><a href="javascript:switchTab('W')">週間指導計画</a></li>
				</ul>
			</div>
			
			<div id="Y_guide" class="maintable maintable21 fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td colspan="2">
								<select name="select_Year" class="select21" >
								<?php for($i=2000;$i<=date('Y');$i++){?>	
									<option  value="<?php echo $i?>"<?php if($i == $Y_guide_y)echo 'selected'?>><?php echo $i?></option>
								<?php }?>
								</select>
								
								<em>年 度</em>
								<em><?php echo empty($parameter['BASE_INFO']['Kindergarden_Info'])?'':$parameter['BASE_INFO']['Kindergarden_Info']['Kindergarden_Name2'];?></em>
								<em>年 間 指 導 計 画</em>
								【<select name="select_Age" class="select21" ><?php foreach($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option value="<?php echo $key?>"<?php if($key==$Y_guide_age){echo 'selected';}?>><?php echo $val?></option>
								<?php }?></select>
								<em>歳 児</em>
								<select name="select_Class" class="select21" ><?php foreach($parameter['BASE_INFO']['CLASS'] as $key =>$val) {?>
									<option  value="<?php echo $key?>" <?php if($key==$Y_guide_class){echo 'selected';}?>><?php echo $val?></option>
									<?php }?>
									</select>
								<em>組</em>】
							</td>
							<td class="t1">園長</td>
							<td class="t1">副園長</td>
							<td class="t1">担当</td>
						</tr>
					</thead>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td colspan="2">年間目標</td>
							<td colspan="6"><input name='txt_Year_Title' type="text" class="txt01"style="width:95%;" value="<?php  echo empty($guideList_year)?'':$data_year['txt_Year_Title']?>" /></td>
							<td>年間評価・<br/>改善</td>
							<td colspan="5"><input  name='txt_Year_Valuation' type="text" class="txt01"style="width:95%;" value="<?php  echo empty($guideList_year)?'':$data_year['txt_Year_Valuation']?>" /></td>
						</tr>
						<tr>
							<td colspan="2">期</td>
							<td colspan="3">Ⅰ期(4月～6月)</td>
							<td colspan="3">Ⅱ期(7月～9月)</td>
							<td colspan="3">Ⅲ期(10月～12月)</td>
							<td colspan="3">Ⅳ期(1月～3月)</td>
						</tr>
						<tr>
							<td colspan="2">月</td>
							<td>4月</td>
							<td>5月</td>
							<td>6月</td>
							<td>7月</td>
							<td>8月</td>
							<td>9月</td>
							<td>10月</td>
							<td>11月</td>
							<td>12月</td>
							<td>1月</td>
							<td>2月</td>
							<td>3月</td>
						</tr>
						<tr>
							<td colspan="2">月主題</td>
							<td><input name='txt_Month_Title[0]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][0]?>" /></td>
							<td><input name='txt_Month_Title[1]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][1]?>" /></td>
							<td><input name='txt_Month_Title[2]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][2]?>" /></td>
							<td><input name='txt_Month_Title[3]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][3]?>" /></td>
							<td><input name='txt_Month_Title[4]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][4]?>" /></td>
							<td><input name='txt_Month_Title[5]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][5]?>" /></td>
							<td><input name='txt_Month_Title[6]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][6]?>" /></td>
							<td><input name='txt_Month_Title[7]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][7]?>" /></td>
							<td><input name='txt_Month_Title[8]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][8]?>" /></td>
							<td><input name='txt_Month_Title[9]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][9]?>" /></td>
							<td><input name='txt_Month_Title[10]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][10]?>" /></td>
							<td><input name='txt_Month_Title[11]' type="text" class="txt01"style="width:65px;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][11]?>" /></td>
						</tr>
						<tr>
							<td colspan="2">ねらい</td>
							<td colspan="3"><input name='txt_Target[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Target'][0]?>" /></td>
							<td colspan="3"><input name='txt_Target[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Target'][1]?>" /></td>
							<td colspan="3"><input name='txt_Target[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Target'][2]?>" /></td>
							<td colspan="3"><input name='txt_Target[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Target'][3]?>" /></td>
						</tr>
						<tr>
							<td rowspan="2">養護</td>
							<td>生命</td>
							
							<td colspan="3"><input name ='txt_Life[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Life'][0]?>"" /></td>
							<td colspan="3"><input name ='txt_Life[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Life'][1]?>" /></td>
							<td colspan="3"><input name ='txt_Life[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Life'][2]?>" /></td>
							<td colspan="3"><input name ='txt_Life[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Life'][3]?>" /></td>
						</tr>
						<tr>
							<td>情緒</td>
							
							<td colspan="3"><input name = 'txt_Feel[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Feel'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Feel[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Feel'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Feel[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Feel'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Feel[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Feel'][3]?>" /></td>
						</tr>
						<tr>
							<td rowspan="5">教育</td>
							<td>健康</td>
							
							<td colspan="3"><input name = 'txt_Health[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Health'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Health[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Health'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Health[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Health'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Health[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Health'][3]?>" /></td>
							
						</tr>
						<tr>
							<td>人間関係</td>
							<td colspan="3"><input name = 'txt_Relationship[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Relationship[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Relationship[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Relationship[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][3]?>" /></td>
						</tr>
						<tr>
							<td>環境</td>		
							<td colspan="3"><input name = 'txt_Environment[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Environment'][0]?>" /></td> 
							<td colspan="3"><input name = 'txt_Environment[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Environment'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Environment[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Environment'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Environment[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Environment'][3]?>" /></td>
							
						</tr>
						<tr>
							<td>言葉</td>
							<td colspan="3"><input name = 'txt_Speak[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Speak'][0]?>" /></td>						
							<td colspan="3"><input name = 'txt_Speak[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Speak'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Speak[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Speak'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Speak[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Speak'][3]?>" /></td>
						
						</tr>
						<tr>
							<td>表現</td>
							
							<td colspan="3"><input name = 'txt_Performance[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Performance'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Performance[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Performance'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Performance[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Performance'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Performance[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Performance'][3]?>" /></td>
							
						</tr>
						<tr>
							<td colspan="2">保育者の留意点・環境構成</td>					
							<td colspan="3"><input name = 'txt_Attention[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Attention'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Attention[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Attention'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Attention[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Attention'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Attention[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Attention'][3]?>" /></td>
						</tr>
						<tr>
							<td colspan="2">行事</td>
							<td colspan="3"><input name = 'txt_Dothings[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Dothings[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Dothings[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Dothings[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][3]?>" /></td>
						</tr>
						<tr>
							<td colspan="2">保育士の自己評価</td>					
							<td colspan="3"><input name = 'txt_Self_Valuation[0]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][0]?>" /></td>
							<td colspan="3"><input name = 'txt_Self_Valuation[1]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][1]?>" /></td>
							<td colspan="3"><input name = 'txt_Self_Valuation[2]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][2]?>" /></td>
							<td colspan="3"><input name = 'txt_Self_Valuation[3]' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][3]?>" /></td>
						</tr>
					</tbody>
				</table>
				
			</div>
			
			
			
			<!-- 月计划 -->
			<div id="M_guide" style="display:none" class="maintable maintable21 fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td colspan="2">
								<select name="select_Year" class="select21" >
									<?php for($i=2000;$i<=$Y;$i++){?>	
									<option  value="<?php echo $i?>"<?php if($i == $M_guide_y)echo 'selected'?>><?php echo $i?></option>
									<?php }?>
								</select>
								<em>年度</em>
								<select name="select_Month" style="width:60px;" class="select21" >
									<?php foreach ($months as $key=>$val){?>
									<option <?php echo $val==$M_guide_m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
									<?php }?>
								</select>
								<em>月</em>
								<em><?php echo empty($parameter['BASE_INFO']['Kindergarden_Info'])?'':$parameter['BASE_INFO']['Kindergarden_Info']['Kindergarden_Name2'];?></em>
								<em>月間指導計画</em>
								【<select name="select_Age" class="select21" style="width:40px" >
								<?php foreach($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option value="<?php echo $key?>"<?php if($key==$M_guide_age){echo 'selected';}?>><?php echo $val?></option>
								<?php }?>
								</select>
								<em>歳児</em>
								<select  name="select_Class" class="select21"  style="width:120px">
									
									<?php foreach($parameter['BASE_INFO']['CLASS'] as $key =>$val) {?>
									<option  value="<?php echo $key?>"<?php if($key==$M_guide_class){echo 'selected';}?> ><?php echo $val?></option>
									<?php }?>
								</select>
								<em>組</em>】
							</td>
							<td class="t1">園長</td>
							<td class="t1">副園長</td>
							<td class="t1">担当</td>
						</tr>
					</thead>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td colspan="2">子どもの姿</td>
							<td><textarea name='txt_Child_Status' rows="2" cols="20"><?php echo  empty($guideList_month)?'':$data_month['txt_Child_Status'];?></textarea></td>
							<td>ねらい</td>
							<td colspan="2">
							<textarea name='txt_Target' rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Target']?></textarea>
							</td>
							<td>月主題</td>
							<td><textarea name="txt_Month_Title" rows="2" cols="20"><?php  echo empty($guideList_month)?(empty($M_guideList_year)?'':$M_data_year['txt_Month_Title'][$relmonth]):$data_month['txt_Month_Title']?></textarea></td>
							<td>行事</td>
							<td><textarea name="txt_Dothings" rows="2" cols="20"><?php  echo empty($guideList_month)?'':$data_month['txt_Dothings']?></textarea></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td colspan="3">内容</td>
							<td colspan="3">配慮事項・環境構成</td>
							<td colspan="2">保育者の連携</td>
						</tr>
						<tr>
							<td rowspan="2">養護</td>
							<td>生命の保持</td>
							<td colspan="3" rowspan="2"><textarea name='txt_Cure_Content' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Cure_Content']?></textarea></td>
							<td colspan="3" rowspan="2"><textarea name='txt_Cure_Environment' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Cure_Environment']?></textarea></td>
							<td colspan="2" rowspan="3"><textarea name='txt_Teacher_Cooperation' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Teacher_Cooperation']?></textarea></td>
						</tr>
						<tr>
							<td>情緒の安定</td>
						</tr>
						<tr>
							<td rowspan="6">教育</td>
							<td>健康</td>
							<td colspan="3" rowspan="5"><textarea name='txt_Education_Content' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Education_Content']?></textarea></td>
							<td colspan="3" rowspan="5"><textarea name='txt_Education_Environment' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Education_Environment']?></textarea></td>
						</tr>
						<tr>
							<td>人間関係</td>
							<td colspan="2">保護者支援</td>
						</tr>
						<tr>
							<td>環境</td>
							<td colspan="2" rowspan="3"><textarea name='txt_Parents_Support' rows="3" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Parents_Support']?></textarea></td>
						</tr>
						<tr>
							<td>言葉</td>
						</tr>
						<tr>
							<td>表現</td>
						</tr>
						<tr>
							<td>統合保育</td>
							<td colspan="3"><input name='txt_Together_Content' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_month)?'':$data_month['txt_Together_Content']?>" /></td>
							<td colspan="3"><input name='txt_Together_Environment' type="text" class="txt01"style="width:95%;" value="<?php echo empty($guideList_month)?'':$data_month['txt_Together_Environment']?>" /></td>
							<td colspan="2">地域の子育て支援</td>
						</tr>
						<tr>
							<td colspan="2">健康・安全</td>
							<td colspan="3"><textarea name='txt_Safe_Content' rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Safe_Content']?></textarea></td>
							<td colspan="3"><textarea name='txt_Safe_Environment' rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Safe_Environment']?></textarea></td>
							<td colspan="2" rowspan="2"><textarea name='txt_Area_Support' rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Area_Support']?></textarea></td>
						</tr>
						<tr>
							<td colspan="2">食育</td>
							<td colspan="3"><textarea name='txt_Eat' rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Eat']?></textarea></td>
							<td>評価・改善</td>
							<td colspan="2"><textarea name='txt_Valuation'  rows="2" cols="20"><?php echo empty($guideList_month)?'':$data_month['txt_Valuation']?></textarea></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<!-- 周计划 -->
			
			<div id="W_guide" style="display:none" class="maintable maintable21 fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td colspan="2">
								<select name="select_Year" class="select21" >
									<?php for($i=2000;$i<=date('Y');$i++){?>	
									<option  value="<?php echo $i?>"<?php if($i == $W_guide_y)echo 'selected'?>><?php echo $i?></option>
									<?php }?>
								</select>
								<em>年 度</em>
								<select name="select_Month" style="width:60px;" class="select21" >
									<?php foreach ($months as $key=>$val){?>
									<option <?php echo $val==$W_guide_m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
									<?php }?>
								</select>
								<em>月</em>
								<select name="select_Week" style="width:40px;" class="select21" >
								<?php for($i=1;$i<=5;$i++){?>
								<option value="<?php echo $i?>"<?php echo $i==$W_guide_w?'selected':''?>><?php echo $i?></option>
								<?php }?>
								</select>
								<em>週</em>
								<em><?php echo empty($parameter['BASE_INFO']['Kindergarden_Info'])?'':$parameter['BASE_INFO']['Kindergarden_Info']['Kindergarden_Name2'];?></em>
								<em>週間指導計画</em>
								【<select name="select_Age" class="select21" style="width:40px" >
								<?php foreach($parameter['AGE']['AgeY'] as $key =>$val) {?>
								<option value="<?php echo $key?>"<?php if($key==$W_guide_age){echo 'selected';}?>><?php echo $val?></option>
								<?php }?>
								</select>
								<em>歳児</em>
								<select  name="select_Class" class="select21" style="width:120px" >
									
									<?php foreach($parameter['BASE_INFO']['CLASS'] as $key =>$val) {?>
									<option  value="<?php echo $key?>"<?php if($key==$W_guide_class){echo 'selected';}?>><?php echo $val?></option>
									<?php }?>
								</select>
								<em>組</em>】
							</td>
							<td class="t1">園長</td>
							<td class="t1">副園長</td>
							<td class="t1">担当</td>
						</tr>
					</thead>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="t2">年主題</td><td><input name='txt_Year_Title'type="text" class="txt01"style="width:98%;" value="<?php  echo empty($guideList_week)?(empty($W_guideList_year)?'':$W_data_year['txt_Year_Title']):$data_week['txt_Year_Title']?>" /></td>
						</tr>
						<tr>
							<td class="t2">月主題</td><td><input name="txt_Month_Title" type="text" class="txt01"style="width:98%;" value="<?php  echo empty($guideList_week)?(empty($W_guideList_year)?'':$W_data_year['txt_Month_Title'][$relmonth_W]):$data_week['txt_Month_Title']?>" /></td>
						</tr>
						<tr>
							<td class="t2">週</td><td><input name='txt_Week_Title' type="text" class="txt01"style="width:98%;" value="<?php echo empty($data_week)?'':$data_week['txt_Week_Title']?>" /></td>
						</tr>
						<tr> 
							<td class="t2">ねらい</td><td><input name='txt_Week_Target' type="text" class="txt01"style="width:98%;" value="<?php echo empty($data_week)?'':$data_week['txt_Week_Target']?>" /></td>
						</tr>
						<tr>
							<td class="t2">子どもの姿</td><td><textarea name='txt_Week_Child_Status' rows="3" style="width:98%;" cols="20"><?php echo empty($data_week)?'':$data_week['txt_Week_Child_Status']?></textarea></td>
						</tr>
						<tr>
							<td class="t2">保育士の援助</td><td><textarea name='txt_Week_Teacher_Cooperation' rows="3" style="width:98%;" cols="20"><?php echo empty($data_week)?'':$data_week['txt_Week_Teacher_Cooperation']?></textarea></td>
						</tr>
						<tr>
							<td class="t2">環境構成</td><td><input name='txt_Week_Environment' type="text" class="txt01"style="width:98%;" value="<?php echo empty($data_week)?'':$data_week['txt_Week_Environment']?>" /></td>
						</tr>
						<tr>
							<td class="t2">評価・改善</td><td><textarea name='txt_Week_Valiation' rows="3" style="width:98%;" cols="20"><?php echo empty($data_week)?'':$data_week['txt_Week_Valiation']?></textarea></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>	
	</div>
	
	</form>
	<script>
	$(function(){
		$("Select[name='select_Year']").on('change',this,function(){getChangeSearch()});
		$("Select[name='select_Age']").on('change',this,function(){getChangeSearch()});
		$("Select[name='select_Class']").on('change',this,function(){getChangeSearch()});
		$("Select[name= 'select_Month']").on('change',this,function(){getChangeSearch()});
		$("Select[name= 'select_Week']").on('change',this,function(){getChangeSearch()});

		<?php if(!empty($tag)){?>
			switchTab('<?php echo $tag?>');
		<?php }?>
		});
	function switchTab(n){
			$('#Y_guide').css('display','none');
			$('#M_guide').css('display','none');
			$('#W_guide').css('display','none');
			$('#'+n+'_guide').css('display','block');
			$('#li_Y').removeClass('cn');
			$('#li_M').removeClass('cn');
			$('#li_W').removeClass('cn');
			$('#li_'+n).addClass('cn');		
			$('#buttonY').css('display','none');
			$('#buttonM').css('display','none');
			$('#buttonW').css('display','none');
			$('#button'+n).css('display','block');
			$('#PDF_Y').css('display','none');
			$('#PDF_M').css('display','none');
			$('#PDF_W').css('display','none');
			$('#PDF_'+n).css('display','block');

			}
	
	function formSubmitY(){
		//Select_group_year
		var select_Year = $("#Y_guide select[name='select_Year']").val();
		var Age = $("#Y_guide select[name='select_Age']").val();
		var Class = $("#Y_guide select[name = 'select_Class']").val();
		var Select_group_year =select_Year + '-'+ Age + '-' +Class;
		
		var Complete_year = $("input[name='txt_Com_Y']").val();
		var Complete_month = $("select[name = 'select_Com_M']").val();
		var Complete_day = $("select[name = 'select_Com_D']").val();
		var Complete_Date = Complete_year+'-'+Complete_month+'-'+Complete_day;
		
		var data = $("#Y_guide input,#Y_guide select").serialize()+'&Select_group_year='+Select_group_year+'&Complete_Date='+Complete_Date+'&tag=Y';
		console.log(data);
		getChangeSearch();
		$.ajax({
				type:"POST",
				url:"<?php echo URL::site('guide/guideUpdate');?>",
				cache : false,
				dataType: 'json',
				data:data,
				error: function(){alert('ajaxエラー');},
				success: function(json){
					addSaveOverlay(1000,400,json['result']);			   
					   }
					});
					
		
	}

	function formSubmitM(){
		var select_Year = $("#M_guide select[name='select_Year']").val();
		var select_Month = $("#M_guide select[name='select_Month']").val();
		var Age = $("#M_guide select[name='select_Age']").val();
		var Class = $("#M_guide select[name = 'select_Class']").val();
		var Select_group_month =select_Year + '-'+select_Month+'-'+ Age + '-' +Class;

		var Complete_year = $("input[name='txt_Com_Y']").val();
		var Complete_month = $("select[name = 'select_Com_M']").val();
		var Complete_day = $("select[name = 'select_Com_D']").val();
		var Complete_Date = Complete_year+'-'+Complete_month+'-'+Complete_day;
		
		var txt_Child_Status = $("#M_guide textarea[name='txt_Child_Status']").val();
		var txt_Target = $("#M_guide textarea[name='txt_Target']").val();
		var txt_Month_Title = $("#M_guide textarea[name='txt_Month_Title']").val();
		var txt_Dothings = $("#M_guide textarea[name='txt_Dothings']").val();
		var txt_Cure_Content = $("#M_guide textarea[name='txt_Cure_Content']").val();
		var txt_Cure_Environment = $("#M_guide textarea[name='txt_Cure_Environment']").val();
		var txt_Teacher_Cooperation = $("#M_guide textarea[name='txt_Teacher_Cooperation']").val();
		var txt_Education_Content = $("#M_guide textarea[name='txt_Education_Content']").val();
		var txt_Education_Environment = $("#M_guide textarea[name='txt_Education_Environment']").val();
		var txt_Parents_Support = $("#M_guide textarea[name='txt_Parents_Support']").val();
		var txt_Together_Content = $("#M_guide input[name='txt_Together_Content']").val();
		var txt_Together_Environment = $("#M_guide input[name='txt_Together_Environment']").val();

		var txt_Safe_Content = $("#M_guide textarea[name='txt_Safe_Content']").val();
		var txt_Safe_Environment = $("#M_guide textarea[name='txt_Safe_Environment']").val();
		var txt_Eat = $("#M_guide textarea[name='txt_Eat']").val();
		var txt_Valuation = $("#M_guide textarea[name='txt_Valuation']").val();
		var txt_Area_Support = $("#M_guide textarea[name='txt_Area_Support']").val();
		

		var data = 'txt_Child_Status='+txt_Child_Status+
		'&txt_Target='+txt_Target+
		'&txt_Month_Title='+txt_Month_Title+
		'&txt_Dothings='+txt_Dothings+
		'&txt_Cure_Content='+txt_Cure_Content+
		'&txt_Cure_Environment='+txt_Cure_Environment+
		'&txt_Teacher_Cooperation='+txt_Teacher_Cooperation+
		'&txt_Education_Content='+txt_Education_Content+
		'&txt_Education_Environment='+txt_Education_Environment+
		'&txt_Parents_Support='+txt_Parents_Support+
		'&txt_Together_Content='+txt_Together_Content+
		'&txt_Together_Environment='+txt_Together_Environment+
		'&txt_Safe_Content='+txt_Safe_Content+
		'&txt_Safe_Content='+txt_Safe_Content+
		'&txt_Safe_Environment='+txt_Safe_Environment+
		'&txt_Eat='+txt_Eat+
		'&txt_Valuation='+txt_Valuation+
		'&txt_Area_Support='+txt_Area_Support+
		'&Select_group_month='+Select_group_month+'&Complete_Date='+Complete_Date+'&tag=M';
		console.log(data);
		getChangeSearch();
		$.ajax({
				type:"POST",
				url:"<?php echo URL::site('guide/guideUpdate2');?>",
				cache:false,
				dataType:'json',
				data:data,
				error: function(){alert('ajaxエラー');},
				success: function(json){
					addSaveOverlay(1000,400,json['result']);			   
					   }
			})
		}

	function formSubmitW(){
		var select_Year = $("#W_guide select[name='select_Year']").val();
		var select_Month = $("#W_guide select[name='select_Month']").val();
		var select_Week = $("#W_guide select[name='select_Week']").val()
		var Age = $("#W_guide select[name='select_Age']").val();
		var Class = $("#W_guide select[name = 'select_Class']").val();
		var Select_group_week =select_Year + '-'+select_Month+'-'+select_Week+'-'+ Age + '-' +Class;

		var Complete_year = $("input[name='txt_Com_Y']").val();
		var Complete_month = $("select[name = 'select_Com_M']").val();
		var Complete_day = $("select[name = 'select_Com_D']").val();
		var Complete_Date = Complete_year+'-'+Complete_month+'-'+Complete_day;
	

		var txt_Week_Child_Status = $("#W_guide textarea[name='txt_Week_Child_Status']").val();
		var txt_Teacher_Cooperation = $("#W_guide textarea[name='txt_Week_Teacher_Cooperation']").val();
		var txt_Valiation = $("#W_guide textarea[name='txt_Week_Valiation']").val();
		
		
		var data = $("#W_guide input,#W_guide select").serialize()+'&txt_Week_Child_Status='+txt_Week_Child_Status+'&txt_Week_Teacher_Cooperation='+txt_Teacher_Cooperation+'&txt_Week_Valiation='+txt_Valiation+'&Select_group_week='+Select_group_week+'&Complete_Date='+Complete_Date+'&tag=W';
		//console.log(data);
		getChangeSearch();
		$.ajax({
			type:"POST",
			url:"<?php echo URL::site('guide/guideUpdate3');?>",
			cache:false,
			dataType:'json',
			data:data,
			error: function(){alert('ajaxエラー');},
			success: function(json){
				addSaveOverlay(1000,400,json['result']);			   
				   }
		})

		}



	
	function getChangeSearch(){
		var select_Year_Y = $("#Y_guide select[name='select_Year']").val();
		var Age_Y = $("#Y_guide select[name='select_Age']").val();
		var Class_Y = $("#Y_guide select[name = 'select_Class']").val();
		var Select_group_year =select_Year_Y + '-'+ Age_Y + '-' +Class_Y;

		var select_Year_M = $("#M_guide select[name='select_Year']").val();
		var select_Month_M = $("#M_guide select[name='select_Month']").val();
		var Age_M = $("#M_guide select[name='select_Age']").val();
		var Class_M = $("#M_guide select[name='select_Class']").val();
		var Select_group_month = select_Year_M + '-' +select_Month_M+'-'+Age_M+'-'+Class_M;
		
		var select_Year_W = $("#W_guide select[name='select_Year']").val();
		var select_Month_W = $("#W_guide select[name='select_Month']").val();
		var select_Week_W = $("#W_guide select[name='select_Week']").val();		
		var Age_W = $("#W_guide select[name='select_Age']").val();
		var Class_W = $("#W_guide select[name='select_Class']").val();
		var Select_group_week = select_Year_W+'-' + select_Month_W+'-'+select_Week_W+'-'+Age_W+'-'+Class_W;
		console.log(Select_group_week);

		//获取当前选择的tab
		var tab_id= $('.cn').attr('id');
		//标示
		var tag =tab_id.substr(tab_id.length-1,1);

		location.href = "<?php echo URL::site('guide/guide').URL::query(array('Select_group_year'=>NULL,'Select_group_month'=>NULL,'Select_group_week'=>NULL,'tag'=>NULL ));?>?Select_group_year="+Select_group_year+"&Select_group_month="+Select_group_month+"&Select_group_week="+Select_group_week+'&tag='+tag;
		}


</script>
</body>

</html>