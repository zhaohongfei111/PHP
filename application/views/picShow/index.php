<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
?>

		<div class="content">
			<div class="listbut"><a href="###" style="background:#cc99ff;width:120px;text-align:center;">写真管理</a></div>
			<div class="photobox left">
				<img src="<?php echo $media;?>images/tb12.jpg"/>
				<p><a href="<?php echo URL::site('Picshow/privatePic');?>">アカウントフォルダ</a></p>
			</div>
			<div class="photobox right">
				<img src="<?php echo $media;?>images/tb12.jpg"/>
				<p><a href="<?php echo URL::site('Picshow/publicPic');?>" style="background:#ff0000;">共有フォルダ</a></p>
			</div>
			<div class="clear"></div>
		</div>	
</body>
</html>