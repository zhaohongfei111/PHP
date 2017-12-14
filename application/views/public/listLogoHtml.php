<div class="topleft right">
    <p><form action="<?php echo URL::site('login/logout')?>"><input type="submit" class="but01" value="" /></form></p>
</div>
<div class="topleft gxtop right"><a href="javascript:void(0)" onclick="window.location.reload(true);"><img src="<?php echo $media;?>images/xbut02.gif"/></a></div>
<div class="topright topright01 right">
    <p><a href="<?php echo URL::site('index/index');?>"><input type="button" value="メニュー画面に戻る" /></a></p>
</div>
<?php
if(in_array(strtolower($action),array('listall','listclass','listrecog','listrearch'))&&$SELLEVEL!='Reader'){
?>
<div class="topright topright01 right">
    <p><a href="<?php echo URL::site('child/step1?fileRand=fileRand'.time().rand(1111,9999));?>"><input type="button" value="新規園児追加" /></a></p>
</div>
<?php
}
?>
<?php
if(in_array(strtolower($action),array('listextension'))&&$SELLEVEL!='Reader'){
?>
<div class="topright topright01 right">
    <p><a href="javascript:outputPDF()"><input type="button" value="延長保育管理簿の印刷" /></a><a id="formSubmit" href="javascript:formSubmit()"><input type="button" value="保存" /></a><a id="formSubmitR3" href="javascript:formSubmitR3()" style="display:none"><input type="button" value="保存" /></a></p>
</div>
<?php
}
?>

