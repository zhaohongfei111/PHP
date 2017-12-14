<?php
echo View::factory('public/head');
?>

<body>
<?php
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',View::factory('public/public'));
?>
	<div class="mainbox">
		<div class="innavbox">
        
        
        	<div class="innavlist left">
				<ul>
					<li><a href="<?php echo !$authority?"javascript:void(0)":URL::site('child/step1').URL::query(array('fileRand'=>'fileRand'.time().rand(1111,9999)));?>"><img src="<?php echo $media;?>images/<?php if(!$authority) echo 'h';?>nav011.jpg"/></a></li>
					<li><a href="<?php echo empty($child)||!$authority?"javascript:void(0)":URL::site('child/sel');?>"><img src="<?php echo $media;?>images/<?php if(empty($child)||!$authority) echo 'h';?>nav022.jpg"/></a></li>
					<li><a href="<?php echo URL::site('Communication/commMenu');?>"><img src="<?php echo $media;?>images/nav033.jpg"/></a></li>
					<li><a href="###"><img src="<?php echo $media;?>images/nav044.jpg"/></a></li>
				</ul>
			</div>
			<div class="intxt left">
				<h2>園児情報の登録と変更について</h2>
				<p>新規に登録する場合は、当園がご提示する「登録期間内」に必ず園児情報の登録をお願いいたします。</p>
				<p>また登録した園児情報を編集したい場合は、「園への連絡」から「園児情報編集申請」を申し出てください。</p>
				<h4>※保険証や医療費控除にかかる証明書などに変更があった場合はすみやかに申請・編集をお願いいたします。</h4>
			</div>
			<div class="xnotice xnotice01 right">
				<h2>管理者からのお知らせ</h2>
				<div class="xnolist" id="notice">
					<?php echo empty($notice)?'':$notice['ToGuardian'];?>
				</div>
				<div class="intxt01">
					<h2>「園への連絡」における注意事項</h2>
					<p>[受付時間]　欠席/遅刻： <?php if(empty($guardianCon)){echo '_________';}else{ echo empty($guardianCon['0']['Acceptance_Data'])?'_________':$guardianCon['0']['Acceptance_Data'];}?>間に合わない場合は下記へご連絡ねがいます。</p>
					<h3>082-221-5493</h3>
					<h5><?php if(!empty($guardianCon)){echo $guardianCon['0']['Acceptance_Remark'];}?></h5>
				</div>
			</div>			
		</div>
	</div>
<script>
	$(function() {	
		var text =$('#notice').html();
		var reg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
        text = text.replace(reg, "<a href='$1$2' target='_blank'> $1$2</a>").replace(/\n/g, "<br />").replace("<br />","");	
        $('#notice').html(text);
		});

	</script>
</body>
</html>