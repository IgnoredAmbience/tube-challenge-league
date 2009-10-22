<?php
	function display_header($page_title, $directory_depth)
	{
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
		echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
		echo "\t<head>\n";
		echo "\t\t<title>Tube Challenge League Tables - UNDER CONSTRUCTION!!</title>\n";
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
		echo "\t\t<div id=\"header1\">&nbsp;Tube Challenge League Tables - UNDER CONSTRUCTION!!</div>\n";
		echo "\t\t<div id=\"header2\">$page_title&nbsp;</div>\n";
	}
	
	function display_footer($page_title)
	{
		$page_title = str_replace(" ", "%20", $page_title);
		echo "\t\t\t<p>Errors? Omissions? Dates? Email: <a href=\"mailto:tube@scriv.me.uk?subject=$page_title\">tube&#64;scriv.me.uk</a>.</p>\n";
		echo "\t\t</div>\n\t</body>\n</html>";
	}
?>