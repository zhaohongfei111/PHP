<?php
echo View::factory('public/head');
?>
<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
?>

	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>連　絡　掲　示　板　詳　細 (お休み)</h2></div>
			<div class="pageboxt11 pageboxt113">
            	<div class="tbb"><a id="file" href="javascript:void(0);"><img src="<?php echo $media;?>images/tb03.gif"></a></div>
				<div class="xpatop">受付時間<input type="text" value="<?php echo $rest_Info['Submit_Date']; ?>"><h2>お 休 み</h2></div>			
				<div class="pagetablet11">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<td class="td01">お名前</td>
								<td class="td02">クラス</td>
								<td class="td03">お休み予定期間</td>
								<td class="td04" style="width:234px;"></td>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span><?php echo $rest_Info['Name'];?></span></td>
								<td><span><?php if(isset($parameter['BASE_INFO']['CLASS'][$rest_Info['Class']])){echo $parameter['BASE_INFO']['CLASS'][$rest_Info['Class']];}?></span></td>
								<td><span><?php echo $rest_Info['LeaveDate'];?></span></td>
								<td><span><?php echo $rest_Info['LeaveDate_End'];?></span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>理由(内容詳細)</h3>
				<div class="pagetxtt11"><textarea readonly rows="" cols=""><?php echo $rest_Info['Reason'];?></textarea></div>
				<div class="xpatop xpatop01 right">登録者<input readonly type="text" value="<?php echo $rest_Info['GuardianName'];?>"></div>
				<div class="clear"></div>
			</div>
			
			<div class="databut tdatabut">
				<input type="button" value="前画面に戻る"  onClick="location.href='<?php echo URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL));?>'" />
			</div>
			
		</div>
	</div>
	<script>
	$(function(){		
		$('#file').bind('click',function(){addOverlay(1200,1200,'<?php echo URL::site('communication/commFile').URL::query(array('comm_group'=>$rest_Info['comm_group'],'notEdit'=>true));?>')});
	})
	</script>
    <link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>
</body>
</html>