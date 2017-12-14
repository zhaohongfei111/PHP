<?php
$NAME = Session::instance()->get('NAME');
$LASTLOGINTIME = Session::instance()->get('LASTLOGINTIME');
?>
<div class="<?php echo $headerboxClass;?>">
    <div class="mtop"><span>こども園トータルマネジメントシステム</span><?php if(!empty($NAME)) echo "ようこそ {$NAME}さん";?></div>
    <div class="<?php echo isset($logoClass)?$logoClass:'logo';?>">   
    	<a href="<?php echo URL::site('index/index');?>"><img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>" class="left logoimg"></a>    	 	
    	<?php
        echo $logoHtml;
		?>

    </div>
    <?php if(isset($nameHtml)) echo $nameHtml;?>
</div>

