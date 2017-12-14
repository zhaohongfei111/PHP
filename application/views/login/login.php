<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/public'));
	?>
		
	<form id="formMain" action="<?php echo URL::site('login/checklogin');?>" method="post">		
	<div class="logmianbox">
		<div class="loginbox">
			<h2>こども園トータルマネジメントシステム</h2>
			<h3><img src="<?php echo $media;?>images/<?php echo $titleImg;?>"/></h3>
			<ul>
				<li><span>アカウント</span><input type="text" id="userid" name="txt_username" value="<?php echo $USERID;?>" class="validate[required,minSize[4],maxSize[32]]" /></li>
				<li><span>パスワード</span><input type="password" id="password" name="txt_password" value="<?php echo $PWD;?>" class="validate[required,minSize[5],maxSize[42]]" /></li>
			</ul>
			<p><input type="checkbox" name="memory" value="1" <?php if($memory) echo 'checked="checked"';?> />ユーザー名を保存</p>
			<div class="loginbut">
				<input type="button" id="sub" value="" />
				<p><a href="###">パスワードをお忘れですか？</a></p>
			</div>
		</div>
		<div class="logfoot"></div>
	</div>
	</form>

	<script>
$(document).ready(function(){
	$('#formMain').validationEngine('attach');
	$('#userid').bind('keypress',function(event){
		if(event.keyCode == "13"){
			if($.trim($(this).val())!=''){
				if($.trim($('#password').val())==''){
					$('#password').focus();
				}else{
					$('#sub').trigger('click');
				}
			}
		}
	});
	$('#password').bind('keypress',function(event){
		if(event.keyCode == "13"){
			if($.trim($(this).val())!=''){
				if($.trim($('#userid').val())==''){
					$('#userid').focus();
				}else{
					$('#sub').trigger('click');
				}
			}
		}
	});
	$('#sub').bind('click',function(event){
		$('#formMain').submit();		
	});
	
});
</script>
	
</body>
</html>