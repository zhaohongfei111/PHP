		<div class="pagetop">
			<div class="navbox">
				<ul>
					<li class="td01">
                    	<span>並び替え：</span><a href="<?php echo URL::site('list/listAll');?>" <?php if(strtolower($action)=='listall'||strtolower($action)=='listrearch') echo ' class="cn"';?>>全園児一覧(あいうえお順)</a><a href="<?php echo URL::site('list/listClass');?>" <?php if(strtolower($action)=='listclass') echo ' class="cn"';?>>クラスごと</a><a href="<?php echo URL::site('list/listRecog');?>" <?php if(strtolower($action)=='listrecog') echo ' class="cn"';?>>認定区分ごと</a><a href="<?php echo URL::site('list/listBeforeAdmission');?>" class="<?php echo strtolower($action)=='listbeforeadmission'?'on':'yellow';?>">入園前の園児一覧</a><a href="<?php echo URL::site('list/listLeave');?>" class="<?php echo strtolower($action)=='listleave'?'a1':'hui';?>">卒園・転退園した園児一覧</a><a href="<?php echo URL::site('list/listExtension');?>" class="<?php echo strtolower($action)=='listextension'?'a1':'';?>">延長保育該当園児一覧</a>
                   	</li>
					<li class="td02">
                    	<span>管理機能：</span><a href="<?php echo URL::site('list/checkList').URL::query(array('from'=>$controller.'/'.$action));?>" class="a1">登 降 園</a><a href="<?php echo URL::site('activities/activitiesList').URL::query(array('from'=>$controller.'/'.$action));?>">課 外 活 動</a><a href="<?php echo URL::site('eat/eatList').URL::query(array('from'=>$controller.'/'.$action));?>">給　食</a><a href="<?php echo URL::site('list/busList');?>">バ　ス</a><a href="<?php echo URL::site('list/listTempDemand').URL::query(array('from'=>$controller.'/'.$action));?>" class="a2">一時預かり事業の請求</a><a href="<?php echo URL::site('list/listRearchBirth').URL::query(array('from'=>$controller.'/'.$action));?>">今月のお誕生日一覧</a>
                    </li>
					<li class="td03">
                    	<span style="color:#FFFFFF;">表示機能：</span><a href="<?php echo URL::site('listHistory/listAll').URL::query(array('from'=>$controller.'/'.$action));?>" style="background:#ff66ff">園児情報編集履歴一覧</a><a href="<?php echo URL::site('list/listNapTempIndex').URL::query(array('from'=>$controller.'/'.$action));?>" style="background:#3399ff">午睡チェック</a><a href="<?php echo URL::site('list/logIndex').URL::query(array('from'=>$controller.'/'.$action));?>" style="background:#336699">保育日誌の作成</a><a href="<?php echo URL::site('guide/guide');?>" style="background:#336699">指導計画の作成</a>
                    </li>
				</ul>
			</div>
			<div class="gxbox">            	
                <div class="search search1 right">
                <?php
            	if(in_array(strtolower($action),array('listall','listclass','listrecog','listrearch','listbeforeadmission','listextension'))){
				?>
                <form id="formSearch" action="<?php echo URL::site('list/listRearch');?>" method="get" enctype="multipart/form-data">
                    <input name="txt_Search" type="text" class="txt01" value="<?php if(isset($search)) echo $search;?>" placeholder="園児名検索" />
                    <input type="button" class="but01" value="検索" onclick="$('#formSearch').submit();" />
                </form>
                <?php
                }else{
					echo "&nbsp;";	
				}
                ?>
                </div>
			</div>
			<div class="clear"></div>
		</div>