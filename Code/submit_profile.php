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


$query = "INSERT INTO tbl_users
(
	email_address,
	password,
	gender,
	age,
	first_name,
	last_name,
	male_friend,
	female_friend,
	male_date,
	female_date,
	about_me
)
VALUES
(
	'$email_address',
	'$password',
	'$gender',
	'$age',
	'$first_name',
	'$last_name',
	$mf,
	$ff,
	$md,
	$fd,
	'$about_me'
)";

$result = mysqli_query($dbcon, $query);

header("location:index.php");
?>