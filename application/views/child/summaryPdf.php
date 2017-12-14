<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>幼稚園幼児指導要録(学籍に関する記録)</title>
<style type="text/css">
	body {font-family:"sjis";padding: 0;}
	.clear {clear: both;line-height: 0px;height:0px;font-size:0px;}
	.content {width:800px;margin:0 auto;padding-top:30px;}
	.tabletop {font-size:24px;font-weight:bold;text-align:center;border:solid 1px #d0d0d0;padding:6px 0 4px 0;}
	.wtablebox01 {margin-top:30px;}
	.wtablebox01 table,.wtablebox02 table {border-left:solid 1px #000;border-top:solid 1px #000;}
	.wtablebox01 table td,.wtablebox02 table td {border-right:solid 1px #000;border-bottom:solid 1px #000;}
	.wtablebox01 table tbody td {font-size:13px;}
	.wtablebox01 span{font-size:10px;}	
	.wtablebox01 table tbody td {padding:10px;}
	.wtablebox01 table tbody td.t01 {font-weight:bold;font-size:16px;}	
	.wtablebox02 {padding-top:30px;}
	.wtablebox02 table td {padding:5px;font-size:14px;}
	.wtablebox02 table td span {font-size:12px;}
	.wtablebox02 table td.t1 {font-weight:bold;text-align:center;line-height:24px;width:80px;font-size:15px;}
	.wtablebox02 table td.t2 {padding:5px; height:60px;}
	.wtablebox02 table td.t3 {line-height:20px;font-size:14px;padding:0;text-align:center;}
	.wtablebox02 table td.t3 span {padding-left:50px;}
	
	.wtablebox02 {padding-top:30px;}
	.wtablebox02 table.tabbox {border-top:1px #000 solid;}
	.wtablebox02 table.tabbox1 td {font-size:12px;}
	.wtablebox02 table td {padding:5px;font-size:14px;line-height:12px;}
	.wtablebox02 table td span {padding:0 40px;}
	.wtablebox02 table td.t1 {text-align:center;line-height:24px;width:80px;font-size:15px;}
	.wtablebox02 table td.t2 {padding:5px; height:60px;}
	.wtablebox02 table td.t3 {text-align:center;}
	.wtablebox02 table td.t4 {width:16px;padding:10px;line-height:20px;text-align:center;font-size:15px;}
	.wtablebox02 table td.t5 {vertical-align:top;}
	.pagetxt {padding-top:5px;padding-bottom:20px;}
	.pagetxt p {font-size:12px;line-height:20px;padding:0 0;margin:0 0;}
</style>

</head>
<body>
	<div class="content">
		<div class="tabletop">幼稚園幼児指導要録(学籍に関する記録)</div>
		<div class="wtablebox01">
			<table width="60%" align="right" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
                	<tr>
						<td style="padding:0 0 1px 0;width:87px;"><img src="<?php echo $media;?>images/tbg.gif" style="width:85px;height:45px;"/></td>
						<td><span>平成 　年度</span></td>
						<td><span>平成 　年度</span></td>
                        <td><span>平成 　年度</span></td>
                        <td><span>平成 　年度</span></td>
					</tr>                
					<tr>
						<td class="t01" style="height:45px;">学　　級</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td class="t01" style="height:45px;">整理番号</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="clear"></div>
		</div>
 
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td width="90" rowspan="3" class="t1">幼児</td>
						<td width="90" rowspan="2" class="t1">ふりがな<br/>名　　前</td>
						<td class="t2" colspan="3">
                        	<?php 
							echo $child_Info['FamilyName_Spell'];
							for($i=0;$i<1;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName_Spell'];?>
                            <br />
                            <?php
							echo $child_Info['FamilyName'];
							$end = (strlen($child_Info['FamilyName_Spell'])-strlen($child_Info['FamilyName']))/3+1;
							for($i=0;$i<$end;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName'];
							?>
                        </td>
						<td width="90" rowspan="2" class="t1">性別</td>
						<td class="t2" rowspan="2" width="90" align="center"><?php if(!empty($child_Info)){if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}}?></td>
					</tr>
					<tr>
						<td colspan="3"><?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($child_Info['Birthday'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>　月　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>　日生</td>
					</tr>
					<tr>
						<td class="t1">現住所</td>
						<td class="t2" colspan="5"><?php echo $child_Info['PostCode'].'　-　'.$child_Info['Address'];?></td>
					</tr>
					<tr>
						<td class="t1" rowspan="2">保護者</td>
						<td class="t1">ふりがな<br/>名　　前</td>
						<td class="t2" colspan="5">
                        	<?php 
							if(!empty($summary['Guardian1'])){							
								echo $step2_Info['Guardian1_FamilyName_Spell'];
								for($i=0;$i<1;$i++){
									echo "　";	
								}
								echo $step2_Info['Guardian1_GivenName_Spell'];
								echo "<br />";                           	
								echo $step2_Info['Guardian1_FamilyName'];
								$end = (strlen($step2_Info['Guardian1_FamilyName_Spell'])-strlen($step2_Info['Guardian1_FamilyName']))/3+1;
								for($i=0;$i<$end;$i++){
									echo "　";	
								}
								echo $step2_Info['Guardian1_GivenName'];						
							}							
							if(!empty($summary['Guardian1'])&&!empty($summary['Guardian2'])){echo "<br />";}
							
							if(!empty($summary['Guardian2'])){						
								echo $step2_Info['Guardian2_FamilyName_Spell'];
								for($i=0;$i<1;$i++){
									echo "　";	
								}
								echo $step2_Info['Guardian2_GivenName_Spell'];
								echo "<br />";                           	
								echo $step2_Info['Guardian2_FamilyName'];
								$end = (strlen($step2_Info['Guardian2_FamilyName_Spell'])-strlen($step2_Info['Guardian2_FamilyName']))/3+1;
								for($i=0;$i<$end;$i++){
									echo "　";	
								}
								echo $step2_Info['Guardian2_GivenName'];						
							}
							
							?>
                        </td>
					</tr>
					<tr>
						<td class="t1">現住所</td>
						<td class="t2" colspan="5">
                        	<?php
							if(!empty($summary['Guardian1'])){							
								echo $step2_Info['Guardian1_WorkAddress'];													
							}							
							if(!empty($summary['Guardian1'])&&!empty($summary['Guardian2'])){echo "<br /><br />";}
							
							if(!empty($summary['Guardian2'])){						
								echo $step2_Info['Guardian2_WorkAddress'];														
							}							
							?>
                        </td>
					</tr>
					<tr>
						<td class="t1" style="line-height:48px;">入園</td>
						<td colspan="2"><span style="line-height:48px;"><?php if(!empty($summary)&&substr($summary['InDate'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($summary['InDate'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($summary)&&substr($summary['InDate'],5,2)!='00'){ echo substr($summary['InDate'],5,2);}?>　月　<?php if(!empty($summary)&&substr($summary['InDate'],8,2)!='00'){ echo substr($summary['InDate'],8,2);}?>　日</span></td>
						<td width="112" colspan="1" rowspan="2" class="t1">入園前の<br />状　   況</td>
						<td rowspan="2" colspan="3">
                        <?php
                        if(!empty($summary['situation'])){							
							 echo $summary['situation'];
						}else{
							echo '';
							//echo '保育所等での集団生活の経験の有無等を記入すること。なお、転入園してきた幼児 については、併せてこの欄に前に在園した幼稚園名、所在地及び転入園の事由等を記入する';	
						}
						?>
                        </td>
					</tr>
					<tr>
						<td class="t1" style="line-height:48px;">転入園</td>
						<td colspan="2"><span style="line-height:48px;"><?php if(!empty($summary)&&substr($summary['ChangeInDate'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($summary['ChangeInDate'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($summary)&&substr($summary['ChangeInDate'],5,2)!='00'){ echo substr($summary['ChangeInDate'],5,2);}?>　月　<?php if(!empty($summary)&&substr($summary['ChangeInDate'],8,2)!='00'){ echo substr($summary['ChangeInDate'],8,2);}?>　日</span></td>
					</tr>
					<tr>
						<td class="t1" style="line-height:48px;">転・退園</td>
						<td colspan="2"><span style="line-height:48px;"><?php if(!empty($summary)&&substr($summary['InterruptDate'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($summary['InterruptDate'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($summary)&&substr($summary['InterruptDate'],5,2)!='00'){ echo substr($summary['InterruptDate'],5,2);}?>　月　<?php if(!empty($summary)&&substr($summary['InterruptDate'],8,2)!='00'){ echo substr($summary['InterruptDate'],8,2);}?>　日</span></td>
						<td class="t1" rowspan="2" colspan="1">進学先等</td>
						<td rowspan="2" colspan="3">
                        <?php
                        if(!empty($summary['source'])){							
							 echo $summary['source'];
						}else{
							echo '';
							//echo '進学した小学校等の名称・所在地を記入すること。なお、転園した幼児については、 この欄に転園先の幼稚園名、所在地及び転園の事由等を記入すること。また、退園し た幼児については、この欄にその事由等を記入する';	
						}
						?>
                        </td>
					</tr>
					<tr>
						<td class="t1" style="line-height:48px;">修了</td>
						<td colspan="2"><span style="line-height:48px;"><?php if(!empty($summary)&&substr($summary['FinishDate'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($summary['FinishDate'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($summary)&&substr($summary['FinishDate'],5,2)!='00'){ echo substr($summary['FinishDate'],5,2);}?>　月　<?php if(!empty($summary)&&substr($summary['FinishDate'],8,2)!='00'){ echo substr($summary['FinishDate'],8,2);}?>　日</span></td>
					</tr>
					<tr>
						<td class="t1" style="padding:15px 0;">幼 稚 園 名及び所在地</td>
						<td colspan="6"></td>
					</tr>
					<tr>
						<td class="t1" colspan="2" style="padding:15px 0;">年度及び入園(転入園)進級時の幼児の年齢</td>
						<td width="161" class="t3" style="font-size:18px;">
							<span><?php if(!empty($summary['Period1_Year'])) echo substr($summary['Period1_Year'],0,6)."　".substr($summary['Period1_Year'],6,2);?>　年度</span><br/><span><?php echo $summary['Period1_AgeY'];?> 歳&nbsp; <?php echo $summary['Period1_AgeM'];if(strlen($summary['Period1_AgeM'])==1) echo "　";?> か月</span>
						</td>
						<td width="151" class="t3" style="font-size:18px;">
							<span><?php if(!empty($summary['Period2_Year'])) echo substr($summary['Period2_Year'],0,6)."　".substr($summary['Period2_Year'],6,2);?>　年度</span><br/><span><?php echo $summary['Period2_AgeY'];?> 歳&nbsp; <?php echo $summary['Period2_AgeM'];if(strlen($summary['Period2_AgeM'])==1) echo "　";?> か月</span>
						</td>
						<td width="151" class="t3" style="font-size:18px;">
                        	<span><?php if(!empty($summary['Period3_Year'])) echo substr($summary['Period3_Year'],0,6)."　".substr($summary['Period3_Year'],6,2);?>　年度</span><br/><span><?php echo $summary['Period3_AgeY'];?> 歳&nbsp; <?php echo $summary['Period3_AgeM'];if(strlen($summary['Period3_AgeM'])==1) echo "　";?> か月</span>
						</td>
						<td class="t3" colspan="2" style="font-size:18px;">
                        	<span><?php if(!empty($summary['Period4_Year'])) echo substr($summary['Period4_Year'],0,6)."　".substr($summary['Period4_Year'],6,2);?>　年度</span><br/><span><?php echo $summary['Period4_AgeY'];?> 歳&nbsp; <?php echo $summary['Period4_AgeM'];if(strlen($summary['Period4_AgeM'])==1) echo "　";?> か月</span>
						</td>
					</tr>
					<tr>
						<td class="t1" colspan="2" style="padding:15px 0;">園　　　長<br/>氏名　　印</td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td class="t1" colspan="2" style="padding:15px 0;">学 級 担 任 者<br/>氏名  　　  印</td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="2"></td>
					</tr>
				</tbody>
			</table>
		</div>		
	</div>
    
    
    
    <div class="content">
		<div class="tabletop">幼稚園幼児指導要録(指導に関する記録)</div>
		<div class="wtablebox02">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td class="t4" rowspan="2">園児名</td>
						<td class="t1" rowspan="2">ふりがな<br/>名　　前</td>
						<td class="t2" >
                        	<?php 
							echo $child_Info['FamilyName_Spell'];
							for($i=0;$i<1;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName_Spell'];?>
                            <br />
                            <?php
							echo $child_Info['FamilyName'];
							$end = (strlen($child_Info['FamilyName_Spell'])-strlen($child_Info['FamilyName']))/3+1;
							for($i=0;$i<$end;$i++){
								echo "　";	
							}
							echo $child_Info['GivenName'];
							?>
                        </td>
						<td class="t1" rowspan="2">性別</td>
						<td class="t2" rowspan="2" width="80px;">
                        <?php if(!empty($child_Info)){if($child_Info['Sex']=='1'){echo '男';}else {echo '女';}}?>
                        </td>
					</tr>
					<tr>
						<td><?php if(!empty($child_Info)&&substr($child_Info['Birthday'],0,4)!='0000'){ $jY = Public_Times::getYearJap(substr($child_Info['Birthday'],0,4),'');echo substr($jY,0,6).'　'.substr($jY,6,2);}?>　年　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],5,2)!='00'){ echo substr($child_Info['Birthday'],5,2);}?>　月　<?php if(!empty($child_Info)&&substr($child_Info['Birthday'],8,2)!='00'){ echo substr($child_Info['Birthday'],8,2);}?>　日生</td>
					</tr>
				</tbody>
			</table>
			<table class="tabbox" width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td class="t4"><br/><br/></td>
						<td class="t3" colspan="2"><span>平成　<?php echo $summary['Teach1_Year'];?>　年度</span></td>
						<td class="t3" colspan="2"><span>平成　<?php echo $summary['Teach2_Year'];?>　年度</span></td>
					</tr>
					<tr align="left">
						<td class="t4"><br/><br/></td>
						<td class="t3">教育日数:<?php echo $summary['Teach1_Days'];?></td>
						<td class="t3">出席日数:<?php echo $summary['Teach1_inDays'];?></td>
						<td class="t3">教育日数:<?php echo $summary['Teach2_Days'];?></td>
						<td class="t3">出席日数:<?php echo $summary['Teach2_inDays'];?></td>
					</tr>
					<tr>
						<td class="t4" rowspan="2"><br/><br/>指導の重点等<br/><br/>&nbsp;</td>
						<td class="t5" colspan="2">学年の重点:<?php echo $summary['Teach1_YearPoint'];?></td>
						<td class="t5" colspan="2">学年の重点:<?php echo $summary['Teach2_YearPoint'];?></td>
					</tr>
					<tr>
						<td class="t5" colspan="2">個人の重点:<?php echo $summary['Teach1_SinglePoint'];?></td>
						<td class="t5" colspan="2">個人の重点:<?php echo $summary['Teach2_SinglePoint'];?></td>
					</tr>
					<tr>
						<td class="t4"><br />指導上参考となる事項<br/>&nbsp;</td>
						<td class="t5" colspan="2"><?php echo $summary['Teach1_Reference'];?></td>
						<td class="t5" colspan="2"><?php echo $summary['Teach2_Reference'];?></td>
					</tr>
					<tr>
						<td class="t4"><br />備考<br/>&nbsp;</td>
						<td class="t5" colspan="2"><?php echo $summary['Teach1_Remark'];?></td>
						<td class="t5" colspan="2"><?php echo $summary['Teach2_Remark'];?></td>
					</tr>
					<tr>
						<td class="t4" style="width:45px;"><br/><br/></td>
						<td class="t3" width="400" colspan="2"><span>平成　<?php echo $summary['Teach3_Year'];?>　年度</span></td>
						<td class="t3" width="400" colspan="2"><span>平成　<?php echo $summary['Teach4_Year'];?>　年度</span></td>
					</tr>
					<tr align="left">
						<td class="t4"><br/><br/></td>
						<td class="t3" width="200">教育日数:<?php echo $summary['Teach3_Days'];?></td>
						<td class="t3" width="200">出席日数:<?php echo $summary['Teach3_inDays'];?></td>
						<td class="t3" width="200">教育日数:<?php echo $summary['Teach4_Days'];?></td>
						<td class="t3" width="200">出席日数:<?php echo $summary['Teach4_inDays'];?></td>
					</tr>
					<tr>
						<td class="t4" rowspan="2"><br/><br/>指導の重点等<br/><br/>&nbsp;</td>
						<td class="t5" colspan="2">学年の重点:<?php echo $summary['Teach3_YearPoint'];?></td>
						<td class="t5" colspan="2">学年の重点:<?php echo $summary['Teach4_YearPoint'];?></td>
					</tr>
					<tr>
						<td class="t5" colspan="2">個人の重点:<?php echo $summary['Teach3_SinglePoint'];?></td>
						<td class="t5" colspan="2">個人の重点:<?php echo $summary['Teach4_SinglePoint'];?></td>
					</tr>
					<tr>
						<td class="t4" style="border-top:solid 1px #000;"><br />指導上参考となる事項<br/>&nbsp;</td>
						<td class="t5" style="border-top:solid 1px #000;" colspan="2">
							<?php echo $summary['Teach3_Reference'];?>
						
                        </td>
						<td class="t5" style="border-top:solid 1px #000;" colspan="2"><?php echo $summary['Teach4_Reference'];?></td>
					</tr>
					<tr>
						<td class="t4"><br />備考<br/>&nbsp;</td>
						<td class="t5" colspan="2"><?php echo $summary['Teach3_Remark'];?></td>
						<td class="t5" colspan="2"><?php echo $summary['Teach4_Remark'];?></td>
					</tr>
				</tbody>
			</table>
			<table class="tabbox tabbox1" width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
				<tbody>
					<tr>
						<td class="t4" rowspan="15">ね<br/>ら<br/>い<br/>︵<br/>発<br/>達<br/>を<br/>捉<br/>え<br/>る<br/>視<br/>点<br/>︶</td>
						<td class="t1" rowspan="3">健康</td>
						<td>明るく伸び伸びと行動し、充実感を味わう。</td>
					</tr>
					<tr>
						<td>自分の体を十分に動かし、進んで運動しようとする。</td>
					</tr>
					<tr>
						<td>健康、安全な生活に必要な習慣や態度を身に付ける。</td>
					</tr>
					<tr>
						<td class="t1" rowspan="3">人間関係</td>
						<td>幼稚園生活を楽しみ、自分の力で行動することの充実感を味わう。</td>
					</tr>
					<tr>
						<td>身近な人と親しみ、かかわりを深め、愛情や信頼感をもつ。</td>
					</tr>
					<tr>
						<td>社会生活における望ましい習慣や態度を身に付ける。</td>
					</tr>
					<tr>
						<td class="t1" rowspan="3">環境</td>
						<td>身近な環境に親しみ、自然と触れ合う中で様々な事象に興味や関心を持つ。</td>
					</tr>
					<tr>
						<td>身近な環境に自分からかかわり、発見を楽しんだり、考えたりし、それを生活に取り入れようとする。</td>
					</tr>
					<tr>
						<td>身近な事象を見たり、考えたり、扱ったりする中で、物の性質や数量、文字に対する感覚を豊かにする。</td>
					</tr>
					<tr>
						<td class="t1" rowspan="3">言葉</td>
						<td>自分の気持ちを言葉で表現する楽しさを味わう。</td>
					</tr>
					<tr>
						<td>人の言葉や話などをよく聞き、自分の経験したことや考えたことを話し、伝え合う喜びを味わう。</td>
					</tr>
					<tr>
						<td>日常生活に必要な言葉が分かるようになるとともに、絵本や物語などに親しみ、先生や友達と心を通わせる。</td>
					</tr>
					<tr>
						<td class="t1" rowspan="3">表現</td>
						<td>いろいろなものの美しさなどに対する豊かな感性をもつ。</td>
					</tr>
					<tr>
						<td>感じたことや考えたことを自分なりに表現して楽しむ。</td>
					</tr>
					<tr>
						<td>生活の中でイメージを豊かにし、様々な表現を楽しむ。</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="pagetxt">
			<p>学年の重点：年度初頭に、教育課程に基づき長期の見通しとして設定したものを記入　/　個人の重点： 1年間を振り返って、当該幼児の指導について特に重視してきた点を記入</p>
			<P style="padding-left:10px;">指導上参考となる事項</P>
			<P style="padding-left:20px;">(1) 次の事項について記入すること</P>
			<P style="padding-left:30px;">①1年間の指導の過程と幼児の発達の姿について以下の事項を踏まえ記入すること。</P>
			<P style="padding-left:40px;">・幼稚園教育要領第2章「ねらい及び内容」に示された各領域のねらいを視点として、当該幼児の発達の実情から向上が著しいと思われるもの。</P>
			<P style="padding-left:50px;">その際、他の幼児との比較や一定の基準に対する達成度についての評定によって捉えるものではないことに留意すること。</P>
			<P style="padding-left:40px;">・幼稚園生活を通して全体的、総合的に捉えた幼児の発達の姿。</P>
			<P style="padding-left:30px;">②次の年度の指導に必要と考えられる配慮事項等について記入すること。</P>
			<P style="padding-left:20px;">(2) 幼児の健康の状況等指導上特に留意する必要がある場合等について記入すること。</P>
		</div>
	</div>
    
    
</body>
</html>