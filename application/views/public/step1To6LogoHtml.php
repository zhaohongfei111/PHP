<?php $action_num = (int)str_replace('step','',$action);?>
<div class="topright right">
    <p><input id="halfwaySave" type="button" value="途中保存"/></p>
    <p><a href="<?php echo URL::site('child/calendar').URL::query(array('step'=>$action_num));?>" target="_blank"><input type="button" value="西暦和暦変換表" /></a></p>
</div>
<div class="topleft right">
    <img src="<?php echo $media;?>images/jd0<?php echo $action_num;?>.jpg"/>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#formMain').validationEngine('attach');
	$('#halfwaySave').bind('click',function(){
		if($('select[name="select_Class"]').length>0){
			if($('select[name="select_Class"]').val()==''){
				$('select[name="select_Class"]').trigger('blur');
				return false;	
			}	
		}
		$('input[name="halfwaySave"]').val("True");
		if (!window.applicationCache) {
			$('input[placeholder]').each(function(index, element) {
				if($.trim($(this).val())==$(this).attr("placeholder")){$(this).val("").css('color','#000');}
			});
		}
		//old
		$('#formMain').validationEngine('detach').submit();
		//新改
		//$('#formMain').validationEngine();
		//$('#formMain').submit()
	});
		
	<?php
	if(!empty($oldPost)){
		foreach($oldPost as $key => $val){
			if(is_array($val)){
				foreach($val as $key_v => $val_v){
	?>
		recoveryData('<?php echo $key;?>[]','<?php echo $val_v;?>');
	<?php
				}
			}else{
	?>
		recoveryData('<?php echo $key;?>','<?php echo $val;?>');
	<?php
			}
		}	
	}
	?>
});

function recoveryData(name,value){	
	var fourLetter = name.substr(0,4);
	switch(fourLetter){
		case "chec":
			$('input[name="'+name+'"][value="'+value+'"]').attr('checked',true);
			break;
		case "sele":
			$('select[name="'+name+'"]').val(value)
			break;
		case "radi":
			$('input[name="'+name+'"][value="'+value+'"]').attr('checked',true);
			break;
		case "txt_":
			if($('input[name="'+name+'"]').attr('type')=='text'){
				$('input[name="'+name+'"]').val(value)				
			}else if(name=='txt_ID'){		
				$('input[name="txt_ID"]').val(value)
				$('input[name="txt_Child_Id"]').attr('id',value);	
			}else{
				$('textarea[name="'+name+'"]').val(value);
			}
			break;
		default:
			$('input[name="'+name+'"]').val(value)
			break;	
	}	
}

function formMainSave(){
	$('input[name="halfwaySave"]').val("False");
	$('#formMain').submit();
}
</script>