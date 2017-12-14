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
			<div class="datebox">
				<div class="titletop"><h2>園への連絡</h2></div>
				<div class="xtbbox" style="width:100%;">
					<div class="xtb left"><a href="<?php echo URL::site('Communication/comm?fileRand=fileRand'.time().rand(1111,9999));?>" ><p>遅刻・お休み</p><p>その他の連絡</p></a></div>
					<div class="xtb xtb01 left"><a href="<?php echo URL::site('Communication/buyGoods');?>">用品の購入</a></div>
                    <div class="xtb xtb02 left"><a href="<?php echo URL::site('Communication/commApplication');?>">園児情報編集の申請</a></div>
				</div>
				
				<div class="databut">
					<input type="button" value="メニュー画面に戻る" onClick="location.href='<?php echo URL::site('index/index');?>'"/>
				</div>
				
			</div>
		</div>
	</div>
	
</body>
</html>