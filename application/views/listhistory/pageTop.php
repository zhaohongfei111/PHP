		<div class="pagetop">
			<div class="listbut left">
				<a>園児情報編集履歴一覧</a>
			</div>
			<div class="gxbox right">
				<div class="search search1">
                	 <?php
					if(in_array(strtolower($action),array('listall','listclass','listrecog','listrearch','listbeforeadmission'))){
					?>
				 	<form id="formSearch" action="<?php echo URL::site('listHistory/listRearch');?>" method="get" enctype="multipart/form-data">
                    	<input type="hidden" name="from" value="<?php echo $_GET['from']?>" />
						<input type="text" name="txt_Search" class="txt01" value="" placeholder="園児名検索" />
						<input type="button" class="but01" value="検索" onClick="$('#formSearch').submit();" />
					</form>
                     <?php
					}else{
						echo "&nbsp;";	
					}
					?>
				</div>
			</div>
			<div class="clear"></div>
			<div class="navbox">
				<ul>
					<li class="td01"><span>並び替え：</span>
                    <a href="<?php echo URL::site('listHistory/listAll').URL::query(array('txt_Search'=>NULL));?>" <?php if(strtolower($action)=='listall'||strtolower($action)=='listrearch') echo ' class="cn"';?>>全園児一覧(あいうえお順)</a>
                    <a href="<?php echo URL::site('listHistory/listClass').URL::query(array('txt_Search'=>NULL));?>" <?php if(strtolower($action)=='listclass') echo ' class="cn"';?>>クラスごと</a>
                    <a href="<?php echo URL::site('listHistory/listRecog').URL::query(array('txt_Search'=>NULL));?>" <?php if(strtolower($action)=='listrecog') echo ' class="cn"';?>>認定区分ごと</a>
                    <a href="<?php echo URL::site('listHistory/listBeforeAdmission').URL::query(array('txt_Search'=>NULL));?>" class="<?php echo strtolower($action)=='listbeforeadmission'?'on':'yellow';?>">入園前の園児一覧</a>
                    <a href="<?php echo URL::site('listHistory/listLeave').URL::query(array('txt_Search'=>NULL));?>" class="<?php echo strtolower($action)=='listleave'?'a1':'hui';?>">卒園・転退園した園児一覧</a>
                    </li>
				</ul>
			</div>
		</div>