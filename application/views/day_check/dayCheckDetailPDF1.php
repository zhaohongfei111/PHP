<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:1450px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:10px;border:solid 1px #bcbcbc;padding:1px;}
	.xtittop h2 {line-height:20px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:5px;}
	.wtablebox01 table td {font-size:16px;border-right:solid 1px #000;border-bottom:solid 1px #000;height:30px;line-height:30px;text-align:left;padding:0 5px;text-align:center;vertical-align:middle;width:95px;}
	.wtablebox01 table td.t03 {height:60px;}
	.wtablebox01 table td.t04 {width:1020px;}
	.wtablebox01 table td.t05 {border-bottom:dashed 1px #000;height:30px;}
	.wtablebox01 table td.l {text-align:left;}
	.txtbox {border:solid 1px #bcbcbc;padding:5px;margin-bottom:10px;text-align:right;margin-left:280px;}
	.wtablebox01 table tr.t01 td {}
	.wtablebox01 table tr.t02 td {}
	.right {float:right;}
	.left {float:left;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<h2>0 歳 児 ク ラ ス 午 睡 チ ェ ッ ク 入 り 登 降 園 簿</h2>
		</div>
		<?php list($Y,$m,$d) = explode('-',$yearMonDay);?>
		<div class="txtbox"><?php echo $parameter['BASE_INFO']['CLASS'][$class]?> 組      <?php echo $Y;?> 年　  <?php echo $m;?> 月　  <?php echo $d;?> 日  　<?php echo $week;?> 日　出席　　<?php echo empty($head_data)?'':$head_data['Present_Num'];?> 名　欠席　<?php echo empty($head_data)?'':$head_data['Absent_Num'];?> 名　合計　　<?php echo empty($head_data)?'':$head_data['All_Num'];?> 名　</div>
		<div class="right" style="width:20%">
		<div class="wtablebox01">
			<table width="300px" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td>早出印</td>
						<td>担任印</td>
						<td>遅出印</td>
					</tr>
					<tr>
						<td class="t03"></td>
						<td class="t03"></td>
						<td class="t03"></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
		<div class="clear"></div>
		<div class="left" style="width:55%;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr class="t01">
							<td>番<br/>号</td>
							<td>園児名</td>
							<td>登園時間</td>
							<td>体温</td>
							<td>与薬者</td>
							<td>降園時間</td>
							<td>迎え</td>
							<td style="width:200px;">備考</td>
						</tr>
					</thead>	
					<tbody>
						<?php $table1_row=count($child_info);
							  $table1_row=$table1_row<6?6:$table1_row;
							  
							  $No1=1;
							  foreach ($child_info as $key_c => $val_c){
						?>
							  <tr>
								<td><?php echo $No1;?></td>
								<td><?php echo $val_c['FamilyName'].$val_c['GivenName'];?></td>
								<td><?php echo $val_c['checkTime']['in_Time'];?></td>
								<td><?php echo empty($val_c['checkDetail'])?'':$val_c['checkDetail']['Body_Temp'];?></td>
								<td><?php echo empty($val_c['checkDetail'])?'': $val_c['checkDetail']['Eat_Medicine'];?></td>
								<td><?php echo $val_c['checkTime']['out_Time'];?></td>
								<td><?php echo empty($val_c['checkDetail']['Come_With'])?'':$parameter['WITH'][$val_c['checkDetail']['Come_With']];?></td>
								<td><?php echo empty($val_c['checkDetail'])?'': $val_c['checkDetail']['Remark'];?></td>
							</tr>
						<?php $No1++; }?>
						
						<?php for($i=$No1;$i<=$table1_row;$i++){?>
						 <tr>
								<td><?php echo $i;?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="right" style="width:42%;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="t01">
							<td>申し送り事項他</td>
						</tr>
						<tr class="t02">
							<td>朝引継時間( <?php echo empty($head_data)?'':$head_data['Time_Morning'];?>  )　　人数(　<?php echo empty($head_data)?'':$head_data['Morning_Num'];?>　)名</td>
						</tr>
						<tr class="t02">
							<td>夕引継時間(　<?php echo empty($head_data)?'':$head_data['Time_Afternoon'];?>　)　　人数(　<?php echo empty($head_data)?'':$head_data['Afternoon_Num'];?>　)名</td>
						</tr>
						<?php $num_temp=count($temp_data['temp']);
							  $num_temp=$num_temp<3?'3':$num_temp;
							  $No_temp=1;?>
						<?php foreach ($temp_data['temp'] as $key_t => $val_t){?>	  
						<tr>
							<td style="text-align: left"><?php echo $No_temp;?>) (　<?php echo $val_t['Time']?>　)の室温(　<?php echo $val_t['Temperature']?>　)℃　湿度(　<?php echo $temp_data['humidity'][$key_t]['Humidity']; ?>　)%</td>
						</tr>
						<?php $No_temp++;}?>
						<!-- 补充到默认行数 3 -->
						<?php for($i_temp=$No_temp;$i_temp<=$num_temp;$i_temp++){?>
						<tr>
							<td style="text-align: left"><?php echo $i_temp;?>) (　     　)の室温(　     　)℃　湿度(　       　)%</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<td style="width:10px">番<br/>号</td>
						<td>園児名</td>
						<td>就床時間</td>
						<td>起床時間</td>
						<td style="width:120px">睡眠時間合計</td>
						<td class="t04" colspan="12">午睡チェック時間・確認者</td>
					</tr>
					</thead>
					<tbody>
					
					<?php 	$No2=1;//记录child行数
					foreach ($child_info as $key_ch => $val_ch){
							
							$No3=1;//记录起床就床行数
							$Count_Sleep=count($val_ch['sleepNapCheck']);
							$Count_Sleep=$Count_Sleep<3?3:$Count_Sleep;
							if(empty($val_ch['sleepNapCheck'])){?>
					<tr>
						<td rowspan="6" style="width:10px"><?php echo $No2;?></td>
						<td rowspan="6"><?php echo $val_ch['FamilyName'].$val_ch['GivenName'];?></td>
					
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>										
					<tr>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>
					<tr>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>							
					<?php }else{?>
					<tr>
						<td rowspan="<?php echo $Count_Sleep*2?>" style="width:10px"><?php echo $No2;?></td>
						<td rowspan="<?php echo $Count_Sleep*2?>"><?php echo $val_ch['FamilyName'].$val_ch['GivenName'];?></td>					
						<?php 
							  foreach ($val_ch['sleepNapCheck'] as $key_sleep =>$val_sleep){
								$napCheck=explode(';', $val_sleep['Check_Time']);
								$napCheck_Name=$val_sleep['Check_USERID'];
								if($No3==1){?>
						<td rowspan="2"><?php echo $val_sleep['Begin_Sleep_Time'];?></td>
						<td rowspan="2"><?php echo $val_sleep['End_Sleep_Time'];?></td>
						<td rowspan="2" style="width:120px"><?php echo (strtotime($val_sleep['End_Sleep_Time'])-strtotime($val_sleep['Begin_Sleep_Time']))/60;?><?php echo 'min';?></td>
						
						<td class="t05 l">① <?php echo array_key_exists(0, $napCheck)?$napCheck[0]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(0, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">② <?php echo array_key_exists(1, $napCheck)?$napCheck[1]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(1, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">③ <?php echo array_key_exists(2, $napCheck)?$napCheck[2]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(2, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">④ <?php echo array_key_exists(3, $napCheck)?$napCheck[3]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(3, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">⑤ <?php echo array_key_exists(4, $napCheck)?$napCheck[4]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(4, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">⑥ <?php echo array_key_exists(5, $napCheck)?$napCheck[5]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(5, $napCheck)?$napCheck_Name:'';?></td>
					</tr>
					
					<tr>
						<td class="l">⑦ <?php echo array_key_exists(6, $napCheck)?$napCheck[6]:'';?></td>
						<td class="l"><?php echo array_key_exists(6, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑧ <?php echo array_key_exists(7, $napCheck)?$napCheck[7]:'';?></td>
						<td class="l"><?php echo array_key_exists(7, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑨ <?php echo array_key_exists(8, $napCheck)?$napCheck[8]:'';?></td>
						<td class="l"><?php echo array_key_exists(8, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑩ <?php echo array_key_exists(9, $napCheck)?$napCheck[9]:'';?></td>
						<td class="l"><?php echo array_key_exists(9, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑪ <?php echo array_key_exists(10, $napCheck)?$napCheck[10]:'';?></td>
						<td class="l"><?php echo array_key_exists(10, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑫ <?php echo array_key_exists(11, $napCheck)?$napCheck[11]:'';?></td>
						<td class="l"><?php echo array_key_exists(11, $napCheck)?$napCheck_Name:'';?></td>
					</tr>					
					<?php }else{?>
					<tr>
						<td rowspan="2"><?php echo $val_sleep['Begin_Sleep_Time'];?></td>
						<td rowspan="2"><?php echo $val_sleep['End_Sleep_Time'];?></td>
						<td rowspan="2" style="width:120px"><?php echo (strtotime($val_sleep['End_Sleep_Time'])-strtotime($val_sleep['Begin_Sleep_Time']))/60;?><?php echo 'min';?></td>
						
						<td class="t05 l">① <?php echo array_key_exists(0, $napCheck)?$napCheck[0]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(0, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">② <?php echo array_key_exists(1, $napCheck)?$napCheck[1]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(1, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">③ <?php echo array_key_exists(2, $napCheck)?$napCheck[2]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(2, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">④ <?php echo array_key_exists(3, $napCheck)?$napCheck[3]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(3, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">⑤ <?php echo array_key_exists(4, $napCheck)?$napCheck[4]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(4, $napCheck)?$napCheck_Name:'';?></td>
						<td class="t05 l">⑥ <?php echo array_key_exists(5, $napCheck)?$napCheck[5]:'';?></td>
						<td class="t05 l"><?php echo array_key_exists(5, $napCheck)?$napCheck_Name:'';?></td>
					</tr>
					<tr>
						<td class="l">⑦ <?php echo array_key_exists(6, $napCheck)?$napCheck[6]:'';?></td>
						<td class="l"><?php echo array_key_exists(6, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑧ <?php echo array_key_exists(7, $napCheck)?$napCheck[7]:'';?></td>
						<td class="l"><?php echo array_key_exists(7, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑨ <?php echo array_key_exists(8, $napCheck)?$napCheck[8]:'';?></td>
						<td class="l"><?php echo array_key_exists(8, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑩ <?php echo array_key_exists(9, $napCheck)?$napCheck[9]:'';?></td>
						<td class="l"><?php echo array_key_exists(9, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑪ <?php echo array_key_exists(10, $napCheck)?$napCheck[10]:'';?></td>
						<td class="l"><?php echo array_key_exists(10, $napCheck)?$napCheck_Name:'';?></td>
						<td class="l">⑫ <?php echo array_key_exists(11, $napCheck)?$napCheck[11]:'';?></td>
						<td class="l"><?php echo array_key_exists(11, $napCheck)?$napCheck_Name:'';?></td>
					</tr>			
					<?php }$No3++;}?>
					
					<?php for($i_sleep=$No3;$i_sleep<=$Count_Sleep;$i_sleep++){?>						
					<tr>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>
					<?php }	}$No2++;}?>	
					
					<?php for ($i_child=$No2;$i_child<=$table1_row;$i_child++){?>
					<tr>
						<td rowspan="6" style="width:10px"><?php echo $i_child;?></td>
						<td rowspan="6"></td>
					
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>					
					</tr>	
							
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>										
					<tr>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>
					<tr>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2" style="width:120px"></td>
						<td class="t05 l">①</td>
						<td class="t05 l"></td>
						<td class="t05 l">②</td>
						<td class="t05 l"></td>
						<td class="t05 l">③</td>
						<td class="t05 l"></td>
						<td class="t05 l">④</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑤</td>
						<td class="t05 l"></td>
						<td class="t05 l">⑥</td>
						<td class="t05 l"></td>
					</tr>
					<tr>
						<td class="l">⑦</td>
						<td class="l"></td>
						<td class="l">⑧</td>
						<td class="l"></td>
						<td class="l">⑨</td>
						<td class="l"></td>
						<td class="l">⑩</td>
						<td class="l"></td>
						<td class="l">⑪</td>
						<td class="l"></td>
						<td class="l">⑫</td>
						<td class="l"></td>
					</tr>	
					<?php }?>				
				</tbody>
			</table>
		</div>		
		<div style="padding-bottom:15px;">
			<p>◎午睡チェックポイント：①呼吸の確認(息づかい、咳、いびき) ②顔色 ③触診(体温、異常な発汗、湿疹の有無) ④仰向け寝、寝具の状態 ⑤その他(室温、湿度、冷気、暖気の状態)</p>
			<p>◎備考例：食後クスリ、欠(熱)、微熱など</p>
			<p>◎迎え：父、母、祖父、祖母など</p>
		</div>		
	</div>
</body>
</html>