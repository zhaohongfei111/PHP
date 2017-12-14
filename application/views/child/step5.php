<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/step1To6LogoHtml'));
	?>
<form id="formMain" action="<?php echo URL::site('child/step5_insert').URL::query();?>" method="post" enctype="multipart/form-data">
	<input name="txt_ID" type="hidden" value="<?php echo $ID;?>" />
    <input name="halfwaySave" type="hidden" value="True" />
	<div class="mianbox">	
		<div class="content">
			<div class="datebox">
				<?php echo View::factory('child/step5_form');?>
				
				<div class="databut">
					<input type="button" value="前 頁に 戻 る"  onClick="location.href='<?php echo URL::site('child/step4').URL::query();?>'"/>
					<input type="button" value="次 頁へ" onClick ="formMainSave()" />
				</div>
			</div>
		</div>
	</div>
</form>
</body>
</html>