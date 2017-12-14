<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.txtright {text-align:right;font-size:18px;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;padding-top:10px;}
	.xtittop {text-align:center;}
	.xtittop h2 {line-height:40px;font-size:22px;border:1px #ddd solid;padding:5px 0 0 0;}
	.xtittop h2 span {border:solid 1px #000;display:inline-block;width:40px;height:40px;line-height:40px;text-align:center;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-top:10px;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:25px;line-height:30px;text-align:left;padding:0 5px;text-align:center;}
	.wtablebox01 table td.t01 {width:20px;}
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">	
		<div class="xtittop">
			<h2>延　長　保　育　管　理　簿</h2>
		</div>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<?php list($Y,$m,$d) = explode('-',$yearMonDay);?>
						<td rowspan="2" colspan="6" style="width:400px;">　<?php echo $Y;?>　年　<?php echo $m;?>　月　<?php echo $d;?>　日　　<?php echo $week;?>日　　　</td>
						<td>園長印</td>
						<td>担当印</td>
						<td>記録印</td>
					</tr>
					<tr>
						<td style="height:55px;"></td>
						<td style="height:55px;"></td>
						<td style="height:55px;"></td>
					</tr>
					<tr>
						<td colspan="2">点検事項</td>
						<?php $check=array();
							if(!empty($child_Info)){ 
							if(!empty($child_Info[0]['Extension'])){
								$check=empty($child_Info[0]['Extension']['Check_Point'])?array():explode(';', $child_Info[0]['Extension']['Check_Point']);
							 }}?>
						<td colspan="7" style="text-align:left;"><?php  foreach($parameter['CHECK_POINT'] as $k_cp=>$v_cp){if($k_cp=='5'){echo in_array($k_cp, $check)?'■':'□'; echo $v_cp.'<br>';}else{echo in_array($k_cp, $check)?'■':'□'; echo $v_cp.'  ';}}?></td>
					</tr>
					<tr>
						<td class="t01">No</td>
						<td>組</td>
						<td>園児名</td>
						<td class="t01">出欠</td>
						<td>降園時間</td>
						<td class="t01">迎え</td>
						<td>引き継ぎ事項</td>
						<td colspan="2" style="font-size:14px;">子どもの様子・評価・改善</td>
					</tr>
					<?php $count=count($child_Info);
						  $count=$count<19?19:$count;
						  
						  $No=1;
						  foreach($child_Info as $key => $val){
								if($No==1){?>
								<tr>
									<td class="t01"><?php echo $No?></td>
									<td><?php echo $parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
									<td><?php echo $val['FamilyName'].$val['GivenName'];?></td>
									<td class="t01"><?php echo empty($val['Extension'])||empty($val['Extension']['Go_With'])?'':$parameter['CHOICE'][$val['Extension']['Go_With']];?></td>
									<td><?php echo $val['checkInfo']['out_Time'];?></td>
									<td class="t01"><?php echo empty($val['Extension'])||empty($val['Extension']['Come_With'])?'':$parameter['WITH'][$val['Extension']['Come_With']];?></td>
									<td><?php echo empty($val['Extension'])?'':$val['Extension']['Item']?></td>
									<td colspan="2"  rowspan="<?php echo $count;?>"><?php echo empty($val['Extension'])?'':$val['Extension']['Suggestion'];?></td>
								</tr>								
						  		<?php }else{?>
						  		<tr>
									<td class="t01"><?php echo $No?></td>
									<td><?php echo $parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
									<td><?php echo $val['FamilyName'].$val['GivenName'];?></td>
									<td class="t01"><?php echo empty($val['Extension'])||empty($val['Extension']['Go_With'])?'':$parameter['CHOICE'][$val['Extension']['Go_With']];?></td>
									<td><?php echo $val['checkInfo']['out_Time'];?></td>
									<td class="t01"><?php echo empty($val['Extension'])||empty($val['Extension']['Come_With'])?'':$parameter['WITH'][$val['Extension']['Come_With']];?></td>
									<td><?php echo empty($val['Extension'])?'':$val['Extension']['Item']?></td>
								</tr>	
																  
						  <?php }$No++;}?>
						
						  <?php for($i=$No;$i<=$count;$i++){?>
						  		<tr>
									<td class="t01"><?php echo $i;?></td>
									<td></td>
									<td></td>
									<td class="t01"></td>
									<td></td>
									<td class="t01"></td>
									<td></td>
								</tr>					
						  <?php }?>				
					<tr>
						<td class="t01">20</td><td></td><td></td><td class="t01"></td><td></td><td class="t01"></td><td></td><td colspan="2" style="text-align:right;">合計　<?php echo count($child_Info);?>　名　</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
</body>
</html>