<?php
echo View::factory('public/head');
?>
<body>
	<?php	
	$logohtml = '<div class="topleft right">
					<img src="'.$media.'images/jd07.jpg"/>
				</div>';	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>
	<form id="formMain" action="<?php echo URL::site('child/step7_insert').URL::query();?>" method="post" enctype="multipart/form-data">
	<input name="txt_ID" type="hidden" value="<?php echo $ID;?>" />
	<div class="mianbox">
		<div class="content">
			<div class="datebox">
            
				<?php echo View::factory('child/step1_form');?>
				<?php echo View::factory('child/step2_form');?>
                <?php echo View::factory('child/step3_form');?>
                <?php echo View::factory('child/step4_form');?>
                <?php echo View::factory('child/step5_form');?>
                <?php echo View::factory('child/step6_form');?>	
				
				<div class="databox databox022">
					<h3>上 記 入 力 内 容 の 通 り 申 請 し ま す。よ ろ し い で す か？</h3>
				</div>
				
				<div class="databut">
					<input type="button" value="はい（確認して申請する）" onClick="$('#formMain').submit();" />
					<input type="button" value="いいえ（入力内容を訂正する）" onClick="location.href='<?php echo URL::site('child/step1').URL::query();?>'" />
				</div>
			</div>
		</div>
	</div>
	</form>
    
    <script type="text/javascript">
	$(document).ready(function() {
		$('input[type!="button"]').attr('disabled',true);
		$('input[name="txt_ID"]').attr('disabled',false);
		$('select').attr('disabled',true);
		$('textarea').attr('disabled',true);
	});
    </script>
</body>
</html>