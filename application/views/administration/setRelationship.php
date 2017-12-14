<?php
echo View::factory('public/head');
?>
<body class="bg01">    
    <?php
	$logohtml = '<div class="topright topright01 right">
                    <p><a href="'.URL::site('administration/relationship').URL::query(array('GROUP'=>NULL,'guardian1'=>NULL))."#{$group}".'"><input type="button" value="戻 る" /></a></p>
                </div>
                <div class="topright topright01 right">
                    <p><input type="button" value="保　存" onClick="formSave()"/></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>
	<div class="mianbox">
		<div class="content contbox">
			<div class="search01">
            <form method="get" action="<?php echo URL::site('administration/setRelationship');?>">
            	<input type="hidden" name="GROUP" value="<?php echo $group;?>">
				<input type="text" name="guardian1" class="txt01" value="<?php echo $guardian1;?>" placeholder="保護者名検索" />
				<input type="submit" class="but01" value="検索" />
            </form>
			</div>
            <form id="form" action="<?php echo URL::site('administration/relationshipUpdate');?>" method="post">
            <input type="hidden" name="group" value="<?php echo $group;?>">
            <input type="hidden" name="oldID" value="<?php echo implode(',',$oldIDArr);?>">
			<div class="mtablebox">
				<div class="mtable">
					<div class="tabright tabright03">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr>
                                	<td>NO.</td>
                                    <td>保護者名</td>
                                    <td>園児名</td>
                                    <td>アカウント</td>
                                    <td>パスワード</td>
                                    <td>きょうだい選択</td>
                                    <td class="td1">きょうだい順序</td>
                                </tr>
							</thead>
							<tbody>
                            	<?php
                                foreach($childGroupList as $key => $val)
								{
								?>
                                <tr>
									<td><?php echo $key + 1;?></td>
									<td><?php echo $val['Guardian1_FamilyName'].$val['Guardian1_GivenName'];?></td>
                                    <td><?php echo $val['FamilyName'].$val['GivenName'];?></td>
									<td><?php echo $val['Child_Id'];?></td>
									<td><?php echo $val['PWD'];?></td>
									<td>
                                    	<input class="checkbox01" type="checkbox" value="<?php echo $val['ID'];?>" checked>
                                        <input type="hidden"  name="ID[]" value="<?php echo $val['ID'];?>">
                                    </td>
									<td>
                                    	<select name="siblingOrder[]" class="select02">
                                        	<option value=""></option>
                                            <?php
                                            foreach($siblingOrder as $key_s => $val_s){
											?>
											<option value="<?php echo $key_s;?>" <?php if($key_s==$val['siblingOrder']) echo 'selected';?>><?php echo $val_s;?></option>
											<?php	
											}
											?>
                                        </select>
                                    </td>
								</tr>
                                <?php
								}
								$NO = count($childGroupList);
                                foreach($childNoGroupList as $key => $val)
								{
								?>
								<tr>
									<td><?php echo $NO + $key + 1;?></td>
									<td><?php echo $val['Guardian1_FamilyName'].$val['Guardian1_GivenName'];?></td>
                                    <td><?php echo $val['FamilyName'].$val['GivenName'];?></td>
									<td><?php echo $val['Child_Id'];?></td>
									<td><?php echo $val['PWD'];?></td>
									<td>
                                    	<input class="checkbox01" type="checkbox" value="<?php echo $val['ID'];?>">
                                        <input type="hidden"  name="ID[]" value="">
                                    </td>
									<td>
                                    	<select name="siblingOrder[]" class="select02" disabled>
                                        	<option value=""></option>
                                            <?php
                                            foreach($siblingOrder as $key_s => $val_s){
											?>
											<option value="<?php echo $key_s;?>"><?php echo $val_s;?></option>
											<?php	
											}
											?>
                                        </select>
                                    </td>
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
            </form>			
		</div>
	</div>
    
    <script>
    	(function(){						
			$.sibling = function(){
				var NoArr = []
				var sVal = '';
				$('.checkbox01').each(function(index, element) {						
                    if($(this).prop('checked')){					
						sVal = $('.select02:eq('+index+')').val();
						if(sVal!=''){
							NoArr.push(parseInt(sVal));
						}
					}
                });
				$('.select02').each(function(index, element) {
					toggleOptionShow($(this),[1,2,3,4,5],'')
                    toggleOptionShow($(this),'',NoArr)
                });
			}
			$('.checkbox01:checked').each(function(index, element) {
				$(this).parent().parent().find('.select02').attr('disabled',false);
            });			
			$.sibling();
		})(jQuery);
		
		
		$(document).ready(function() {			
			$('.select02').on('change',this,function(){
				$.sibling();	
			});
			$('.checkbox01').on('click',this,function(){
				if($(this).prop('checked')){
					$(this).next().val($(this).val()).parent().parent().find('.select02').attr('disabled',false);
				}else{
					$(this).next().val("").parent().parent().find('.select02').val("").attr('disabled',true);
					$.sibling();
				}
			});
		});
		
		
		function formSave()
		{
			var canSubmit = true;
			$('.checkbox01:checked').each(function(index, element) {
				if($(this).parent().parent().find('.select02').val()==""){
					alert('きょうだい順序を選択してください。');
					$(this).parent().parent().find('.select02').focus();
					canSubmit = false;
					return false;
				}
            });
			
			if(canSubmit){
				if($('input[name="group"]').val()==""){
					if($('.checkbox01:checked').length<1)	return false;				
				}
				$('#form').submit();
			}
		}
		
    </script>
	
</body>
</html>