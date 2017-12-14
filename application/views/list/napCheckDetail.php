<?php
echo View::factory('public/head');
?>
<body>

	<?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('list/listNapCheck').URL::query(array('child_id'=>NULL)).'"><input type="button" style="width:220px;" value="午睡チェックに戻る" /></a></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>
	
	<div class="mainbox">
		<div class="maintable maintablef maintable18">
			<table width="60%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
            	<colgroup>
                	<col width="20%"></col>
                    <col width="20%"></col>
                    <col width="15%"></col>
                    <col width="15%"></col>
                    <col width="15%"></col>
                    <col width="15%"></col>
                </colgroup>
				<thead>
					<tr>
						<td class="tt02">苗字</td>
                        <td>名前</td>
                        <td>性別</td>
                        <td>クラス</td>
                        <td>認定区分</td>
                        <td>チエック回数</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="tt02"><?php echo $child['FamilyName']?><p><?php echo $child['FamilyName_Spell']?></p></td>
                        <td><?php echo $child['GivenName']?><p><?php echo $child['GivenName_Spell']?></p></td>
                        <td><?php if($child['Sex']=='2'){echo '女';}if($child['Sex']=='1'){echo '男';}?></td>
                        <td><?php echo $parameter['BASE_INFO']['CLASS'][$child['Class']]?></td>
                        <td><?php echo empty($Recog['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$Recog['Recog_Type']] ;?></td>
                        <td><?php echo count($napCheckDetailed);?></td>
					</tr>
				</tbody>
			</table>
		</div>
	
		<div class="maintablebox maintablebox17">
			<div class="maintable maintable18 maintablef18">
            	<form id="formMain" action="<?php echo URL::site('list/napCheckDetailUpdate').URL::query();?>" method="post" onSubmit="return formSubmit()">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
                	<colgroup>
                        <col width="5%"></col>
                        <col width="20%"></col>
                        <col width="20%"></col>
                        <col width="35%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td class="tt02">NO.</td>
                            <td>午睡チェック時間</td>
                            <td>確認者(アカウント)</td>
                            <td>コメント</td>
						</tr>
					</thead>
					<tbody>
                    	<?php

                        foreach($napCheckDetailed as $key => $val){
						?>
						<tr>                       
							<td class="tt02"><?php echo $key+1;?></td>
                            <td><?php echo $val['Check_Time'];?></td>
                            <td><?php echo $val['Check_USERID'];?></td>
                            <td style="text-align:left;">
                            	<input type="hidden" name="ID[]" value="<?php echo $val['ID']?>">
                                <input type="text" name="Check_Content[<?php echo $val['ID']?>][]" value="<?php echo $val['Check_Content'];?>" style="width:300px;">
                            </td>
						</tr>						
						<?php	
						}
						?>						
					</tbody>
				</table>  
                <?php
                if($SELLEVEL!='Reader'){
				?>              
				<div class="tabbut18"><input type="button" value="保　存" onClick="formSubmit()"></div>
                <?php
				}
				?>
                </form>
			</div>
		</div>
	</div>
</body>
<script>
function formSubmit(){	
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/napCheckDetailUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: $('#formMain').serialize(),
		   error: function(){alert('ajaxエラー');},
		   success: function(json){			   				 
			addSaveOverlay(1000,400,json['result']);			   
		   }
		});
}
</script>
</html>