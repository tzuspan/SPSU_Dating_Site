<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php session_start(); ?>
</head>
<body>

<?php
session_start();

include 'dbconnection.php';
include 'navigation_bar.php';

$tbl_name="tbl_users"; // Table name

// username and password sent from form
$myusername=$_POST["myusername"];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($dbcon, $myusername);
$mypassword = mysqli_real_escape_string($dbcon, $mypassword);

$sql="SELECT user_id FROM $tbl_name WHERE email_address='$myusername' and password='$mypassword';";
$result=mysqli_query($dbcon, $sql);
$count=@mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	$row = mysqli_fetch_assoc($result);
	//echo 'Result : '.$row["user_id"].'<br />';
	$_SESSION['uid'] =  $row["user_id"];
	// On success redirect to pairing_page.php
	header("location:pairing_page.php");
}
else {
	echo "Wrong Username or Password<br />";
	echo 'SQL: '.$sql.'<br />';
}

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
	'$user_id',
	'$email_address',
	'$password',
	'$gender',
	'$age',
	'$first_name',
	'$last_name',
	'$mf,
	'$ff,
	'$md,
	'$fd,
	'$about_me'
)";

$result = mysqli_query($dbcon, $query);

?>