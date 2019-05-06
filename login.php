<?php

if(isset($errors) && !empty($errors)){
	echo '<p id="err_msg">OOPS! There was a problem<br>';
	foreach ($errors as $msg) {
		echo " - $msg<br>";
	}
	echo 'Please try again or <a href="register.php">Register</a></p>';
}

include('header.html');

?>

<h1>Login</h1>
<form action="login_action.php" method="POST">
	<p>
		Username: <input type="text" name="username">
	</p>
	<p>
		Password: <input type="text" name="pass">
	</p>
	<br>
	<input type="submit" value="Login">
</form>

<br>

<a href='register.php'>Register</a>

<?php

include('footer.html');