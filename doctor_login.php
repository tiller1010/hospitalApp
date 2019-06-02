<?php

include('header.html');

if(isset($errors) && !empty($errors)){
	echo '<p id="err_msg">OOPS! There was a problem<br>';
	foreach ($errors as $msg) {
		echo " - $msg<br>";
	}
	echo 'Please try again or <a href="register.php">Register</a></p>';
}

?>

<h1>Login</h1>
<form action="login_action.php" method="POST">
	<input type="hidden" name="user-type" value="doctor">
	<p>
		Full name: <input type="text" name="fullname">
	</p>
	<p>
		Password: <input type="password" name="pass">
	</p>
	<br>
	<input type="submit" value="Login">
</form>

<br>

<?php

include('footer.html');
