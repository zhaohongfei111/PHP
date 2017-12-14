<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logoHtml = '<div class="topright topright01 right">
						<p><a href="'.URL::site($_GET['from']).URL::query(array('from'=>NULL,'yearMonDay'=>NULL,'class'=>NULL)).'"><input type="button" value="園児一覧に戻る" /></a></p>
					</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>
	
	<div class="mainbox">
		<div class="pagetop" style="height:40px;">
			
		</div>

		<div class="maintablebox">
			<div class="butlistbox">
				<?php
                if($SELLEVEL !='Reader'){
				?>
				<a href="<?php echo URL::site('list/listNapCheck').URL::query();?>" style="background:#3399ff;">午睡チェック</a>
                <?php
				}else{
				?>
				<a href="javascript:void(0)" style="background:#FFF;">&nbsp;</a>
				<?php	
				}
				?>
				<a href="javascript:void(0);" onClick="goNapHistory()">過去のデータをみる</a>
				<div class="datelist datelist18 right">
					<ul>
						<li><span>参照年月日</span>
                            <select name="year" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($years as $key => $val){
								?>
                                <option value="<?php echo $val['west'];?>"><?php echo $val['west'];?></option>
                                <?php
								}
								?>
                            </select><em>年</em>
                            <select name="month" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($months as $key => $val){
								?>
                                <option value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php
								}
								?>
                            </select><em>月</em>
                            <select name="day" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($days as $key => $val){
								?>
                                <option value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php
								}
								?>
                            </select><em>日</em>
                            <input name="week" type="text" class="txt01" style="width:55px;" value=""><em>曜日</em>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="butlistbox">
            	<?php
                if($SELLEVEL !='Reader'){
				?>
				<a href="<?php echo URL::site('list/listTempCheck').URL::query();?>" style="background:#ffd966;">室温・湿度チェック</a>
                <?php
				}else{
				?>
				<a href="javascript:void(0)" style="background:#FFF;">&nbsp;</a>
				<?php	
				}
				?>
				<a href="javascript:void(0);" onClick="goTempHistory()">過去のデータをみる</a>
				<div class="datelist datelist18 right">
					<ul>
						<li><span>参照年月日</span>
                            <select name="year_1" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($years as $key => $val){
								?>
                                <option value="<?php echo $val['west'];?>"><?php echo $val['west'];?></option>
                                <?php
								}
								?>
                            </select><em>年</em>
                            <select name="month_1" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($months as $key => $val){
								?>
                                <option value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php
								}
								?>
                            </select><em>月</em>
                            <select name="day_1" class="select01">
                            	<option value="">----</option>
                            	<?php
                                foreach($days as $key => $val){
								?>
                                <option value="<?php echo $val;?>"><?php echo $val;?></option>
                                <?php
								}
								?>
                            </select><em>日</em>
                            <input name="week_1" type="text" class="txt01" style="width:55px;" value=""><em>曜日</em>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
	</div>

	<script>
    $(function(){
		$.mkDays({"year":$('select[name="year"]'),
				"month":$('select[name="month"]'),
				"day":$('select[name="day"]')});
				
		$('select[name="day"]').on('change',function(){
			var Y = $('select[name="year"]').val();
			var m = $('select[name="month"]').val();
			var d = $('select[name="day"]').val();
			
			if(Y!=""&&m!=""&&d!=""){
				var date = m+"/"+d+"/"+Y;  
				var day = new Date(Date.parse(date));
				var today = new Array('日','月','火','水','木','金','土');  
				var week = today[day.getDay()];
				$('input[name="week"]').val(week);
			}			
		});
		
		$('select[name="day_1"]').on('change',function(){
			var Y = $('select[name="year_1"]').val();
			var m = $('select[name="month_1"]').val();
			var d = $('select[name="day_1"]').val();
			
			if(Y!=""&&m!=""&&d!=""){			
				var date = m+"/"+d+"/"+Y;  
				var day = new Date(Date.parse(date));
				var today = new Array('日','月','火','水','木','金','土');  
				var week = today[day.getDay()];
				$('input[name="week_1"]').val(week);
			}			
		});
		
	});
	
	function goNapHistory()
	{
		var Y = $('select[name="year"]').val();
		var m = $('select[name="month"]').val();
		var d = $('select[name="day"]').val();

		if(Y!=""&&m!=""&&d!=""){
			var yearMonDay = Y+'-'+m+'-'+d;
			location.href="<?php echo URL::site('list/listNapCheck').URL::query();?>&yearMonDay="+yearMonDay;
		}		
	}
	
	function goTempHistory()
	{
		var Y = $('select[name="year_1"]').val();
		var m = $('select[name="month_1"]').val();
		var d = $('select[name="day_1"]').val();
		
		if(Y!=""&&m!=""&&d!=""){
			var yearMonDay = Y+'-'+m+'-'+d;
			location.href="<?php echo URL::site('list/listTempCheck').URL::query();?>&yearMonDay="+yearMonDay;
		}		
	}
    
    </script>
	
</body>
</html>