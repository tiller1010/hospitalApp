<?php

session_start();

if(!isset($_SESSION['user_id'])){
	require('login_tools.php');
	load();
}

include('header.html');

?>
<div class="form">
	<h2>Tell us what's wrong</h2>
	<form action='appointment_handler.php' method='GET'>
		Subject: <input type="text" name="subject"><br>
		Message: <textarea name='message'></textarea><br>
		<input type="submit" value="Submit">
	</form>
</div>

<?php

include('footer.php');