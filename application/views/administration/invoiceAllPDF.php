<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:2000px;margin:0 auto;}
	.xtittop {text-align:center;margin-bottom:20px;border:solid 1px #bcbcbc;width:800px;margin:0 auto;}
	.xtittop h2 {line-height:30px;font-size:22px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;margin-bottom:30px;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:30px;line-height:30px;text-align:left;padding:0 5px;text-align:center;vertical-align:middle;}
	.wtablebox01 table td.r {text-align:right;}
</style>
<body>
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">
		<div class="xtittop">
			<?php list($Y,$m) = explode('-',$yearMon);?>
			<h2>全 園 児 請 求 一 覧 </h2>
		</div>
		<p>　　　　(　<?php echo $Y;?>　)年度(　<?php echo $m;?>　)月保育料</p>
		<div class="wtablebox01">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<td>組</td>
						<td>番号</td>
						<td>名前</td>
						<td>認定区分</td>
						<td>キャピタル番号</td>
						<td>保育料</td>
						<td>保育料備考</td>
						<td>延長保育料</td>
						<td>延長備考</td>
						<td>時間外保育料</td>
						<td>特定保育料</td>
						<td>行事費</td>
						<td>教材費</td>
						<td>保護者会費</td>
						<td>絵本代</td>
						<td>保険代</td>
						<td>給食費</td>
						<td>給食費備考</td>
						<td>バス代</td>
						<td>バス代備考</td>
						<td>音楽</td>
						<td>英語</td>
						<td>体操</td>
						<td>バレエ＆ダンス</td>
						<td>用品代</td>
						<td>用品代備考</td>
						<td>備考</td>
						<td>合計</td>
					</tr>
				</thead>
				<tbody>
				<!-- めだか(0歳) C1-->
				<?php   $C1_No=0;
						$C1_Count=count($child_Info['C1']);
						$C1_Count=$C1_Count<8?8:$C1_Count;
						?>
				<?php foreach ($child_Info['C1'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C1_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C1_Count;?>">め<br>だ<br>か</td>
						<td><?php echo $C1_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C1_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C1_No++;}?>
					<?php for($i=$C1_No+1;$i<=$C1_Count;$i++){
						if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C1_Count;?>">め<br>だ<br>か</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>										
					<!-- ひよこ(1歳) C2-->
				<?php   $C2_No=0;
						$C2_Count=count($child_Info['C2']);
						$C2_Count=$C2_Count<10?10:$C2_Count;
						?>
				<?php foreach ($child_Info['C2'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C2_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C2_Count;?>">ひ<br>よ<br>こ</td>
						<td><?php echo $C2_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C2_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C2_No++;}?>
					<?php for($i=$C2_No+1;$i<=$C2_Count;$i++){
						if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C2_Count;?>">ひ<br>よ<br>こ</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>										
					<!-- うさぎ(2歳)C3 -->
				<?php   $C3_No=0;
						$C3_Count=count($child_Info['C3']);
						$C3_Count=$C3_Count<14?14:$C3_Count;
						?>
				<?php foreach ($child_Info['C3'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C3_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C3_Count;?>">う<br>さ<br>ぎ</td>
						<td><?php echo $C3_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C3_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C3_No++;}?>
					<?php for($i=$C3_No+1;$i<=$C3_Count;$i++){
							if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C3_Count;?>">う<br>さ<br>ぎ</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>
				
					
					<!-- れんげ(満3歳)C4 -->
				<?php   $C4_No=0;
						$C4_Count=count($child_Info['C4']);
						$C4_Count=$C4_Count<14?14:$C4_Count;
						?>
				<?php foreach ($child_Info['C4'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C4_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C4_Count;?>">れ<br>ん<br>げ</td>
						<td><?php echo $C4_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C4_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C4_No++;}?>
					<?php for($i=$C4_No+1;$i<=$C4_Count;$i++){
						if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C4_Count;?>">れ<br>ん<br>げ</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>
										
					
					<!-- さくら(3歳) C5-->
				<?php   $C5_No=0;
						$C5_Count=count($child_Info['C5']);
						$C5_Count=$C5_Count<25?25:$C5_Count;
						?>
				<?php foreach ($child_Info['C5'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C5_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C5_Count;?>">さ<br>く<br>ら</td>
						<td><?php echo $C5_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C5_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C5_No++;}?>
					<?php for($i=$C5_No+1;$i<=$C5_Count;$i++){
							if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C5_Count;?>">さ<br>く<br>ら</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>
				
					
					<!-- たんぽぽ(4歳)C6 -->
					<?php   $C6_No=0;
						$C6_Count=count($child_Info['C6']);
						$C6_Count=$C6_Count<25?25:$C6_Count;
						?>
				<?php foreach ($child_Info['C6'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C6_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C6_Count;?>">た<br>ん<br>ぽ<br>ぽ</td>
						<td><?php echo $C6_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C6_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C6_No++;}?>
					<?php for($i=$C6_No+1;$i<=$C6_Count;$i++){
						if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C6_Count;?>">た<br>ん<br>ぽ<br>ぽ</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>
					
					
					<!-- すみれ(5歳) C7-->
				<?php   $C7_No=0;
						$C7_Count=count($child_Info['C7']);
						$C7_Count=$C7_Count<25?25:$C7_Count;
						?>
				<?php foreach ($child_Info['C7'] as $key_child =>$val_child){
						$projects_cost=array();
						$projects_remark=array();
						if(!empty($val_child['invoiceInfo'])){
							$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
							$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
						}
						$goods_name=array();
						$goods_remark = array();
						if(!empty($val_child['invoiceInfo'])){
							$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
							$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
						}
						if($C7_No==0){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C7_Count;?>">す<br>み<br>れ</td>
						<td><?php echo $C7_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>
					<?php }else{?>
					<tr>
						<td><?php echo $C7_No+1;?></td>
						<td><?php echo $val_child['FamilyName'].$val_child['GivenName']?></td>
						<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
						<td><?php echo $val_child['Capital_ID'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_MonCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_MonCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_OverCost'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['Base_OverCost_Remark'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Base_ProjectCost'];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[0];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[1];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[2];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[3];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[4];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[5];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[6];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[6];?></td>
						<td><?php echo empty($projects_cost)?'0':$projects_cost[7]+$projects_cost[8];?></td>
						<td><?php echo empty($projects_remark)?'':$projects_remark[7];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_1'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_2'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_3'];?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'0':$val_child['invoiceInfo']['Activity_PricePerM_4'];?></td>
						<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}?></td>
						<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}?></td>
						<td><?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?></td>
						<td><?php echo $val_child['ALL'];?></td>
					</tr>		
					<?php }$C7_No++;}?>
					
					<?php for($i=$C7_No+1;$i<=$C7_Count;$i++){
							if($i==1){?>
					<tr>
						<td style="width:30px;" rowspan="<?php echo $C7_Count;?>">す<br>み<br>れ</td>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>							
					<?php }else{?>					
					<tr>
						<td><?php echo $i;?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<?php }}?>
																			
					<tr>
						<td class="r" colspan="5">計</td>
						<td><?php echo $sum['Base_MonCost']['R1']+$sum['Base_MonCost']['R2']+$sum['Base_MonCost']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_OverCost']['R1']+$sum['Base_OverCost']['R2']+$sum['Base_OverCost']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_ProjectCost']['R1']+$sum['Base_ProjectCost']['R2']+$sum['Base_ProjectCost']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_0']['R1']+$sum['Projects_cost_0']['R2']+$sum['Projects_cost_0']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_1']['R1']+$sum['Projects_cost_1']['R2']+$sum['Projects_cost_1']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_2']['R1']+$sum['Projects_cost_2']['R2']+$sum['Projects_cost_2']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_3']['R1']+$sum['Projects_cost_3']['R2']+$sum['Projects_cost_3']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_4']['R1']+$sum['Projects_cost_4']['R2']+$sum['Projects_cost_4']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_5']['R1']+$sum['Projects_cost_5']['R2']+$sum['Projects_cost_5']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_6']['R1']+$sum['Projects_cost_6']['R2']+$sum['Projects_cost_6']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Projects_cost_7']['R1']+$sum['Projects_cost_7']['R2']+$sum['Projects_cost_7']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Activity_Cost_1']['R1']+$sum['Activity_Cost_1']['R2']+$sum['Activity_Cost_1']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_2']['R1']+$sum['Activity_Cost_2']['R2']+$sum['Activity_Cost_2']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_3']['R1']+$sum['Activity_Cost_3']['R2']+$sum['Activity_Cost_3']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_4']['R1']+$sum['Activity_Cost_4']['R2']+$sum['Activity_Cost_4']['R3'];?></td>
						<td>---</td>
						<td>---</td>
						<td>---</td>
						<td><?php echo $sum['total'];?></td>
					</tr>
					<tr>
						<td class="r" colspan="5">1号合計</td>
						<td><?php echo $sum['Base_MonCost']['R1'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_OverCost']['R1'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_ProjectCost']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_0']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_1']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_2']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_3']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_4']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_5']['R1'];?></td>
						<td><?php echo $sum['Projects_cost_6']['R1'];?></td>
						<td>---</td>
						<td><?php echo $sum['Projects_cost_7']['R1'];?></td>
						<td>---</td>
						<td><?php echo $sum['Activity_Cost_1']['R1'];?></td>
						<td><?php echo $sum['Activity_Cost_2']['R1'];?></td>
						<td><?php echo $sum['Activity_Cost_3']['R1'];?></td>
						<td><?php echo $sum['Activity_Cost_4']['R1'];?></td>
						<td>---</td>
						<td>---</td>
						<td>---</td>
						<td><?php echo $sum['All']['R1'];?></td>
					</tr>
					<tr>
						<td class="r" colspan="5">2号合計</td>
						<td><?php echo $sum['Base_MonCost']['R2'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_OverCost']['R2'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_ProjectCost']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_0']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_1']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_2']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_3']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_4']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_5']['R2'];?></td>
						<td><?php echo $sum['Projects_cost_6']['R2'];?></td>
						<td>---</td>
						<td><?php echo $sum['Projects_cost_7']['R2'];?></td>
						<td>---</td>
						<td><?php echo $sum['Activity_Cost_1']['R2'];?></td>
						<td><?php echo $sum['Activity_Cost_2']['R2'];?></td>
						<td><?php echo $sum['Activity_Cost_3']['R2'];?></td>
						<td><?php echo $sum['Activity_Cost_4']['R2'];?></td>
						<td>---</td>
						<td>---</td>
						<td>---</td>
						<td><?php echo $sum['All']['R2'];?></td>
					</tr>
					<tr>
						<td class="r" colspan="5">3号合計</td>
						<td><?php echo $sum['Base_MonCost']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_OverCost']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Base_ProjectCost']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_0']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_1']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_2']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_3']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_4']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_5']['R3'];?></td>
						<td><?php echo $sum['Projects_cost_6']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Projects_cost_7']['R3'];?></td>
						<td>---</td>
						<td><?php echo $sum['Activity_Cost_1']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_2']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_3']['R3'];?></td>
						<td><?php echo $sum['Activity_Cost_4']['R3'];?></td>
						<td>---</td>
						<td>---</td>
						<td>---</td>
						<td><?php echo $sum['All']['R3'];?></td>
					</tr>
					

				</tbody>
			</table>
		</div>
		
		
	</div>
</body>
</html>