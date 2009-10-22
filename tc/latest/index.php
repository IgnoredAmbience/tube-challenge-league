<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Latest Times&nbsp;</div>
<?php
	include('../settings.php');
	include('../menu.php');
?>
<div id="header4">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr style="text-align: center">
		<td class="header3" width="33%"><a href="/missing/">&#187; Appeal &#171;</a></td>
		<td class="header3" width="34%"><a href="/latest/">&#187; Latest Times &#171;</a></td>
		<td width="33%"><a href="/statistics/">&#187; Statistics &#171;</a></td>
	</tr>
</table>
</div>

<div id="content">
	<h3>&nbsp;</h3>
<p>The following is a list of the 20 most recent times added to the database. <a href="feedme.xml"><img src="feed.png" alt="RSS feed" border="0" /></a></p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="80">&nbsp;Date Added</td>
					<td>Name</td>
					<td width="90">Type&nbsp;</td>
					<td colspan="2" align="center">Time&nbsp;</td>
					<td width="100">Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php					
					$query = "SELECT * FROM tc_data INNER JOIN tc_challenge on tc_data.tc_challenge = tc_challenge.tc_challenge ORDER BY tc_upd_date DESC LIMIT 20";
					$fnc = mysql_query($query) or die("Select Failed! [999]");

					$fncpos = 0;
					
					$rssfile = "<?xml version=\"1.0\" ?>  <rss version=\"0.91\">    <channel>      <title>Tube Challenge League Tables</title>     <link>http://tc.scriv.me.uk/</link>      <description>Latest times submitted to the Tube Challenge database.</description>      <copyright>Copyright 2008 Matthew Scrivin and others.</copyright>     <docs>http://backend.userland.com/rss</docs>";
						
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 				

					$formattedtime = $fncdata['tc_hours'].":";
					if ($fncdata['tc_mins'] < 10){ $formattedtime .= "0"; } 
					$formattedtime .= $fncdata['tc_mins'].":"; 
					if ($fncdata['tc_sec'] < 10){ $formattedtime .= "0"; } 
					$formattedtime .= $fncdata['tc_sec']; 
					
					$morefeed = "<item>        <title>NEW TIME: ".$fncdata['tc_name']."</title>     <link>http://tc.scriv.me.uk/".$fncdata['tc_uri']."/league/</link>        <description><![CDATA[A new time has been submitted to the tube challenge database.<br/><br/>Name: ".$fncdata['tc_name']."<br/>Challenge: ".$fncdata['tc_short_name']."<br/>Time: ".$formattedtime."<br/>Date: ".$fncdata['tc_date']."]]></description>     <pubDate>".$fncdata['tc_upd_date']."</pubDate>      </item>";

					$rssfile .= $morefeed;
						?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><?php echo date("d.m.Y", strtotime($fncdata['tc_upd_date'])); ?>&nbsp;</td>
					<td>&nbsp;<a href="/<?php echo $fncdata['tc_uri']; ?>/league/"><?php echo $fncdata['tc_name']; ?></a>&nbsp;</td>
					<td>&nbsp;<a href="/<?php echo $fncdata['tc_uri']; ?>/league/"><?php echo $fncdata['tc_short_name']; ?></a></td>
					<td align="right" width="75"><?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td width="35" align="center"><?php if(($fncdata['tc_fn_station_count'])){ ?><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)</i><?php } ?></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } 
				
				
				$rssfile .= "    </channel>  </rss>";

				if(!$habdle = fopen('feedme.xml', 'w')){
					print "File open error";
					exit; }

				if (!fwrite($habdle, $rssfile)) {
					print "Cannot write to file ($filename)";
					exit; }
				
				?>
			</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>