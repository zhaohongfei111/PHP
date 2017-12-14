<?php
echo View::factory('public/head');
?>
<body>    
    <?php
	$logoHtml = '<div class="topright topright01 right">
					<p><a href="'.URL::site('daycheck/dayCheckDetail').URL::query(array('yearMonDay'=>$yearMonDay)).'"><input type="button" value="登降園簿の作成画面へ戻る" /></a>
						<a href="'.URL::site('list/listNapTempIndex').URL::query(array('yearMonDay'=>NULL,'class'=>NULL)).'"><input type="button" value="午睡チェックメニューへ戻る" /></a></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox01')
			->set('logoHtml',$logoHtml);	
	?>
	
	<div class="mainbox">
		<div class="pagetop">
			<div class="topleft topleft01 left">
				<div class="listbut listbut18"><a style="background:#ffd966;">室温・湿度チェック</a></div>
				<div class="datelist datelist18">
					<form id="searchForm" action="" method="post" >
                    <ul>
                    	<?php
                        list($Y,$m,$d) = explode('-',$yearMonDay);
						?>
						<li><span style="width:60px;">日　付</span><input name="txt_Day_Y" type="text" class="txt01 validate[required,custom[integer],min[2000],max[<?php echo date('Y');?>]]" style="width:60px;" value="<?php echo $Y;?>"><em>年</em>
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
							<input type="text" class="txt01" style="width:50px;" value="<?php echo $week;?>" /><em>日</em>
						</li>
					</ul>
                    </form>
				</div>
			</div>
			
			<div class="toprighttxt right">
				<h3>午睡チェックポイント</h3>
				<div class="txt01 left">
					<p>① 呼吸の確認(息づかい、咳、いびき)<br/>
					② 顔色<br/>
					③ 触診(体温、異常な発汗、湿疹の有無)</p>
				</div>
				<div class="txt01 right">
					<p>④ 仰向け寝、寝具の状態<br/>
					⑤ その他(室温、湿度、冷気、暖気の状態)</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="maintablebox">
			<div class="maintabletop fmaintabletop01" style="margin-top:15px;">
				<ul>
					<?php foreach ($class as $key =>$val){?>
						<li id=<?php echo 'tab_'.$key?> <?php if($key=='C1'){echo 'class="cn"';}?>  ><a href="javascript:switchTab('<?php echo $key?>')"><?php echo $val['name'];?></a></li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>    
			        
			<div class="maintable maintable18 fxmaintable8">
            	<?php
                if($SELLEVEL!='Reader'){
				?>
				<div class="mbut18 mbutf18" style="padding-bottom:0;">
					<a href="javascript:void(0);" style="padding:5px 120px;background:#70ad47;" onClick="formSubmit()">保 存 す る</a>
				</div>
                <?php
				}
				?>
				<div class="matablebox left">
                	<?php
					if($SELLEVEL!='Reader'){
					?>
					<div class="mbut18 mbutf18">
						<a href="javascript:void(0);" style="background:#4472c4;" onClick="addTemp();">チェック枠の追加</a>
					</div>
                    <?php
					}
					?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
                    	<colgroup>
                        	<col width="10%"></col>
                            <col width="30%"></col>
                            <col width="30%"></col>
                            <col width="30%"></col>
                        </colgroup>
						<thead>
							<tr>
								<td class="tt02">NO.</td>
                                <td>室温 チェック時間</td>
                                <td>室温</td>
                                <td>確認者(アカウント)</td>
							</tr>
						</thead>
                        <?php
						foreach($class as $key =>$val){							
						?>
						<tbody class="c_<?php echo $key;?>"  <?php if($key!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>>
                        	<?php
                        	$count_temp=count($val['temp']);
                        	$count_temp=$count_temp<3?3:$count_temp;
                        	$No_temp=0;
                            foreach($val['temp'] as $key_l=>$val_l){
								$No_temp++;
							?>
							<tr>
								<td class="tt02"><?php echo $key_l+1;?></td>
                                <td>
                                	<input name="hidden_temp_id[]" type="hidden" value="<?php echo $val_l['ID'];?>">
                                	<input name="txt_temp_Time[]" type="text" class="txt01" value="<?php echo $val_l['Time'];?>"/>
                                </td>
                                <td>
                                	<?php
                                    list($n,$m) = explode('.',$val_l['Temperature']);
									?>
                                	<select name="select_temp1[]" class="select01">
                                		<option value=""></option>
                                        <?php for($i=20;$i<41;$i++){?>
                                        <option value="<?php echo $i;?>" <?php if($n==$i&&$n!='') echo 'selected';?>><?php echo $i;?></option>
                                        <?php }?>
                                    </select>
                                    ・
                                    <select name="select_temp2[]" class="select01">
                                    	<option value=""></option>
                                    	<?php for($i=0;$i<10;$i++){?>
                                        <option value="<?php echo $i;?>" <?php if($m==$i&&$m!='') echo 'selected';?>><?php echo $i;?></option>
                                        <?php }?>
                                   	</select>℃
                                    </td>
                                    <td><?php echo $val_l['User_Id'];?></td>
							</tr>
                            <?php
							}
							?>	
							
							<?php for($j=$No_temp+1;$j<=$count_temp;$j++){?>
								<tr>
								<td class="tt02"><?php echo $j;?></td>
                                <td>
                                	<input name="hidden_temp_id[]" type="hidden" value="">
                                	<input name="txt_temp_Time[]" type="text" class="txt01" value=""/>
                                </td>
                                <td>
                                	<select name="select_temp1[]" class="select01">
                                		<option value=""></option>
                                        <?php for($i=20;$i<41;$i++){?>
                                        <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                                        <?php }?>
                                    </select>
                                    ・
                                    <select name="select_temp2[]" class="select01">
                                    	<option value=""></option>
                                    	<?php for($i=0;$i<10;$i++){?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php }?>
                                   	</select>℃
                                    </td>
                                    <td><?php echo $Check_USERID;?></td>
							</tr>														
							<?php }?>						
						</tbody>
                        <?php
						}
						?>
					</table>
				</div>
				<div class="matablebox matablebox18 right">
                	<?php
					if($SELLEVEL!='Reader'){
					?>
					<div class="mbut18 mbutf18">
						<a href="javascript:void(0);" style="background:#ed7d31;" onClick="addHumidity();">チェック枠の追加</a>
					</div>
                    <?php
					}
					?>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
                    	<colgroup>
                        	<col width="10%"></col>
                            <col width="30%"></col>
                            <col width="30%"></col>
                            <col width="30%"></col>
                        </colgroup>
						<thead>
							<tr>
								<td class="tt02">NO.</td>
                                <td>湿度 チェック時間</td>
                                <td>湿度</td>
                                <td>確認者(アカウント)</td>
							</tr>
						</thead>
                        <?php

						foreach($class as $key =>$val){						
						?>
						<tbody class="c_<?php echo $key;?>" <?php if($key!='C1'){echo 'style="display:none"';}else {echo 'style="display:table-row-group"';}?>> 
                        	<?php
                        	$count_humidity=count($val['humidity']);
                        	$count_humidity=$count_humidity<3?3:$count_humidity;
                        	$No_humidity=0;
                            foreach($val['humidity'] as $key_l=>$val_l){$No_humidity++;
							?>                       	
							<tr>
								<td class="tt02"><?php echo $key_l+1;?></td>
                                <td>
                                	<input name="hidden_humidity_id[]" type="hidden" value="<?php echo $val_l['ID'];?>">
                                    <input name="txt_humidity_Time[]" type="text" class="txt02" value="<?php echo $val_l['Time'];?>"/>
                                </td>
                                <td><select name="select_humidity[]" class="select01">
                                		<option value=""></option>
                                        <?php for($i=40;$i<101;$i++){?>
                                        <option value="<?php echo $i;?>" <?php if($val_l['Humidity']==$i&&$val_l['Humidity']!='') echo 'selected';?>><?php echo $i;?></option>
                                        <?php }?>
                                    </select>%
                                </td>
                                <td><?php echo $val_l['User_Id'];?></td>
							</tr> 
                            <?php
							}
							?>  
							
							<?php for($k=$No_humidity+1;$k<=$count_humidity;$k++){?>
							<tr>
								<td class="tt02"><?php echo $k?></td>
                                <td>
                                	<input name="hidden_humidity_id[]" type="hidden" value="">
                                    <input name="txt_humidity_Time[]" type="text" class="txt02" value=""/>
                                </td>
                                <td><select name="select_humidity[]" class="select01">
                                		<option value=""></option>
                                        <?php for($i=40;$i<101;$i++){?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php }?>
                                    </select>%
                                </td>
                                <td><?php echo $Check_USERID;?></td>
							</tr> 
							<?php }?>                     
						</tbody>
                        <?php }?>
					</table>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
	$('#searchForm').validationEngine('attach');
	$('#searchForm input[type="text"]').on('change',this,function(){getChangeSearch()});
	$('#searchForm select').on('change',this,function(){getChangeSearch()});
	
	$('tbody input[type="text"]').on('click',function(){
		setTimes(this);
	});
});

