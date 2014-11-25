<?php
include 'dbconnection.php';
session_start();

$query = 'INSERT INTO swe3613_db05p2.tbl_runs(
			runner_id, runee_id )
		  VALUES (
			'.$_SESSION["uid"].', '.$_SESSION[prospect_uid].' );';

$result = mysqli_query($dbcon, $query);
$row_count = @mysqli_num_rows($result);

header("location:pairing_page.php");

?>