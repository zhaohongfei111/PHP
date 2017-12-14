<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'"><input type="button" value="園児一覧に戻る" /></a></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logoHtml);	
	?>

	<div class="mianbox">
		<div class="content xmainbox">
			<div class="xdata">
				<p><span>園児名</span><input type="text" class="txt01" value="<?php echo empty($child)?'':$child['FamilyName'].$child['GivenName'];?>"></p>
			</div>
			<div class="xbutton">
            	<?php
                if($SELLEVEL!='Reader'){
				?>
				<span class="a1"><a href="<?php echo URL::site('child/invoice').URL::query(array('ID'=>$child['ID'],'time'=>time(),'YearMon'=>NULL));?>">請求書の作成</a></span>
                <?php
				}
				?>
				<span><a href="javascript:void(0)" onClick="Go()">過去の請求書の参照</a></span>
			</div>
			<div class="xdata xdata01" <?php if($SELLEVEL=='Reader'){ echo "style='text-align:left;'";}?>>
            	<?php
				$Y = date('Y');
				$m = date('m');
                if(array_key_exists('YearMon',$_GET)){
					list($Y,$m) = explode('-',$_GET['YearMon']);
				}
				?>
				<p><span>対　象　月</span>
                	<select name="select_Date_Y" class="select01" style="width:80px;" >
                        <?php foreach ($years as $key =>$val){?>
						<option <?php if($Y==$val['Y']) echo 'selected';?> value="<?php echo $val['Y']?>"><?php echo $val['Y']?></option>
						<?php }?>
                    </select>
					<em>年</em>
                    <select name="select_Date_M" class="select01" style="width:70px;" >
                        <?php foreach ($months as $key =>$val){?>
						<option <?php if($m==$val) echo 'selected';?> value="<?php echo $val?>"><?php echo $val?></option>
						<?php }?>
                    </select>
					<em>月</em>
				</p>
			</div>
		</div>
	</div>
    <script>
    function Go(){
		window.open("<?php echo URL::site('child/invoicePDF').URL::query(array('ID'=>$child['ID'],'time'=>time(),'YearMon'=>NULL));?>&YearMon="+$('select[name="select_Date_Y"]').val()+'-'+$('select[name="select_Date_M"]').val());	
	}
    </script>
	
</body>
</html>