<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="../default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">&nbsp;Missing Data</div>
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
<h3>Appeal</h3>
 <p>One of the new functions on the site is a record-progress-evolution-tracker thingy. It sorts the leagues by date to show the evolution of the record, and how long each person held it. It can be catastrophically wrong in places - e.g. I know joy54/zeibura held the Alphabet record at one stage - but without the date they set that time, it gets excluded from the list and instead senji (nice chap though he is) gets credited as being a former record holder!</p>
 <p>So, I need missing dates. I've checked the forum as much as I can cope with - 3 solid evenings in fact! There are a few instances where the month and year are given but not the day - if you can get these any more precise, then that's all the better!</p>
 <p>List of missing dates:</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td>What</td>
					<td>Name</td>
					<td width="75" align="right">Time&nbsp;</td>
				</tr>
				<?php
					$query = "SELECT * FROM tc_data INNER JOIN tc_challenge on tc_data.tc_challenge = tc_challenge.tc_challenge WHERE tc_date is null ORDER BY tc_data.tc_challenge, tc_hours, tc_mins, tc_sec";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0;

					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } if($fncdata['tc_date']){if($now - date("U", strtotime($fncdata['tc_date'])) < 2419200){ ?>" style="color: #0000FF<?php }} ?>">
					<td><i><?php echo $fncdata['tc_challenge_name']; ?></i>&nbsp;</td>
					<td>&nbsp;<?php echo $fncdata['tc_name']; ?></td>
					<td align="right"><?php echo $fncdata['tc_hours']; ?>:<?php if ($fncdata['tc_mins'] < 10){ ?>0<?php } echo $fncdata['tc_mins']; ?>:<?php if ($fncdata['tc_sec'] < 10){ ?>0<?php } echo $fncdata['tc_sec']; ?>&nbsp;</td>
				</tr>
				<?php 
				if($fncpos%10 == 0){ ?>
				<tr height="10">
					<td colspan="5">&nbsp;</td>
				</tr><?php } } ?>
			</table>
<p>Please, check if you have any times listed here, and if you can remember the date then please <a href="mailto:tube@scriv.me.uk">email</a> it in so it can be added :)</p>
 </div>
</body>
</html>