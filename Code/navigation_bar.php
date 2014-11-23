<?php
echo '<link rel="stylesheet" type="text/css" href="css/nav_bar.css">';
echo '<div class="navigation_bar">';
echo 	'<form method="post" action="logout.php">';
echo 		'<input id="logout_btn" type="submit" value="Log Out">';
echo 	'</form>';
echo 	'<form name="pairing_page_button" method="post" action="pairing_page.php">';
echo 		'<input class="nav_btn" type="submit" value="Pairing Page">';
echo 	'</form>';
echo 	'<form method="post" action="update_profile_form.php">';
echo 		'<input class="nav_btn" type="submit" value="Edit Profile">';
echo 	'</form>';
echo 	'<form method="post" action="view_tickles.php">';
echo 		'<input class="nav_btn" type="submit" value="View Tickles">';
echo 	'</form>';
echo 	'<form method="post" action="view_messages.php">';
echo 		'<input class="nav_btn" type="submit" value="View Messages">';
echo 	'</form>';
echo '</div>';
?>