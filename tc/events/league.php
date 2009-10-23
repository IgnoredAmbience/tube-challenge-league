<?php
	$challenge = $_GET['challenge'];
	if(!$challenge) {$challenge = "fullnetwork";} // default value if none given
	include('../settings.php');
	include('../functions.php');
	
	// Get info from $challenge to build rest of page

	$query = "SELECT tc_challenge, tc_short_name FROM tc_challenge WHERE tc_uri = '$challenge' LIMIT 1";
	$result = mysql_query($query) or die("Select Failed! [501]");
	$details = mysql_fetch_array($result);
	
	$now = date("U");
	$event = $details['tc_challenge'];	
	$page_title = $details['tc_short_name'];	
	$directory_depth = 1;
	$type = "event";
	display_header($page_title, $directory_depth); 
	display_menu($directory_depth);
	display_submenu($type, $directory_depth);
?>
<div id="content">
	<h3>&nbsp;</h3>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><b>Challenge Details</b></td>
					<td>&nbsp;</td>
				</tr>
					<?php
					$query = "SELECT * FROM tc_challenge WHERE tc_challenge = '$event'";
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
					$query = "SELECT * FROM tc_data WHERE tc_challenge = '$event' ORDER BY tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td align="right"><?php echo $fncpos; ?>.&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
					<td>&nbsp;<i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?></i></td>
					<td><i><?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } ?>
			</table>
<?php display_footer($page_title); ?>			


	// Events
	// ------
	// 129snake
	// alllines
	// alphabet
	// boroughs
	// bottle
	// dlr
	// fullnetwork
	// mouse
	// pointsofcompass
	// random15
	// roadsstreetslanes
	// southlondon
	// tramlink
	// xmaspark
	// zone1
	// zone12
?>
