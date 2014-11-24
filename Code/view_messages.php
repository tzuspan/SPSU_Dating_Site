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


/** 
 * Sorry the code below you is a huge mess...
 */
 
function PrintUserMessage($messageId, $recipient, $sender, $userId)
{
	// This is because of variable scopage
	include 'dbconnection.php';

	// Let's go ahead and get the messages...
	$query = "SELECT message_text FROM tbl_messages where message_id='$messageId'";
	$result = mysqli_query($dbcon, $query);
	$rowCount = @mysqli_num_rows($result);
	$row = mysqli_fetch_array($result, MYSQL_NUM);

	if(!$rowCount)
	{
		// The message doesn't exist?
		echo "Message not found!";
	}
	else
	{
		GetUserName($recipient, $sender, $userId);
		
		echo "<p>";
		echo $row[0];
		echo "</p>";
		
		echo "<div>";
		echo "<form id='form1' action='send_message.php' method='POST'>";
			echo "<textarea id='MessageReply' rows='4' cols='50' name='MessageReply' maxlength='5000'></textarea><br><br>";
			echo "<input type='submit' value='Reply'>";
			echo "<input type='hidden' name='recipient' value='$sender'>";
		echo "</form>";
		echo "</div>";
	}
}

function GetUserName($theirId, $senderId, $userId)
{
	if($senderId != $userId && $theirId == $userId)
	{
		// Variable scopage..
		include 'dbconnection.php';
		
		// First thing we will do is get the user name..
		$userNameQuery = "SELECT first_name, last_name FROM tbl_users WHERE user_id='$senderId'";
		$result = mysqli_query($dbcon, $userNameQuery);
		$userRow = mysqli_fetch_array($result, MYSQL_NUM);
		
		$firstName = $userRow[0];
		$lastName = $userRow[1];
		
		echo "Latest message with "; 
		echo $firstName;
		echo " ";
		echo $lastName;
		echo "</a>";
		echo "<br>";
	}
}

function PrintMessageError()
{
	echo "<br>You do not have permission to view this message!";
}
?>

<?php
include 'dbconnection.php';
include 'navigation_bar.php';

// If the user is not logged in yet lets
// go ahead and inform them they must be, then
// provide a link to the login page.	
if(!isset($_SESSION["uid"]))
{
	echo "You must be logged in to view this page! Please ";
	echo '<a href="index.php">login</a> to continue';
}
else
{
	$userId = $_SESSION["uid"];	
	
	if(isset($_GET['msgId']))
	{
		
		$msgId = $_GET['msgId'];
		
		// This is our specific message id.. let's make sure that 
		// We actually have permision to read it..
		$query = "SELECT recipient_id, sender_id FROM tbl_recipients WHERE message_id='$msgId'";
		$result = mysqli_query($dbcon, $query);
		$rowCount = @mysqli_num_rows($result);
		
		// The user doesn't have permission to view this message
		if(!$rowCount)
		{
			PrintMessageError();
		}
		else
		{
			$row = mysqli_fetch_array($result, MYSQL_NUM);
			$recipient = $row[0];
			
			if($row[0] != $userId && $row[1] != $userId) 
			{
				PrintMessageError();
			}
			else
			{
				PrintUserMessage($msgId, $recipient, $row[1], $userName);
			}
		}
	}
	else
	{
		$query = "SELECT message_id, recipient_id, sender_id FROM tbl_recipients WHERE recipient_id='$userId' ORDER BY message_id DESC";
		$result = mysqli_query($dbcon, $query);
		$rowCount = @mysqli_num_rows($result);
	
		if($rowCount > 0)
		{
			echo "<br>";
		
			while ($row = mysqli_fetch_array($result, MYSQL_NUM)) 
			{
				
				// Now let's go ahead and loop over... shall we?
				echo '<a href="/view_messages.php?msgId='; 
				// The message id
				echo $row[0]; 
				echo "\">";
				
				GetUserName($row[1], $row[2], $userId);
			}
		}
	}
}
?>

</body>
</html>