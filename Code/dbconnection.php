<?php
	/**
	 * Database connection. Include this file on top of your other php scripts
	 * and thus you can perform queries using the $dbcon value.
	 */
	$hostName = "swe3613.com";
	$databaseName = "swe3613_db05p2";
	$userName = "dba05p2swe3613";
	$password = "1234dtfgh786rtgh";
	
	try
	{
		$dbcon = mysqli_connect("$hostName", "$userName", "$password", "$databaseName");
	}
	catch(mysqli_sql_exception $ex)
	{
		// There was a problem accessing the script
		// so let's currently just print the error
		// and we will terminate running the script.
		print "Error: " $ex;
		die();
	}
	