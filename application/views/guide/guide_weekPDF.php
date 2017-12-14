<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.content {width:1450px;margin:0 auto;padding-top:30px;}
	.wtablebox01 table {border-left:1px  solid #000;border-top:1px solid  #000;}
	.wtablebox01 table td {border-right:1px  solid #000;border-bottom:1px  solid #000;height:30px;line-height:30px;text-align:center;padding:0 5px;}
	.wtablebox01 table.table01 td {border-bottom:none;}
	.wtablebox01 table.table01 td.t1 {height:50px;vertical-align:top;border-top:1px  solid #000;}
	.wtablebox01 table td.t2 {width:10%;}
</style>

<body>
	<div class="headerbox01">
		<div class="logo">
			<img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>">
		</div>
	</div>
	<div  class="content">
		<div class="wtablebox01">	
				<table class="table01" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td  rowspan="2">年 度　　<?php echo empty($guideList_week)?'':$W_guide_y?>　　　　　　　　年 間 指 導 計 画 　　　<?php echo empty($guideList_week)?'':$parameter['AGE']['AgeY'][$W_guide_age]?>　　　　　歳 児　　<?php echo empty($guideList_week)?'':$parameter['BASE_INFO']['CLASS'][$W_guide_class]?>　 　 　　　組</td>
							<td style="width:80px">園長</td>
							<td style="width:80px">副園長</td>
							<td style="width:80px">担当</td>
						</tr>
						<tr>
							<td class="t1"></td>
							<td class="t1"></td>
							<td class="t1"></td>
						</tr>
					</tbody>
				</table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td class="t2">年主題</td>
							<td><?php  echo empty($guideList_week)?(empty($W_guideList_year)?'':$W_data_year['txt_Year_Title']):$data_week['txt_Year_Title']?></td>
						</tr>
						<tr>
							<td class="t2">月主題</td>
							<td><?php  echo empty($guideList_week)?(empty($W_guideList_year)?'':$W_data_year['txt_Month_Title'][$relmonth_W]):$data_week['txt_Month_Title']?></td>
						</tr>
						<tr>
							<td class="t2">週</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Title']?></td>
						</tr>
						<tr>
							<td class="t2">ねらい</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Target']?></td>
						</tr>
						<tr>
							<td class="t2">子どもの姿</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Child_Status']?></td>
						</tr>
						<tr>
							<td class="t2">保育士の援助</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Teacher_Cooperation']?></td>
						</tr>
						<tr>
							<td class="t2">環境構成</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Environment']?></td>
						</tr>
						<tr>
							<td class="t2">評価・改善</td>
							<td><?php echo empty($data_week)?'':$data_week['txt_Week_Valiation']?></td>
						</tr>
					</tbody>
				</table>
			
		</div>	
	</div>
	
	
	
</body>
</html>