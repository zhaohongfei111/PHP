<?php
echo View::factory('public/head');
?>
<body class="bg01">
	<?php	
	$logohtml = '<div class="topright topright04 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<div class="maintablebox">
			<div class="topright topright10">
				<p><input type="button" style="width:200px;border:2px #fff solid;;background:#70ad47;" value="職 員 情 報 一 覧" /></p>
				<p><input type="button" class="but01" style="" value="新 規 追 加" onClick="addLine()" /></p>
			</div>
			<div class="mtablebox">
				<div class="mtable xmtable10">
					<div class="tabright">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<td width="7%" class="t01" rowspan="2"><input type="button" class="button" value="削 除" id="delete"></td>
									<td width="15%" rowspan="2">職員名</td>
									<td width="16%" rowspan="2">しよくいんめい</td>
									<td width="6%" rowspan="2">性別</td>
									<td width="11%" rowspan="2">職位</td>
									<td width="7%" rowspan="2">担当クラス</td>
									<td width="15%" colspan="3">区分</td>
									<td width="23%" rowspan="2">勤務形態</td>
								</tr>
								<tr>
									<td>幼稚園教諭</td>
									<td>保育士</td>
									<td>その他</td>
								</tr>
							</thead>
							<tbody id="dataList">
								<?php foreach ($staffList as $key => $val){?>
								<tr>
									<td class="t01">
										  <p><input name="Staff_ID" type="checkbox" value="<?php echo $val['Staff_ID'];?>" class="txt"/></p>
                                  		  <span><a href="javascript:void(0);" class="save" title="保存"><img src="<?php echo $media;?>images/gou.png"/></a></span>
                                  		  <span><a href="javascript:void(0);" class="cancel" title="キャンセル"><img src="<?php echo $media;?>images/cha.png"/></a></span>
									</td>
									<td class="edit"><?php echo $val['Staff_Name'];?></td>
									<td class="edit"><?php echo $val['Staff_Name_Spell'];?></td>
									<td><select name="Staff_Sex" class="select01"><option value="">---</option><option <?php echo $val['Staff_Sex']=='1'?'selected':'';?> value="1">男</option><option <?php echo $val['Staff_Sex']=='2'?'selected':'';?> value="2">女</option></select></td>
									<td class="edit"><?php echo $val['Staff_Jobs'];?></td>
									<td><select name="Staff_Class" class="select02">
											<option value="">-------</option>
											<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key_c => $val_c){?>
											 	<option <?php echo $val['Staff_Class']==$key_c?'selected':'';?> value="<?php echo $key_c?>"><?php echo $val_c?></option>
											<?php }?>
										</select>					
									</td>
									<td><input type="checkbox" <?php $arr=explode(';',$val['Staff_Duty']);echo in_array('Teacher', $arr)?'checked':'';?> class="checkbox" name="Staff_Duty" value="Teacher" /></td>
									<td><input type="checkbox" <?php $arr=explode(';',$val['Staff_Duty']);echo in_array('Guardian', $arr)?'checked':'';?> class="checkbox" name="Staff_Duty" value="Guardian" /></td>
									<td><input type="checkbox" <?php $arr=explode(';',$val['Staff_Duty']);echo in_array('Other', $arr)?'checked':'';?> class="checkbox" name="Staff_Duty" value="Other" /></td>
									<td><input type="checkbox" <?php echo $val['Staff_Work_Form']==1?'checked':'';?> class="checkbox" name="Staff_Work_Form" value="1" /><b>常勤</b><input type="checkbox" <?php echo $val['Staff_Work_Form']==2?'checked':'';?> class="checkbox" name="Staff_Work_Form" value="2" /><b>非常勤</b><input type="text" name="Staff_Work_Time"  class="add" style="width:15px;" value="<?php echo $val['Staff_Work_Time'];?>" readonly ><b>時間</b></td>
								</tr>
								<?php }?>						
							</tbody>
						</table>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<script>
	var canEdit;	
    $(function(){

    	//可以编辑
		setCanEdit(true);

		//权限单选
		$('#dataList').on('click','input[name="Staff_Work_Form"]',function(){
			var ck = $(this).prop('checked');
			if(ck){				
				$(this).parent().parent().find('input[name="Staff_Work_Form"]').attr('checked',false);
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
		
		$('input[name="Staff_Work_Time"]').on('click',this,function(){
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent().parent());
			}
		});
		
		//点击复选框，改变状态编辑本行
		$('#dataList').on('click','.checkbox',function(){			
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent().parent());
			}					
		});

		//点击select，改变状态编辑本行
		$('#dataList').on('click','.select01,.select02',function(){			
			if(canEdit){
				setCanEdit(false);				
				editLine($(this).parent().parent());
			}					
		});

		
		//保存编辑
    	$('#dataList').on('click','.save',function(){
    		var obj1 = $(this).parent().parent();
			var obj = obj1.parent();		
			var Staff_ID = obj.find('input[name="Staff_ID"]').val();
			var Staff_Name = obj.find('input[name="Staff_Name"]').val();
			var Staff_Name_Spell = obj.find('input[name="Staff_Name_Spell"]').val();
			var Staff_Sex = obj.find('select[name="Staff_Sex"]').val();
			var Staff_Jobs = obj.find('input[name="Staff_Jobs"]').val();
			var Staff_Class = obj.find('select[name="Staff_Class"]').val();
			var Staff_Duty = obj.find('input[name="Staff_Duty"]:checked').map(function(index,elem){return $(elem).val();}).get().join(';');
			var Staff_Work_Form = obj.find('input[name="Staff_Work_Form"]:checked').length==1?obj.find('input[name="Staff_Work_Form"]:checked').val():'';
			var Staff_Work_Time = obj.find('input[name="Staff_Work_Time"]').val();

			$.ajax({
				   type: "POST",
				   url: "<?php echo URL::site('administration/addStaff');?>",
				   cache: false,
				   dataType: 'json',
				  // dataType: 'html',
				   data: "Staff_ID="+Staff_ID+"&Staff_Name="+Staff_Name+"&Staff_Name_Spell="+Staff_Name_Spell+"&Staff_Sex="+Staff_Sex+"&Staff_Jobs="+Staff_Jobs+"&Staff_Class="+Staff_Class+'&Staff_Duty='+Staff_Duty+"&Staff_Work_Form="+Staff_Work_Form+"&Staff_Work_Time="+Staff_Work_Time,
				   error: function(){alert('error');},
				   success: function(json){	
						if(json.result){						
							obj1.find('span').hide().end().find("p").show().end().find('input[name="Staff_ID"]').val(json.Staff_ID).end().parent().find('.edit').each(function(index, element) {												
								$(this).html($(this).find('input').prop('value'));
							}).end().find('.checkbox').each(function(index, element) {							
								if($(this).prop('checked')==true){
									$(this).prop('checked',true);
								}else{
									$(this).prop('checked',false);
								}
							}).end().find('input[name="Staff_Work_Time"]').prop('readOnly',true);
							setCanEdit(true);						
						}else{
							var str = '';
							for(i in json.errors){
								str += json.errors[i]+'\n';
							}
							alert(str);						
						}
				   }
				});
    	});

    	//放弃编辑本行操作
		$('#dataList').on('click','.cancel',function(){
			var obj = $(this).parent().parent();
			if(obj.parent().find('input[name="Staff_ID"]').val()!=''){
				obj.find('span').hide().end().find("p").show().end().parent().find('.edit').each(function(index, element) {
					$(this).html($(this).find('input').attr('value'));
				}).end().find('.checkbox').each(function(index, element) {
					if($(this).attr('checked')=='checked'){
						$(this).prop('checked','checked');
					}else{
						$(this).prop('checked',false);
					}
                }).end().find('input[name="Staff_Work_Time"]').prop('readOnly',true);
			}else{
				obj.parent().remove();
			}
			setCanEdit(true);
		});

		//删除按钮
		$('#delete').on('click',this,function(){
			if(canEdit){			
				var IDArr = [];
				var NAME_Arr = []
				$('#dataList').find('input[name="Staff_ID"]:checked').each(function(index, element) {
                    IDArr[index] = $(this).val();
					NAME_Arr[index] = $(this).parent().parent().parent().find('.edit:eq(1)').html();
                });
				if(IDArr.length==0) return false;
				if(!confirm("アカウント（ "+NAME_Arr.join("、")+" ）を削除します。よろしいですか？")){
					return false;
				}
				$.ajax({
				   type: "POST",
				   url: "<?php echo URL::site('administration/delStaff');?>",
				   cache: false,
				   dataType: 'json',
				   data: "ID="+IDArr.join(";"),
				   error: function(){alert('ajaxエラー');},
				   success: function(json){ 
						if(json.result){	
							$('#dataList').find('input[name="Staff_ID"]:checked').each(function(index, element) {
								$(this).parent().parent().parent().remove();
							});	
						}else{
							alert('SYS異常があります。');
							window.location.reload(true);							
						}
				   }
				});
			}
		});
        
    })



	
	function addLine(){		
    	if(canEdit){
			setCanEdit(false);			 
			var tr = '	<tr>';
			tr += '   	<td>';
			tr += '			<p><input name="Staff_ID" type="checkbox" value="" class="txt"/></p>';
			tr += '			<span><a href="javascript:void(0);" class="save" title="保存"><img src="<?php echo $media;?>images/gou.png"/></a></span>';
			tr += '         <span><a href="javascript:void(0);" class="cancel" title="キャンセル"><img src="<?php echo $media;?>images/cha.png"/></a></span>';
			tr += ' 	</td>';
			tr += '		<td class="edit"><input type="text" name="Staff_Name" class="add validate[required]" ></td>';
			tr += '		<td class="edit"><input type="text" name="Staff_Name_Spell" class="add validate[required]"></td>';
			tr += '		<td><select name="Staff_Sex" class="select01"><option value="">---</option><option value="1">男</option><option value="2">女</option></select></td>'
			tr += '		<td class="edit"><input type="text" name="Staff_Jobs" class="add validate[required]"></td>';
			tr += '		<td><select name="Staff_Class" class="select02">'
			tr += '				<option value="">----------</option><?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val){?> <option value="<?php echo $key?>"><?php echo $val?></option> <?php }?>'
			tr += '			</select>'
			tr += '		</td>'
		
			tr += '		<td><input name="Staff_Duty" class="checkbox" type="checkbox" value="Teacher"/></td>';							
			tr += '		<td><input name="Staff_Duty" class="checkbox" type="checkbox" value="Guardian"/></td>';
			tr += '		<td><input name="Staff_Duty" class="checkbox" type="checkbox" value="Other"/></td>';
			tr += '		<td><input type="checkbox" class="checkbox" name="Staff_Work_Form" value="1" /><b>常勤</b><input type="checkbox" class="checkbox" name="Staff_Work_Form" value="2" /><b>非常勤 </b><input type="text" name="Staff_Work_Time" class="add" style="width:15px;" value="" ><b>時間</b></td>'						
			tr += '	</tr>';
			$('#dataList').append(tr).find('tr:last-child').find('td:first-child p').hide().end().find('td:first-child span').show();			
    	}
	}

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
					$(this).html('<input type="text" name="Staff_Name" class="add" value="'+$(this).html()+'">');
					break;
				case 1:
					$(this).html('<input type="text" name="Staff_Name_Spell" class="add" value="'+$(this).html()+'">');
					break;
				case 2:
					$(this).html('<input type="text" name="Staff_Jobs" class="add" value="'+$(this).html()+'">');
					break;									
			}
		}).end().find('td:first-child p').hide().end().find('td:first-child span').show().end().find('input[type="checkbox"]').attr('disabled',false).end().find('input[name="Staff_Work_Time"]').attr('readonly',false);		
	}
	</script>
	
	
</body>
</html>