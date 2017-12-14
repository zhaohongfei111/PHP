<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.content {width:1450px;margin:0 auto;padding-top:30px;}
	.wtablebox01 table {border-left:1px  solid #000;border-top:1px  solid #000;}
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
<div class="content">
<div class="wtablebox01">
<table class="table01" width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td  rowspan="2">年 度　　　　<?php echo empty($guideList_year)?'':$data_year['select_Year']?>　　　　　　年 間 指 導 計 画 　　　<?php echo empty($guideList_year)?'':$parameter['AGE']['AgeY'][$data_year['select_Age']]?> 　　　　　歳 児　　　<?php echo empty($guideList_year)?'':$parameter['BASE_INFO']['CLASS'][$data_year['select_Class']]?> 　 　　　組</td>
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
<td class="t2" colspan="2">年間目標</td>
<td colspan="6"><?php echo empty($guideList_year)?'':$data_year['txt_Year_Title']?></td>
<td>年間評価・改善</td>
<td colspan="5"><?php  echo empty($guideList_year)?'':$data_year['txt_Year_Valuation']?></td>
</tr>
<tr>
<td class="t2" colspan="2">期</td>
<td colspan="3">Ⅰ期(4月～6月)</td>
<td colspan="3">Ⅱ期(7月～9月)</td>
<td colspan="3">Ⅲ期(10月～12月)</td>
<td colspan="3">Ⅳ期(1月～3月)</td>
</tr>
<tr>
<td class="t2" colspan="2">月</td>
<td>4月</td>
<td>5月</td>
<td>6月</td>
<td>7月</td>
<td>8月</td>
<td>9月</td>
<td>10月</td>
<td>11月</td>
<td>12月</td>
<td>1月</td>
<td>2月</td>
<td>3月</td>
</tr>
<tr>
<td colspan="2">月主題</td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][0]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][1]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][2]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][3]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][4]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][5]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][6]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][7]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][8]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][9]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][10]?></td>
<td><?php echo empty($guideList_year)?'':$data_year['txt_Month_Title'][11]?></td>
</tr>
<tr>
<td class="t2" colspan="2">ねらい</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Target'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Target'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Target'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Target'][3]?></td>
</tr>
<tr>
<td rowspan="2">養護</td>
<td>生命</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Life'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Life'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Life'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Life'][3]?></td>
</tr>
<tr>
<td>情緒</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Feel'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Feel'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Feel'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Feel'][3]?></td>
</tr>
<tr>
<td rowspan="5">教育</td>
<td>健康</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Health'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Health'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Health'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Health'][3]?></td>
</tr>
<tr>
<td>人間関係</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Relationship'][3]?></td>
</tr>
<tr>
<td>環境</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Environment'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Environment'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Environment'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Environment'][3]?></td>
</tr>
<tr>
<td>言葉</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Speak'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Speak'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Speak'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Speak'][3]?></td>
</tr>
<tr>
<td>表現</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Performance'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Performance'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Performance'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Performance'][3]?></td>
</tr>
<tr>
<td class="t2" colspan="2">保育者の留意点・環境構成</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Attention'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Attention'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Attention'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Attention'][3]?></td>
</tr>
<tr>
<td class="t2" colspan="2">行事</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Dothings'][3]?></td>
</tr>
<tr>
<td class="t2" colspan="2">保育士の自己評価</td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][0]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][1]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][2]?></td>
<td colspan="3"><?php echo empty($guideList_year)?'':$data_year['txt_Self_Valuation'][3]?></td>
</tr>
</tbody>
</table>
</div>
</div>

</body>
</html>