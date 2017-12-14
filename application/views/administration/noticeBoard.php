<?php
	echo View::factory('public/head');
?>
<body class="bg01">
	
    <?php	
	$logohtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()" /></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<form id="formMain" action="<?php echo URL::site('administration/noticeBoard_Insert');?>" method="post" enctype="multipart/form-data">
		<div class="content tongbox">
			<div class="tonglistbox left">
				<h2>職 員 向 け</h2>
				<h3>管理者からのお知らせ</h3>
				<div class="tonglist">
                	<textarea name="txt_ToWorker" rows="" cols=""><?php echo empty($notice)?'':$notice['ToWorker'];?></textarea>					
				</div>
			</div>
			<div class="tonglistbox tonglistbox01 right">
				<h2>保 護 者 向 け</h2>
				<h3>管理者からのお知らせ</h3>
				<div class="tonglist">
                	<textarea name="txt_ToGuardian" rows="" cols=""><?php echo empty($notice)?'':$notice['ToGuardian'];?></textarea>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		</form>
	</div>
	<script>
	function formMainSave(){
		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/noticeBoard_Insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});				
	}
	</script>
</body>
</html>