<?php
echo View::factory('public/head');
?>
<body>
<?php		
$logohtml = '<div class="topright topright01 right">
				<p><a href="javascript:history.go(-1);"><input type="button" value="戻　る" /></a></p>
			</div>';
echo View::factory('public/header')
		->set('headerboxClass','headerbox')
		->set('logoHtml',$logohtml);
	
echo $bodyHtml;
?>
</body>
</html>