<?php if(!empty($_GET)) extract($_GET); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Challengers - Search Results&nbsp;</div>
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
<p>Results will be grouped by challenge (and by their seperate configurations where appropriate), with fastest times first.</p>
<p>Results for <b><?php echo $name; ?></b></p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<?php
					$name = '%'.str_replace(' ', '%', $name).'%';
					$name = str_replace('akan', 'åkan', $name);
					$name = str_replace('olge', 'olgé', $name);
					$name = str_replace('illen', 'illén', $name);
					$name = str_replace('å', '&#229;', $name);
					$name = str_replace('é', '&#233;', $name);
				
					$query = "SELECT * FROM tc_data INNER JOIN tc_challenge on tc_data.tc_challenge = tc_challenge.tc_challenge WHERE tc_name LIKE '$name' ORDER BY tc_data.tc_challenge, tc_hours, tc_mins, tc_sec, tc_date";
					$fnc = mysql_query($query) or die("Select Failed! [1202]");

					$fncpos = 0; $lasttype = 'x';

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; if(($fncdata['tc_challenge'] != $lasttype) and ($fncpos > 0)){?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } $lasttype = $fncdata['tc_challenge']; ?>
				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td width="90"><?php echo $fncdata['tc_short_name']; ?>&nbsp;</td>
					<td><?php echo $fncdata['tc_name']; ?>&nbsp;</td>
					<td width="75" align="right"><?php if ($fncdata['tc_fn_gwr'] == "Y"){ ?>&#174;&nbsp;<?php } echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?></td>
					<td width="50" align="center"><?php if($fncdata['tc_fn_station_count']){ ?><i>(<?php echo $fncdata['tc_fn_station_count']; ?>)<?php } ?></i></td>
					<td><i><?php if ($fncdata['tc_date']){ echo date("d.m.Y", strtotime($fncdata['tc_date']));} ?>&nbsp;</i></td>
					<td><i>&nbsp;<?php echo $fncdata['tc_event']; ?></i></td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
<?php } } ?>
			</table>
<P>Miscellaneous statistics:<br/>This page doesn't seem to display as desired. It *will* be fixed...</p>
 <table border="0" cellpadding="1" cellspacing="0">
   <tr class="row2">
     <td>Total time spent on the tube:</td>			
	 <td align="right"><b><?php
					mysql_pconnect("localhost","Mcrivpro","password")
						or die("Unable to connect to SQL server");
					mysql_select_db("Mcrivpro") or die("Unable to connect to database"); 
					
					$query = "SELECT SUM(tc_hours), SUM(tc_mins), SUM(tc_sec) FROM tc_data WHERE tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [302]"); 					
					$fncdata = mysql_fetch_array($fnc); 
					
					$totsecs = $fncdata['SUM(tc_sec)'] + ($fncdata['SUM(tc_mins)']*60) + ($fncdata['SUM(tc_hours)']*3600);
						
					$gdays = floor($totsecs/86400); $ro = 86400*(($totsecs/86400) - $gdays);
					$ghrs = floor($ro/3600); $ro = 3600*(($ro/3600) - $ghrs);
					$gmin = floor($ro/60); 
					$gsec = 60*(($ro/60) - $gmin);

					echo round($gdays); ?> days, <?php echo round($ghrs); ?> hours, <?php echo round($gmin); ?> minutes and <?php echo round($gsec); ?> seconds</b></td>
	</tr>
	<tr class="row2">
		<td>Total number of challenges completed:</td>
		<td align="right"><b><?php					
					$query = "SELECT * FROM tc_data WHERE tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [302]"); 					
					$totchal = mysql_num_rows($fnc); 
					
					echo $totchal; ?></b></td>
	</tr>
</table>
<p>Tube Challenges by year:</p>
<?php $query = "SELECT count(year(tc_date)) as no, year(tc_date) FROM `tc_data` WHERE tc_name LIKE '$name' group by year(tc_date) order by no desc limit 1";
					$fnc = mysql_query($query) or die("Select Failed! [400]"); 					
					$fncdata = mysql_fetch_array($fnc); $maxreturn = $fncdata['no']; ?>
<table class="stats" align="center" border="0" cellpadding="0" cellspacing="1">
<?php $i=1999;
	while ($i <= date("Y")): ?>
  <tr>
    <td class="row2" width="40">&nbsp;<?php echo $i; ?></td>
	<td width="700"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE year(tc_date) = ".$i." AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(700*($fncdata/$maxreturn)); ?>" alt="<?php echo $i; ?>: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
  </tr><?php $i++; endwhile; ?>
