<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php if(!empty($_GET)) extract($_GET); ?>
<html>
<head>
  <title>Results :: Tube Challenge Darts League</title>
  <link rel="stylesheet" href="/new.css">
  <link rel="author" href="mailto:darts@scriv.me.uk">
  <meta name="author" content="Matthew Scrivin">
  <meta name="description" content="Personal Homepage of Matthew Scrivin">
</head>
<body>
<?php
	include('../settings.php');
	include('../base.php');
?>
<div id="page">
<?php
	$query2 = "SELECT * FROM darts_matches WHERE match_key = '$match' ORDER BY match_played_date DESC, match_key DESC";
	$moo2 = mysql_query($query2) or die("Select Failed! [502]");
	$isany = mysql_num_rows($moo2);

	if(!$match || $isany == 0){ ?><p>No match found - please <a href="/admin/results/" class="player">return to match list</a></p><?php } else { ?>
	
	
<p>All results:</p>
<p>
<?php
	while ($metails = mysql_fetch_array($moo2)){ $pos++; ?>Date: <?php echo date("d-M-Y", strtotime($metails['match_played_date'])); ?><br />
	<?php echo $metails['winner_1']; ?><br />
	<?php echo $metails['winner_2']; ?><br />
	<?php echo $metails['loser_1']; ?><br />
	<?php echo $metails['loser_2']; ?><br />
	<?php echo $metails['checkout_thrown_by']; ?><br />
	<?php echo $metails['checkout_score']; ?><br />
	<?php echo $metails['match_venue_key']; ?><br />
<?php } ?></p>
<?php } ?>
<p>* Non-tube challengers</p>
</div>

</body>
</html>