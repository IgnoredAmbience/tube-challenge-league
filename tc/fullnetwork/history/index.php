<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="../../default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">&nbsp;Full Network Challenge History</div>
<?php
	include('../../settings.php');
	include('../../menu.php');
	include('../../submenu.php');
?>
<div id="content">
	<h3>&nbsp;</h3>
<p>The following table shows only times which broke the existing record when they were set, and as such is an account of the evolution of the record over time.</p>
<p>This list may be inaccurate whilst dates remain missing from the data.</p>
<h3>Current Configuration</h3>
<p>269 Stations, since March 2008</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="80">Broken on</td>
					<td>By</td>
					<td align="center">Time&nbsp;</td>
					<td width="150">Event</td>
					<td width="60">Held for</td>
				</tr>
				<?php					
					$query = "SELECT * FROM tc_data WHERE tc_challenge in ('269','270') AND tc_fn_station_count is null AND tc_date is not null ORDER BY tc_date, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;
						$prevhr = 19;
						$prevmin = 57;
						$prevsec = 47;
						
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 
						
						if(mktime($fncdata['tc_hours'], $fncdata['tc_mins'], $fncdata['tc_sec']) < mktime($prevhr, $prevmin, $prevsec)){
						if ($fncpos > 1){
						?>
					<td><i><?php $diff = (date("U", strtotime($fncdata['tc_date'])) - $prevdate)/86400; echo round($diff); ?> days</i></td>
				</tr><?php } ?>
				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php echo $fncdata['tc_event']; ?></i></td>
				<?php	$prevhr = $fncdata['tc_hours'];
						$prevmin = $fncdata['tc_mins'];
						$prevsec = $fncdata['tc_sec'];
						$prevdate = date("U", strtotime($fncdata['tc_date']));
					} } ?>
					<td><i><?php $diff = (date("U", strtotime(date("Y-m-d"))) - $prevdate)/86400; echo round($diff); ?> days</i></td>
				</tr>
			</table>
<h3>268 Station Configuration</h3>
<p>December 2007-March 2008</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="80">Broken on</td>
					<td>By</td>
					<td align="center">Time&nbsp;</td>
					<td width="150">Event</td>
					<td width="60">Held for</td>
				</tr>
				<?php					
					$query = "SELECT * FROM tc_data WHERE tc_challenge = '268' AND tc_fn_station_count is null AND tc_date is not null ORDER BY tc_date, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;
						$prevhr = 19;
						$prevmin = 57;
						$prevsec = 47;
						
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 
						
						if(mktime($fncdata['tc_hours'], $fncdata['tc_mins'], $fncdata['tc_sec']) < mktime($prevhr, $prevmin, $prevsec)){
						?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php echo $fncdata['tc_event']; ?></i></td>
					<td><i>103 days</i></td>
					</tr>
				<?php	$prevhr = $fncdata['tc_hours'];
						$prevmin = $fncdata['tc_mins'];
						$prevsec = $fncdata['tc_sec'];
					} } ?>
			</table>
<h3>274/275 Station Configuration</h3>
<p>Until December 2007</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="80">Broken on</td>
					<td>By</td>
					<td align="center">Time&nbsp;</td>
					<td width="150">Event</td>
					<td width="60">Held for</td>
				</tr>
				<?php	mysql_pconnect("localhost","Mcrivpro","password")
					or die("Unable to connect to SQL server");
					mysql_select_db("Mcrivpro") or die("Unable to connect to database"); 
					
					$query = "SELECT * FROM tc_data WHERE tc_challenge in ('274', '275') AND tc_fn_station_count is null AND tc_date is not null ORDER BY tc_date, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;
						$prevhr = 19;
						$prevmin = 57;
						$prevsec = 47;
						
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 
						
						if(mktime($fncdata['tc_hours'], $fncdata['tc_mins'], $fncdata['tc_sec']) < mktime($prevhr, $prevmin, $prevsec)){
						if ($fncpos > 1){
						?>
					<td><i><?php $diff = (date("U", strtotime($fncdata['tc_date'])) - $prevdate)/86400; echo round($diff); ?> days</i></td>
				</tr><?php } ?>
				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php echo $fncdata['tc_event']; ?></i></td>
				<?php	$prevhr = $fncdata['tc_hours'];
						$prevmin = $fncdata['tc_mins'];
						$prevsec = $fncdata['tc_sec'];
						$prevdate = date("U", strtotime($fncdata['tc_date']));
					} } ?>
					<td><i>157 days</i></td>
				</tr>
			</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>