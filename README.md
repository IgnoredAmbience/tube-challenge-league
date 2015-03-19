# Tube Challenge League Tables #
## Introduction ##

Hello everyone, thanks for joining and helping me out. Itt might not be the most sophisticated prgramming challenge in the world, but nevertheless it's one I had run out of steam on alone. I hadn't considered anything like this, sharing the work out and spreading the load, and that alone has refreshed my appetite somewhat. Thanks for agreeing to help!

## A brief history of the website ##

The website was stolen (with permission) from Jonny Lyon (jonny on the forum)'s original site, which was maintained on an Excel spreadsheet which he saved as a webpage and uploaded. Whilst that is a fairly easy to maintain system (add new time, sort, save, upload), I decided to take on the challenge of making it a bit more fancy. I went live before I intended when jonny's site disappeared, and that's pretty much the state it is still in now - functional but stalled. As I said on the forum, I pretty much lost all my momentum when it came to developing it, with so much (see the Issues page) left to do on it. Since then, I have been labouriously inputting new data manually via MySQL...

## The future ##

Hopefully now there's a few of us, things can go forward. I've been listing issues I wished to address when I ran it alone on the issues page, so we can all take a look and decide if they really are issues or not, whether to develop them. Add anything that comes to mind. I can even try and chip in. The first task may well to get my code looking respectable. I won't take offence, so do what's necessary!

Cheers
Matt :)

## Code Collaboration ##
Follow the [GitHub Bootcamp](https://help.github.com/categories/bootcamp/) to get started.

## Database ##
Next step is to import the tables into MySQL (I consider [phpMyAdmin](http://www.phpmyadmin.net/home_page/index.php) essential). You'll need to create a database first, then import the three tables when done. If you make changes to any table, export each as an SQL file (same filename as before), then commit to the repository. If you find changed tables when updating your working copy of the code, you'll have to merge changes manually.

## Settings File ##
Final step is to create a file "settings.php", in the root of your working directory, with the following contents, substituting the values in angle brackets for your local settings:
```
<?php
	mysql_pconnect("<your_hostname>", "<your_username>", "<your_password>") or die("Unable to connect to SQL server");
	mysql_select_db("<your_db_name>") or die("Unable to connect to database");
?>
```
