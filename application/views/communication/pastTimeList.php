<?php
echo View::factory('public/head');
?>
<body>
<?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('communication/listMenu').'"><input type="button" value="戻る" /></a></p>
				</div>';

	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logoHtml);
?>

	<div class="mainbox mainbox01">
		<div class="titletop titletop11"><h2>過去の保護者からの連絡</h2></div>
		<div class="xtime">
        	<form id="formMain">
			<span>参 照 日</span><input type="text" name="pastY" class="validate[required,custom[integer],min[2016],max[2050]]" value="<?php echo date('Y',strtotime($pastTime));?>"><em>年</em>
			<select name="pastM" class="select01"> 
            	<option value="">----</option>          	
            	<?php 
				$m = date('m',strtotime($pastTime));
				$d = date('d',strtotime($pastTime));
				foreach($months as $key => $val){
				?>
                <option value="<?php echo $val;?>" <?php if($m==$key) echo 'selected';?>><?php echo $val;?></option>
                <?php }?>
            </select><em>月</em>
			<select name="pastD" class="select01">
            	<option value="">----</option>
            	<?php foreach ($days as $key=>$val) {?>
            	<option value="<?php echo $val;?>" <?php if($d==$key) echo 'selected';?>><?php echo $val;?></option>
                <?php }?>
            </select><em>日</em>
            </form>
		</div>
		<div class="xxbox">
			<div class="pbbox01">
				<div class="pagetxt11">
					<div class="pagelist11">
						<h3>遅　  刻</h3>
						<div class="tablebox11">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<td class="td01">お名前</td>
										<td class="td02">クラス</td>
										<td class="td03">登園予定時間</td>
										<td class="td04">給　食</td>
									</tr>
								</thead>
								<tbody>
							<?php $count=count($late);
								 if(!empty($late)){ 
								
								foreach ($late as $key=>$val){  ?>
								<tr>
									<td><span><a href="<?php echo URL::site('communication/commLate').URL::query(array('ID'=>$val['ID'],'from'=>'communication/pastTimeList'));?>"><?php echo $val['Name'];?></a></span></td>
									<td><span><?php if(isset($parameter['BASE_INFO']['CLASS'][$val['Class']])) echo $parameter['BASE_INFO']['CLASS'][$val['Class']]; ?></span></td>
									<td><span><?php if(!empty($val['Arrive_Time'])) echo date('H:i',strtotime($val['Arrive_Time']));?></span></td>
									<td><span><?php echo $val['Eat']?></span></td>
								</tr>
							
							<?php }}
								if($count<5){
									for($i=0;$i<5-$count;$i++){?>
									<tr>
										<td><span></span></td>
										<td><span></span></td>
										<td><span></span></td>
										<td><span></span></td>
									</tr>	
								<?php	}
								}
							?>	
			
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="botombg"></div>
			</div>
			<div class="pbbox02">
				<div class="pagetxt11 pagetxt13">
					<div class="pagelist11 pagelist13">
						<h3>お 休 み</h3>
						<div class="tablebox11 tablebox13">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<td class="td01">お名前</td>
										<td class="td02">クラス</td>
										<td colspan="3" class="td03">お休み予定期間</td>
									</tr>
								</thead>
							<tbody>
								<?php  $count=count($rest);
										if(!empty($rest)){ 
								
								foreach ($rest as $key=>$val){  ?>
								<tr>
									<td><span><a href="<?php echo URL::site('communication/commRest').URL::query(array('ID'=>$val['ID'],'from'=>'communication/pastTimeList'));?>"><?php echo $val['Name']?></a></span></td>
									<td><span><?php if(isset($parameter['BASE_INFO']['CLASS'][$val['Class']])) echo $parameter['BASE_INFO']['CLASS'][$val['Class']];?></span></td>
									<td><span><?php echo $val['LeaveDate']?></span></td>
									<td class="t01">~</td>								
									<td><span><?php echo $val['LeaveDate_End']?></span></td>
								</tr>
							
							<?php }}
								if($count<5){
									for($i=0;$i<5-$count;$i++){?>
									<tr>
										<td><span></span></td>
										<td><span></span></td>
										<td><span></span></td>
										<td class="t01">~</td>										
										<td><span></span></td>
									</tr>	
								<?php	}
								}
							?>	
					
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="botombg botombg13"></div>
			</div>
			<div class="pbbox03">
				<div class="pagetxt11 pagetxt00">
					<div class="pagelist11 pagelist00">
						<h3>その他連絡など</h3>
						<div class="tablebox11 tablebox00">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<thead>
									<tr>
										<td class="td01">お名前</td>
										
										<td class="td02">クラス</td>
									</tr>
								</thead>
								<tbody>
							<?php $count=count($other);
								 if(!empty($other)){ 
								
								foreach ($other as $key=>$val){  ?>
								<tr>
									<td><span><a href="<?php echo URL::site('communication/commOther').URL::query(array('ID'=>$val['ID'],'from'=>'communication/pastTimeList'));?>"><?php echo $val['Name']?></a></span></td>
									<td><span><?php if(isset($parameter['BASE_INFO']['CLASS'][$val['Class']])) echo $parameter['BASE_INFO']['CLASS'][$val['Class']] ?></span></td>
								</tr>
							
							<?php }}
								if($count<5){
									for($i=0;$i<5-$count;$i++){?>
									<tr>
										<td><span></span></td>
										<td><span></span></td>
									</tr>	
								<?php	}
								}
							?>
						
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="botombg botombg00"></div>
			</div>
			<div class="clear"></div>
		</div>			
	</div>
	<script>
    $(document).ready(function() {
		$('#formMain').validationEngine('attach');
		$.mkDays({"year":$('input[name="pastY"]'),
					"month":$('select[name="pastM"]'),
					"day":$('select[name="pastD"]')});
		$('input[name="pastY"]').on('change',this,function(){
			goTo()
		});
		
		$('select[name="pastM"]').on('change',this,function(){
			goTo()
		});
		
		$('select[name="pastD"]').on('change',this,function(){
			goTo()
		});
			
	});
    function goTo(){
		var Y = parseInt($('input[name="pastY"]').val());
		if(Y>=2016&&Y<=2050){
			var m = $('select[name="pastM"]').val();
			var d = $('select[name="pastD"]').val();
			var t = Y + '-' + m + '-' + d;
			location.href="<?php echo URL::site('communication/pastTimeList?pastTime=')?>"+t;
		}
	}
    </script>
</body>
</html>