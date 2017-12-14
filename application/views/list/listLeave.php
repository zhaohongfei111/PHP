<?php
echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/listLogoHtml'));	
	?>
	<div class="mainbox">
		<?php
		echo View::factory('list/pageTop');
		?>
		
		
		<div class="maintablebox">
			<div class="maintabletop maintabletop01">
				<ul>
					<li class="cn"><a href="javascript:void(0);">退園した園児一覧(あいうえお順)</a></li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="search">
            	<form id="formSearch" action="<?php echo URL::site('list/listLeave');?>" method="get" enctype="multipart/form-data">
					<input type="text" name="txt_Search" class="txt01" value="<?php if(isset($search)) echo $search;?>" placeholder="園児名検索" />
					<input type="submit" class="but01" value="検索" />
				</form>
            </div>
			<div class="maintable xmaintable">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td>苗字</td>
							<td>名前</td>
							<td>性別</td>
							<td>退園時年齢</td>
							<td>生年月日</td>
							<td>退園時認定区分</td>
							<td>入園日</td>
							<td>退園日</td>
							<td>園児情報</td>
							<td>要録</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($child_Info as $key=>$val){?>
						<tr>
							<td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                            <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo $val['LeaveAge']?></td>
							<td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td><?php echo $val['EnterDate']?><p><?php echo $val['EnterDateJap']?></p></td>
							<td><?php echo $val['LeaveDate']?><p><?php echo $val['LeaveDateJap']?></p></td>
							<td><a href="<?php echo URL::site('child/step'.($val['setbacksNum']<8?$val['setbacksNum']:11)).URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="確認" /></a></td>
							<td><a href="<?php echo URL::site('child/summary').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="確認" /></a></td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
			
		</div>
		
		
	</div>

</body>
</html>