</table>  
<p>Tube Challenges by month:</p>
<?php $query = "SELECT count(month(tc_date)) as no, month(tc_date) FROM `tc_data` WHERE tc_name LIKE '$name' group by month(tc_date) order by no desc limit 1";
					$fnc = mysql_query($query) or die("Select Failed! [400]"); 					
					$fncdata = mysql_fetch_array($fnc); $maxreturn = $fncdata['no']; ?>
<table class="stats" align="center" border="0" cellpadding="0" cellspacing="1">
<?php $i=1;
	while ($i <= 12): ?>
  <tr>
    <td class="row2" width="80">&nbsp;<?php echo date("F", mktime(0,0,0,$i,1,2008)); ?></td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE month(tc_date) = ".$i." AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="<?php echo date("F", mktime(0,0,0,$i,1,2008)); ?>: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr><?php $i++; endwhile; ?>
</table>  
<p>Tube Challenges by day:</p>
<?php $query = "SELECT count(dayname(tc_date)) as no, dayname(tc_date) FROM `tc_data` WHERE tc_name LIKE '$name' group by dayname(tc_date) order by no desc limit 1";
					$fnc = mysql_query($query) or die("Select Failed! [400]"); 					
					$fncdata = mysql_fetch_array($fnc); $maxreturn = $fncdata['no']; ?>
<table class="stats" align="center" border="0" cellpadding="0" cellspacing="1">
  <tr>
    <td class="row2" width="80">&nbsp;Monday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Monday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Monday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Tuesday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Tuesday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Tuesday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Wednesday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Wednesday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Wednesday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Thursday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Thursday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Thursday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Friday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Friday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Friday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Saturday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Saturday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Saturday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
    <tr>
    <td class="row2" width="80">&nbsp;Sunday</td>
	<td width="630"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE dayname(tc_date) = 'Sunday' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(630*($fncdata/$maxreturn)); ?>" alt="Sunday: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
</table> 
<p>Tube Challenges by type:</p>
<?php $query = "SELECT count(tc_challenge) as no, tc_challenge FROM `tc_data` WHERE tc_name LIKE '$name' group by tc_challenge order by no desc limit 1";
					$fnc = mysql_query($query) or die("Select Failed! [400]"); 					
					$fncdata = mysql_fetch_array($fnc); $maxreturn = $fncdata['no']; ?>
<table class="stats" align="center" border="0" cellpadding="0" cellspacing="1">
    <tr>
    <td class="row2" width="110">&nbsp;Snake</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge in ('SNK','SK2') AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="129 Snake: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;All Lines</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge in ('A11', 'A12') AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="All Lines: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Alphabet</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'ABC' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Alphabet: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Boroughs</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'BOR' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Alphabet: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Bottle</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'BOT' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Bottle: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Christmas Park</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'PRK' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Christmas Park: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;DLR</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge in ('D3E', 'D38', 'D39') AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="DLR: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;Full Network</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge in ('268', '269', '270', '274', '275') AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Full Network: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;Mouse</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'MOU' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Mouse: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;Pts/Compass</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'POC' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Points of the Compass: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
  <tr>
    <td class="row2" width="110">&nbsp;Random 15</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'R15' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Random 15: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Roads/Streets</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'RSL' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Alphabet: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;South London</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge in ('S29', 'S33') AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="South London: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;Tramlink</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'TRM' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Tramlink: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
        <tr>
    <td class="row2" width="110">&nbsp;Zone 1</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'Z1C' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Zone 1: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
      <tr>
    <td class="row2" width="110">&nbsp;Zones 1 &amp; 2</td>
	<td width="600"><img src="/statistics/dot.png" height="25" width="<?php	$query = "SELECT * FROM tc_data WHERE tc_challenge = 'Z12' AND tc_name LIKE '$name'";
					$fnc = mysql_query($query) or die("Select Failed! [401]"); 					
					$fncdata = mysql_num_rows($fnc); echo round(600*($fncdata/$maxreturn)); ?>" alt="Alphabet: <?php echo $fncdata; ?> challenges" /></td>
	<td class="row2" width="40" align="right"><?php echo $fncdata; ?>&nbsp;</td>
	<td width="30">&nbsp;<i><?php echo round(100*($fncdata/$totchal), 0); ?>%</i></td>
  </tr>
</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>