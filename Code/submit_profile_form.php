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

<div class="user_info">
	<form action="submit_profile.php" method="post">
		First Name:<br>
		<input required type="text" name="FirstName"	value="firstName"><br><br>
		Last Name:<br>
		<input required type="text" name="LastName"		value="lastName"><br><br>
		Email Address:<br>
		<input required type="text" name="EmailAddress"	value="EmailAddress" id="EmailAddress"><br><br>
		Password:<br>
		<input required type="text" name="Password"		value="password"><br><br>

		Gender<br>
		<select required name="Gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select><br><br>
		
		Age<br>
		<select name="Age">
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
		<input id="FemaleFriend" name="FemaleFriend" value="checked" type="checkbox">
		Befriending Women<br>
		<input id="MaleFriend" name="MaleFriend" value="checked" type="checkbox">
		Befriending Men<br>
		<input id="FemaleDate" name="FemaleDate" value="checked" type="checkbox">
		Dating Women<br>
		<input id="MaleDate" name="MaleDate" value="checked" type="checkbox">
		Dating Men<br><br>

		About Me<br>
		<textarea id="AboutMe" rows="4" cols="50" name="AboutMe" >about me text</textarea><br><br>

		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>