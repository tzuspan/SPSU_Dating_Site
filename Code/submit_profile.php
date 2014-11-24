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

</body>
</html>