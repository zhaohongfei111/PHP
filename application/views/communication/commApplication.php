<?php
	echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
	?>

	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('communication/application_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="content">
			<div class="titletop"><h2>園児情報編集の申請</h2></div>
			<div class="datebox">
				<div class="datelist datelist01">
					<h2></h2>
					<ul>
						<li><span>対象園児</span></li>
						<?php foreach ($children_list as $key=>$val){?>
       						<li>
                            	<input name="chkbox_Child_Id[]" class="checkbox01"  type="checkbox" value="<?php echo $val['Child_Id']?>" checked/>
                                <input type="text" class="txt05" value="<?php echo $val['FamilyName'].$val['GivenName']?>"/>
                            </li>     
     					<?php }?>	
					</ul>
				</div>
				<div class="datelist datelist08">
					<ul>
						<li><span>申請理由</span><textarea name="txt_Reason" rows="" cols=""></textarea></li>
					</ul>
				</div>
				<div class="pagetxt08">
					<h3>[注意事項]</h3>
					<p>セキュリティの関係上、既に申請した内容を確認したい場合は、園に直接申し出るか、「その他の申請」からその旨をご連絡ください。</p>
				</div>
				
				<div class="databut">
					<input type="button" value="申　請" onClick="formMainSave()"/>
				</div>
				
			</div>
		</div>
		</form>
	</div>
	<script>
	function formMainSave(){
		if($('input[name="chkbox_Child_Id[]"]:checked').length==0){
			alert('対象園児を選択してください。');
			return false;
		}
		
		$('#formMain').submit();	
	}
	</script>
</body>
</html>