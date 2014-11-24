<?php
session_start();

include 'dbconnection.php';

//$replyText = $_POST[''];
$email_address = $_POST["EmailAddress"];
$password = $_POST['Password'];
$gender = $_POST['Gender'];
$age = $_POST['Age'];
$first_name = $_POST['FirstName'];
$last_name = $_POST['LastName'];
if( isset($_POST['MaleFriend']) )
	$mf = 1;
else
	$mf = 0;
if( isset($_POST['FemaleFriend']) )
	$ff = 1;
else
	$ff = 0;
if( isset($_POST['MaleDate'])   )
	$md = 1;
else
	$md = 0;
if( isset($_POST['FemaleDate']) )
	$fd = 1;
else
	$fd = 0;
$about_me = $_POST['AboutMe'];


$query = "UPDATE tbl_users SET email_address=$email_address WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET password=$password WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET gender=$gender WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET age=$age WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET first_name=$first_name WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET last_name=$last_name WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET male_friend=$mf WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET female_friend=$ff WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET male_date=$md WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET female_date=$fd WHERE id=$uid";
$result = mysqli_query($dbcon, $query);
$query = "UPDATE tbl_users SET about_me=$about_me WHERE id=$uid";
$result = mysqli_query($dbcon, $query);

header("location:index.php");
?>