<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ファイルの添付</title>
<!--引入CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>webuploader-0.1.5/webuploader.css"> 
 
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/webuploader/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/webuploader/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/webuploader/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/webuploader/syntax.css">
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>css/webuploader/style.css">



<style>
ul.filelists{margin:0 20px; padding:10px; border:3px dashed #e6e6e6;}
ul.filelists li {float:left; margin:0 5px; padding-bottom:10px; list-style:none;position: relative;}
ul.filelists li p.imgWrap img{width:110px; height:110px;}
ul.filelists li .file-panel{height:0px;}

ul.filelists div.file-panel {
    position: absolute;
    height: 0;
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#80000000', endColorstr='#80000000')\0;
    background: rgba( 0, 0, 0, 0.5 );
    width: 100%;
    top: 0px;
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
.wu-example:after {
    content:"ファイルの添付";
}
</style>
</head>
<body>
<?php
if(!array_key_exists('notEdit',$_GET)){
?>
<div id="uploader" class="wu-example">
    <!--用来存放文件信息-->
    <div id="thelist" class="uploader-list"></div>
    <div class="btns">
        <div id="picker">ファイル選択</div>
        <button id="ctlBtn" class="btn btn-default">アップロード開始</button>
    </div>
</div>
<?php
}
?>

<?php
if(!empty($fileList)){
?>
<div style="line-height:30px; font-size:16px; font-weight:700; text-indent:20px; margin:20px 0 5px;">アップロードした画像</div>
<ul class="filelists">
	<?php
    foreach($fileList as $key => $val){
		$ispdf = strtolower(substr($key,-4))=='.pdf'?true:false;
		$keyArr = explode(DIRECTORY_SEPARATOR,$key);
		$title = array_pop($keyArr);
	?>
	<li>
        <p class="imgWrap"><img src="<?php echo $ispdf?$media.'images/pdf.jpg':$media.'uploadfile/'.$key;?>"></p>
        <div class="file-panel">
        	<span class="cancel" imgsrc="<?php echo $key;?>">削除</span>
        </div>
        <div style="text-align:center; font-size:12px;word-wrap: break-word;word-break: normal; width:110px; height:34px; overflow:hidden;"><a href="<?php echo $media.'uploadfile/'.$key;?>" target="_blank"><?php echo $title;?></a></div>
     </li>     
     <?php
	}
	 ?>
     <div style="clear:left"></div>
</ul>
<?php
}
?>
<?php
if(!array_key_exists('notEdit',$_GET)){
?>
<!--引入JS-->
<script src="<?php echo $media;?>js/jquery-1.12.2.min.js?version=<?php echo $version;?>"></script>
<script>
//上传文件使用
var fileParameter = '<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('communication/saveFiles').URL::query();?>';
</script>
<script type="text/javascript" src="<?php echo $media;?>webuploader-0.1.5/webuploader.js?version=<?php echo $version;?>"></script>           
<script type="text/javascript" src="<?php echo $media;?>js/demoFile.js?version=<?php echo $version;?>"></script>
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
	
	$('.filelists .cancel').bind('click',function(event){
		 $.ajax({
			type: "POST",
			url: "<?php echo URL::site('communication/delCommFile');?>",
			cache: false,
			dataType: 'json',
			data: "img="+$(this).attr('imgsrc')+"&id="+$(this).attr('id'),
			error: function(){alert('ajaxエラー');},           
			success: function(json){				
				if(json.del){
					$('#'+json.id).parent().parent().remove();	
				}
			}
         });
	});
});
</script>
<?php
}
?>
</body>
</html>
