<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
session_start();
include 'navigation_bar.php'; 
include 'dbconnection.php';


$pool = array();
$i = 0;




// get current user's preferences and gender
	$query = "SELECT tbl_users.male_friend,
					   tbl_users.female_friend,
					   tbl_users.male_date,
					   tbl_users.female_date,
					   tbl_users.gender
				  FROM swe3613_db05p2.tbl_users tbl_users
				WHERE tbl_users.user_id = ".$_SESSION['uid'].";";

	$result = mysqli_query($dbcon, $query);
	$row_count = @mysqli_num_rows($result);
	
	if($row_count==1){	
		$row = mysqli_fetch_assoc($result);
		$my_gender = $row["gender"];
		
		if( $my_gender == 'male' and $row['male_friend'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="male" AND tbl_users.male_friend=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
		elseif( $my_gender == 'female' and $row['male_friend'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="male" AND tbl_users.female_friend=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
		if( $my_gender == 'male' and $row['male_date'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="male" AND tbl_users.male_date=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
		if( $my_gender == 'female' and $row['male_date'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="male" AND tbl_users.female_date=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
		if( $my_gender == 'male' and $row['female_friend'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="female" AND tbl_users.male_friend=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}			
		}	
		if( $my_gender == 'female' and $row['female_friend'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="female" AND tbl_users.female_friend=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}			
		}	
		if( $my_gender == 'male' and $row['female_date'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="female" AND tbl_users.male_date=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
		if( $my_gender == 'female' and $row['female_date'] == 1 ){
			$query = 'SELECT tbl_users.user_id FROM swe3613_db05p2.tbl_users tbl_users WHERE gender="female" AND tbl_users.female_date=1;';
			$result = mysqli_query($dbcon, $query);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$pool[$i+1] = $row["user_id"];
					$i++;
				}
			}
		}
	}
	else {
		echo "Error getting your preferences<br />";
		echo 'SQL: '.$sql.'<br />';
	}




$rand_prospect = rand(1, count($pool));
$query = "SELECT tbl_users.user_id,
				 tbl_users.gender,
				 tbl_users.age,
				 tbl_users.first_name,
				 tbl_users.last_name,
				 tbl_users.about_me
		  FROM swe3613_db05p2.tbl_users tbl_users
		  WHERE (tbl_users.user_id = ".$pool[$rand_prospect].");";
		  
$result = mysqli_query($dbcon, $query);
$row_count = @mysqli_num_rows($result);
if($row_count==1){
	$row = mysqli_fetch_assoc($result);
	$_SESSION["prospect_uid"] = $row["user_id"];
	$prospect_first_name = $row["first_name"];
	$prospect_last_name = $row["last_name"];
	$prospect_age = $row["age"];
	$prospect_gender = $row["gender"];
	$prospect_about_me = $row["about_me"];
}
else {
	echo "Error in fetching prospective user from database<br \>";
	echo $query."<br \>";
}

?>
<div class="user_info">
	<?php 
		echo $prospect_first_name.' '.$prospect_last_name.'<br>';
		echo 'Age: '.$prospect_age.' Gender: '.$prospect_gender.'<br>';
		echo 'About Me:<br>'.$prospect_about_me.'<br>';
	?>
</div>
<div id="tickle_or_run">
	<form name="login_form" method="post" action="run.php">
		<input class="torr_btn" type="submit" name="run" value="Run" style="float: left;">
	</form>
	<form name="login_form" method="post" action="tickle.php">
		<input class="torr_btn" type="submit" name="tickle" value="Tickle" style="float: right;">
	</form>
</div>

</body>
</html>