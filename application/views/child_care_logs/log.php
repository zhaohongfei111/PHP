<?php
echo View::factory('public/head');
?>
<body>

	<?php
	$logohtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('list/listAll').'"><input type="button" value="園児一覧に戻る" /></a></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" id="btn_Save" value="保　存" onClick="formMainSave()" /></p>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" value="PDFに出力" onClick="formPdfSave()" /></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>    

	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('list/log_insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="content">
			<div class="xptop">保 育 日 誌</div>
			<input type="hidden" name="Log_ID" value="<?php echo empty($log_info)?'':$log_info['Log_ID']?>"/>
			<div class="xpleft left">
				<div class="datebox">
					<div class="datelist datelist20">
						<ul>
							<?php
								$Y = date('Y');
								$m = date('m');
								$d = date('d');
               	 				if(array_key_exists('YearMonDay',$_GET)){
								list($Y,$m,$d) = explode('-',$_GET['YearMonDay']);
								}?>
							<li><span>日　付</span><input name="txt_Log_Date_Y" type="text" class="txt01 validate[required,custom[integer],min[1990],max[2050]]" value="<?php echo $Y;?>" style="width:80px;" /><em>年</em>
								<select name="select_Log_Date_M" class="select01" >
									<?php foreach ($months as $key =>$val){?>
									<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>月</em>
								
								<select name="select_Log_Date_D" class="select01" >
									<?php foreach ($days as $key =>$val){?>
									<option <?php if($d==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
									<?php }?>
								</select><em>日</em>
								
								<input name="txt_Log_Week" type="text" value="" style="width:50px;" readonly /><em>曜日</em>
								<em>天候</em><input name="txt_Log_Weather" type="text" value="<?php echo empty($log_info)?'':$log_info['Log_Weather'];?>" style="width:50px;" />
							</li>
							<li><span class="hide_tag">出席人数</span><input name="txt_Present_Num" type="text" class="txt01 hide_tag" value="<?php echo empty($log_info)?'':$log_info['Present_Num'];?>" style="width:60px;" />
								<em class="hide_tag">欠席人数</em><input name="txt_Absent_Num" type="text" class="txt01 hide_tag" value="<?php echo empty($log_info)?'':$log_info['Absent_Num'];?>" style="width:60px;" />
								<span>保健・安全</span><input name="txt_Care_Security" type="text" class="txt03" value="<?php echo empty($log_info)?'':$log_info['Care_Security'];?>"/>
								
							</li>
							<li><span>養　護</span><input name="txt_Curing" type="text" class="txt03" value="<?php echo empty($log_info)?'':$log_info['Curing'];?>"/>
								<span>給食・食育</span><input name="txt_Eating" type="text" class="txt03" value="<?php echo empty($log_info)?'':$log_info['Eating'];?>" />
							</li>
							<li><span>教　育</span><input name="txt_Education" type="text" class="txt03" value="<?php echo empty($log_info)?'':$log_info['Education'];?>"/>
								<span>家庭連絡</span><input name="txt_Family_Comm" type="text" class="txt03" value="<?php echo empty($log_info)?'':$log_info['Family_Comm'];?>" />
							</li>
							
							<li id="weekday_class"><span>クラス</span>
							<select name="select_Class" class="select02" onchange="getChild(this)" >
								<option value="">------</option>
								<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
								<option  value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
							</select></li>
							
						</ul>
					</div>
				</div>
			</div>
			<!-- 平日的日志内容 -->
			<div class="xpright right" id="Weekday_pic">				
				<div class="xpy right">
					<p>担任印</p>
				</div>
				<div class="xpy right">
					<p>園長印</p>
				</div>
			</div>
			<!-- 土日的日志内容 -->
			<div class="xpright right" id="Weekend_pic">			
				<div class="xpy">
					<p>園長印1</p>
				</div>
				<div class="xpy xpy01">
					<p>園長印2</p>
				</div>
				<div class="xpy xpy01">
					<p>園長印3</p>
				</div>
				<div class="clear"></div>
					
			</div>
			<div class="clear"></div>
			
			<!-- 平日的日志内容 -->
			<div id="Weekday">
			<div class="xpbox tabbox">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td><input id="chk_All" type="checkbox"/></td><td>苗字</td><td>名前</td><td>性別</td><td>クラス</td><td>年齢</td><td>生年月日</td><td>認定区分</td><td class="t01">本日の姿</td>
						</tr>
					</thead>
					<tbody id="tbody_class">
				
					</tbody>
				</table>
			</div>
			<div class="xptxt">
				<h3>一日の流れ</h3>
				<textarea name="txt_Day_Flow" rows="" cols=""></textarea>
			</div>
			<div class="xptxt">
				<h3>主なあそび・生活</h3>
				<textarea name="txt_Daily_Life" rows="" cols=""></textarea>
			</div>
			<div class="xptxt">
				<h3>エピソードの考察(読み取り)・ねらいへの環境構成や援助および配慮など</h3>
				<textarea name="txt_Episode" rows="" cols=""></textarea>
			</div>
			<div class="xptxt">
				<h3>明日への展望(評価、改善)</h3>
				<textarea name="txt_Hope_Weekday" rows="" cols=""></textarea>
			</div>	
			<div class="xptxt">
				<h3>連絡事項など</h3>
				<textarea name="txt_Matters" rows="" cols=""></textarea>
			</div>
			</div>
			
			<!-- 土日的日志内容 -->
			<div id="Weekend" >
			<div class="xptabbox">
				<div class="xptit">出　席</div>
				<div class="xptable">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tbody>
							<?php
								  $count=count($classes);
								  $class_Num=empty($log_info)?array():explode(';', $log_info['Class_Num']);
								  
								  if($count%2==0){
								  	for($i=0;$i<$count;$i=$i+2){?>
									<tr>
										<td>クラス名</td><td>出席人数</td><td>クラス名</td><td>出席人数</td>
									</tr>
									<tr>
										<td><input type="hidden" name="txt_Class_ID[]" value="<?php echo $classes[$i];?>"><input type="text" class="txt01" style="width:220px;" value="<?php echo $parameter['BASE_INFO']['CLASS'][$classes[$i]];?>" readonly /></td>
										<td><input name="txt_Class_Num[]" type="text" class="txt01" style="width:70px;margin-right:30px;" value="<?php echo empty($class_Num)?'':$class_Num[$i];?>"/></td>
										<td><input type="hidden" name="txt_Class_ID[]" value="<?php echo $classes[$i+1];?>"><input type="text" class="txt01" style="width:220px;" value="<?php echo $parameter['BASE_INFO']['CLASS'][$classes[$i+1]];?>" readonly/></td>
										<td><input name="txt_Class_Num[]" type="text" class="txt01" style="width:70px;" value="<?php echo empty($class_Num)?'':$class_Num[$i+1];?>"/></td>
									</tr>						
							<?php 	}} else{
								  	for($i=0;$i<$count-1;$i=$i+2){?>
									<tr>
										<td>クラス名</td><td>出席人数</td><td>クラス名</td><td>出席人数</td>
									</tr>
									<tr>
										<td><input type="hidden" name="txt_Class_ID[]" value="<?php echo $classes[$i];?>"><input type="text" class="txt01" style="width:220px;" value="<?php echo $parameter['BASE_INFO']['CLASS'][$classes[$i]];?>" readonly /></td>
										<td><input name="txt_Class_Num[]" type="text" class="txt01" style="width:70px;margin-right:30px;" value="<?php echo empty($class_Num)?'':$class_Num[$i];?>"/></td>
										<td><input type="hidden" name="txt_Class_ID[]" value="<?php echo $classes[$i+1];?>"><input type="text" class="txt01" style="width:220px;" value="<?php echo $parameter['BASE_INFO']['CLASS'][$classes[$i+1]];?>" readonly/></td>
										<td><input name="txt_Class_Num[]" type="text" class="txt01" style="width:70px;" value="<?php echo empty($class_Num)?'':$class_Num[$i+1];?>"/></td>
									</tr>		
								
							<?php }?>
							
							<tr>
								<td>クラス名</td><td>出席人数</td><td>クラス名</td><td>出席人数</td>
							</tr>
							<tr>
								<td><input type="hidden" name="txt_Class_ID[]" value="<?php echo $classes[$count-1];?>"><input type="text" class="txt01" style="width:240px;" value="<?php echo $parameter['BASE_INFO']['CLASS'][$classes[$count-1]];?>" readonly /></td>
								<td><input name="txt_Class_Num[]" type="text" class="txt01" style="width:70px;margin-right:30px;" value="<?php echo empty($class_Num)?'':$class_Num[$count-1];?>"/></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<div class="clear"></div>
			</div>
			<div class="xptxt">
				<h3>あそび・ねらい</h3>
				<textarea name="txt_Games" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Games'];?></textarea>
			</div>
			<div class="xptxt">
				<h3>乳幼児の活動</h3>
				<textarea name="txt_Activities" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Activities'];?></textarea>
			</div>
			<div class="xptxt">
				<h3>保護者とのかかわり(環境と援助)</h3>
				<textarea name="txt_Relationship" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Relationship'];?></textarea>
			</div>
			<div class="xptxt">
				<h3>個人記録</h3>
				<textarea name="txt_Personal_Rec" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Personal_Rec'];?></textarea>
			</div>
			<div class="xptxt">
				<h3>家庭との連携</h3>
				<textarea name="txt_Cooperation" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Cooperation'];?></textarea>
			</div>	
			<div class="xptxt">
				<h3>明日への展望(評価、改善)</h3>
				<textarea name="txt_Hope_Weekend" rows="" cols=""><?php echo empty($log_info)?'':$log_info['Hope_Weekend'];?></textarea>
			</div>					
			</div>
			
			
			
			
			
			
		</div>
		</form>
	</div>
	<script type="text/javascript">
	$(function() {	
		$('#formMain').validationEngine('attach');
		
		$.mkDays({"year":$('input[name="txt_Log_Date_Y"]'),
				"month":$('select[name="select_Log_Date_M"]'),
				"day":$('select[name="select_Log_Date_D"]')});

		$('select[name="select_Log_Date_M"]').on('change',this,function(){Go()});
		$('select[name="select_Log_Date_D"]').on('change',this,function(){Go()});
		
		$('input[name="txt_Log_Date_Y"]').on('change',this,function(){
			if($('input[name="txt_Log_Date_Y"]').val()<2050 && $('input[name="txt_Log_Date_Y"]').val()>1970){
				Go();
			}});

		var week =new Date("<?php echo $yearMonDay?>").getDay();
		setWeek(week);
		if(week==6){
				$('#weekday_class').hide();				
				$('#Weekday').hide();
				$('#Weekend').show();
				$('#Weekday_pic').hide();
				$('#Weekend_pic').show();								
				$('.hide_tag').remove();
			}else{
				$('#weekday_class').show()
				$('#Weekday').show();
				$('#Weekend').hide();
				$('#Weekday_pic').show();
				$('#Weekend_pic').hide();
			}

		$("#chk_All").on('click',this,function(){    
		    if(this.checked){    
		        $("#tbody_class :checkbox").prop("checked", true);   
		    }else{    
		        $("#tbody_class :checkbox").prop("checked", false); 
		    }    
		});

		
		
	});

	function Go(){
		location.href="<?php echo URL::site('list/log');?>?YearMonDay="+$('input[name="txt_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val();	
	}

	function setWeek(week) {
        var day = "";
        switch (week) {
            case 0:
                day = "日";
                break;
            case 1:
                day="月";
                break;
            case 2:
                day = "火";
                break;
            case 3:
                day = "水";
                break;
            case 4:
                day = "木";
                break;
            case 5:
                day = "金";
                break;
            case 6:
                day = "土";
                break;
        }
        $('input[name="txt_Log_Week"]').val(day);
    }

	function getChild(obj){
		//if($.trim($('select[name="select_Class"]').val())=='') return false;	
		$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/getClass');?>",
		   cache: false,
		   dataType: 'json',
		   data: "Class="+$(obj).val()+"&YearMonDay="+$('input[name="txt_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val(),
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			   
		   	   var child_info =json['child_info'];
			   var log_info =json['log_info'];
			   var child_status=json['child_status'];

		   	   
			   var html="";
			   for(var d in child_info){
					html += "<tr>"
					html += "<td><input type=\"checkbox\" name=\"chk_Children_ID[]\" value=\""+child_info[d]['ID']+"\"/>"+"</td>";	
					html += "<td width=\"10%\">"+child_info[d]['FamilyName']+"<p>"+child_info[d]['FamilyName_Spell']+"</p></td>";
					html += "<td width=\"10%\">"+child_info[d]['GivenName']+"<p>"+child_info[d]['GivenName_Spell']+"</p></td>";
					html += "<td width=\"5%\">"+sex(child_info[d]['Sex'])+"</td>";
					html += "<td width=\"15%\">"+ $('select[name="select_Class"] option:selected').text()+"</td>";
					html += "<td width=\"10%\">"+child_info[d]['Age']+"</td>";
					html += "<td width=\"15%\">"+child_info[d]['Birthday']+"<p>"+child_info[d]['YearJap']+"</p></td>";
					html += "<td width=\"10%\">"+child_info[d]['Recog']+"</td>";					
					html += "<td><input name=\"txt_Children_Status["+child_info[d]['ID']+"]\" type=\"text\" class=\"txt01\" style=\"width:80%;\" value=\"\"/></td>";
					html += "</tr>";			
				  }				  
			  $('#tbody_class').empty().append(html);

			  $('input[name="Log_ID"]').val("");

			  $('input[name="txt_Log_Weather"]').val("");
				 $('input[name="txt_Present_Num"]').val("");
				 $('input[name="txt_Absent_Num"]').val("");
				 $('input[name="txt_Care_Security"]').val("");
				 $('input[name="txt_Curing"]').val("");
				 $('input[name="txt_Eating"]').val("");
				 $('input[name="txt_Education"]').val("");
				 $('input[name="txt_Family_Comm"]').val("");
				 $('textarea[name="txt_Day_Flow"]').val("");
				 $('textarea[name="txt_Daily_Life"]').val("");
				 $('textarea[name="txt_Episode"]').val("");
				 $('textarea[name="txt_Matters"]').val("");
				 $('textarea[name="txt_Hope_Weekday"]').val("");
			  
			 if(log_info.length!=0){
					 $('input[name="Log_ID"]').val(log_info['Log_ID']);
					 $('input[name="txt_Log_Weather"]').val(log_info['Log_Weather']);
					 $('input[name="txt_Present_Num"]').val(log_info['Present_Num']);
					 $('input[name="txt_Absent_Num"]').val(log_info['Absent_Num']);
					 $('input[name="txt_Care_Security"]').val(log_info['Care_Security']);
					 $('input[name="txt_Curing"]').val(log_info['Curing']);
					 $('input[name="txt_Eating"]').val(log_info['Eating']);
					 $('input[name="txt_Education"]').val(log_info['Education']);
					 $('input[name="txt_Family_Comm"]').val(log_info['Family_Comm']);
					 $('textarea[name="txt_Day_Flow"]').val(log_info['Day_Flow']);
					 $('textarea[name="txt_Daily_Life"]').val(log_info['Daily_Life']);
					 $('textarea[name="txt_Episode"]').val(log_info['Episode']);
					 $('textarea[name="txt_Matters"]').val(log_info['Matters']);
					 $('textarea[name="txt_Hope_Weekday"]').val(log_info['Hope_Weekday']);
					
					 var children_id = log_info['Children_ID'].split(";");
					 for(var i=0;i<children_id.length;i++){
							 $('input[name="chk_Children_ID[]"][value="'+children_id[i]+'"]').prop('checked',true);
							 $('input[name="txt_Children_Status['+children_id[i]+']"]').val(child_status[children_id[i]]);
						 }									 	
				}
		   }
		});
	}

	function sex(obj){
		var sex="";
		switch (obj) {      
        case "1":
            sex="男";
            break;
        case "2":
            sex = "女";
            break;     
    	}
		return sex;
	}
	function formMainSave(){
		
		var week =new Date("<?php echo $yearMonDay?>").getDay();
		var classNum =$('select[name="select_Class"]').val();
		if(week!=6&&classNum==""){
			alert('select class please');
			return false;
			}

		$('#btn_Save').attr('disabled',"true");
		$.ajax({
			   type: "POST",
			   url: "<?php echo URL::site('list/log_insert');?>",
			   cache: false,
			   dataType: 'json',
			   data: $('#formMain').serialize(),
			   error: function(){alert('ajaxエラー');},
			   success: function(json){
				   				 
				addSaveOverlay(1000,400,json['result']);			   
			   }
			});
	}

	 function formPdfSave(){
			window.open("<?php echo URL::site('list/logPDF')?>?YearMonDay="+$('input[name="txt_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val()+'&Class='+$('select[name="select_Class"]').val());	
		}
	</script>

	
</body>
</html>