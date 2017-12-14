<?php
echo View::factory('public/head');
?>
<body>
<?php
	$logohtml = '<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()"/></p>
				</div>';
	if(array_key_exists('from',$_GET)){
	$logohtml .= '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'#tips'.$ID.'"><input type="button" value="園児一覧に戻る" /></a></p>
				</div>';
	}
				
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
    <form id="formMain" action="<?php echo URL::site('child/step12_insert').URL::query();?>" method="post" enctype="multipart/form-data">
    <input name="txt_ID" type="hidden" value="<?php echo $child_Info['ID'];?>" />
    <input name="halfwaySave" type="hidden" value="False" />
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
    </form>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#formMain').validationEngine('attach');
	});

    function formMainSave(){
    	$('#btn_Save').attr('disabled',"true");

    	var Data = new FormData($("#formMain" )[0]);  
    	$.ajax({
    		   type: "POST",
    		   url: "<?php echo URL::site('child/step12_insert');?>",
    		   async: false,  
    	       cache: false,  
    	       contentType: false,  
    	       processData: false,
    		   dataType: 'json',
    		   data: Data,
    		   error: function(){alert('ajaxエラー');},
    		   success: function(json){		 
    			addSaveOverlay(1000,400,json['result']);			   
    		   }
    		});	
	}
    </script>
</body>
</html>