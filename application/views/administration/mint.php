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
    <div class="mianbox" style="margin-top:160px;">
		<div class="content">
			<div class="mainbox0">
				<div class="maintabletop<?php if(count($CLASS)>=8) echo ' maintabletop01'?>">
					<ul>				
						<?php foreach ($CLASS as $key =>$val){?>
                            <li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
                        <?php }?>
                    </ul>
				</div>
				<div class="maintable xmaintable">
					<div class="xtbbox" style="padding-left:0;">
                    	<?php foreach ($CLASS as $key =>$val){?>
						<div id="<?php echo 'tab_con_'.$key?>" class="xtb" style="margin:0 auto;height:35px; <?php if($key!='C1'){echo 'display:none';}?>"><a href="javascript:void(0);">Mintデータ読出</a></div>
                        <?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
	$('.xtb').on('click',function(){
		var idStr = this.id;
		var Class = idStr.substr(8);
		socketSend(Class,this);	
	});	
	
});
function switchTab(n){  
	for(var i = 1; i <= <?php echo count($CLASS);?>; i++){  
		$('#tab_C'+i) .removeClass();
		$('#tab_con_C'+i) .hide(); 
	} 
	$('#tab_'+n).addClass("cn");
	$('#tab_con_'+n) .show();
}
function socketSend(Class,obj){
	if($(obj).hasClass('socket')){
		return false;
	}
	$(obj).html('Mintデータ読出中...').addClass('socket');
	$.ajax({
		type: "POST",
		url: "<?php echo URL::site('socket/socket_send');?>",
		cache: false,
		dataType: 'json',
		data: "class="+Class,
		error: function(){alert('ajaxエラー');},           
		success: function(json){			
			alert(json.Alert);			
			if(json.result){
				$(obj).removeClass('socket').html('Mintデータ読出');
			}else{
				$(obj).removeClass('socket').html('Mintデータ読出失敗、もう一回テストしてみてください。');	
			}
		}
	 });
}
</script>
</body>
</html>