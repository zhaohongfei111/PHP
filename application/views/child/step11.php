<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = $SELLEVEL == "Reader"?'':'<div class="topright topright01 right">
					<p><input type="button" value="編　集" onclick="location.href=\''.URL::site('child/step12').URL::query().'\'" /></p>
				</div>';
	if(array_key_exists('from',$_GET)){				
	$logohtml .= '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="戻　る" /></a></p>
	 			</div>';
	}
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<?php echo View::factory('child/step1_form');?>
				<?php echo View::factory('child/step2_form');?>
                <?php echo View::factory('child/step3_form');?>
                <?php echo View::factory('child/step4_form');?>
                <?php echo View::factory('child/step5_form');?>
                <?php echo View::factory('child/step6_form');?>	
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		$('input[type!="button"]').attr('disabled',true);
		$('select').attr('disabled',true);
		$('textarea').attr('disabled',true);
	});
    </script>
</body>
</html>