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

include 'dbconnection.php';
include 'navigation_bar.php'; 

$validMessage = true;

if(!isset($_POST['MessageReply']))
{
	echo "You must have valid text to reply!";
	$validMessage = false;
}

if(!isset($_POST['recipient']))
{
	echo "Invaid user id!";
	$validMessage = false;
}

if($validMessage)
{
	$replyText = $_POST['MessageReply'];
	$recipientId = $_POST['recipient'];
	$senderId = $_SESSION['uid'];

	$replyText = mysqli_real_escape_string($dbcon, $replyText);

	// Do the message first
	$query = "INSERT INTO tbl_messages (message_text) VALUES ('$replyText')";
	$result = mysqli_query($dbcon, $query);

	$messageId = $dbcon->insert_id;

	// now insert the recipient information
	$query = "INSERT INTO tbl_recipients (message_id, recipient_id, sender_id) VALUES ('$messageId', '$recipientId', '$senderId')";
	$result = mysqli_query($dbcon, $query);

	// redirect them now
	header("location:view_messages.php");
}

?>

</body>
</html>