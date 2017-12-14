<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:20px;border:1px #bcbcbc solid;padding:10px;}
	.xtittop h2 {line-height:40px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:30px;line-height:30px;text-align:left;padding:0 10px;}
	.wtablebox01 table td.tt {width:286px;}
	.wtablebox01 table td.t01 {width:60px;}
	.wtablebox01 table td.t02 {text-align:left;height:80px;vertical-align:top;}
	.wtablebox02 table td.t02 {line-height:20px;}
	.wtablebox01 table td.t03 {height:60px;}
	.wtablebox02 {margin-bottom:30px;}
	.wtablebox02 table td {text-align:center;}
	
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<h2><?php echo empty($class)?'':$parameter['BASE_INFO']['CLASS'][$class];?> ぐみ　　　　 保 育 日 誌</h2>
		</div>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td rowspan="2" colspan="4">　  <?php echo substr($yearMonDay, 0,4);?> 年　　<?php echo substr($yearMonDay, 5,2);?> 月　<?php echo substr($yearMonDay, 8,2);?> 日　　<?php echo $week; ?>日　　    天候  <?php echo empty($log_info)?'':$log_info['Log_Weather'];?> </td>
						<td>出席人数</td>
						<td>欠席人数</td>
						<td>園長印</td>
						<td>担任印</td>
					</tr>
					<tr>
						<td class="t03"><?php echo empty($log_info)?'':$log_info['Present_Num'];?></td>
						<td class="t03"><?php echo empty($log_info)?'':$log_info['Absent_Num'];?></td>
						<td class="t03"></td>
						<td class="t03"></td>
					</tr>
					<tr>
						<td rowspan="2" class="t01">養護</td>
						<td colspan="2" rowspan="2" class="tt"><?php echo empty($log_info)?'':$log_info['Curing'];?></td>
						<td>保険・安全</td>
						<td colspan="4"><?php echo empty($log_info)?'':$log_info['Care_Security'];?></td>
					</tr>
					<tr>
						<td>給食・食育</td>
						<td colspan="4"><?php echo empty($log_info)?'':$log_info['Eating'];?></td>
					</tr>
					<tr>
						<td>教育</td>
						<td colspan="2" class="tt"><?php echo empty($log_info)?'':$log_info['Education'];?></td>
						<td>家庭連絡</td>
						<td colspan="4"><?php echo empty($log_info)?'':$log_info['Family_Comm'];?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="wtablebox01 wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="border-top:none;">
				<tbody>
					<tr>
						<td>園児氏名</td>
						<td>本日の姿</td>
						<td style="width:194px;">園児氏名</td>
						<td>本日の姿</td>
					</tr>
					<?php $count=count($child_info);
						  $raw=0;
						  for($i=0;$i<$count;$i=$i+2){
							  $raw++;?>  	
						<?php if($i<$count-1){?>
						     <tr>
								<td><?php echo $child_info[$i]['FamilyName'].$child_info[$i]['GivenName'];?></td>
								<td><?php echo $child_info[$i]['Today'];?></td>
								<td><?php echo $child_info[$i+1]['FamilyName'].$child_info[$i+1]['GivenName'];?></td>
								<td><?php echo $child_info[$i+1]['Today'];?></td>
							</tr>
						<?php } elseif($i==$count-1){?>
						     <tr>
								<td><?php echo $child_info[$i]['FamilyName'].$child_info[$i]['GivenName'];?></td>
								<td><?php echo $child_info[$i]['Today'];?></td>
								<td></td>
								<td></td>
							</tr>
						<?php }?>
					<?php  }?>
					
					<?php if($raw<6){
							for($j=0;$j<6-$raw;$j++){ ?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
					<?php }}?>
				
					<tr>
						<td colspan="4" class="t02">
							一日の流れ
							<p>  <?php echo empty($log_info)?'':$log_info['Day_Flow'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="t02">
							主な遊び・生活
							<p>  <?php echo empty($log_info)?'':$log_info['Daily_Life'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="t02">
							エピソードの考察(読み取り)・ねらいへの環境構成や援助および配慮など
							<p>  <?php echo empty($log_info)?'':$log_info['Episode'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="t02">
							明日への展望(評価・改善)
							<p>  <?php echo empty($log_info)?'':$log_info['Hope_Weekday'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="t02">
							連絡事項など
							<p>  <?php echo empty($log_info)?'':$log_info['Matters'];?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</body>
</html>