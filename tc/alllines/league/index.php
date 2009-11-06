<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="../../default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables</div>
<div id="header2">&nbsp;All Lines Challenge</div>
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
					$query = "SELECT * FROM tc_challenge WHERE tc_challenge = 'A11'";
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
			</table><br />
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td width="75" align="right">Time&nbsp;</td>
					<td width="100">&nbsp;Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge = 'A11' ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php if($fncdata['tc_hours'] > 0) { echo $fncdata['tc_hours']; ?>:<?php } if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } ?>
			</table><br />
			<hr width="400" />
<h3>Previous Configurations</h3>
<p>Until December 2007 the East London Line formed part of the London Underground Network, and until it's removal, the All Lines Challenge was a 12 line challenge.</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td width="75" align="right">Time&nbsp;</td>
					<td width="100">&nbsp;Date Set</td>
					<td width="150">Event</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge = 'A12' ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php if($fncdata['tc_hours'] > 0) { echo $fncdata['tc_hours']; ?>:<?php } if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } ?>
			</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>