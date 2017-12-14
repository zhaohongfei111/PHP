<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:1450px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:10px;border:solid 1px #bcbcbc;padding:5px;}
	.xtittop h2 {line-height:40px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:10px;}
	.wtablebox01 table td {font-size:12px;border-right:solid 1px #000;border-bottom:solid 1px #000;height:25px;line-height:25px;text-align:left;padding:0 5px;text-align:center;vertical-align:middle;}
	.wtablebox01 table td.t03 {height:60px;}
	.wtablebox01 table td.t04 {width:70%;}
	.wtablebox01 table td.t05 {border-bottom:dashed 1px #000;height:30px;}
	.wtablebox01 table td.l {text-align:left;}
	.txtbox {border:solid 1px #bcbcbc;padding:5px;margin-bottom:10px;text-align:right;margin-left:100px;}
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
			<h2>1・2・満 3 歳 児 ク ラ ス 午 睡 チ ェ ッ ク 入 り 登 降 園 簿</h2>
		</div>
		<?php list($Y,$m,$d) = explode('-',$yearMonDay);?>
		<div class="txtbox"><?php echo $parameter['BASE_INFO']['CLASS'][$class]?> 組　　　　<?php echo $Y;?>　年　　　<?php echo $m;?>　月　　　<?php echo $d;?>　日　　　<?php echo $week;?>　 日　出席　　　<?php echo empty($head_data)?'':$head_data['Present_Num'];?>　名　欠席　　　<?php echo empty($head_data)?'':$head_data['Absent_Num'];?>　名　合計　　<?php echo empty($head_data)?'':$head_data['All_Num'];?>　名　</div>
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
		<div class="left" style="width:400px;margin-left:50px;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr class="t02">
							<td>朝引継時間:(　<?php echo empty($head_data)?'':$head_data['Time_Morning'];?>　)　　　人数(　<?php echo empty($head_data)?'':$head_data['Morning_Num'];?>　)名</td>
						</tr>
						<tr class="t02">
							<td>夕引継時間:(　<?php echo empty($head_data)?'':$head_data['Time_Afternoon'];?>　)　　　人数(　<?php echo empty($head_data)?'':$head_data['Afternoon_Num'];?>　)名</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="right" style="width:400px;margin-right:10px;">
			<div class="wtablebox01">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<?php $num_temp=count($temp_data['temp']);
							  $num_temp=$num_temp<1?'1':$num_temp;//室温  默认行数
							  $No_temp=1;//室温 计数?>
						<?php foreach ($temp_data['temp'] as $key_t => $val_t){?>	  
						<tr>
							<td>(　<?php echo $val_t['Time']?>　)の室温(　<?php echo $val_t['Temperature']?>　)℃　湿度(　<?php echo $temp_data['humidity'][$key_t]['Humidity']; ?>　)%</td>
						</tr>
						<?php $No_temp++;}?>
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
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<td rowspan="2">番<br/>号</td>
						<td rowspan="2">園児名</td>
						<td rowspan="2">登園時間</td>
						<td rowspan="2">体温</td>
						<td rowspan="2">与薬者</td>
						<td>午睡チェック①</td>
						<td>午睡チェック②</td>
						<td>午睡チェック③</td>
						<td rowspan="2">降園時間</td>
						<td rowspan="2">迎え</td>
						<td rowspan="2" style="width:20%;">備考</td>
					</tr>
					<tr>
						<td>確認者</td>
						<td>確認者</td>
						<td>確認者</td>
					</tr>
					</thead>
					<tbody>
					<?php 	$No_child=1;//记录child行数
							$count_child=count($child_info);
							$count_child=$count_child<15?15:$count_child;//默认行数
					foreach ($child_info as $key_ch => $val_ch){
							$napCheck=$val_ch['sleepNapCheck'];
							$allNapCheck=array();
							foreach ($napCheck as $k => $v){
								$tmp=array();
								if(!empty($v['Check_Time'])){
									$list=explode(';', $v['Check_Time']);
									foreach ($list as $k_l =>$v_l){
										$tmp['Check_Time']=$v_l;
										$tmp['Check_USERID']=$v['Check_USERID'];
										$allNapCheck[]=$tmp;
									}
								}
							}?>
					<tr>
						<td rowspan="2"><?php echo $No_child;?></td>
						<td rowspan="2"><?php echo $val_ch['FamilyName'].$val_ch['GivenName'];?></td>
						<td rowspan="2"><?php echo $val_ch['checkTime']['in_Time'];?></td>
						<td rowspan="2"><?php echo empty($val_ch['checkDetail'])?'':$val_ch['checkDetail']['Body_Temp'];?></td>
						<td rowspan="2"><?php echo empty($val_ch['checkDetail'])?'': $val_ch['checkDetail']['Eat_Medicine'];?></td>
						<td class="t05"><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_Time']:'';?></td>
						<td class="t05"><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_Time']:'';?></td>
						<td class="t05"><?php echo array_key_exists(2, $allNapCheck)?$allNapCheck[2]['Check_Time']:'';?></td>
						<td rowspan="2"><?php echo $val_ch['checkTime']['out_Time'];?></td>
						<td rowspan="2"><?php echo empty($val_ch['checkDetail']['Come_With'])?'':$parameter['WITH'][$val_ch['checkDetail']['Come_With']];?></td>
						<td rowspan="2"><?php echo empty($val_ch['checkDetail'])?'': $val_ch['checkDetail']['Remark'];?></td>
					</tr>
					<tr>
						<td><?php echo array_key_exists(0, $allNapCheck)?$allNapCheck[0]['Check_USERID']:'';?></td>
						<td><?php echo array_key_exists(1, $allNapCheck)?$allNapCheck[1]['Check_USERID']:'';?></td>
						<td><?php echo array_key_exists(2, $allNapCheck)?$allNapCheck[2]['Check_USERID']:'';?></td>
					</tr>
					<?php $No_child++;}?>
					<!-- 行数不足时补充到默认行数 -->					
					<?php for($i_child=$No_child;$i_child<=$count_child;$i_child++){ ?>
					<tr>
						<td rowspan="2"><?php echo $i_child;?></td>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td class="t05"></td>
						<td class="t05"></td>
						<td class="t05"></td>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
						<td rowspan="2"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }?>					
				</tbody>
			</table>
		</div>
		
		<div style="padding-bottom:30px;">
			<p>◎午睡チェックポイント：①呼吸の確認(息づかい、咳、いびき) ②顔色 ③触診(体温、異常な発汗、湿疹の有無) ④仰向け寝、寝具の状態 ⑤その他(室温、湿度、冷気、暖気の状態)</p>
			<p>◎備考例：食後クスリ、欠(熱)、微熱など</p>
			<p>◎迎え：父、母、祖父、祖母など</p>
		</div>
		
	</div>
</body>
</html>