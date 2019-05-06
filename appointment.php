<?php

session_start();

if(!isset($_SESSION['user_id'])){
	require('login_tools.php');
	load();
}

include('header.html');

?>

<form action='appointment_handler.php' method='POST'>
	Subject: <input type="text" name="subject"><br>
	Message: <textarea name='message'></textarea><br>
	<input type="submit" value="Submit">
</form>

<?php

include('footer.html');