<!DOCTYPE html>
<html>
<head>
<title>SPSU Dating site</title>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<img src="Images/GiveAGeekSomeLove.png" alt="Give A Geek Some Love" id="logo">
<form name="login_form" method="post" action="check_login.php">
	<table id="login_table"><!--width="100%" border="0" cellpadding="3" cellspacing="1" -->
		<tr>
			<td colspan="3" align="center" id="top"><strong>Member Login </strong></td>
		</tr>
		<tr>
			<td width="29%" id="login_table_col_left">Email Address</td>
			<td width="2%">:</td>
			<td width="69%"><input name="myusername" type="text" id="myusername" style="width:98%"></td>
		</tr>
		<tr>
			<td id="login_table_col_left">Password</td>
			<td>:</td>
			<td><input name="mypassword" type="password" id="mypassword" style="width:98%"></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="Submit" value="Login"></td>
		</tr>
	</table>
</form>
<a href="submit_profile_form.php" align="center" ><p style="text-align:center">Create User</p></a>



</body>
</html>