<?php
	include('../settings.php');
	include('../functions.php');
	
	$page_title = "Shopping List";
	$directory_depth = 1;
	$type = "main";
	display_header($page_title, $directory_depth); 
	display_menu($directory_depth);
	display_submenu($type, $directory_depth);
?>
		<div id="content">
			<p>Site is almost ready to go now. Shopping List:</p>
			<ul>
				<li>New times submission system</li>
				<li>Moderation system</li>
				<li><s>Way of highlighting new times in leagues</s></li>
				<li><s>Search functionality</s></li>
				<li>Hit counter/statistics system</li>
				<li><s>Display current date/time so users know if they have cached copy of page or not</s></li>
				<li><s>Last updated time for each league</s></li>
				<li>Trawl forum for missing date/event data - <b>ONGOING</b></li>
				<li>WAP?</li>
				<li><s>Stylesheets (maybe)</s> (dropped)</li>
				<li><s>Other challenges? (Arguably Xmas Park, for example, is more popular than Alphabet. &#8220;More obscure challenges&#8221; submenu?)</s></li>
				<li>Special Characters trap/filter <b>- partially implmented</a></li>
				<li><s>Drop leading 0: if not needed (mainly for ALC)</s></li>
				<li><s>History of record time sections</s></li>
				<ul>
					<li><s>Fix bug with multiple attempts on same day</s></li>
				</ul>
				<li>MORE STATISTICS:
				<ul>
					<li>Lists of longest fastest time reigns (challenge level)</li>
					<li>Events won (person/event level)</li>
				</ul>
				<li>AOB</li>
			</ul>
		</div>
	</body>
</html>