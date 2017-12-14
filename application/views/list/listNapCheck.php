<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('daycheck/dayCheckDetail').URL::query(array('yearMonDay'=>$yearMonDay)).'"><input type="button" value="登降園簿の作成画面へ戻る" /></a>
						<a href="'.URL::site('list/listNapTempIndex').URL::query(array('yearMonDay'=>NULL,'class'=>NULL)).'"><input type="button" value="午睡チェックメニューへ戻る" /></a></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>	
	<div class="mainbox">
		<div class="pagetop">
			<div class="topleft topleft01  left">
				<div class="listbut listbut18"><a>午睡チェック</a></div>
				<div class="datelist datelist18">
					<form id="searchForm" action="" method="post" >
                    <ul>
                    	<?php
                        list($Y,$m,$d) = explode('-',$yearMonDay);
						?>
						<li><span>日　付</span><input name="txt_Day_Y" type="text" class="txt01 validate[required,custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:60px;" value="<?php echo $Y;?>"><em>年</em>
							<select name="select_Day_M" class="select01" >
								<?php foreach ($months as $key=>$val){?>
                                    <option <?php echo $val==$m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php }?>
                            </select><em>月</em>
							<select name="select_Day_D" class="select01" >
								<?php foreach ($days as $key=>$val){?>
                                    <option <?php echo $val==$d?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php }?>
                            </select><em>日</em>
							<input type="text" class="txt01" style="width:50px;" value="<?php echo $week;?>" /><em>日</em>
						</li>
					</ul>
                    </form>
				</div>
			</div>
			
			<div class="toprighttxt right">
				<h3>午睡チェックポイント</h3>
				<div class="txt01 left">
					<p>① 呼吸の確認(息づかい、咳、いびき)<br/>
					② 顔色<br/>
					③ 触診(体温、異常な発汗、湿疹の有無)</p>
				</div>
				<div class="txt01 right">
					<p>④ 仰向け寝、寝具の状態<br/>
					⑤ その他(室温、湿度、冷気、暖気の状態)</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="maintablebox">
			<div class="maintabletop  fmaintabletop01" style="margin-top:15px;">
				<ul>
                    <?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>                    
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable maintable18 fxmaintable8">
            	<?php
                if($SELLEVEL!='Reader'){
				?>
				<div class="mbut18">
					<a href="javascript:void(0)" onClick="formSubmit()" >保 存 す る</a>
					<a href="javascript:void(0)" onClick="addColspan()" >睡眠時間チェック枠の追加</a>
					<a href="javascript:void(0)" onClick="addSleepColspan()">チェック枠の追加</a>
				</div>
                <?php
				}
				?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
					<?php 
                    foreach ($parameter['BASE_INFO']['CLASS'] as $key1 =>$val1){
						$num = array_key_exists($key1,$napCheck_Num)?$napCheck_Num[$key1]:5;
						$num = $num <5?5:$num;
                    ?>
                                        
                    <thead id="<?php echo 'tab_header_'.$key1;?>" <?php if($key1!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>
                        <tr>
                            <td class="tt01"></td>
                            <td></td>
                            <td class="tt02">苗字</td>
                            <td>名前</td>
                            <td>性別</td>                       
                            <td class="sleep" style="background-color: #FF0000">就床時刻</td>
                            <td class="tag" style="background-color: #FF0000">起床時刻</td>
                            
                            <?php
                            for($i=1;$i<=$num;$i++){
								echo "<td class=\"checkNum\">{$i}回目</td>";	
							}
							?>
							
                        </tr>
                    </thead> 
                                       
                    <tbody id="<?php echo 'tab_con_'.$key1?>" <?php if($key1!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?> >
                        <?php 
                        foreach ($child_Info as $key=>$val){
                            if($val['Class']==$key1){
								$num_tr=count($val['Check_list']);
								$num_tr=$num_tr<1?1:$num_tr;
                        ?>
                        <?php for($tr=0;$tr<$num_tr;$tr++){
                        	$Check_list=array();
                        	if(!empty($val['Check_list'])&&array_key_exists($tr, $val['Check_list'])){
                        		$Check_list=explode(';', $val['Check_list'][$tr]['Check_Time']);
                        	}
                        	
                        	if($tr==0){?>
                        <tr>
                            <td class="tt01">
                            	<a href="<?php echo URL::site('list/napCheckDetail').URL::query(array('yearMonDay'=>$yearMonDay,'class'=>$key1,'child_id'=>$val['ID']));?>"><input type="button" value="詳 細 確 認" /></a>
                            	<input type="hidden" name="txt_child_ID[]" value="<?php echo $val['ID'];?>" />
                            	<input type="hidden" name="txt_Tr_Num" value="<?php echo $num_tr?>">                  
                            	<input type="hidden" name="txt_Sleep_Nap_ID[<?php echo $val['ID'];?>][]" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['ID']:'';?>">
                            </td>
                            <td ><input name="addCheck" class="tt01 tablecb checkOnly" type="checkbox" value="<?php echo $val['ID'];?>"></td>
                            <td class="tt02"><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                            <td><?php echo $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
                           
                           <!-- 就床与起床 -->							
                            <td>                        	
                            	<input name="txt_Begin_Sleep_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>]" type="text" style="border:1px solid #FF0000" class="txt01" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['Begin_Sleep_Time']:''?>">
                            </td>
                            <td class="tag"><input name="txt_End_Sleep_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>]" type="text" style="border:1px solid #FF0000" class="txt01" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['End_Sleep_Time']:''?>"></td>

                            
                            <!--午睡 -->
                            
                            <?php for($wl=0;$wl<$num;$wl++){?>
                            <td>
                            	<input name="txt_Check_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>][]" type="text" class="txt01" value="<?php echo array_key_exists($wl, $Check_list)?$Check_list[$wl]:'';?>">
                            </td>
                            <?php }?>
						                                           
                        </tr>
                        <?php }else{?>
                          <tr>
                            <td class="tt01">
                            	<input type="hidden" name="txt_Sleep_Nap_ID[<?php echo $val['ID'];?>][]" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['ID']:'';?>">
                            </td>
                            <td ></td>
                            <td class="tt02"></td>
                            <td></td>
                            <td></td>
                           
                            
                           <!-- 就床与起床 -->							
                            <td>                        	
                            	<input name="txt_Begin_Sleep_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>]" type="text" style="border:1px solid #FF0000" class="txt01" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['Begin_Sleep_Time']:''?>">
                            </td>
                            <td class="tag"><input name="txt_End_Sleep_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>]" type="text" style="border:1px solid #FF0000" class="txt01" value="<?php echo array_key_exists($tr, $val['Check_list'])?$val['Check_list'][$tr]['End_Sleep_Time']:''?>"></td>

                            
                            <!-- 午睡 -->
							 <?php for($wl=0;$wl<$num;$wl++){?>
                            <td>
                            	<input name="txt_Check_Time[<?php echo $val['ID'];?>][<?php echo $tr+1;?>][]" type="text" class="txt01" value="<?php echo array_key_exists($wl, $Check_list)?$Check_list[$wl]:'';?>">
                            </td>
                            <?php }?>                                               
                        </tr>
                        <?php
                     	  }  
                       	 } 
						}
                       }
                        ?>                        
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
			</div>
		</div>
		
	</div>
<script type="text/javascript">
$(function(){
	$('#searchForm').validationEngine('attach');
	$('#searchForm input[type="text"]').on('change',this,function(){getChangeSearch()});
	$('#searchForm select').on('change',this,function(){getChangeSearch()});
	
	$('tbody input[type="text"]').on('click',function(){
		setTimes(this);
	});

	$('.checkOnly').on('click',this,function(){checkOnly($(this))});
});

function setTimes(obj){
	if($(obj).val()==""){
		var myDate = new Date();
		var hours = myDate.getHours();  
		var minutes = myDate.getMinutes(); 
		$(obj).val(checkTime(hours)+':'+checkTime(minutes));
	}
}

function checkTime(i)
{
	if (i<10){i="0" + i}
  	return i;
}

function getChangeSearch()
{
	var txt_Day_Y = $('#searchForm input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#searchForm select[name="select_Day_M"]').val();
	var select_Day_D = $('#searchForm select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	location.href="<?php echo URL::site('list/listNapCheck').URL::query(array('yearMonDay'=>NULL));?>&yearMonDay="+yearMonDay;
}
  
function switchTab(n){  
	for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
		document.getElementById("tab_C" + i).className = "";  
		document.getElementById("tab_header_C"+i).style.display = "none";
		document.getElementById("tab_con_C"+i).style.display = "none";  
	}  
	document.getElementById("tab_" + n).className = "cn";
	document.getElementById("tab_header_" + n).style.display = "table-row-group";   
	document.getElementById("tab_con_" + n).style.display = "table-row-group"; 
	//scrollAdjustment();	
}

function checkOnly(obj)
{
	if (obj.attr('checked')) {
		obj.attr('checked',false);
	}else{
		$('.checkOnly').each(function(){
			$(this).attr('checked',false);
		});
		obj.attr('checked',true);
		obj.prop('checked',true);
	}
}

function addColspan(){

	var tmpId = $('.maintabletop').find('li.cn').attr('id');//班级tab_class
	var tmpNo = tmpId.substring(4);  //获取班级ID编号
	var tmpHeader = 'tab_header_'+tmpNo;
	var num = $('#'+tmpHeader).find('td.checkNum').length; //checknum数量
	
	var obj_Tr = $('input:checkbox[name="addCheck"]:checked').parent().parent();
	var height_Tr =obj_Tr.height();
	var child_id =obj_Tr.find('input[name="addCheck"]').val();
	var num_Tr = obj_Tr.find('input[name="txt_Tr_Num"]').val();
		num_Tr++;
		obj_Tr.find('input[name="txt_Tr_Num"]').val(num_Tr);
		
	for(var i=1;i<num_Tr-1;i++){
		obj_Tr=obj_Tr.next();	
	}
	
	var new_Tr  = '<tr style="height:'+height_Tr+'px"><td class="tt01"><input type="hidden" name="txt_Sleep_Nap_ID['+child_id+'][]" value=""></td>';
		new_Tr += '	<td> </td>';
		new_Tr += ' <td class="tt02"></td>  <td></td>  <td></td>';
		new_Tr += ' <td> <input name="txt_Begin_Sleep_Time['+child_id+']['+num_Tr+']" type="text" style="border:1px solid #FF0000" class="txt01" value=""></td>';
		new_Tr += ' <td> <input name="txt_End_Sleep_Time['+child_id+']['+num_Tr+']" type="text" style="border:1px solid #FF0000" class="txt01" value=""></td>';
	for(var w =0;w<num;w++){
		new_Tr += ' <td> <input name="txt_Check_Time['+child_id+']['+num_Tr+'][]" type="text" class="txt01" value=""></td>';
	}
		new_Tr += '</tr>';

	obj_Tr.after(new_Tr);	
	obj_Tr.next().find('input[type="text"]').on('click',function(){setTimes(this);});
				
}

function addSleepColspan(){

	var obj_Tr = $('input:checkbox[name="addCheck"]:checked').parent().parent();
	var child_id =obj_Tr.find('input[name="addCheck"]').val();
	var num_Tr = obj_Tr.find('input[name="txt_Tr_Num"]').val();

	
	var tmpId = $('.maintabletop').find('li.cn').attr('id');//班级tab_class
	var tmpNo = tmpId.substring(4);  //获取班级ID编号
	var tmpHeader = 'tab_header_'+tmpNo;
	var tmpbody = 'tab_con_'+tmpNo;
	
	var num = $('#'+tmpHeader).find('td.checkNum').length+1
	$('#'+tmpHeader+' tr').append('<td class="checkNum">'+num+'回目</td>');

	$('#'+tmpbody+' tr').each(function(){
		$(this).append($(this).find('td:last').clone()).find('input[type="text"]').on('click',function(){setTimes(this);});
	});
		
}


function formSubmit(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');	
	var tmpNo = tmpId.substring(4);
	var tmpHeader = 'tab_header_'+tmpNo;
	var tmpbody = 'tab_con_'+tmpNo;	
	
	if($('#'+tmpbody+' tr').length<1) return false;
	
	var data =$('#'+tmpbody+' input').serialize()+'&yearMonDay=<?php echo $yearMonDay;?>';
	
	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('list/listNapCheckUpdate');?>",
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
<?php
if(array_key_exists('class',$_GET)){
echo "$(function(){switchTab('{$_GET['class']}')});";	
}
?>
</script> 	
</body>
</html>