<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Welcome&nbsp;</div>
<?php
	include('settings.php');
	include('menu.php');
?>
<div id="header4">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr style="text-align: center">
		<td class="header3" width="33%"><a href="missing/">&#187; Appeal &#171;</a></td>
		<td class="header3" width="34%"><a href="latest/">&#187; Latest Times &#171;</a></td>
		<td width="33%"><a href="statistics/">&#187; Statistics &#171;</a></td>
	</tr>
</table>
</div>

<div id="content">
  <p>Welcome to the Tube Challenge League Tables website. The top 3 in each currently open category are shown below - click through to see full league tables and previous configurations. <b><a href="http://darts.scriv.me.uk/">Darts statistics</a></b> are housed on their own <a href="http://darts.scriv.me.uk/">separate website</a>.</p>
<table width="100%" cellspacing="10">
	<tr>
		<td colspan="2">
			<table width="75%" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>  
					<td class="newshead" colspan="2"><a href="fullnetwork/league/">Full Network Challenge</a></td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data WHERE tc_challenge in ('270', '269') AND tc_fn_station_count is null ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$fnc = mysql_query($query) or die("Select Failed! [301]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $fncpos; ?>. <?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = '269'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="fullnetwork/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="50%">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="zone1/league/">Zone 1 Challenge</a></td>
				</tr>
				<?php
					$query1 = "SELECT * FROM tc_data WHERE tc_challenge = 'Z1C' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$z1c = mysql_query($query1) or die("Select Failed! [302]");

					$z1cpos = 0;

					while ($z1cdata = mysql_fetch_array($z1c)) {
						$z1cpos++; ?>

				<tr class="row<?php if($z1cpos%2 != 0){ echo "1"; } else { echo "2"; } if($z1cdata['tc_date']){if($now - date("U", strtotime($z1cdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $z1cpos; ?>. <?php echo $z1cdata['tc_name']; ?></td>
					<td align="right"><?php echo $z1cdata['tc_hours']; ?>:<?php if ($z1cdata['tc_mins'] < 10){ ?>0<?php } echo $z1cdata['tc_mins']; ?>:<?php if ($z1cdata['tc_sec'] < 10){ ?>0<?php } echo $z1cdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'Z1C'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="zone1/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td width="50%">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="alllines/league/">All Lines Challenge</a></td>
				</tr>
				<?php
					$query2 = "SELECT * FROM tc_data WHERE tc_challenge = 'A11' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$a11 = mysql_query($query2) or die("Select Failed! [303]");

					$a11pos = 0;

					while ($a11data = mysql_fetch_array($a11)) {
						$a11pos++; ?>

				<tr class="row<?php if($a11pos%2 != 0){ echo "1"; } else { echo "2"; } if($a11data['tc_date']){if($now - date("U", strtotime($a11data['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $a11pos; ?>. <?php echo $a11data['tc_name']; ?></td>
					<td align="right"><?php if($a11data['tc_hours'] > 0) { echo $a11data['tc_hours']; ?>:<?php } if ($a11data['tc_mins'] < 10){ ?>0<?php } echo $a11data['tc_mins']; ?>:<?php if ($a11data['tc_sec'] < 10){ ?>0<?php } echo $a11data['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'A11'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="alllines/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="bottle/league/">Circle Line Bottle Challenge</a></td>
				</tr>
				<?php
					$query3 = "SELECT * FROM tc_data WHERE tc_challenge = 'BOT' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$bot = mysql_query($query3) or die("Select Failed! [304]");

					$botpos = 0;

					while ($botdata = mysql_fetch_array($bot)) {

					$botpos++; ?>

				<tr class="row<?php if($botpos%2 != 0){ echo "1"; } else { echo "2"; } if($botdata['tc_date']){if($now - date("U", strtotime($botdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $botpos; ?>. <?php echo $botdata['tc_name']; ?></td>
					<td align="right"><?php echo $botdata['tc_hours']; ?>:<?php if ($botdata['tc_mins'] < 10){ ?>0<?php } echo $botdata['tc_mins']; ?>:<?php if ($botdata['tc_sec'] < 10){ ?>0<?php } echo $botdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'BOT'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="bottle/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="mouse/league/">Mouse Challenge</a></td>
				</tr>
				<?php
					$query4 = "SELECT * FROM tc_data WHERE tc_challenge = 'MOU' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$mou = mysql_query($query4) or die("Select Failed! [304]");

					$moupos = 0;

					while ($moudata = mysql_fetch_array($mou)) {
						$moupos++; ?>

				<tr class="row<?php if($moupos%2 != 0){ echo "1"; } else { echo "2"; } if($moudata['tc_date']){if($now - date("U", strtotime($moudata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $moupos; ?>. <?php echo $moudata['tc_name']; ?></td>
					<td align="right"><?php echo $moudata['tc_hours']; ?>:<?php if ($moudata['tc_mins'] < 10){ ?>0<?php } echo $moudata['tc_mins']; ?>:<?php if ($moudata['tc_sec'] < 10){ ?>0<?php } echo $moudata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'MOU'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="mouse/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="dlr/league/">Docklands Light Railway Challenge</a></td>
				</tr>
				<?php
					$query7 = "SELECT * FROM tc_data WHERE tc_challenge = 'D40' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$d3e = mysql_query($query7) or die("Select Failed! [307]");

					$d3epos = 0;

					while ($d3edata = mysql_fetch_array($d3e)) {

					$d3epos++; ?>

				<tr class="row<?php if($d3epos%2 != 0){ echo "1"; } else { echo "2"; } if($d3edata['tc_date']){if($now - date("U", strtotime($d3edata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $d3epos; ?>. <?php echo $d3edata['tc_name']; ?></td>
					<td align="right"><?php echo $d3edata['tc_hours']; ?>:<?php if ($d3edata['tc_mins'] < 10){ ?>0<?php } echo $d3edata['tc_mins']; ?>:<?php if ($d3edata['tc_sec'] < 10){ ?>0<?php } echo $d3edata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'D40'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="dlr/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="random15/league/">Random 15 Challenge</a></td>
				</tr>
				<?php
					$query6 = "SELECT * FROM tc_data WHERE tc_challenge = 'R15' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$r15 = mysql_query($query6) or die("Select Failed! [306]");

					$r15pos = 0;

					while ($r15data = mysql_fetch_array($r15)) {
						$r15pos++; ?>

				<tr class="row<?php if($r15pos%2 != 0){ echo "1"; } else { echo "2"; } if($r15data['tc_date']){if($now - date("U", strtotime($r15data['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $r15pos; ?>. <?php echo $r15data['tc_name']; ?></td>
					<td align="right"><?php echo $r15data['tc_hours']; ?>:<?php if ($r15data['tc_mins'] < 10){ ?>0<?php } echo $r15data['tc_mins']; ?>:<?php if ($r15data['tc_sec'] < 10){ ?>0<?php } echo $r15data['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'R15'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="random15/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a> + <a href="/r15generator/">R15 Generator</a></i></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="southlondon/league/">South London Challenge</a></td>
				</tr>
				<?php
					$query5 = "SELECT * FROM tc_data WHERE tc_challenge = 'S29' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$s29 = mysql_query($query5) or die("Select Failed! [305]");

					$s29pos = 0;

					while ($s29data = mysql_fetch_array($s29)) {

					$s29pos++; ?>

				<tr class="row<?php if($s29pos%2 != 0){ echo "1"; } else { echo "2"; } if($s29data['tc_date']){if($now - date("U", strtotime($s29data['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $s29pos; ?>. <?php echo $s29data['tc_name']; ?></td>
					<td align="right"><?php echo $s29data['tc_hours']; ?>:<?php if ($s29data['tc_mins'] < 10){ ?>0<?php } echo $s29data['tc_mins']; ?>:<?php if ($s29data['tc_sec'] < 10){ ?>0<?php } echo $s29data['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'S29'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="southlondon/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="tramlink/league/">Tramlink Challenge</a></td>
				</tr>
				<?php
					$query8 = "SELECT * FROM tc_data WHERE tc_challenge = 'TRM' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$trm = mysql_query($query8) or die("Select Failed! [308]");

					$trmpos = 0;

					while ($trmdata = mysql_fetch_array($trm)) {
						$trmpos++; ?>

				<tr class="row<?php if($trmpos%2 != 0){ echo "1"; } else { echo "2"; } if($trmdata['tc_date']){if($now - date("U", strtotime($trmdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $trmpos; ?>. <?php echo $trmdata['tc_name']; ?></td>
					<td align="right"><?php echo $trmdata['tc_hours']; ?>:<?php if ($trmdata['tc_mins'] < 10){ ?>0<?php } echo $trmdata['tc_mins']; ?>:<?php if ($trmdata['tc_sec'] < 10){ ?>0<?php } echo $trmdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'TRM'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="tramlink/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
		<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="xmaspark/league/">Christmas Park Challenge</a></td>
				</tr>
				<?php
					$query7 = "SELECT * FROM tc_data WHERE tc_challenge = 'PRK' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$prk = mysql_query($query7) or die("Select Failed! [307]");

					$prkpos = 0;

					while ($prkdata = mysql_fetch_array($prk)) {

					$prkpos++; ?>

				<tr class="row<?php if($prkpos%2 != 0){ echo "1"; } else { echo "2"; } if($prkdata['tc_date']){if($now - date("U", strtotime($prkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $prkpos; ?>. <?php echo $prkdata['tc_name']; ?></td>
					<td align="right"><?php echo $prkdata['tc_hours']; ?>:<?php if ($prkdata['tc_mins'] < 10){ ?>0<?php } echo $prkdata['tc_mins']; ?>:<?php if ($prkdata['tc_sec'] < 10){ ?>0<?php } echo $prkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'PRK'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="xmaspark/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="alphabet/league/">Alphabet Challenge</a></td>
				</tr>
				<?php
					$query6 = "SELECT * FROM tc_data WHERE tc_challenge = 'ABC' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$abc = mysql_query($query6) or die("Select Failed! [306]");

					$abcpos = 0;

					while ($abcdata = mysql_fetch_array($abc)) {
						$abcpos++; ?>

				<tr class="row<?php if($abcpos%2 != 0){ echo "1"; } else { echo "2"; } if($abcdata['tc_date']){if($now - date("U", strtotime($abcdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $abcpos; ?>. <?php echo $abcdata['tc_name']; ?></td>
					<td align="right"><?php echo $abcdata['tc_hours']; ?>:<?php if ($abcdata['tc_mins'] < 10){ ?>0<?php } echo $abcdata['tc_mins']; ?>:<?php if ($abcdata['tc_sec'] < 10){ ?>0<?php } echo $abcdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'ABC'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="alphabet/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
			<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="129snake/league/">128 Snake Challenge</a></td>
				</tr>
				<?php
					$query00 = "SELECT * FROM tc_data WHERE tc_challenge = 'SK2' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$snk = mysql_query($query00) or die("Select Failed! [307]");

					$snkpos = 0;

					while ($snkdata = mysql_fetch_array($snk)) {

					$snkpos++; ?>

				<tr class="row<?php if($snkpos%2 != 0){ echo "1"; } else { echo "2"; } if($snkdata['tc_date']){if($now - date("U", strtotime($snkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $snkpos; ?>. <?php echo $snkdata['tc_name']; ?></td>
					<td align="right"><?php echo $snkdata['tc_hours']; ?>:<?php if ($snkdata['tc_mins'] < 10){ ?>0<?php } echo $snkdata['tc_mins']; ?>:<?php if ($snkdata['tc_sec'] < 10){ ?>0<?php } echo $snkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'SK2'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="129snake/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="pointsofcompass/league/">Points of the Compass Challenge</a></td>
				</tr>
				<?php
					$query00 = "SELECT * FROM tc_data WHERE tc_challenge = 'POC' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$snk = mysql_query($query00) or die("Select Failed! [307]");

					$snkpos = 0;

					while ($snkdata = mysql_fetch_array($snk)) {

					$snkpos++; ?>

				<tr class="row<?php if($snkpos%2 != 0){ echo "1"; } else { echo "2"; } if($snkdata['tc_date']){if($now - date("U", strtotime($snkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $snkpos; ?>. <?php echo $snkdata['tc_name']; ?></td>
					<td align="right"><?php echo $snkdata['tc_hours']; ?>:<?php if ($snkdata['tc_mins'] < 10){ ?>0<?php } echo $snkdata['tc_mins']; ?>:<?php if ($snkdata['tc_sec'] < 10){ ?>0<?php } echo $snkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'POC'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="pointsofcompass/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
				<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="roadsstreetslanes/league/">Roads, Streets &amp; Lanes Challenge</a></td>
				</tr>
				<?php
					$query00 = "SELECT * FROM tc_data WHERE tc_challenge = 'RSL' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$snk = mysql_query($query00) or die("Select Failed! [307]");

					$snkpos = 0;

					while ($snkdata = mysql_fetch_array($snk)) {

					$snkpos++; ?>

				<tr class="row<?php if($snkpos%2 != 0){ echo "1"; } else { echo "2"; } if($snkdata['tc_date']){if($now - date("U", strtotime($snkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $snkpos; ?>. <?php echo $snkdata['tc_name']; ?></td>
					<td align="right"><?php echo $snkdata['tc_hours']; ?>:<?php if ($snkdata['tc_mins'] < 10){ ?>0<?php } echo $snkdata['tc_mins']; ?>:<?php if ($snkdata['tc_sec'] < 10){ ?>0<?php } echo $snkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'RSL'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="roadsstreetslanes/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
				<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="zone12/league/">Zones 1 &amp; 2 Challenge</a></td>
				</tr>
				<?php
					$query00 = "SELECT * FROM tc_data WHERE tc_challenge = 'Z12' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$snk = mysql_query($query00) or die("Select Failed! [307]");

					$snkpos = 0;

					while ($snkdata = mysql_fetch_array($snk)) {

					$snkpos++; ?>

				<tr class="row<?php if($snkpos%2 != 0){ echo "1"; } else { echo "2"; } if($snkdata['tc_date']){if($now - date("U", strtotime($snkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $snkpos; ?>. <?php echo $snkdata['tc_name']; ?></td>
					<td align="right"><?php echo $snkdata['tc_hours']; ?>:<?php if ($snkdata['tc_mins'] < 10){ ?>0<?php } echo $snkdata['tc_mins']; ?>:<?php if ($snkdata['tc_sec'] < 10){ ?>0<?php } echo $snkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'Z12'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="zone12/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
	</tr>
				<tr>
		<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>  
					<td class="newshead" colspan="2"><a href="boroughs/league/">London Boroughs Challenge</a></td>
				</tr>
				<?php
					$query00 = "SELECT * FROM tc_data WHERE tc_challenge = 'BOR' ORDER BY tc_hours, tc_mins, tc_sec LIMIT 3";
					$snk = mysql_query($query00) or die("Select Failed! [307]");

					$snkpos = 0;

					while ($snkdata = mysql_fetch_array($snk)) {

					$snkpos++; ?>

				<tr class="row<?php if($snkpos%2 != 0){ echo "1"; } else { echo "2"; } if($snkdata['tc_date']){if($now - date("U", strtotime($snkdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><?php echo $snkpos; ?>. <?php echo $snkdata['tc_name']; ?></td>
					<td align="right"><?php echo $snkdata['tc_hours']; ?>:<?php if ($snkdata['tc_mins'] < 10){ ?>0<?php } echo $snkdata['tc_mins']; ?>:<?php if ($snkdata['tc_sec'] < 10){ ?>0<?php } echo $snkdata['tc_sec']; ?></td>
				</tr>
				<?php } $querya = "SELECT max(tc_date) FROM tc_data WHERE tc_challenge = 'BOR'";
				$fncint = mysql_query($querya) or die("Select Failed! [301a]");
				?>
				<tr>
					<td colspan="2" align="right"><i><a href="boroughs/league/">&#8230;click for full details. Last updated: <?php echo date("d.m.Y", strtotime(mysql_result($fncint, 0))); ?></a></i></td>
				</tr>
			</table>
		</td>
				<td>&nbsp;</td>
	</tr>
 </table>
 <p>Please read my <a style="text-decoration: underline" href="missing/">appeal for missing data</a>.</p>
 <p>I intend to <a href="shopping-list/">introduce some more features</a> in due course. In the meantime, please email all new data and corrections to <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
 </div>
</body>
</html>