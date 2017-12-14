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
		<div class="xtop">
			<div class="titletb left">最終更新日時：<?php echo $nowTime?></div>
			<div class="right" style="width:151px;"><a href="<?php echo URL::site('communication/commList');?>"><img src="<?php echo $media;?>images/but03.gif"/></a></div>
			<div class="clear"></div>
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
									<td><span><a href="<?php echo URL::site('communication/commLate').URL::query(array('ID'=>$val['ID'],'from'=>'communication/commList'));?>"><?php echo $val['Name'];?></a></span></td>
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
				<div class="pagetxt11  pagetxt13">
					<div class="pagelist11  pagelist13">
						<h3>お 休 み</h3>
						<div class="tablebox11  pagebox13">
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
									<td><span><a href="<?php echo URL::site('communication/commRest').URL::query(array('ID'=>$val['ID'],'from'=>'communication/commList'));?>"><?php echo $val['Name']?></a></span></td>
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
						<div class="tablebox11">
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
									<td><span><a href="<?php echo URL::site('communication/commOther').URL::query(array('ID'=>$val['ID'],'from'=>'communication/commList'));?>"><?php echo $val['Name']?></a></span></td>
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
    setTimeout("window.location.reload(true)",60000);
    </script>
</body>
</html>