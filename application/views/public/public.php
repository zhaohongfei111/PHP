<div class="topleft right">
    <p><form action="<?php echo URL::site('login/logout')?>"><input type="submit" class="but01" value="" /></form></p>
</div>
<?php
$LASTLOGINTIME = Session::instance()->get('LASTLOGINTIME');
if(!empty($LASTLOGINTIME)){
?>
<div class="topleft right">
	<h4>前回のログイン：<?php echo $LASTLOGINTIME;?></h4>
</div>
<?php
}
?>