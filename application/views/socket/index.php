<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<div>
	数据起始年月日
	<input type="text" name="startYearMonth" />
    <input type="button" value="startSocket" onclick="startSocket()" />
</div>
<script src="<?php echo $media;?>js/jquery-1.12.2.min.js?version=<?php echo $version;?>"></script>
<script>
var runSocket = false;
var offset = 0;
var yearMonth = '';

function startSocket()
{	
	$.ajax({
		type: "POST",
		url: "<?php echo URL::site('socket/send');?>",
		cache: false,
		dataType: 'json',
		data: "method=start",
		error: function(){alert('get data Error!');},
		success: function(json){
			if(json.result){
				runSocket = true;
				yearMonth = $('input[name="startYearMonth"]').val();
				sendMessage();				
			}else{
				alert(json.alertMsg)	
			}		
		}
	});	
	
}

function sendMessage()
{
	if(runSocket){
		$.ajax({
			type: "POST",
			url: "<?php echo URL::site('socket/send');?>",
			cache: false,
			dataType: 'json',
			data: "method=sendMsg&offset="+offset+'&yearMonth='+yearMonth,
			error: function(){alert('get data Error!');},
			success: function(json){
				if(json.result){
					if(json.state == 'next'){
						offset++;
						sendMessage();
					}else if(json.state == 'try again'){
						sendMessage();
					}else if(json.state == 'game over'){
						endSocket();
						alert('読出完了。')
					}else{
						alert(json.state)	
					}
				}else{
					endSocket();
					alert(json.alertMsg);					
				}
			}
		});
	}else{
		endSocket();
	}
}

function endSocket()
{
	return false;
	runSocket = false;
	offset = 0;
	
	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('socket/send');?>",
	   cache: false,
	   dataType: 'json',
	   data: "method=end",
	   error: function(){alert('get data Error!!');},
	   success: function(json){}
	});
}
</script>



</body>
</html>
