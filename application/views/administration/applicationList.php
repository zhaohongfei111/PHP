<?php
	echo View::factory('public/head');
?>
<body class="bg01">    
    <?php	
	$logohtml = '<div class="topright topright04 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<div class="maintablebox">
			<div class="datelist" style="padding:10px 0;">
				<ul>
					<li><strong style="width:110px;">受付年の選択</strong><select name="select" style="width:120px;" onChange="location.href='<?php echo URL::site('administration/applicationList');?>?year='+$(this).val()">
					<?php foreach ($years as $key =>$val){?>
						<option value="<?php echo $val['west'];?>" <?php if($current_Year == $val['west']) echo "selected";?>><?php echo $val['west'];?></option>
					<?php }?>
						</select>
					<em>年</em></li>
				</ul>
			</div>
			<div class="topright topright10">
				<p><input type="button" style="width:240px;border:2px #fff solid;;background:#a6a6a6;margin-left:230px;margin-bottom:5px;" value="園児情報編集の申請履歴一覧" /></p>
			</div>
			<div class="mtablebox">
				<div class="mtable xmtable0">
					<div class="tabright">
						<table width="60%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<td>NO.</td>
									<td>保護者名</td>
									<td>園児名</td>
									<td>申請受付日時</td>
									<td>申請理由</td>
								</tr>
							</thead>
							<tbody>
							<?php foreach($list as $key =>$val){?>
								<tr>
									<td><?php echo $key+1;?></td>
									<td><?php echo $val['Guardian_Name'];?></td>
									<td><?php echo $val['Child_Name'];?></td>
									<td><?php echo $val['Submit_Date'];?></td>
									<td><?php echo $val['Reason'];?></td>							
								</tr>							
							<?php }?>								
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