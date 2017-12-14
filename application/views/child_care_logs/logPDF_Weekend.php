<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:5px;border:1px #bcbcbc solid;padding:5px;}
	.xtittop h2 {line-height:40px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:5px;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:20px;line-height:20px;text-align:left;padding:0 5px;}
	.wtablebox01 table td.tt {width:286px;}
	.wtablebox01 table td.t01 {width:60px;}
	.wtablebox01 table td.t02 {text-align:left;height:65px;vertical-align:top;}
	.wtablebox01 table td.t03 {height:60px;}
	.wtablebox02 {margin-bottom:5px;}
	.wtablebox02 table td {text-align:center;}
	.wtablebox01 table td.a {text-align:center;}
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<h2>  土  曜  保  育  日  誌</h2>
		</div>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td rowspan="2" colspan="7" class="a">　<?php echo substr($yearMonDay, 0,4);?> 年　　<?php echo substr($yearMonDay, 5,2);?> 月　<?php echo substr($yearMonDay, 8,2);?> 日　　<?php echo $week; ?>日　　    天候  <?php echo empty($log_info)?'':$log_info['Log_Weather'];?> </td>
						<td class="a">園長印</td>
						<td class="a">担当印</td>
						<td class="a">担当印</td>
					</tr>
					<tr>
						<td class="t03"></td>
						<td class="t03"></td>
						<td class="t03"></td>
					</tr>
					<tr>
						<td></td>
						<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
						<td class="a"><?php echo $val;?></td>
						<?php }?>
						
						<td class="a" colspan="2">計</td>
					</tr>
					<?php $num=array();$sum='';
						  if(!empty($log_info)){
							$num=explode(';', $log_info['Class_Num']);
							for($i=0;$i<count($num);$i++){
								$sum=$sum+$num[$i];
							}
						}?>
					<tr>
						<td class="a">出席人数</td>
						<td class="a"><?php echo $num[0];?></td>
						<td class="a"><?php echo $num[1];?></td>
						<td class="a"><?php echo $num[2];?></td>
						<td class="a"><?php echo $num[3];?></td>
						<td class="a"><?php echo $num[4];?></td>
						<td class="a"><?php echo $num[5];?></td>
						<td class="a"><?php echo $num[6];?></td>
						<td class="a" colspan="2"><?php echo $sum;?></td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>養護</p>
							<p><?php echo empty($log_info)?'':$log_info['Curing'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>教育</p>
							<p><?php echo empty($log_info)?'':$log_info['Education'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>保健・安全</p>
							<p><?php echo empty($log_info)?'':$log_info['Care_Security'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>給食・食育</p>
							<p><?php echo empty($log_info)?'':$log_info['Eating'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>家庭連絡</p>
							<p><?php echo empty($log_info)?'':$log_info['Family_Comm'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>あそび・ねらい</p>
							<p><?php echo empty($log_info)?'':$log_info['Games'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>乳幼児の活動</p>
							<p><?php echo empty($log_info)?'':$log_info['Activities'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>保護者とのかかわり(環境と援助)</p>
							<p><?php echo empty($log_info)?'':$log_info['Relationship'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>個人記録</p>
							<p><?php echo empty($log_info)?'':$log_info['Personal_Rec'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>家庭との連携</p>
							<p><?php echo empty($log_info)?'':$log_info['Cooperation'];?></p>
						</td>
					</tr>
					<tr>
						<td colspan="10" class="t02">
							<p>明日への展望(評価・改善）</p>
							<p><?php echo empty($log_info)?'':$log_info['Hope_Weekend'];?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div>
</body>
</html>