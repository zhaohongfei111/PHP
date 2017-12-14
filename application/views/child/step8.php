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
			<div class="datebox">
				<div class="dateboxborder">
					<div class="datatxt">
						<h2>＜申 請 内 容 確 認 完 了＞</h2>
						<h3>申請を受けつけました。</h3>
						<h3>申請内容に変更があった場合は、期間内に</h3>
						<h3>「登録済み園児情報編集画面」から編集を行ってください。</h3>
					</div>
					<div class="databut">
						<input type="button" value="メニュー画面に戻る" onClick="location.href='<?php echo URL::site("index/index");?>'" />
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>