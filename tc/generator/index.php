<?php if(!empty($_GET)){ extract($_GET); } if(!empty($_POST)) { extract($_POST); }?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Random Stations Generator&nbsp;</div>
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
<? if(!($no && $min && $max)){ ?><p>Welcome to the Tube Challenge League Tables website Random station generator. This was designed with <a href="/random15/league/">Random 15</a> challenges in mind, but is configurable in many weird and wonderful ways. Anyone for a Random 40 across all 9 zones? Go for it...</p>
<h4>Step 1 of 4</h4>
<FORM METHOD="POST" ACTION="./">
<p>Number of stations required: <INPUT TYPE="text" NAME="no" SIZE="3" MAXLENGTH="3" VALUE="15"><br/>
 And the zones these stations should span? <INPUT TYPE="text" NAME="min" SIZE="3" MAXLENGTH="1" VALUE="1">-<INPUT TYPE="text" NAME="max" SIZE="3" MAXLENGTH="1" VALUE="2"></p>
<table>
  <tr>
    <td>Include:&nbsp;</td>
	<td>&nbsp;London Underground</td>
	<td><input type="checkbox" name="is_lu_yn" checked /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>&nbsp;Docklands Light Railway</td>
	<td><input type="checkbox" name="is_dlr_yn" /></td>
  </tr>
</table>
 <INPUT TYPE="submit" VALUE="Next"></PRE></FORM>
<?php }

if($no && $min && $max && !$start){ ?><h4>Step 2 of 4</h4><FORM METHOD="POST" ACTION="./">
<INPUT TYPE="hidden" NAME="no" VALUE="<?php echo $no; ?>"><INPUT TYPE="hidden" NAME="min" VALUE="<?php echo $min; ?>"><INPUT TYPE="hidden" NAME="max" VALUE="<?php echo $max; ?>"><INPUT TYPE="hidden" name="is_lu_yn" VALUE="<?php echo $is_lu_yn; ?>"><INPUT TYPE="hidden" name="is_dlr_yn" VALUE="<?php echo $is_dlr_yn; ?>">
<p>Fix my starting station at: <select name="start">
<option value="-1">(none)</option>
<?php

		$smax = $max + 0.5;
		$smin = $min - 0.5;

		$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND (";
		if($is_lu_yn == "on"){ $query .= " is_lu_yn = 'Y'"; }
		if($is_lu_yn == "on" && $is_dlr_yn == "on"){ $query .= " OR"; }
		if($is_dlr_yn == "on"){ $query .= " is_dlr_yn = 'Y'"; }
		$query .= ") ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [999]");

		while ($fncdata = mysql_fetch_array($fnc)) { ?>
<option value="<?php echo $fncdata['tc_station_id']; ?>"><?php echo $fncdata['tc_station_name']; ?></option><?php } ?>
</select></p>
<INPUT TYPE="submit" VALUE="Next"></PRE></FORM><?php }

