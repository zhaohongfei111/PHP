<?php
echo View::factory('public/head');
?>
<body class="bg01">
	
	<?php	
	$logohtml = '<div class="topright topright04 right">
                    <p><a href="'.URL::site('administration/index').'"><input type="button" value="管理者メニュー画面に戻る" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<div class="maintablebox">
			<div class="topright topright01 topright011">
				<p><a href="setRelationship"><input type="button" value="きょうだい設定の新規追加" /></a></p>
			</div>
            
            <?php
            foreach($allGroup as $key => $val){
			?>
			<div class="mtablebox">
				<div class="bjbut left">
					<a name="<?php echo $key;?>" href="<?php echo URL::site('administration/setRelationship').URL::query(array('GROUP'=>$key));?>"><input type="button" value="編 集" /></a>
				</div>
				<div class="mtable right">
					<div class="tabright tabright02">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
                                	<td>NO.</td>
                                    <td>保護者名</td>
                                    <td>園児名</td>
                                    <td>アカウント</td>
                                    <td>パスワード</td>
                                    <td>入園日</td>
                                    <td>園児情報編集日</td>                                    
                                    <td class="td1">きょうだい順序</td>
                                </tr>
							</thead>
							<tbody>
                            	<?php
                                foreach($val as $key_g => $val_g){
								?>
								<tr>
									<td><?php echo $key_g+1;?></td>
									<td><?php echo $val_g['Guardian1_FamilyName'].$val_g['Guardian1_GivenName'];?></td>
                                    <td><?php echo $val_g['FamilyName'].$val_g['GivenName'];?></td>
									<td><?php echo $val_g['Child_Id'];?></td>
									<td><?php echo $val_g['PWD'];?></td>
									<td><?php echo $val_g['EnterDate'];?></td>
									<td><?php echo $val_g['InputDate'];?></td>
									<td class="td1"><?php if(array_key_exists($val_g['siblingOrder'],$siblingOrder))echo $siblingOrder[$val_g['siblingOrder']];?></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<?php
			}
			?>
			
		</div>
	</div>
	
</body>
</html>