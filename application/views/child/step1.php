<?php
echo View::factory('public/head');
?>
<body>	
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/step1To6LogoHtml'));
	?>
    <form id="formMain" action="<?php echo URL::site('child/step1_insert').URL::query();?>" method="post" enctype="multipart/form-data">
    <input name="txt_ID" type="hidden" value="<?php echo $child_Info['ID'];?>" />
    <input name="halfwaySave" type="hidden" value="True" />	
	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<?php echo View::factory('child/step1_form'); ?>
				<div class="databut">
					<input type="button" value="キャンセル"  onClick="location.href='<?php echo URL::site('index/index').URL::query();?>'"/>
					<input type="button" value="次 頁へ" onClick ="formMainSave()" />
				</div>
			</div>
		</div>
	</div>
	</form>
</body>
</html>