if($no && $min && $max && $start && !$exclude && !$exlist){ ?><h4>Step 3 of 4</h4><FORM METHOD="POST" ACTION="./">
<INPUT TYPE="hidden" NAME="no" VALUE="<?php echo $no; ?>"><INPUT TYPE="hidden" NAME="min" VALUE="<?php echo $min; ?>"><INPUT TYPE="hidden" NAME="max" VALUE="<?php echo $max; ?>"><INPUT TYPE="hidden" NAME="start" VALUE="<?php echo $start; ?>"><INPUT TYPE="hidden" name="is_lu_yn" VALUE="<?php echo $is_lu_yn; ?>"><INPUT TYPE="hidden" name="is_dlr_yn" VALUE="<?php echo $is_dlr_yn; ?>">
<p>We definitely won't be visiting:</p>
<p><INPUT TYPE="submit" VALUE="Next"></p>
<table border="0" cellpadding="0" cellspacing="0">
<?php 
		$fncpos = 0;
		$smax = $max + 0.5;
		$smin = $min - 0.5;

		$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND tc_station_id <> $start AND (";

		if($is_lu_yn == "on"){ $query .= " is_lu_yn = 'Y'"; }
		if($is_lu_yn == "on" && $is_dlr_yn == "on"){ $query .= " OR"; }
		if($is_dlr_yn == "on"){ $query .= " is_dlr_yn = 'Y'"; }
		$query .= ") ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [000]");

		while ($fncdata = mysql_fetch_array($fnc)) { ?>
	<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
		<td><?php echo $fncdata['tc_station_name']; ?></td>
		<td><input type="checkbox" name="exclude[]" value="<?php echo $fncdata['tc_station_id']; ?>"></td>
	</tr><?php $fncpos++; } ?>
</table><br/>
<input type="hidden" name="exclude[]" value="-1" />
<INPUT TYPE="submit" VALUE="Next">
</FORM>
<?php }
if($no && $min && $max && $start && $exclude){?><h4>Step 4 of 4</h4><FORM METHOD="POST" ACTION="./">
<INPUT TYPE="hidden" NAME="no" VALUE="<?php echo $no; ?>"><INPUT TYPE="hidden" NAME="min" VALUE="<?php echo $min; ?>"><INPUT TYPE="hidden" NAME="max" VALUE="<?php echo $max; ?>"><INPUT TYPE="hidden" NAME="start" VALUE="<?php echo $start; ?>"><INPUT TYPE="hidden" name="is_lu_yn" VALUE="<?php echo $is_lu_yn; ?>"><INPUT TYPE="hidden" name="is_dlr_yn" VALUE="<?php echo $is_dlr_yn; ?>">
<?php
$query = "SELECT * FROM tc_stations WHERE tc_station_id = $start";
$fnc = mysql_query($query) or die("Select Failed! [000]");
$result = mysql_fetch_array($fnc);

?>
<p>You are about to generate <b><?php echo $no; ?></b> random stations with the following criteria:</p>
<p>Networks used: <b><?php if($is_lu_yn == "on"){ ?>LU<?php } if($is_lu_yn == "on" && $is_dlr_yn == "on"){ ?>, <?php } if($is_dlr_yn == "on"){ ?>DLR<?php } ?></b><br/>
Starting station: <b><?php if($start == -1){ ?>random<?php } else { echo $result['tc_station_name']; } ?></b><br/>
Zone<?php if($max > $min){ ?>s<?php } ?> used: <b><?php echo $min; if($max > $min){?>-<?php echo $max; } ?></b><br/><?php

$exlist = "-1";

 for($i = 0; $i < count($exclude); $i++) {
    $exlist .= ",".$exclude[$i];
  }
  
 $query = "SELECT * FROM tc_stations WHERE tc_station_id in ($exlist)";
 $fnc = mysql_query($query) or die("Select Failed! [000]");
 $any = mysql_affected_rows();
 $exno = 0;
?>Excluded stations: <b><?php if($any == 0){ ?>None<?php } while ($fncdata = mysql_fetch_array($fnc)){ if($exno <> 0){ ?>, <?php } echo $fncdata['tc_station_name']; $exno++; } ?></b></p>

<INPUT TYPE="hidden" NAME="exlist" VALUE="<?php echo $exlist; ?>"><INPUT TYPE="submit" VALUE="Generate!">
</FORM>
<?php }
if($no && $min && $max && $start && !$exclude && $exlist){?><FORM METHOD="POST" ACTION="./">
<?php
$query = "SELECT * FROM tc_stations WHERE tc_station_id = $start";
$fnc = mysql_query($query) or die("Select Failed! [000]");
$result = mysql_fetch_array($fnc);

?>
<p>Here are your <b><?php echo $no; ?></b> random stations, drawn using the following criteria:</p>
<p>Networks used: <b><?php if($is_lu_yn == "on"){ ?>LU<?php } if($is_lu_yn == "on" && $is_dlr_yn == "on"){ ?>, <?php } if($is_dlr_yn == "on"){ ?>DLR<?php } ?></b><br/>
Starting station: <b><?php if($start == -1){ ?>random<?php } else { $starter = $result['tc_station_name']; echo $starter; } ?></b><br/>
Zone<?php if($max > $min){ ?>s<?php } ?> used: <b><?php echo $min; if($max > $min){?>-<?php echo $max; } ?></b><br/><?php

 $query = "SELECT * FROM tc_stations WHERE tc_station_id in ($exlist)";
 $fnc = mysql_query($query) or die("Select Failed! [000]");
 $any = mysql_affected_rows();
 $exno = 0; $fncpos = 0;
?>Excluded stations: <b><?php if($any == 0){ ?>None<?php } while ($fncdata = mysql_fetch_array($fnc)){if($exno <> 0){ ?>, <?php } echo $fncdata['tc_station_name']; $exno++; }?></b></p>
			<table border="0" cellpadding="1" cellspacing="0">
				<?php	
				
		$smax = $max + 0.5;
		$smin = $min - 0.5;
		if($start > -1){ $exlist .= ",".$start; $no--; ?>
				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><?php echo $starter; ?></td>
				</tr><?php } 
									
					$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND tc_station_id NOT IN ($exlist) AND (";
								
					if($is_lu_yn == "on"){ $query .= " is_lu_yn = 'Y'"; }
					if($is_lu_yn == "on" && $is_dlr_yn == "on"){ $query .= " OR"; }
					if($is_dlr_yn == "on"){ $query .= " is_dlr_yn = 'Y'"; }
					$query .= ") ORDER BY RAND() LIMIT $no";
					$fnc = mysql_query($query) or die("Select Failed! [999]");

					$fncpos = 0;
					
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><?php echo $fncdata['tc_station_name']; ?></td>
				</tr><?php } ?>
			</table><?php } ?>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>