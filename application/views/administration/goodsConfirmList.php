<?php
	echo View::factory('public/head');
?>
<body class="bg01">
	<?php
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>
                <div class="topright topright01 topright03 right">
                    <p><a href="'.URL::site('administration/buyGoodsConfirm').'"><input style="width:220px;background:#FC6;" type="button" value="受用品購入依頼の確認画面に戻る" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
    
	<div class="mianbox">
		<div class="maintablebox">
        	<div class="xdata">
            	受付年の選択
				<select name="Confirm_Year" onChange="location.href='<?php echo URL::site('administration/confirmList');?>?Confirm_Year='+$(this).val()">
                <?php foreach($confirm_Year as $key => $val){?>
                	<option value="<?php echo $val['west'];?>" <?php if($current_Year == $val['west']) echo "selected";?>><?php echo $val['west'];?></option>
                <?php }?>
                </select>
                年
            </div>
        
			<div class="topright topright01 xtopright04">
				<p><input type="button" value="用品購入受付済み一覧" /></p>
			</div>
			<div class="mtablebox">
				<div class="mtable mtable02">
					<div class="tabright">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<td>NO.</td>
									<td>保護者名</td>
									<td>園児名</td>
									<td>購入希望用 品</td>
									<td>金额</td>
									<td>依頼受付日時</td>
									<td>確認日</td>
								</tr>
							</thead>
							<tbody>
							<?php $num=1; foreach ($confirm_Data as $key => $val){?>
								<tr>
									<td><?php echo $num;?></td>
									<td><?php echo $val['Guardian_Name']?></td>
									<td><?php echo $val['Child_Name']?></td>
									<td><?php echo $val['Goods_Name']?></td>
									<td><?php echo $val['Goods_Price']?></td>
									<td><?php echo $val['Submit_Date']?></td>
									<td><?php echo $val['Confirm_Date']?></td>
								</tr>
								<?php $num++;}?>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
		
	</div>
	
	
	
	
</body>
</html>