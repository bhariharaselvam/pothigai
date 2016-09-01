<?php

    
	//enter your MySQL database host name, often it is not necessary to edit this line

	$db_host = "localhost";

	//enter your MySQL database username
	$db_username = "hariharaselvam";
	
	//enter your MySQL database password
	$db_password = "hariharaselvam";
	
	//enter your MySQL database name
	$db_name = "pothigai";
	 
	$dbh = mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());
	
	//select database
	mysql_select_db($db_name,$dbh) or die(mysql_error." -could not find DB.");
?>