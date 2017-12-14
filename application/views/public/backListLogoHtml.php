<div class="topright topright01 right">	               
    <p><?php if(array_key_exists('from',$_GET)){?><a href="<?php echo URL::site($_GET['from']).URL::query(array('from'=>NULL,'actShow'=>NULL));?>"><input type="button" value="園児一覧画面に戻る" /></a><?php }?></p>
    <script>
        var scrollAdjustment = function(){
            if($('.maintableDiv tbody').filter(function(index) {return $(this).css("display") != 'none';}).height()<$(window).height()-505){
                $('.maintableDiv').css({'padding-right':'17px','overflow-y':'inherit'});						
            }else{
                $('.maintableDiv').css({'padding-right':'0','overflow-y':'scroll'});
            }
        }
        $(function(){
            var wh = $(window).height();					
            scrollAdjustment();
            $('.maintable').height((wh-240)).children('.maintableDiv').height((wh-305));
        });
    </script>
</div>