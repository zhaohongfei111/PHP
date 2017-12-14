<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:1450px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:20px;border:solid 1px #bcbcbc;padding:10px;}
	.xtittop h2 {line-height:40px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:10px;}
	.wtablebox01 table td {font-size:10px;border-right:solid 1px #000;border-bottom:solid 1px #000;height:23px;line-height:28px;text-align:left;padding:0 5px;text-align:center;vertical-align:middle;}
	.wtablebox01 table td.t01 {background:url(<?php echo $media.'images/tbg01.jpg'?>) no-repeat;width:105px;height:50px;}
	.wtablebox01 table td.t02 {width:105px;}
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<h2>　出　　席　　簿</h2>
		</div>
		<?php list($Y,$m)=explode('-', $yearMon);
				$all_count=count($child_CheckList);//孩子总数
		?>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td>組</td>
						<td class="t02"><?php echo $parameter['BASE_INFO']['CLASS'][$class];?></td>
						<!--担任名去除 -->
						<td colspan="2"></td>						
						<td colspan="5" style="width:120px"></td>
						<td colspan="7" style="width:120px"></td>
						<td colspan="7" style="width:120px"></td>
						<td colspan="<?php echo $days-19;?>">(　<?php echo $Y;?> )年(　<?php echo $m;?> )月</td>
					</tr>
					<tr>
						<td rowspan="2">番<br/>号</td>
						<td rowspan="2" class="t01"></td>
						<?php for($i=1;$i<=$days;$i++){?>
							<td style="width: 25px"><?php echo $i;?></td>
						<?php }?>

						<td rowspan="2">出席数</td>
						<td rowspan="2">欠席数</td>
					</tr>
					<tr>
						<?php for($i=1;$i<=$days;$i++){ $w=date("w",strtotime($yearMon.'-'.$i));?>
							<td style="width: 25px"><?php echo $parameter['WEEK_JP'][$w];?></td>
						<?php }?>
					</tr>
					<!-- 表的主题内容 -->
					<?php $rows=32;//默认32行
						$count=1;//计数
						foreach ($child_CheckList as $key =>$val){
					?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $val['FamilyName'].$val['GivenName'];?></td>
						<?php for($i=1;$i<=$days;$i++){?>
							<td><?php if(in_array($i, $val['checkList'])){echo '○';}elseif(in_array($i, $val['checkNoList'])){echo '';}else {echo '×';}?></td>
						<?php }?>
						<td><?php echo count($val['checkList']);?></td>
						<td><?php echo $days-count($val['checkList'])-count($val['checkNoList'])?></td>
					</tr>					
					<?php $count++;}?>
					<!-- 补充到默认行 -->
					<?php for($j=$count;$j<=$rows;$j++){?>
					<tr>
						<td><?php echo $j;?></td>
						<td></td>
						<?php for($i=1;$i<=$days;$i++){?>
							<td></td>
						<?php }?>
						<td></td>
						<td></td>
					</tr>	
					<?php }?>
					<tr>
						<td rowspan="2">合計</td>
						<td>出席児数</td>
						<?php for($i=1;$i<=$days;$i++){?>
							<td><?php if(!in_array($i, ($val['checkNoList']))){ echo array_key_exists($i, $all['all_row_in'])?$all['all_row_in'][$i]:'0';}?></td>
						<?php }?>
						<td><?php echo $all['all_col_in'];?></td>
						<td><?php echo $all['all_col_not_in'];?></td>
					</tr>
					<tr>
						<td>欠席児数</td>
						<?php for($i=1;$i<=$days;$i++){?>
							<td><?php if(!in_array($i, ($val['checkNoList']))){ echo array_key_exists($i, $all['all_row_in'])?$all_count-$all['all_row_in'][$i]:$all_count;}?></td>
						<?php }?>
						<td></td>
						<td></td>
					</tr>

				</tbody>
			</table>
			
			<table style="float:right;margin-bottom:30px;" width="200" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr><td>出席率</td><td>欠席率</td></tr>
					<tr><td>(  <?php echo round($all['all_col_in']/($all['all_col_in']+$all['all_col_not_in']) ,4)*100; ?>    )% </td><td>(  <?php echo round($all['all_col_not_in']/($all['all_col_in']+$all['all_col_not_in']) ,4)*100; ?>     )% </td></tr>
				</tbody>
			</table>
			
		</div>	
		
	</div>
</body>
</html>