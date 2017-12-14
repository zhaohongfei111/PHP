<?php
echo View::factory('public/head');
?>
<body>
	<?php
	$logohtml = '<div class="topright topright01 right">
					<p><a href="javascript::void()" onClick="window.open(\'about:blank\',\'_self\'); window.close();"><input type="button" value="このページを閉じる" /></a></p>
				</div>';
	echo View::factory('public/header')
			->set('headerboxClass','headerbox')
			->bind('logoHtml',$logohtml);
	?>
	
	<div class="mianbox">
		<div class="content">
			<div class="datebox">
				<div class="tit01">
					<h2>オプションメニュー</h2>
					<h3>和暦西暦対照表</h3>
				</div>
				<div class="databox02">
					<div class="tablebox01 left">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>西 暦</td><td>和 暦</td></tr>
							</thead>
							<tbody>
								<tr><td>1900年</td><td>明治33年</td></tr>
								<tr><td>1901年</td><td>明治34年</td></tr>
								<tr><td>1902年</td><td>明治35年</td></tr>
								<tr><td>1903年</td><td>明治36年</td></tr>
								<tr><td>1904年</td><td>明治37年</td></tr>
								<tr><td>1905年</td><td>明治38年</td></tr>
								<tr><td>1906年</td><td>明治39年</td></tr>
								<tr><td>1907年</td><td>明治40年</td></tr>
								<tr><td>1908年</td><td>明治41年</td></tr>
								<tr><td>1909年</td><td>明治42年</td></tr>
								<tr><td>1910年</td><td>明治43年</td></tr>
								<tr><td>1911年</td><td>明治44年</td></tr>
								<tr><td>1912年</td><td>明治45年</td></tr>
								<tr><td>1913年</td><td>大正2年</td></tr>
								<tr><td>1914年</td><td>大正3年</td></tr>
								<tr><td>1915年</td><td>大正4年</td></tr>
								<tr><td>1916年</td><td>大正5年</td></tr>
								<tr><td>1917年</td><td>大正6年</td></tr>
								<tr><td>1918年</td><td>大正7年</td></tr>
								<tr><td>1919年</td><td>大正8年</td></tr>
								<tr><td>1920年</td><td>大正9年</td></tr>
								<tr><td>1921年</td><td>大正10年</td></tr>
								<tr><td>1922年</td><td>大正11年</td></tr>
								<tr><td>1923年</td><td>大正12年</td></tr>
								<tr><td>1924年</td><td>大正13年</td></tr>
								<tr><td>1925年</td><td>大正14年</td></tr>
								<tr><td>1926年</td><td>大正15年</td></tr>
								<tr><td>1927年</td><td>昭和2年</td></tr>
								<tr><td>1928年</td><td>昭和3年</td></tr>
								<tr><td>1929年</td><td>昭和4年</td></tr>
								<tr><td>1930年</td><td>昭和5年</td></tr>
								<tr><td>1931年</td><td>昭和6年</td></tr>
								<tr><td>1932年</td><td>昭和7年</td></tr>
								<tr><td>1933年</td><td>昭和8年</td></tr>
								<tr><td>1934年</td><td>昭和9年</td></tr>
								<tr><td>1935年</td><td>昭和10年</td></tr>
								<tr><td>1936年</td><td>昭和11年</td></tr>
								<tr><td>1937年</td><td>昭和12年</td></tr>
								<tr><td>1938年</td><td>昭和13年</td></tr>
								<tr><td>1939年</td><td>昭和14年</td></tr>
								<tr><td>1940年</td><td>昭和15年</td></tr>
								<tr><td>1941年</td><td>昭和16年</td></tr>
								<tr><td>1942年</td><td>昭和17年</td></tr>
								<tr><td>1943年</td><td>昭和18年</td></tr>
								<tr><td>1944年</td><td>昭和19年</td></tr>
								<tr><td>1945年</td><td>昭和20年</td></tr>
								<tr><td>1946年</td><td>昭和21年</td></tr>
								<tr><td>1947年</td><td>昭和22年</td></tr>
							</tbody>
						</table>
					</div>
					<div class="tablebox01 left">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>西 暦</td><td>和 暦</td></tr>
							</thead>
							<tbody>
								<tr><td>1948年</td><td>昭和23年</td></tr>
								<tr><td>1949年</td><td>昭和24年</td></tr>
								<tr><td>1950年</td><td>昭和25年</td></tr>
								<tr><td>1951年</td><td>昭和26年</td></tr>
								<tr><td>1952年</td><td>昭和27年</td></tr>
								<tr><td>1953年</td><td>昭和28年</td></tr>
								<tr><td>1954年</td><td>昭和29年</td></tr>
								<tr><td>1955年</td><td>昭和30年</td></tr>
								<tr><td>1956年</td><td>昭和31年</td></tr>
								<tr><td>1957年</td><td>昭和32年</td></tr>
								<tr><td>1958年</td><td>昭和33年</td></tr>
								<tr><td>1959年</td><td>昭和34年</td></tr>
								<tr><td>1960年</td><td>昭和35年</td></tr>
								<tr><td>1961年</td><td>昭和36年</td></tr>
								<tr><td>1962年</td><td>昭和37年</td></tr>
								<tr><td>1963年</td><td>昭和38年</td></tr>
								<tr><td>1964年</td><td>昭和39年</td></tr>
								<tr><td>1965年</td><td>昭和40年</td></tr>
								<tr><td>1966年</td><td>昭和41年</td></tr>
								<tr><td>1967年</td><td>昭和42年</td></tr>
								<tr><td>1968年</td><td>昭和43年</td></tr>
								<tr><td>1969年</td><td>昭和44年</td></tr>
								<tr><td>1970年</td><td>昭和45年</td></tr>
								<tr><td>1971年</td><td>昭和46年</td></tr>
								<tr><td>1972年</td><td>昭和47年</td></tr>
								<tr><td>1973年</td><td>昭和48年</td></tr>
								<tr><td>1974年</td><td>昭和49年</td></tr>
								<tr><td>1975年</td><td>昭和50年</td></tr>
								<tr><td>1976年</td><td>昭和51年</td></tr>
								<tr><td>1977年</td><td>昭和52年</td></tr>
								<tr><td>1978年</td><td>昭和53年</td></tr>
								<tr><td>1979年</td><td>昭和54年</td></tr>
								<tr><td>1980年</td><td>昭和55年</td></tr>
								<tr><td>1981年</td><td>昭和56年</td></tr>
								<tr><td>1982年</td><td>昭和57年</td></tr>
								<tr><td>1983年</td><td>昭和58年</td></tr>
								<tr><td>1984年</td><td>昭和59年</td></tr>
								<tr><td>1985年</td><td>昭和60年</td></tr>
								<tr><td>1986年</td><td>昭和61年</td></tr>
								<tr><td>1987年</td><td>昭和62年</td></tr>
								<tr><td>1988年</td><td>昭和63年</td></tr>
								<tr><td>1989年</td><td>昭和64年</td></tr>
								<tr><td>1990年</td><td>平成2年</td></tr>
								<tr><td>1991年</td><td>平成3年</td></tr>
								<tr><td>1992年</td><td>平成4年</td></tr>
								<tr><td>1993年</td><td>平成5年</td></tr>
								<tr><td>1994年</td><td>平成6年</td></tr>
								<tr><td>1995年</td><td>平成7年</td></tr>
							</tbody>
						</table>
					</div>
					
					<div class="tablebox01 left">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<thead>
								<tr><td>西 暦</td><td>和 暦</td></tr>
							</thead>
							<tbody>
								<tr><td>1996年</td><td>平成8年</td></tr>
								<tr><td>1997年</td><td>平成9年</td></tr>
								<tr><td>1998年</td><td>平成10年</td></tr>
								<tr><td>1999年</td><td>平成11年</td></tr>
								<tr><td>2000年</td><td>平成12年</td></tr>
								<tr><td>2001年</td><td>平成13年</td></tr>
								<tr><td>2002年</td><td>平成14年</td></tr>
								<tr><td>2003年</td><td>平成15年</td></tr>
								<tr><td>2004年</td><td>平成16年</td></tr>
								<tr><td>2005年</td><td>平成17年</td></tr>
								<tr><td>2006年</td><td>平成18年</td></tr>
								<tr><td>2007年</td><td>平成19年</td></tr>
								<tr><td>2008年</td><td>平成20年</td></tr>
								<tr><td>2009年</td><td>平成21年</td></tr>
								<tr><td>2010年</td><td>平成22年</td></tr>
								<tr><td>2011年</td><td>平成23年</td></tr>
								<tr><td>2012年</td><td>平成24年</td></tr>
								<tr><td>2013年</td><td>平成25年</td></tr>
								<tr><td>2014年</td><td>平成26年</td></tr>
								<tr><td>2015年</td><td>平成27年</td></tr>
								<tr><td>2016年</td><td>平成28年</td></tr>
								<tr><td>2017年</td><td>平成29年</td></tr>
								<tr><td>2018年</td><td>平成30年</td></tr>
								<tr><td>2019年</td><td>平成31年</td></tr>
								<tr><td>2020年</td><td>平成32年</td></tr>
								<tr><td>2021年</td><td>平成33年</td></tr>
								<tr><td>2022年</td><td>平成34年</td></tr>
								<tr><td>2023年</td><td>平成35年</td></tr>
								<tr><td>2024年</td><td>平成36年</td></tr>
								<tr><td>2025年</td><td>平成37年</td></tr>
								<tr><td>2026年</td><td>平成38年</td></tr>
								<tr><td>2027年</td><td>平成39年</td></tr>
								<tr><td>2028年</td><td>平成40年</td></tr>
								<tr><td>2029年</td><td>平成41年</td></tr>
								<tr><td>2030年</td><td>平成42年</td></tr>
								<tr><td>2031年</td><td>平成43年</td></tr>
								<tr><td>2032年</td><td>平成44年</td></tr>
								<tr><td>2033年</td><td>平成45年</td></tr>
								<tr><td>2034年</td><td>平成46年</td></tr>
								<tr><td>2035年</td><td>平成47年</td></tr>
								<tr><td>2036年</td><td>平成48年</td></tr>
								<tr><td>2037年</td><td>平成49年</td></tr>
								<tr><td>2038年</td><td>平成50年</td></tr>
								<tr><td>2039年</td><td>平成51年</td></tr>
								<tr><td>2040年</td><td>平成52年</td></tr>
								<tr><td>2041年</td><td>平成53年</td></tr>
								<tr><td>2042年</td><td>平成54年</td></tr>
							</tbody>
						</table>
					</div>
					
					<div class="clear"></div>
				</div>
				<div class="pagetxt">
					<h3>＜備考＞</h3>
					<p>1989年の和暦：「昭和64年は1月7日まで、平成元年は1月8日から」</p>
					<P>1926年の和暦：「大正15年は12月24日まで、昭和元年は12月25日から」</P>
					<p>1912年の和暦：「明治45年は7月29日まで、大正元年は7月30日から」</p>
				</div>
				<div class="databut">
					<a href="javascript::void()" onClick="window.open('about:blank','_self'); window.close();"><input type="button" value="このページを閉じる" /></a>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>