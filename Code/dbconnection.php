<?php
	/**
	 * Database connection. Include this file on top of your other php scripts
	 * and thus you can perform queries using the $dbcon value.
	 */
	$hostName = "swe3613.com";
	$databaseName = "swe3613_db05p2";
	$userName = "wapp05p2swe3613";
	$password = "7856dfgh45df";
	
	$dbcon = mysqli_connect("$hostName", "$userName", "$password", "$databaseName");
	// Check connection
	if (!$dbcon) {
		die("Connection failed: " . mysqli_connect_error());
		
	}
?>