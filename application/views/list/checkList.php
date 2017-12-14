<?php
echo View::factory('public/head');
?>
<body>
	
    <?php
	$logoHtml = '<div class="topright topright01 right">';
	if(array_key_exists('from',$_GET)){
	$logoHtml .= '<p><a href="'.URL::site($_GET['from']).URL::query(array('from'=>NULL,'actShow'=>NULL)).'"><input type="button" value="保存せずに戻る" /></a></p>';
	}
	$logoHtml .= '</div>
				<div class="topright topright01 right">
					<p><input class="edit" type="button" id="btn_Save" value="保 存" onclick="formSubmit()" /></p>
				</div>';
	
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>	
    <form id="searchForm" action="" method="post" >
    <input type="hidden" name="day_parameter_ID" value="<?php if(!empty($dayParameter)) echo $dayParameter['ID'];?>">
	<div class="mainbox">
		<div class="titletop01 <?php echo empty($dayParameter)?'':'bgblack';?>">
			<span id="title"><?php echo empty($dayParameter)?'未確定':'確定済';?></span>
			<h2>登 降 園 実 績 管 理</h2>
			<div class="right"><a id="reGET" style="display:inline-block;background:<?php echo empty($dayParameter)?'#fff':'#4472c4';?>;color:#fff;border-radius:6px;padding:7px 14px;text-align:center;" href="javascript:void(0);">登降園時間再取得</a></div>
			<div class="clear"></div>
		</div>		
		
		<div id="search" class="xdatelist8 width">
			<div class="datelist left">
				<ul>
					<li>
						<span>記 入 日 </span>
                        <?php
                        list($Y,$m,$d) = explode('-',$yearMonDay);
						?>
						<input name="txt_Day_Y" type="text" class="txt01 validate[required,custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:100px;" value="<?php echo $Y;?>" /><em>年</em>
						<select name="select_Day_M" class="select01" >
							<?php foreach ($months as $key=>$val){?>
								<option <?php echo $val==$m?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>月</em>
						<select name="select_Day_D" class="select01" >
							<?php foreach ($days as $key=>$val){?>
								<option <?php echo $val==$d?'selected':'';?> value="<?php echo $val;?>"><?php echo $val;?></option>
							<?php }?>
						</select><em>日</em>
						<input type="text" class="txt01" style="width:70px;" value="<?php echo $week;?>" /><em>日</em>
					</li>
                    <?php
                    if(!empty($activities)){						
					?>
					<li><span>課外活動</span>						
						<?php foreach ($activities as $key=>$val){
							?>
                        <input name="chk_activities[]" class="xcheckbox01" type="checkbox" value="<?php echo $val['ID'];?>" <?php if(is_array($chk_activities)&&in_array($val['ID'],$chk_activities)) echo 'checked';?> <?php if(!empty($dayParameter)) echo 'onclick="return false;"';?> />
                        <input name="hidden_activities_ID[]" type="hidden" value="<?php echo $val['ID'];?>">
						<input name="txt_activities[]" type="text" class="txt01" value="<?php echo $val['Activity_Name'] ?>" readonly />
						<?php }?>
					</li>
                    <?php
					}
					?>
				</ul>
			</div>
			<div class="xdatetxt08 <?php echo empty($dayParameter)?'':'bgblack';?>">
				<P id="suggestion"><?php echo empty($dayParameter)?'登降園データが確定されていません。<br/>休日設定および登降園時刻などを確認し、<br/>保存ボタンを押下してデータを確定させて下さい。':'登降園データは確定済です。<br/>編集する場合は編集ボタンを押下、登降園時間を再取得する場合は<br/>再取得ボタンを押下して再度保存して下さい。
			';?></P>
			</div>
			
			<div class="xchoice right">
				<div class="datelist tdatelist">
					<ul>
						<li>
							<span>祝　日</span>
							<input name="chk_holidays" class="xcheckbox01" type="checkbox" <?php if(!empty($chk_holidays)) echo 'checked';?> value="1"  <?php if(!empty($dayParameter)) echo 'onclick="return false;"';?>/>
						</li>
						<li>
							<span>長期休暇</span>
							<input name="chk_longHoliday" class="xcheckbox01" type="checkbox" <?php if(!empty($chk_longHoliday)) echo 'checked';?> value="1" <?php if(!empty($dayParameter)) echo 'onclick="return false;"';?>/>
						</li>
						<li>
							<span>イベント</span>
							<input name="chk_event" class="xcheckbox01" type="checkbox" <?php if(!empty($chk_event)) echo 'checked';?> value="1" <?php if(!empty($dayParameter)) echo 'onclick="return false;"';?>/>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01">
				<ul>
					<?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='R1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="maintable xmaintable8 fxmaintable8">
				<!--认定分区1-->
				<table id=<?php echo 'tab_con_R1'?>  width="100%" border="0" cellspacing="0" cellpadding="0">
                	<colgroup>
                    	<col width="4.5%"></col>
                        <col width="4.5%"></col>
                        <col width="6%"></col>
                        <col width="7%"></col>
                        <col width="2.5%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="6%"></col>
                        <col width="4%"></col>
                        <col width="4%"></col>
                        <col width="4%"></col>
                        <col width="4%"></col>
                        <col width="4.5%"></col>
                        <col width="3.5%"></col>
                        <col width="3.5%"></col>
                        <col width="6%"></col>
                        <col width="6.5%"></col>
                        <col width="4.5%"></col>
                        <col width="6%"></col>
                        <col width="7%"></col>
                    </colgroup>
					<thead>
						<tr>
							<td class="blue">月次</td>
							<td class="blue">日次</td>
							<td class="blue">苗字</td>
							<td class="blue">名前</td>
							<td class="blue">性<br/>别</td>
							<td class="blue">認定区分</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="green">課外活動</td>
							<td class="green">バス行き</td>
							<td class="green">バス帰り</td>
							<td class="violet">預かり<br/>保育</td>
							<td class="violet">教育<br/>時間</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育<br/>時間</td>
							<td class="violet">ステータス</td>
							<td class="orange">補助金<br/>対象</td>
							<td class="orange">時間区分</td>
							<td class="blue t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($day_Detail as $key =>$val){
							if($val['Recog_Type']=='R1'){?>
						<tr <?php if($val['fromChange']) echo 'class="hover"';?>>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['day_detail_ID'];?>">
                            <input type="hidden" name="Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="In_Time[]" value="<?php echo $val['In_Time'];?>">
                            <input type="hidden" name="Out_Time[]" value="<?php echo $val['Out_Time'];?>">
                            <input type="hidden" name="On_Time[]" value="<?php echo $val['On_Time'];?>">
                            <input type="hidden" name="Activity_Checked[]" value="<?php echo $val['Activity_Checked'];?>">
                            <input type="hidden" name="BusCome_Checked[]" value="<?php echo $val['BusCome_Checked'];?>">
                            <input type="hidden" name="BusGo_Checked[]" value="<?php echo $val['BusGo_Checked'];?>">
                            <input type="hidden" name="Delayed_Times[]" value="<?php echo $val['Delayed_Times'];?>">
                            <input type="hidden" name="Usually_Times[]" value="">                            
                            <input type="hidden" name="Study_Times[]" value="<?php echo $val['Study_Times'];?>">
                            <input type="hidden" name="Extension_Times[]" value="<?php echo $val['Extension_Times'];?>">
                            <input type="hidden" name="All_Times[]" value="<?php echo $val['All_Times'];?>">
                            <input type="hidden" name="Grants_Times[]" value="<?php echo $val['Grants_Times'];?>">
                            <input type="hidden" name="showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="grantsStatus[]" value="<?php echo $val['grantsStatus'];?>">                            
                            <input type="hidden" name="Day_Remark[]" value="<?php echo $val['Day_Remark'];?>">                            
                            <input type="hidden" name="Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">
                            <input type="hidden" name="Child_1_Base_ID[]" value="<?php echo $val['ID'];?>">
                            <input type="hidden" name="fromChange[]" value="<?php echo $val['fromChange'];?>">
                                                        
							<td><a href="<?php echo URL::site('list/monDetail').URL::query(array('ID'=>$val['ID'],'yearMon'=>$Y.'-'.$m));?>"><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" /></a></td>
							<td><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" onClick="changeDayMsg1(this)" <?php if($SELLEVEL=='Reader'){echo 'disabled';}?>/></td>
							<td><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
							<td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td class="inTime"><?php echo $val['In_Time'];?></td>
							<td class="outTime"><?php echo $val['Out_Time'];?></td>
							<td class="onTime"><?php echo $val['On_Time'];?></td>
							<td><input name="chk_Activity" class="xcheckbox01" <?php if($val['Activity_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusCome" class="xcheckbox01" <?php if($val['BusCome_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusGo" class="xcheckbox01" <?php if($val['BusGo_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td class="delayedTimes"><?php echo $val['Delayed_Times'];?></td>
							<td class="studyTimes"><?php echo $val['Study_Times'];?></td>
							<td class="extensionTimes"><?php echo $val['Extension_Times'];?></td>
							<td class="allTimes"><?php echo $val['All_Times'];?></td>
							<td class="showStatus"><?php echo $val['showStatus'];?></td>
							<td class="grantsTimes"><?php echo $val['Grants_Times'];?></td>
							<td class="grantsStatus"><?php echo $val['grantsStatus'];?></td>
							<td class="t02 dayRemark"><?php echo $val['Day_Remark'];?></td>
						</tr>
						<?php }}?>				
					</tbody>				
				</table>
				
				<!--认定分区2标准-->
				<table id=<?php echo 'tab_con_R2'?>  width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none">  
					<thead>
						<tr>
							<td class="blue">月次</td>
							<td class="blue">日次</td>
							<td class="blue">苗字</td>
							<td class="blue">名前</td>
							<td class="blue">性<br/>别</td>
							<td class="blue">認定区分</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="green">課外活動</td>
							<td class="green">バス行き</td>
							<td class="green">バス帰り</td>
							<td class="violet">通常<br/>保育</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育<br/>時間</td>
							<td class="violet">ステータス</td>
							<td class="blue t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($day_Detail as $key =>$val){
							if($val['Recog_Type']=='R2'){?>
						<tr <?php if($val['fromChange']) echo 'class="hover"';?>>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['day_detail_ID'];?>">
                            <input type="hidden" name="Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="In_Time[]" value="<?php echo $val['In_Time'];?>">
                            <input type="hidden" name="Out_Time[]" value="<?php echo $val['Out_Time'];?>">
                            <input type="hidden" name="On_Time[]" value="<?php echo $val['On_Time'];?>">
                            <input type="hidden" name="Activity_Checked[]" value="<?php echo $val['Activity_Checked'];?>">
                            <input type="hidden" name="BusCome_Checked[]" value="<?php echo $val['BusCome_Checked'];?>">
                            <input type="hidden" name="BusGo_Checked[]" value="<?php echo $val['BusGo_Checked'];?>">
                            <input type="hidden" name="Delayed_Times[]" value="">
                            <input type="hidden" name="Usually_Times[]" value="<?php echo $val['Usually_Times'];?>">                            
                            <input type="hidden" name="Study_Times[]" value="">
                            <input type="hidden" name="Extension_Times[]" value="<?php echo $val['Extension_Times'];?>">
                            <input type="hidden" name="All_Times[]" value="<?php echo $val['All_Times'];?>">
                            <input type="hidden" name="Grants_Times[]" value="">                            
                            <input type="hidden" name="showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="grantsStatus[]" value="">
                            <input type="hidden" name="Day_Remark[]" value="<?php echo $val['Day_Remark'];?>">
                            <input type="hidden" name="Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">
                            <input type="hidden" name="Child_1_Base_ID[]" value="<?php echo $val['ID'];?>">
                            <input type="hidden" name="fromChange[]" value="<?php echo $val['fromChange'];?>">
                        
							<td><a href="<?php echo URL::site('list/monDetail').URL::query(array('ID'=>$val['ID'],'yearMon'=>$Y.'-'.$m));?>"><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" /></a></td>
							<td><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" onClick="changeDayMsg1(this)" /></td>
							<td><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
							<td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td class="inTime"><?php echo $val['In_Time'];?></td>
							<td class="outTime"><?php echo $val['Out_Time'];?></td>
							<td class="onTime"><?php echo $val['On_Time'];?></td>
							<td><input name="chk_Activity" class="xcheckbox01" <?php if($val['Activity_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusCome" class="xcheckbox01" <?php if($val['BusCome_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusGo" class="xcheckbox01" <?php if($val['BusGo_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td class="usuallyTimes"><?php echo $val['Usually_Times'];?></td>
							<td class="extensionTimes"><?php echo $val['Extension_Times'];?></td>
							<td class="allTimes"><?php echo $val['All_Times'];?></td>
							<td class="showStatus">
                            	<?php
								if(!empty($val['On_Time'])){
									if($val['Extension_Times']>'0:00'){
										echo '<span class="red">延長保育</span>'	;
									}else{
										echo "標準時間内";
									}
								}
								?>
                            </td>
							<td class="t02 dayRemark"><?php echo $val['Day_Remark'];?></td>
						</tr>
						<?php }}?>					
					</tbody>
				</table>
				
				<!--认定分区2短时-->
				<table id=<?php echo 'tab_con_R2S'?> width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none">
                    <thead>
						<tr>
							<td class="blue">月次</td>
							<td class="blue">日次</td>
							<td class="blue">苗字</td>
							<td class="blue">名前</td>
							<td class="blue">性<br/>别</td>
							<td class="blue">認定区分</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="green">課外活動</td>
							<td class="green">バス行き</td>
							<td class="green">バス帰り</td>
							<td class="violet">預かり<br/>保育</td>
							<td class="violet">通常<br/>保育</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育<br/>時間</td>
							<td class="violet">ステータス</td>
							<td class="blue t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($day_Detail as $key =>$val){
							if($val['Recog_Type']=='R2S'){?>
						<tr <?php if($val['fromChange']) echo 'class="hover"';?>>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['day_detail_ID'];?>">
                            <input type="hidden" name="Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="In_Time[]" value="<?php echo $val['In_Time'];?>">
                            <input type="hidden" name="Out_Time[]" value="<?php echo $val['Out_Time'];?>">
                            <input type="hidden" name="On_Time[]" value="<?php echo $val['On_Time'];?>">
                            <input type="hidden" name="Activity_Checked[]" value="<?php echo $val['Activity_Checked'];?>">
                            <input type="hidden" name="BusCome_Checked[]" value="<?php echo $val['BusCome_Checked'];?>">
                            <input type="hidden" name="BusGo_Checked[]" value="<?php echo $val['BusGo_Checked'];?>">
                            <input type="hidden" name="Delayed_Times[]" value="<?php echo $val['Delayed_Times'];?>">
                            <input type="hidden" name="Usually_Times[]" value="<?php echo $val['Usually_Times'];?>">                            
                            <input type="hidden" name="Study_Times[]" value="">
                            <input type="hidden" name="Extension_Times[]" value="<?php echo $val['Extension_Times'];?>">
                            <input type="hidden" name="All_Times[]" value="<?php echo $val['All_Times'];?>">
                            <input type="hidden" name="Grants_Times[]" value="">
                            <input type="hidden" name="showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="grantsStatus[]" value="">
                            <input type="hidden" name="Day_Remark[]" value="<?php echo $val['Day_Remark'];?>">
                            <input type="hidden" name="Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">
                            <input type="hidden" name="Child_1_Base_ID[]" value="<?php echo $val['ID'];?>">
                            <input type="hidden" name="fromChange[]" value="<?php echo $val['fromChange'];?>">
                        
							<td><a href="<?php echo URL::site('list/monDetail').URL::query(array('ID'=>$val['ID'],'yearMon'=>$Y.'-'.$m));?>"><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" /></a></td>
							<td><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" onClick="changeDayMsg1(this)" /></td>
							<td><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
							<td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td class="inTime"><?php echo $val['In_Time'];?></td>
							<td class="outTime"><?php echo $val['Out_Time'];?></td>
							<td class="onTime"><?php echo $val['On_Time'];?></td>
							<td><input name="chk_Activity" class="xcheckbox01" <?php if($val['Activity_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusCome" class="xcheckbox01" <?php if($val['BusCome_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td><input name="chk_BusGo" class="xcheckbox01" <?php if($val['BusGo_Checked']) echo "checked";?> type="checkbox" value="" onClick="return false;"/></td>
							<td class="delayedTimes"><?php echo $val['Delayed_Times'];?></td>
							<td class="usuallyTimes"><?php echo $val['Usually_Times'];?></td>
							<td class="extensionTimes"><?php echo $val['Extension_Times'];?></td>
							<td class="allTimes"><?php echo $val['All_Times'];?></td>
							<td class="showStatus"><?php echo $val['showStatus'];?></td>
							<td class="t02 dayRemark"><?php echo $val['Day_Remark'];?></td>
						</tr>
						<?php }}?>				
					</tbody>
				</table>
				
				<!--认定分区3标准-->
				<table id=<?php echo 'tab_con_R3'?> width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none">
                    <thead>
						<tr>
							<td class="blue">月次</td>
							<td class="blue">日次</td>
							<td class="blue">苗字</td>
							<td class="blue">名前</td>
							<td class="blue">性<br/>别</td>
							<td class="blue">認定区分</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="violet">通常<br/>保育</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育<br/>時間</td>
							<td class="violet">ステータス</td>
							<td class="blue t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($day_Detail as $key =>$val){
							if($val['Recog_Type']=='R3'){?>
						<tr <?php if($val['fromChange']) echo 'class="hover"';?>>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['day_detail_ID'];?>">
                            <input type="hidden" name="Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="In_Time[]" value="<?php echo $val['In_Time'];?>">
                            <input type="hidden" name="Out_Time[]" value="<?php echo $val['Out_Time'];?>">
                            <input type="hidden" name="On_Time[]" value="<?php echo $val['On_Time'];?>">
                            <input type="hidden" name="Activity_Checked[]" value="">
                            <input type="hidden" name="BusCome_Checked[]" value="">
                            <input type="hidden" name="BusGo_Checked[]" value="">
                            <input type="hidden" name="Delayed_Times[]" value="">
                            <input type="hidden" name="Usually_Times[]" value="<?php echo $val['Usually_Times'];?>">                            
                            <input type="hidden" name="Study_Times[]" value="">
                            <input type="hidden" name="Extension_Times[]" value="<?php echo $val['Extension_Times'];?>">
                            <input type="hidden" name="All_Times[]" value="<?php echo $val['All_Times'];?>">
                            <input type="hidden" name="Grants_Times[]" value="">
                            <input type="hidden" name="showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="grantsStatus[]" value="">
                            <input type="hidden" name="Day_Remark[]" value="<?php echo $val['Day_Remark'];?>">
                            <input type="hidden" name="Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">
                            <input type="hidden" name="Child_1_Base_ID[]" value="<?php echo $val['ID'];?>">
                            <input type="hidden" name="fromChange[]" value="<?php echo $val['fromChange'];?>">
                        
							<td><a href="<?php echo URL::site('list/monDetail').URL::query(array('ID'=>$val['ID'],'yearMon'=>$Y.'-'.$m));?>"><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" /></a></td>
							<td><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" onClick="changeDayMsg2(this)" /></td>
							<td><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
							<td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td class="inTime"><?php echo $val['In_Time'];?></td>
							<td class="outTime"><?php echo $val['Out_Time'];?></td>
							<td class="onTime"><?php echo $val['On_Time'];?></td>
							<td class="usuallyTimes"><?php echo $val['Usually_Times'];?></td>
							<td class="extensionTimes"><?php echo $val['Extension_Times'];?></td>
							<td class="allTimes"><?php echo $val['All_Times'];?></td>
							<td class="showStatus"><?php echo $val['showStatus'];?></td>
							<td class="t02 dayRemark"><?php echo $val['Day_Remark'];?></td>
						</tr>
					<?php }}?>						
					</tbody>
				</table>
				
				<!--认定分区3短时-->
				<table id=<?php echo 'tab_con_R3S'?> width="100%" border="0" cellspacing="0" cellpadding="0" style="display:none">
                    <thead>
						<tr>
							<td class="blue">月次</td>
							<td class="blue">日次</td>
							<td class="blue">苗字</td>
							<td class="blue">名前</td>
							<td class="blue">性<br/>别</td>
							<td class="blue">認定区分</td>
							<td>登園<br/>時間</td>
							<td>降園<br/>時間</td>
							<td>在園<br/>時間</td>
							<td class="violet">預かり<br/>保育</td>
							<td class="violet">通常<br/>保育</td>
							<td class="violet">延長<br/>保育</td>
							<td class="violet">所定保育<br/>時間</td>
							<td class="violet">ステータス</td>
							<td class="blue t02">備考</td>
						</tr>
					</thead>
					
					<tbody>
					<?php foreach ($day_Detail as $key =>$val){
							if($val['Recog_Type']=='R3S'){?>
						<tr <?php if($val['fromChange']) echo 'class="hover"';?>>
                        	<input type="hidden" name="day_detail_ID[]" value="<?php echo $val['day_detail_ID'];?>">
                            <input type="hidden" name="Day_Date[]" value="<?php echo $val['Day_Date'];?>">
                            <input type="hidden" name="In_Time[]" value="<?php echo $val['In_Time'];?>">
                            <input type="hidden" name="Out_Time[]" value="<?php echo $val['Out_Time'];?>">
                            <input type="hidden" name="On_Time[]" value="<?php echo $val['On_Time'];?>">
                            <input type="hidden" name="Activity_Checked[]" value="">
                            <input type="hidden" name="BusCome_Checked[]" value="">
                            <input type="hidden" name="BusGo_Checked[]" value="">
                            <input type="hidden" name="Delayed_Times[]" value="<?php echo $val['Delayed_Times'];?>">
                            <input type="hidden" name="Usually_Times[]" value="<?php echo $val['Usually_Times'];?>">                            
                            <input type="hidden" name="Study_Times[]" value="">
                            <input type="hidden" name="Extension_Times[]" value="<?php echo $val['Extension_Times'];?>">
                            <input type="hidden" name="All_Times[]" value="<?php echo $val['All_Times'];?>">
                            <input type="hidden" name="Grants_Times[]" value="">
                            <input type="hidden" name="showStatus[]" value="<?php echo $val['showStatus'];?>">
                            <input type="hidden" name="grantsStatus[]" value="">
                            <input type="hidden" name="Day_Remark[]" value="<?php echo $val['Day_Remark'];?>">
                            <input type="hidden" name="Recog_Type[]" value="<?php echo $val['Recog_Type'];?>">
                            <input type="hidden" name="Child_1_Base_ID[]" value="<?php echo $val['ID'];?>">
                            <input type="hidden" name="fromChange[]" value="<?php echo $val['fromChange'];?>">
                        
							<td><a href="<?php echo URL::site('list/monDetail').URL::query(array('ID'=>$val['ID'],'yearMon'=>$Y.'-'.$m));?>"><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" /></a></td>
							<td><input class="edit" type="button" <?php echo empty($dayParameter)?'':'disabled';?> value="編集" onClick="changeDayMsg2(this)" /></td>
							<td><?php echo $val['FamilyName'];?><p><?php echo $val['FamilyName_Spell'];?></p></td>
							<td><?php echo $val['GivenName'];?><p><?php echo $val['GivenName_Spell'];?></p></td>
							<td><?php if($val['Sex']=='2'){echo '女';}if($val['Sex']=='1'){echo '男';}?></td>
							<td><?php echo empty($val['Recog_Type'])?'':$parameter['BASE_INFO']['Recog_Type'][$val['Recog_Type']] ; ?></td>
							<td class="inTime"><?php echo $val['In_Time'];?></td>
							<td class="outTime"><?php echo $val['Out_Time'];?></td>
							<td class="onTime"><?php echo $val['On_Time'];?></td>
							<td class="delayedTimes"><?php echo $val['Delayed_Times'];?></td>
							<td class="usuallyTimes"><?php echo $val['Usually_Times'];?></td>
							<td class="extensionTimes"><?php echo $val['Extension_Times'];?></td>
							<td class="allTimes"><?php echo $val['All_Times'];?></td>
							<td class="showStatus"><?php echo $val['showStatus'];?></td>
							<td class="t02 dayRemark"><?php echo $val['Day_Remark'];?></td>
						</tr>
						<?php }}?>											
					</tbody>
				</table>				
			</div>
		</div>	
	</div>
	</form>
    
    <div id="zhezhao" class="ui-overlay" style="display:none;">
		<div class="ui-widget-overlay" style="z-index:100;"></div>
		<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 812px; height: 222px; position: fixed;"></div>
	</div>
    <div id="Msg1" style="z-index:102;position: fixed; width:790px;height:200px;padding:10px;display:none;" class="ui-widget ui-widget-content ui-corner-all">
        <div style="position:absolute;top:-15px;right:-15px;">
            <a href="javascript:void(0);" onClick="msgHide()"><img src="../../media/images/ctb01.png"/></a>
        </div>
        <div class="ui-dialog-content ui-widget-content" style="background: none; border: 0;">
            <div class="layerbox">
                <div class="maintable xmaintable8 xmaintable82">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td class="blue">日にち</td>
                                <td class="blue">曜日</td>
                                <td width="10%">登園<br/>時間</td>
                                <td width="10%">降園<br/>時間</td>
                                <td width="10%">在園<br/>時間</td>
                                <td class="green">課外活動</td>
                                <td class="green">バス利用<br/>（行き）</td>
                                <td class="green">バス利用<br/>（帰り）</td>
                                <td class="t02">備考</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $d;?></td>
                                <td><?php if(substr($week,0,3)=='土'){echo '<font color="blue">'.substr($week,0,3).'</font>';}elseif (substr($week,0,3)=='日'){echo '<font color="red">'.substr($week,0,3).'</font>';}else{echo substr($week,0,3);}?></td>
                                <td><input type="text" class="xtxt01" name="msg_In_Time" value="" onChange="changeTime(this)"></td>
                                <td><input type="text" class="xtxt01" name="msg_Out_Time" value="" onChange="changeTime(this)"></td>
                                <td><input type="text" class="xtxt01" name="msg_On_Time" value="" readonly></td>
                                <td><input name="msg_Activity_Checked" class="xcheckbox01" type="checkbox" value="1"/></td>
                                <td><input name="msg_BusCome_Checked" class="xcheckbox01" type="checkbox" value="1"/></td>
                                <td><input name="msg_BusGo_Checked" class="xcheckbox01" type="checkbox" value="1"/></td>
                                <td class="t02"><input type="text" class="xtxt01" style="width:100px;" name="msg_Day_Remark" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="xlabut">
                    <input type="button" class="but01" value="編 集" id="submitMsg1"/>
                    <input type="button" class="but01" value="戻 る" onClick="msgHide()"/>
                </div>
            </div>
        </div>
    </div>
    <div id="Msg2" style="z-index:102;position: fixed; width:790px;height:200px;padding:10px;display:none;" class="ui-widget ui-widget-content ui-corner-all">
        <div style="position:absolute;top:-15px;right:-15px;">
            <a href="javascript:void(0);" onClick="msgHide()"><img src="../../media/images/ctb01.png"/></a>
        </div>
        <div class="ui-dialog-content ui-widget-content" style="background: none; border: 0;">
            <div class="layerbox">
                <div class="maintable xmaintable8 xmaintable82">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <td class="blue">日にち</td>
                                <td class="blue">曜日</td>
                                <td width="15%">登園<br/>時間</td>
                                <td width="15%">降園<br/>時間</td>
                                <td width="15%">在園<br/>時間</td>
                                <td class="t02">備考</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $d;?></td>
                                <td><?php if(substr($week,0,3)=='土'){echo '<font color="blue">'.substr($week,0,3).'</font>';}elseif (substr($week,0,3)=='日'){echo '<font color="red">'.substr($week,0,3).'</font>';}else{echo substr($week,0,3);}?></td>
                                <td><input type="text" class="xtxt02" name="msg_In_Time" value="" onChange="changeTime(this)"></td>
                                <td><input type="text" class="xtxt02" name="msg_Out_Time" value="" onChange="changeTime(this)"></td>
                                <td><input type="text" class="xtxt02" name="msg_On_Time" value="" readonly></td>
                                <td class="t02"><input type="text" class="xtxt02" style="width:150px;" name="msg_Day_Remark" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="xlabut">
                    <input type="button" class="but01" value="編 集" id="submitMsg2" />
                    <input type="button" class="but01" value="戻 る" onClick="msgHide()"/>
                </div>
            </div>
        </div>
    </div>
    <!--  
    <div style="color:#f00;height:16px; line-height:16px;width:1200px;margin:0 auto;">
    	<div style="float:right;margin-left:2px;">データ編集あり</div>
        <div style="float:right;margin-left:5px;">※</div>
        <div style="background:#ffdfe2;float:right;width:30px;height:16px; vertical-align:middle;"></div>
        <div class="clear"></div>
    </div>
    -->
    
    <!--弹出框  -->
		 <div id="tishi" class="ui-overlay" style="display:none;">
			<div class="ui-widget-overlay" style="z-index:100;"></div>
			<div id="overlayBg" class="ui-widget-shadow ui-corner-all" style="z-index:101;width: 812px; height: 222px; position: fixed;"></div>
		</div>
         <div class="dialog xnolist" style="display:none;" >
			<a href="javascript:void(0)" onclick="hideNotice()" style="position:absolute;top:-13px;right:-13px;"><img src="<?php echo $media;?>images/ctb01.png"/></a>
			<div id="noticeCont" class="xnolist" style="height:170px;text-align:left">
				<p style="text-align:center;padding:30px 0 40px 0;font-size:16px;">登降園時間を再取得しますか？</p>
				<p style="text-align:center;"><input type="button" style="width:80px;margin:0 10px;" value="はい" onclick="reGET()" > <input type="button" style="width:80px;margin:0 10px;" value="いいえ" onclick="hideNotice()"></p>
			</div>
		</div>
	
<script type="text/javascript">
$(function(){		   
	$('#searchForm').validationEngine('attach');
	$('#search input[type="text"]').on('change',this,function(){getChangeSearch()});
	$('#search select').on('change',this,function(){getChangeSearch()});
	<?php if(empty($dayParameter)){?>
	$('#search input[type="checkbox"]').on('click',this,function(){changeSearch()});
	<?php }?>
	var wH = $(window).height();
	var wW = $(window).width();
	$('#overlayBg').css({'left':((wW-790)/2)+'px','top':((wH-200)/2)+'px'})
	$('#Msg1').css({'left':((wW-790)/2)+'px','top':((wH-200)/2)+'px'})
	$('#Msg2').css({'left':((wW-790)/2)+'px','top':((wH-200)/2)+'px'})

	<?php if(!empty($dayParameter)){?>
		$('#reGET').attr('onclick','showNotice()');
		$('.edit').attr("disabled","true");
	<?php }?>
	
});
function switchTab(n){ 
   <?php foreach ($parameter['BASE_INFO']['Recog_Type'] as $key =>$val){?> 
		document.getElementById("tab_"+"<?php echo $key?>").className = "";  
		document.getElementById("tab_con_"+"<?php echo $key?>").style.display = "none";  
	<?php }?>
	document.getElementById("tab_" + n).className = "cn";  
	document.getElementById("tab_con_" + n).style.display = "table";
} 
function getChangeSearch()
{
	var txt_Day_Y = $('#search input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#search select[name="select_Day_M"]').val();
	var select_Day_D = $('#search select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	location.href="<?php echo URL::site('list/checkList').URL::query(array('yearMonDay'=>NULL,'reGET'=>NULL));?>&yearMonDay="+yearMonDay;
}
function changeSearch(){
	$('#searchForm').prop('action','<?php echo URL::site('list/checkList').URL::query();?>').submit();
}

function showNotice(){
	$('#tishi').show(500);
	$('.dialog').show(500);
}
function hideNotice(){
	$('#tishi').hide(500);
	$('.dialog').hide(500);
}

function reGET(){
	var txt_Day_Y = $('#search input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#search select[name="select_Day_M"]').val();
	var select_Day_D = $('#search select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}

	$('.titletop01').removeClass('bgblack');
	$('#title').html('未確定');
	
	$('.xdatetxt08').removeClass('bgblack');
	$('#suggestion').html('登降園データが確定されていません。<br/>休日設定および登降園時刻などを確認し、<br/>保存ボタンを押下してデータを確定させて下さい。');

	hideNotice();
	
	$("#reGET").css("background-color","#fff");

	$('.edit').removeAttr("disabled");
	
}

function reGET1(){

	var txt_Day_Y = $('#search input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#search select[name="select_Day_M"]').val();
	var select_Day_D = $('#search select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	var data='yearMonDay='+yearMonDay;
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/delReGetInvice');?>",
		   cache: false,
		   dataType: 'json',
		   data: data,
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			  			 
			if(!json['result']){
				alert('再取得失败');	
			};	
			location.reload();			
		   }		  			
		});	
}
function formSubmit(){
	$('#btn_Save').attr('disabled',"true");
	$.ajax({
		   type: "POST",
		   url: "<?php echo URL::site('list/checkListUpdate');?>",
		   cache: false,
		   dataType: 'json',
		   data: $('#searchForm').serialize(),
		   error: function(){alert('ajaxエラー');},
		   success: function(json){
			  			 
		   addSaveOverlay(1000,400,json['result']);					
		   }		  			
		});
	
}
function msgHide(){
	$('#zhezhao').hide(500);
	$('#Msg1').hide(500);
	$('#Msg2').hide(500);
}
function changeDayMsg1(obj)
{
	$('#zhezhao').show(500);
	$('#Msg1').show(500);
	var tr = $(obj).parent().parent(); 
	var Child_1_Base_ID = tr.find('input[name="Child_1_Base_ID[]"]').val(); 
	var In_Time = tr.find('input[name="In_Time[]"]').val(); 
	var Out_Time = tr.find('input[name="Out_Time[]"]').val(); 
	var On_Time = tr.find('input[name="On_Time[]"]').val();
	var Activity_Checked = tr.find('input[name="Activity_Checked[]"]').val(); 
	var BusCome_Checked = tr.find('input[name="BusCome_Checked[]"]').val(); 
	var BusGo_Checked = tr.find('input[name="BusGo_Checked[]"]').val(); 
	var Recog_Type = tr.find('input[name="Recog_Type[]"]').val();
	var Day_Remark = tr.find('input[name="Day_Remark[]"]').val();
	
	var chk_holidays = $('input[name="chk_holidays"]').prop('checked')
	
	
	$('#Msg1 input[name="msg_In_Time"]').val(In_Time);
	$('#Msg1 input[name="msg_Out_Time"]').val(Out_Time);
	$('#Msg1 input[name="msg_On_Time"]').val(On_Time);
	var msg_Activity_Checked = Activity_Checked=='1'?true:false;
	$('#Msg1 input[name="msg_Activity_Checked"]').prop('checked',msg_Activity_Checked).off('click');
	if(Recog_Type=='R1'&&chk_holidays){		
		$('#Msg1 input[name="msg_Activity_Checked"]').on('click',this,function(){return false;})
	}
	var msg_BusCome_Checked = BusCome_Checked=='1'?true:false;
	$('#Msg1 input[name="msg_BusCome_Checked"]').prop('checked',msg_BusCome_Checked);
	var msg_BusGo_Checked = BusGo_Checked=='1'?true:false;
	$('#Msg1 input[name="msg_BusGo_Checked"]').prop('checked',msg_BusGo_Checked)	
	$('#Msg1 input[name="msg_Day_Remark"]').val(Day_Remark);
	
	$('#submitMsg1').off('click').on('click',this,function(){
		var msg_In_Time = $('#Msg1 input[name="msg_In_Time"]').val();
		var msg_Out_Time = $('#Msg1 input[name="msg_Out_Time"]').val();
		var msg_Activity_Checked = $('#Msg1 input[name="msg_Activity_Checked"]').prop('checked')?1:0;
		var msg_BusCome_Checked = $('#Msg1 input[name="msg_BusCome_Checked"]').prop('checked')?1:0;
		var msg_BusGo_Checked = $('#Msg1 input[name="msg_BusGo_Checked"]').prop('checked')?1:0;	
		var msg_Day_Remark = $('#Msg1 input[name="msg_Day_Remark"]').val()
		ajaxChangeDayDetail(tr,Recog_Type,msg_In_Time,msg_Out_Time,msg_Activity_Checked,msg_BusCome_Checked,msg_BusGo_Checked,msg_Day_Remark)
	});
}
function changeDayMsg2(obj)
{
	$('#zhezhao').show(500);
	$('#Msg2').show(500);
	var tr = $(obj).parent().parent();	
	var Child_1_Base_ID = tr.find('input[name="Child_1_Base_ID[]"]').val(); 
	var In_Time = tr.find('input[name="In_Time[]"]').val(); 
	var Out_Time = tr.find('input[name="Out_Time[]"]').val(); 
	var On_Time = tr.find('input[name="On_Time[]"]').val();	
	var Recog_Type = tr.find('input[name="Recog_Type[]"]').val();
	var Day_Remark = tr.find('input[name="Day_Remark[]"]').val();	
		
	$('#Msg2 input[name="msg_In_Time"]').val(In_Time);
	$('#Msg2 input[name="msg_Out_Time"]').val(Out_Time);
	$('#Msg2 input[name="msg_On_Time"]').val(Out_Time);	
	$('#Msg2 input[name="msg_Day_Remark"]').val(Day_Remark);
	
	$('#submitMsg2').off('click').on('click',this,function(){
		var msg_In_Time = $('#Msg2 input[name="msg_In_Time"]').val();
		var msg_Out_Time = $('#Msg2 input[name="msg_Out_Time"]').val();
		var msg_Day_Remark = $('#Msg1 input[name="msg_Day_Remark"]').val()
		ajaxChangeDayDetail(tr,Recog_Type,msg_In_Time,msg_Out_Time,0,0,0,msg_Day_Remark);
	});
}

function ajaxChangeDayDetail(tr,Recog_Type,msg_In_Time,msg_Out_Time,msg_Activity_Checked,msg_BusCome_Checked,msg_BusGo_Checked,msg_Day_Remark)
{
		
	var isholidays = $('input[name="chk_holidays"]').prop('checked')?1:0;
	var isLongHoliday = $('input[name="chk_longHoliday"]').prop('checked')?1:0;
	
	var data = 'yearMonDay=<?php echo $yearMonDay;?>&Recog_Type='+Recog_Type+'&inTime='+msg_In_Time+'&outTime='+msg_Out_Time+'&activity_chk='+msg_Activity_Checked+'&msg_BusCome_Checked='+msg_BusCome_Checked+'&msg_BusGo_Checked='+msg_BusGo_Checked+'&isholidays='+isholidays+'&isLongHoliday='+isLongHoliday;	

	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('list/changeDayDetail');?>",
	   cache: false,
	   dataType: 'json',
	   data: data,
	   error: function(){alert('ajaxエラー');},
	   success: function(json){
			if(json.result){
				//登園時間	降園時間		在園時間	延長保育			所定保育時間	ステータス 	備考	
				//.inTime	.outTime	.onTime	.extensionTimes	.allTimes	.showStatus	.dayRemark
				tr.find('.inTime').html(msg_In_Time);
				tr.find('.outTime').html(msg_Out_Time);
				tr.find('.onTime').html(json.On_Time);				
				tr.find('.extensionTimes').html(json.Extension_Times);
				tr.find('.allTimes').html(json.All_Times);
				tr.find('.showStatus').html(json.showStatus);	
				tr.find('.dayRemark').html(msg_Day_Remark);			
				tr.find('input[name="In_Time[]"]').val(msg_In_Time);
				tr.find('input[name="Out_Time[]"]').val(msg_Out_Time);
				tr.find('input[name="On_Time[]"]').val(json.On_Time);				
				tr.find('input[name="Extension_Times[]"]').val(json.Extension_Times);
				tr.find('input[name="All_Times[]"]').val(json.All_Times);
				tr.find('input[name="showStatus[]"]').val(json.showStatus);
				tr.find('input[name="Day_Remark[]"]').val(msg_Day_Remark);
				
				//1号認定 2号標準 2号時短 三个checkbox框的数据
 				if(Recog_Type=='R1'||Recog_Type=='R2'||Recog_Type=='R2S'){
					tr.find('input[name="Activity_Checked[]"]').val(msg_Activity_Checked); 
					tr.find('input[name="BusCome_Checked[]"]').val(msg_BusCome_Checked); 
					tr.find('input[name="BusGo_Checked[]"]').val(msg_BusGo_Checked);					
					var chk_Activity = msg_Activity_Checked==1?true:false;
					tr.find('input[name="chk_Activity"]').prop('checked',chk_Activity);
					var chk_BusCome = msg_BusCome_Checked==1?true:false;
					tr.find('input[name="chk_BusCome"]').prop('checked',chk_BusCome);
					var chk_BusGo = msg_BusGo_Checked==1?true:false;
					tr.find('input[name="chk_BusGo"]').prop('checked',chk_BusGo);	
				}
				
				//.studyTimes	.grantsTimes	.grantsStatus	
				//教育時間		補助金対象		時間区分			
				if(Recog_Type=='R1'){
					tr.find('.studyTimes').html(json.Study_Times);
					tr.find('.grantsTimes').html(json.Grants_Times);
					tr.find('.grantsStatus').html(json.grantsStatus);
					tr.find('input[name="Study_Times[]"]').val(json.Study_Times);
					tr.find('input[name="Grants_Times[]"]').val(json.Grants_Times);	
					tr.find('input[name="grantsStatus[]"]').val(json.grantsStatus);	
				}
				
				//.delayedTimes
				//預かり保育
				if(Recog_Type=='R1'||Recog_Type=='R2S'||Recog_Type=='R3S'){
					tr.find('.delayedTimes').html(json.Delayed_Times);
					tr.find('input[name="Delayed_Times[]"]').val(json.Delayed_Times);
				}
				
				//.usuallyTimes
				//通常保育
				if(Recog_Type=='R2'||Recog_Type=='R2S'||Recog_Type=='R3'||Recog_Type=='R3S'){
					tr.find('.usuallyTimes').html(json.Usually_Times);
					tr.find('input[name="Usually_Times[]"]').val(json.Usually_Times);	
				}
				tr.find('input[name="fromChange[]"]').val(1);
				tr.addClass('hover');					
				msgHide();
			}else{
				alert('SYS異常があります。');
			}
	   }
	});
	
}

document.onkeydown = function (e) {
    var ev = window.event || e;
    var code = ev.keyCode || ev.which;
    if (code == 116) {
        if(ev.preventDefault) {
            ev.preventDefault();
        } else {
            ev.keyCode = 0;
            ev.returnValue = false;
        }
    }
}
</script> 
<style>
 .xmaintable82 table td input.xtxt01 {width:60px;border:none;background:none;}
 .xmaintable82 table td input.xtxt02 {width:90px;border:none;background:none;}
 .maintable table tbody tr.hover { background:#ffdfe2;}
 .maintablebox {padding-bottom:20px;}
 
 .dialog{
	position: fixed;
	_position:absolute;
	z-index:100;
	top: 50%;
	left: 50%;
	margin: -141px 0 0 -201px;
	width: 400px;
	height:200px;
	border:1px solid #CCC;
	line-height: 280px;
	text-align:center;
	font-size: 14px;
	background-color:#F4F4F4;
}	
</style>


<link href="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="<?php echo $media;?>jquery-ui-1.11.4.custom/jquery-ui.js"></script>
</body>
</html>