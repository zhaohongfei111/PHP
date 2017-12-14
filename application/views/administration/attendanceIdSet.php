<?php
	echo View::factory('public/head');
?>
<body class="bg01">    
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保存"  onClick="formMainSave()"/></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoClass','logo')
			->set('logoHtml',$logoHtml);	
	?>

	<div class="mianbox">
		<form id="formMain" action="<?php echo URL::site('administration/attendanceId_insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="maintablebox">
			<div class="navbox">
				<ul>
					<li class="td01"><span>表示切替：</span><a href="<?php echo URL::site('administration/attendanceIdSet').URL::query(array('Status'=>'in'));?>" <?php echo $status=='in'?'style="background:#ff66ff;"':'style="background:#ffccff;"';?>>在園児</a><a href="<?php echo URL::site('administration/attendanceIdSet').URL::query(array('Status'=>'not'));?>" <?php echo $status=='not'?'style="background:#2f5597;"':'style="background:#8faadc;"';?>>入園前の園児</a></li>
				</ul>
			</div>

			<div class="maintabletop fmaintabletop01">
				<ul>				
					<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?>
						<li  id=<?php echo 'tab_'.$key?> <?php if($key=='R1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>	
			</div>
			<div class="maintable table10 fxmaintable8">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td rowspan="2">苗字</td>
							<td rowspan="2">名前</td>
							<td rowspan="2">性別</td>
							<td rowspan="2">クラス</td>
							<td rowspan="2">年齢</td>
							<td rowspan="2">生年月日</td>
							<td rowspan="2">認定区分</td>
							<td rowspan="2">入園日</td>
							<td colspan="2">カードIＤ</td>
						</tr>
							
						<tr>
							<td>保護者渡し分</td><td>園保管分</td>
						</tr>
						
						
					</thead> 			
						<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key_Recog =>$val_Recog){?>
							<tbody id=<?php echo 'tab_con_'.$key_Recog?> <?php if($key_Recog!='R1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?> >
								<?php foreach ($list as $key_list=>$val_list){
                  					if($val_list['Recog_Type']==$key_Recog){?>
                  						<tr>
											<td><?php echo $val_list['FamilyName']?><p><?php echo $val_list['FamilyName_Spell']?></p></td>
											<td><?php echo  $val_list['GivenName']?><p><?php echo $val_list['GivenName_Spell']?></p></td>
											<td><?php if($val_list['Sex']=='2'){echo '女';}if($val_list['Sex']=='1'){echo '男';}?></td>
											<td><?php echo empty($val_list['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val_list['Class']] ?></td>
											<td><?php echo $val_list['Age']?></td>
											<td><?php echo $val_list['Birthday']?><p><?php echo $val_list['YearJap_Birth']?></p></td>								
											<td><?php echo empty($val_list['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_list['Recog_Type']] ; ?></td>
											<td><?php echo $val_list['EnterDate']?><p><?php echo $val_list['YearJap_Enter']?></p></td>
											<td>
												<input type="text" class="Attendance_ID" name="txt_Attendance_ID1[<?php echo $val_list['ID'];?>]" class="txt01" style="width:150px;" value="<?php echo empty($val_list['Attendance_ID1'])?'':$val_list['Attendance_ID1'];?>">
											</td>
											<td>
												<input type="text" class="Attendance_ID" name="txt_Attendance_ID2[<?php echo $val_list['ID'];?>]" class="txt01" style="width:150px;" value="<?php echo empty($val_list['Attendance_ID2'])?'':$val_list['Attendance_ID2'];?>">
											</td>
										</tr>                  						                        						
                  				<?php }}?>
							</tbody>
						<?php }?>										
				</table>
			</div>
		</div>
		</form>
	</div>
	<script>
	$(document).ready(function() {
			$(".Attendance_ID").blur(function(){
				var id = $(this).val().replace(new RegExp("-","g"),"");				
				var len =id.length;
				if(len!=16){
					alert('16桁のカードIDを設定してください。');
					return false;
				}

				var str_p='-';//拆分符号
				var s=2;//每段长度
				$(this).val(insert_flg(id,str_p,s));				
			});
		});


	function insert_flg(str,flg,sn){
		  str=str.replace(new RegExp(flg,"g"),"");
		  var newstr="";
		  var tmp;
		  var len=str.length;//长度
		  var num=len/sn;//分段数
		  var start;
		  var end;
		  //len%sn //能否完整分段 0：是
		  for(i=0;i<num;i+=1){
		    if (len%sn!=0){//不能完整分段
		      start=i*sn-1;
		      end=i*sn+(sn-1);
		    }else{
		      start=i*sn;
		      end=(i+1)*sn;
		    }
		    start=start<0?0:start;
		    if (end<=len){
		      tmp=str.substring(start,end);
		    }
		    newstr+=(end>=len)?tmp:tmp+flg;
		  }
		  split_str=newstr;
		  return newstr;
		}
	
	function switchTab(n){ 
		   <?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?> 
				document.getElementById("tab_"+"<?php echo $key?>").className = "";  
				document.getElementById("tab_con_"+"<?php echo $key?>").style.display = "none";  
			<?php }?>
			document.getElementById("tab_" + n).className = "cn";  
			document.getElementById("tab_con_" + n).style.display = "table-row-group"; 
		}  

	function formMainSave(){			
		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('administration/attendanceId_insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});	
	}
	</script>
	
	
</body>
</html>