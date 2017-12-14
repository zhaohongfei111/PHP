<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:1450px;margin:0 auto;}
	.xtittop {text-align:left;margin-bottom:20px;}
	.xtittop img {float:left;margin-right:30px;margin-top:12px;}
	.xtittop h2 {text-align:center;line-height:40px;height:40px;font-size:22px;border:solid 1px #bcbcbc;padding:10px 0;}
	.wtablebox01 table {border-right:solid 1px #000;border-bottom:solid 1px #000;margin-bottom:20px;}
	.wtablebox01 table td {border-left:solid 1px #000;border-top:solid 1px #000;height:20px;line-height:25px;text-align:left;padding:0 5px;text-align:center;vertical-align:middle;}
	.wtablebox01 table td.t01 {background:url(<?php echo $media;?>images/tbg01.jpg) no-repeat;width:105px;height:59px;}
	.wtablebox01 table td.t02 {width:105px;}
</style>
<body>
	<div class="content">
		<div class="xtittop">
			<img src="<?php echo $media;?>images/logo.jpg"/>
			<h2>出　　席　　簿</h2>
		</div>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td>組</td>
						<td class="t02" style="font-size:12px;"><?php echo  $parameter['BASE_INFO']['CLASS'][$class]?></td>
						<td colspan="2"></td>
						<td colspan="5"></td>
						<td colspan="5"></td>
						<td colspan="5"></td>
						<td colspan="5"></td>
						<td colspan="16">(　　<?php echo $Y?>　　)年(　　<?php echo $M?>　　)月</td>
					</tr>
					
					<tr>
						<td rowspan='2' style="height:19px;line-height:19px">番<br/>号</td>
						<td class="t01" rowspan='2' style="height:39px;line-height:39px;"></td>
						<?php for($i=1;$i<=$days;$i++){?><td style="width: 30px; height:20px;line-height:20px"><?php echo $i?></td><?php }?><td rowspan='2' style="height:19px;line-height:19px">出席数</td><td rowspan='2' style="height:19px;line-height:19px">欠席数</td>
						
					</tr>
					<tr>
					
						<?php for($i=1;$i<=$days;$i++){?><td style="height:20px;line-height:20px;"><?php 
						if($i<9){$yearMonDay = $Y.'-'.$M.'-0'.($i+1);}else{$yearMonDay = $Y.'-'.$M.'-'.($i+1);}	
						switch(date('w',strtotime($Y.'-'.$M.'-'.$i))){
								case '0' : echo '日'	;break;					
								case '1' : echo '月'	;break;					
								case '2' : echo '火'	;break;					
								case '3' : echo '水'	;break;					
								case '4' : echo '木'	;break;					
								case '5' : echo '金'	;break;					
								case '6' : echo '土'	;break;					
						}?></td><?php 
					
						}?>
					</tr>
					<?php 
						$count_listR1 = count($listR1);
						$count_listR1=$count_listR1<17?17:$count_listR1;
						
						$count_listR2 = count($listR2);
						$count_listR2=$count_listR2<17?17:$count_listR2;
						
						$week = date('w',strtotime($Y.'-'.$M.'-'.$i));
						
						$n=1;
					 	?>
					<tr>
						<td colspan="2">＜1号認定園児＞</td>
						<?php for($i=1;$i<=$days;$i++){?><td></td><?php }?><td></td><td></td>
					</tr>
					
					<?php foreach($listR1 as $key=>$val){if($listR1[$key][0]['Class']==$class){?>
					<tr>
						<td><?php echo $n?></td><td><?php echo $listR1[$key][0]['FamilyName']?><?php echo $listR1[$key][0]['GivenName']?></td><?php for($i=1;$i<=$days;$i++){?><td ><?php if(!empty($listR1[$key]['0']['isGoSchool'][$i-1])&&$listR1[$key]['0']['isGoSchool'][$i-1]!='0'&&date('w',strtotime($Y.'-'.$M.'-'.$i))!='0'&&date('w',strtotime($Y.'-'.$M.'-'.$i))!= '6'){echo '○';}else if($listR1[$key]['0']['isGoSchool'][$i-1]=='0'||date('w',strtotime($Y.'-'.$M.'-'.$i))=='0'||date('w',strtotime($Y.'-'.$M.'-'.$i))=='6'){echo '';}else{echo '×';}?></td><?php }?><td><?php echo $listR1[$key]['0']['row_absence_num']?></td><td><?php echo $listR1[$key]['0']['need_go_school']-$listR1[$key]['0']['row_absence_num']?></td>
					</tr>
					<?php $n++;}}?>
					
					<?php for($p = $n; $p<=$count_listR1;$p++){?>
						<tr>
						<td><?php echo $p?></td><?php for($i=1;$i<=$days+1;$i++){?><td></td><?php }?><td></td><td></td>
						</tr>
					<?php }
					$n = $count_listR1+1;?>
					
					
					
					<tr>
						<td colspan="2">＜2号認定園児＞</td>
						<?php for($i=1;$i<=$days;$i++){?><td></td><?php }?><td></td><td></td>
					</tr>
					
					<?php foreach($listR2 as $key=>$val){if($listR2[$key][0]['Class']==$class){?>
					<tr>
						<td><?php echo $n?></td><td><?php echo $listR2[$key][0]['FamilyName']?><?php echo $listR2[$key][0]['GivenName']?></td><?php for($i=1;$i<=$days;$i++){?><td ><?php if(!empty($listR2[$key]['0']['isGoSchool'][$i-1])&&$listR2[$key]['0']['isGoSchool'][$i-1]!='0'&&date('w',strtotime($Y.'-'.$M.'-'.$i))!='0'){echo '○';}else if($listR2[$key]['0']['isGoSchool'][$i-1]=='0'||date('w',strtotime($Y.'-'.$M.'-'.$i))=='0'){echo '';}else{echo '×';}?></td><?php }?><td><?php echo $listR2[$key]['0']['row_absence_num']?></td><td><?php echo $listR2[$key]['0']['need_go_school']-$listR2[$key]['0']['row_absence_num']?></td>
					</tr>
					<?php $n++;}}?>
					
					<?php for($p = $n; $p<=$count_listR1+$count_listR2;$p++){?>
						<tr>
						<td><?php echo $p?></td><?php for($i=1;$i<=$days+1;$i++){?><td></td><?php }?><td></td><td></td>
						</tr>
					<?php }?>
					
					
					<tr>
						<td rowspan="2">合計</td><td>出席児数</td>
						<?php for($i=0;$i<$days;$i++){?>
							<?php 
								if($i<9){$yearMonDay = $Y.'-'.$M.'-0'.($i+1);}else{$yearMonDay = $Y.'-'.$M.'-'.($i+1);}
								
									if(date('w',strtotime($yearMonDay))!='0'&& !in_array($yearMonDay,$holiday)){
										echo '<td>'.  $col_absence_num[$i].'</td>';
						 }else{
							echo '<td></td>';
					 }}?>
						<td>
					
						<?php echo $total_absence_num ?>
						</td>
						<td>
						<?php $q=0;
						foreach($listR1 as $key=>$val){
							$q += (int)$val[0]['need_go_school']-(int)$val[0]['row_absence_num'];
						}
						foreach($listR2 as $key1 =>$val1){
							$q += (int)$val1[0]['need_go_school']-(int)$val1[0]['row_absence_num'];
						}
						echo $q;?>
						</td>
					</tr>
					<tr>
						<td>欠席児数</td>
						<?php for($i=0;$i<$days;$i++){?>
							<?php 
								if($i<9){$yearMonDay = $Y.'-'.$M.'-0'.($i+1);}else{$yearMonDay = $Y.'-'.$M.'-'.($i+1);}
								
									if(date('w',strtotime($yearMonDay))!='0'&& !in_array($yearMonDay,$holiday)){
										echo '<td>'.  $col_noabsence_num[$i].'</td>';
						 }else{
							echo '<td></td>';
					 }}?>
						<td></td><td></td>
											
					</tr>
				</tbody>
			</table>
			
			<table style="float:right;margin-bottom:30px;" width="500" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr><td style="border-top:1px solid #fff;border-left:1px solid #fff;"></td><td>出席率</td><td>欠席率</td></tr>
					<tr><td>1号保育日数(　　　)日</td><td>(        )% </td><td>(        )% </td></tr>
					<tr><td>2号保育日数(　　　)日</td><td>(        )% </td><td>(        )% </td></tr>
				</tbody>
			</table>
		</div>
		
	</div>
	
</body>
</html>