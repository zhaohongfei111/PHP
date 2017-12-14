<?php
echo View::factory('public/head');
?>

<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/public'));
?>
	<div class="mianbox">
		<div class="content">
			<div class="errorbox">
				<div class="errortxt">
					<h2>メッセージ</h2>					
					<div class="errortip">
						<span onClick="location.href='<?php echo URL::site($url);echo empty($from)?URL::query(array('from'=>NULL,'ID'=>NULL,'time'=>time())):URL::query(array('time'=>time()));if(array_key_exists('ID',$_GET)&&!empty($from)) echo '#tips'.$_GET['ID'];?>'">保存しました。</span>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
	setTimeout("location.href='<?php echo URL::site($url);echo empty($from)?URL::query(array('from'=>NULL,'ID'=>NULL,'time'=>time())):URL::query(array('time'=>time()));if(array_key_exists('ID',$_GET)) echo '#tips'.$_GET['ID'];?>';",5000)
});
</script>	
</body>
</html>