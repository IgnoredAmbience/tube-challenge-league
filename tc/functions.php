<?php
	function display_header($page_title, $directory_depth)
	{
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
		echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
		echo "\t<head>\n";
		echo "\t\t<title>Tube Challenge League Tables</title>\n";
		echo "\t\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
		echo "\t\t<link rel=\"stylesheet\" title=\"Default\" type=\"text/css\" href=\"";
		while($directory_depth)
		{
			echo "../";
			$directory_depth--;
		}
		echo "default.css\" />\n";
		echo "\t</head>\n";
		echo "\t<body>\n";
		echo "\t\t<div id=\"temps\">Page generated at: ".date("H:i").",&nbsp;".date("d.m.y")."&nbsp;[<a class=\"text\" href=\"javascript:location.reload()\">refresh?</a>]&nbsp;</div>\n";
		echo "\t\t<div id=\"header1\">&nbsp;Tube Challenge League Tables</div>\n";
		echo "\t\t<div id=\"header2\">$page_title&nbsp;</div>\n";
	}
	
	function display_menu($directory_depth)
	{
		$depth = "";
		echo "\t\t<div id=\"header3\">\n";
		echo "\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
		echo "\t\t\t\t<tr style=\"text-align: center\">\n";
		while($directory_depth)
		{
			$depth .= "../";
			$directory_depth--;
		}
		echo "\t\t\t\t\t<td class=\"header3\" width=\"25%\"><a href=\"$depth.\">&#187; Home &#171;</a></td>\n";
		echo "\t\t\t\t\t<td class=\"header3\" width=\"25%\"><a href=\"$depth"."events/\">&#187; Events &#171;</a></td>\n";
		echo "\t\t\t\t\t<td class=\"header3\" width=\"25%\"><a href=\"$depth"."challengers/\">&#187; Challengers &#171;</a></td>\n";
		echo "\t\t\t\t\t<td class=\"header3\" width=\"25%\"><a href=\"http://darts.scriv.me.uk/\">&#187; Darts &#171;</a></td>\n";
		echo "\t\t\t\t</tr>\n";
		echo "\t\t\t</table>\n";
		echo "\t\t</div>\n";
	}
	
	function display_submenu($type, $directory_depth)
	{
		$depth = "";
		echo "\t\t<div id=\"header4\">\n";
		echo "\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n";
		echo "\t\t\t\t<tr style=\"text-align: center\">\n";
		while($directory_depth)
		{
			$depth .= "../";
			$directory_depth--;
		}
		if($type == "event")
		{
			echo "\t\t\t\t\t<td class=\"header3\" width=\"33%\"><a href=\"../league/\">&#187; Current League Table &#171;</a></td>\n";
			echo "\t\t\t\t\t<td class=\"header3\" width=\"34%\"><a href=\"../history/\">&#187; Record History &#171;</a></td>\n";
			echo "\t\t\t\t\t<td class=\"header3\" width=\"33%\">&#187; Statistics &#171;</td>\n";
		}
		else
		{
			echo "\t\t\t\t\t<td class=\"header3\" width=\"33%\"><a href=\"$depth"."missing/\">&#187; Appeal &#171;</a></td>\n";
			echo "\t\t\t\t\t<td class=\"header3\" width=\"34%\"><a href=\"$depth"."latest/\">&#187; Latest Times &#171;</a></td>\n";
			echo "\t\t\t\t\t<td class=\"header3\" width=\"33%\"><a href=\"$depth"."statistics/\">&#187; Statistics &#171;</a></td>\n";
		}
		echo "\t\t\t\t</tr>\n";
		echo "\t\t\t</table>\n";
		echo "\t\t</div>\n";
	}
	
	function display_footer($page_title)
	{
		$page_title = str_replace(" ", "%20", $page_title);
		echo "\t\t\t<p>Errors? Omissions? Dates? Email: <a href=\"mailto:tube@scriv.me.uk?subject=$page_title\">tube&#64;scriv.me.uk</a>.</p>\n";
		echo "\t\t</div>\n\t</body>\n</html>";
	}
?>