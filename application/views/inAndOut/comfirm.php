
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
</head>
<body>
	<div class="headerbox">
		<div class="mtop"><span>こども園トータルマネジメントシステム</span>＊＊＊＊＊さん でログイン中</div>
		<div class="logo">
			<div class="topright topright01 right">
				<p><input type="button" value="戻る" /></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="保存" /></p>
			</div>
			<div class="topright topright01 right">
				<p><input type="button" value="PDFに出力" /></p>
			</div>
		</div>	
	</div>

	<div class="mianbox">
		<div class="maintablebox">
			<div class="pagetableft left">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr><td class="t1">園児名</td><td></td></tr>
					<tr><td class="t1">クラス</td><td></td></tr>
					<tr><td class="t1">認定区分</td><td></td></tr>
				</table>
			</div>
			<div class="pagetabright right">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr><td class="t1">平日基本単価</td><td class="t1">長時間加算</td><td class="t1">土日祝単価</td></tr>
					<tr><td>400</td><td>100</td><td>800</td></tr>
				</table>
			</div>
			<div class="clear"></div>
			<div class="pagetable08">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<td colspan="2"><?php echo $date?></td>
							<td></td>
							<td colspan="2">実績データ</td>
							<td colspan="4">利用区分</td>
							<td colspan="2">利用時間</td>
							<td colspan="2">請求額</td>
							<td rowspan="3" class="t3">備考</td>
						</tr>
						<tr>
							<td rowspan="2">日にち</td>
							<td rowspan="2">曜日</td>
							<td rowspan="2">長期休暇</td>
							<td rowspan="2">登園</td>
							<td rowspan="2">降園</td>
							<td>平日8時間以内</td>
							<td>平日8時間超え</td>
							<td>土日祝合計</td>
							<td>土日祝合計</td>
							<td rowspan="2">実績時間</td>
							<td rowspan="2">累積時間</td>
							<td rowspan="2">保護者向け</td>
							<td rowspan="2">広島市向け</td>
						</tr>
						<tr>
							<td class="t01">長期4時間以内</td>
							<td class="t01">長期4時間超え</td>
							<td class="t01">8時間以内</td>
							<td class="t01">8時間超え</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($list as $key=>$val){?>
						<tr <?php if($val=='土曜'){echo 'class="blue"';}if($val=='日曜'){echo 'class="red"';}?>>
							<td><?php echo $key?></td>
							<td><?php echo $val?></td>
							<td>○</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="t3">冬休み</td>
						</tr>
					<?php }?>					
						<tr>
							<td>合計</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>0:00</td>
							<td>0:00</td>
							<td></td><td>
							</td><td class="t3"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>