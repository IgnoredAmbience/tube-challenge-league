<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">&nbsp;Events Index</div>
<?php include('../menu.php'); ?>
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
<p>Where times are set during organised events (defined as wished, although all events should have more than one competitor), this is recorded on the database. Below is a list of all such &#8216;events&#8217; where times were recorded. Click through to see the results of the event.</p>
<p>This list will be incomplete whilst events remain missing from the data.</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<tr class="newshead">  
					<td width="200">Event name</td>
					<td width="90">Type</td>
					<td width="75">Date</td>
				</tr>
				<?php	mysql_pconnect("localhost","Mcrivpro","password")
					or die("Unable to connect to SQL server");
					mysql_select_db("Mcrivpro") or die("Unable to connect to database"); 
					
					$query = "SELECT DISTINCT tc_event, tc_date, tc_short_name, tc_data.tc_challenge FROM tc_data INNER JOIN tc_challenge on tc_data.tc_challenge = tc_challenge.tc_challenge WHERE tc_event is not null AND tc_event <> '(First Ever Z1 time)' ORDER BY tc_date DESC";
					$fnc = mysql_query($query) or die("Select Failed! [902]");

					$fncpos = 0;
						
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 
						?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><a href="results.php?event=<?php echo $fncdata['tc_event']; ?>&date=<?php echo $fncdata['tc_date']; ?>&type=<?php echo $fncdata['tc_challenge']; ?>"><?php echo $fncdata['tc_event']; ?></a></td>
					<td><?php echo $fncdata['tc_short_name']; ?></td>
					<td><?php echo date("d.m.Y", strtotime($fncdata['tc_date'])); ?></td>
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