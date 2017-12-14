<?php
echo View::factory('public/head');
?>
<body>
	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<?php echo View::factory('child/step1_form');?>
                <?php
                if(!array_key_exists('fromStep1',$_GET)){
				?>
				<?php echo View::factory('child/step2_form');?>
                <?php echo View::factory('child/step3_form');?>
                <?php echo View::factory('child/step4_form');?>
                <?php echo View::factory('child/step5_form');?>
                <?php echo View::factory('child/step6_form');?>	
                <?php }?>
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