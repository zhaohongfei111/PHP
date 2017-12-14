<?php
echo View::factory('public/head');
?>
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
				<p><input type="button" value="管理者メニューに戻る"  style="width:160px;margin-right:0;"/></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="保　存" style="width:70px;margin-right:8px;" /></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="全園児請求一覧の印刷"  style="width:160px;margin-right:8px;"/></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="CSVで出力" style="width:90px;margin-right:8px;background:#00b050;"/></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="チェックの入った園児の請求書の印刷"  style="width:240px;margin-right:8px;background:#f00;"/></p>
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
						<select name="select_Date_Y" class="select01" >
							<?php foreach ($years as $key =>$val){?>
							<option <?php if($Y==$val['Y']) echo 'selected';?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
							<?php }?>
						</select><span>年度</span>
						<select name="select_Date_M" class="select01" >
							<?php foreach ($months as $key =>$val){?>
							<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
						</select><span>月保育料</span>
						</li>
					</ul>
				</div>
				<div class="topright topright01 right">
					<p><input type="button" style="background:#3399ff;" value="請求項目の追加" /></p>
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<div class="maintablebox">
			<div class="maintabletop">
				<ul>				
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
			</div>
			
			<div class="maintable">
				<table  id="MyTable" style="width:2000px;" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td style="width:50px;">全園児</td>
							<td style="width:60px;">苗字</td>
							<td style="width:60px;">名前</td>
							<td>認定区分</td>
							<td>キャピタル<br/>番号</td>
							<td>保育料</td>
							<td>保育料備考</td>
							<td>延長<br/>保育料</td>
							<td>延長備考</td>
							<td>時間外<br/>保育料</td>
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
							<td>備考</td>
							<td>合計</td>
						</tr>
					</thead>
					
					<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
					<tbody id="tab_con_<?php echo $key;?>" <?php if($key!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>
						<?php foreach ($child_Info as $key_child => $val_Child){
								if($val_Child['Class']==$key){?>
						<tr>
							<td><input name="" class="tablecb" type="checkbox" value=""></td>
							<td><?php echo $val_Child['FamilyName']?><p><?php echo $val_Child['FamilyName_Spell']?></p></td>
							<td><?php echo  $val_Child['GivenName']?><p><?php echo $val_Child['GivenName_Spell']?></p></td>
							<td>女</td>
							<td>めだか</td>
							<td>6歳1ケ月</td>
							<td>2015.9.25<p>平成27年</p></td>
							<td>1号標準</td>
							<td>2015.9.25<p>平成27年</p></td>
							<td>2015.9.25<p>平成27年</p></td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
							<td>1号標準</td>
						</tr>
						<?php }}?>
					</tbody>
					<?php }?>					
				</table>
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
		//$("#" + TableID + "_tableHead").append(tableHeadClone);
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
			$("#" + TableID + "_tableData").css("height", $("#" + TableID + "_tableColumn table").height() + 17);
		}
		$("#" + TableID + "_tableFix").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableHead").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableColumn").offset($("#" + TableID + "_tableLayout").offset());
		$("#" + TableID + "_tableData").offset($("#" + TableID + "_tableLayout").offset());
	}
	$((function () {
		FixTable("MyTable", 3, 1158, 400);
	});

	//function switchTab(n){  
		//for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
			//document.getElementById("tab_C" + i).className = "";  
			//document.getElementById("tab_con_C"+i).style.display = "none";  
		//}  
		//document.getElementById("tab_" + n).className = "cn";   
		//document.getElementById("tab_con_" + n).style.display = "table-row-group";
			
			
	//}
	
</script>
	
	
</body>
</html>