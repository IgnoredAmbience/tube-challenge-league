<?php
	include('../settings.php');
	include('../functions.php');
	
	$page_title = "Random Stations Generator";
	$directory_depth = 1;
	$type = "main";
	$script = "r15generator/logic.js";

	display_header($page_title, $directory_depth, $script);
	display_menu($directory_depth);
	display_submenu($type, $directory_depth);

?>
		<div id="content">
			<h3>&nbsp;</h3>
<?php

	/******
	 * Step 1
	 * For display if first three parameters not set, or if cancelled
	 ******/

	if(isset($_POST['cancel']) || !isset($_POST['no'] , $_POST['min'], $_POST['max'])) {
?>
			<p>Welcome to the Tube Challenge League Tables - Random Stations Generator. This was designed with <a href="/random15/league/">Random 15</a> challenges in mind, but is configurable in many weird and wonderful ways. Anyone for a Random 40 across all 9 zones? Go for it...</p>
			<p><b>It has now been updated to include all stations in the newly-revised Travelcard Area (Zones 1-9, Watford Junction, <abbr title="Chafford Hundred, Grays, Ockendon, Purfleet">Essex Group</abbr>).</b></p>
			<h4>Step 1 of 4 - Main selection</h4>
			<form method="post" action="index.php" name="picker">
				<p>
					Number of stations required: <input type="text" name="no" size="3" maxlength="3" value="15" /><br />
					And the zones these stations should span? <input type="text" name="min" size="3" maxlength="1" value="1" onBlur="change()" />-<input type="text" name="max" size="3" maxlength="1" value="2" onBlur="change()" />
				</p>
				<table>
					<tr>
						<td rowspan="5"><b>Networks:</b></td>
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
						<td><input type="checkbox" name="tl" /></td>
					</tr>
					<tr>
						<td>National Rail</td>
						<td><input type="checkbox" name="nr" onClick="change()" /></td>
					</tr>
					<tr class="extensions">
						<td rowspan="2"><b>Extensions:</b></td>
						<td>Watford Junction</td>
						<td><input type="checkbox" name="wj" /></td>
					</tr>
					<tr class="extensions">
						<td><abbr title="Chafford Hundred, Grays, Ockendon, Purfleet">Essex Group</abbr></td>
						<td><input type="checkbox" name="eg" /></td>
					</tr>
					<tr class="locations">
						<td><b>River:</b></td>
						<td colspan="2">
							<select name="river">
								<option selected="selected"></option>
								<option value="n">North</option>
								<option value="s">South</option>
							</select>
						</td>
					</tr>
				</table>
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}

	/*******
	 * Step 2
	 * For display if starting station not set
	 *******/
	
	else if(!isset($_POST['start'])) {
?>	
			<h4>Step 2 of 4 - Pick starting station</h4>
			<form method="post" action="index.php">
				<p>Fix my starting station at:
					<select name="start">
						<option value="-1">(none)</option>
<?php
		$where = where_condition();
		$query = "SELECT * FROM tc_stations WHERE $where ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [999]" . mysql_error());

		while ($fncdata = mysql_fetch_array($fnc)) { 
			echo <<<EOF
						<option value="${fncdata['tc_station_id']}">${fncdata['tc_station_name']}</option>
EOF;
		}
