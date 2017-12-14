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
		<div class="content">
			<div class="datebox">
				<div class="daborderbox">
					<h3>登録済み園児一覧</h3>
					<div class="daborder">
						<ul>
                        	<?php
                            foreach($childGroupList as $key => $val){
							?>
							<li>
								<input name="ID" class="checkbox01" type="checkbox" value="<?php echo $val['ID'];?>"/>
                                <input name="setbacksNum" type="hidden" value="<?php echo $val['setbacksNum'];?>"/>
								<input name="NAME" type="text" class="txt01" value="<?php echo $val['FamilyName'].$val['GivenName'];?>"/>
							</li>
                            <?php
							}
							?>
						</ul>
					</div>
					<div class="datatxt">
						<p>園児情報を編集したい園児にチェックを入れて、</p>
						<p>下記の編集ボタンを押してください。</p>
					</div>
				</div>
				<div class="databut databut01">
					<input type="button" value="編　集" onClick="formSubmit()" />
				</div>
			</div>
		</div>
	</div>
    <script>
    $(function(){
		$('.checkbox01').on('click',this,function(){
			if($(this).prop('checked')){
				$('.checkbox01[value!="'+$(this).val()+'"]').prop('checked',false);
			}
		});
	});
    function formSubmit(){
		if($('.checkbox01:checked').length==1){
			var stepNum = parseInt($('.checkbox01:checked').next().val());
			if(stepNum>7){
				stepNum = 11;
			}
			location.href="<?php echo URL::site('child/step');?>"+stepNum+"<?php echo URL::query(array('from'=>'index/index'));?>&ID="+$('.checkbox01:checked').val();
		}	
	}
    </script>
    	
</body>
</html>