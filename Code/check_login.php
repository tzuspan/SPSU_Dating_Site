<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="swe3613_db05p2"; // Database name
$tbl_name="tbl_users"; // Table name

$conn = mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT user_id FROM $tbl_name WHERE email_address='$myusername' and password='$mypassword';";
$result=mysqli_query($conn, $sql);
$count=@mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	$row = mysqli_fetch_assoc($result);
	echo 'Result : '.$row["user_id"].'<br />';
	$_SESSION['uid'] =  $row["user_id"];
	// On success redirect to pairing_page.php
	header("location:pairing_page.php");
}
else {
	echo "Wrong Username or Password";
}
?>