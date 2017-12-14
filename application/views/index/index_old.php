<?php
echo View::factory('public/head');
?>
<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/public'));
?>
	<div class="mainbox">
    	<div class="content">
            <div class="indexnavbox">
                <div class="indexnavlist left">
                    <ul>
                        <li style="padding-right: 40px"><a href="<?php echo URL::site('list/listAll');?>"><img src="<?php echo $media;?>images/nav01.jpg"/></a></li>
                        <li style="padding-right: 40px"><a href="<?php echo URL::site('picshow/picShowIndex');?>"><img src="<?php echo $media;?>images/nav03.jpg"/></a></li>
                        <li style="padding-right: 40px"><a href="<?php echo URL::site('daycheck/dayCheckDetail');?>"><img style="width:157px;" src="<?php echo $media;?>images/nav07.jpg"/></a></li>
                        <li style="padding-right: 40px"><a href="<?php echo URL::site('communication/listMenu');?>"><img src="<?php echo $media;?>images/nav04.jpg"/></a></li>                       
                        <li style="padding-right: 40px"><?php if($customerType=='Admin'&&$SELLEVEL == "Admin"){?><a href="<?php echo URL::site('administration/login');?>"><img src="<?php echo $media;?>images/nav06.jpg"/></a><?php }else{ ?><img src="<?php echo $media;?>images/hnav06.jpg"/><?php }?></li>
                        <li style="padding-right: 40px"><a href="###"><img src="<?php echo $media;?>images/nav05.jpg"/></a></li>
                    </ul>
                </div>
                <div class="xnotice right" style="height:240px">
                	<div class="fnav"></div>
                    <h2>管理者からのお知らせ</h2>
                    <div class="xnolist" id="notice" style="height:240px">
                        <?php echo empty($notice)?'':$notice['ToWorker'];?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
	<script>
	$(function() {	
		var text =$('#notice').html();
		var reg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
        text = text.replace(reg, "<a href='$1$2' target='_blank'> $1$2</a>").replace(/\n/g, "<br />").replace("<br />","");	
        $('#notice').html(text);
        
		});

	
	//jQuery("btn").onclick = function(){
       // var v = jQuery("txt").value;
       // var reg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
      //  v = v.replace(reg, "<a href='$1$2' target='_blank'>$1$2</a>").replace(/\n/g, "<br />");
      //  jQuery("show").innerHTML = v;
   //  };

	</script>
</body>
</html>