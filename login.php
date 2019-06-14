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

<div class="form">
	<h1>Login</h1>
	<form action="login_action.php" method="POST">
		<input type="hidden" name="user-type" value="patient">
		<p>
			Username: <input type="text" name="username">
		</p>
		<p>
			Password: <input type="password" name="pass">
		</p>
		<br>
		<input type="submit" value="Login">
	</form>

	<br>

	<a href='register.php'>Register</a>
</div>

<?php

include('footer.html');