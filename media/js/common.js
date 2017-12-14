$(function(){
	//填写页面input框中的默认值，专门针对非HTML5
	if (!window.applicationCache) {
		$('input[placeholder]').bind('focus',function(event){			
			if($.trim($(this).val())==$(this).attr("placeholder")){$(this).val("").css('color','#000');}
		}).bind('blur',function(event){
			if($.trim($(this).val())==""){$(this).val($(this).attr("placeholder")).css('color','#A9A9A9');}
		}).each(function(index, element) {
            if($.trim($(this).val())==""){$(this).val($(this).attr("placeholder")).css('color','#A9A9A9');}
        });			
		$('form').bind('jqv.form.result', function(event, errorFound){
			if(errorFound==0){
				$('input[placeholder]').each(function(index, element) {
					if($.trim($(this).val())==$(this).attr("placeholder")){$(this).val("").css('color','#000');}
				});
			}	
		});
	}
	
	$('.checkOnly').bind('click',function(event){
		if($(this).is(':checked')){
			var name = $(this).attr('name');
			$('input[name="'+name+'"]').prop('checked',false);
			$(this).prop('checked',true);
		}
	});
});


//月份天数插件
(function($){
	$.mkDays = function(options){
		var setting = $.extend(
			{
				"year"	:	$('input[name="txt_inputdate_Y"]'),
				"month"	:	$('select[name="select_inputdate_M"]'),
				"day"	:	$('select[name="select_inputdate_D"]')
			},
			options
		);
		$.showDays(setting);
		setting.year.on('change',this,function(){$.showDays(setting)});
		setting.month.on('change',this,function(){$.showDays(setting)});									
	}
	
	$.isLeapYear = function(year){
		
		return (year % 4 == 0) && (year % 100 != 0 || year % 400 == 0);
	}
	
	$.showDays = function(setting)
	{
		var d31 = new Array();
		for(var i=0;i<31;i++){
			d31[i] = i+1;
		}
		toggleOptionShow(setting.day,d31,'')
		//如果月份存在 就继续判断 如果月份不存在 就结束判断											
		var m = setting.month.val();
		if( m == "" ){														
			return false;
		}else{
			m = parseInt(m);
		}
		var d = setting.day.val();
		var m30= [ 4,6,9,11 ];
		//大月31天 小月30天
		if($.inArray(m,m30)!=-1){
			if(d!=""){
				if(parseInt(d)==31)	setting.day.val("");							
			}							
			toggleOptionShow(setting.day,'',[31]);			
		}else if(m==2){
			var Y = setting.year.val();							
			if( Y == "" ){
				if(parseInt(d)>29)	setting.day.val("");
				//年为空的情况  2月29
				toggleOptionShow(setting.day,'',[30,31]);
				
			}else{
			//闰年29天 非闰年28天
				Y = parseInt(Y);
				if($.isLeapYear(Y)){
					if(parseInt(d)>29)	setting.day.val("");
					toggleOptionShow(setting.day,'',[30,31]);					
				}else{
					if(parseInt(d)>28)	setting.day.val("");
					toggleOptionShow(setting.day,'',[29,30,31]);					
				}
			}
		}								
	}	
})(jQuery);

/*
解决IE option display:none  不支持的问题
参数说明： 
需被控制的Select对象， 
需显示的option序号(留空则不处理) eg:[0,1,3]， 
需隐藏的option序号(留空则不处理) eg:[2,4,6] 
*/  
function toggleOptionShow(obj,arrShow,arrHide){  
	function arrHandle(arr,type){  
		if($.isArray(arr)){  
			var len=arr.length;  
			for(i=0;i<len;i++){ 
				if(parseInt(obj.val())==arr[i]) continue; 
				var optionNow=obj.find("option").eq(arr[i]);  
				var optionP=optionNow.parent("span");  
				if(type=="show"){                     
					if(optionP.size()){  
						optionP.children().clone().replaceAll(optionP);   
					}                 
				}else{  
					if(!optionP.size()){  
						optionNow.wrap("<span style='display:none'></span>");  
					}  
				}  
			}  
		}  
	}  
	arrHandle(arrShow,"show");  
	arrHandle(arrHide,"hide");  
} 

//计算年龄
(function($){
	$.countAge = function(options){
		var setting = $.extend(
			{
				"year"	:	$('input[name="txt_birthday_Y"]'),
				"month"	:	$('select[name="select_birthday_M"]'),
				"day"	:	$('select[name="select_birthday_D"]'),
				"age"	:	$('input[name="txt_Age"]'),
			},
			options
		);
		$.showAge(setting);
		setting.year.on('change',this,function(){$.showAge(setting)});
		setting.month.on('change',this,function(){$.showAge(setting)});
		setting.day.on('change',this,function(){$.showAge(setting)});									
	}
	
	
	$.showAge = function(setting)
	{
		setting.age.val("")
		var Year = parseInt(setting.year.val());
		var Month = setting.month.val();
		var Day = setting.day.val();
		if(Year!=''&&Month!=''&&Day!=''){	
			str = Year+'-'+Month+'-'+Day
			var r = str.match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/);
			if(r==null)return   false;
			
			var y = new Date().getFullYear();
			var m = new Date().getMonth()+1;
			var d = new Date().getDate();
			
			if(Year==y){
				setting.age.val(0);
			}else if(m>parseInt(Month)){
				setting.age.val(y-Year);
			}else if(m==parseInt(Month)){
				if(d<parseInt(Day)){
					setting.age.val(y-Year-1);
				}else{
					setting.age.val(y-Year);
				}
			}else{
				setting.age.val(y-Year-1);
			} 
		}						
	}	
})(jQuery);


