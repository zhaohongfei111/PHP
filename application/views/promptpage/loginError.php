<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/style.css?version=<?php echo $version;?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>jQuery-Validation-Engine-master/validationEngine.jquery.css?version=<?php echo $version;?>" />
<script src="<?php echo $media;?>js/jquery-1.12.2.min.js?version=<?php echo $version;?>"></script>
<script src="<?php echo $media;?>js/common.js?version=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $media;?>jQuery-Validation-Engine-master/jquery.validationEngine-ja.js?version=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $media;?>jQuery-Validation-Engine-master/jquery.validationEngine.js?version=<?php echo $version;?>"></script>
</head>
<body>
	<div class="headerbox01">
		<div class="mtop"><span>こども園トータルマネジメントシステム</span></div>
		<div class="logo">
			<div class="topleft right">
				<p><input type="button" class="but01" value="" /></p>
			</div>
		</div>
	</div>
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
						<span onclick="$('#postForm').submit();">五秒間後、前画面に戻ります。　または、ここをクリックして戻ります。</span>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <form id="postForm" method="post" action="<?php echo $url?>" style="display:none" >
    	<input type="text" name="postError" value="1" />
        <?php
        foreach($_POST as $key => $val){
		?>
		<input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" />
		<?php	
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