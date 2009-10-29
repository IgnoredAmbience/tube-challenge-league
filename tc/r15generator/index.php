<?php
	if(!empty($_GET)) {extract($_GET);}
	if(!empty($_POST)) {extract($_POST);}

	include('../settings.php');
	include('../functions.php');
	
	$page_title = "Random Stations Generator";
	$directory_depth = 1;
	$type = "main";
	display_header($page_title, $directory_depth); 
	display_menu($directory_depth);
	display_submenu($type, $directory_depth);
?>
		<div id="content">
			<h3>&nbsp;</h3>
<?php
	if(!($no && $min && $max))
	{
?>
			<p>Welcome to the Tube Challenge League Tables website Random station generator. This was designed with <a href="/random15/league/">Random 15</a> challenges in mind, but is configurable in many weird and wonderful ways. Anyone for a Random 40 across all 9 zones? Go for it...</p>
			<p><b>It has now been updated to include all stations in the Travelcard Area!</b> <i>(Zones 1-9 &amp; Watford Junction)</i></p>
			<h4>Step 1 of 4</h4>
			<form method="post" action="index.php">
				<p>
					Number of stations required: <input type="text" name="no" size="3" maxlength="3" value="15" /><br />
					And the zones these stations should span? <input type="text" name="min" size="3" maxlength="1" value="1" />-<input type="text" name="max" size="3" maxlength="1" value="2" />
				</p>
				<table>
					<tr>
						<td rowspan="6"><b>Include:</b></td>
						<td>London Underground</td>
						<td><input type="checkbox" name="lu" checked="checked" /></td>
					</tr>
					<tr>
						<td>London Overground</td>
						<td><input type="checkbox" name="lo" /></td>
					</tr>
					<tr>
						<td>Docklands Light Railway</td>
						<td><input type="checkbox" name="dlr" /></td>
					</tr>
					<tr>
						<td>Tramlink</td>
						<td><input type="checkbox" name="is_tl_yn" /></td>
					</tr>
					<tr>
						<td>National Rail</td>
						<td><input type="checkbox" name="is_nr_yn" /></td>
					</tr>
					<tr>
						<td>Watford Junction</td>
						<td><input type="checkbox" name="wj" /></td>
					</tr>
					<tr class="location">
						<td rowspan="2"><b>Location:</b></td>
						<td>North of the river</td>
						<td><input type="checkbox" name="north" checked="checked" /></td>
					</tr>
					<tr class="location">
						<td>South of the river</td>
						<td><input type="checkbox" name="south" checked="checked" /></td>
					</tr>
				</table>
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}

	if($cancel)
	{
		header("Location: index.php");
		exit;
	}
	
	if($no && $min && $max && !$start)
	{
?>
			<h4>Step 2 of 4</h4>
			<form method="post" action="index.php">
				<input type="hidden" name="no" value="<?php echo $no; ?>" />
				<input type="hidden" name="min" value="<?php echo $min; ?>" />
				<input type="hidden" name="max" value="<?php echo $max; ?>" />
				<input type="hidden" name="lu" value="<?php echo $lu; ?>" />
				<input type="hidden" name="lo" value="<?php echo $lo; ?>" />
				<input type="hidden" name="dlr" value="<?php echo $dlr; ?>" />
				<input type="hidden" name="tl" value="<?php echo $tl; ?>" />
				<input type="hidden" name="nr" value="<?php echo $nr; ?>" />
				<p>Fix my starting station at:
					<select name="start">
						<option value="-1">(none)</option>
<?php
		if($min == 1)
		{
?>
						<option value="-2">(Aldwych)</option>
<?php
		}
		$smax = $max + 0.5;
		$smin = $min - 0.5;

		$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND (";
		if($lu) {$query .= "is_lu_yn = 'Y'";}
		if($lu && $lo) {$query .= " OR ";}
		if($lo) {$query .= "is_lo_yn = 'Y'";}
		if($lo && $dlr) {$query .= " OR ";}
		if($dlr) {$query .= "is_dlr_yn = 'Y'";}
		if($dlr && $tl) {$query .= " OR ";}
		if($tl) {$query .= "is_tl_yn = 'Y'";}
		if($tl && $nr) {$query .= " OR ";}
		if($nr) {$query .= "is_nr_yn = 'Y'";}
		$query .= ") ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [999]");

		while ($fncdata = mysql_fetch_array($fnc))
		{ 
?>
						<option value="<?php echo $fncdata['tc_station_id']; ?>"><?php echo $fncdata['tc_station_name']; ?></option>
<?php
		}
?>
					</select>
				</p>
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}
	
	if($cancel)
	{
		header("Location: index.php");
		exit;
	}

	if($no && $min && $max && $start && !$exclude && !$exlist)
	{
?>
			<h4>Step 3 of 4</h4>
			<form method="post" action="index.php">
				<input type="hidden" name="no" value="<?php echo $no; ?>" />
				<input type="hidden" name="min" value="<?php echo $min; ?>" />
				<input type="hidden" name="max" value="<?php echo $max; ?>" />
				<input type="hidden" name="start" value="<?php echo $start; ?>" />
				<input type="hidden" name="lu" value="<?php echo $lu; ?>" />
				<input type="hidden" name="dlr" value="<?php echo $dlr; ?>" />
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
				<p>We definitely won't be visiting:</p>
				<table border="0" cellpadding="0" cellspacing="0">
<?php
		$fncpos = 0;
		$smax = $max + 0.5;
		$smin = $min - 0.5;

		$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND tc_station_id != $start AND (";
		if($lu == "on") {$query .= " is_lu_yn = 'Y'";}
		if($lu == "on" && $dlr == "on") {$query .= " OR";}
		if($dlr == "on") {$query .= " is_dlr_yn = 'Y'";}
		$query .= ") ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [000]");

		while ($fncdata = mysql_fetch_array($fnc))
		{
?>
					<tr class="row<?php if($fncpos%2 != 0) {echo "1";} else {echo "2";} ?>">
						<td><?php echo $fncdata['tc_station_name']; ?></td>
						<td><input type="checkbox" name="exclude[]" value="<?php echo $fncdata['tc_station_id']; ?>" /></td>
					</tr>
<?php
			$fncpos++;
		}
?>
				</table><br />
				<input type="hidden" name="exclude[]" value="-1" />
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}
	
	if($cancel)
	{
		header("Location: index.php");
		exit;
	}
	
	if($no && $min && $max && $start && $exclude)
	{
?>
			<h4>Step 4 of 4</h4>
			<form method="post" action="index.php">
				<input type="hidden" name="no" value="<?php echo $no; ?>" />
				<input type="hidden" name="min" value="<?php echo $min; ?>" />
				<input type="hidden" name="max" value="<?php echo $max; ?>" />
				<input type="hidden" name="start" value="<?php echo $start; ?>" />
				<input type="hidden" name="lu" value="<?php echo $lu; ?>" />
				<input type="hidden" name="dlr" value="<?php echo $dlr; ?>" />
<?php
		$query = "SELECT * FROM tc_stations WHERE tc_station_id = $start";
		$fnc = mysql_query($query) or die("Select Failed! [000]");
		$result = mysql_fetch_array($fnc);

?>
				<p>You are about to generate <b><?php echo $no; ?></b> random stations with the following criteria:</p>
				<p>Networks used: <b><?php if($lu == "on") { ?>LU<?php } if($lu == "on" && $dlr == "on"){ ?>, <?php } if($dlr == "on"){ ?>DLR<?php } ?></b><br />
				Starting station: <b><?php if($start == -1){ ?>random<?php } elseif($start == -2){ ?>Aldwych<?php } else { echo $result['tc_station_name']; } ?></b><br />
				Zone<?php if($max > $min){ ?>s<?php } ?> used: <b><?php echo $min; if($max > $min){?>-<?php echo $max; } ?></b><br />
<?php
		$exlist = "-1";

		for($i = 0; $i < count($exclude); $i++)
		{
			$exlist .= ",".$exclude[$i];
		}
  
		 $query = "SELECT * FROM tc_stations WHERE tc_station_id in ($exlist)";
		 $fnc = mysql_query($query) or die("Select Failed! [000]");
		 $any = mysql_affected_rows();
		 $exno = 0;
?>
			Excluded stations: <b><?php if($any == 0){ ?>None<?php } while ($fncdata = mysql_fetch_array($fnc)){ if($exno != 0){ ?>, <?php } echo $fncdata['tc_station_name']; $exno++; } ?></b></p>

				<input type="hidden" name="exlist" value="<?php echo $exlist; ?>" />
				<p>
					<input type="submit" name="next" value="Generate!" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
		}

	if($cancel)
	{
		header("Location: index.php");
		exit;
	}		
	
	if($no && $min && $max && $start && !$exclude && $exlist)
	{
?>
			<form method="post" action="index.php">
<?php
		$query = "SELECT * FROM tc_stations WHERE tc_station_id = $start";
		$fnc = mysql_query($query) or die("Select Failed! [000]");
		$result = mysql_fetch_array($fnc);
?>
				<p>Here are your <b><?php echo $no; ?></b> random stations, drawn using the following criteria:</p>
				<p>Networks used: <b><?php if($lu == "on"){ ?>LU<?php } if($lu == "on" && $dlr == "on"){ ?>, <?php } if($dlr == "on"){ ?>DLR<?php } ?></b><br />
				Starting station: <b><?php if($start == -1){ ?>random<?php } elseif($start == -2){ ?>Aldwych<?php } else { $starter = $result['tc_station_name']; echo $starter; } ?></b><br />
				Zone<?php if($max > $min){ ?>s<?php } ?> used: <b><?php echo $min; if($max > $min){?>-<?php echo $max; } ?></b><br />
<?php
		$query = "SELECT * FROM tc_stations WHERE tc_station_id in ($exlist)";
		$fnc = mysql_query($query) or die("Select Failed! [000]");
		$any = mysql_affected_rows();
		$exno = 0; $fncpos = 0;
?>
				Excluded stations: <b><?php if($any == 0){ ?>None<?php } while ($fncdata = mysql_fetch_array($fnc)){if($exno != 0){ ?>, <?php } echo $fncdata['tc_station_name']; $exno++; }?></b></p>
				<table border="0" cellpadding="1" cellspacing="0">
<?php	
		$smax = $max + 0.5;
		$smin = $min - 0.5;
		if($start > -1)
		{
			$exlist .= ",".$start;
			$no--;
?>
					<tr class="row<?php if($fncpos%2 != 0) {echo "1";} else {echo "2";} ?>">
						<td><?php echo $starter; ?></td>
					</tr>
<?php
		}
		elseif($start == -2)
		{
			$no--;
?>
					<tr class="row<?php if($fncpos%2 != 0) {echo "1";} else {echo "2";} ?>">
						<td>Aldwych</td>
					</tr>
<?php
		}
									
		$query = "SELECT * FROM tc_stations WHERE tc_station_zone <= $smax AND tc_station_zone >= $smin AND tc_station_id NOT IN ($exlist) AND (";
		if($lu == "on") {$query .= " is_lu_yn = 'Y'";}
		if($lu == "on" && $dlr == "on") {$query .= " OR";}
		if($dlr == "on") {$query .= " is_dlr_yn = 'Y'";}
		$query .= ") ORDER BY RAND() LIMIT $no";
		$fnc = mysql_query($query) or die("Select Failed! [999]");
		$fncpos = 0;
					
		while ($fncdata = mysql_fetch_array($fnc))
		{
			$fncpos++;
?>
					<tr class="row<?php if($fncpos%2 != 0) {echo "1";} else {echo "2";} ?>">
						<td><?php echo $fncdata['tc_station_name']; ?></td>
					</tr>
<?php
		}
?>
				</table>
<?php
	}
	display_footer($page_title);
?>