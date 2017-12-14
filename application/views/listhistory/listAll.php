<?php
	echo View::factory('public/head');
?>
<body>
	<?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).'"><input type="button"  value="園児一覧に戻る" /></a></p>
				</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>	
	<div class="mainbox">
		<?php echo View::factory('listhistory/pageTop');?>

		<div class="maintablebox">
			<div class="maintabletop maintabletop01">
				<ul>
					<li class="cn"><a href="javascript:void(0);">全園児一覧(あいうえお順)</a></li>
				</ul>   
				<div class="clear"></div>
			</div>
			<div class="maintable maintable17">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<colgroup>
                    	<col width="8%"></col>
                        <col width="15%"></col>
                        <col width="15%"></col>
                        <col width="10%"></col>
                        <col width="12%"></col>
                        <col width="15%"></col>
                        <col width="10%"></col>
                        <col width="15%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td class="tt01"></td>
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
						 <?php 
                             foreach ($child_Info as $key=>$val){
                          ?>
                            <tr>
                                <td class="tt01"><a href="<?php echo URL::site('listHistory/editHistoryDetail').URL::query(array('ID'=>$val['ID'],'historyFrom'=>'listHistory/listAll'));?>"><input type="button" value="確認" /></a></td>
                                <td class="tt02"><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
                                <td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
                                <td><?php if($val['Sex']=='2'){echo '女';}elseif($val['Sex']=='1'){echo '男';};?></td>
                                <td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']]; ?></td>
                                <td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
                                <td><?php echo $val['change']['changeNum'].'回';?></td>
                                <td><?php echo $val['change']['Edit_Date'];?></td>
                            </tr>
                            <?php } ?>
                    </tbody>					
				</table>
			</div>
		</div>		
	</div>	
</body>
</html>