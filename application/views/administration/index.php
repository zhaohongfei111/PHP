<?php
echo View::factory('public/head');
?>
<body class="mianboxbg">
	<?php
	$logohtml = '<div class="topright topright04 right">
                    <p><a href="'.URL::site('administration/logout').'"><input type="button" value="ログアウト (メニュー画面に戻る)" /></a></p>
                </div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->set('logoHtml',$logohtml);
	?>

	<div class="mianbox">
		<div class="content">
			<div class="tblist left">
				<ul>
					<li><a href="<?php echo URL::site('administration/userWorkerList');?>">職員アカウント管理</a></li>
					<li><a href="<?php echo URL::site('administration/userGuardianList');?>">保護者アカウント管理</a></li>
					<li><a href="<?php echo URL::site('administration/staffInfoList')?>">職員情報管理</a></li>
					<li class="blue"><a href="<?php echo URL::site('administration/dataSet');?>">データベース管理</a></li>
                    <li class="blue"><a href="<?php echo URL::site('administration/noticeBoard');?>">管理者からのお知らせ編集</a></li>                   
                    <li class="blue"><a href="<?php echo URL::site('administration/machine_info');?>">登降園リーダ機器設定</a></li>
                    <li class="blue"><a href="<?php echo URL::site('administration/invoiceAll');?>">全園児請求一覧 </a></li>
				</ul>
			</div>
			<div class="tblist left">
				<ul>
                	<li class="yellow"><a href="<?php echo URL::site('administration/recogSet');?>">認定区分の設定</a></li>                	
                    <li class="yellow"><a href="<?php echo URL::site('administration/recogProject');?>">認定ランクの設定</a></li>
                    <li class="yellow"><a href="<?php echo URL::site('administration/relationship');?>">きょうだいの設定</a></li>
                    <li class="yellow"><a href="<?php echo URL::site('administration/attendanceIdSet');?>">カードIDの設定</a></li> 
                    <li class="yellow"><a href="<?php echo URL::site('administration/capitalSet');?>">キャピタル番号の設定</a></li> 
                    <li class="ash"><span><?php echo $confirmDataNum;?></span><a href="<?php echo URL::site('administration/buyGoodsConfirm');?>">用品購入依頼の確認</a></li>
                    <li class="ash"><a href="<?php echo URL::site('administration/applicationList')?>">園児情報編集の申請履歴</a></li>
				</ul>
			</div>
			<!--<div class="tblist yellow left">
				<ul>
					<li class="orange"><span>0</span><a href="###">承認事項一覧</a></li>
					<li class="orange"><a href="###">勤怠管理</a></li>
					<li class="orange"><a href="<?php echo URL::site('administration/staffInfoList')?>">職員情報管理</a></li>
                    <li class="green"><a href="###">職員へ連絡</a></li>
					<li class="green"><a href="###">保護者へ連絡</a></li>
				</ul>
			</div>-->

			<div class="clear"></div>
		</div>
	</div>
	
</body>
</html>