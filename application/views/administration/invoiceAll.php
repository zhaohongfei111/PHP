
<?php
echo View::factory('public/head');
?>



</head>
<body>
<?php
	$NAME = Session::instance()->get('NAME');
	$LASTLOGINTIME = Session::instance()->get('LASTLOGINTIME');
	?>
	<div class="headerbox01">
		<div class="mtop"><span>こども園トータルマネジメントシステム</span><?php if(!empty($NAME)) echo "ようこそ {$NAME}さん";?></div>
		<div class="logo">
			<a href="<?php echo URL::site('index/index');?>"><img src="<?php echo $media.'images/logo.jpg?'.rand(0,9999);?>" class="left" /></a>
			<div class="topright topright01 right">
				<p><a href="<?php echo URL::site('administration/index')?>"><input type="button" value="管理者メニューに戻る"  style="width:160px;margin-right:0;"/></a></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="保　存" style="width:70px;margin-right:8px;" onclick="formSubmit()"/></p>
			</div>
			<div class="topright topright01 right">
				<p><a href="<?php echo URL::site('administration/invoiceAllPDF').URL::query(array('yearMon'=>$yearMon));?>"><input type="button" value="全園児請求一覧の印刷"  style="width:160px;margin-right:8px;"/></a></p>
			</div>
			<div class="topright topright01 right">
				<p><a href="<?php echo URL::site('administration/capitalCSV').URL::query(array('yearMon'=>$yearMon));?>"><input type="button" value="CSVで出力" style="width:90px;margin-right:8px;background:#00b050;"/></a></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="チェックの入った園児の請求書の印刷"  style="width:240px;margin-right:8px;background:#f00;" onclick="invoicePDF()"/></p>
			</div>
		</div>
	</div>
	
	
	<div class="mainbox">
		<div class="pagetop">
			<div class="fdatevox">
				<div class="datelist left">
					<ul>
						<li>
						<?php list($Y,$m) = explode('-',$yearMon);?>
							<select name="select_Date_Y" class="select01" style="width:100px;"<?php foreach ($years as $key =>$val){?>
							<option <?php if($Y==$val['Y']) echo 'selected';?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
							<?php }?>
							</select><span>年度</span>
							<select name="select_Date_M" class="select01"><?php foreach ($months as $key =>$val){?>
							<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
							</select><span>月保育料</span>
						</li>
					</ul>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" style="background:#3399ff;" value="請求項目の追加" onclick="addColspan()"/></p>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>				
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
			</div>
			
			<div class="maintable fxmaintable22 fxmaintable8">
				<?php 
					foreach ($parameter['BASE_INFO']['CLASS'] as $key_1 =>$val_1){
				?>
				<table  id="MyTable_<?php echo $key_1?>" style="width:2000px;" border="0" cellspacing="0" cellpadding="0">
					<thead id="MyTable_Header_<?php echo $key_1?>">
						<tr>
							<td style="width:50px;">全園児</td>
							<td style="width:60px;">苗字</td>
							<td style="width:60px;">名前</td>
							<td>認定区分</td>
							<td>キャピタル<br/>番号</td>
							<td>保育料</td>
							<td>保育料備考</td>
							<td>延長<br/>保育料</td>
							<td>延長備考</td><td>時間外<br/>保育料</td>
							<td>特定<br/>保育料</td>
							<td>行事費</td>
							<td>教材費</td>
							<td>保護者<br/>会費</td>
							<td>絵本代</td>
							<td>保険代</td>
							<td>給食費</td>
							<td>給食費備考</td>
							<td>バス代</td>
							<td>バス代備考</td>
							<td>体操</td>
							<td>英語</td>
							<td>音楽</td>
							<td>バレエ＆<br/>ダンス</td>
							<td>用品代</td>
							<td>用品代備考</td>
							<?php if(!empty($child_Info[0]['invoiceInfo'])){
									if(!empty($child_Info[0]['invoiceInfo']['NewProjets_Name'])){
										$newProjects= explode(';', $child_Info[0]['invoiceInfo']['NewProjets_Name']);$count=1;
										foreach ($newProjects as $key_p =>$val_p){ ?>
							<td  style="width:60px" class="newProject"><input class="<?php echo 'count'.$count;?>" type="text" name="txt_NewProjets_Name[]" style="border-radius:5px;background:#fff;border:1px #ccc solid;padding:4px 15px;cursor:pointer;width:60px;" onchange="setProjectName($(this).parent())" value="<?php echo $val_p;?>"></td>								
							<?php $count++;}} }?>
							<td>備考</td><td>合計</td>
						</tr>
					</thead>
					<tbody id="MyTable_Body_<?php echo $key_1?>">
						<?php foreach ($child_Info as $key_child => $val_child){
								if($val_child['Class']==$key_1){
									$projects_cost=array();
									$projects_remark=array();
									if(!empty($val_child['invoiceInfo'])){
										$projects_cost=explode(';', $val_child['invoiceInfo']['Base_Projects_Cost']);
										$projects_remark=explode('<;>', $val_child['invoiceInfo']['Base_Projects_Remark']);
									}?>	
						<tr>
							<td><input name="pdfCheck" class="tablecb" type="checkbox" value="<?php echo $val_child['ID'];?>"><input name="hidden_ID[]" type="hidden" value="<?php echo $val_child['ID'];?>"></td>
							<td>
								<?php echo $val_child['FamilyName']?><p><?php echo $val_child['FamilyName_Spell']?></p>
								<input type="hidden" name="hidden_Name[]" value="<?php echo $val_child['FamilyName'].$val_child['GivenName'];?>">
							</td>
							<td><?php echo  $val_child['GivenName']?><p><?php echo $val_child['GivenName_Spell']?></p></td>
							<td><?php echo empty($val_child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val_child['Recog_Type']];?></td>
							<td><?php echo $val_child['Capital_ID'];?></td>
							<td class="cost edit"><input type="text" name="txt_Base_MonCost[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Base_MonCost'];}else {echo $val_child['monCost'];}?>"></td>
							<td class="edit"><input type="text" name="txt_Base_MonCost_Remark[]" style="width:80px" value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Base_MonCost_Remark'];}?>"></td>
							<td  class="cost edit"><input type="text" name="txt_Base_OverCost[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Base_OverCost'];}else {echo $val_child['overCost'];}?>"></td>
							<td class="edit"><input type="text" name="txt_Base_OverCost_Remark[]" style="width:80px"   value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Base_OverCost_Remark'];}?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_ProjectCost[]" style="width:50px"   value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Base_ProjectCost'];}else {echo $val_child['extraInfo']['extraCost'];}?>"></td>

							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][0]['money']:$projects_cost[0];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][1]['money']:$projects_cost[1];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][2]['money']:$projects_cost[2];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][3]['money']:$projects_cost[3];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][4]['money']:$projects_cost[4];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][5]['money']:$projects_cost[5];?>"></td>
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][6]['money']:$projects_cost[6];?>"></td>							
							<td class="edit"><input type="text" name="txt_Base_Projects_Remark[<?php echo $val_child['ID']; ?>][]" style="width:80px"   value="<?php echo empty($projects_remark)?$val_child['extraInfo']['projects'][6]['Project_Remark']:$projects_remark[6];?>"></td>							
							<td class="cost edit"><input type="text" name="txt_Base_Projects_Cost[<?php echo $val_child['ID']; ?>][]" style="width:50px"   value="<?php echo empty($projects_cost)?$val_child['extraInfo']['projects'][7]['money']+$val_child['extraInfo']['projects'][8]['money']:$projects_cost[7]+$projects_cost[8];?>"></td>
							<td class="edit"><input type="text" name="txt_Base_Projects_Remark[<?php echo $val_child['ID']; ?>][]" style="width:80px"   value="<?php echo empty($projects_remark)?$val_child['extraInfo']['projects'][7]['Project_Remark']:$projects_remark[7];?><?php echo empty($projects_remark)?$val_child['extraInfo']['projects'][8]['Project_Remark']:$projects_remark[8];?>"></td>
							
							<td class="cost edit">
								<input type="text" name="txt_Activity_PricePerM_1[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_PricePerM_1'];}else{ echo !in_array('1',$val_child['activitiesCheckedIDArr'])?'0':$val_child['activities'][0]['Activity_Price'];}?>">
								<input type="hidden" name="txt_Activity_Cost_1[]" value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_Cost_1'];}else{ echo !in_array('1',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][0]['Activity_Cost'];}?>">								
							</td>
							<td class="cost edit">
								<input type="text" name="txt_Activity_PricePerM_2[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_PricePerM_2'];}else{ echo !in_array('2',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][1]['Activity_Price'];}?>">
								<input type="hidden" name="txt_Activity_Cost_2[]" value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_Cost_2'];}else{ echo !in_array('2',$val_child['activitiesCheckedIDArr'])?'0':  $val_child['activities'][1]['Activity_Cost'];}?>">
							</td>
							<td class="cost edit">
								<input type="text" name="txt_Activity_PricePerM_3[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_PricePerM_3'];}else{ echo !in_array('3',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][2]['Activity_Price'];}?>">
								<input type="hidden" name="txt_Activity_Cost_3[]" value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_Cost_3'];}else{ echo !in_array('3',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][2]['Activity_Cost'];}?>">
							</td>
							<td class="cost edit">
								<input type="text" name="txt_Activity_PricePerM_4[]" style="width:50px"  value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_PricePerM_4'];}else{ echo !in_array('4',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][3]['Activity_Price'];}?>">
								<input type="hidden" name="txt_Activity_Cost_4[]" value="<?php if(!empty($val_child['invoiceInfo'])){echo $val_child['invoiceInfo']['Activity_Cost_4'];}else{ echo !in_array('4',$val_child['activitiesCheckedIDArr'])?'0': $val_child['activities'][3]['Activity_Cost'];}?>">
							</td>
							<?php $goods_name=array();
								  $googs_price=array();
								  $goods_remark = array();
									if(!empty($val_child['invoiceInfo'])){
										$goods_name=explode(';', $val_child['invoiceInfo']['Buy_GoodsNames']);
										$googs_price=explode(';', $val_child['invoiceInfo']['Buy_GoodsPrices']);
										$goods_remark=explode('<;>', $val_child['invoiceInfo']['Buy_GoodsRemark']);
									}
									
									?>
							<td class="buyGoods"><?php if(!empty($googs_price)){echo array_sum($googs_price);}else{if(!empty($val_child['buyGoodsInfo']['thisYearMon'])){$all_count=0;foreach ($val_child['buyGoodsInfo']['thisYearMon'] as $key_g1 =>$val_g1){$all_count+=$val_g1['Goods_Price'];} echo $all_count;}}?></td>
							<td><?php if(!empty($goods_name)){foreach ($goods_name as $key_g => $val_g){echo empty($val_g)?'':$val_g.'購入;';}}else{if(!empty($val_child['buyGoodsInfo']['thisYearMon'])){foreach ($val_child['buyGoodsInfo']['thisYearMon'] as $key_g1 =>$val_g1){echo $val_g1['Goods_Name'].'購入;';}}}?></td>							
							<!-- 						
							<td><?php if(!empty($goods_remark)){foreach ($goods_remark as $key_gr => $val_gr){echo empty($val_gr)?'':$val_gr.';';}}else{if(!empty($val_child['buyGoodsInfo']['thisYearMon'])){foreach ($val_child['buyGoodsInfo']['thisYearMon'] as $key_gr1 =>$val_gr1){echo $val_gr1['Goods_Remark'].';';}}}?></td>
							 -->
							<?php if(!empty($val_child['invoiceInfo'])){
									if(!empty($val_child['invoiceInfo']['NewProjets_Name'])){
										$newProjectsCost= explode(';', $val_child['invoiceInfo']['NewProjets_Cost']);
										foreach ($newProjectsCost as $key_pc =>$val_pc){?>
								<td class="cost edit"><input type="text" name="txt_NewProjets_Cost[<?php echo $val_child['ID']; ?>][]" style="width:80px" value="<?php echo $val_pc;?>"></td>								
							<?php }}}?>
							<td class="edit tag"><input type="text" name="txt_Remark_All[]" style="width:80px" value="<?php echo empty($val_child['invoiceInfo'])?'':$val_child['invoiceInfo']['All_Remark'];?>"></td>
							<td class="addAll"></td>
						</tr>						
						<?php } }?>
					</tbody>
				</table>
				<?php }?>
			</div>
		</div>
		
	</div>
	<script type="text/javascript">
	function FixTable(TableID, FixColumnNumber, width, height) {
		if ($("#" + TableID + "_tableLayout").length != 0) {
			$("#" + TableID + "_tableLayout").before($("#" + TableID));
			$("#" + TableID + "_tableLayout").empty();
		}
		else {
			$("#" + TableID).after("<div id='" + TableID + "_tableLayout' style='overflow:hidden;height:" + height + "px; width:" + width + "px;'></div>");
		}
		$('<div id="' + TableID + '_tableFix"></div>'
		+ '<div id="' + TableID + '_tableHead"></div>'
		+ '<div id="' + TableID + '_tableColumn"></div>'
		+ '<div id="' + TableID + '_tableData"></div>').appendTo("#" + TableID + "_tableLayout");
		var oldtable = $("#" + TableID);
		var tableFixClone = oldtable.clone(true);
		tableFixClone.attr("id", TableID + "_tableFixClone");
		$("#" + TableID + "_tableFix").append(tableFixClone);
		var tableHeadClone = oldtable.clone(true);
		tableHeadClone.attr("id", TableID + "_tableHeadClone");
		$("#" + TableID + "_tableHead").append(tableHeadClone);
		var tableColumnClone = oldtable.clone(true);
		tableColumnClone.attr("id", TableID + "_tableColumnClone");
		$("#" + TableID + "_tableColumn").append(tableColumnClone);
		$("#" + TableID + "_tableData").append(oldtable);
		$("#" + TableID + "_tableLayout table").each(function () {
			$(this).css("margin", "0");
		});
		var HeadHeight = $("#" + TableID + "_tableHead thead").height();
		HeadHeight += 2;
		$("#" + TableID + "_tableHead").css("height", HeadHeight);
		$("#" + TableID + "_tableFix").css("height", HeadHeight);
		var ColumnsWidth = 0;
		var ColumnsNumber = 0;
		$("#" + TableID + "_tableColumn tr:last td:lt(" + FixColumnNumber + ")").each(function () {
			ColumnsWidth += $(this).outerWidth(true);
			ColumnsNumber++;
		});
		ColumnsWidth += 2;
		if ($.support.msie) {
			switch ($.browser.version) {
				case "7.0":
					if (ColumnsNumber >= 3) ColumnsWidth--;
					break;
				case "8.0":
					if (ColumnsNumber >= 2) ColumnsWidth--;
					break;
			}
		}
		$("#" + TableID + "_tableColumn").css("width", ColumnsWidth);
		$("#" + TableID + "_tableFix").css("width", ColumnsWidth);
		$("#" + TableID + "_tableData").scroll(function () {
			$("#" + TableID + "_tableHead").scrollLeft($("#" + TableID + "_tableData").scrollLeft());
			$("#" + TableID + "_tableColumn").scrollTop($("#" + TableID + "_tableData").scrollTop());
		});
		$("#" + TableID + "_tableFix").css({ "overflow": "hidden", "position": "relative", "z-index": "50", "background-color": "#fff" });
		$("#" + TableID + "_tableHead").css({ "overflow": "hidden", "width": width - 17, "position": "relative", "z-index": "45", "background-color": "#fff" });
		$("#" + TableID + "_tableColumn").css({ "overflow": "hidden", "height": height - 17, "position": "relative", "z-index": "40", "background-color": "#fff" });
		$("#" + TableID + "_tableData").css({ "overflow": "scroll", "width": width, "height": height, "position": "relative", "z-index": "35" });
		if ($("#" + TableID + "_tableHead").width() > $("#" + TableID + "_tableFix table").width()) {
			$("#" + TableID + "_tableHead").css("width", $("#" + TableID + "_tableFix table").width());
		   $("#" + TableID + "_tableData").css("width", $("#" + TableID + "_tableFix table").width() + 17);
		}
		if ($("#" + TableID + "_tableColumn").height() > $("#" + TableID + "_tableColumn table").height()) {
			$("#" + TableID + "_tableColumn").css("height", $("#" + TableID + "_tableColumn table").height());
			$("#" + TableID + "_tableData").css("height", '400px');
		}
		$("#" + TableID + "_tableFix").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableHead").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableColumn").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableData").offset($("#" + TableID + "_tableLayout").offset());
	}


	
	$(function(){
		getCostAll();
		for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){   
			var tab="MyTable_C"+i
			FixTable(tab, 3, 1158, 400);
			$("#MyTable_C"+i+"_tableLayout").hide();
		}
		$("#MyTable_C1_tableLayout").show();
		
		$('select[name="select_Date_M"]').on('change',this,function(){getChangeSearch()});
		$('select[name="select_Date_Y"]').on('change',this,function(){getChangeSearch()});

 		//数据变更后，计算总和
		$('.cost').on('change',this,function(){
			getCostAll()
		});

		//物品数组 通货表示
		$('.buyGoods').each(function(){
		    $this=$(this);
		    var str=toThousands($this.html());
		    if(str!="0"){
		    	$this.html(str);
			    }		    
		});

		$('.checkOnly').on('click',this,function(){checkOnly($(this))});

		$('.cost input').each(function(){
		    $this=$(this);
		    var str=toThousands($this.val());
		    if(str!="0"){
		    	$this.val(str);
			    }		    
		});

		$('.cost input').change(function(){
			$(this).val(toThousands($(this).val()));
		});
	});

	function switchTab(n){  
		for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
			document.getElementById("tab_C" + i).className = "";  
			$("#MyTable_C"+i+"_tableLayout").hide();
		}
		document.getElementById("tab_" + n).className = "cn";   
		$('#MyTable_'+n+"_tableLayout").show();
						
	}

	//计算总和
	function getCostAll(){
		$('.addAll').each(function(){
			var costAll=0;
			var tr= $(this).parent();
			var td= tr.find('td.cost');
			td.each(function(index,domEle){
					costAll +=Number(toNum($(this).find('input').val()));
				});
			//alert(costAll);
			//var costAll_l=toThousands(costAll);
			$(this).html(toThousands(String(costAll)));
		});
	}

	//新规项目
	function addColspan(){
		var newProject = $('#MyTable_Header_C1 .newProject:last').find('input').attr('class');
		var newCount=0;
		if(newProject){			
		 newCount=parseInt(newProject.substring(5));
		}
		newCount++;
		for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){ 
			
			var tmpHeader = 'MyTable_Header_C'+i;
			var tmpbody = 'MyTable_Body_C'+i;		
			$('#'+tmpHeader+' .tag').removeClass('tag').after('<td style="width:60px" class="tag newProject"><input class="count'+newCount+'" type="text" name="txt_NewProjets_Name[]" style="border-radius:5px;background:#fff;border:1px #ccc solid;padding:4px 15px;cursor:pointer;width:60px;"  value=""></td>');
			$('#'+tmpbody+' .tag').removeClass('tag').after('<td class="tag cost edit"><input type="text" name="txt_NewProjets_Cost[]" style="width:60px" value=""></td>').end().on('change',this,function(){getCostAll();});	
		}
		setNewName();		
		$('.newProject').on('change',this,function(){
			setProjectName(this);
		});

		//获取焦点
		//var nowID= $('li.cn').attr('id');
		//var nowClass = nowID.substring(4);
		//var headTable='MyTable_'+nowClass+'_tableHeadClone';
		//var head ='MyTable_Header_'+nowClass;
		//$('#'+headTable+' #'+head+' input').focus();
	}

	function setNewName(){
		for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){
			$('#MyTable_C'+i+' #MyTable_Body_C'+i+' tr').each(function(){
		   		var id = $(this).find('input[name="hidden_ID[]"]').val();
		   		$(this).find('input[name="txt_NewProjets_Cost[]"]').attr('name','txt_NewProjets_Cost['+id+'][]"');
			});
		}	
	}

	function setProjectName(obj){
		var projectName = $(obj).find('input').val();
		var newID=$(obj).find('input').attr('class');
		$('.'+newID).each(function(){
			$(this).val(projectName);
		});
	}
	function formSubmit(){
		var data="yearMon=<?php echo $yearMon;?>";
		
		for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){ 
			var tmpTable = 'MyTable_C'+i;	
			var headTable='MyTable_C'+i+'_tableHeadClone';
			var head ='MyTable_Header_C'+i;
			data += '&'+$('#'+tmpTable+' input').serialize()+'&'+$('#'+headTable+' #'+head+' input').serialize(); 
		}						
		$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('administration/invoiceAll_insert');?>",
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

	function getChangeSearch()
	{
		var select_Day_Y = $('.datelist select[name="select_Date_Y"]').val();
		var select_Day_M = $('.datelist select[name="select_Date_M"]').val();

		var yearMon = select_Day_Y + '-' + select_Day_M;	
		location.href="<?php echo URL::site('administration/invoiceAll').URL::query(array('yearMon'=>NULL));?>?yearMon="+yearMon;
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

	//チェックの入った園児の請求書の印刷 单人PDF
	function invoicePDF(){
		var id='';
		var yearMon='<?php echo $yearMon;?>';
		$('input:checkbox[name="pdfCheck"]:checked').each(function(i){
			id=$(this).val();
		});
		if(id!=''){
			location.href="<?php echo URL::site('child/invoicePDF');?>"+"?ID="+id+"&YearMon="+yearMon;
		}
	}
	
</script>
</body>
</html>