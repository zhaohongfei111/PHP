<?php
echo View::factory('public/head');
?>
<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
?>
    
	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>管理者専用ページに入ります</h2></div>
			<form id="formMain" method="post" action="<?php echo URL::site('administration/checklogin');?>">
            <div class="pagebox10">
				<h3>パスワードを入力してください</h3>
				<ul>
					<li><span>パスワード</span><input id="password" name="password" type="password" class="txt05 validate[required,minSize[5],maxSize[42]]" value=""/></li>
				</ul>
			</div>
			<div class="pagetxt10">
				<p>[注意!!]</p>
				<p>ログインしたアカウントやログイン履歴、操作ログなどを残します。</p>
				<p>ログイン後の操作は十分ご注意ください。</p>
			</div>
			<div class="databut">
				<input id="sub" type="button" value="管理者専用ページにログイン" />
			</div>
            </form>
		</div>
	</div>
	<script>
    $(document).ready(function(){
		$('#formMain').validationEngine('attach');		
		$('#password').bind('keypress',function(event){
			if(event.keyCode == "13"){
				if($.trim($(this).val())!=''){
					$('#sub').trigger('click');
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