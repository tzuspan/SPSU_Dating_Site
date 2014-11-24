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

	// Show the user the names of those whom tickled them
	$userId = $_SESSION["uid"];
	$query = "SELECT tickler_id, tickle_timestamp FROM tbl_tickles WHERE ticklee_id='$userId'";
	$result = mysqli_query($dbcon, $query);
	$rowCount = @mysqli_num_rows($result);
	
	if(!$rowCount)
	{
		echo "No one has tickled you yet :(";
	}
	else
	{
		// Adjust some spacing
		echo "<br>";
	
		$rowArray = null;
		
		// Store the person that tickled us. This is needed
		// so we can lookup their name below.
		while($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
			$rowArray[] = $row;
		}
		
		// This should probably be a foreach
		$max = sizeof($rowArray);
		
		for($i = 0; $i < $max; $i++)
		{
			$row = $rowArray[$i];
			$query = "SELECT first_name, last_name FROM tbl_users WHERE user_id='$row[0]'";
			$result = mysqli_query($dbcon, $query);
			$rowCount = @mysqli_num_rows($result);
			
			$nameRow = mysqli_fetch_array($result, MYSQL_NUM);
			
			echo $nameRow[0]; 
			echo " "; 
			echo $nameRow[1]; 
			echo " tickled you on "; 
			echo $row[1];
			
			// Let's add a button to message them?
			echo "<br>";
		}
	}
}

?>

</body>
</html>