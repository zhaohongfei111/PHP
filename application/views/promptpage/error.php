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
					<h2>メッセージ：</h2>
					<ul>
                    	<?php
                        foreach($errors as $val){
						?>
						<li><?php echo $val;?></li>
						<?php
						}
						?>
					</ul>
					<div class="errortip">
						<span onClick="$('#postForm').submit();">五秒間後、前画面に戻ります。　または、ここをクリックして戻ります。</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <form id="postForm" method="post" action="<?php echo $url?>" style="display:none" >
    	<input type="text" name="postError" value="1" />
        <?php
        foreach($_POST as $key => $val){
			if(is_array($val)){
				foreach($val as $key_v => $val_v){
		?>
			<input type="text" name="<?php echo $key;?>[]" value="<?php echo $val_v;?>" />
		<?php
				}
			}else{
		?>
		<input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" />
		<?php
			}
		}
		?>    
    </form>

<script>
$(function(){
	setTimeout("$('#postForm').submit();",5000)
});
</script>
</body>
</html>