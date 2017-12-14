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
            	<div class="search01">
                	<form id="formSearch" action="<?php echo URL::site('administration/userGuardianList');?>" method="get" enctype="multipart/form-data">
                        <input type="text" name="txt_Search" class="txt01" value="<?php if(isset($search)) echo $search;?>" placeholder="園児名検索" />
                        <input type="button" class="but01" value="検索" onClick="$('#formSearch').submit();" />
                    </form>
                </div>              
                <div class="tabright">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                            	<td width="7%"><p><input type="button" value="削 除" id="delete" class="but"/></p></td>
                            	<td width="5%">NO.</td>
                                <td width="10%">保護者名</td>
                                <td width="10%">園児名</td>
                                <td width="10%">アカウント</td>
                                <td width="10%">パスワード</td>
                                <td width="10%">有効/無効</td>
                                <td width="15%">園児情報編集権限</td>
                                <td width="30%">備考</td>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                        <?php if(!empty($guardian_List)) {foreach ($guardian_List as $key =>$val){?>
                            <tr>
                            	<td>
                                    <p><input name="ID" type="checkbox" value="<?php echo $val['ID']?>" class="txt"/></p>
                                    <span><a href="javascript:void(0);" class="save" title="保存"><img src="<?php echo $media;?>images/gou.png"/></a></span>
                                    <span><a href="javascript:void(0);" class="cancel" title="キャンセル"><img src="<?php echo $media;?>images/cha.png"/></a></span>
                                </td>
                                <td><?php echo $key+1;?></td>
                                <td class="Guardian_Name"><?php echo $val['Guardian_Name']?></td>
                                <td class="Name"><?php echo $val['Name']?></td>
                                <td class="edit"><?php echo $val['Guardian_ID']?></td>
                                <td class="edit"><?php echo $val['PWD']?></td>
                                <td><input name="chkbox_Available" <?php echo $val['Available']=='1'?'checked':''?> class="checkbox01" type="checkbox" value="1"/></td>
                                <td><input name="chkbox_Authority" <?php echo $val['Authority']=='1'?'checked':''?> class="checkbox01" type="checkbox" value="1"/></td>
                                <td class="td01 edit"><?php echo $val['Remark']?></td>
                            </tr>
                        <?php } }?>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
	<script>
	var canEdit;	
    $(function(){
		$('#dataList').validationEngine('attach');
				
		setCanEdit(true);		
		$('#dataList').on('click','.edit',function(){
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent());
			}
		});	
		
		$('#dataList').on('click','.checkbox01',function(){			
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent().parent());
			}					
		});
		
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
				   url: "<?php echo URL::site('administration/delUserGuardian');?>",
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
			clearInterval(lockTimer)
		});
		
		$('#dataList').on('click','.save',function(){
			var obj1 = $(this).parent().parent();
			var obj = obj1.parent();
			var ID = obj.find('input[name="ID"]').val();
			var Guardian_ID = obj.find('input[name="Guardian_ID"]').val();
			var PWD = obj.find('input[name="PWD"]').val();
			var Available = obj.find('input[name="chkbox_Available"]').prop('checked')?'1':'0';			
			var Authority = obj.find('input[name="chkbox_Authority"]').prop('checked')?'1':'0';	
			var Remark = obj.find('input[name="Remark"]').val();
			$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/addUserGuardian');?>",
			   cache: false,
			   dataType: 'json',
			   data: "ID="+ID+"&Guardian_ID="+Guardian_ID+"&PWD="+PWD+"&Available="+Available+"&Authority="+Authority+'&Remark='+Remark,
			   error: function(){alert('ajaxエラー');},
			   success: function(json){	  
					if(json.result){						
						obj1.find('span').hide().end().find("p").show().end().find('input[name="ID"]').val(json.ID).end().parent().find('.edit').each(function(index, element) {
							if(index==1){
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
						}).end().find('.Guardian_Name').html(json.Guardian_Name).end().find('.Name').html(json.Name);
						setCanEdit(true);
						clearInterval(lockTimer)					
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
					$(this).html('<input id="'+$(this).parent().find('input[name="ID"]').val()+'" type="text" name="Guardian_ID" class="add validate[required,minSize[8],maxSize[8],ajax[uniqueGuardianIDExists]]" value="'+$(this).html()+'">');
					break;
				case 1:
					$(this).html('<input type="text" name="PWD" class="add validate[minSize[5],maxSize[42]]" value="'+$(this).html()+'">');
					break;
				case 2:
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
			   url: "<?php echo URL::site('administration/getNewGuardianIDAndPwd');?>",
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
					tr += '		<td class="Guardian_Name"></td>';
					tr += '		<td class="Name"></td>';
					tr += '		<td class="edit"><input id="" type="text" name="Guardian_ID" class="add validate[required,minSize[8],maxSize[8],ajax[uniqueGuardianIDExists]]" value="'+json.Guardian_ID+'"></td>';
					tr += '		<td class="edit"><input type="text" name="PWD" class="add validate[minSize[5],maxSize[42]]" value="'+json.PWD+'"></td>';
					tr += '		<td><input name="chkbox_Available" class="checkbox01" type="checkbox" value="1"/></td>';
					tr += '		<td><input name="chkbox_Authority" class="checkbox01" type="checkbox" value="1"/></td>';
					tr += '		<td class="td01 edit"><input type="text" name="Remark" class="addlong"></td>';
					tr += '	</tr>';
					$('#dataList').append(tr).find('tr:last-child').find('td:first-child p').hide().end().find('td:first-child span').show();
					lockTimer = setInterval("autoLock()", 55000);
			   }
			});			
		}
	}
	
	function trNo()
	{
		$('#dataList tr').each(function(index, element) {
            $(this).find("td:nth-child(2)").html(index+1);
        });
	}
	var lockTimer
	function autoLock()
	{
		$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('child/autolock');?>",
		   cache: false,
		   dataType: 'json',
		   data: "Child_Id="+$('input[name="Guardian_ID"]').val(),
		   error: function(){},
		   success: function(json){
				if(!json.lock){
					alert("整理番号エラー");	
					window.location.reload();
				}
		   }
		});					
	}
	
    </script>
	
	
</body>
</html>