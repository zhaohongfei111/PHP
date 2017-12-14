<?php
echo View::factory('public/head');
?>

<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.content {width:1450px;margin:0 auto;padding-top:30px;}
	.wtablebox01 table {border-left:1px  solid #000;border-top:1px  solid #000;}
	.wtablebox01 table td {border-right:1px solid #000;border-bottom:1px solid #000 ;height:30px;line-height:30px;text-align:center;padding:0 5px;}
	.wtablebox01 table.table01 td {border-bottom:none;}
	.wtablebox01 table.table01 td.t1 {height:50px;vertical-align:top;border-top:1px  solid #000;}
	.wtablebox01 table td.t2 {width:10%;}
	.wtablebox01 table td.t3 {width:18%;height:70px;}
</style>

<body>
	<div class="headerbox01">
		<div class="logo">
			<img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>">
		</div>
	</div>
	
	<div class="content">
			<div class="wtablebox01">
				<table class="table01" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<td  rowspan="2">年 度　　　　<?php echo empty($guideList_month)?'':$M_guide_y?>　　　　　　年 間 指 導 計 画 　　　<?php echo empty($guideList_month)?'':$parameter['AGE']['AgeY'][$M_guide_age]?>　　　　　歳 児　　　<?php echo empty($guideList_month)?'':$parameter['BASE_INFO']['CLASS'][$M_guide_class]?>  　 　　　組</td>
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
							<td class="t2" colspan="2">子どもの姿</td>
							<td class="t3"><?php echo  empty($guideList_month)?'':$data_month['txt_Child_Status'];?></td>
							<td>ねらい</td>
							<td class="t3" colspan="2"><?php echo empty($guideList_month)?'':$data_month['txt_Target']?></td>
							<td>月主題</td>
							<td class="t3"><?php  echo empty($guideList_month)?(empty($M_guideList_year)?'':$M_data_year['txt_Month_Title'][$relmonth]):$data_month['txt_Month_Title']?></td>
							<td>行事</td>
							<td class="t3"><?php  echo empty($guideList_month)?'':$data_month['txt_Dothings']?></td>
						</tr>
						<tr>
							<td class="t2" colspan="2"></td>
							<td colspan="3">内容</td>
							<td colspan="3">配慮事項・環境構成</td>
							<td colspan="2">保育者の連携</td>
						</tr>
						<tr>
							<td rowspan="2">養護</td>
							<td>生命の保持</td>
							<td colspan="3" rowspan="2"><?php echo empty($guideList_month)?'':$data_month['txt_Cure_Content']?></td>
							<td colspan="3" rowspan="2"><?php echo empty($guideList_month)?'':$data_month['txt_Cure_Environment']?></td>
							<td colspan="2" rowspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Teacher_Cooperation']?></td>
						</tr>
						<tr>
							<td>情緒の安定</td>
						</tr>
						<tr>
							<td rowspan="6">教育</td>
							<td>健康</td>
							<td colspan="3" rowspan="5"><?php echo empty($guideList_month)?'':$data_month['txt_Education_Content']?></td>
							<td colspan="3" rowspan="5"><?php echo empty($guideList_month)?'':$data_month['txt_Education_Environment']?></td>
						</tr>
						<tr>
							<td>人間関係</td>
							<td colspan="2">保護者支援</td>
						</tr>
						<tr>
							<td>環境</td>
							<td colspan="2" rowspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Parents_Support']?></td>
						</tr>
						<tr>
							<td>言葉</td>
						</tr>
						<tr>
							<td>表現</td>
						</tr>
						<tr>
							<td>統合保育</td>
							<td colspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Together_Content']?></td>
							<td colspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Together_Environment']?></td>
							<td colspan="2">地域の子育て支援</td>
						</tr>
						<tr>
							<td class="t2" colspan="2">健康・安全</td>
							<td colspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Safe_Content']?></td>
							<td colspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Safe_Environment']?></td>
							<td colspan="2" rowspan="2"><?php echo empty($guideList_month)?'':$data_month['txt_Area_Support']?></td>
						</tr>
						<tr>
							<td class="t2" colspan="2">食育</td>
							<td colspan="3"><?php echo empty($guideList_month)?'':$data_month['txt_Eat']?></td>
							<td>評価・改善</td>
							<td colspan="2"><?php echo empty($guideList_month)?'':$data_month['txt_Valuation']?></td>
						</tr>
					</tbody>
				</table>
				
			</div>
	</div>	
	
	
	
</body>
</html>
