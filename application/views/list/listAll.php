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
					<li class="cn"><a href="javascript:void(0);">全園児一覧(あいうえお順)</a></li>
				</ul>
				<div class="clear"></div>				
			</div>
			<div class="maintable xmaintable">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
					<tbody>
						<?php foreach ($child_Info as $key=>$val){?>
                        <tr>
                           <!-- <a name="tips<?php echo $val['ID'];?>" href="javascript:changeDayMsg(<?php echo $val['ID'];?>)"> -->
                            <td><a name="tips<?php echo $val['ID'];?>"></a>
                            <?php
                            echo View::factory('list/commStatus')->bind('val',$val);
							?>
							<input type="hidden" name="hidden_In_Time_<?php echo $val['ID'];?>" value="<?php echo $val['checkInfo']['in_Time'];?>"/>
							<input type="hidden" name="hidden_Out_Time_<?php echo $val['ID'];?>" value="<?php echo $val['checkInfo']['out_Time'];?>"/>
                            </td>
                            <td><?php echo $val['FamilyName']?><p><?php echo $val['FamilyName_Spell']?></p></td>
                            <td><?php echo  $val['GivenName']?><p><?php echo $val['GivenName_Spell']?></p></td>
                            <td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
                            <td><?php echo empty($val['Class'])?'':$parameter['BASE_INFO']['CLASS'][$val['Class']];?></td>
                            <td><?php echo $val['Age']?></td>
                            <td><?php echo $val['Birthday']?><p><?php echo $val['YearJap']?></p></td>
                            <td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
                            <td><a href="<?php echo URL::site('child/step'.($val['setbacksNum']<8&&$SELLEVEL != "Reader"?$val['setbacksNum']:11)).URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="確認" /></a></td>
                            <td><a href="<?php echo URL::site('child/health').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                            <td><a href="<?php echo URL::site('child/contact').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="出カ" /></a></td>
                            <td><a href="<?php echo URL::site('child/invoice_Index').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                            <td><a href="<?php echo URL::site('child/summary').URL::query(array('ID'=>$val['ID'],'from'=>$controller.'/'.$action));?>"><input type="button" value="作成" /></a></td>
                        </tr>						
						<?php }?>
					
					</tbody>
				</table>
                </div>
			</div>			
		</div>		
	
	<!--弹出框  -->
	 <div id="zhezhao" class="ui-overlay" style="display:none;">
		<div class="ui-widget-overlay" style="z-index:100;"></div>
		<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 812px; height: 222px; position: fixed;"></div>
	</div>
	
    <div id="Msg1" style="z-index:102;position: fixed; width:790px;height:200px;padding:10px;display:none;" class="ui-widget ui-widget-content ui-corner-all">
        <div style="position:absolute;top:-15px;right:-15px;">
            <a href="javascript:void(0);" onClick="msgHide()"><img src="../../media/images/ctb01.png"/></a>
        </div>
        <div class="ui-dialog-content ui-widget-content" style="background: none; border: 0;">
            <div class="layerbox">
                <div class="maintable xmaintable8 xmaintable82">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td width="30%">登園時間</td>
                                <td width="30%">降園時間</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="xtxt01" style="text-align: center" name="msg_In_Time" value=""></td>
                                <td><input type="text" class="xtxt01" style="text-align:center" name="msg_Out_Time" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="xlabut">
                    <input type="button" class="but01" value="編 集" id="submitMsg1"/>
                    <input type="button" class="but01" value="戻 る" onClick="msgHide()"/>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function(){
    	var wH = $(window).height();
    	var wW = $(window).width();
    	$('#overlayBg').css({'left':((wW-790)/2)+'px','top':((wH-200)/2)+'px'})
    	$('#Msg1').css({'left':((wW-790)/2)+'px','top':((wH-200)/2)+'px'})	 
    	$('.xmaintable82').css({'height':'62px'}) 
    	$('.xtxt01').on('click',this,function(){
    		setTimes(this);
        	});
    });
    function changeDayMsg(ID)
    {
    	$('#zhezhao').show(500);
    	$('#Msg1').show(500);
    	var in_Time_old = $('input[name="hidden_In_Time_'+ID+'"]').val();
        var out_Time_old = $('input[name="hidden_Out_Time_'+ID+'"]').val();
        $('input[name="msg_In_Time"]').val(in_Time_old);
        $('input[name="msg_Out_Time"]').val(out_Time_old);
    	$('#submitMsg1').off('click').on('click',this,function(){
    		ajaxChangeCheckTime(ID);
        });
    }
    function msgHide(){
    	$('#zhezhao').hide(500);
    	$('#Msg1').hide(500);

    }
    
    function ajaxChangeCheckTime(ID)
    {   
        var in_Time = $('input[name="msg_In_Time"]').val();
        var out_Time = $('input[name="msg_Out_Time"]').val();	
		var data = 'In_Time='+in_Time+'&Out_Time='+out_Time+'&ID='+ID;
    	$.ajax({
    	   type: "POST",
    	   url: "<?php echo URL::site('list/checkTimeUpdate');?>",
    	   cache: false,
    	   dataType: 'json',
    	   data: data,
    	   error: function(){alert('ajaxエラー');},
    	   success: function(json){
					if(json.result){
							msgHide();
							location.reload();
						}else{
							msgHide();
						}
        	   }
    	});
    }
    
    function setTimes(obj){
    	if($(obj).val()==""){
    		var myDate = new Date();
    		var hours = myDate.getHours();  
    		var minutes = myDate.getMinutes(); 
    		var sec = myDate.getSeconds () 
    		$(obj).val(checkTime(hours)+':'+checkTime(minutes)+':'+checkTime(sec));
    	}
    }
    
    function checkTime(i)
    {
    	if (i<10){i="0" + i}
      	return i
    }
        

    </script>
<style>
  .xmaintable82 table td input.xtxt01 {width:150px;border:none;background:white;}
  .xmaintable82 table td input.xtxt02 {width:150px;border:none;background:white;}
  .maintable table tbody tr.hover { background:#ffdfe2;}
  .maintablebox {padding-bottom:20px;}
</style>
<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>


</body>
</html>