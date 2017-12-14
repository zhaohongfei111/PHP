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
						<span onClick="location.href='<?php echo $url;?>'">異常操作不可。</span>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
	setTimeout("location.href='<?php echo $url;?>';",5000)
});
</script>	
</body>
</html>