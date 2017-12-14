<?php
echo View::factory('public/head');
?>
<body>
	<div class="mianboxbg">
		<?php
		$logohtml = '<div class="topright topright04 right">
						<p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
					</div>
					<div class="topright topright01 right">
						<p><input type="button" value="新 規 追 加" onclick="addLine()" /></p>
					</div>';		
        echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
        ?>
        <div class="mianbox">
            <div class="content contbox">
                <div class="tabright">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td width="7%"><p><input type="button" value="削 除" id="delete" class="but"/></p></td>
                                <td width="5%">NO.</td>
                                <td width="10%">職員名</td>
                                <td width="10%">アカウント</td>
                                <td width="10%">パスワード</td>
                                <td width="7%">有効/無効</td>
                                <td width="7%">管理者</td>
                                <td width="7%">編集者</td>
                                <td width="7%">閲覧のみ</td>
                                <td width="13%">備考</td>
                                <td width="9%">電子印</td>
                                <td class="tt"></td>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                        <?php foreach ($worker_List as $key =>$val){?>
                            <tr>
                                <td>
                                    <p><input name="ID" type="checkbox" value="<?php echo $val['ID']?>" class="txt"/></p>
                                    <span><a href="javascript:void(0);" class="save" title="保存"><img src="<?php echo $media;?>images/gou.png"/></a></span>
                                    <span><a href="javascript:void(0);" class="cancel" title="キャンセル"><img src="<?php echo $media;?>images/cha.png"/></a></span>
                                </td>
                                <td><?php echo $key+1;?></td>
                                <td class="edit"><?php echo $val['NAME'];?></td>
                                <td class="edit"><?php echo $val['USERID'];?></td>
                                <td class="edit"><?php echo $val['PWD'];?></td>
                                <td><input name="chkbox_Available" <?php echo $val['Available']=='1'?'checked':'';?> class="checkbox01" type="checkbox" value="1"/></td>
                                
                                <td><input name="chkbox_SELLEVEL" <?php echo $val['SELLEVEL']=='Admin'?'checked':'';?> class="checkbox01" type="checkbox" value="Admin"/></td>
                                <td><input name="chkbox_SELLEVEL" <?php echo $val['SELLEVEL']=='Editor'?'checked':'';?> class="checkbox01" type="checkbox" value="Editor"/></td>
                                <td><input name="chkbox_SELLEVEL" <?php echo $val['SELLEVEL']=='Reader'?'checked':'';?> class="checkbox01" type="checkbox" value="Reader"/></td>
                                <td class="edit"><?php echo $val['Remark'];?></td>
                                <td>
                                    <input style="width:60px;height:25px" type="button" class="file_UserWorker_Btn" value="登録" />
                                    <input type="hidden" name="file_UserWorker_Picture[]" value="<?php echo $val['UserWorkerPic'];?>" >
                                </td>
                                <td class="tt">
                                	<?php if(!empty($val['UserWorkerPic'])){
                                		$pic_list=explode(';', $val['UserWorkerPic']);
                                		echo "<img src=\"". $media.'uploadfile/userWorkerImages/'.$pic_list[0]."\" style=\"height:30px;\" class=\"userWorkerPic\">" ;
                                	}?>
                                </td>
                            </tr>
                        <?php }?>                    
                        </tbody>                    
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div id="userWorkerPicList" style="display:none;"></div>
    <script>
	var canEdit;	
    $(function(){
    	var fileParameter = '<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('administrator/saveImages').URL::query();?>';
		//电子印登录
    	$('#dataList').on('click','.file_UserWorker_Btn',function(){
    		$('#dataList .curUserWorkerAddPic').removeClass();
    		$(this).parents('tr:first').addClass('curUserWorkerAddPic');
    		var userWorkerPic = $('.curUserWorkerAddPic').find('input[name="file_UserWorker_Picture[]"]').val();
    		//var goodsName = $('.curUserWorkerAddPic').find('input[name="txt_Goods_Name[]"]').val();
    		addOverlay(1200,1200,'<?php echo 'http://'.$_SERVER['SERVER_NAME'].URL::site('administration/userWorkerImages?userWorkerPic=');?>'+userWorkerPic);
    	});

    	$('#dataList').on('click','.userWorkerPic',function(){
    		var userWorkerPic = $(this).parents('tr:first').find('input[name="file_UserWorker_Picture[]"]').val();
    		if(userWorkerPic=='') return false;
    		var gpl = userWorkerPic.split(";");
    		var htm = "";
    		for(i in gpl){
    			htm += '<a href="javascript:;" i="<?php echo $media.'uploadfile/userWorkerImages/'?>'+gpl[i]+'" class="Slide One"><img src="<?php echo $media.'uploadfile/userWorkerImages/'?>'+gpl[i]+'" alt=""></a>';
    		}
    		$('#userWorkerPicList').html(htm);
    		$('.One').simpleSlide();
    		$('.One:first').trigger('click');	
    	});

        
		//输入提示框验证
		$('#dataList').validationEngine('attach');
		//可以编辑
		setCanEdit(true);
		//权限单选
		$('#dataList').on('click','input[name="chkbox_SELLEVEL"]',function(){
			var ck = $(this).prop('checked');
			if(ck){				
				$(this).parent().parent().find('input[name="chkbox_SELLEVEL"]').attr('checked',false);
				$(this).prop('checked',ck);
			}
		});	
		//编辑本行
		$('#dataList').on('click','.edit',function(){
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent());
			}
		});	
		//点击复选框，改变状态编辑本行
		$('#dataList').on('click','.checkbox01',function(){			
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent().parent());
			}					
		});
		//删除按钮
		$('#delete').on('click',this,function(){
			if(canEdit){
				
				var IDArr = [];
				var NAME_Arr = []
				$('#dataList').find('input[name="ID"]:checked').each(function(index, element) {
                    IDArr[index] = $(this).val();
					NAME_Arr[index] = $(this).parent().parent().parent().find('.edit:eq(1)').html();
                });
				if(IDArr.length==0) return false;
				if(!confirm("アカウント（ "+NAME_Arr.join("、")+" ）を削除します。よろしいですか？")){
					return false;
				}
				$.ajax({
				   type: "POST",
				   url: "<?php echo URL::site('administration/delUserWorker');?>",
				   cache: false,
				   dataType: 'json',
				   data: "ID="+IDArr.join(";"),
				   error: function(){alert('ajaxエラー');},
				   success: function(json){ 			   
						if(json.result){	
							$('#dataList').find('input[name="ID"]:checked').each(function(index, element) {
								$(this).parent().parent().parent().remove();
							});	
							trNo();
						}else{
							alert('SYS異常があります。');
							window.location.reload(true);
						}
				   }
				});
			}
		});
		
		//放弃编辑本行操作
		$('#dataList').on('click','.cancel',function(){
			var obj = $(this).parent().parent();
			if(obj.parent().find('input[name="ID"]').val()!=''){
				obj.find('span').hide().end().find("p").show().end().parent().find('.edit').each(function(index, element) {
					$(this).html($(this).find('input').attr('value'));
				}).end().find('.checkbox01').each(function(index, element) {
					if($(this).attr('checked')=='checked'){
						$(this).prop('checked','checked');
					}else{
						$(this).prop('checked',false);
					}
                });
			}else{
				obj.parent().remove();
			}
			setCanEdit(true);
		});
		
		//保存本行内容
		$('#dataList').on('click','.save',function(){
			var obj1 = $(this).parent().parent();
			var obj = obj1.parent();			
			var ID = obj.find('input[name="ID"]').val();
			var NAME = obj.find('input[name="NAME"]').val();
			var USERID = obj.find('input[name="USERID"]').val();
			var PWD = obj.find('input[name="PWD"]').val();
			var Available = obj.find('input[name="chkbox_Available"]').prop('checked')?'1':'0';
			var SELLEVEL = obj.find('input[name="chkbox_SELLEVEL"]:checked').length==1?obj.find('input[name="chkbox_SELLEVEL"]:checked').val():'';
			var Remark = obj.find('input[name="Remark"]').val();
			$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/addUserWorker');?>",
			   cache: false,
			   dataType: 'json',
			   data: "ID="+ID+"&NAME="+NAME+"&USERID="+USERID+"&PWD="+PWD+"&Available="+Available+"&SELLEVEL="+SELLEVEL+'&Remark='+Remark,
			   error: function(){alert('ajaxエラー');},
			   success: function(json){	   
					if(json.result){						
						obj1.find('span').hide().end().find("p").show().end().find('input[name="ID"]').val(json.ID).end().parent().find('.edit').each(function(index, element) {
							if(index==2){
								$(this).html(json.PWD);
							}else{
								$(this).html($(this).find('input').prop('value'));
							}
						}).end().find('.checkbox01').each(function(index, element) {							
							if($(this).prop('checked')==true){
								$(this).prop('checked',true);
							}else{
								$(this).prop('checked',false);
							}
						});
						setCanEdit(true);						
					}else{
						var str = '';
						for(i in json.errors){
							str += json.errors[i]+'\n';
						}
						alert(str);						
						//alert('SYS異常があります。');
						//obj1.find('.cancel').trigger('click');
					}
			   }
			});
		});
		
	})
	
	function setCanEdit(can)
	{		
		if(can){
			$('#delete').attr('disabled',false);
			$('#dataList input[type="checkbox"]').attr('disabled',false);
		}else{
			$('#delete').attr('disabled',true);
			$('#dataList input[name="ID"]').attr('checked',false);
			$('#dataList input[type="checkbox"]').attr('disabled',true);
		}
		canEdit = can;
	}
	
	function editLine(obj)
	{			
		obj.find('.edit').each(function(index, element) {
			switch(index){
				case 0:
					$(this).html('<input type="text" name="NAME" class="add validate[required]" value="'+$(this).html()+'">');
					break;
				case 1:
					$(this).html('<input type="text" name="USERID" class="add validate[required,minSize[4],maxSize[32]]" value="'+$(this).html()+'">');
					break;
				case 2:
					$(this).html('<input type="text" name="PWD" class="add validate[minSize[5],maxSize[42]]" value="'+$(this).html()+'">');
					break;
				case 3:
					$(this).html('<input type="text" name="Remark" class="addlong" value="'+$(this).html()+'">');
					break;						
			}
		}).end().find('td:first-child p').hide().end().find('td:first-child span').show().end().find('input[type="checkbox"]').attr('disabled',false);		
	}
	
	function addLine(){
		if(canEdit){
			setCanEdit(false);
			
			$.ajax({
			   type: "GET",
			   url: "<?php echo URL::site('administration/getInitializationPwd');?>",
			   cache: false,
			   dataType: 'json',
			   data: "",
			   error: function(){alert('ajaxエラー');},
			   success: function(json){	   
					var tr = '	<tr>';
					tr += '   	<td>';
					tr += '			<p><input name="ID" type="checkbox" value="" class="txt"/></p>';
					tr += '			<span><a href="javascript:void(0);" class="save" title="保存"><img src="<?php echo $media;?>images/gou.png"/></a></span>';
					tr += '         <span><a href="javascript:void(0);" class="cancel" title="キャンセル"><img src="<?php echo $media;?>images/cha.png"/></a></span>';
					tr += ' 	</td>';
					tr += '		<td>'+($('#dataList tr').length+1)+'</td>';
					tr += '		<td class="edit"><input type="text" name="NAME" class="add validate[required]"></td>';
					tr += '		<td class="edit"><input type="text" name="USERID" class="add validate[required,minSize[4],maxSize[32]]"></td>';
					tr += '		<td class="edit"><input type="text" name="PWD" class="add validate[minSize[5],maxSize[42]]" value="'+json.PWD+'"></td>';
					tr += '		<td><input name="chkbox_Available" class="checkbox01" type="checkbox" value="1"/></td>';							
					tr += '		<td><input name="chkbox_SELLEVEL" class="checkbox01" type="checkbox" value="Admin"/></td>';
					tr += '		<td><input name="chkbox_SELLEVEL" class="checkbox01" type="checkbox" value="Editor"/></td>';
					tr += '		<td><input name="chkbox_SELLEVEL" class="checkbox01" type="checkbox" value="Reader"/></td>';
					tr += '		<td class="edit"><input type="text" name="Remark" class="addlong"></td>';
					tr += '     <td>';
					tr += '			<input style="width:60px;height:25px" type="button" class="file_UserWorker_Btn" value="登録" />';
                    tr += '			<input type="hidden" name="file_UserWorker_Picture[]" value="" >'  
                    tr += '		</td>'
                    tr += '		<td class="tt">';
                    tr += '		</td>'  
					tr += '	</tr>';
					$('#dataList').append(tr).find('tr:last-child').find('td:first-child p').hide().end().find('td:first-child span').show();			
					//$('body').css("background-image","url(<?php echo $media;?>images/bg044.gif?"+Math.random()+")");
			   }
			});			
		}
	}
	//重置所有行序号
	function trNo()
	{
		$('#dataList tr').each(function(index, element) {
            $(this).find("td:nth-child(2)").html(index+1);
        });
	}
	
    </script>
    <link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
	<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script> 
	<script type="text/javascript" src="<?php echo $media;?>SimpleSlide20161002/js/simple.slide.min.js"></script>
	<link rel="stylesheet" href="<?php echo $media;?>SimpleSlide20161002/css/simple.slide.css" type="text/css">    
	
</body>
</html>