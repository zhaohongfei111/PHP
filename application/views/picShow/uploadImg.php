<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片上传</title>
 <!--引入CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>webuploader-0.1.5/webuploader.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/demo.css">
<style>
ul.filelists{margin:0 20px; padding:0; border:3px dashed #e6e6e6;}
ul.filelists li {float:left; margin:0 5px; list-style:none;position: relative;}
ul.filelists li p.imgWrap img{width:110px; height:110px;}
ul.filelists li .file-panel{height:0px;}

ul.filelists div.file-panel {
    position: absolute;
    height: 0;
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#80000000', endColorstr='#80000000')\0;
    background: rgba( 0, 0, 0, 0.5 );
    width: 100%;
    top: 15px;
    left: 0;
    overflow: hidden;
    z-index: 300;
}
ul.filelists div.file-panel span {
    width: 24px;
    height: 24px;
    display: inline;
    float: right;
    text-indent: -9999px;
    overflow: hidden;
    background: url(<?php echo $media;?>images/icons.png) no-repeat;
    margin: 5px 1px 1px;
    cursor: pointer;
}
ul.filelists div.file-panel span.cancel {
    background-position: -48px -24px;
}
ul.filelists div.file-panel span.cancel:hover {
    background-position: -48px 0;
}
</style>
</head>
<body>
<div>添付（）</div>

<div id="uploader" class="wu-example">
    <div class="queueList">
        <div id="dndArea" class="placeholder">
            <div id="filePicker"></div>
            <p></p>
        </div>
    </div>
    <div class="statusBar" style="display:none;">
        <div class="progress">
            <span class="text">0%</span>
            <span class="percentage"></span>
        </div><div class="info"></div>
        <div class="btns">
            <div id="filePicker2"></div><div class="uploadBtn">アップロード開始</div>
        </div>
    </div>
</div>

<?php
if(!empty($fileList)){
?>
<div style="line-height:30px; font-size:16px; font-weight:700; text-indent:20px; margin:20px 0 5px;">アップロードした画像</div>
<ul class="filelists">
	<?php
    foreach($fileList as $key => $val){
	?>
	<li>
        <p class="imgWrap"><img src="<?php echo $media."uploadfile/goodsImages/".$val;?>"></p>
        <div class="file-panel">
        	<span class="cancel" imgsrc="<?php echo $val;?>">削除</span>
        </div>
     </li>
     
     <?php
	}
	 ?>
     <div style="clear:left"></div>
</ul>
<?php
}
?>

<!--引入JS-->
<script src="<?php echo $media;?>js/jquery-1.12.2.min.js?version=<?php echo $version;?>"></script>
<script>
//上传文件使用
var dir=$('.maintable input[name="hidden_dir"]',parent.document).val();
var sel=$('.maintable input[name="hidden_sel"]',parent.document).val();
var fileParameter = '<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('picshow/saveImg').URL::query();?>?dir='+dir+'&sel='+sel;
</script>
<script type="text/javascript" src="<?php echo $media;?>webuploader-0.1.5/webuploader.js?version=<?php echo $version;?>"></script>           
<script type="text/javascript" src="<?php echo $media;?>js/demo.js?version=<?php echo $version;?>"></script>
<script>
$(function(){
	$('.filelists li').mouseenter(function(){
		$(this).find('.file-panel').animate({height:'30px'}, 300 );	
	}).mouseleave(function(){
		$(this).find('.file-panel').animate({height:'0px'}, 300 );	
	});
	
	$('.filelists .cancel').each(function(index, element) {
        $(this).attr('id','filelistsCancel'+index);
    });
	
	$('.curGoodsAddPic',window.parent.document).find('input[name="file_Goods_Picture[]"]').val('<?php echo implode(';',$fileList)?>')
	
	$('.filelists .cancel').bind('click',function(event){
		 $.ajax({
			type: "POST",
			url: "<?php echo URL::site('administration/delGoodsImages').URL::query();?>",
			cache: false,
			dataType: 'json',
			data: "img="+$(this).attr('imgsrc'),
			error: function(){alert('ajaxエラー');},           
			success: function(json){			
				if(json.del){
					location.href=json.src;
				}				
			}
         });
	});
	
});
</script>
</body>
</html>
