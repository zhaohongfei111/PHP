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
					<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?>
						<li  id=<?php echo 'tab_'.$key?> <?php if($key=='R1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
			
			<div class="maintable xmaintable" >
            	<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key1 =>$val1){?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" id=<?php echo 'tab_con_'.$key1?> <?php if($key1!='R1'){echo 'style="display:none"';}?> >
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
					
                    <tbody >
                        <?php foreach ($child_Info as $key=>$val){
                                if($val['Recog_Type']==$key1){?>
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
                                <td><a href="<?php echo URL::site('child/step'.($val['setbacksNum']<8?$val['setbacksNum']:11)).URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action,'show'=>$key1));?>"><input type="button" value="確認" /></a></td>
                                <td><a href="<?php echo URL::site('child/health').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action,'show'=>$key1));?>"><input type="button" value="作成" /></td>
                                <td><a href="<?php echo URL::site('child/contact').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action,'show'=>$key1));?>"><input type="button" value="出カ" /></td>
                                <td><a href="<?php echo URL::site('child/invoice_Index').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                                <td><a href="<?php echo URL::site('child/summary').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action,'show'=>$key1));?>"><input type="button" value="作成" /></a></td>
                            </tr>					
                        <?php }}?>
                    </tbody>
									
				</table>
				<?php }?>	
                </div>
			</div>
			
		</div>
		
<script type="text/javascript">  
function switchTab(n){ 
   <?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?> 
		document.getElementById("tab_"+"<?php echo $key?>").className = "";  
		document.getElementById("tab_con_"+"<?php echo $key?>").style.display = "none";  
	<?php }?>
	document.getElementById("tab_" + n).className = "cn";  
	document.getElementById("tab_con_" + n).style.display = ""; 
	scrollAdjustment();	
}  
<?php
if(array_key_exists('show',$_GET)){
echo "$(function(){switchTab('{$_GET['show']}')});";	
}
?>
</script> 
</body>
</html>