function setTimes(obj){
	if($(obj).val()==""){
		var myDate = new Date();
		var hours = myDate.getHours();  
		var minutes = myDate.getMinutes(); 
		$(obj).val(checkTime(hours)+':'+checkTime(minutes));
	}
}

function checkTime(i)
{
	if (i<10){i="0" + i}
  	return i
}

function getChangeSearch()
{
	var txt_Day_Y = $('#searchForm input[name="txt_Day_Y"]').val();
	var select_Day_M = $('#searchForm select[name="select_Day_M"]').val();
	var select_Day_D = $('#searchForm select[name="select_Day_D"]').val();
	var Y = parseInt(txt_Day_Y);
	if(Y<2000||Y><?php echo date('Y');?>){
		return false;	
	}
	var yearMonDay = txt_Day_Y + '-' + select_Day_M + '-' + select_Day_D;	
	location.href="<?php echo URL::site('list/listTempCheck').URL::query(array('yearMonDay'=>NULL));?>&yearMonDay="+yearMonDay;
}

function switchTab(n){  
	for(var i = 1; i <= <?php echo count($class);?>; i++){  
		$("#tab_C" + i).removeClass();
		$(".c_C"+i).hide();  
	}  
	$("#tab_" + n).addClass('cn');
	$(".c_"+n).css("display","table-row-group");
	
}
function addTemp(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');	
	var tmpNo = tmpId.substring(4);
	var key = $(".c_"+tmpNo+':eq(0) tr').length + 1;
	var html = '<tr><td class="tt02">'+key+'</td><td><input name="hidden_temp_id[]" type="hidden" value=""><input name="txt_temp_Time[]" type="text" class="txt01" value=""/></td><td><select name="select_temp1[]" class="select01"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option></select> ・  <select name="select_temp2[]" class="select01"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select>℃	</td><td><?php echo $Check_USERID;?></td></tr>'
	$(".c_"+tmpNo+':eq(0)').append(html).find('input[type="text"]:last').on('click',function(){setTimes(this);});
}
function addHumidity(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');	
	var tmpNo = tmpId.substring(4);
	var key = $(".c_"+tmpNo+':eq(1) tr').length + 1;
	var html = '<tr><td class="tt02">'+key+'</td><td><input name="hidden_humidity_id[]" type="hidden" value=""><input name="txt_humidity_Time[]" type="text" class="txt02" value=""/></td><td><select name="select_humidity[]" class="select01"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option></select>%</td><td><?php echo $Check_USERID;?></td></tr>'
	$(".c_"+tmpNo+':eq(1)').append(html).find('input[type="text"]:last').on('click',function(){setTimes(this);});
	
}

function formSubmit(){
	var tmpId = $('.maintabletop').find('li.cn').attr('id');	
	var tmpNo = tmpId.substring(4);
	var data = $(".c_"+tmpNo+' input').serialize()+'&'+$(".c_"+tmpNo+' select').serialize()+'&yearMonDay=<?php echo $yearMonDay;?>&class='+tmpNo;
	
	if($(".c_"+tmpNo+' tr').length<1) return false;
	
	$.ajax({
	   type: "POST",
	   url: "<?php echo URL::site('list/listTempCheckUpdate');?>",
	   cache: false,
	   dataType: 'json',
	   //dataType: 'html',
	   data: data,
	   error: function(){alert('ajaxエラー');},
	   success: function(json){
		   addSaveOverlay(1000,400,json['result']);
	   }
	});
}
</script>
</body>
</html>