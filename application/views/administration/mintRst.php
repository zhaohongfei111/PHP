<?php
	echo View::factory('public/head');
?>
<body class="bg01">
	<?php	
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<div class="xtbbox" style="padding-left:0;">
					<div class="xtb" style="margin:0 auto;height:35px;">
                    <?php echo $alert;?>
                    </div>
				</div>

			</div>
		</div>
	</div>
	<script>
    function backUrl(){
		location.href="<?php echo URL::site('administration/mint');?>";	
	}
    setTimeout('backUrl()',3000);
    </script>
</body>
</html>