<?php
	echo View::factory('public/head');
?>
<body class="bg01">
	<?php
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>
                <div class="topright topright01 topright03 right">
                    <p><a href="'.URL::site('administration/confirmList').'"><input type="button" value="受付済み用品購入一覧の表示" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
    

	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('administration/confirmed').URL::query(array('from'=>'administration/confirmList'));?>" method="post" enctype="multipart/form-data">
		<div class="maintablebox">
			<div class="topright topright01 xtopright02">
				<p><input type="button" value="用 品 購 入 希 望 者" style="background-color:#bf9000;"/></p>
			</div>
			<div class="mtablebox">
				<div class="mtable mtable01">
					<div class="tabright">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
									<td></td>
									<td>NO.</td>
									<td>保護者名</td>
									<td>園児名</td>
									<td>購入希望用品</td>
									<td>金额</td>
									<td>依頼受付日時</td>
								</tr>
							</thead>
							<tbody>
								<?php  foreach ($confirm_Data as $key =>$val) { ?>
								<tr>
									<td><input name="chk_Confirmed[]" class="checkbox01" type="checkbox" value="<?php echo $val['ID']?>"></td>
									<td><?php echo $key+1;?></td>
									<td><?php echo $val['Guardian_Name']?></td>
									<td><?php echo $val['Child_Name']?></td>
									<td><?php echo $val['Goods_Name']?></td>
									<td><?php echo $val['Goods_Price']?></td>
									<td><?php echo $val['Submit_Date']?></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
		
		<div class="databut databut02">
			<input type="button" value="チェックした依頼を受付" onClick="formMainSave()" />
		</div>
		</form>
	</div>
	<script>
	function formMainSave(){
		if($('input[name="chk_Confirmed[]"]:checked').length==0){			
			alert("購入希望用品を選択してください。");
			return false;	
		}
			
		$('#formMain').submit();	
	}


	</script>
	
	
	
</body>
</html>