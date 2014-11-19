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
		$dbcon = new PDO('mysql:host='.$hostName.';dbname='.$databaseName, $userName, $password);	
	}
	catch(PDOException $ex)
	{
		print "Error: ".$ex->getMessage()."<br/>";
		die();
	}