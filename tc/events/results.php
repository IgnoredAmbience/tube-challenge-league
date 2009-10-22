<?php if(!empty($_GET)) extract($_GET); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="../default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">&nbsp;Event Results</div>
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
	<table width="300" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><b>Challenge Details</b></td>
					<td>&nbsp;</td>
				</tr>
					<?php
					$query = "SELECT DISTINCT tc_event, tc_date, tc_short_name FROM tc_data INNER JOIN tc_challenge on tc_data.tc_challenge = tc_challenge.tc_challenge WHERE tc_event = '$event' AND tc_date = '$date' AND tc_data.tc_challenge = '$type'";
					$moo = mysql_query($query) or die("Select Failed! [501]");
					$details = mysql_fetch_array($moo)
					?>
				<tr>
					<td class="row2" width="100">Event:</td>
					<td class="row1" width="200"><?php echo $details['tc_event']; ?></td>
				</tr>
				<tr>
					<td class="row2">Type:</td>
					<td class="row1"><?php echo $details['tc_short_name']; ?></td>
				</tr>
				<tr>
					<td class="row2">Date:</td>
					<td class="row1" colspan="2"><?php echo date("d.m.Y", strtotime($details['tc_date'])); ?></td>
				</tr>
			</table><br/>
	<?php if(!($type == '268' or $type == '269' or $type == '274' or $type == '275' or $type == '270')){ ?>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td width="75" align="right">Time&nbsp;</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_event = '$event' AND tc_date = '$date' AND tc_challenge = '$type' ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?>&nbsp;</td>
					<td align="right">&nbsp;<?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } ?>
			</table>
	<?php } else { ?>
				<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="20"></td>
					<td>Name</td>
					<td colspan="2" align="center">Time (Stations)&nbsp;</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_event = '$event' AND tc_date = '$date' AND tc_challenge = '$type' AND tc_fn_station_count is null ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?>&nbsp;</td>
					<td width="75" align="right">&nbsp;<?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50">&nbsp;</td>
				</tr>
				<?php } if($fncpos > 0){ ?>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr><?php } $query = "SELECT * FROM tc_data WHERE tc_event = '$event' AND tc_date = '$date' AND tc_challenge = '$type' AND tc_fn_station_count is not null ORDER BY tc_fn_station_count desc, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?>&nbsp;</td>
					<td align="right">&nbsp;<?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)</i></td>
				</tr>
				<?php } ?>
			</table><?php } ?>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>