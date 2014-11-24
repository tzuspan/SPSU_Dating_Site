<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	session_start();
	error_reporting(E_ALL);
?>
</head>
<body>
<?php
	include 'dbconnection.php';
	include 'navigation_bar.php';

	echo 'uid : '.$_SESSION["uid"];
	// If the user is not logged in yet
	// inform them they must be, then
	// provide a link to the login page.
	if(!isset($_SESSION["uid"]))
	{
		echo "You must be logged in to view this page! Please ";
		echo '<a href="index.php">login</a> to continue';
	}
	else
	{
		$userId = $_SESSION["uid"];

		$query = "SELECT first_name FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$firstName = $row["first_name"];
			}
		}
		$query = "SELECT last_name FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$lastName = $row["last_name"];
			}
		}

		$query = "SELECT email_address FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$emailAddress = $row["email_address"];
			}
		}

		$query = "SELECT password FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$password = $row["password"];
			}
		}

		$query = "SELECT gender FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$gender = $row["gender"];
			}
		}

		$query = "SELECT age FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$age = $row["age"];
			}
		}

		$query = "SELECT female_friend FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$ff = $row["female_friend"];
			}
		}

		$query = "SELECT male_friend FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$mf = $row["male_friend"];
			}
		}

		$query = "SELECT female_date FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$fd = $row["female_date"];
			}
		}

		$query = "SELECT male_date FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$md = $row["male_date"];
			}
		}

		$query = "SELECT about_me FROM tbl_users where user_id='$userId'";
		$result = mysqli_query($dbcon, $query);
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$aboutMe = $row["about_me"];
			}
		}
	}
?>

<div>
	<form action="update_profile.php">
		First Name:<br>
		<input required type="text" name="FirstName"	value="<?php echo $firstName;?>"><br><br>
		Last Name:<br>
		<input required type="text" name="LastName"		value="<?php echo $lastName;?>"><br><br>
		Email Address:<br>
		<input required type="text" name="EmailAddress"	value="<?php echo $emailAddress;?>"><br><br>
		Password:<br>
		<input required type="text" name="Password"		value="<?php echo $password;?>"><br><br>

		Gender<br>
		<select required name="Gender">
		<?php
		if ($gender=='male') {
			echo "<option value='male'>Male</option>";
			echo "<option value='female'>Female</option>";
		} else {
			echo "<option value='female'>Female</option>";
			echo "<option value='male'>Male</option>";
		}
		?>
		</select><br><br>

		Age<br>
		<select name="Age">
		<option value="<?php echo $age;?>"><?php echo $age;?></option>
		<?php
			for ($i=1; $i<=125; $i++)
			{
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
		?>
		</select><br><br>

		Interested in<br>
		<input id="femaleFriend" name="FemaleFriend" value="femaleFriend" type="checkbox"
			<?php if ($ff=='1') {echo "checked='checked'";} ?> >
		Befriending Women<br>
		<input id="maleFriend" name="MaleFriend" value="maleFriend" type="checkbox"
			<?php if ($mf=='1') {echo "checked='checked'";} ?> >
		Befriending Men<br>
		<input id='femaleDate' name='FemaleDate' value='femaleDate' type='checkbox'
			<?php if ($fd=='1') {echo "checked='checked'";} ?> >
		Dating Women<br>
		<input id="maleDate" name="MaleDate" value="maleDate" type="checkbox"
			<?php if ($md=='1') {echo "checked='checked'";} ?> >
		Dating Men<br><br>

		About Me<br>
		<textarea rows="4" cols="50" name="AboutMe" maxlength="5000">
			<?php echo $aboutMe; ?>
		</textarea><br><br>

		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>