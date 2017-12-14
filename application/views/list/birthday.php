<?php
echo View::factory('public/head');
?>
<body>
<?php
if(array_key_exists('from',$_GET)){
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site($_GET['from']).URL::query(array('ID'=>NULL,'from'=>NULL)).'"><input type="button" value="戻　る" /></a></p>
				</div>';
}else{
	$logoHtml = "";	
}
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logoHtml);
	?>

	<div class="mianbox">
		<div class="content">
			<div class="listtop">
				<h2>今 月 の お 誕 生 日 園 児 一 覧</h2>				
			</div>
            
            <div class="mainbox01 mainbox02">
				<div class="maintabletop maintabletop01">
					<ul>
                    	<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
						<?php }?>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="maintable xmaintable">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	<colgroup>
                        	<col width="30%"></col>
                        	<col width="20%"></col>
                            <col width="25%"></col>
                            <col width="25%"></col>
                        </colgroup>
						<thead>
							<tr>
								<td>お名前</td>
                                <td>性別</td>
                                <td>生年月日</td>
                                <td>年齢</td>
							</tr>
						</thead>
                        
                        
                        <?php 
						foreach ($parameter['BASE_INFO']['CLASS'] as $key1 =>$val1){
						?>
						<tbody id=<?php echo 'tab_con_'.$key1?> <?php if($key1!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?> >
							<?php 
							foreach ($child_Info as $key=>$val){
								if($val['Class']==$key1){
							?>
							<tr>
								<td class="t01"><?php echo $val['FamilyName'].$val['GivenName']?></td>
                                <td><?php if($val['Sex']=='1'){echo "男";}else{echo "女";}?></td>
                                <td><?php echo $val['Birthday']?></td>
                                <td><?php echo $val['Age']?></td>
							</tr>							
							<?php 
                                }
                            }
                            ?>
						</tbody>
                    	<?php
						}
						?>	
					</table>
				</div>
			</div>
            <script type="text/javascript">  
			function switchTab(n){  
				for(var i = 1; i <= <?php echo count($parameter['BASE_INFO']['CLASS']);?>; i++){  
					document.getElementById("tab_C" + i).className = "";  
					document.getElementById("tab_con_C"+i).style.display = "none";  
				}  
				document.getElementById("tab_" + n).className = "cn";   
				document.getElementById("tab_con_" + n).style.display = "table-row-group";
			}
			</script>			
		</div>
	</div>
	
</body>
</html>