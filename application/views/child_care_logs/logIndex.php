<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>   

	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<div class="xtbbox left">
					<div class="xtb xx01 x20"><a href="<?php echo URL::site('list/log').URL::query();?>">保育日誌の作成</a></div>
				</div>
				<div class="xtbbox left">
					<div class="xtb xx01 x20" style="background:#c5e0b4;border:none;"><a href="javascript:Go()" >過去のデータをみる</a></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="datelist datelist18 right" >
				<ul>
				<?php
					$Y = date('Y');
					$m = date('m');
					$d = date('d');
               	 	if(array_key_exists('YearMon',$_GET)){
						list($Y,$m) = explode('-',$_GET['YearMon']);
					}
				?>
					<li><span>参照年月日</span>
						<select name="select_Log_Date_Y" style="width:90px;">
							<?php foreach ($years as $key =>$val){?>
								<option <?php if($Y==$val['Y']) echo 'selected';?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
							<?php }?>
						</select><em>年</em>
						
						<select name="select_Log_Date_M" class="select01">
							<?php foreach ($months as $key =>$val){?>
								<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
						</select><em>月</em>
						
						<select name="select_Log_Date_D" class="select01">
							<?php foreach ($days as $key =>$val){?>
								<option <?php if($d==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
							<?php }?>
						</select><em>日</em>
						
						<input name="txt_Log_Week" style="text-align: right;width:55px;"  type="text" class="txt01" value="" readonly><em>曜日</em>
					</li>
					<li><span>クラス</span>
						<select name="select_Class" style="width:150px;">
						<option value="">------</option>
						<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key => $val) {?>
							<option  <?php if(!empty($child_Info)){if($child_Info['Class']==$key){ echo 'selected';} }?> value="<?php echo $key?>"><?php echo $val?></option>
						<?php }?>
						</select></li>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {	
		$.mkDays({"year":$('select[name="select_Log_Date_Y"]'),
				"month":$('select[name="select_Log_Date_M"]'),
				"day":$('select[name="select_Log_Date_D"]')});

		var date=$('select[name="select_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val();
		var week =new Date(date).getDay();
		setWeek(week);			
		
		$('select[name="select_Log_Date_Y"] ').on('change',function(){
			var date=$('select[name="select_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val();
			var week =new Date(date).getDay();
			setWeek(week);			
		});	
		$('select[name="select_Log_Date_M"] ').on('change',function(){
			var date=$('select[name="select_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val();
			var week =new Date(date).getDay();
			setWeek(week);			
		});		
		$('select[name="select_Log_Date_D"] ').on('change',function(){
			var date=$('select[name="select_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val();
			var week =new Date(date).getDay();
			setWeek(week);			
		});					
	});

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

	  function Go(){
			window.open("<?php echo URL::site('list/logPDF')?>?YearMonDay="+$('select[name="select_Log_Date_Y"]').val()+'-'+$('select[name="select_Log_Date_M"]').val()+'-'+$('select[name="select_Log_Date_D"]').val()+'&Class='+$('select[name="select_Class"]').val());	
		}
	</script>
</body>
</html>