?>
					</select>
				</p>
				<p>
					<?php echo hidden_inputs(); ?>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}
	
	/******
	 * Step 3
	 * For display if excluded stations not set
	 ******/

	else if(!isset($_POST['exclude']) && !isset($_POST['exlist'])) {
?>
			<h4>Step 3 of 4 - Pick stations to exclude</h4>
			<form method="post" action="index.php">
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
				<p>We definitely won't be visiting:</p>
				<input type="hidden" name="exclude[]" value="" />
				<table border="0" cellpadding="0" cellspacing="0">
<?php
		$fncpos = 0;

		$where = where_condition($_POST['start']);
		$query = "SELECT * FROM tc_stations WHERE $where ORDER BY tc_station_name";
		$fnc = mysql_query($query) or die("Select Failed! [000]");

		while ($fncdata = mysql_fetch_array($fnc)) {
?>
					<tr class="row<?php if($fncpos%2 != 0) {echo "1";} else {echo "2";} ?>">
						<td><?php echo $fncdata['tc_station_name']; ?></td>
						<td><input type="checkbox" name="exclude[]" value="<?php echo $fncdata['tc_station_id']; ?>" /></td>
					</tr>
<?php
			$fncpos++;
		}

		echo hidden_inputs();
?>
				</table>
				<br />
				<p>
					<input type="submit" name="next" value="Next Step" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
	}
	
	/******
	 * Step 4
	 * For display when all options are set
	 ******/

	else if(isset($_POST['exclude'])) {
?>
			<h4>Step 4 of 4 - Confirm settings</h4>
			<form method="post" action="index.php">
<?php
		echo hidden_inputs();

		$no = (int) $_POST['no'];
?>
				<p>You are about to generate <b><?php echo $no; ?></b> random stations with the following criteria:</p>
<?php echo option_summary(validate_exlist($_POST['exclude'])); ?>
				<p><input type="checkbox" name="hide_results" /> Hide generated stations?</p>
				<p>
					<input type="submit" name="next" value="Generate!" />
					<input type="submit" name="cancel" value="Start Over" />
				</p>
			</form>
<?php
		}

	/******
	 * Step 5
	 * For display when all options set and exclist also parsed
	 * All other possibilities should have now been caught
	 ******/
	
	else {
		$start = (int) $_POST['start'];
		$no = (int) $_POST['no'];
		$exlist = validate_exlist($_POST['exlist']);
		$start_sta = '';
		$fncpos = 0;
?>
				<p>Here are your <b><?php echo $no; ?></b> random stations, drawn using the following criteria:</p>
<?php echo option_summary($exlist, $start_sta); ?>

<table border="0" cellpadding="1" cellspacing="0"<?php if(isset($_POST['hide_results'])) echo ' class="hiderows"'; ?>>
<?php	
		if($start > -1) {
			$exlist .= ",".$start;
			$no--;
			$fncpos++;
?>
					<tr class="row2 norowhide">
						<td><?php echo $start_sta; ?></td>
					</tr>
<?php
		}

		$where = where_condition($start, $exlist);
		$query = "SELECT * FROM tc_stations WHERE $where ORDER BY RAND() LIMIT $no";
		$fnc = mysql_query($query) or die("Select Failed! [999]");
					
		while ($fncdata = mysql_fetch_array($fnc)) {
			if($fncpos == 1 && isset($_POST['hide_results'])) {
?>
					<tr class="row1 norowhide hideprint">
						<td><i>(remaining stations hidden from screen, visible when printed)</i></td>
					</tr>
<?php
			}
?>
					<tr class="row<?php echo $fncpos%2 ? "1" : "2"; if(!$fncpos) echo " norowhide"; ?>">
						<td><?php echo $fncdata['tc_station_name']; ?></td>
					</tr>
<?php
			$fncpos++;
		}
?>
				</table>
<?php
	}
	display_footer($page_title);

	function hidden_inputs() {
		$inputs = array('no', 'min', 'max', 'lu', 'lo', 'dlr', 'tl', 'nr',
			'wj', 'eg', 'river', 'start');
		$ret = '';
		foreach($inputs as $input) {
			if(isset($_POST[$input])) {
				$val = htmlspecialchars($_POST[$input]);
				$ret .= "
				<input type='hidden' name='$input' value='$val' />";
			}
		}
		return $ret;
	}
				
	function print_networks() {
		$networks = array(
			'lu' => 'London Underground',
			'lo' => 'London Overground',
			'dlr' => 'Docklands Light Railway',
			'tl' => 'Tramlink',
			'nr' => 'National Rail'
		);

		$n = array();
		foreach($networks as $key => $name) {
			if(isset($_POST[$key]))
				$n[] = $name;
		}
		return implode(', ', $n);
	}
		
	function option_summary($exlist, &$start_sta = '') {
		$start = (int) $_POST['start'];
		$max = (int) $_POST['max'];
		$min = (int) $_POST['min'];
		$networks = print_networks();
		$zs = $max > $min ? 's' : '';
		$zones = $max > $min ? "$min-$max" : $min;

		if($start > 0) {
			$query = "SELECT tc_station_name FROM tc_stations WHERE tc_station_id = $start";
			$fnc = mysql_query($query) or die("Select Failed! [000]");
			$start_sta = mysql_result($fnc, 0);
		} elseif($start == -1) {
			$start_sta = 'random';
		}

		$ex_stas = 'None';
  
		if($exlist) {
			$query = "SELECT tc_station_name FROM tc_stations WHERE tc_station_id in ($exlist)";
			$fnc = mysql_query($query) or die("Select Failed! [000]");

			$row = mysql_fetch_row($fnc);
			$ex_stas = $row[0];

			while($row = mysql_fetch_row($fnc))
				$ex_stas .= ', '.$row[0];
		}

		return <<<EOF
				<p>Networks used: <b>$networks</b><br />
				Starting station: <b>$start_sta</b><br />
				Zone$zs: <b>$zones</b><br />
				Excluded stations: <b>$ex_stas</b></p>
				<input type="hidden" name="exlist" value="$exlist" />
EOF;
	}

	function where_condition($start = 0, $exlist = '') {
		// Produces a safe WHERE clause from various sources
		$min = $_POST['min'] - 0.5;
		$max = $_POST['max'] + 0.5;

		$start = (int) $start;

		if($start < 0) $start = 0;

		if($start && $exlist) {
			// Move start to exlist if both defined
			$exlist .= ",$start";
			$start = 0;
		}

		$clauses = array();

		$zones = array("( tc_station_zone >= $min AND tc_station_zone <= $max )");
		if(isset($_POST['tl'])) $zones[] = " tc_station_zone = 'T' ";
		if(isset($_POST['wj'])) $zones[] = " tc_station_zone = 'W' ";
		if(isset($_POST['eg'])) $zones[] = " tc_station_zone = 'C' ";
		$clauses[] = implode(' OR ', $zones);

		$networks = array();
		if(isset($_POST['lu'])) $networks[] = " is_lu ";
		if(isset($_POST['lo'])) $networks[] = " is_lo ";
		if(isset($_POST['dlr'])) $networks[] = " is_dlr ";
		if(isset($_POST['tl'])) $networks[] = " is_tl ";
		if(isset($_POST['nr'])) $networks[] = " is_nr ";
		$clauses[] = implode(' OR ', $networks);

		if(isset($_POST['river'])) {
			if($_POST['river'] == 'n')
				$clauses[] = " location_ns = 'N' ";
			elseif($_POST['river'] == 's')
				$clauses[] = " location_ns = 'S' ";
		}

		if($start) $clauses[] = " tc_station_id != $start ";

		if($exlist) $clauses[] = " tc_station_id NOT IN ( $exlist ) ";

		return ' ( ' . implode(' ) AND ( ', $clauses) . ' ) ';

	}

	function validate_exlist($exlist = '') {
		// ensures all items of the list are integers
		if(is_array($exlist))
			$exarr = $exlist;
		else
			$exarr = explode(',', $exlist);

		array_walk($exarr, create_function(
			'&$val, $key',
			'$val = (int) $val;'
		));
		return join(',', $exarr);
	}

?>
