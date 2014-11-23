<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php session_start(); ?>
</head>
<body>
<?php include 'navigation_bar.php'; ?>
<?php echo 'uid : '.$_SESSION["uid"]; ?>

<div>
	<form action="profile_form.asp">
		First Name:<br>
		<input required type="text" name="FirstName"		value="firstName"><br><br>
		Last Name:<br>
		<input required type="text" name="LastName"		value="lastName"><br><br>
		Email Address:<br>
		<input required type="text" name="EmailAddress"	value="emailAddress"><br><br>
		Password:<br>
		<input required type="text" name="Password"		value="password"><br><br>

		Gender<br>
		<select required name="Gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select><br><br>

		Age<br>
		<input type="range" min="0" max="125" value="0" step="1" onchange="showAge(this.value)" /><br>
		<span id="age">0</span>Years<br><br>

		Interest in Women<br>
		<input type="range" min="0" max="3" value="0" step="1" onchange="showInterestInWomen(this.value)" /><br>
		<span id="interestInWomen">None</span><br><br>

		Interest in Men<br>
		<input type="range" min="0" max="3" value="0" step="1" onchange="showInterestInMen(this.value)" /><br>
		<span id="interestInMen">None</span><br><br>

		About Me<br>
		<textarea rows="4" cols="50" name="AboutMe" maxlength="5000">about me text</textarea><br><br>

		<input type="submit" value="Submit">
	</form>
</div>
<script type="text/javascript">
function showAge(newValue)
{
	document.getElementById("age").innerHTML = newValue;
}
function showInterestInWomen(newValue)
{
	switch (newValue)
	{
		case "0":
			document.getElementById("interestInWomen").innerHTML = "None";
			break;
		case "1":
			document.getElementById("interestInWomen").innerHTML = "Friendship";
			break;
		case "2":
			document.getElementById("interestInWomen").innerHTML = "Romance";
			break;
		case "3":
			document.getElementById("interestInWomen").innerHTML = "Both";
			break;
	}
}
function showInterestInMen(newValue)
{
	switch (newValue)
	{
		case "0":
			document.getElementById("interestInMen").innerHTML = "None";
			break;
		case "1":
			document.getElementById("interestInMen").innerHTML = "Friendship";
			break;
		case "2":
			document.getElementById("interestInMen").innerHTML = "Romance";
			break;
		case "3":
			document.getElementById("interestInMen").innerHTML = "Both";
			break;
	}
}
</script>

</body>
</html>