<?php
echo View::factory('public/head');
?>
<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml','');
?>

	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>園への連絡</h2></div>
			<div class="datebox">
				<div class="dateboxborder">
					<div class="datatxt">
						<h2>＜送 信 完 了＞</h2>
						<h3>ご連絡を受けつけました。</h3>
					</div>
				</div>
			</div>
			<div class="databut">
				<input type="button" value="メニュー画面に戻る" onClick="location.href='<?php echo URL::site('index/index');?>'" />
			</div>
		</div>
	</div>
	
</body>
</html>