function preImg(obj, targetId, imgId ,imgW, imgH) {
	if(/msie/.test(navigator.userAgent.toLowerCase())){
		if (!$.support.leadingWhitespace) {
			obj.select();
         	//得到真实的图片路径
        	var realpath = document.selection.createRange().text;
			$('#'+targetId).html('');
     		$('#'+targetId).css('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod=scale,src=\"" + realpath + "\")")
		} else {
			obj.select();
			$('#'+targetId).focus();  
			 //得到真实的图片路径
			var realpath = document.selection.createRange().text;
			$('#'+targetId).html('');
			$('#'+targetId).css('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod=scale,src=\"" + realpath + "\")")
		}
	}else{
		$('#'+targetId).html('<img id="'+imgId+'" src="" style="width:'+imgW+'px; height:'+imgH+'px;" />');
		if (typeof FileReader === 'undefined') {  
			alert('Your browser does not support FileReader...');  
			return;  
		}  
		var reader = new FileReader();  
	  
		reader.onload = function(e) {  
			var img = document.getElementById(imgId);  
			img.src = this.result;  
		}  
		reader.readAsDataURL(document.getElementById(obj.id).files[0]);
	}	
	return true;	
} 





//提示 信息 通用
function addOverlay(w,h,src)
{
	var maxHeight = overlayMaxHeight();
	if(maxHeight<h){
		h = maxHeight;
	}
	
	var wH = $(window).height();
	var wW = $(window).width();
	var l = (wW-w)/2;
	var t = (wH-h)/2;

	var	html = '<div class="ui-overlay">';
		html += '	<div class="ui-widget-overlay" style="z-index:100;"></div>';
		html += '	<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 122px; height: 122px; position: fixed; left: '+(l+(w-100)/2)+'px; top: '+(t+(h-100)/2)+'px;"></div>';
		html += '</div>';
		html += '<div style="z-index:102;position: fixed; width: 100px; height: 100px;left: '+(l+(w-100)/2)+'px; top: '+(t+(h-100)/2)+'px; padding: 10px;" class="ui-widget ui-widget-content ui-corner-all">';
		html += '<div style="position:absolute;top:-15px;right:-15px;"><a href="javascript:overlayRemove();"><img src="../../media/images/ctb01.png"/></a></div>';
		
		html += '	<div id="overlayMsg" class="ui-dialog-content ui-widget-content" style="background: none; border: 0;">';
		html += '		<iframe src="'+src+'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" style="height:'+(h-22)+'px"></iframe>';
		html += '	</div>';
		html += '</div>';
	$('body').append(html);
	if(maxHeight==h){
		$('#overlayMsg').css({'max-height':(h-22)+'px','overflow-y':'auto'});
	}
	
	$('#overlayBg').animate({ 
							width: w+'px',
							height: h+'px',
							left: l+'px',
							top: t+'px'
						  }, 500 );
	$('#overlayMsg').parent().animate({ 
							width: (w-22)+'px',
							height: (h-22)+'px',
							left: l+'px',
							top: t+'px'
						  }, 500 ).end().css('overflow-y','hidden');
	/*$('.ui-overlay .ui-widget-overlay').bind('click',function(){
		overlayRemove();
	})*/
	
}

//去除提示  通用
function overlayRemove()
{
	$('#overlayBg').parent().remove();
	$('#overlayMsg').parent().remove();
}

//保存成功提示 信息  保存成功用
function addSaveOverlay(w,h,tag)
{
	var text="";
	var maxHeight = overlayMaxHeight();
	if(maxHeight<h){
		h = maxHeight;
	}
	
	if(tag){
		text="保存しました。";
	}else{
		text="保存失敗しました。";
	}
	var wH = $(window).height();
	var wW = $(window).width();
	var l = (wW-w)/2;
	var t = (wH-h)/2;

	var	html = '<div style="z-index:102;position: fixed; width: 100px; height: 100px;left: '+(l+(w-100)/2)+'px; top: '+(t+(h-100)/2)+'px; padding: 10px;" class="ui-widget ui-corner-all">';		
		html += '	<div id="overlayMsg" class="ui-dialog-content" style="background: none; border: 0;">';
		html += '   	<div class="errorbox">';
		html += '   		<div class="errortxt" style="background:#fff;">';
		html += '   			<h2>'+text+'</h2>';
		html += '   			<div class="errortip">';
		html += '   				<input type="button" style="width:60px;margin-top:20px;" onClick="overlaySaveRemove()" value="OK"/>';
		html += '   			</div>';
		html += '   		</div>';
		html += '   	</div>';
		html += '	</div>';
		html += '</div>';
	$('body').append(html);
	if(maxHeight==h){
		$('#overlayMsg').css({'max-height':(h-22)+'px','overflow-y':'auto'});
	}	
	$('#overlayMsg').parent().animate({ 
							width: (w-22)+'px',
							height: (h-22)+'px',
							left: l+'px',
							top: t+'px'
						  }, 2 ).end().css('overflow-y','hidden');
}

//去除提示  通用
function overlaySaveRemove()
{
	$('#btn_Save').removeAttr("disabled");
	$('#overlayMsg').parent().remove();	
	location.reload();
}



//提示框的最大高度
function overlayMaxHeight()
{
	var wH = $(window).height();
	var maxHeight = wH-100;
	return maxHeight;
}

//提示框的最大高度
function overlayMaxWidth()
{
	var wW = $(window).width();
	var maxWidth = wW-100;
	return maxWidth;
}

//格式化input时间成 05:07:08
function changeTime(obj){
	var thisVal = $(obj).val();
	thisVal = ConvertToBJ(thisVal);	
	thisVal = thisVal.split(' ').join('')
	if($.trim(thisVal)==""){
		$(obj).val("");
		return false;
	}
	var valList = thisVal.split(':');
	for(var v in valList){
		if(v==0){
			if(parseInt(valList[0])>24){
				 valList[0] = parseInt(valList[0])%24;
			}		
		}else if(v==1||v==2){
			valList[v] = parseInt(valList[v])%60;
		}
		valList[v] = '0'+valList[v];
		valList[v] = valList[v].substr(-2);
	}0
	for(var i = valList.length;i < 3;i++){
		valList[i] = '00';
	}
	
	thisVal = valList.slice(0, 3).join(':');
	$(obj).val(thisVal)
}

//全角自动转换成半角
function ConvertToBJ(val)
{ 
	var result="";
	for (var i = 0; i < val.length; i++)
	{
		if (val.charCodeAt(i)==12288)
		{
			result += String.fromCharCode(val.charCodeAt(i)-12256);
			continue;
		}
		if (val.charCodeAt(i)>65280 && val.charCodeAt(i)<65375)
			result+= String.fromCharCode(val.charCodeAt(i)-65248);
		else 
			result+= String.fromCharCode(val.charCodeAt(i));
	} 
	return result;
}

//数字转通货字符
function toThousands(num) {
	var value = num.replace(/[^0-9]/ig,""); 
    return (value || 0).toString().replace(/(\d)(?=(?:\d{3})+$)/g, '$1,');
}
//通货字符去除逗号
function toNum(str){
	return str.replace(/,/g,"");	
}

//图片写真 通用
function addOverlayPic(w,h,src)
{
	var maxHeight = overlayMaxHeight();
	if(maxHeight<h){
		h = maxHeight;
	}
	
	var wH = $(window).height();
	var wW = $(window).width();
	var l = (wW-w)/2;
	var t = (wH-h)/2;

	var	html = '<div class="ui-overlay">';
		html += '	<div class="ui-widget-overlay" style="z-index:100;"></div>';
		html += '	<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 122px; height: 122px; position: fixed; left: '+(l+(w-100)/2)+'px; top: '+(t+(h-100)/2)+'px;"></div>';
		html += '</div>';
		html += '<div style="z-index:102;position: fixed; width: 100px; height: 100px;left: '+(l+(w-100)/2)+'px; top: '+(t+(h-100)/2)+'px; padding: 10px;" class="ui-widget ui-widget-content ui-corner-all">';
		html += '<div style="position:absolute;top:-15px;right:-15px;"><a href="javascript:overlayRemovePic();"><img src="../../media/images/ctb01.png"/></a></div>';
		
		html += '	<div id="overlayMsg" class="ui-dialog-content ui-widget-content" style="background: none; border: 0;">';
		html += '		<iframe src="'+src+'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" style="height:'+(h-22)+'px"></iframe>';
		html += '	</div>';
		html += '</div>';
	$('body').append(html);
	if(maxHeight==h){
		$('#overlayMsg').css({'max-height':(h-22)+'px','overflow-y':'auto'});
	}
	
	$('#overlayBg').animate({ 
							width: w+'px',
							height: h+'px',
							left: l+'px',
							top: t+'px'
						  }, 500 );
	$('#overlayMsg').parent().animate({ 
							width: (w-22)+'px',
							height: (h-22)+'px',
							left: l+'px',
							top: t+'px'
						  }, 500 ).end().css('overflow-y','hidden');
	/*$('.ui-overlay .ui-widget-overlay').bind('click',function(){
		overlayRemove();
	})*/
	
}




