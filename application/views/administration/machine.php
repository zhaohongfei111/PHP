<?php
	echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
				<p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る"></a></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()"></p>
			</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>    

	<div class="mianbox">
		<div class="content">
			<div class="datebox">
			<form id="formMain" action="<?php echo URL::site('administration/machine_insert').URL::query();?>" method="post" enctype="multipart/form-data">
				<div class="pbut"><input type="button" value="登降園リーダー機器追加" onClick="addLine()"/></div>	
				<div id='Machines'>
				<?php 	$count=0;
						if(!empty($machine_Info)){
							$count=count($machine_Info);
							foreach ($machine_Info as $key => $val){?>
				<div class="plistbox" >
					<ul>
						<li><span>機器名称</span><input type="text" name="txt_Machine_Name[]" value="<?php echo $val['Machine_Name'];?>" /></li>
						<li><span>設置場所</span><input type="text" name="txt_Machine_Address[]" value="<?php echo $val['Machine_Address'];?>" /></li>
						<li><span>IP Address</span><input type="text" name="txt_Machine_IP[]" value="<?php echo $val['Machine_IP'];?>" /></li>
						<li><span>Port Number</span><input type="text" name="txt_Machine_Port[]" value="<?php echo $val['Machine_Port'];?>" /></li>
					</ul>
				</div>				
				<?php }}?>
				
				<?php if($count<3){
						for($i=$count;$i<3;$i++){?>			
				<div class="plistbox" >
					<ul>
						<li><span>機器名称</span><input type="text" name="txt_Machine_Name[]"/></li>
						<li><span>設置場所</span><input type="text" name="txt_Machine_Address[]"/></li>
						<li><span>IP Address</span><input type="text" name="txt_Machine_IP[]"/></li>
						<li><span>Port Number</span><input type="text" name="txt_Machine_Port[]"/></li>
					</ul>
				</div>
				<?php } }?>
							
				</div>
				</form>
				</div>
			</div>
		</div>
	<script>
	function addLine(){	
		var count= $('#Machines').find(".plistbox").length;
		if(count>=5){
			alert("入力欄数は最大５個です。");
			return false;
			}
		$('#Machines').find("div:eq(0)").clone().find("input").val("").end().appendTo("#Machines");
		return false;
	}

	function formMainSave(){

		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/machine_insert');?>",
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