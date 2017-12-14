<?php
echo View::factory('public/head');
?>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.txtright {text-align:right;font-size:18px;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;padding-top:0px;}
	.xtittop {text-align:center;}
	.xtittop h2 {line-height:26px;font-size:22px; margin:5px 0; padding:0;}
	.xtittop h2 span {border:solid 1px #000;display:inline-block;width:40px;height:40px;line-height:40px;text-align:center;}
	#min {height:600px;}
	.wtablebox01 table {border-left:solid 1px #000;border-top:solid 1px #000;}
	.wtablebox01 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;height:30px;line-height:30px;text-align:left;padding:0 10px;}
	.wtablebox01 table td.t01 {text-align:right;}
	.wtablebox01 table td.tt {text-align:center;}
	.txt01,.txt {font-size:14px;}
	.txt01 {text-align:right;}
	.txt01 p{margin:0; padding:0;}
	.txt01 span {padding:0 5px;} 
</style>
<body>	
	<div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">	
		<div class="xtittop">
			<h2><?php echo substr($yearMon, 0,4);?>年度</h2>
			<h2>保 育 料 請 求 書</h2>
			<h2 style="text-decoration:underline;"><?php echo substr($yearMon, 5,2);?>月分</h2>
			<h2><span>正</span></h2>
		</div>
		<div class="txtright" style="padding-right:20px;"><span>園 児 名：<?php echo empty($invoiceInfo)?'':$invoiceInfo['Child_Name'];?></span></div>
		<div id="min">
            <div class="wtablebox01">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td>項　目</td>
                            <td>金　額</td>
                            <td>備　考</td>
                        </tr>
                        <?php
                         if(!empty($invoiceInfo)){
                              $all='';
                        ?>
                        <tr>
                            <td>月額保育料</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_MonCost_Checked']=='1'){$all+=$invoiceInfo['Base_MonCost'];echo number_format($invoiceInfo['Base_MonCost']);}?>円</td>
                            <td><?php echo $invoiceInfo['Base_MonCost_Checked']=='1'?$invoiceInfo['Base_MonCost_Remark']:'';?></td>
                        </tr>
                        <tr>
                            <td>延長保育料</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_OverCost_Checked']=='1'){echo number_format($invoiceInfo['Base_OverCost']);$all+=$invoiceInfo['Base_OverCost'];}?>円</td>
                            <td><?php echo $invoiceInfo['Base_OverCost_Checked']=='1'?$invoiceInfo['Base_OverCost_Remark']:'';?></td>
                        </tr>
                        <tr>
                            <td>預かり保育(幼稚園型)</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_ProjectCost_Checked']=='1'){echo number_format($invoiceInfo['Base_ProjectCost']);$all+=$invoiceInfo['Base_ProjectCost'];}?>円</td>
                            <td><?php echo $invoiceInfo['Base_ProjectCost_Checked']=='1'?$invoiceInfo['Base_ProjectCost_Remark']:'';?></td>
                        </tr>
                        <?php
                        $Base_Projects_Checked=array_filter(explode(';', $invoiceInfo['Base_Projects_Checked']));
                        $Base_Projects_Name=explode(';', $invoiceInfo['Base_Projects_Name']);
                        $Base_Projects_Cost=explode(';', $invoiceInfo['Base_Projects_Cost']);
                        $Base_Projects_Remark=explode('<;>', $invoiceInfo['Base_Projects_Remark']);
                        foreach ($Base_Projects_Checked as $key =>$val){
                        ?>
                          <tr>
                            <td><?php echo $Base_Projects_Name[$val-1];?></td>
                            <td class="t01 "><?php echo number_format((double)$Base_Projects_Cost[$val-1]);$all+=$Base_Projects_Cost[$val-1];?>円</td>
                            <td><?php echo $Base_Projects_Remark[$val-1];?></td>
                          </tr>							 					  
                        <?php }?>
                        
                        <?php
                        for($i=1;$i<6;$i++){
                            if($invoiceInfo['Activity_Checked_'.$i]){
                        ?>
                        <tr>
                            <td><?php echo $invoiceInfo['Activity_Name_'.$i];?></td>
                            <td class="t01 "><?php echo number_format($invoiceInfo['Activity_PricePerM_'.$i]);$all+=$invoiceInfo['Activity_PricePerM_'.$i];?>円</td>
                            <td><?php echo $invoiceInfo['Activity_Remark_'.$i];?></td>
                        </tr>					
                        <?php
                            }
                        }
                        ?>
                            
                        <?php $Buy_Checked=array_filter(explode(';', $invoiceInfo['Buy_Checked']));
                              $Buy_GoodsNames=explode(';', $invoiceInfo['Buy_GoodsNames']);
                              $Buy_GoodsPrices=explode(';', $invoiceInfo['Buy_GoodsPrices']);
                              $Buy_GoodsRemark=explode('<;>', $invoiceInfo['Buy_GoodsRemark']);
                              foreach ($Buy_Checked as $key =>$val){?>
                                <tr>
                                    <td><?php echo $Buy_GoodsNames[$val-1];?></td>
                                    <td class="t01 "><?php echo number_format((double)$Buy_GoodsPrices[$val-1]);$all+=$Buy_GoodsPrices[$val-1];?>円</td>
                                    <td><?php echo $Buy_GoodsRemark[$val-1];?></td>
                                </tr>							  
                        <?php }?>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>合計:</td>
                            <td class="t01 "><?php echo empty($all)?'':number_format($all);?>円</td>
                            <td></td>
                        </tr>
                        <?php }else{?>
                        <tr>
                            <td>月額保育料</td>
                            <td class="t01 ">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>延長保育料</td>
                            <td class="t01 ">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>>預かり保育(幼稚園型)</td>
                            <td class="t01 ">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="txt">
                <p><span>※保育料は毎月20日に振替させていただきます。</span></p>
            </div>
        </div>
		<div class="txt01" style="height:160px;padding-top:10px;background:url(<?php echo $media.'images/s02.jpg?'.rand(0,9999);?>) no-repeat 460px -20px;">
			<p><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Name1']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Name2']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':'〒'.$data_baseSet['Address_Area']?></span><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Address']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':'TEL:'.$data_baseSet['Kindergarden_TEL']?></span><span><?php echo empty($data_baseSet)?'':'FAX:'.$data_baseSet['Kindergarden_FAX']?></span></p>
		</div>		
	</div>
    <P style='page-break-after:always'>&nbsp;</P>
    <div>
		<img src="<?php echo $media;?>images/logo.jpg" />
	</div>
	<div class="content">	
		<div class="xtittop">
			<h2><?php echo substr($yearMon, 0,4);?>年度</h2>
			<h2>保 育 料 請 求 書</h2>
			<h2 style="text-decoration:underline;"><?php echo substr($yearMon, 5,2);?>月分</h2>
			<h2><span>副</span></h2>
		</div>
		<div class="txtright" style="padding-right:20px;"><span>園 児 名：<?php echo empty($invoiceInfo)?'':$invoiceInfo['Child_Name'];?></span></div>
		<div id="min">
            <div class="wtablebox01">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td>項　目</td>
                            <td>金　額</td>
                            <td>備　考</td>
                        </tr>
                        <?php
                         if(!empty($invoiceInfo)){
                              $all='';
                        ?>
                        <tr>
                            <td>月額保育料</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_MonCost_Checked']=='1'){$all+=$invoiceInfo['Base_MonCost'];echo number_format($invoiceInfo['Base_MonCost']);}?>円</td>
                            <td><?php echo $invoiceInfo['Base_MonCost_Checked']=='1'?$invoiceInfo['Base_MonCost_Remark']:'';?></td>
                        </tr>
                        <tr>
                            <td>延長保育料</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_OverCost_Checked']=='1'){echo number_format($invoiceInfo['Base_OverCost']);$all+=$invoiceInfo['Base_OverCost'];}?>円</td>
                            <td><?php echo $invoiceInfo['Base_OverCost_Checked']=='1'?$invoiceInfo['Base_OverCost_Remark']:'';?></td>
                        </tr>
                        <tr>
                            <td>預かり保育(幼稚園型)</td>
                            <td class="t01 "><?php if($invoiceInfo['Base_ProjectCost_Checked']=='1'){echo number_format($invoiceInfo['Base_ProjectCost']);$all+=$invoiceInfo['Base_ProjectCost'];}?>円</td>
                            <td><?php echo $invoiceInfo['Base_ProjectCost_Checked']=='1'?$invoiceInfo['Base_ProjectCost_Remark']:'';?></td>
                        </tr>
                        <?php
                       		$Base_Projects_Checked=explode(';', $invoiceInfo['Base_Projects_Checked']);
                       		$Base_Projects_Name=explode(';', $invoiceInfo['Base_Projects_Name']);
                        	$Base_Projects_Cost=explode(';', $invoiceInfo['Base_Projects_Cost']);
                        	$Base_Projects_Remark=explode('<;>', $invoiceInfo['Base_Projects_Remark']);
                        	foreach ($Base_Projects_Checked as $key =>$val){
                        ?>
                          <tr>
                            <td><?php echo $Base_Projects_Name[$val-1];?></td>
                            <td class="t01 "><?php echo number_format((double)$Base_Projects_Cost[$val-1]);$all+=$Base_Projects_Cost[$val-1];?>円</td>
                            <td><?php echo $Base_Projects_Remark[$val-1];?></td>
                          </tr>							 					  
                        <?php }?>
                        
                        <?php
                        for($i=1;$i<6;$i++){
                            if($invoiceInfo['Activity_Checked_'.$i]){
                        ?>
                        <tr>
                            <td><?php echo $invoiceInfo['Activity_Name_'.$i];?></td>
                            <td class="t01 "><?php echo number_format($invoiceInfo['Activity_PricePerM_'.$i]);$all+=$invoiceInfo['Activity_PricePerM_'.$i];?>円</td>
                            <td><?php echo $invoiceInfo['Activity_Remark_'.$i];?></td>
                        </tr>					
                        <?php
                            }
                        }
                        ?>
                            
                        <?php $Buy_Checked=array_filter(explode(';', $invoiceInfo['Buy_Checked']));
                              $Buy_GoodsNames=explode(';', $invoiceInfo['Buy_GoodsNames']);
                              $Buy_GoodsPrices=explode(';', $invoiceInfo['Buy_GoodsPrices']);
                              $Buy_GoodsRemark=explode('<;>', $invoiceInfo['Buy_GoodsRemark']);
                              foreach ($Buy_Checked as $key =>$val){?>
                                <tr>
                                    <td><?php echo $Buy_GoodsNames[$val-1];?></td>
                                    <td class="t01 "><?php echo number_format((double)$Buy_GoodsPrices[$val-1]);$all+=$Buy_GoodsPrices[$val-1];?>円</td>
                                    <td><?php echo $Buy_GoodsRemark[$val-1];?></td>
                                </tr>							  
                        <?php }?>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>合計:</td>
                            <td class="t01"><?php echo number_format($all);?>円</td>
                            <td></td>
                        </tr>
                        <?php }else{?>
                        <tr>
                            <td>月額保育料</td>
                            <td class="t01">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>延長保育料</td>
                            <td class="t01">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>>預かり保育(幼稚園型)</td>
                            <td class="t01">円</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="t01"></td>
                            <td></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
		<div class="txt01">
			<p><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Name1']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Name2']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':'〒'.$data_baseSet['Address_Area']?></span><span><?php echo empty($data_baseSet)?'':$data_baseSet['Kindergarden_Address']?></span></p>
			<p><span><?php echo empty($data_baseSet)?'':'TEL:'.$data_baseSet['Kindergarden_TEL']?></span><span><?php echo empty($data_baseSet)?'':'FAX:'.$data_baseSet['Kindergarden_FAX']?></span></p>
		</div>		
	</div>


</body>
</html>