<?php
echo View::factory('public/head');

?>
<body>
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('index/index').URL::query().'"><input type="button" value="メインメニュー画面へ戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><a href="'.URL::site('picshow/picShowIndex').URL::query().'"><input type="button" value="写真管理トップ画面へ戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" value="保存" /></p>
				</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>	

	<div class="mainbox">
		<div class="phbut left"><a href="javascript:void(0)">アカウントフォルダ</a></div>
		<div class="navbox left">
			<ul>
				<li class="td01 td04">
					<span>並び替え：</span>
					<a href="javascript:sort(1)" class="cn">日付ごとに昇順</a>
					<a href="javascript:sort(2)">日付ごとに降順</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="listbut left file_Goods_Btn"><a href="javascript:void(0)" style="background:#92d050;width:220px;text-align:center;margin-top:20px;">アップロード</a></div>
		<div class="listbut right">
			<a href="javascript:delFile()" style="background:#ff66ff;width:220px;text-align:center;margin-top:20px;">ファイル削除</a>
			<a href="javascript:changeMsg('change')" style="background:#ff66ff;width:220px;text-align:center;margin-top:20px;">ファイル名の変更</a>			
			<a href="javascript:changeMsg('newadd')" style="background:#ff66ff;width:220px;text-align:center;margin-top:20px;">フォルダ追加</a>
		</div>
		<div class="clear"></div>
		<div class="maintable maintable26">
			<input type="hidden" name="hidden_pre_dir" value="<?php $pre_dir=iconv("shift-jis","UTF-8", $pre_dir); echo $pre_dir;?>"/>
			<input type="hidden" name="hidden_dir" value="<?php $dir_short=iconv("shift-jis","UTF-8", $dir_short); echo $dir_short;?>"/>
			<div class="taimgbox">
				<ul class="phfile">
					<?php if(!empty($dir_short)){?>
						<li class="back_dir"><a href="javascript:void(0)"><img src="<?php echo $media;?>images/img05.png"/></a><p><a href="javascript:void(0)" class="">../</a></p></li>
					<?php }?>
				
					<?php if(!empty($files_list['isFile'])){
								foreach ($files_list['isFile'] as $key_is =>$val_is){
								$val_is['name']=iconv("shift-jis","UTF-8", $val_is['name']);
					?>
						<li class="file_dbClick" fileName="<?php echo $val_is['name'];?>"><a href="javascript:void(0)"><img src="<?php echo $media;?>images/img05.png"/></a><p><a href="javascript:void(0)" class="fileName"><?php echo $val_is['name'];?></a></p></li>
					<?php }}?>				
				</ul>				
				<div class="clear"></div>
				<ul class="phimg">
					<?php if(!empty($files_list['noFile'])){
								foreach ($files_list['noFile'] as $key_no =>$val_no){
									$val_no['name']=iconv("shift-jis","UTF-8", $val_no['name']);
					?>
					<li class="draggable" fileName="<?php echo $val_no['name'];?>"><div style="width: 115px;height:115px"><a javascript><img class="picList" style="width:110px" src="<?php $relative_path=iconv("shift-jis","UTF-8", $val_no['relative_path']); echo $media.$relative_path;?>"/></a></div><p><a javascript class="fileName"><?php echo $val_no['name'];?></a></p></li>					
					<?php }}?>
				</ul>			
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<!--弹出框  -->
		 <div id="tishi" class="ui-overlay" style="display:none;">
			<div class="ui-widget-overlay" style="z-index:100;"></div>
			<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 812px; height: 222px; position: fixed;"></div>
		</div>
         <div class="dialog xnolist" style="display:none;" >
			<a href="javascript:void(0)" onclick="msgHide()" style="position:absolute;top:-13px;right:-13px;"><img src="<?php echo $media;?>images/ctb01.png"/></a>
			<div class="gnamebox newadd" style="height:170px;margin-top:20px;display:none;">
				<p>新規フォルダ名を入力してください。</p>
				<p><input type="text" class="txt26" name="txt_newFileName" /></p>
				<p><input type="button" style="margin-top: 15px" class="but26" onclick="saveFileName()" value="保存"></p>
			</div>
			
			<div class="gnamebox change" style="height:170px;margin-top:20px;display:none;">
				<p>変更後のファイル名またはフォルダ名を入力してください。</p>
				<p><input type="text" class="txt26" name="txt_changeFileName" /></p>
				<p><input type="button" style="margin-top: 15px"  class="but26" onclick="updateFileName()" value="変 更"></p>
			</div>
			
		</div>
	
	
	
	
		<!--  
	<div class="gnamebox">
		<p>変更後のファイル名またはフォルダ名を入力してください。</p>
		<p><input type="text" class="txt26" name="" /></p>
		<p><input type="button" class="but26" value="変 更"></p>
	</div>
	-->
	<script type="text/javascript">
	$(function(){

		$('.file_Goods_Btn').on('click',function(){
			addOverlayPic(1200,1200,'<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('picshow/uploadImg');?>');
		});

		$('.taimgbox li').on('click',this,function(){
			$('.taimgbox li').each(function(index, element) {
				$(this).removeClass('on');				
			});
			$(this).addClass('on');
		});

		//文件夹双击打开
		$('.file_dbClick').dblclick(function(){
			var old_dir=$('input[name="hidden_dir"]').val();
			
			var new_dir=old_dir+'/'+$('.on .fileName').html();
			
			window.location.href="<?php echo URL::site('picshow/privatePic').URL::query(array('dir'=>null,'sort'=>null,'pre_dir'=>null));?>?dir="+new_dir+"&pre_dir="+old_dir;
			
		});

		//双击图片打开
		$('.picList').dblclick(function(){
			var old_dir=$(this).attr('src');			
			window.open(old_dir);					
		});
		
		//返回上一层
		$('.back_dir').dblclick(function(){
			var new_dir=$('input[name="hidden_pre_dir"]').val();
			var pre_dir='';
			var arr=new_dir.split("/"); 
			arr.pop();
			if(arr.length>0){
				pre_dir = arr.join('/');
			}
			window.location.href="<?php echo URL::site('picshow/privatePic').URL::query(array('dir'=>null,'sort'=>null,'pre_dir'=>null));?>?dir="+new_dir+"&pre_dir="+pre_dir;			
		});

		var dir_name='';
	    $( ".file_dbClick" ).droppable({
		      //activeClass: "ui-state-default",
		     // hoverClass: "ui-state-hover",
		      drop: function( event, ui ) {			    
				  dir_name=$(this).attr('fileName');
		     	 }
		    });
		
		$( ".draggable" ).draggable({ 
			revert: "invalid" ,
			stop:function(event,ui){
				 var father_dir=$('input[name="hidden_dir"]').val();
				 var picName=$(this).attr('fileName');					

				 var moveFile=father_dir+'/'+picName;
				 var aimFile =father_dir+'/'+dir_name+'/'+picName;
				 var data = 'moveFile='+moveFile+'&aimFile='+aimFile;
				 $.ajax({
					   type: "POST",
					   url: "<?php echo URL::site('Picshow/moveFile');?>",
					   cache: false,
					   dataType: 'json',
					  // dataType: 'html',
					   data: data,
					   error: function(){alert('ajaxエラー');},
					   success: function(json){
						   //alert(json['result']);
							//addSaveOverlay(1000,400,json['result']);
						   location.reload();
					   }
					});	
				}
			
		});
		 

			
	});
	
	//图片写真 通用
	function overlayRemovePic()
		{	
			var dir=$('input[name="hidden_dir"]').val();
			var old_dir=$('input[name="hidden_pre_dir"]').val();
			$('#overlayBg').parent().remove();
			$('#overlayMsg').parent().remove();
			window.location.href="<?php echo URL::site('picshow/privatePic').URL::query(array('dir'=>null,'sort'=>null,'pre_dir'=>null));?>?dir="+dir+"&pre_dir="+old_dir;
		}

	//升序，降序排列
	function sort(tag){
		var dir=$('input[name="hidden_dir"]').val();
		var old_dir=$('input[name="hidden_pre_dir"]').val();
		window.location.href="<?php echo URL::site('picshow/privatePic').URL::query(array('dir'=>null,'sort'=>null,'pre_dir'=>null));?>?dir="+dir+'&sort='+tag+"&pre_dir="+old_dir;
	}

	//弹出对话框
	 function changeMsg(tag)
	 {
		$('input[name="txt_newFileName"]').val('');
		$('input[name="txt_changeFileName"]').val('');
		
		if(tag=='change'){			
			var oldFileName=$('.on .fileName').html();
			if(oldFileName==null){
				alert("フォルダまたはファイルを選択してください！");
					return;
			}
		}
		$('#tishi').show(500);
		$('.dialog').show(500);
		$('.'+tag).show();
		
	}
	//隐藏对话框
	function msgHide()
	{
		$('#tishi').hide(500);
		$('.dialog').hide(500);
		$('.newadd').hide();
		$('.change').hide();
	}
	//删除文件
	function delFile(){
		var fileName=$('.on .fileName').html();
		if(fileName==null){
			alert("フォルダまたはファイルを選択してください！");
				return;
		}
		var dir_short=$('input[name="hidden_dir"]').val()+'/'+fileName;
		var data = "delFile="+dir_short;
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('Picshow/delFile');?>",
			   cache: false,
			   dataType: 'json',
			  // dataType: 'html',
			   data: data,
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
					//addSaveOverlay(1000,400,json['result']);
					alert('del success!');
					location.reload();
			   }
			});	

	}

	
	 //保存新规文件名
	function saveFileName(){
		var fileName=$('input[name="txt_newFileName"]').val();
		if(fileName==null||$.trim(fileName)==''){
			alert("新規フォルダ名を入力してください。");
				return;
		}
		var dir_short=$('input[name="hidden_dir"]').val();
		var data ='fileName='+fileName+'&dir_short='+dir_short;
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('Picshow/addNewFile');?>",
			   cache: false,
			   dataType: 'json',
			  // dataType: 'html',
			   data: data,
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   //alert(json['result']);
					addSaveOverlay(1000,400,json['result']);
			   }
			});	
		
	}
	//更新文件名
	function updateFileName(){
		
		var oldFileName=$('.on .fileName').html();
		if(oldFileName==null){
			alert("フォルダまたはファイルを選択してください！");
				return;
		}
		var newFileName=$('input[name="txt_changeFileName"]').val();
		if(newFileName==null||$.trim(newFileName)==''){
			alert("変更後のファイル名またはフォルダ名を入力してください。");
				return;
		}
		var dir_short=$('input[name="hidden_dir"]').val();
		var data ='newFileName='+newFileName+'&dir_short='+dir_short+'&oldFileName='+oldFileName;
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('Picshow/reNameFile');?>",
			   cache: false,
			   dataType: 'json',
			  // dataType: 'html',
			   data: data,
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   //alert(json['result']);
					addSaveOverlay(1000,400,json['result']);
			   }
			});	
		
	}	
	</script>
<style>
 .xmaintable82 table td input.xtxt01 {width:60px;border:none;background:none;}
 .xmaintable82 table td input.xtxt02 {width:90px;border:none;background:none;}
 .maintable table tbody tr.hover { background:#ffdfe2;}
 .maintablebox {padding-bottom:20px;}
 
 .dialog{
	position: fixed;
	_position:absolute;
	z-index:100;
	top: 50%;
	left: 50%;
	margin: -141px 0 0 -201px;
	width: 500px;
	height:230px;
	border:1px solid #CCC;
	text-align:center;
	font-size: 14px;
	background-color:#F4F4F4;
}	
</style>
<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>     
</body>
</html>