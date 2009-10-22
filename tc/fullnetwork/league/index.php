<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Full Network Challenge&nbsp;</div>
<?php
	include('../../settings.php');
	include('../../menu.php');
	include('../../submenu.php');
?>
<div id="content">
	<h3>&nbsp;</h3>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><b>Challenge Details</b></td>
					<td>&nbsp;</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_challenge WHERE tc_challenge = '270'";
					$moo = mysql_query($query) or die("Select Failed! [501]");
					$details = mysql_fetch_array($moo)
					?>
				<tr>
					<td class="row2" width="100">Name:</td>
					<td class="row1" colspan="2"><?php echo $details['tc_challenge_name']; ?></td>
				</tr>
				<tr>
					<td class="row2">Stations:</td>
					<td class="row1" width="100"><?php if($details['tc_station_count'] > 0){ echo $details['tc_station_count']; } else { ?>n/a<?php } ?></td>
					<td class="row1">&nbsp;</td>
				</tr>
				<tr>
					<td class="row2">Description:</td>
					<td class="row1" colspan="2"><?php echo $details['tc_description']; ?></td>
				</tr>
				<tr>
					<td class="row2">Dates:</td>
					<td class="row1" colspan="2"><?php echo $details['tc_dates']; ?></td>
				</tr>
			</table>
<p>Full list of times achieved on the current full network configuration - completed attempts first, followed by incomplete attempts sorted first by number of stations completed, then by time taken.</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td colspan="2" align="center">Time (Stations)&nbsp;</td>
					<td width="100">Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge in ('270', '269') AND tc_fn_station_count is null ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50">&nbsp;</td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr><?php $query = "SELECT * FROM tc_data WHERE tc_challenge in ('269','270') AND tc_fn_station_count is not null ORDER BY tc_fn_station_count desc, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)</i></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td ><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
			</table><br/>
			<hr width="400" />
<h3>Previous Configurations</h3>
<p>Between December 2007 and March 2008 there existed a short-lived configuration of 268 stations, as the system was inbetween the closure of the East London Line, and the opening of the new Heathrow Terminal 5 branch of the Piccadilly Line.</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td colspan="2" align="center">Time (Stations)&nbsp;</td>
					<td width="100">Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge = '268' AND tc_fn_station_count is null ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php }echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50">&nbsp;</td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr><?php $query = "SELECT * FROM tc_data WHERE tc_challenge = '268' AND tc_fn_station_count is not null ORDER BY tc_fn_station_count desc, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php }echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)</i></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td ><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
			</table>
			<hr width="400" />
<p>Until December 2007 the East London Line was part of the Underground network, and so the configuration was one of 275 stations. At various stages Shoreditch and Heathrow Terminal 4 were closed, but could be visited by bus to register a full 275 time. Times set without a visit to these closed stations are included below the main list, and incomplete attempts below that.</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td colspan="2" align="center">Time (Stations)&nbsp;</td>
					<td width="100">Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge = '275' AND tc_fn_station_count is null AND tc_fn274_excluded_station is null ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php }echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50">&nbsp;</td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr><?php $query = "SELECT * FROM tc_data WHERE tc_challenge = '274' AND tc_fn_station_count is null AND tc_fn274_excluded_station is not null ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;
					
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php if($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><i>(<?php echo $fncdata['tc_fn274_excluded_station']; ?>)</i></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td ><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr><?php $query = "SELECT * FROM tc_data WHERE tc_challenge in ('274', '275') AND tc_fn_station_count is not null ORDER BY tc_fn_station_count desc, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");
					$fncpos = 0;
					while ($fncdata = mysql_fetch_array($fnc)) { $fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td>&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php if($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)</i></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td ><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php } ?>
			</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>