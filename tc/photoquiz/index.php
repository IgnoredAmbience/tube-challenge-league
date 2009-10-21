<?php if(!empty($_GET)) extract($_GET); if(!empty($_POST)) extract($_POST); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" title="Default" type="text/css" href="/default.css" />
</head>
<body><div id="temps">Page generated at: <?php echo date("H:i"); ?>,&nbsp;<?php echo date("d.m.y"); ?>&nbsp;[<a class="text" href="javascript:location.reload()">refresh?</a>]&nbsp;</div>
<div id="header1">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>
<div id="header2">Photo Quiz Results&nbsp;</div>
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
	<?php 		mysql_pconnect("localhost","Mcrivpro","password")
					or die("Unable to connect to SQL server");
					mysql_select_db("Mcrivpro") or die("Unable to connect to database"); ?>
<p>Welcome to the Photo Quiz results centre.</p>
			<table align="center" cellpadding="0" cellspacing="1">
				<?php
					$query = "SELECT * FROM tc_photo4";
					$fnc = mysql_query($query) or die("Select Failed! [302]");

					$fncpos = 0; $corr = 0; ?>
				<tr class="newshead" style="text-align: center">
					<td style="background-color: #FFF" width="150">&nbsp;</td>
				<?php for ($i = 0; $i <= 20; $i++) { ?>
					<td width="30">Q<?php if($i == 0){ $j = 1; } elseif($i == 1){ $j = "2a"; } elseif($i == 2){ $j = "2b"; } else { $j = $i; } echo $j; ?></td><?php } ?>
					<td width="50" class="newshead">Total</td>
				</tr><?php
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; 	?>
				<tr height="18" class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><?php echo $fncdata['username']; ?></td>
				<?php for ($i = 0; $i <= 20; $i++) { ?>
					<td<?php $field = "q".$i; if($fncdata[$field] == 1){ ?> style="background-color: #BFB"><img src="tick.png" alt="*" border="0"/><?php $corr++; } else { ?>>&nbsp;<?php } ?></td><?php } ?>
					<td class="newshead" align="right"><?php echo $corr; $corr = 0; ?>&nbsp;</td>
				</tr><?php } ?>
			</table>
<p>Errors? Omissions? Dates? Email: <a href="mailto:tube@scriv.me.uk">tube&#64;scriv.me.uk</a>.</p>
</div>
</body>
</html>