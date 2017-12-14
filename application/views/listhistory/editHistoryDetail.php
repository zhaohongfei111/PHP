<?php
	echo View::factory('public/head');
?>
<body>    
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['historyFrom']).URL::query(array('historyFrom'=>NULL,'ID'=>NULL)).'"><input type="button" style="width:220px;" value="園児情報編集履歴一覧に戻る" /></a></p>
				</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>
	
	<div class="mainbox">
		<div class="maintable maintablef maintable17">
			<table width="70%" border="0" cellspacing="0" cellpadding="0">
            	<colgroup>
                    <col width="15%"></col>
                    <col width="15%"></col>
                    <col width="7%"></col>
                    <col width="13%"></col>
                    <col width="12%"></col>
                    <col width="15%"></col>
                    <col width="23%"></col>
                </colgroup>
				<thead>
					<tr>
						<td class="tt02">苗字</td>
						<td>名前</td>
						<td>性別</td>
						<td>クラス</td>
						<td>認定区分</td>
						<td>総編集回数</td>
						<td>最終編集日時</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="tt02"><?php echo $child['FamilyName']?><p><?php echo $child['FamilyName_Spell']?></p></td>
						<td><?php echo $child['GivenName']?><p><?php echo $child['GivenName_Spell']?></p></td>
						<td><?php if($child['Sex']=='2'){echo '女';}if($child['Sex']=='1'){echo '男';}?></td>
						<td><?php echo empty($child['Class'])?'':$parameter['BASE_INFO']['CLASS'][$child['Class']];?></td>
						<td><?php echo empty($child['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$child['Recog_Type']];?></td>
						<td><?php echo count($history_list).'回';?></td>
						<td><?php if(!empty($history_list)){$last = end($history_list); echo $last['Edit_Date'];}?></td>
					</tr>
				</tbody>
			</table>
		</div>
	
		<div class="maintablebox maintablebox17">
			<div class="maintable maintable17 maintablef17">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<colgroup>
                        <col width="10%"></col>
                        <col width="15%"></col>
                        <col width="15%"></col>
                        <col width="15%"></col>
                        <col width="45%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td class="tt02">NO.</td>
							<td>園児情報の参照</td>
							<td>編集日時</td>
							<td>編集者(アカウント)</td>
							<td>編集コメント</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($history_list as $key =>$val){?>
						<tr>
							<td class="tt02"><?php echo $key+1;?></td>
							<td><a href="<?php echo URL::site('listHistory/reference?ID='.$val['ID']);?>"><input type="button" value="確認" /></a></td>
							<td><?php echo $val['Edit_Date'];?></td>
							<td><?php echo $val['Edit_UserID'];?></td>
							<td style="width:600px;"><?php echo $val['Edit_Content'];?></td>
						</tr>
						<?php  }?>						
					</tbody>
				</table>
			</div>
		</div>
		
	</div>

	
	
</body>
</html>