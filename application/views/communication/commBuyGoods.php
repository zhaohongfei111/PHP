<?php
	echo View::factory('public/head');
?>
<body>
	<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',View::factory('public/backIndexLogoHtml'));
	?>
	<div class="mianbox">
	<form id="formMain" action="<?php echo URL::site('communication/buyGoods_Insert').URL::query();?>" method="post" enctype="multipart/form-data">
		<div class="content">
			<div class="datebox">
				<div class="datelist datelist01">
					<h2>用品購入依頼</h2>
				</div>
				<div class="datelist datelist01">
					<h2></h2>
					<ul>
						<li><span>対象園児</span>	</li>		
						<?php foreach ($children_list as $key=>$val){?>
                        <li><input name="chkbox_ID[]" class="checkbox01" type="checkbox" value="<?php echo $val['ID']?>" checked />
                        	<input type="text" class="txt05" value="<?php echo $val['FamilyName'].$val['GivenName']?>"/>
                        </li>     
     					<?php }?>		
					</ul>
				</div>
				<div class="datelist datelist08">
					<ul>
						<li><p>購入を希望する用品を選択してください。</p></li>
						<li><input type="button" class="inzj" value="用 品 の 追 加" onClick="addLine()"/></li>
					</ul>
				</div>
				<div class="tabbox tabbox01">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    	<colgroup>
                        	<col width="30%"></col>
                        	<col width="20%"></col>
                            <col width="20%"></col>
                            <col width="20%"></col>
                        </colgroup>
						<thead>
							<tr>
								<td>用品名</td><td>単価</td><td class="t01">備考</td><td class="tt"></td>
							</tr>
						</thead>
						<tbody id='Goods'>
							<tr>
								<td><select name="select_Goods_Name[]" class="select01 Goods" >
                                		<option value="">---------</option>
									<?php foreach ($goodsInfo as $key => $val){?>
										<option value="<?php echo $val['Goods_Name'];?>"><?php echo $val['Goods_Name']?></option>
									<?php }?>
									</select>
								</td>
								<td><input readOnly="true" name="txt_Goods_Price[]" type="text" class="txt05" value="" style="width:100px;" ><em>円</em></td>
								<td><input readOnly="true" name="txt_Goods_Remark[]" type="text" class="txt05" value="" ></td>
                                <td class="tt"></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="databut">
					<input type="button" value="購 入 す る" onClick="formMainSave()" />
				</div>
				
			</div>
		</div>
		</form>
	</div>
<div id="goodsPicList" style="display:none;"></div>
 <script>
 var goodsList=new Array();
<?php foreach ($goodsInfo as $key =>$val){?>		
goodsList["<?php echo $val['Goods_Name']?>"]=[["<?php echo $val['Goods_Name'].'"],["'.$val['Goods_Price'].'"],["'.$val['Goods_Remark'].'"],['.($val['Goods_Picture']==''?'':'["'.str_replace(';','"],["',$val['Goods_Picture']).'"]');?>]]
<?php  }?>
$(function(){
	$('#Goods').on('change',".Goods",function(){
		if($(this).val()!=""){
			var Price = goodsList[$(this).val()][1];	
			var Remark = goodsList[$(this).val()][2];
			var gpl = goodsList[$(this).val()][3];
			var tmpImg = "";
			if(gpl.length > 0){				
				tmpImg = 'イメージ参照　<img src="<?php echo $media.'uploadfile/goodsImages/'?>'+gpl[0]+'" style="height:30px;" class="goodsPic">';
			}			
			$(this).parents("tr:eq(0)").find('input[name="txt_Goods_Price[]"]').val(Price).end().find('input[name="txt_Goods_Remark[]"]').val(Remark).end().find('.tt').html(tmpImg);
		}else{
			$(this).parents("tr:eq(0)").find('input[name="txt_Goods_Price[]"]').val('').end().find('input[name="txt_Goods_Remark[]"]').val('').end().find('.tt').html('');
		}
	});
	$('#Goods').on('click','.goodsPic',function(){
		var gN = $(this).parents("tr:eq(0)").find('select[name="select_Goods_Name[]"]').val();
		if(gN=='') return false;
		var gpl = goodsList[gN][3];
		var htm = "";
		for(i in gpl){
			htm += '<a href="javascript:;" i="<?php echo $media.'uploadfile/goodsImages/'?>'+gpl[i]+'" class="Slide One"><img src="<?php echo $media.'uploadfile/goodsImages/'?>'+gpl[i]+'" alt=""></a>';
		}
		$('#goodsPicList').html(htm);
		$('.One').simpleSlide();
		$('.One:first').trigger('click');	
	});
	
});

function addLine(){	
	
	$('#Goods').find("tr:eq(0)").clone().find("input").val("").end().find('.tt').html('').end().appendTo("#Goods");
	return false;
}
function formMainSave(){
	if($('input[name="chkbox_ID[]"]:checked').length==0){
		alert('対象園児を選択してください。');
		return false;
	}
	var rst = false
	$('select[name="select_Goods_Name[]"]').each(function(index, element) {
        if($(this).val()!=""){
			rst = true;
			return false;
		}
    });
	
	if(!rst){
		alert('購入を希望する用品選択してください。');
		return false;
	}	
	
	$('#formMain').submit();	
}
 </script>
<script type="text/javascript" src="<?php echo $media;?>SimpleSlide20161002/js/simple.slide.min.js"></script>
<link rel="stylesheet" href="<?php echo $media;?>SimpleSlide20161002/css/simple.slide.css" type="text/css">  
</body>
</html>