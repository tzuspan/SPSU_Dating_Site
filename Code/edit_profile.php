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
		<input id="femaleFriend" name="FemaleFriend" value="femaleFriend" type="checkbox">
		Friendship with Women<br>
		<input id="maleFriend" name="MaleFriend" value="maleFriend" type="checkbox">
		Friendship with Men<br>
		<input id="femaleDate" name="FemaleDate" value="femaleDate" type="checkbox">
		Dating Women<br>
		<input id="maleDate" name="MaleDate" value="maleDate" type="checkbox">
		Dating Men<br><br>

		About Me<br>
		<textarea rows="4" cols="50" name="AboutMe" maxlength="5000">about me text</textarea><br><br>

		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>