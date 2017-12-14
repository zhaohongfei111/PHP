<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:1450px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:10px;border:solid 1px #bcbcbc;padding:5px;}
	.xtittop h2 {line-height:20px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:10px;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:24px;line-height:24px;text-align:left;text-align:center;vertical-align:middle;font-size:10px;}
	.wtablebox01 table td.t03 {height:60px;}
	.wtablebox01 table td.t04 {width:70%;}
	.wtablebox01 table td.t05 {border-bottom:dashed 1px #000;height:24px;}
	.wtablebox01 table td.l {text-align:left;}
	.txtbox {border:solid 1px #bcbcbc;padding:5px;margin-bottom:10px;text-align:right;margin-left:50px;}
	.wtablebox01 table tr.t01 td {padding:0 10px;height:100px;}
	.wtablebox01 table tr.t02 td {height:46px;}
	.right {float:right;}
	.left {float:left;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
</style>
<body>
	<div class="headerbox01">
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<h2>　3・4・5 歳 児 ク ラ ス 午 睡 チ ェ ッ ク 入 り 登 降 園 簿</h2>
		</div>
		<?php list($Y,$m,$d) = explode('-',$yearMonDay);?>
		<div class="txtbox"><?php echo $parameter['BASE_INFO']['CLASS'][$class]?> 組　　　<?php echo $Y;?>　年　　<?php echo $m;?>　月　　<?php echo $d;?>　日　　<?php echo $week;?> 日　出席　　<?php echo empty($head_data)?'':$head_data['Present_Num'];?> 名　欠席　<?php echo empty($head_data)?'':$head_data['Absent_Num'];?> 名　合計　　<?php echo empty($head_data)?'':$head_data['All_Num'];?> 名　</div>
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
		<div class="right" style="width:600px;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td>朝引継時間( <?php echo empty($head_data)?'':$head_data['Time_Morning'];?>  )　　人数(　<?php echo empty($head_data)?'':$head_data['Morning_Num'];?>　)名</td>
						</tr>
						<tr>
							<td>夕引継時間(　<?php echo empty($head_data)?'':$head_data['Time_Afternoon'];?>　)　　人数(　<?php echo empty($head_data)?'':$head_data['Afternoon_Num'];?>　)名</td>
						</tr>
						<?php $num_temp=count($temp_data['temp']);
							  $num_temp=$num_temp<1?'1':$num_temp;
							  $No_temp=1;?>
						<?php foreach ($temp_data['temp'] as $key_t => $val_t){?>	  
						<tr>
							<td>(　<?php echo $val_t['Time']?>　)の室温(　<?php echo $val_t['Temperature']?>　)℃　湿度(　<?php echo $temp_data['humidity'][$key_t]['Humidity']; ?>　)%</td>
						</tr>
						<?php $No_temp++;}?>
						
						<!-- 补充行数到默认行数 -->
						<?php for($i_temp=$No_temp;$i_temp<=$num_temp;$i_temp++){?>
						<tr>
							<td>(　     　)の室温(　     　)℃　湿度(　       　)%</td>
						</tr>
						<?php }?>						
					</tbody>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		<div class="left" style="width:49%;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2">番<br/>号</td>
							<td rowspan="2" style="width:70px">1号認定<br/>園児名</td>
							<td rowspan="2">登園<br/>時間</td>
							<td rowspan="2" style="width:60px">与薬者</td>
							<td>午睡チェック①</td>
							<td>午睡チェック②</td>
							<td rowspan="2">降園<br/>時間</td>
							<td rowspan="2">迎え</td>
							<td rowspan="2" style="width:80px">備考</td>
						</tr>
						<tr>
							<td>確認者</td>
							<td>確認者</td>
						</tr>
					</thead>
					<tbody>
					<?php $No_Recog1=1;//记录行号
						  $count_R1=count($child_info['Recog1']);
						  $count_R1=$count_R1<18?18:$count_R1;//默认行数
						  
						  $count_R2=count($child_info['Recog2']);
						  $count_R2=$count_R2<$count_R1?$count_R1:$count_R2;
						  
						  $count_R1=$count_R2;//默认行数 相等，好看
						  
						foreach ($child_info['Recog1'] as $key_r1 => $val_r1){
								$napCheck=$val_r1['sleepNapCheck'];
								$allNapCheck=array();
								foreach ($napCheck as $k => $v){
									$tmp=array();
									if(!empty($v)){
										$list=explode(';', $v['Check_Time']);
										foreach ($list as $k_l =>$v_l){
											$tmp['Check_Time']=$v_l;
											$tmp['Check_USERID']=$v['Check_USERID'];
											$allNapCheck[]=$tmp;
										}
									}
								}?>
						<tr>
							<td rowspan="2"><?php echo $No_Recog1;?></td>
							<td rowspan="2"><?php echo $val_r1['FamilyName'].$val_r1['GivenName'];?></td>
							<td rowspan="2"><?php echo date('H:i',strtotime($val_r1['checkTime']['in_Time']));?></td>
							<td rowspan="2"><?php echo empty($val_r1['checkDetail'])?'': $val_r1['checkDetail']['Eat_Medicine'];?></td>
							<td class="t05"><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_Time']:'';?></td>
							<td class="t05"><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_Time']:'';?></td>
							<td rowspan="2"><?php echo date('H:i',strtotime($val_r1['checkTime']['out_Time']));?></td>
							<td rowspan="2"><?php echo empty($val_r1['checkDetail']['Come_With'])?'':$parameter['WITH'][$val_r1['checkDetail']['Come_With']];?></td>
							<td rowspan="2"><?php echo empty($val_r1['checkDetail'])?'': $val_r1['checkDetail']['Remark'];?></td>
						</tr>
						<tr>
							<td><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_USERID']:'';?></td>
							<td><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_USERID']:'';?></td>
						</tr>
					<?php $No_Recog1++; }?>
					<!-- 补充行数到默认行 -->
					<?php for($i_r1=$No_Recog1;$i_r1<=$count_R1;$i_r1++){?>
						<tr>
							<td rowspan="2"><?php echo $i_r1;?></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td class="t05"></td>
							<td class="t05"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<?php }?>					
					</tbody>
				</table>
			</div>
		</div>
		<div class="right" style="width:49%;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2">番<br/>号</td>
							<td rowspan="2" style="width:70px">2号認定<br/>園児名</td>
							<td rowspan="2">登園<br/>時間</td>
							<td rowspan="2" style="width:60px">与薬者</td>
							<td>午睡チェック①</td>
							<td>午睡チェック②</td>
							<td rowspan="2">降園<br/>時間</td>
							<td rowspan="2">迎え</td>
							<td rowspan="2" style="width:80px">備考</td>
						</tr>
						<tr>
							<td>確認者</td>
							<td>確認者</td>
						</tr>
					</thead>	
					<tbody>
					<?php $No_Recog2=1;
						 foreach ($child_info['Recog2'] as $key_r2 => $val_r2){
									$napCheck=$val_r2['sleepNapCheck'];
									$allNapCheck=array();
									foreach ($napCheck as $k => $v){
										$tmp=array();
										if(!empty($v)){
											$list=explode(';', $v['Check_Time']);
											foreach ($list as $k_l =>$v_l){
											$tmp['Check_Time']=$v_l;
											$tmp['Check_USERID']=$v['Check_USERID'];
											$allNapCheck[]=$tmp;
										}
									}
								}?>
						<tr>
							<td rowspan="2"><?php echo $No_Recog2;?></td>
							<td rowspan="2"><?php echo $val_r2['FamilyName'].$val_r2['GivenName'];?></td>
							<td rowspan="2"><?php echo date('H:i',strtotime($val_r2['checkTime']['in_Time']));?></td>
							<td rowspan="2"><?php echo empty($val_r2['checkDetail'])?'': $val_r2['checkDetail']['Eat_Medicine'];?></td>
							<td class="t05"><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_Time']:'';?></td>
							<td class="t05"><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_Time']:'';?></td>
							<td rowspan="2"><?php echo date('H:i',strtotime($val_r2['checkTime']['out_Time']));?></td>
							<td rowspan="2"><?php echo empty($val_r2['checkDetail']['Come_With'])?'':$parameter['WITH'][$val_r2['checkDetail']['Come_With']];?></td>
							<td rowspan="2"><?php echo empty($val_r2['checkDetail'])?'': $val_r2['checkDetail']['Remark'];?></td>
						</tr>
						<tr>
							<td><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_USERID']:'';?></td>
							<td><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_USERID']:'';?></td>
						</tr>
						<?php $No_Recog2++; }?>
					 	<!-- ?PDF显示函数 -->
						<!-- 补充行数到默认行 -->
						<?php for($i_r2=$No_Recog2;$i_r2<=$count_R2;$i_r2++){?>
						<tr>
							<td rowspan="2"><?php echo $i_r2;?></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td class="t05"></td>
							<td class="t05"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
							<td rowspan="2"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
						<?php }?>			
												
					</tbody>
				</table>
			</div>
			
		</div>
		<div class="clear"></div>
		<div style="padding-bottom:15px;">
			<p>◎午睡チェックポイント：①呼吸の確認(息づかい、咳、いびき) ②顔色 ③触診(体温、異常な発汗、湿疹の有無) ④仰向け寝、寝具の状態 ⑤その他(室温、湿度、冷気、暖気の状態)</p>
			<p>◎備考例：食後クスリ、欠(熱)、微熱など</p>
			<p>◎迎え：父、母、祖父、祖母など</p>
		</div>
		
	</div>
</body>
</html>