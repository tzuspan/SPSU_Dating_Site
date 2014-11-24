<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	error_reporting(E_ALL);
?>

</head>
<body>

<?php
session_start();

include 'dbconnection.php';
include 'navigation_bar.php';

$replyText = $_POST[''];

$email_address = $_POST['EmailAddress'];
$password = $_POST['Password'];
$gender = $_POST['Gender'];
$age = $_POST['Age'];
$first_name = $_POST['FirstName'];
$last_name = $_POST['LastName'];
$mf = $_POST['MaleFriend'];
$ff = $_POST['FemaleFriend'];
$md = $_POST['MaleDate'];
$fd = $_POST['FemaleDate'];
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