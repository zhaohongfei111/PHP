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
			<div class="maintabletop">
				<ul>				
					<li class="cn"><a>検索結果</a></li>
				</ul>
			</div>
			
			<div class="maintable" >
            	<div style="padding-right:17px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
                	<colgroup>
                    	<col width="8%"></col>
                        <col width="10%"></col>
                        <col width="9%"></col>
                        <col width="4%"></col>
                        <col width="9%"></col>
                        <col width="7%"></col>
                        <col width="9%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td>登降園状況</td>
                            <td>苗字</td>
                            <td>名前</td>
                            <td>性別</td>
                            <td>クラス</td>
                            <td>年齢</td>
                            <td>生年月日</td>
                            <td>認定区分</td>
                            <td>園児情報<p>（編集）</p></td>
                            <td>健康<p>カード</td>
                            <td>緊急連絡<p>力ード</p></td>
                            <td>請求書</td>
                            <td>要録</td>
						</tr>
					</thead>
                </table>
                </div>
                <div class="maintableDiv" style="overflow-y:scroll;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed; border-top:none">
                	<colgroup>
                    	<col width="8%"></col>
                        <col width="10%"></col>
                        <col width="9%"></col>
                        <col width="4%"></col>
                        <col width="9%"></col>
                        <col width="7%"></col>
                        <col width="9%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                        <col width="7%"></col>
                    </colgroup>
                    <tbody> 
                        <?php foreach ($child_Info as $key=>$val){?>
                            <tr>
                                <td><a name="tips<?php echo $val['ID'];?>"></a>
                                <?php
								echo View::factory('list/commStatus')->bind('val',$val);
								?>
                                </td>
                                <td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                                <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                                <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
                                <td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']] ?></td>
                                <td><?php echo $val['Age']?></td>
                                <td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
                                <td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
                                <td><a href="<?php echo URL::site('child/step'.($val['setbacksNum']<8?$val['setbacksNum']:11)).URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="確認" /></a></td>
                                <td><a href="<?php echo URL::site('child/health').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></td>
                                <td><a href="<?php echo URL::site('child/contact').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="出カ" /></td>
                                <td><a href="<?php echo URL::site('child/invoice_Index').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                                <td><a href="<?php echo URL::site('child/summary').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                            </tr>					
                        <?php }?>
                    </tbody>				
				</table>
                </div>
			</div>			
		</div>		
	</div>
</body>
</html>