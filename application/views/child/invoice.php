<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('child/invoice_Index').URL::query(array('time'=>NULL)).'"><input type="button" value="保存せずに戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()" /></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" value="請求書の発行" onClick="formPdfSave()" /></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>    
    
	<div class="mainbox xmainbox14">
	<form id="formMain" action="<?php echo URL::site('child/invoice_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="pdf" value="0"/>
        <input type="hidden" name="ID" value="<?php echo $_GET['ID']?>"/>
		<div class="datelist xdatelist">
			<ul>
				<li><span>園児名</span><input type="text" name="txt_Child_Name" class="txt01" value="<?php if(!empty($child)) echo $child['FamilyName'].$child['GivenName']?>" /><strong style="width:85px;">請求対象月</strong>
                	<?php
                    list($Y,$m) = explode('-',$YearMon);
					?>
					<select name="select_Request_Date_Y" class="select01" >
						<?php foreach ($years as $key =>$val){?>
						<option <?php if($Y==$val['Y']) echo 'selected';?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
						<?php }?>
					</select><em>年</em>
					<select name="select_Request_Date_M" class="select01" >
						<?php foreach ($months as $key =>$val){?>
						<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
						<?php }?>
					</select><em>月</em>
				</li>
			</ul>
		</div>
		<div class="xzhbox">
			<div class="xzhboxtable left">
				<h2><span>基本項目</span><a href="javascript:addLine()">基本項目の新規追加</a></h2>
				<div class="xtablebox">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr><td class="t01">有効/無効</td><td>項目</td><td>金额</td><td class="t02">備考</td></tr>
						</thead>
						<tbody id="base">
							<tr>
								<td><input name="chk_Base_MonCost_Checked" <?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_MonCost_Checked']=='1'?'checked':''; }?> class="checkbox01" type="checkbox" value="1"></td>
								<td><input type="text" readonly style="background:#f2f2f2"  class="txt01" value="月額保育料" /></td>
								<td><input name="txt_Base_MonCost" type="text" class="txt02 Money" value="<?php  if(!empty($invoiceInfo)){echo $invoiceInfo['Base_MonCost'];}else{ echo $monCost;}?>" /><em>円</em></td>
								<td class="t02"><input name="txt_Base_MonCost_Remark" type="text" class="txt02" value="<?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_MonCost_Remark'];}?>" /></td>
							</tr>
							<tr>
								<td><input name="chk_Base_OverCost_Checked" <?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_OverCost_Checked']=='1'?'checked':''; }?> class="checkbox01" type="checkbox" value="1"></td>
								<td><input type="text" readonly style="background:#f2f2f2" class="txt01" value="延長保育料" /></td>
								<td><input name="txt_Base_OverCost" type="text" class="txt02 Money" value="<?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_OverCost'];}else{ echo $overCost;}?>" /><em>円</em></td>
								<td class="t02"><input  name="txt_Base_OverCost_Remark" type="text" class="txt02" value="<?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_OverCost_Remark'];}?>" /></td>
							</tr>
							<tr>
								<td><input name="chk_Base_ProjectCost_Checked" <?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_ProjectCost_Checked']=='1'?'checked':''; }?> class="checkbox01" type="checkbox" value="1"></td>
								<td><input type="text" readonly style="background:#f2f2f2" class="txt01" value="預かり保育(幼稚園型)" /></td>
								<td><input name="txt_Base_ProjectCost" type="text" class="txt02 Money" value="<?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_ProjectCost'];}else{ echo $extraInfo['extraCost'];}?>" /><em>円</em></td>
								<td class="t02"><input  name="txt_Base_ProjectCost_Remark" type="text" class="txt02" value="<?php if(!empty($invoiceInfo)){echo $invoiceInfo['Base_ProjectCost_Remark'];}?>" /></td>
							</tr>
							<?php
							if(!empty($invoiceInfo)){
								$Base_Projects_Checked=explode(';', $invoiceInfo['Base_Projects_Checked']);
								$Base_Projects_Name=explode(';', $invoiceInfo['Base_Projects_Name']);
								$Base_Projects_Cost=explode(';', $invoiceInfo['Base_Projects_Cost']);
								$Base_Projects_Remark=explode('<;>', $invoiceInfo['Base_Projects_Remark']);
								foreach ($Base_Projects_Name as $key =>$val){?>
								<tr>
									<td><input name="chk_Base_Projects_Checked[]" <?php echo in_array($key+1, $Base_Projects_Checked)?'checked':'';?> class="checkbox01" type="checkbox" value="<?php echo $key+1?>"></td>
									<td><input name="txt_Base_Projects_Name[]" type="text" class="txt01" value="<?php echo $Base_Projects_Name[$key];?>" /></td>
									<td><input name="txt_Base_Projects_Cost[]" type="text" class="txt02 Money" value="<?php echo $Base_Projects_Cost[$key];?>" /><em>円</em></td>
									<td class="t02"><input name="txt_Base_Projects_Remark[]" type="text" class="txt02" value="<?php echo $Base_Projects_Remark[$key];?>" /></td>
								</tr>
						<?php 
							}
						}else{							
								$countExtraCost=count($extraInfo['projects']);
								for($i_Extra=1;$i_Extra<=$countExtraCost;$i_Extra++){
							?>
							<tr>
								<td><input name="chk_Base_Projects_Checked[]" class="checkbox01" type="checkbox" value="<?php echo $i_Extra?>"></td>
								<td><input name="txt_Base_Projects_Name[]" type="text" class="txt01" value="<?php echo $extraInfo['projects'][$i_Extra-1]['Project_Name'] ?>" /></td>
								<td><input name="txt_Base_Projects_Cost[]" type="text" class="txt02 Money" value="<?php echo $extraInfo['projects'][$i_Extra-1]['money'];?>" /><em>円</em></td>
								<td class="t02"><input name="txt_Base_Projects_Remark[]" type="text" class="txt02" value="" /></td>
							</tr>
							<?php }?>
							<?php for($j_Extra=$countExtraCost+1;$j_Extra<=10;$j_Extra++){?>
							<tr>
								<td><input name="chk_Base_Projects_Checked[]" class="checkbox01" type="checkbox" value="<?php echo $j_Extra?>"></td>
								<td><input name="txt_Base_Projects_Name[]" type="text" class="txt01" value="" /></td>
								<td><input name="txt_Base_Projects_Cost[]" type="text" class="txt02 Money" value="" /><em>円</em></td>
								<td class="t02"><input name="txt_Base_Projects_Remark[]" type="text" class="txt02" value="" /></td>
							</tr>
						<?php 
							}
						}
						?>					
						</tbody>
					</table>
				</div>
			</div>
			<div class="xzhtext right">
				<div class="datelist xdatelist">
					<ul>
						<li><strong>きょうだい設定</strong><input type="text" class="txt01" value="<?php echo empty($child['siblingOrder'])?'第 1 子':"第 {$child['siblingOrder']} 子";?>" /></li>
						<li><strong>認定ランク</strong><input type="text" class="txt01" value="<?php if(!empty($recogInfo)&&!empty($recogInfo[0]['Recog_Project'])){echo $recogInfo[0]['Recog_Type']=='R1'?$parameter['RECOG_1'][$recogInfo[0]['Recog_Project']]:$parameter['PROJECT'][$recogInfo[0]['Recog_Project']];}?>" /></li>
						<li><strong>現在の認定区分</strong><input type="text" class="txt01" value="<?php if(!empty($recogInfo)){echo $parameter['BASE_INFO']['Recog_Type'][$recogInfo[0]['Recog_Type']];} ?>" /></li>
					</ul>
				</div>
				<div class="xtablett">
					<h2>過去の認定区分</h2>
					<div class="tbbox14">
						<table class="xtable14" width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>認定期間</td><td>認定区分・ランク</td></tr>
							</thead>
							<tbody>
							 <?php if(!empty($recogInfo)){
							 			$key=count($recogInfo);
							 			for ($i=$key;$i>0;$i--){
												$project='';
												if($recogInfo[$i-1]['Recog_Type']=='R1'){
													$project=empty($recogInfo[$i-1]['Recog_Project'])?'':$recogInfo[$i-1]['Recog_Project'];
												}else{
													$project=empty($recogInfo[$i-1]['Recog_Project'])?'':$parameter['PROJECT'][$recogInfo[$i-1]['Recog_Project']];
												} ?>
								<tr><?php if($i==1){?>
										<td><?php echo $recogInfo[0]['Recog_Date'] ?> ～現在</td>
										<td style="text-align: left;padding:0 5px;"><?php echo $parameter['BASE_INFO']['Recog_Type'][$recogInfo[0]['Recog_Type']].'-'.$project;?></td>
									<?php }else{?>
										<td><?php echo $recogInfo[$i-1]['Recog_Date'] ?> ～<?php echo $recogInfo[$i-2]['Recog_Date'] ?></td>
										<td style="text-align: left;padding:0 5px;"><?php echo $parameter['BASE_INFO']['Recog_Type'][$recogInfo[$i-1]['Recog_Type']].'-'.$project;?></td>
									<?php }?>
								</tr>
								<?php }}?>
								<tr><td></td><td></td></tr>
								<tr><td></td><td></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		<div class="xzhbox">
			<div class="xzhboxtable left">
				<h2><span>課外活動</span></h2>
				<div class="xtablebox" id="activityList">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
                            	<td class="t01">有効/無効</td>
                                <td>項目</td>
                                <td>入会金</td>
                                <td>金额</td>
                                <td class="t02">備考</td>
                             </tr>
						</thead>
						<tbody>
						<?php
						if(!empty($invoiceInfo)){
							for($k=1;$k<6;$k++){?>
							<tr>
								<td><input name="chk_Activity_Checked[]" <?php if($invoiceInfo['Activity_Checked_'.$k]) echo 'checked';?> class="checkbox01" type="checkbox" value="<?php echo $k;?>"></td>
                                <td><input name="txt_Activity_Name[]" type="text" class="txt01" value="<?php echo $invoiceInfo['Activity_Name_'.$k]; ?>" /></td>
                                <td>
                                	<input name="chk_Activity_Cost[]" <?php if($invoiceInfo['Activity_Cost_Checked_'.$k]) echo 'checked';?> class="checkbox01" type="checkbox" value="<?php echo $k;?>" />
                                    <input name="hidden_Activity_Cost[]" type="hidden" value="<?php echo $invoiceInfo['Activity_Cost_'.$k];?>" />
                                </td>
                                <td><input name="txt_Activity_PricePerM[]" type="text" class="txt02 Money"  value="<?php echo $invoiceInfo['Activity_PricePerM_'.$k];?>" /><em>円</em></td>
                                <td class="t02"><input name="txt_Activity_Remark[]" type="text" class="txt02" value="<?php echo $invoiceInfo['Activity_Remark_'.$k];?>" /></td>
                            </tr>						
						<?php 
							}
						}else{
							$k = 0;							
							foreach($activitiesSet as $key => $val){
								if(empty($val['Activity_Checked'])) continue;
								$k++;
						?>
							<tr>
								<td><input name="chk_Activity_Checked[]" <?php if(!in_array($val['ID'],$activitiesCheckedIDArr)) echo 'onclick="return false;"';?> class="checkbox01" type="checkbox" value="<?php echo $k;?>"></td>
                                <td><input name="txt_Activity_Name[]" type="text" class="txt01" value="<?php echo $val['Activity_Name']; ?>" /></td>
                                <td>
                                	<input name="chk_Activity_Cost[]" class="checkbox01" type="checkbox" value="<?php echo $k;?>" />
                                    <input name="hidden_Activity_Cost[]" type="hidden" value="<?php echo $val['Activity_Cost'];?>" />
                                </td>
                                <td><input name="txt_Activity_PricePerM[]" type="text" class="txt02 Money"  value="<?php echo $val['Activity_Price'];?>" /><em>円</em></td>
                                <td class="t02"><input name="txt_Activity_Remark[]" type="text" class="txt02" value="" /></td>
                            </tr>						
						<?php		
							}
							for($j=$k+1;$j<6;$j++){
						?>
								<tr>
									<td><input name="chk_Activity_Checked[]" class="checkbox01" type="checkbox" value=""></td>
									<td><input name="txt_Activity_Name[]" type="text" class="txt01" value="" /></td>
									<td>
                                        <input name="chk_Activity_Cost[]" class="checkbox01" type="checkbox" value="" />
                                        <input name="hidden_Activity_Cost[]" type="hidden" value="" />
                                    </td>
                                	<td><input name="txt_Activity_PricePerM[]" type="text" class="txt02 Money"  value="" /><em>円</em></td>
                                	<td class="t02"><input name="txt_Activity_Remark[]" type="text" class="txt02" value="" /></td>
								</tr>
                        <?php
						 	}
						}
						?>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="xzhtext right">
				<div class="xtablett xtablett01">
					<h2>課外活動履修状況</h2>
					<div class="tbbox14">
						<table class="xtable14" width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>課外活動名</td><td>履修状況</td></tr>
							</thead>
							<tbody>
							<?php  if(!empty($activitiesSet)){
										foreach ($activitiesSet as $key=>$val){?>
								<tr>
									<td><?php echo $val['Activity_Name']?></td>
									<td>
                                    	<?php
                                        	if($child['Activities_Date_'.$val['ID']]<date('Y-m-d')&&!empty($child['Activities_Date_'.$val['ID']])){
												echo $child['Activities_Date_'.$val['ID']].'～ 現在';
											}else{
												echo '未履修';	
											}										
										?>
                                    </td>
								</tr>
								<?php }}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		<div class="xzhboxt">
			<div class="xzhboxtable left">
				<h2><span>用品購入</span></h2>
				<div class="xtablebox">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr><td class="t01">有効/無効</td><td>項目</td><td>金额</td><td class="t02">備考</td></tr>
						</thead>
						<tbody>
						<?php 
							if(!empty($invoiceInfo)){
								$Buy_Checked=explode(';', $invoiceInfo['Buy_Checked']);
								$Buy_GoodsNames=explode(';', $invoiceInfo['Buy_GoodsNames']);
								$Buy_GoodsPrices=explode(';', $invoiceInfo['Buy_GoodsPrices']);
								$Buy_GoodsRemark=explode('<;>', $invoiceInfo['Buy_GoodsRemark']);
								foreach ($Buy_GoodsNames as $key =>$val){?>
							<tr>
								<td><input name="chk_Buy_Checked[]" <?php echo in_array($key+1, $Buy_Checked)?'checked':'';?> class="checkbox01" type="checkbox" value="<?php echo $key+1?>"></td>
								<td><input name="txt_Buy_GoodsNames[]" type="text" class="txt01" value="<?php echo $Buy_GoodsNames[$key] ?>" /></td>
								<td><input name="txt_Buy_GoodsPrices[]" type="text" class="txt02 Money" value="<?php echo $Buy_GoodsPrices[$key] ?>" /><em>円</em></td>
								<td class="t02"><input name="txt_Buy_GoodsRemark[]" type="text" class="txt02" value="<?php echo $Buy_GoodsRemark[$key] ?>" /></td>
							</tr>	
							
						<?php 
								}
							}else{?>
							<?php
								 $countBuy=count($buyGoodsInfo['thisYearMon']);
									for($i_buy=1;$i_buy<=$countBuy;$i_buy++){
							?>
								<tr>
									<td><input name="chk_Buy_Checked[]" class="checkbox01" type="checkbox" value="<?php echo $i_buy?>"></td>
									<td><input name="txt_Buy_GoodsNames[]" type="text" class="txt01" value="<?php echo $buyGoodsInfo['thisYearMon'][$i_buy-1]['Goods_Name']?>" /></td>
									<td><input name="txt_Buy_GoodsPrices[]" type="text" class="txt02 Money" value="<?php echo $buyGoodsInfo['thisYearMon'][$i_buy-1]['Goods_Price']?>" /><em>円</em></td>
									<td class="t02"><input name="txt_Buy_GoodsRemark[]" type="text" class="txt02" value="<?php echo $buyGoodsInfo['thisYearMon'][$i_buy-1]['Goods_Remark']?>" /></td>
								</tr>			
							 <?php 
							 		}
							  		for($j_buy=$countBuy+1;$j_buy<=10;$j_buy++){
							?>
								<tr>
									<td><input name="chk_Buy_Checked[]" class="checkbox01" type="checkbox" value="<?php echo $j_buy?>"></td>
									<td><input name="txt_Buy_GoodsNames[]" type="text" class="txt01" value="" /></td>
									<td><input name="txt_Buy_GoodsPrices[]" type="text" class="txt02 Money" value="" /><em>円</em></td>
									<td class="t02"><input name="txt_Buy_GoodsRemark[]" type="text" class="txt02" value="" /></td>
								</tr>
							<?php 
                                }
                            }
                            ?>							
						</tbody>
					</table>
				</div>
			</div>
			<div class="xzhtext right">
				<div class="xtablett xtablett01">
					<h2>用品購入履歴</h2>
					<div class="tbbox14 xtbbox14">
						<table class="xtable14" width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>依頼確認日</td><td>用品名</td><td>金額</td></tr>
							</thead>
							<tbody>
							<?php if(!empty($buyGoodsInfo['all'])){
										foreach ($buyGoodsInfo['all'] as $key =>$val){?>
								<tr>
									<td><?php echo substr($val['Confirm_Date'], 0,10) ?></td>
									<td><?php echo $val['Goods_Name']?></td>
									<td class="Money"><?php echo $val['Goods_Price']?></td>
								</tr>
							<?php }}?>
								
								<tr><td></td><td></td><td></td></tr>
								<tr><td></td><td></td><td></td></tr>
									
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		</form>
	</div>
	<script>
	$(function(){
		//課外活動 补充的行为了美观 但是不能编辑
		$('#activityList input[name="txt_Activity_Name[]"]').each(function(index, element) {
            if($(this).val()==''){
				$(this).parent().parent().find('input[type="checkbox"]').on('click',this,function(){return false;}).end().find('input[type="text"]').attr('readonly',true).end().find('input[type="text"]').css('background','#f2f2f2');	
			}else{
				var trObj = $(this).parent().parent();
				var cac = trObj.find('input[name="chk_Activity_Checked[]"]:eq(0)');
				var cacost = trObj.find('input[name="chk_Activity_Cost[]"]:eq(0)');
				var tap = trObj.find('input[name="txt_Activity_PricePerM[]"]:eq(0)');
				var tapVal=tap.val();				
				var hacost = trObj.find('input[name="hidden_Activity_Cost[]"]:eq(0)');
				var hacostVal =hacost.val();
				if(!cac.prop('checked')){
					cacost.on('click',this,function(){return false;});
				}else{
					cacost.off('click').on('click',this,function(){
						if($(this).prop('checked')){
							tap.val(parseInt(tapVal)+parseInt(hacostVal));
						}else{
							tap.val(parseInt(tapVal));
						}
					});
				}				
				cac.on('click',this,function(){
					if($(this).prop('checked')){
						cacost.off('click').on('click',this,function(){
							if($(this).prop('checked')){
								
								tap.val(parseInt(tapVal)+parseInt(hacostVal));
							}else{
								tap.val(parseInt(tapVal));
							}
						});
					}else{
						if($(this).prop('checked')){
							tap.val(parseInt(tapVal));
							$(this).prop('checked',false);
						}
						cacost.off('click').on('click',this,function(){ return false;});
					}
				});
				
			}
        });
		
		$('select[name="select_Request_Date_Y"]').on('change',this,function(){Go()});
		$('select[name="select_Request_Date_M"]').on('change',this,function(){Go()});

		$('.Money').each(function(){
		    $this=$(this);
		    var str=toThousands($this.val());
		    if(str!="0"){
		    	$this.val(str);
			    }		    
		});

		$('.Money').change(function(){
			$(this).val(toThousands($(this).val()));
		});
		
	});
	
		
	function addLine(){	
		var num= $("#base tr").length;
		$('#base').find("tr:eq(3)").clone().find("input:text").val("").end().find("input:checkbox").val(num-2).end().find("input:checkbox").attr('checked',false).end().appendTo("#base");
		$('#base').find("tr:last .Money").click(function(){
			$(this).val(toThousands($(this).val()));
		});
		$('#base').find("tr:last .Money").change(function(){
			$(this).val(toThousands($(this).val()));
		});
		return false;
	}

	function formMainSave(){	

		$('#btn_Save').attr('disabled',"true");
		$('input[name="pdf"]').val(0);
		$('#formMain').prop('target','_self');
		
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('child/invoice_Insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});
		
	}
	
	function formPdfSave(){
		$('input[name="pdf"]').val(1);
		$('#formMain').prop('target','_blank').submit();
	}
	
	 function Go(){
		location.href="<?php echo URL::site('child/invoice').URL::query(array('YearMon'=>NULL));?>&YearMon="+$('select[name="select_Request_Date_Y"]').val()+'-'+$('select[name="select_Request_Date_M"]').val();	
	}
	
	</script>
</body>
</html>