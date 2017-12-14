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
		<div class="xmianbox">
			<a class="a1" href="<?php echo URL::site('communication/commList');?>">今日の掲示板</a><a class="a2" href="<?php echo URL::site('communication/pastTimeList');?>">過去の掲示板</a>
		</div>
	</div>
	
</body>
</html>