# Tube Challenge League Tables #

**Tube Challenge League Tables: Code Collaboration**

Stop! Read this before using svn!

## SVN Help ##
The official [Subversion online book](http://svnbook.red-bean.com/en/1.5/index.html) is indispensible, [especially this bit](http://svnbook.red-bean.com/en/1.5/svn.tour.cycle.html).

## Checking Out ##
Use command...
```
svn checkout https://tube-challenge-league.googlecode.com/svn/tc/ tube-challenge-league --username <your_username>
```
...to do the initial checkout (_note the /tc at the end of the url, not /trunk_ as Google gives you otherwise you'll pick up the /wiki files too). You will then be prompted for your password, which is found [here](http://code.google.com/hosting/settings).

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

When checking the status of your working directory with svn you will notice the following:
```
c:\wamp\www\tube-challenge-league>svn status
?       settings.php
```

The question mark means the file is **not** under version control, which is intentional as we don't want individual people's local settings being accidentally committed and, worse, being checked out by others. As long as you **don't** add it to the repository you'll be just fine.

**So never do this:**
```
svn add settings.php
```