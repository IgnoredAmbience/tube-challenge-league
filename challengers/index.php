<?php
	include('../settings.php');
	include('../functions.php');
	
	$page_title = "Challengers";
	$directory_depth = 1;
	$type = "main";
	display_header($page_title, $directory_depth); 
	display_menu($directory_depth);
	display_submenu($type, $directory_depth);
?>
		<div id="content">
			<h3>&nbsp;</h3>
			<p>To access a list of times and selected statistics for a given challenger, please search by first and last name. This functionality relies on consitent spelling of names in the database and as such may not be 100% accurate, and should not be considered such.</p>
			<p>If you find your name spelt incorrectly, or a team name where you were a member, please <a href="mailto:tube@scriv.me.uk?subject=Challengers">get in touch</a> with the details!</p>
			<form method="get" align="center" action="results.php">
				<input type="text" name="name" size="50" maxlength="50" value="" />
				<input type="submit" value="Search" />
			</form>
<?php display_footer($page_title); ?>