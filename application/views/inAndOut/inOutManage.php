
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="<?php echo $media;?>css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $media;?>jQuery-Validation-Engine-master/validationEngine.jquery.css?version=<?php echo $version;?>" />
<script src="<?php echo $media;?>js/jquery-1.12.2.min.js?version=<?php echo $version;?>"></script>
<script src="<?php echo $media;?>js/common.js?version=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $media;?>jQuery-Validation-Engine-master/jquery.validationEngine-ja.js?version=<?php echo $version;?>"></script>
<script type="text/javascript" src="<?php echo $media;?>jQuery-Validation-Engine-master/jquery.validationEngine.js?version=<?php echo $version;?>"></script>
<script >
 var classList=new Array();
 <?php foreach ($parameter['BASE_INFO']['CLASS'] as $key=>$val){?>
		classList["<?php echo $key?>"]="<?php echo $val?>";
 <?php }?>
 
var childrenList=new Array();
<?php foreach ($children_Info as $key =>$val){
			$strList = array();
   			foreach ($val as $key1=>$val1){
				$strList[]=$val1['ID'].'","'.$val1['FamilyName'].$val1['GivenName'];
		}?>		
			childrenList["<?php echo $key?>"]=[["<?php echo implode('"],["',$strList);?> "]]
<?php  }?>


 
$(function(){
	//初始化CLASS和NAME
	var curCLASS = $('#CLASS').val();
	var curoption = '<option value ="">--選択--</option>';	
	var NAME =childrenList[curCLASS];
	$.each(NAME, function(key, value) { 
		curoption+='<option  value ="'+value[0]+'">'+value[1]+'</option>';		
	});
	$('#NAME').find('option').remove().end().html(curoption);
	
	$('#CLASS').bind("change",function(){
		var CLASS = $(this).val();
		var optionChange = '<option value ="">----選択----</option>';
		var NAMEChange =childrenList[CLASS];
		$.each(NAMEChange, function(key, value) { 
			optionChange+='<option  value ="'+value[0]+'">'+value[1]+'</option>';		
		});
		$('#NAME').find('option').remove().end().html(optionChange);
	});

})

</script>



</head>
<body>
	<div class="headerbox">
		<div class="mtop"><span>こども園トータルマネジメントシステム</span>＊＊＊＊＊さん でログイン中</div>
		<div class="logo">
			<div class="topright topright01 right">
				<p><input type="button" value="戻る" /></p>
			</div>
		</div>	
	</div>

	<div class="mianbox">
		<div class="content">
			<div class="titletop"><h2>登 降 園 実 績 管 理</h2></div>
			<div class="datebox">
				<div class="datelist datelist01">
					<h2 style="width:150px;">登降園状況の確認</h2>
				</div>
				<div class="datelist datelist02">
					<h2></h2>
					<ul>
						<li><span>クラス</span>
							<select name="select" id="CLASS" class="select02" >
								<?php foreach ($parameter['BASE_INFO']['CLASS'] as $key=>$val){?>
									<option value="<?php echo $key?>"><?php echo $val?></option>
								<?php }?>
							</select>
						</li>
						<li><span>お名前</span>
							<select name="select" id="NAME" class="select02" >
								<option value=""></option>
							</select>
						</li>
						
						<li><span></span><input type="text" class="txt05" value="" placeholder="今月の登降園状況を確認"/>
							<input type="text" class="txt05" value="" placeholder="過去の登降園状況を確認"/>
						</li>
					</ul>
				</div>
				<div class="datelist datelist02 right">
					<ul>
						<li><strong>確認したい月</strong>
							<select name="select_Comfirm_Y" class="select02" >
							<option value="">-----</option>
							<?php for($i=2005;$i<=2050;$i++){?>
								<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
							</select>
							<em>年</em>
							
							<select name="select_Comfirm_M" class="select01" >
								<option value="">------</option>
								<?php for($i=1;$i<=12;$i++){?>
								<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
							</select>
							<em>月</em>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
				
				<div class="databox databox08">
					<div class="datittop"><h2>広島市への請求書作成</h2></div>
					<div class="datelist">
						<ul>
							<li><span>一括作成</span><input type="text" class="txt05" value="" placeholder="預かり保育請求書作成(広島市向け)"/></li>
							<li><span>個別作成</span><input type="text" class="txt05" value="" placeholder="預かり保育請求書作成(広島市向け)"/></li>
						</ul>
					</div>
					<div class="datittop datittop01"><h2>保護者への請求書作成</h2></div>
					<div class="datelist">
						<ul>							
							<li><span>一括作成</span><input type="text" class="txt05" value="<?php ?>" placeholder="預かり保育請求書作成(広島市向け)"/></li>
							<li><span>個別作成</span><input type="text" class="txt05" value="<?php ?>" placeholder="預かり保育請求書作成(広島市向け)"/></li>
							<li><span></span><span>クラス</span><select name="select" class="select02" ><option value=""></option></select></li>
							<li><span></span><span>お名前</span><select name="select" class="select02" ><option value=""></option></select></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
</body>
</html>